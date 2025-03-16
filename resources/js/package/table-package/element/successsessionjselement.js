function SuccessSessionFromJs() {
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

export {
    SuccessSessionFromJs
}
