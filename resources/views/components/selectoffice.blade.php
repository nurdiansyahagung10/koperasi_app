@foreach (['head_office' => 'Head Office', 'branch_office' => 'Branch Office', 'resort' => 'Resort', 'detail_resort' => 'Detail Resort'] as $key => $label)
    @if ($selectofficelimit == $key)
        @if ($key == 'head_office')

            <x-select :label="isset($selectofficecustom[0]['head_office']['label'])
                ? $selectofficecustom[0]['head_office']['label']
                : $label" :id="isset($selectofficecustom[0]['head_office']['id'])
                ? $selectofficecustom[0]['head_office']['id']
                : $key" :name="isset($selectofficecustom[0]['head_office']['name'])
                ? $selectofficecustom[0]['head_office']['name']
                : $key">

                @if (isset($selectofficevalue))
                    @if ($selectofficevalue->findRelation('head_offices') ?? $selectofficevalue->findRelation('head_office'))
                        <option
                            value="{{ $selectofficevalue->findRelation('head_offices')->id ?? $selectofficevalue->findRelation('head_office')->id }}">
                            {{ $selectofficevalue->findRelation('head_offices')->province ??
                                $selectofficevalue->findRelation('head_office')->province }}
                        </option>
                        @foreach ($selectheadofficeoption as $item)
                            @if (
                                $selectofficevalue->findRelation('head_offices')->province ??
                                    $selectofficevalue->findRelation('head_office')->province != $item->province)
                                <option value="{{ $item->id }}">{{ $item->province }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="">Head Office Not Found</option>
                    @endif
                @else
                    @if (count($selectheadofficeoption) != 0)
                        <option value="">Select Head Offices</option>
                    @else
                        <option value="">Head Offices Not Found</option>
                    @endif
                    @foreach ($selectheadofficeoption as $item)
                        <option value="{{ $item->id }}">{{ $item->province }}</option>
                    @endforeach
                @endif
            </x-select>
        @else
            <x-select :label="isset($selectofficecustom[0][$key]['label']) ? $selectofficecustom[0][$key]['label'] : $label" :id="isset($selectofficecustom[0][$key]['id']) ? $selectofficecustom[0][$key]['id'] : $key" :name="isset($selectofficecustom[0][$key]['name']) ? $selectofficecustom[0][$key]['name'] : $key" :placeholder="isset($selectofficevalue) ? '' : 'Select ' . $label" />
            @if (
                $key == 'detail_resort' &&
                    isset($selectofficecustom[0]['detail_resort']['detail_resort_filtered_day']) &&
                    $selectofficecustom[0]['detail_resort']['detail_resort_filtered_day'] == true)
                <input type="hidden" id="detail_resort_filtered_day">
            @endif

            @if (isset($selectofficevalue))
                @if ($selectofficevalue->findRelation($key . 's') ?? $selectofficevalue->findRelation($key))
                    @switch($key)
                        @case('branch_office')
                            <input type="hidden" id="{{ $key }}value"
                                value="{{ $selectofficevalue->findRelation($key . 's')->branch_name ?? $selectofficevalue->findRelation($key)->branch_name }}">
                        @break

                        @case('resort')
                            <input type="hidden" id="{{ $key }}value"
                                value="{{ $selectofficevalue->findRelation($key . 's')->resort_number ?? $selectofficevalue->findRelation($key)->resort_number }}">
                        @break

                        @case('detail_resort')
                            <input type="hidden" id="{{ $key }}value"
                                value="{{ $selectofficevalue->findRelation($key . 's')->day_code ?? $selectofficevalue->findRelation($key)->day_code }}">
                        @break

                        @default
                    @endswitch
                @endif
            @endif
        @endif
    @break

@else
    @if ($key == 'head_office')
        <x-select :label="isset($selectofficecustom[0]['head_office']['label'])
            ? $selectofficecustom[0]['head_office']['label']
            : $label" :id="isset($selectofficecustom[0]['head_office']['id'])
            ? $selectofficecustom[0]['head_office']['id']
            : $key" :name="isset($selectofficecustom[0]['head_office']['name'])
            ? $selectofficecustom[0]['head_office']['name']
            : $key">

            @if (isset($selectofficevalue))
                @if ($selectofficevalue->findRelation('head_offices') ?? $selectofficevalue->findRelation('head_office'))
                    <option
                        value="{{ $selectofficevalue->findRelation('head_offices')->id ?? $selectofficevalue->findRelation('head_office')->id }}">
                        {{ $selectofficevalue->findRelation('head_offices')->province ??
                            $selectofficevalue->findRelation('head_office')->province }}
                    </option>
                    @foreach ($selectheadofficeoption as $item)
                        @if (
                            ($selectofficevalue->findRelation('head_offices')->province ??
                                $selectofficevalue->findRelation('head_office')->province) !=
                                $item->province)
                            <option value="{{ $item->id }}">{{ $item->province }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="">Head Office Not Found</option>
                @endif
            @else
                @if (count($selectheadofficeoption) != 0)
                    <option value="">Select Head Offices</option>
                @else
                    <option value="">Head Offices Not Found</option>
                @endif
                @foreach ($selectheadofficeoption as $item)
                    <option value="{{ $item->id }}">{{ $item->province }}</option>
                @endforeach
            @endif
        </x-select>
    @else
        <x-select :label="isset($selectofficecustom[0][$key]['label']) ? $selectofficecustom[0][$key]['label'] : $label" :id="isset($selectofficecustom[0][$key]['id']) ? $selectofficecustom[0][$key]['id'] : $key" :name="isset($selectofficecustom[0][$key]['name']) ? $selectofficecustom[0][$key]['name'] : $key" :placeholder="isset($selectofficevalue) ? 'Select ' . $label : ''" />
        @if (
            $key == 'detail_resort' &&
                isset($selectofficecustom[0]['detail_resort'][0]['detail_resort_filtered_day']) &&
                $selectofficecustom[0]['detail_resort'][0]['detail_resort_filtered_day'] == true)
            <input type="hidden" id="detail_resort_filtered_day">
        @endif
        @if (isset($selectofficevalue))
            @if ($selectofficevalue->findRelation($key . 's') ?? $selectofficevalue->findRelation($key))
                @switch($key)
                    @case('branch_office')
                        <input type="hidden" id="{{ $key }}value"
                            value="{{ $selectofficevalue->findRelation($key . 's')->branch_name ?? $selectofficevalue->findRelation($key)->branch_name }}">
                    @break

                    @case('resort')
                        <input type="hidden" id="{{ $key }}value"
                            value="{{ $selectofficevalue->findRelation($key . 's')->resort_number ?? $selectofficevalue->findRelation($key)->resort_number }}">
                    @break

                    @case('detail_resort')
                        <input type="hidden" id="{{ $key }}value"
                            value="{{ $selectofficevalue->findRelation($key . 's')->day_code ?? $selectofficevalue->findRelation($key)->day_code }}">
                    @break

                    @default
                @endswitch
            @endif
        @endif
    @endif
@endif
@endforeach

@vite('resources/js/components/selectoffice.js')
