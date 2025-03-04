@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" enctype="multipart/form-data" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('members.store') }}">
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
                        <select required name="branch_office" id="branch_office"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Head Office First</option>
                        </select>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Resort<span
                                class="text-red-600">*</span></label>
                        <select required name="resort" id="resort"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Branch Office First</option>

                        </select>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Detailresort<span
                                class="text-red-600">*</span></label>
                        <select required name="detail_resort" id="detail_resort"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Resort First</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Member Name<span
                                    class="text-red-600">*</span></label>
                            <input type="text" required name="member_name" id="member_name"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">
                            </input>
                        </div>
                    </div>

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Birthday Date<span
                                    class="text-red-600">*</span></label>
                            <input type="date" required name="birthday_date" id="birthday_date"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">
                            </input>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class=" text-xs text-gray-500 whitespace-nowrap">Province<span
                                    class="text-red-600">*</span></label>
                            <select required name="province" id="province"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                <option value="">Select Province</option>
                            </select>
                        </div>
                    </div>

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">City Or Regency<span
                                    class="text-red-600">*</span></label>
                            <select required name="city_or_regency" id="city_or_regency"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                <option value="">Select Province First</option>
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
                                <option value="">Select city Or Regency First</option>
                            </select>
                        </div>
                    </div>

                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Village<span
                                    class="text-red-600">*</span></label>
                            <select required name="village" id="village"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                <option value="">Select District First</option>
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
                                </input>
                                <span class="px-3">/</span>
                                <input type="number" required name="rw" id="rw"
                                    class="w-full flex-1 text-center outline-hidden  text-sm border-none shadow-none ">
                                </input>

                            </div>
                        </div>
                    </div>

                    <div class="button bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Phone Number<span
                                    class="text-red-600">*</span></label>
                            <input type="number" required name="phone_number" id="phone_number"
                                class="w-full outline-hidden  text-sm border-none shadow-none ">
                            </input>
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
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">KTP Number<span
                                class="text-red-600">*</span></label>
                        <input type="number" required name="ktp" id="ktp"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">KK Number<span
                                class="text-red-600">*</span></label>
                        <input type="number" required name="kk" id="kk"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <button type="button" ondrop="handledrop(event)" ondragenter="dragstart(event)"
                    ondragleave="dragend(event)" ondragover="event.preventDefault()"
                    onclick="document.getElementById('member_image_input').click()"
                    class="button border-dashed text-left max-w-52 relative  bg-white border flex items-center  py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <span class=" text-xs px-4 z-10 text-gray-500 whitespace-nowrap">Member image<span
                                class="text-red-600">*</span></span>
                        <input type="file" onChange="handlefilechange(event)" id="member_image_input"
                            name="member_image" class="opacity-0 absolute -z-10">
                        </input>
                        <div
                            class="max-w-52  h-40 flex pt-[1rem] text-center  items-center justify-center first-show-previmage">
                            <div class="items-center flex flex-col">
                                <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                                <span class="text-sm">Select Or Drop Image</span>
                                <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                            </div>
                        </div>
                        <div class="max-w-52 rounded-xl overflow-hidden mx-4 my-2">
                            <img id="member_image" class="w-full h-full object-cover " alt="">

                        </div>

                    </div>
                    <div
                        class="max-w-52 invisible opacity-0 second-show-previmage flex items-center bg-stone-100 justify-center absolute top-0 pt-[1rem] bottom-0  rounded-xl left-0 right-0 ">
                        <div class="items-center flex flex-col">
                            <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                            <span class="text-sm">Drop The Image</span>
                            <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                        </div>
                    </div>

                </button>
                <button type="button" ondrop="handledrop(event)" ondragenter="dragstart(event)"
                    ondragleave="dragend(event)" ondragover="event.preventDefault()"
                    onclick="document.getElementById('member_ktp_image_input').click()"
                    class="button border-dashed text-left max-w-52 relative  bg-white border flex items-center  py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <span class=" text-xs px-4 z-10 text-gray-500 whitespace-nowrap">Member KTP image<span
                                class="text-red-600">*</span></span>
                        <input type="file" onChange="handlefilechange(event)" id="member_ktp_image_input"
                            name="member_ktp_image" class="opacity-0 absolute -z-10">
                        </input>
                        <div
                            class="max-w-52  h-40 flex pt-[1rem] text-center items-center justify-center first-show-previmage">
                            <div class="items-center flex flex-col">
                                <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                                <span class="text-sm">Select Or Drop Image</span>
                                <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                            </div>
                        </div>
                        <div class="max-w-52 rounded-xl overflow-hidden mx-4 my-2 ">
                            <img id="member_ktp_image" class=" w-full h-full object-cover" alt="">

                        </div>

                    </div>
                    <div
                        class="max-w-52 invisible opacity-0 second-show-previmage flex items-center bg-stone-100 justify-center absolute top-0 pt-[1rem] bottom-0  rounded-xl left-0 right-0 ">
                        <div class="items-center flex flex-col">
                            <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                            <span class="text-sm">Drop The Image</span>
                            <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                        </div>
                    </div>

                </button>
                <button type="button" ondrop="handledrop(event)" ondragenter="dragstart(event)"
                    ondragleave="dragend(event)" ondragover="event.preventDefault()"
                    onclick="document.getElementById('member_hold_ktp_image_input').click()"
                    class="button border-dashed text-left max-w-52 relative  bg-white border flex items-center  py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <span class=" text-xs px-4 z-10 text-gray-500 whitespace-nowrap">Member Hold KTP image<span
                                class="text-red-600">*</span></span>
                        <input type="file" onChange="handlefilechange(event)" id="member_hold_ktp_image_input"
                            name="member_hold_ktp_image" class="opacity-0 absolute -z-10">
                        </input>
                        <div
                            class="max-w-52  h-40 flex pt-[1rem] text-center items-center justify-center first-show-previmage">
                            <div class="items-center flex flex-col">
                                <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                                <span class="text-sm">Select Or Drop Image</span>
                                <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                            </div>
                        </div>
                        <div class="max-w-52 rounded-xl overflow-hidden mx-4 my-2" alt="">
                            <img id="member_hold_ktp_image" class="w-full h-full object-cover" alt="">

                        </div>

                    </div>
                    <div
                        class="max-w-52 invisible opacity-0 second-show-previmage flex items-center bg-stone-100 justify-center absolute top-0 pt-[1rem] bottom-0  rounded-xl left-0 right-0 ">
                        <div class="items-center flex flex-col">
                            <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                            <span class="text-sm">Drop The Image</span>
                            <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                        </div>
                    </div>

                </button>

                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Business<span
                                class="text-red-600">*</span></label>
                        <input type="text" required name="business" id="business"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>

                <button type="button" ondrop="handledrop(event)" ondragenter="dragstart(event)"
                    ondragleave="dragend(event)" ondragover="event.preventDefault()"
                    onclick="document.getElementById('business_image_input').click()"
                    class="button border-dashed text-left max-w-52 relative  bg-white border flex items-center  py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <span class=" text-xs px-4 z-10 text-gray-500 whitespace-nowrap">Business image<span
                                class="text-red-600">*</span></span>
                        <input type="file" onChange="handlefilechange(event)" id="business_image_input"
                            name="business_image" class="opacity-0 absolute -z-10">
                        </input>
                        <div
                            class="max-w-52  h-40 flex pt-[1rem] text-center items-center justify-center first-show-previmage">
                            <div class="items-center flex flex-col">
                                <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                                <span class="text-sm">Select Or Drop Image</span>
                                <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                            </div>
                        </div>
                        <div class="max-w-52 rounded-xl overflow-hidden mx-4 my-2 ">
                            <img id="business_image" class=" w-full h-full object-cover" alt="">

                        </div>

                    </div>
                    <div
                        class="max-w-52 invisible opacity-0 second-show-previmage flex items-center bg-stone-100 justify-center absolute top-0 pt-[1rem] bottom-0  rounded-xl left-0 right-0 ">
                        <div class="items-center flex flex-col">
                            <span class="text-3xl mb-3"><i class="fa-light fa-file-arrow-up"></i></span>
                            <span class="text-sm">Drop The Image</span>
                            <p class="text-xs text-stone-500">Max Size Image Is Under 10mb</p>
                        </div>
                    </div>

                </button>

                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Business Location<span
                                class="text-red-600">*</span></label>
                        <textarea required name="business_location" id="business_location"
                            class="w-full outline-hidden h-32 text-sm border-none shadow-none "></textarea>
                    </div>
                </div>
                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
        const branch_office = document.getElementById("branch_office");
        const resort = document.getElementById("resort");
        const detail_resort = document.getElementById("detail_resort");
        const city_or_regency = document.getElementById("city_or_regency");
        const district = document.getElementById("district");
        const village = document.getElementById("village");
        const rt = document.getElementById("rt");
        const rw = document.getElementById("rw");
        let rtvalue = null;
        let rwvalue = null;
        const phone_number = document.getElementById("phone_number");
        const ktp = document.getElementById("ktp");
        const kk = document.getElementById("kk");
        const rt_and_rw = document.getElementById("rt_and_rw");
        const formpost = document.getElementById("formpost");
        let dragzone = 0;


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

        function handlefilechange(event) {
            const inputname = event.target.name;
            const inputfile = event.target.files[0];
            const img = document.getElementById(`${inputname}`);
            const first_show_preimage = event.target.closest('button').querySelector(`.first-show-previmage`);
            img.src = URL.createObjectURL(inputfile);
            img.classList.remove("hidden");
            first_show_preimage.classList.add("hidden");
        }

        function dragstart(event) {
            const second_show_previmage = event.target.closest('button').querySelector(`.second-show-previmage`);
            dragzone++;
            if (dragzone != 0) {
                second_show_previmage.classList.add("!visible");
                second_show_previmage.classList.add("!opacity-100");
            }
        }

        function dragend(event) {
            const second_show_previmage = event.target.closest('button').querySelector(`.second-show-previmage`);
            dragzone--;
            if (dragzone == 0) {
                second_show_previmage.classList.remove("!visible");
                second_show_previmage.classList.remove("!opacity-100");
            }
        }

        function handledrop(event) {
            event.preventDefault();
            const elementinput = event.target.closest('button').querySelector("input[type='file']");
            elementinput.files = event.dataTransfer.files;
            const img = document.getElementById(`${elementinput.name}`);
            const first_show_preimage = event.target.closest('button').querySelector(`.first-show-previmage`);
            img.src = URL.createObjectURL(event.dataTransfer.files[0]);
            img.classList.remove("hidden");
            first_show_preimage.classList.add("hidden");
            const second_show_previmage = event.target.closest('button').querySelector(`.second-show-previmage`);
            dragzone--;
            if (dragzone == 0) {
                second_show_previmage.classList.remove("!visible");
                second_show_previmage.classList.remove("!opacity-100");
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


        rt.addEventListener("input", (event) => {
            setting_length_number(event, 2)
        })
        rw.addEventListener("input", (event) => {
            setting_length_number(event, 2)
        })
        phone_number.addEventListener("input", (event) => {
            setting_length_number(event, 13)
        })
        ktp.addEventListener("input", (event) => {
            setting_length_number(event, 16)
        })
        kk.addEventListener("input", (event) => {
            setting_length_number(event, 16)
        })




        branch_office.innerHTML = `
                    <option value="">Select Branch Office</option>
                `;
        resort.innerHTML = `
                    <option value="">Select Branch Office First</option>
                `;
        detail_resort.innerHTML = `
                    <option value="">Select Resort First</option>
                `;
        city_or_regency.innerHTML = `
                    <option value="">Select Province First</option>
                `;
        district.innerHTML = `
                    <option value="">Select city Or Regency First</option>
                `;
        village.innerHTML = `
                    <option value="">Select District First</option>
                `;









        async function get_branch_offices(head_office) {

            branch_office.innerHTML = `
                    <option value="">Loading...</option>
                `;
            if (head_office == "") {
                branch_office.innerHTML = `
                    <option value="">Select Head Office First</option>
                `;

            } else {
                const response = await fetch(`http://127.0.0.1:8000/api/v1/get_branch_offices/head_office/` +
                    head_office, api_config());
                const data = await response.json();

                if (data.body.length != 0) {
                    branch_office.innerHTML = `
                        <option value="">Select Branch Office</option>
                    `;
                    data.body.forEach(item => {

                        branch_office.innerHTML += `
                            <option value="${item.id}" >${item.branch_name}</option>
                            `;


                    });
                } else {
                    branch_office.innerHTML = `
                        <option value="">Not Have Branch Office</option>
                    `;

                }

            }
            get_resort("");
        }


        async function get_resort(branch_office) {

            resort.innerHTML = `
                    <option value="">Loading...</option>
                `;

            if (branch_office == "") {
                resort.innerHTML = `
                    <option value="">Select Resort First</option>
                `;

            } else {
                const response = await fetch(
                    `http://127.0.0.1:8000/api/v1/resorts/branch_office/${branch_office}/resort`,
                    api_config());
                const data = await response.json();

                if (data.body.length != 0) {

                    resort.innerHTML = `
                          <option value="">Select Resort</option>
                        `;
                    data.body.forEach(item => {

                        resort.innerHTML += `
                            <option value="${item.id}" >${item.resort_number}</option>
                            `;


                    });


                } else {
                    resort.innerHTML = `
                        <option value="">Not Have Resort</option>
                    `;


                }

            }
            get_detail_resort("");
        }

        async function get_detail_resort(resort) {
            detail_resort.innerHTML = `
                    <option value="">Loading...</option>
                `;
            if (resort == "") {
                detail_resort.innerHTML = `
                    <option value="">Select Resort First</option>
                `;
            } else {
                const response = await fetch(
                    `http://127.0.0.1:8000/api/v1/detailresorts/resort/${resort}/detailresort`,
                    api_config());
                const data = await response.json();

                if (data.body.length != 0) {

                    detail_resort.innerHTML = `
                          <option value="">Select Detail Resort</option>
                        `;
                    data.body.forEach(item => {

                        detail_resort.innerHTML = `
                            <option value="${item.id}" >${item.day_code}</option>
                            `;

                    });
                } else {
                    detail_resort.innerHTML = `
                        <option value="">Not Have Detail Resort</option>
                    `;

                }

            }
        }

        async function get_province() {


            province.innerHTML = `
                    <option value="">Loading...</option>
                `;

            const response = await fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`);
            const data = await response.json();

            if (data.length != 0) {

                province.innerHTML = `
                          <option value="">Select Province</option>
                        `;

                data.forEach(item => {

                    province.innerHTML +=
                        `
                        <option value="${item.name}" data-id="${item.id}">${item.name}</option>                            `;


                });
            } else {
                province.innerHTML = `
                        <option value="">Cant Get Province Data</option>
                    `;
            }
            get_city_or_regency("");

        }





        async function get_city_or_regency(province_id) {

            city_or_regency.innerHTML = `
                    <option value="">Loading...</option>
                `;

            if (province_id == "") {
                city_or_regency.innerHTML = `
                    <option value="">Select Province First</option>
                `;

            } else {
                const response = await fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province_id}.json`);
                const data = await response.json();

                if (data.length != 0) {

                    city_or_regency.innerHTML = `
                          <option value="">Select City Or Regency</option>
                        `;

                    data.forEach(item => {

                        city_or_regency.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                            `;


                    });

                } else {
                    city_or_regency.innerHTML = `
                        <option value="">Not Have City Or Regency</option>
                    `;

                }

            }
            get_district("");
        }

        async function get_district(city_or_regency_id) {


            district.innerHTML = `
                    <option value="">Loading...</option>
                `;

            if (city_or_regency_id == "") {
                district.innerHTML = `
                    <option value="">Select City Or Regency First</option>
                `;

            } else {
                const response = await fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${city_or_regency_id}.json`);
                const data = await response.json();
                if (data.length != 0) {

                    district.innerHTML = `
                          <option value="">Select District</option>
                        `;

                    data.forEach(item => {

                        district.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                            `;


                    });

                } else {
                    district.innerHTML = `
                        <option value="">Not Have District</option>
                    `;

                }


            }
            get_village("");
        }


        async function get_village(district_id) {

            village.innerHTML = `
                    <option value="">Loading...</option>
                `;

            if (district_id == "") {
                village.innerHTML = `
                    <option value="">Select City Or Regency First</option>
                `;
            } else {
                const response = await fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${district_id}.json`);
                const data = await response.json();

                if (data.length != 0) {

                    village.innerHTML = `
                          <option value="">Select Village</option>
                        `;

                    data.forEach(item => {

                        village.innerHTML += `
                    <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                            `;

                    });

                } else {
                    village.innerHTML = `
                        <option value="">Not Have Village</option>
                    `;

                }

            }


        }

        head_office.addEventListener("change", (event) => {
            get_branch_offices(event.target.value);
        })

        province.addEventListener("change", (event) => {
            get_city_or_regency(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
        })

        city_or_regency.addEventListener("change", (event) => {

            get_district(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
        })

        district.addEventListener("change", (event) => {
            get_village(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
        })

        branch_office.addEventListener("change", (event) => {
            get_resort(event.target.value);
        })
        resort.addEventListener("change", (event) => {
            get_detail_resort(event.target.value);
        })



        formpost.addEventListener("submit", (event) => {
            event.preventDefault();
            rtvalue = rt.value;
            rwvalue = rw.value;
            rt_and_rw.value = rtvalue + "" + rwvalue;
            event.target.submit();
        });

        get_province();

        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
