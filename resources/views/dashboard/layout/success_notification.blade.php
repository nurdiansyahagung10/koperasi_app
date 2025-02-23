<div id="section-alert-page-table" class="mb-8 flex flex-col gap-4 fixed right-0 bottom-0 mr-8">
    @if (session("success"))
    <div id="section-alert-page-table" class="mb-8 flex flex-col gap-4 fixed right-0 bottom-0 mr-8">
        @if (session("success"))
                <div id="mainalert-success"
                    class="border shadow-lg flex gap-3 items-center bg-white min-w-72 max-w-96 px-4 py-3 rounded-lg animate-slidein"
                    role="alert">
                    <div class="flex flex-1 items-center gap-2">
                        <span class="text-green-500">
                            <i class="fa-light fa-circle-check"></i>
                         </span>
                        <span class="text-gray-700">{{ session("success") }}</span>
                    </div>
                    <button onclick="alert(event,'mainalert-success')" id="hidealert"
                        class="text-gray-400 hover:text-gray-600 transition duration-200">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
        @endif
    </div>

        @endif
</div>

