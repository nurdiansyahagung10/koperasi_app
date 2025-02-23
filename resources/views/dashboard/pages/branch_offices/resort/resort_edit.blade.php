@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('resort.update', ['branch_id' => $branch_id, 'resort' => $resort->id]) }}">
                <h2 class="text-lg font-semibold">Add Resort Data</h2>

                @csrf
                @method('PUT')


                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Pdl<span
                                    class="text-red-600">*</span></label>
                            <select name="pdl_id" id="pdl"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                @if ($resort->pdl_id)
                                    <option value="{{ $resort->pdl_id }}">{{ $resort->pdl->pdl_name }}</option>
                                @else
                                    <option value="">Select Pdl</option>
                                @endif
                                @foreach ($pdl as $item)
                                    @if ($resort->pdl_id != $item->id)
                                        <option value="{{ $item->id }}">{{ $item->pdl_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Resort Number<span
                                    class="text-red-600">*</span></label>
                            <select name="resort_number" id="resort_number"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                <option value="{{ $resort->resort_number }}">{{ $resort->resort_number }}</option>
                                @foreach ($resortnumber as $item)
                                    @if ($item != $resort->resort_number)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
