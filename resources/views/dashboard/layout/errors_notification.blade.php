<div id="section-alert-page-table" class="mb-8 flex flex-col gap-4 absolute right-0 bottom-0 mr-8">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div id="mainalert-{{ $loop->iteration }}"
                class="border shadow-lg flex gap-3 items-center bg-white min-w-72 max-w-96 px-4 py-3 rounded-lg animate-slidein"
                role="alert">
                <div class="flex flex-1 items-center gap-2">
                    <span class="text-red-500">
                        <i class="fa-light fa-circle-xmark"></i>
                     </span>
                    <span class="text-gray-700">{{ $error }}</span>
                </div>
                <button onclick="alert(event,'mainalert-{{ $loop->iteration }}')" id="hidealert"
                    class="text-gray-400 hover:text-gray-600 transition duration-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endforeach
    @endif
</div>

