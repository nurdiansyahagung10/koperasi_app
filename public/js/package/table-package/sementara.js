const linknow = window.location.href.split("/").slice(0, 4).join("/");

// setting this if you use api for getting data
const apikey = window.apikey;


const api_config = (method = "get", body_value = null) => {
    let body = JSON.stringify(body_value);
    let config = null;
    if (method == "get") {
        config = {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + apikey
            },
        }
    } else {
        config = {
            method: method,
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + apikey
            },
            body
        }
    }
    return config;
}

const file_or_link_data = () => {
    switch (linknow) {
        case window.location.origin + "/roles":
            return "/api/v1/roles";
        case window.location.origin + "/permissions":
            return "/api/v1/permissions";
        case window.location.origin + "/users":
            return "/api/v1/all_users";
        case window.location.origin + "/head_offices":
            return "/api/v1/head_offices";
        case window.location.origin + "/branch_offices":
            return "/api/v1/branch_offices";
        case window.location.origin + "/resorts":
            return "/api/v1/resorts/branch/" + window.location.href.split("/")[5];
        default:
            console.error("URL tidak dikenali:", linknow);
            return null;
    }
};






// ubah tampilan isi table di sini
const display_body_table = (item, iteration) => {
    switch (linknow) {
        case window.location.origin + "/roles":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.role_name}
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">
        <div class="relative inline-block text-left">
            <div>
                <button type="button" class="inline-flex w-full justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm "
                    id="menu-button-${iteration}" aria-expanded="true" aria-haspopup="true">
                    <i class="fa-light fa-pen-to-square"></i>
                </button>
            </div>


            <div class="scale-0 absolute right-0 z-10  origin-top-right rounded-md bg-white  shadow-lg border "
                role="menu" aria-orientation="vertical" id="dropdown-${iteration}"
                aria-labelledby="menu-button-${iteration}" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/permissions/${item.id}" class="block px-4 hover:text-black whitespace-nowrap py-2 text-xs text-gray-500"
                        role="menuitem" id="menu-item-0">Permissions</a>

                </div>
            </div>
        </div>
    </td>
</tr>
`;
        case window.location.origin + "/permissions":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center">
        ${item.name_permissions}
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">
        <div class="relative inline-block text-left">
            <div>
                <input type="checkbox" name="${item.id}" id="permissions-${iteration}">
            </div>

        </div>
    </td>
</tr>
`;
        case window.location.origin + "/users":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center">
        ${item.email}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.role.role_name}
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">
        ${item.created_at.slice(0, 10)}
    </td>
</tr>
`;
        case window.location.origin + "/head_offices":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.province}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.phone_number}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">
        <div class="relative inline-block text-left">
            <div>
                <button type="button"
                    class="inline-flex w-full cursor-pointer justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm "
                    id="menu-button-${iteration}" aria-expanded="true" aria-haspopup="true">
                    <i class="fa-light fa-pen-to-square"></i>
                </button>
            </div>

            <div class="scale-0 absolute right-0 z-10  origin-top-right rounded-md bg-white  shadow-lg border "
                role="menu" aria-orientation="vertical" id="dropdown-${iteration}"
                aria-labelledby="menu-button-${iteration}" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/head_offices/${item.id}/edit"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Edit</a>
                        <button id="delete-${iteration}" "
                        class="block cursor-pointer px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Delete</button>
                </div>
            </div>
        </div>
    </td>
</tr>
<div id="modal-delete-${iteration}" class="relative invisible opacity-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-black opacity-65 transition-opacity" aria-hidden="true"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-base font-semibold text-gray-900" id="modal-title">Delete Head Office Data?</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to Delete Your Head Office Data? All of your data who connected to Head Office will be permanently removed. This action cannot be undone.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button name="${item.id}" id="final-choices-delete-${iteration}" type="button" class="inline-flex w-full justify-center rounded-md cursor-pointer bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
          <button type="button" id="modal-button-hidden-${iteration}" class="mt-3 inline-flex w-full justify-center rounded-md cursor-pointer bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

`;
        case window.location.origin + "/branch_offices":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.branch_name}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.head_offices.province}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.phone_number}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.service_charge}%
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.admin_charge}%
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.comision_charge}%
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.deposite}%
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">

    </td>
</tr>
<div id="modal-delete-${iteration}" class="relative invisible opacity-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-black opacity-65 transition-opacity" aria-hidden="true"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-base font-semibold text-gray-900" id="modal-title">Delete Head Office Data?</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to Delete Your Head Office Data? All of your data who connected to Head Office will be permanently removed. This action cannot be undone.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button name="${item.id}" id="final-choices-delete-${iteration}" type="button" class="inline-flex w-full justify-center rounded-md cursor-pointer bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
          <button type="button" id="modal-button-hidden-${iteration}" class="mt-3 inline-flex w-full justify-center rounded-md cursor-pointer bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

`;
        case window.location.origin + "/resorts":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.resort_number}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.pdl ? item.pdl.pdl_name : "Not Have Pdl"}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.created_at.slice(0, 10)}
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">
        <div class="relative inline-block text-left">
            <div>
                <button type="button"
                    class="inline-flex w-full cursor-pointer justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm "
                    id="menu-button-${iteration}" aria-expanded="true" aria-haspopup="true">
                    <i class="fa-light fa-pen-to-square"></i>
                </button>
            </div>

            <div class="scale-0 absolute right-0 z-10  origin-top-right rounded-md bg-white  shadow-lg border "
                role="menu" aria-orientation="vertical" id="dropdown-${iteration}"
                aria-labelledby="menu-button-${iteration}" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/resort/branch_offices/${item.id}/resorts"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Resort</a>
                    <a href="/resorts/branch_offices/${item.branch_id}/resorts/${item.id}/edit"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Edit</a>
                        <button id="delete-${iteration}" "
                        class="block cursor-pointer px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Delete</button>
                </div>
            </div>
        </div>
    </td>
</tr>
<div id="modal-delete-${iteration}" class="relative invisible opacity-0 z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-black opacity-65 transition-opacity" aria-hidden="true"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-base font-semibold text-gray-900" id="modal-title">Delete Head Office Data?</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Are you sure you want to Delete Your Head Office Data? All of your data who connected to Head Office will be permanently removed. This action cannot be undone.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button name="${item.id}" id="final-choices-delete-${iteration}" type="button" class="inline-flex w-full justify-center rounded-md cursor-pointer bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
          <button type="button" id="modal-button-hidden-${iteration}" class="mt-3 inline-flex w-full justify-center rounded-md cursor-pointer bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

`;
    }

}

const display_placholders_table = (item, iteration) => {
    switch (linknow) {
        case window.location.origin + "/roles":
            return `
<tr>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 items-center py-4 text-center p-1  bg-gray-200 animate-pulse ">
    </td>
</tr>
`;
        case window.location.origin + "/permissions":
            return `
<tr>
    <td class=" border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse " ></td>
    <td class="border-2 border-white border-b border-b-gray-200 items-center py-4 text-center p-1  bg-gray-200 animate-pulse ">
    </td>
</tr>
`;
        case window.location.origin + "/users":
            return `
<tr>
    <td class=" border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse " ></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 items-center py-4 text-center p-1  bg-gray-200 animate-pulse ">
    </td>
</tr>
`;
        case window.location.origin + "/head_offices":
            return `
<tr>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 items-center py-4 text-center p-1  bg-gray-200 animate-pulse ">
    </td>
</tr>

`;
        case window.location.origin + "/branch_offices":
            return `
<tr>
   <tr>
    <td class=" border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse " ></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 items-center py-4 text-center p-1  bg-gray-200 animate-pulse ">
    </td>
</tr>

`;
        case window.location.origin + "/resorts":
            return `
<tr>
    <td class=" border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse " ></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 text-center bg-gray-200 animate-pulse "></td>
    <td class="border-2 border-white border-b border-b-gray-200 items-center py-4 text-center p-1  bg-gray-200 animate-pulse ">
    </td>
</tr>


`;
    }

}

// if you want add some function for your data in the body table you can add here
const extra_function_for_body_table = (mindata, maxdata) => {
    function hideOtherDropdowns(currentIndex) {
        for (let j = mindata; j <= maxdata; j++) {
            if (j != currentIndex) {
                const
                    anotherdropdown = document.getElementById(`dropdown-${j}`); if (anotherdropdown) {
                        anotherdropdown.classList.remove("!scale-100");
                    }
            }
        }
    }

    function dropdown_click() {
        for (let i = mindata; i <= maxdata; i++) {
            const menu_button = document.getElementById(`menu-button-${i}`);
            const dropdown = document.getElementById(`dropdown-${i}`);
            if (menu_button) {
                menu_button.addEventListener('click', () => {
                    dropdown.classList.toggle("!scale-100");
                    hideOtherDropdowns(i);
                });
            }
        }
    }

    async function check_has_permissions() {
        const response = await fetch("/api/v1/get_role/" + window.location.href.split("/").slice(4), api_config("get"));
        const has_permissions = await response.json();
        for (let i = mindata; i <= maxdata; i++) {
            const checkbox_permissions = document.getElementById(`permissions-${i}`);
            if (checkbox_permissions) {
                has_permissions.body.forEach(item => {
                    if (item.permissions != null) {
                        if (i == item.permissions.slice(0, 1)) {
                            checkbox_permissions.checked = true;
                        }
                    }
                });
            }
        }

    }

    function set_permissions() {
        for (let i = mindata; i <= maxdata; i++) {
            const
                checkbox_permissions = document.getElementById(`permissions-${i}`); if (checkbox_permissions) {
                    checkbox_permissions.addEventListener('change', async (event) => {
                        if (event.target.checked) {
                            await fetch("/api/v1/set_permissions/" + window.location.href.split("/").slice(4), api_config("put", {
                                permissions: event.target.name + ",", type: "add"
                            }));
                        } else {
                            await fetch("/api/v1/set_permissions/" + window.location.href.split("/").slice(4), api_config("put", {
                                permissions: event.target.name + ",", type: "delete"
                            }));
                        }
                    });
                }
        }

    }

    function fetch_delete(link, name) {
        for (let i = mindata; i <= maxdata; i++) {
            const
                delete_button = document.getElementById(`delete-${i}`);

            if (delete_button) {
                delete_button.addEventListener('click', async (event) => {
                    const modal = document.getElementById(`modal-delete-${i}`);
                    modal.classList.add("!visible");
                    modal.classList.add("!opacity-100");
                });
            }


            const modal_button_hidden = document.getElementById(`modal-button-hidden-${i}`);
            const final_choices_delete = document.getElementById(`final-choices-delete-${i}`);

            if (modal_button_hidden) {
                modal_button_hidden.addEventListener("click", () => {
                    const modal = document.getElementById(`modal-delete-${i}`);
                    modal.classList.remove("!visible");
                    modal.classList.remove("!opacity-100");
                })
            }

            if (final_choices_delete) {
                final_choices_delete.addEventListener("click", async (event) => {
                    const response = await fetch("/api/v1" + link + event.target.name, api_config("delete"));
                    const data = await response.json();
                    if (data.message == "success") {
                        sessionStorage.setItem("success", `Success Deleting ${name}`);
                        window.location.href = window.location.href;
                    }
                })
            }

        }
    }

    function success_session_from_js() {
        const success = sessionStorage.getItem("success");
        if (success) {
            const section = document.getElementById("section-alert-page-table");
            section.innerHTML += `
                        <div id="mainalert-success"
                class="border shadow-lg flex gap-3 items-center bg-white min-w-72 max-w-96 px-4 py-3 rounded-lg animate-slidein"
                role="alert">
                <div class="flex flex-1 items-center gap-2">
                    <span class="text-green-500">
                        <i class="fa-light fa-circle-check"></i>
                     </span>
                    <span class="text-gray-700">${success}</span>
                </div>
                <button onclick="alert(event,'mainalert-success')" id="hidealert"
                    class="text-gray-400 hover:text-gray-600 transition duration-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>


            `;
            sessionStorage.removeItem("success");
        }
    }




    switch (linknow) {
        case window.location.origin + "/roles":
            dropdown_click();
            break;
        case window.location.origin + "/permissions":
            check_has_permissions();
            set_permissions();
            break;
        case window.location.origin + "/head_offices":
            fetch_delete("/head_offices/", "Head Offices");
            dropdown_click();
            success_session_from_js();
            break;
        case window.location.origin + "/branch_offices":
            fetch_delete("/branch_offices/", "Branch Offices");
            dropdown_click();
            success_session_from_js();
            break;
        case window.location.origin + "/resorts":
            fetch_delete("/resorts/", "Resort");
            dropdown_click();
            success_session_from_js();
            break;
    }
}






export { display_body_table, file_or_link_data, api_config, extra_function_for_body_table, display_placholders_table };
