<div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl">
    <div class="flex flex-col w-full">
        <label class="text-xs text-gray-500 whitespace-nowrap">
            {{ $label }} <span class="text-red-600">*</span>
        </label>
        <select  name="{{ $name }}" id="{{ $id }}"
            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none">
            @if (isset($placeholder) && $placeholder != "")
                <option value="">{{ $placeholder }}</option>
            @endif
            {{ $slot }}
        </select>
    </div>
</div>
