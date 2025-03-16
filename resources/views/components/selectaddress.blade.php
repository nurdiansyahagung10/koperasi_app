@foreach (['province' => 'Province', 'city_or_regency' => 'City Or Regency', 'district' => 'District', 'village' => 'Village'] as $key => $label)

    @if ($selectaddressfromheadoffice && $key == 'province')
    @else
        @if ($selectaddresslimit == $key)
            <x-select :label="$label" :id="$key" :name="$key" :placeholder="isset($selectaddressvalue) ? 'Select ' . $label : ''" />
            @if (isset($selectaddressvalue))
                <input type="hidden" id="{{ $key }}value" value="{{ $selectaddressvalue->$key }}">
            @endif
            @break

        @else
            <x-select :label="$label" :id="$key" :name="$key" :placeholder="isset($selectaddressvalue) ? 'Select ' . $label : ''" />
            @if (isset($selectaddressvalue))
                <input type="hidden" id="{{ $key }}value" value="{{ $selectaddressvalue->$key }}">
            @endif
        @endif
    @endif

@endforeach

@vite('resources/js/components/selectaddress.js')
