import { Path } from "./apiroute.js";
import { Templates } from "./templates.js";
import {
    SetPermissions,
    CheckHasPermissions,
    FetchDeleteHandler,
    AddDropdownHandler,
} from "./extrafunctionforbodytable.js";
import { SuccessSessionFromJs } from "./element/successsessionjselement.js";

const DisplayBodyTable = (item, iteration) => {
    return Templates[Path] ? Templates[Path](item, iteration) : "";
};

const commonHandlers = (mindata, maxdata, link, name) => {
    FetchDeleteHandler(link, name, mindata, maxdata);
    SuccessSessionFromJs();
    AddDropdownHandler(mindata, maxdata);
};

const ExtraFunctionForBodyTable = (mindata, maxdata) => {
    const link = `/${Path}/`;
    const name = Path.split("_").join(" ");

    switch (Path) {
        case "roles":
            AddDropdownHandler(mindata, maxdata);
            break;
        case "permissions":
            CheckHasPermissions(mindata, maxdata);
            SetPermissions(mindata, maxdata);
            break;
        case "head_offices":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "head_offices":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "branch_offices":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "resorts":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "detailresorts":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "members":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "head_leaders":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "coordinator":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "head_cashier":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "head_recap":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "manager":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "branch_cashier":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "branch_recap":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "pdls":
            commonHandlers(
                mindata,
                maxdata,
                link +
                    window.location.href.split("/").slice(5, 6).join("/") +
                    "/",
                name
            );
            break;
        case "loan_applications":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "advance_payments":
            commonHandlers(mindata, maxdata, link, name);
            break;
        case "droppings":
            commonHandlers(mindata, maxdata, link, name);
            break;
        default:
            break;
    }
};

export { DisplayBodyTable, ExtraFunctionForBodyTable };
