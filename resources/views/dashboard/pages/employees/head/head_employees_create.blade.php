@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" enctype="multipart/form-data" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('head_employees.store', ["role" => $role]) }}">
                <h2 class="text-lg font-semibold">Add Head Office Data</h2>

                @csrf
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Head Office<span
                                class="text-red-600">*</span></label>
                        <select required name="head_id" id="head_id"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Head Office</option>
                            @foreach ($head_offices as $item)
                                <option value="{{ $item->id }}">{{ $item->province }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">{{$role_name}} Name<span
                                    class="text-red-600">*</span></label>
                            <input type="text" required name="user_name" id="user_name"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">
                            </input>
                        </div>
                    </div>

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Basic Salary<span
                                    class="text-red-600">*</span></label>
                            <input type="number" required name="basic_salary" id="basic_salary"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">
                            </input>
                        </div>
                    </div>
                </div>



                <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class="text-xs text-gray-500 whitespace-nowrap">Hometown<span
                                class="text-red-600">*</span></label>
                        <textarea required name="hometown" id="hometown"
                            class="w-full outline-hidden h-32 text-sm border-none shadow-none "></textarea>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Phone Number<span
                                class="text-red-600">*</span></label>
                        <input type="number" required name="phone_number" id="phone_number"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Sk<span
                                class="text-red-600">*</span></label>
                        <input type="text" required name="sk" id="sk"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Email<span
                                class="text-red-600">*</span></label>
                        <input type="email" required name="email" id="email"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Password<span
                                class="text-red-600">*</span></label>
                        <input type="password" required name="password" id="password"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Password Confirmation<span
                                class="text-red-600">*</span></label>
                        <input type="password" required name="password_confirmation" id="password_confirmation"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
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
