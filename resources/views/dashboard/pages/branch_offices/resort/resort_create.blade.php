@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')
        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('resort.store', ['branch_id' => $branch_id]) }}">
                <h2 class="text-lg font-semibold">Add Resort Data</h2>

                @csrf

                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Head Office<span
                                class="text-red-600">*</span></label>
                        <select required name="head_id" id="head_office"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Head Office</option>
                            @foreach ($head_offices as $item)
                                <option value="{{ $item->id }}">{{ $item->province }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Branch Office<span
                                class="text-red-600">*</span></label>
                        <select required name="branch_id" id="branch_office"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Head Office First</option>
                        </select>
                    </div>
                </div>


                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Resort Number<span
                                    class="text-red-600">*</span></label>
                            <select name="resort_number" id="resort_number"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                @if (count($resortnumber) != 0)
                                    <option value="">Select Resort Number</option>
                                @else
                                    <option value="">All Resort Has Used</option>
                                @endif
                                @foreach ($resortnumber as $item)
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
