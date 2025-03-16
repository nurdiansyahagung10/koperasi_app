<table class="table-auto rounded-sm  w-full ">
    <thead class="text-xs text-left bg-gray-100 rounded-xl overflow-hidden ">
        <tr>
            @foreach ($data as $item)
                @if ($loop->iteration == 1)
                    <td class="py-3 px-2 rounded-bl rounded-tl text-center">{{ $item }}</td>
                @elseif ($loop->iteration == count($data))
                    <td class="rounded-br rounded-tr text-center px-2">{{ $item }}</td>
                @else
                    <td class="text-center">{{ $item }}</td>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody class="text-sm " id="table_body_data">
    </tbody>
</table>

<div id="tw-pagination" class="hidden">
    <button class=" cursor-pointer text-2xl flex items-center" id="prevbutton-table-pagination">
        <i class="text-lg fa-regular fa-angle-left"></i>
    </button>
    <div id="list_pagination" class="flex items-center gap-4">
    </div>
    <button class=" cursor-pointer text-2xl flex items-center" id="nextbutton-table-pagination">
        <i class="text-lg fa-regular fa-angle-right"></i>
    </button>
</div>

@include('dashboard.layout.bottomjs')
