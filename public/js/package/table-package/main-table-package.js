// main-table-package.js
import { display_body_table, file_or_link_data, api_config, extra_function_for_body_table } from '../../config.js';


let data = [];
let pagenow = 1;
const itemsPerPage = 10;
const tableBody = document.getElementById("table_body_data");
const paginationList = document.getElementById("list_pagination");
const prevButton = document.getElementById("prevbutton-table-pagination");
const nextButton = document.getElementById("nextbutton-table-pagination");
const paginationContainer = document.getElementById("tw-pagination");

async function fetchData() {
    console.log(file_or_link_data());
    const response = await fetch(file_or_link_data(), api_config());
    data = (await response.json()).body || [];
    updatePagination();
    showData();
}

function updatePagination() {
    paginationList.innerHTML = "";
    const totalPages = Math.ceil(data.length / itemsPerPage);

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement("button");
        button.className = "cursor-pointer text-gray-300";
        button.innerHTML = i;
        button.onclick = () => { pagenow = i; showData(); };
        if (i === pagenow) button.classList.add("font-bold");
        paginationList.appendChild(button);
    }

    paginationContainer?.classList.toggle("hidden", data.length <= itemsPerPage);
}

function showData() {
    tableBody.innerHTML = data.slice((pagenow - 1) * itemsPerPage, pagenow * itemsPerPage)
        .map((item, index) => display_body_table(item, (pagenow - 1) * itemsPerPage + index + 1)).join("");
    extra_function_for_body_table((pagenow - 1) * itemsPerPage, pagenow * itemsPerPage);
}

prevButton?.addEventListener('click', () => {
    if (pagenow > 1) { pagenow--; showData(); }
});

nextButton?.addEventListener('click', () => {
    if (pagenow * itemsPerPage < data.length) { pagenow++; showData(); }
});

fetchData();
