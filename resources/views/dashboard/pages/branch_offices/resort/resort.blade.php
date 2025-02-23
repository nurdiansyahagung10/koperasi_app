@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section  class="flex-1">
        @include('dashboard.layout.success_notification')


        <div class=" flex justify-between p-2 items-center  ">
            <h2 class="text-lg font-semibold whitespace-nowrap
            ">Manajemen Head Office</h2>
            <div class="flex gap-3 items-center">
                <div class="p-0.5">
                    <input type="text" name="" class="bg-white outline-hidden border w-36 p-1 px-3 rounded-xl"
                        placeholder="Search.." id="">
                </div>
                <div class="p-0.5 pl-2 border-l">
                    <a href="{{ route('resort.create', ['branch_id' => $branch_id]) }}">
                        <button name=""
                            class="text-sm border rounded-xl p-1.5 px-3 font-semibold text-white bg-black">
                            Add More
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <table class="table-auto rounded-sm  w-full ">
            <thead class="text-xs text-left bg-gray-100 rounded-xl overflow-hidden ">
                <tr>
                    <td class="py-3 px-2 rounded-bl rounded-tl text-center">No</td>
                    <td class="text-center">Resort Number</td>
                    <td class="text-center">Pdl</td>
                    <td class="text-center">Created At</td>
                    <td class="rounded-br rounded-tr text-center px-2">Action</td>
                </tr>
            </thead>
            <tbody class="text-sm " id="table_body_data">
            </tbody>
        </table>
        @csrf

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

    </section>

    <script type="module" src="{{ asset('js/package/table-package/main-table-package.js') }}"></script>
    <script>
        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
