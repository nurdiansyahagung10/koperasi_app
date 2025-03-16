import { AxiosGet, AxiosPut, AxiosDelete } from "./fetch";

const HideOtherDropdowns = (mindata, maxdata, currentIndex) => {
    for (let j = mindata; j <= maxdata; j++) {
        if (j != currentIndex) {
            const anotherdropdown = document.getElementById(`dropdown-${j}`);
            if (anotherdropdown) {
                anotherdropdown.classList.remove("!scale-100");
            }
        }
    }
};

const AddDropdownHandler = (mindata, maxdata) => {
    for (let i = mindata; i <= maxdata; i++) {
        document
            .getElementById(`menu-button-${i}`)
            ?.addEventListener("click", () => {
                document
                    .getElementById(`dropdown-${i}`)
                    ?.classList.toggle("!scale-100");
                HideOtherDropdowns(mindata, maxdata, i);
            });
    }
};

const AddModalEventListeners = (i, link, name) => {
    const delete_button = document.getElementById(`delete-${i}`);
    if (delete_button) {
        delete_button.addEventListener("click", () => {
            const modal = document.getElementById(`modal-delete-${i}`);
            modal.classList.add("!visible");
            modal.classList.add("!opacity-100");
        });
    }

    const ModalButtonHidden = document.getElementById(
        `modal-button-hidden-${i}`
    );
    const FinalChoiseDelete = document.getElementById(
        `final-choices-delete-${i}`
    );
    if (ModalButtonHidden) {
        ModalButtonHidden.addEventListener("click", () => {
            const modal = document.getElementById(`modal-delete-${i}`);
            modal.classList.remove("!visible");
            modal.classList.remove("!opacity-100");
        });
    }

    if (FinalChoiseDelete) {
        FinalChoiseDelete.addEventListener("click", async (event) => {
            const response = await AxiosDelete(
                "/api/v1" + link.slice(0, -2) + "/" + event.target.name
            );
            const data = response;
            console.log(data)
            if (data.message == "success") {
                sessionStorage.setItem(
                    "success",
                    `Success Deleting ${
                        name.charAt(0).toUpperCase() + name.slice(1)
                    } Data`
                );
                window.location.href = window.location.href;
            }
        });
    }
};

const FetchDeleteHandler = (link, name, mindata, maxdata) => {
    for (let i = mindata; i <= maxdata; i++) {
        AddModalEventListeners(i, link, name);
    }
};

const CheckHasPermissions = async (mindata, maxdata) => {
    const response = await AxiosGet(
        "/api/v1/get_role/" + window.location.href.split("/").slice(5)
    );
    const has_permissions = response;
    for (let i = mindata; i <= maxdata; i++) {
        const checkbox_permissions = document.getElementById(
            `permissions-${i}`
        );
        if (checkbox_permissions) {
            has_permissions.body.forEach((item) => {
                if (item.permissions && i == item.permissions[0]) {
                    checkbox_permissions.checked = true;
                }
            });
        }
    }
};

const SetPermissions = (mindata, maxdata) => {
    for (let i = mindata; i <= maxdata; i++) {
        const checkbox_permissions = document.getElementById(
            `permissions-${i}`
        );
        if (checkbox_permissions) {
            checkbox_permissions.addEventListener("change", async (event) => {
                const type = event.target.checked ? "add" : "delete";
                await AxiosPut(
                    "/api/v1/set_permissions/" +
                        window.location.href.split("/").slice(5),
                    {
                        permissions: event.target.name + ",",
                        type: type,
                    }
                );
            });
        }
    }
};

export {
    SetPermissions,
    CheckHasPermissions,
    FetchDeleteHandler,
    AddDropdownHandler,
};
