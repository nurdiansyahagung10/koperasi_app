@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" enctype="multipart/form-data" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('branch_employees.store', ['role' => $role]) }}">
                <h2 class="text-lg font-semibold">Add Head Office Data</h2>

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
                            <label class=" text-xs text-gray-500 whitespace-nowrap">{{ $role_name }} Name<span
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
                        <textarea required name="hometown" id="hometown" class="w-full outline-hidden h-32 text-sm border-none shadow-none "></textarea>
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
        const head_office = document.getElementById("head_office");
        const branch_office = document.getElementById("branch_office");


        const api_config = (method = "get", body_value = null) => ({
            method,
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer {{ session('access_token') }}`
            },
            ...(method !== "get" && {
                body: JSON.stringify(body_value)
            })
        });

        async function get_branch_offices(head_offices) {

            branch_office.innerHTML = `
                    <option value="">Loading...</option>
                `;

            if (head_offices == "") {
                branch_office.innerHTML = `
                    <option value="">Select Head Office First</option>
                `;

            } else {
                const response = await fetch(`http://127.0.0.1:8000/api/v1/{{{$role}}}/get_branch_offices/head_office/` +
                    head_offices, api_config());

                const data = await response.json();

                if (data.body.length != 0) {
                    branch_office.innerHTML = `
        <option value="">Select Branch Office</option>
    `;

                } else {
                    branch_office.innerHTML = `
        <option value="">Not Have Branch Office</option>
    `;

                }

                data.body.forEach(item => {
                    branch_office.innerHTML += `
        <option value="${item.id}" >${item.branch_name}</option>
    `;
                });

            }

        }


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

        head_office.addEventListener("change", (event) => {
            get_branch_offices(event.target.value);
        })


        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
