@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('branch_offices.store') }}">
                <h2 class="text-lg font-semibold">Add Branch Office Data</h2>

                @csrf

                @if ($errors->any())
                    <div class="mb-8 flex flex-col gap-4 right-0 bottom-0 mr-8 absolute">
                        @foreach ($errors->all() as $error)
                            <div id="mainalert-{{ $loop->iteration }}"
                                class=" border shadow-lg  flex gap-4 items-center min-w-72 max-w-96    bg-white px-4  py-3 rounded-lg"
                                role="alert">
                                <div class="flex w-full items-center gap-2 "><span class="text-red-500"><i
                                            class="fa-light fa-circle-xmark"></i></span><span>{{ $error }}</span>
                                </div>
                                <button onclick="alert(event,'mainalert1')" id="hidealert" class=" top-0 bottom-0 right-0 ">
                                    <i class="fa-duotone fa-light fa-xmark"></i> </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Head Offices<span
                                    class="text-red-600">*</span></label>
                            <select required name="head_id" id="head_offices"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                @if (count($head_offices) != 0)
                                    <option value="">Select Head Offices</option>
                                @else
                                    <option value="">Head Offices Not Found</option>
                                @endif
                                @foreach ($head_offices as $item)
                                    <option value="{{ $item->id }}">{{ $item->province }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Branch Name<span
                                    class="text-red-600">*</span></label>
                            <input required name="branch_name" id="branch_name"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </div>
                    </div>
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">City Or Regency<span
                                    class="text-red-600">*</span></label>
                            <select required name="city_or_regency" id="city_or_regency"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">District<span
                                    class="text-red-600">*</span></label>
                            <select required name="district" id="district"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            </select>
                        </div>
                    </div>

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Village<span
                                    class="text-red-600">*</span></label>
                            <select required name="village" id="village"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Rt / Rw<span
                                    class="text-red-600">*</span></label>
                            <div class="flex">
                                <input type="number" maxlength="2" required name="rt" id="rt"
                                    class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none ">

                                <span class="px-3">/</span>
                                <input type="number" required name="rw" id="rw"
                                    class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none ">


                            </div>
                        </div>
                    </div>

                    <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Phone Number<span
                                    class="text-red-600">*</span></label>
                            <input type="number" required name="phone_number" id="phone_number"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">

                        </div>
                    </div>
                </div>
                <input type="hidden" name="rt_and_rw" id="rt_and_rw">
                <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class="text-xs text-gray-500 whitespace-nowrap">Street Or Building Name<span
                                class="text-red-600">*</span></label>
                        <textarea required name="street_or_building_name" id="street_or_building_name"
                            class="w-full outline-hidden h-32 text-sm border-none shadow-none "></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Max Resort<span
                                    class="text-red-600">*</span></label>
                            <div class="flex">
                                <input required type="number" name="maxresort" id="maxresort"
                                    class="w-full outline-none  text-sm border-none shadow-none ">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Service Charge<span
                                    class="text-red-600">*</span></label>
                            <div class="flex">
                                <input required type="number" name="service_charge" id="service_charge"
                                    class="w-full outline-none  text-sm border-none shadow-none ">
                                <span class="text-sm">%</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Admin Charge<span
                                    class="text-red-600">*</span></label>
                            <div class="flex">
                                <input required type="number" name="admin_charge" id="admin_charge"
                                    class="w-full outline-none  text-sm border-none shadow-none ">
                                <span class="text-sm">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Comision Charge<span
                                    class="text-red-600">*</span></label>
                            <div class="flex">
                                <input required type="number" name="comision_charge" id="comision_charge"
                                    class="w-full outline-none  text-sm border-none shadow-none ">
                                <span class="text-sm">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Deposite<span
                                    class="text-red-600">*</span></label>
                            <div class="flex">
                                <input required type="number" name="deposite" id="deposite"
                                    class="w-full outline-none  text-sm border-none shadow-none ">
                                <span class="text-sm">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
        const head_offices = document.getElementById("head_offices");
        const city_or_regency = document.getElementById("city_or_regency");
        const district = document.getElementById("district");
        const village = document.getElementById("village");
        const rt = document.getElementById("rt");
        const rw = document.getElementById("rw");
        let rtvalue = null;
        let rwvalue = null;
        const phone_number = document.getElementById("phone_number");
        const rt_and_rw = document.getElementById("rt_and_rw");
        const formpost = document.getElementById("formpost");

        function setting_length_number(event, maxlength) {
            if (event.target.value.length > maxlength) {
                event.target.value = event.target.value.slice(0, maxlength);
            }

            if (event.target.value < 0) {
                event.target.value = 0;
            }

        }

        rt.addEventListener("input", (event) => {
            setting_length_number(event, 2)
        })
        rw.addEventListener("input", (event) => {
            setting_length_number(event, 2)
        })
        phone_number.addEventListener("input", (event) => {
            setting_length_number(event, 13)
        })





        city_or_regency.innerHTML = `
                    <option value="">Select Head Offices First</option>
                `;
        district.innerHTML = `
                    <option value="">Select city Or Regency First</option>
                `;
        village.innerHTML = `
                    <option value="">Select District First</option>
                `;


        async function get_province(province_data) {


            const response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`);

            const data = await response.json();

            data.forEach(item => {
                if (item.name == province_data) {
                    get_city_or_regency(item.id);
                }
            });
        }

        async function get_city_or_regency(province_id) {
            city_or_regency.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province_id}.json`);

            const data = await response.json();
            city_or_regency.innerHTML = `
                    <option value="">Select City</option>
                `;

            data.forEach(item => {
                city_or_regency.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
            });

        }

        async function get_district(city_or_regency_id) {
            district.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${city_or_regency_id}.json`);

            const data = await response.json();
            district.innerHTML = `
                    <option value="">Select District</option>
                `;

            data.forEach(item => {
                district.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
            });

        }


        async function get_village(district_id) {
            village.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${district_id}.json`);

            const data = await response.json();

            village.innerHTML = `
                    <option value="">Select Village</option>
                `;

            data.forEach(item => {
                village.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
            });

        }

        head_offices.addEventListener("change", (event) => {
            get_province(event.target.options[event.target.selectedIndex].textContent.trim());
        })

        city_or_regency.addEventListener("change", (event) => {
            district.innerHTML = `
                    <option value="">Select District</option>
                `;
            get_district(event.target.options[event.target.selectedIndex].getAttribute("data-id"));

        })
        district.addEventListener("change", (event) => {
            village.innerHTML = `
                    <option value="">Select Village</option>
                `;
            get_village(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
        });

        formpost.addEventListener("submit", (event) => {
            event.preventDefault();
            rtvalue = rt.value;
            rwvalue = rw.value;
            console.log(rwvalue);
            rt_and_rw.value = rtvalue + "" + rwvalue;
            event.target.submit();
        });


        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
