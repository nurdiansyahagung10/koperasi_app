@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')
        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 " action="{{ route('detailresort.update', ["resort_id" => $resort_id, "detailresort" => $detailresort->id]) }}">
                <h2 class="text-lg font-semibold">Add Resort Data</h2>

                @csrf
                @method("PUT")

                <div class="grid grid-cols-1 gap-4">
                <input type="hidden" name="resort_id" required value="{{$resort_id}}">
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Resort Number<span
                                    class="text-red-600">*</span></label>
                            <select name="day_code" id="day_code"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                <option value="{{ $detailresort->day_code }}">{{ $detailresort->day_code }}</option>
                                @foreach ($day_code as $item)
                                    @if ($item != $detailresort->day_code)
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
