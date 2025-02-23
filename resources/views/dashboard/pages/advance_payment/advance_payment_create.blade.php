@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')
        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('advance_payments.store') }}">
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
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Pdl<span
                                class="text-red-600">*</span></label>
                        <select required name="pdl_id" id="pdl"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                            <option value="">Select Branch Office First</option>
                        </select>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Balance<span
                                class="text-red-600">*</span></label>
                        <input required type="number" name="balance" id="balance"
                            class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <button type="button" ondrop="handledrop(event)" ondragenter="dragstart(event)"
                    ondragleave="dragend(event)" ondragover="event.preventDefault()"
                    onclick="document.getElementById('proof_advance_payment').click()"
                    class="button border-dashed text-left max-w-52 relative  bg-white border flex items-center  py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <span class=" text-xs px-4 z-10 text-gray-500 whitespace-nowrap">Member image<span
                                class="text-red-600">*</span></span>
                        <input type="file" onChange="handlefilechange(event)" id="proof_advance_payment"
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




                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
        const head_office = document.getElementById("head_office");
        const branch_office = document.getElementById("branch_office");
        const pdl = document.getElementById("pdl");
        let dragzone = 0;

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
                const response = await fetch(`http://127.0.0.1:8000/api/v1/get_branch_offices/head_office/` +
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

        async function get_pdls_from_branch(branch_office) {

            pdl.innerHTML = `
                    <option value="">Loading...</option>
                `;

            if (branch_office == "") {
                pdl.innerHTML = `
                    <option value="">Select Head Office First</option>
                `;

            } else {
                const response = await fetch(`http://127.0.0.1:8000/api/v1/pdls/branch_employee/branch/` +
                    branch_office, api_config());

                const data = await response.json();

                if (data.body.length != 0) {
                    pdl.innerHTML = `
        <option value="">Select Branch Office</option>
    `;

                } else {
                    pdl.innerHTML = `
        <option value="">Not Have Branch Office</option>
    `;

                }

                data.body.forEach(item => {
                    pdl.innerHTML += `
        <option value="${item.id}" >${item.pdl_name}</option>
    `;
                });

            }

        }






        head_office.addEventListener("change", (event) => {
            get_branch_offices(event.target.value);
        })
        branch_office.addEventListener("change", (event) => {
            get_pdls_from_branch(event.target.value);
        })

        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
