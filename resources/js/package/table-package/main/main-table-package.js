// main-table-package.js
import { DisplayBodyTable, ExtraFunctionForBodyTable } from "../config.js";
import { FileOrLinkData } from "../apiroute.js";
import { AxiosGet } from "../fetch.js";

let data = [];
let pagenow = 1;
const itemsPerPage = 10;
const tableBody = document.getElementById("table_body_data");
const paginationList = document.getElementById("list_pagination");
const prevButton = document.getElementById("prevbutton-table-pagination");
const nextButton = document.getElementById("nextbutton-table-pagination");
const paginationContainer = document.getElementById("tw-pagination");

async function fetchData(url) {
    const response = await AxiosGet(url);
    data = response.body || [];
    UpdatePagination();
    ShowData();
}

function CreateButton(page) {
    const button = document.createElement("button");
    button.className = "cursor-pointer text-gray-300";
    button.innerHTML = page;
    button.onclick = () => {
        pagenow = page;
        ShowData();
    };
    if (page === pagenow) button.classList.add("font-bold");
    return button;
}

function UpdatePagination() {
    paginationList.innerHTML = "";
    const totalPages = Math.ceil(data.length / itemsPerPage);

    for (let i = 1; i <= totalPages; i++) {
        paginationList.appendChild(CreateButton(i));
    }

    paginationContainer?.classList.toggle(
        "hidden",
        data.length <= itemsPerPage
    );
}

function ShowData() {
    tableBody.innerHTML = data
        .slice((pagenow - 1) * itemsPerPage, pagenow * itemsPerPage)
        .map((item, index) =>
            DisplayBodyTable(item, (pagenow - 1) * itemsPerPage + index + 1)
        )
        .join("");
    ExtraFunctionForBodyTable(
        (pagenow - 1) * itemsPerPage,
        pagenow * itemsPerPage
    );
}

function setupPaginationHandlers() {
    prevButton?.addEventListener("click", () => {
        if (pagenow > 1) {
            pagenow--;
            ShowData();
        }
    });

    nextButton?.addEventListener("click", () => {
        if (pagenow * itemsPerPage < data.length) {
            pagenow++;
            ShowData();
        }
    });
}

// Initialize
setupPaginationHandlers();
fetchData(FileOrLinkData());
