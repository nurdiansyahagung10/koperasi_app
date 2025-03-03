@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard" class="flex-1">
        <h1 class="text-xl mt-2.5 font-medium">Detail Member</h1>
        <div class="flex flex-col gap-2">
            <div class="border mt-4 rounded-2xl p-5 flex gap-5">
                <div class="w-20 h-20 rounded-full overflow-hidden">
                    <img src="{{ asset('storage/' . $members->member_image) }}" class="w-full h-full object-cover"
                        alt="">
                </div>
                <div class="flex flex-col justify-between">
                    <span class="font-medium ">{{ $members->member_name }}</span>
                    <div>
                        <button class="text-sm  rounded-2xl flex gap-1 items-center">
                            <span class="text-green-500">Member Aktif</span>
                            <div class="w-2 h-2 rounded-full relative bg-green-500">
                                <div class="w-2 h-2 rounded-full bg-green-500 animate-ping absolute"></div>
                            </div>
                        </button>
                        <span
                            class="font-medium text-xs">{{ $members->detail_resorts->day_code }}{{ $members->detail_resorts->resorts->resort_number }}</span><span
                            class="text-stone-500 text-xs">-{{ $members->detail_resorts->resorts->branch_offices->branch_name }}-{{ $members->detail_resorts->resorts->branch_offices->head_offices->province }}</span>
                    </div>
                </div>

            </div>
            <div class="border mt-4 rounded-2xl p-5 flex gap-5">
                <div class="flex flex-col justify-between w-full">
                    <div class="flex justify-between">
                        <span class="font-medium">Personal Information</span>

                        <div>
                            <button class="text-lg px-2" id="switch-personal-information"><i
                                    class="fa-light fa-arrows-repeat"></i></button>

                        </div>
                    </div>

                    <div class="hidden" id="main-personal-information">

                        <div class="mt-5 grid grid-cols-4 ">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Birthday Date</span>
                                    <span class="text-sm">{{ $members->birthday_date }}</span>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Phone Number</span>
                                    <span class="text-sm">{{ $members->phone_number }}</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Created At</span>
                                    <span class="text-sm">{{ $members->created_at->format('Y-m-d') }}</span>
                                </div>

                            </div>
                            <div class="flex flex-col gap-5 col-span-3">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">KTP Number</span>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <span id="ktp" class="text-stone-500 "></span>
                                        </div>
                                        <button class="flex items-center cursor-pointer" name="ktp"
                                            id="ktp-show"><span><i class="fa-light fa-eye"></i></span></button>
                                    </div>


                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">KK Number</span>
                                    <div class="flex items-center gap-3">
                                        <div>
                                            <span id="kk" class="text-stone-500 "></span>
                                        </div>
                                        <button class="flex items-center cursor-pointer" name="kk"
                                            id="kk-show"><span><i class="fa-light fa-eye"></i></span></button>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="mt-5 flex gap-8 flex-wrap ">



                            <div class="flex flex-col gap-2">
                                <span class="text-xs text-stone-500">KTP </span>
                                <div class="h-60 w-60 rounded-2xl overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $members->member_ktp_image) }}" alt="">
                                </div>
                            </div>


                            <div class="flex flex-col gap-2">
                                <span class="text-xs text-stone-500">Birthday Date</span>
                                <div class="h-60 w-60 rounded-2xl overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $members->member_hold_ktp_image) }}" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class=" pr-9" id="address-information">

                        <div class="mt-5 grid grid-cols-4">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Province</span>
                                    <span class="text-sm">{{ $members->province }}</span>
                                </div>

                                <div class="flex  flex-col gap-2">
                                    <span class="text-xs text-stone-500">District</span>
                                    <span class="text-sm whitespace-nowrap">{{ $members->district }}</span>
                                </div>
                                <div class="flex  flex-col gap-2">
                                    <span class="text-xs text-stone-500">Village</span>
                                    <span class="text-sm whitespace-nowrap">{{ $members->village }}</span>
                                </div>

                            </div>
                            <div class="flex flex-col ms-4 gap-5 col-span-3">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Rt And Rw</span>
                                    <span class="text-sm">{{ substr($members->rt_and_rw, 0, 2) }} /
                                        {{ substr($members->rt_and_rw, 2, 4) }}</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Street Or Building Name</span>
                                    <span class="text-sm">{{ $members->street_or_building_name }}</span>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>
            <div class="border mt-4 rounded-2xl p-5 flex gap-5">
                <div class="flex flex-col justify-between w-full">
                    <div class="flex justify-between">
                        <span class="font-medium">Business Information</span>


                    </div>

                    <div>

                        <div class="mt-5  grid grid-cols-4">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Business</span>
                                    <span class="text-sm">{{ $members->business }}</span>
                                </div>



                            </div>
                            <div class="flex flex-col gap-5 col-span-3">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Business Location</span>
                                    <span class="text-sm">{{ $members->business_location }}</span>
                                </div>




                            </div>
                        </div>
                        <div class="mt-5 flex gap-5 flex-wrap ">



                            <div class="flex flex-col gap-2">
                                <span class="text-xs text-stone-500">Business Image</span>
                                <div class="h-60 w-60 rounded-2xl overflow-hidden">
                                    <img class="w-full h-full object-cover"
                                        src="{{ asset('storage/' . $members->business_image) }}" alt="">
                                </div>
                            </div>




                        </div>
                    </div>


                </div>

            </div>
        </div>

    </section>
    <script>
        const ktp = {{ $members->ktp }};
        const kk = {{ $members->ktp }};
        const switch_personal_information = document.getElementById("switch-personal-information");
        const main_personal_information = document.getElementById("main-personal-information");
        const address_information = document.getElementById("address-information");

        switch_personal_information.addEventListener("click", () => {
            main_personal_information.classList.toggle("hidden");
            address_information.classList.toggle("hidden");
        })

        for (let i = 0; i < 16; i++) {
            document.getElementById("ktp").innerHTML += "•";
            document.getElementById("kk").innerHTML += "•";
        }

        let ktpcounter = 0;
        let kkcounter = 0;

        document.getElementById("ktp-show").addEventListener("click", (event) => {
            const text = document.getElementById(`${event.target.closest("button").name}`);
            if (ktpcounter == 0) {
                text.innerHTML = ktp;
                text.classList.toggle("text-stone-500");
                event.target.closest("button").innerHTML = `<span><i class="fa-light fa-eye-slash"></i></span>`;
                ktpcounter++
            } else {
                let hidden = "";
                for (let i = 0; i < 16; i++) {
                    hidden += "•";
                }
                text.innerHTML = hidden;
                text.classList.toggle("text-stone-500");
                event.target.closest("button").innerHTML = `<span><i class="fa-light fa-eye"></i></span>`;
                hidden = "";
                ktpcounter--
            }
        });
        document.getElementById("kk-show").addEventListener("click", (event) => {
            const text = document.getElementById(`${event.target.closest("button").name}`);
            if (kkcounter == 0) {
                text.innerHTML = kk;
                text.classList.toggle("text-stone-500");
                event.target.closest("button").innerHTML = `<span><i class="fa-light fa-eye-slash"></i></span>`;
                kkcounter++
            } else {
                let hidden = "";
                for (let i = 0; i < 16; i++) {
                    hidden += "•";
                }
                text.innerHTML = hidden;
                text.classList.toggle("text-stone-500");
                event.target.closest("button").innerHTML = `<span><i class="fa-light fa-eye"></i></span>`;
                hidden = "";
                kkcounter--
            }
        });




        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
