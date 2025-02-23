@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" enctype="multipart/form-data" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('head_employees.update', [ "role" => $role,"head_employee" => $head_employee->id]) }}">
                <h2 class="text-lg font-semibold">Add Head Office Data</h2>

                @csrf
                @method("PUT")
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Head Office<span
                                class="text-red-600">*</span></label>
                        <select required name="head_id" id="head_id"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="{{ $head_employee->head_office->id }}">{{ $head_employee->head_office->province }}</option>
                            @foreach ($head_offices as $item)
                            @if ($item->province != $head_employee->head_office->province)
                            <option value="{{ $item->id }}">{{ $item->province }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Head Leaders Name<span
                                    class="text-red-600">*</span></label>
                            <input type="text" required name="user_name" id="user_name"
                                class="w-full outline-hidden  text-sm border-none shadow-none " value="{{ $head_employee->user_name }}">
                            </input>
                        </div>
                    </div>

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Basic Salary<span
                                    class="text-red-600">*</span></label>
                            <input type="number" required name="basic_salary" id="basic_salary"
                                class="w-full outline-hidden  text-sm border-none shadow-none " value="{{ $head_employee->basic_salary }}">
                            </input>
                        </div>
                    </div>
                </div>



                <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class="text-xs text-gray-500 whitespace-nowrap">Hometown<span
                                class="text-red-600">*</span></label>
                        <textarea required name="hometown" id="hometown"
                            class="w-full outline-hidden h-32 text-sm border-none shadow-none ">{{ $head_employee->hometown }}</textarea>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Phone Number<span
                                class="text-red-600">*</span></label>
                        <input type="number" required name="phone_number" id="phone_number"
                            class="w-full outline-hidden  text-sm border-none shadow-none "value="{{ $head_employee->phone_number }}">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Sk<span
                                class="text-red-600">*</span></label>
                        <input type="text" required name="sk" id="sk"
                            class="w-full outline-hidden  text-sm border-none shadow-none " value="{{ $head_employee->sk }}">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Email<span
                                class="text-red-600">*</span></label>
                        <input type="email" required name="email" id="email"
                            class="w-full outline-hidden  text-sm border-none shadow-none " value="{{ $head_employee->email }}">
                        </input>
                    </div>
                </div>




                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
        const phone_number = document.getElementById("phone_number");





        function setting_length_number(event, maxlength) {
            if (event.target.value.length > maxlength) {
                event.target.value = event.target.value.slice(0, maxlength);
            }

            if (event.target.value < 0) {
                event.target.value = 0;
            }

        }



        phone_number.addEventListener("input", (event) => {
            setting_length_number(event, 13)
        })


        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
