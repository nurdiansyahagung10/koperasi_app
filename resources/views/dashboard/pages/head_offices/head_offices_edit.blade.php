@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('head_offices.update', ['head_office' => $head_offices->id]) }}">
                <h2 class="text-lg font-semibold">Add Head Office Data</h2>
                @csrf
                @method('PUT')


                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Province<span
                                    class="text-red-600">*</span></label>
                            <select required name="province" id="province"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            </select>
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
                                    class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none "
                                    value="{{ substr($head_offices->rt_and_rw, 0, 2) }}">
                                </input>
                                <span class="px-3">/</span>
                                <input type="number" required name="rw" id="rw"
                                    class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none "
                                    value="{{ substr($head_offices->rt_and_rw, 2, 4) }}">
                                </input>

                            </div>
                        </div>
                    </div>

                    <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Phone Number<span
                                    class="text-red-600">*</span></label>
                            <input type="number" required name="phone_number" id="phone_number"
                                class="w-full outline-hidden  text-sm border-none shadow-none "
                                value="{{ $head_offices->phone_number }}">
                            </input>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="rt_and_rw" id="rt_and_rw" value="{{ $head_offices->rt_and_rw }}">
                <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class="text-xs text-gray-500 whitespace-nowrap">Street Or Building Name<span
                                class="text-red-600">*</span></label>
                        <textarea required name="street_or_building_name" id="street_or_building_name"
                            class="w-full outline-hidden h-32 text-sm border-none shadow-none ">{{ $head_offices->street_or_building_name }}</textarea>
                    </div>
                </div>
                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
        const province = document.getElementById("province");
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

        function show_first_data() {
            get_province("{{ $head_offices->province }}");
        }


        async function get_province(province_data) {

            province.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`);

            const data = await response.json();


            data.forEach(item => {
                if (item.name == province_data) {
                    province.innerHTML = `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                    get_city_or_regency(item.id);
                }
            });
            data.forEach(item => {
                if (item.name != province_data) {
                    province.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                }
            });
        }

        async function get_city_or_regency(province_id) {
            let have_same = false;
            city_or_regency.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province_id}.json`);

            const data = await response.json();

            data.forEach(item => {
                if (item.name == "{{ $head_offices->city_or_regency }}") {
                    city_or_regency.innerHTML = `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                    get_district(item.id);
                    have_same = true;
                }

            });

            if (have_same == false) {
                city_or_regency.innerHTML = `
                    <option value="">Select City</option>
                `;
            }

            data.forEach(item => {
                if (item.name != "{{ $head_offices->city_or_regency }}") {
                    city_or_regency.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                }
            });

        }

        async function get_district(city_or_regency_id) {
            let have_same = false;
            district.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${city_or_regency_id}.json`);

            const data = await response.json();

            data.forEach(item => {
                if (item.name == "{{ $head_offices->district }}") {
                    district.innerHTML = `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                    get_village(item.id);
                    have_same = true;
                }
            });

            if (have_same == false) {
                district.innerHTML = `
                    <option value="">Select District</option>
                `;

            }

            data.forEach(item => {
                if (item.name != "{{ $head_offices->district }}") {
                    district.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                }
            });

        }


        async function get_village(district_id) {
            let have_same = false;
            village.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${district_id}.json`);

            const data = await response.json();

            data.forEach(item => {
                if (item.name == "{{ $head_offices->village }}") {
                    village.innerHTML = `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                    have_same = true;
                }
            });


            if (have_same == false) {
                village.innerHTML = `
                    <option value="">Select Village</option>
                `;
            }

            data.forEach(item => {
                if (item.name != "{{ $head_offices->village }}") {
                    village.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                }
            });

        }

        province.addEventListener("change", (event) => {


            get_city_or_regency(event.target.options[event.target.selectedIndex].getAttribute("data-id"));


            district.innerHTML = `
                    <option value="">Select city Or Regency First</option>
                `;
            village.innerHTML = `
                    <option value="">Select District First</option>
                `;

        })

        city_or_regency.addEventListener("change", (event) => {

            get_district(event.target.options[event.target.selectedIndex].getAttribute("data-id"));

            village.innerHTML = `
                    <option value="">Select District First</option>
                `;

        })

        district.addEventListener("change", (event) => {

            get_village(event.target.options[event.target.selectedIndex].getAttribute("data-id"));

        })

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

        show_first_data();
    </script>
@endsection
