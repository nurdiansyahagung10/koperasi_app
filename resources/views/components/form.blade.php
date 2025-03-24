<form method="POST" id="formpost" enctype="multipart/form-data" class="w-full flex flex-col gap-4 mt-2.5 "
    action="{{ route($action, isset($actionparam) ? $actionparam : null) }}">
    @csrf

    @if (isset($method))
        @method($method)
    @endif

    @foreach ([$input] as $item)
        @foreach (array_keys($item) as $cekkeyitem)
            @if ($cekkeyitem == 'selectoffice')
                <x-selectoffice :selectofficecustom="isset($item['selectoffice']['selectofficecustom'])
                    ? [$item['selectoffice']['selectofficecustom']]
                    : null" :selectofficelimit="$item['selectoffice']['selectofficelimit']" :selectheadofficeoption="$item['selectoffice']['selectheadofficeoption']"
                    :selectofficevalue="isset($item['selectoffice']['selectofficevalue'])
                        ? $item['selectoffice']['selectofficevalue']
                        : null"></x-selectoffice>
            @endif
            @if (preg_match('/^input[0-20]*$/', $cekkeyitem))
                <x-input :input="$item[$cekkeyitem]"></x-input>
            @endif
            @if ($cekkeyitem == 'selectaddress')
                <x-selectaddress :selectaddressvalue="isset($item['selectaddress']['selectaddressvalue'])
                    ? $item['selectaddress']['selectaddressvalue']
                    : null" :selectaddressfromheadoffice="isset($item['selectaddress']['selectaddressfromheadoffice'])
                    ? $item['selectaddress']['selectaddressfromheadoffice']
                    : null" :selectaddresslimit="$item['selectaddress']['selectaddresslimit']"></x-selectaddress>
            @endif
            @if (preg_match('/^select[0-20]*$/', $cekkeyitem))
                <x-select :label="$item['select']['label']" :id="$item['select']['id']" :name="$item['select']['name']" :placeholder="isset($item['select']['value']) || count($item['select']['option']) == 0
                    ? ''
                    : 'Select ' . $item['select']['label']">
                    @if (isset($item['select']['value']))
                        @foreach ($item['select']['option'] as $option)
                            @if ((isset($option->id) ? $option->id : $option) == $item['select']['value'])
                                <option
                                    @if (isset($item['select']['filteredfromotherinput']['attr'])) filtered="{{ $option[$item['select']['filteredfromotherinput']['attr']] }}" @endif
                                    value="{{ isset($option->id) ? $option->id : $option }}">
                                    {{ isset($item['select']['optionfield']) ? $option[$item['select']['optionfield']] : $option }}
                                </option>
                            @endif
                        @endforeach
                        @foreach ($item['select']['option'] as $option)
                            @if ((isset($option->id) ? $option->id : $option) != $item['select']['value'])
                                <option
                                    @if (isset($item['select']['filteredfromotherinput']['attr'])) filtered="{{ $option[$item['select']['filteredfromotherinput']['attr']] }}" @endif
                                    value="{{ isset($option->id) ? $option->id : $option }}">
                                    {{ isset($item['select']['optionfield']) ? $option[$item['select']['optionfield']] : $option }}
                                </option>
                            @endif
                        @endforeach
                    @else
                        @if (isset($item['select']['option']) && count($item['select']['option']) != 0)
                            @foreach ($item['select']['option'] as $option)
                                <option
                                    @if (isset($item['select']['filteredfromotherinput']['attr'])) filtered="{{ $option[$item['select']['filteredfromotherinput']['attr']] }}" @endif
                                    value="{{ isset($option->id) ? $option->id : $option }}">
                                    {{ isset($item['select']['optionfield']) ? $option[$item['select']['optionfield']] : $option }}
                                </option>
                            @endforeach
                        @else
                            <option value="">Not Have {{ $item['select']['label'] }}</option>
                        @endif
                    @endif
                </x-select>
                @if (isset($item['select']['value']))
                    <input type="hidden" class="selectvalue" id="{{ $item['select']['id'] }}value"
                        value="{{ $item['select']['value'] }}">
                @endif
                @if (isset($item['select']['filteredfromotherinput']))
                    <input type="hidden" class="filteredfromotherinput" select-id="{{ $item['select']['id'] }}"
                        placeholder="{{ $item['select']['filteredfromotherinput']['placeholder'] }}"
                        value="{{ $item['select']['filteredfromotherinput']['id'] }}">
                @endif
            @endif
            @if (preg_match('/^inputgroup[0-20]*$/', $cekkeyitem))
                <x-inputgroup :input="$item[$cekkeyitem]"></x-inputgroup>
            @endif
        @endforeach
    @endforeach
    <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
</form>

@vite('resources/js/components/input.js')
