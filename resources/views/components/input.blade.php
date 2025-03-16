    @foreach ($input as $item)
        @if (isset($item['type']) && $item['type'] == 'textarea')
            <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                <div class="flex flex-col w-full">
                    <label class="text-xs text-gray-500 whitespace-nowrap">{{ $item['label'] }}<span
                            class="text-red-600">*</span></label>
                    <textarea name="{{ $item['name'] }}" id="{{ $item['id'] }}"
                        class="w-full outline-hidden h-32 text-sm border-none shadow-none ">{{ isset($item['value']) ? $item['value'] : '' }}</textarea>
                </div>
            </div>
        @elseif (isset($item['type']) && $item['type'] == 'image')
            <button type="button"
                class="button border-dashed text-left max-w-52 relative  bg-white border flex items-center  py-1.5 rounded-xl ">
                <div class="flex flex-col w-full">
                    <span class=" text-xs px-4 z-10 text-gray-500 whitespace-nowrap">{{ $item['label'] }}<span
                            class="text-red-600">*</span></span>
                    <input type="file" name="{{ $item['name'] }}" id="{{ $item['id'] }}"
                        class="opacity-0 absolute -z-10" />
                    <div
                        class="max-w-52 {{ isset($item['value']) ? 'hidden' : ''}}  h-40  flex pt-[1rem] text-center  items-center justify-center first-show-previmage">
                        <div class="items-center flex flex-col">
                            <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                            <span class="text-sm">Select Or Drop Image</span>
                            <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                        </div>
                    </div>
                    <div class="max-w-52 rounded-xl  overflow-hidden mx-4 my-2">
                        <img id="{{ $item['name'] }}" src="{{ asset('storage/'. $item['value']) }}" class="w-full h-full object-cover " alt="">

                    </div>

                </div>
                <div
                    class="max-w-52 invisible opacity-0  second-show-previmage flex items-center bg-stone-100 justify-center absolute top-0 pt-[1rem] bottom-0  rounded-xl left-0 right-0 ">
                    <div class="items-center flex flex-col">
                        <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                        <span class="text-sm">Drop The Image</span>
                        <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                    </div>
                </div>

            </button>
        @elseif (isset($item['type']) && $item['type'] == 'rtrw')
            <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                <div class="flex flex-col w-full">
                    <label class=" text-xs text-gray-500 whitespace-nowrap">{{ $item['label'] }}<span
                            class="text-red-600">*</span></label>
                    <div class="flex">
                        <input type="number" maxlength="2" required name="rt" id="rt"
                            class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none "
                            value="{{ isset($item['value']) ? substr($item['value'], 0, 2) : '' }}">
                        </input>
                        <span class="px-3">/</span>
                        <input type="number" maxlength="2" required name="rw" id="rw"
                            class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none "
                            value="{{ isset($item['value']) ? substr($item['value'], 2, 2) : '' }}">
                        </input>
                    </div>
                </div>
            </div>
            <input type="hidden" name="rt_and_rw" id="rt_and_rw" maxlength="4"
                value="{{ isset($item['value']) ? $item['value'] : '' }}">
        @else
            <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                <div class="flex flex-col w-full">
                    <label class=" text-xs text-gray-500 whitespace-nowrap">{{ $item['label'] }}<span
                            class="text-red-600">*</span></label>
                    <div class="flex">
                        <input maxlength="{{ isset($item['maxlength']) ? $item['maxlength'] : '' }}"
                            type="{{ isset($item['type']) ? $item['type'] : 'text' }}" required
                            name="{{ $item['name'] }}" id="{{ $item['id'] }}"
                            class="w-full outline-hidden  text-sm border-none shadow-none "
                            value="{{ isset($item['value']) ? $item['value'] : '' }}"
                            placeholder="{{ isset($item['placeholder']) ? $item['placeholder'] : '' }}">
                        </input><span
                            class="text-sm">{{ isset($item['endinputattr']) ? $item['endinputattr'] : '' }}</span>
                    </div>

                </div>
            </div>
        @endif
    @endforeach

    @vite('resources/js/components/input.js')
