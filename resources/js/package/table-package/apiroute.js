const Path = window.location.href.split("/").slice(3, 4).join("/");

const BaseApiUrl = "/api/v1";

const ApiRoutes = {
    roles: `${BaseApiUrl}/roles`,
    permissions: `${BaseApiUrl}/permissions`,
    users: `${BaseApiUrl}/all_users`,
    head_offices: `${BaseApiUrl}/head_offices`,
    members: `${BaseApiUrl}/members`,
    advance_payments: `${BaseApiUrl}/advance_payments`,
    branch_offices: `${BaseApiUrl}/branch_offices`,
    head_leaders: `${BaseApiUrl}/head_leaders/head_employees`,
    coordinator: `${BaseApiUrl}/coordinator/head_employees`,
    head_cashier: `${BaseApiUrl}/head_cashier/head_employees`,
    head_recap: `${BaseApiUrl}/head_recap/head_employees`,
    manager: `${BaseApiUrl}/manager/branch_employees`,
    pdls: `${BaseApiUrl}/pdls/branch_employee/pdl`,
    branch_cashier: `${BaseApiUrl}/branch_cashier/branch_employees`,
    branch_recap: `${BaseApiUrl}/branch_recap/branch_employees`,
    resorts: `${BaseApiUrl}/resorts/branch_office/${
        window.location.href.split("/")[5]
    }/resort`,
    detailresorts: `${BaseApiUrl}/detailresorts/resort/${
        window.location.href.split("/")[5]
    }/detailresort`,
};


const FileOrLinkData = () => ApiRoutes[Path] || null;

export {
    FileOrLinkData,
    Path
}
