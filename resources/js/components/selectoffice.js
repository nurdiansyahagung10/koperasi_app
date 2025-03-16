import { AxiosGet } from "../package/table-package/fetch";

const head_office = document.getElementById("head_office");
const branch_office = document.getElementById("branch_office");
const branch_officevalue = document.getElementById("branch_officevalue")?.value;
const resort = document.getElementById("resort");
const resortvalue = document.getElementById("resortvalue")?.value;
const detail_resort = document.getElementById("detail_resort");
const detail_resortvalue = document.getElementById("detail_resortvalue")?.value;

async function get_branch_offices(head_office_id, SelectedBranchOffice = null) {
    branch_office.innerHTML = `
            <option value="">Loading...</option>
        `;

    if (head_office_id == null) {
        branch_office.innerHTML = `
            <option value="">Select Head Office First</option>
        `;
        resort && get_resort(null);
    } else {
        const data = await AxiosGet(
            `/api/v1/get_branch_offices/head_office/` + head_office_id
        );

        if (data.body.length != 0) {
            if (SelectedBranchOffice != null) {
                const selected = data.body.find(
                    (item) => item.branch_name === SelectedBranchOffice
                );

                if (selected) {
                    branch_office.innerHTML = `
                    <option value="${selected.id}" >${selected.branch_name}</option>`;
                    resort && get_resort(selected.id, resortvalue);
                } else {
                    branch_office.innerHTML = `<option value="">Select Branch Office</option>`;
                    resort && get_resort(null);
                }
            } else {
                branch_office.innerHTML = `<option value="">Select Branch Office</option>`;
                resort && get_resort(null);
            }

            data.body.forEach((item) => {
                if (item.branch_name != SelectedBranchOffice) {
                    branch_office.innerHTML += `
                    <option value="${item.id}" >${item.branch_name}</option>`;
                }
            });
        } else {
            branch_office.innerHTML = `
                <option value="">Not Have Branch Office</option>
            `;
            resort && get_resort(null);
        }
    }
}

async function get_resort(branch_office_id, SelectedResort = null) {
    resort.innerHTML = `
            <option value="">Loading...</option>
        `;

    if (branch_office_id == null) {
        resort.innerHTML = `
            <option value="">Select Branch Office First</option>
        `;
        detail_resort && get_detail_resort(null);
    } else {
        const data = await AxiosGet(
            `/api/v1/resorts_have_pdl/branch_office/${branch_office_id}/resort`
        );

        if (data.body.length != 0) {
            if (SelectedResort != null) {
                const selected = data.body.find(
                    (item) => item.resort_number === Number(SelectedResort)
                );

                if (selected) {
                    resort.innerHTML = `
                    <option value="${selected.id}" >${selected.resort_number}</option>`;
                    detail_resort &&
                        get_detail_resort(selected.id, detail_resortvalue);
                } else {
                    resort.innerHTML = `<option value="">Select Resort</option>`;
                    detail_resort && get_detail_resort(null);
                }
            } else {
                resort.innerHTML = `<option value="">Select Resort</option>`;
                detail_resort && get_detail_resort(null);
            }

            data.body.forEach((item) => {
                if (item.resort_number != SelectedResort) {
                    resort.innerHTML += `
                    <option value="${item.id}" >${item.resort_number}</option>`;
                }
            });
        } else {
            resort.innerHTML = `
                <option value="">Not Have Resort</option>
            `;
            detail_resort && get_detail_resort(null);
        }
    }
}
async function get_detail_resort(resort_id, SelectedDetailResort = null) {
    detail_resort.innerHTML = `
            <option value="">Loading...</option>
        `;

    if (resort_id == null) {
        detail_resort.innerHTML = `
            <option value="">Select Resort First</option>
        `;
    } else {
        const data = await AxiosGet(
            `/api/v1/detailresorts/resort/${resort_id}/detailresort`
        );

        if (data.body.length != 0) {
            if (SelectedDetailResort != null) {
                const selected = data.body.find(
                    (item) => item.day_code === SelectedDetailResort
                );


                if (selected) {
                    detail_resort.innerHTML = `
                    <option value="${selected.id}" >${selected.day_code}</option>`;
                } else {
                    detail_resort.innerHTML = `<option value="">Select Detail Resort</option>`;
                }
            } else {
                detail_resort.innerHTML = `<option value="">Select Detail Resort</option>`;
            }

            data.body.forEach((item) => {
                if (item.day_code != SelectedDetailResort) {
                    detail_resort.innerHTML += `
                    <option value="${item.id}" >${item.day_code}</option>`;
                }
            });
        } else {
            detail_resort.innerHTML = `
                <option value="">Not Have Detail Resort</option>
            `;
            detail_resort && get_detail_resort(null);
        }
    }
}

head_office?.addEventListener("change", (event) => {
    branch_office && get_branch_offices(event.target.value, branch_officevalue && branch_officevalue);
});

branch_office?.addEventListener("change", (event) => {
    resort && get_resort(event.target.value, resortvalue && resortvalue);
});
resort?.addEventListener("change", (event) => {
    detail_resort && get_detail_resort(event.target.value, detail_resortvalue && detail_resortvalue);
});

branch_office &&
    get_branch_offices(
        head_office.value && head_office.value != "" ? head_office.value : null,
        branch_officevalue && branch_officevalue
    );

export { head_office };
