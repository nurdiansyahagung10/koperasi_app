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
            @if (preg_match('/^inputgroup[0-20]*$/', $cekkeyitem))
                <x-inputgroup :input="$item[$cekkeyitem]"></x-inputgroup>
            @endif
        @endforeach
    @endforeach
    <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
</form>
