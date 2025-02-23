
const path = window.location.href.split("/").slice(3, 4).join("/");

const apikey = window.apikey;

console.log(apikey);


const api_config = (method = "get", body_value = null) => ({
    method,
    headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${apikey}`
    },
    ...(method !== "get" && { body: JSON.stringify(body_value) })
});



const apiRoutes = {
    "roles": "/api/v1/roles",
    "permissions": "/api/v1/permissions",
    "users": "/api/v1/all_users",
    "head_offices": "/api/v1/head_offices",
    "members": "/api/v1/members",
    "advance_payments": "/api/v1/advance_payments",
    "branch_offices": "/api/v1/branch_offices",
    "head_leaders": "/api/v1/head_leaders/head_employees",
    "coordinator": "/api/v1/coordinator/head_employees",
    "head_cashier": "/api/v1/head_cashier/head_employees",
    "head_recap": "/api/v1/head_recap/head_employees",
    "manager": "/api/v1/manager/branch_employees",
    "pdls": "/api/v1/pdls/branch_employee/pdl",
    "branch_cashier": "/api/v1/branch_cashier/branch_employees",
    "resorts": `/api/v1/resorts/branch_office/${window.location.href.split("/")[5]}/resort`,
    "detailresorts": `/api/v1/detailresorts/resort/${window.location.href.split("/")[5]}/detailresort`
};

const file_or_link_data = () => apiRoutes[path] || null;

const button_action = (iteration, item, external_link = null, external_name = null, onlyexternallink = false) => {
    return `
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
                    ${external_link ? `<a href="${external_link}"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">${external_name}</a>` : ""}
                    ${onlyexternallink ? "" :
            `<a href="${window.location.href}/${item.id}/edit"
                        class="block px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Edit</a>
                        <button id="delete-${iteration}" "
                        class="block cursor-pointer px-4 whitespace-nowrap py-2 hover:text-black text-xs text-gray-500" role="menuitem"
                        id="menu-item-0">Delete</button>`}
                </div>
            </div>
        </div>

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

const templates = {
    roles: (item, iteration) => `
<tr>
    <td class="border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center">${item.role_name}</td>
   <td class="border-b border-gray-200 text-center py-2 p-1" >
    ${button_action(iteration, item, `permissions/roles/${item.id}`, "permissions", true)}
    </td>
    </tr>
`,
    permissions: (item, iteration) => `
<tr>
    <td class="border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center">${item.name_permissions}</td>
    <td class="border-b text-center py-2 p-1 border-gray-200">
        <input type="checkbox" name="${item.id}" id="permissions-${iteration}">
    </td>
</tr>
`,
    users: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center">
        ${item.email}
    </td>
    <td class="border-b border-gray-200 text-center">
        ${item.role.role_name}
    </td>
    <td class="border-b items-center py-4   text-center p-1 border-gray-200">
            ${item.created_at.slice(0, 10)}
    </td>
</tr>
`,
    head_offices: (item, iteration) => `
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
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item)}
    </td>
</tr>
`,
    branch_offices: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.branch_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_offices.province}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.phone_number}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.service_charge}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.admin_charge}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.comision_charge}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.deposite}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/resorts/${path.slice(0, -1)}/${item.id}/resort`, `resorts`)}
    </td>
</tr>
`,
    resorts: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.resort_number}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.pdl ? item.pdl.pdl_name : "Not Have Pdl"}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/detailresorts/${path.slice(0, -1)}/${item.id}/detailresort`, `detail resorts`)}
    </td>
</tr>
`,
    detailresorts: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.day_code}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.resorts.resort_number}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item)}
    </td>
</tr>
`,
    members: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.member_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.detail_resorts.resorts.resort_number}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.detail_resorts.day_code}
    </td>
    <td class="border-b border-gray-200 text-center" >
                ${item.detail_resorts.resorts.pdl ? item.detail_resorts.resort.pdl.pdl_name : "Undefined Pdl In This Resort"}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.detail_resorts.resorts.branch_offices.branch_name}
    </td>
      <td class="border-b border-gray-200 text-center" >
        ${item.status}
    </td>
      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/${item.id}`, `Details`)}
    </td>
</tr>
`,
    head_leaders: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.email}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/employees/head_employees/${item.id}/renew_password`, "Renew Password")}
    </td>
</tr>
`,
    coordinator: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.email}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/employees/head_employees/${item.id}/renew_password`, "Renew Password")}
    </td>
</tr>
`,
    head_cashier: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.email}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/employees/head_employees/${item.id}/renew_password`, "Renew Password")}
    </td>
</tr>
`,
    head_recap: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.email}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/employees/head_employees/${item.id}/renew_password`, "Renew Password")}
    </td>
</tr>
`,
    manager: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.email}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.branch_office.branch_name}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/employees/branch_employees/${item.id}/renew_password`, "Renew Password")}
    </td>
</tr>
`,
    branch_cashier: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.email}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.branch_office.branch_name}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item, `/${path}/employees/branch_employees/${item.id}/renew_password`, "Renew Password")}
    </td>
</tr>
`,
    pdls: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.pdl_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
            ${item.resort ? item.resort.resort_number : "Pdl Not Have Resort"}

    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.head_office.province}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.branch_office.branch_name}
    </td>

      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item)}
    </td>
</tr>
`,
    advance_payments: (item, iteration) => `
<tr>
    <td class=" border-b border-gray-200 text-center">${iteration}</td>
    <td class="border-b border-gray-200 text-center" >
        ${item.balance}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.pdl.pdl_name}
    </td>
    <td class="border-b border-gray-200 text-center" >
        ${item.user.user_name}
    </td>
      <td class="border-b border-gray-200 text-center" >
        ${item.created_at.slice(0, 10)}
    </td>
        <td class="border-b border-gray-200 text-center py-2 p-1" >

    ${button_action(iteration, item)}
    </td>
</tr>
`,

};

const display_body_table = (item, iteration) => {
    return templates[path] ? templates[path](item, iteration) : "";
};

const extra_function_for_body_table = (mindata, maxdata) => {
    function hideOtherDropdowns(currentIndex) {
        for (let j = mindata; j <= maxdata; j++) {
            if (j != currentIndex) {
                const
                    anotherdropdown = document.getElementById(`dropdown-${j}`);
                if (anotherdropdown) {
                    anotherdropdown.classList.remove("!scale-100");
                }
            }
        }
    }

    const addDropdownHandler = () => {
        for (let i = mindata; i <= maxdata; i++) {
            document.getElementById(`menu-button-${i}`)?.addEventListener('click', () => {
                document.getElementById(`dropdown-${i}`)?.classList.toggle("!scale-100");
                hideOtherDropdowns(i);
            });
        }
    };

    const fetchDeleteHandler = (link, name) => {

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
                    const response = await fetch("/api/v1" + link.slice(0, -2) + "/" + event.target.name, api_config("delete"));
                    const data = await response.json();
                    if (data.message == "success") {
                        sessionStorage.setItem("success", `Success Deleting ${name.charAt(0).toUpperCase() + name.slice(1)} Data`);
                        window.location.href = window.location.href;
                    }
                })
            }

        }

    };

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

    async function check_has_permissions() {
        const response = await fetch("/api/v1/get_role/" + window.location.href.split("/").slice(5), api_config("get"));
        const has_permissions = await response.json();
        for (let i = mindata; i <= maxdata; i++) {
            const checkbox_permissions = document.getElementById(`permissions-${i}`);
            if (checkbox_permissions) {
                has_permissions.body.forEach(item => {
                    if (item.permissions && i == item.permissions[0]) {
                        checkbox_permissions.checked = true;
                    }
                });
            }
        }
    }

    function set_permissions() {
        for (let i = mindata; i <= maxdata; i++) {
            const checkbox_permissions = document.getElementById(`permissions-${i}`);
            if (checkbox_permissions) {
                checkbox_permissions.addEventListener('change', async (event) => {
                    const type = event.target.checked ? "add" : "delete";
                    await fetch("/api/v1/set_permissions/" + window.location.href.split("/").slice(5), api_config("put", {
                        permissions: event.target.name + ",", type: type
                    }));
                });
            }
        }
    }


    switch (path) {
        case "roles":
            addDropdownHandler();
            break;
        case "permissions":
            check_has_permissions();
            set_permissions();
            break;
        case "head_offices":
            fetchDeleteHandler(`/${path}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "branch_offices":
            fetchDeleteHandler(`/${path}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "resorts":
            fetchDeleteHandler(`/${path}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "detailresorts":
            fetchDeleteHandler(`/${path}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "members":
            fetchDeleteHandler(`/${path}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "head_leaders":
            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "coordinator":
            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "head_cashier":
            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "head_recap":
            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "manager":
            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "branch_cashier":
            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "recap":

            fetchDeleteHandler(`/${path}/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "pdls":
            fetchDeleteHandler(`/${path}/branch_employee/${window.location.href.split("/").slice(5, 6).join("/")}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
        case "advance_payments":
            fetchDeleteHandler(`/${path}/`, path.split("_").join(" "));
            success_session_from_js();
            addDropdownHandler();
            break;
    }
};

export { display_body_table, file_or_link_data, api_config, extra_function_for_body_table };
