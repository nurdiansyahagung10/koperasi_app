const linknow = window.location.href.split("/").length == 5 ? window.location.href.split("/").slice(0, 4).join("/") :
    window.location.href;

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


// ubah tampilan isi table di sini
const display_body_table = (item, iteration) => {
    switch (linknow) {
        case window.location.origin + "/roles":
            return `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" id="task-${iteration}">
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


            <div class="hidden absolute right-0 z-10  origin-top-right rounded-md bg-white  shadow-lg border "
                role="menu" aria-orientation="vertical" id="dropdown-${iteration}"
                aria-labelledby="menu-button-${iteration}" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/permissions/${item.id}" class="block px-4 whitespace-nowrap py-2 text-xs text-gray-500"
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
    <td class="border-b border-gray-200 text-center" id="task-${iteration}">
        ${item.province}
    </td>
    <td class="border-b items-center py-2    text-center p-1 border-gray-200">
        <div class="relative inline-block text-left">
            <div>
                <button type="button"
                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md  px-3 py-2 text-sm "
                    id="menu-button-${iteration}" aria-expanded="true" aria-haspopup="true">
                    <i class="fa-light fa-pen-to-square"></i>
                </button>
            </div>


            <div class="hidden absolute right-0 z-10  origin-top-right rounded-md bg-white  shadow-lg border "
                role="menu" aria-orientation="vertical" id="dropdown-${iteration}"
                aria-labelledby="menu-button-${iteration}" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="/head_offices/${item.id}/edit"
                        class="block px-4 whitespace-nowrap py-2 text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Edit</a>
                        <button id="delete-${iteration}" name="${item.id}"
                        class="block px-4 whitespace-nowrap py-2 text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Delete</button>
                </div>
            </div>
        </div>
    </td>
</tr>
<div id="modal-delete-${iteration}" class="invisible absolute top-0 left-0 right-0 z-50 w-full h-screen bg-black">

</div>
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
                        anotherdropdown.classList.add("hidden");
                    }
            }
        }
    } function dropdown_click() {
        for (let i = mindata; i <= maxdata; i++) {
            const menu_button = document.getElementById(`menu-button-${i}`); const
                dropdown = document.getElementById(`dropdown-${i}`); if (menu_button) {
                    menu_button.addEventListener('click', () => {
                        dropdown.classList.toggle("hidden");
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
                has_permissions.forEach(item => {
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

    function fetch_delete() {
        for (let i = mindata; i <= maxdata; i++) {
            const
                delete_button = document.getElementById(`delete-${i}`);
            console.log(delete_button);
            if (delete_button) {
                delete_button.addEventListener('click', async (event) => {
                    const modal = document.getElementById(`modal-delete-${i}`);
                    console.log(modal);
                    modal.classList.add("!visible");
                    // const response = await fetch(window.location.origin + "/api/v1/head_offices/" + event.target.name, api_config("delete"));
                    // const data = await response.json();

                });
            }
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
            fetch_delete();
            dropdown_click()
            break;
    }
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

    }

}





export { display_body_table, file_or_link_data, api_config, extra_function_for_body_table };
