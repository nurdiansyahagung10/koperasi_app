@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')
        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 " action="{{ route('detailresort.store', ["resort_id"=> $resort_id]) }}">
                <h2 class="text-lg font-semibold">Add Resort Data</h2>

                @csrf

                <div class="grid grid-cols-1 gap-4">
                <input type="hidden" name="resort_id" required value="{{$resort_id}}">
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Resort Number<span
                                    class="text-red-600">*</span></label>
                            <select name="day_code" id="day_code"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                @if (count($day_code) != 0)
                                <option value="">Select Day Code</option>
                                @else
                                <option value="">All Day Code Has Used</option>
                                @endif
                                @foreach ($day_code as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
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
