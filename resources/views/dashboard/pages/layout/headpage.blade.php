<div class="flex gap-3 items-center">
    <div class="p-0.5">
        <input type="text" name="" class="bg-white  outline-hidden border w-36 p-1 px-3 rounded-xl"
            placeholder="Search.." id="">
    </div>
    @if (isset($LinkCreate))
        <div class="p-0.5 pl-2 border-l">
            <a href="{{ route($LinkCreate, isset($LinkParamCreate) ? $LinkParamCreate : null) }}">
                <button name="" class="text-sm shadow-xs border rounded-xl p-1.5 px-3 font-semibold text-white bg-black">
                    Add More
                </button>
            </a>
        </div>
    @endif
</div>
