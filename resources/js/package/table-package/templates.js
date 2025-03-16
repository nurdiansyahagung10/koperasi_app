import { RowElement } from "./element/generaterowelement.js";
import { Path } from "./apiroute.js";

const Templates = {
    roles: (item, iteration) =>
        RowElement(
            iteration,
            [item.role_name],
            [
                iteration,
                item,
                `permissions/roles/${item.id}`,
                "permissions",
                true,
            ]
        ),
    permissions: (item, iteration) =>
        RowElement(iteration, [
            item.name_permissions,
            `<input type="checkbox" name="${item.id}" id="permissions-${iteration}">`,
        ]),
    users: (item, iteration) =>
        RowElement(iteration, [
            item.email,
            item.role.role_name,
            item.created_at.slice(0, 10),
        ]),
    head_offices: (item, iteration) =>
        RowElement(
            iteration,
            [item.province, item.phone_number, item.created_at.slice(0, 10)],
            [iteration, item]
        ),
    branch_offices: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.branch_name,
                item.head_offices.province,
                item.phone_number,
                item.service_charge,
                item.admin_charge,
                item.comision_charge,
                item.deposite,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/resorts/${Path.slice(0, -1)}/${item.id}/resort`,
                "resorts",
            ]
        ),
    resorts: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.resort_number,
                item.pdl ? item.pdl.pdl_name : "Not Have Pdl",
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/detailresorts/${Path.slice(0, -1)}/${item.id}/detailresort`,
                "detail resorts",
            ]
        ),
    detailresorts: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.day_code,
                item.resorts.resort_number,
                item.created_at.slice(0, 10),
            ],
            [iteration, item]
        ),
    members: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.member_name,
                item.detail_resorts.resorts.resort_number,
                item.detail_resorts.day_code,
                item.detail_resorts.resorts.pdl
                    ? item.detail_resorts.resorts.pdl.pdl_name
                    : "Undefined Pdl In This Resort",
                item.detail_resorts.resorts.branch_offices.branch_name,
                item.status,
                item.created_at.slice(0, 10),
            ],
            [iteration, item, `/${Path}/${item.id}`, "Details"]
        ),
    head_leaders: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.user_name,
                item.email,
                item.head_office.province,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/${Path}/employees/head_employees/${item.id}/renew_password`,
                "Renew Password",
            ]
        ),
    coordinator: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.user_name,
                item.email,
                item.head_office.province,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/${Path}/employees/head_employees/${item.id}/renew_password`,
                "Renew Password",
            ]
        ),
    head_cashier: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.user_name,
                item.email,
                item.head_office.province,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/${Path}/employees/head_employees/${item.id}/renew_password`,
                "Renew Password",
            ]
        ),

    head_recap: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.user_name,
                item.email,
                item.head_office.province,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/${Path}/employees/head_employees/${item.id}/renew_password`,
                "Renew Password",
            ]
        ),
    manager: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.user_name,
                item.email,
                item.head_office.province,
                item.branch_office.branch_name,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/${Path}/employees/branch_employees/${item.id}/renew_password`,
                "Renew Password",
            ]
        ),
    branch_cashier: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.user_name,
                item.email,
                item.head_office.province,
                item.branch_office.branch_name,
                item.created_at.slice(0, 10),
            ],
            [
                iteration,
                item,
                `/${Path}/employees/branch_employees/${item.id}/renew_password`,
                "Renew Password",
            ]
        ),
    pdls: (item, iteration) =>
        RowElement(
            iteration,
            [
                item.pdl_name,
                item.resort ? item.resort.resort_number : "Pdl Not Have Resort",
                item.head_office.province,
                item.branch_office.branch_name,
                item.created_at.slice(0, 10),
            ],
            [iteration, item]
        ),
    advance_payments: (iteration, item) => {
        RowElement(
            iteration,
            [
                item.detail_resort.day_code,
                item.pdl.pdl_name,
                item.balance,
                item.user.user_name,
                item.created_at.slice(0, 10),
            ],
            [iteration, item, `/${Path}/${item.id}`, `Details`]
        );
    },
};

export { Templates };
