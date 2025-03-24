@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <div class="border mt-4 rounded-2xl p-5 flex gap-5">
        <div class="w-20 h-20 rounded-full overflow-hidden">
            <img src="{{ asset('storage/' . $loan_application->member->member_image) }}" class="w-full h-full object-cover"
                alt="">
        </div>
        <div class="flex flex-col justify-between">
            <span class="font-medium ">{{ $loan_application->member->member_name }}</span>
            <div>
                <button class="text-sm  rounded-2xl flex gap-1 items-center">
                    <span class="text-green-500">Member Aktif</span>
                    <div class="w-2 h-2 rounded-full relative bg-green-500">
                        <div class="w-2 h-2 rounded-full bg-green-500 animate-ping absolute"></div>
                    </div>
                </button>
                <span
                    class="font-medium text-xs">{{ $loan_application->member->detail_resorts->day_code }}{{ $loan_application->member->detail_resorts->resorts->resort_number }}</span><span
                    class="text-stone-500 text-xs">-{{ $loan_application->member->detail_resorts->resorts->branch_offices->branch_name }}-{{ $loan_application->member->detail_resorts->resorts->branch_offices->head_offices->province }}</span>
            </div>
        </div>

    </div>
    <div class="border mt-4 rounded-2xl p-5 flex gap-5">
        <div class="flex flex-col justify-between w-full">
            <div class="flex justify-between">
                <span class="font-medium">Loan Application Information</span>
                @switch($loan_application->status)
                    @case(1)
                        <button class="bg-yellow-400 text-white px-2 rounded-xl text-xs">New Application</button>
                    @break

                    @case(2)
                        <button class="bg-green-400 text-white px-2 rounded-xl text-xs">Approved</button>
                    @break

                    @case(3)
                        <button class="bg-red-400 text-white px-2 rounded-xl text-xs">Rejected</button>
                    @break

                    @default
                @endswitch
            </div>

            <div>

                <div class="mt-5 grid grid-cols-4 ">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">action Date</span>
                            <span class="text-sm">{{ $loan_application->action_date ?? 'Not Yet' }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">action By</span>
                            @if ($loan_application->status == 1)
                                <form class=" flex max-w-[13rem] gap-3 "
                                    action="{{ route('loan_applications.action', ['loan_application' => $loan_application->id]) }}"
                                    method="post"> @csrf @method('PUT')
                                    <button name="Approve"
                                        class="bg-white border shadow-xs py-0.5 cursor-pointer rounded-lg w-full">Approve</button>
                                    <button type="button"
                                        onclick="document.getElementById('modal-Rejected').classList.add('!visible', '!opacity-100')"
                                        class="bg-red-500 text-white shadow-xs py-0.5 cursor-pointer rounded-lg w-full">Rejected</button>


                                    <div id="modal-Rejected" class="relative invisible opacity-0 z-10"
                                        aria-labelledby="modal-title" role="dialog" aria-modal="true">

                                        <div class="fixed inset-0 bg-black opacity-65 transition-opacity"
                                            aria-hidden="true">
                                        </div>

                                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                            <div
                                                class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                                                <div
                                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                        <div class="sm:flex sm:items-start">
                                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                <h3 class="text-base font-semibold text-gray-900"
                                                                    id="modal-title">Rejected Loan Application?
                                                                </h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">Are you sure you want
                                                                        to
                                                                        Rejected Your Loan Application?
                                                                        This
                                                                        action cannot be undone.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                        <button id="final-choices-Rejected" name="Rejected"
                                                            class="inline-flex w-full justify-center rounded-md cursor-pointer bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
                                                        <button type="button"
                                                            onclick="document.getElementById('modal-Rejected').classList.remove('!visible', '!opacity-100')"
                                                            id="modal-button-hidden-Rejected"
                                                            class="mt-3 inline-flex w-full justify-center rounded-md cursor-pointer bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <span class="text-sm">{{ $loan_application->user_action_by->user_name }}</span>
                            @endif
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Pdl</span>
                            <span class="text-sm">{{ $loan_application->pdl->pdl_name }}</span>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Applicaiton At</span>
                            <span class="text-sm">{{ $loan_application->created_at->format('Y-m-d') }}</span>
                        </div>

                    </div>
                    <div class="flex flex-col gap-5 col-span-3">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Nominal Loan Application</span>
                            <span class="text-sm">{{ $loan_application->nominal_loan_application }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Loan To</span>
                            <span class="text-sm">1</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Binding Letter</span>
                            <span class="text-sm">{{ $loan_application->binding_letter }}</span>
                        </div>
                    </div>


                </div>
                <div class="mt-5 flex gap-8 flex-wrap ">



                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-stone-500">Binding Letter Image </span>
                        <div class="h-60 w-60 rounded-2xl overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $loan_application->binding_letter_image) }}" alt="">
                        </div>
                    </div>




                </div>
            </div>

        </div>
    </div>
    <div class="border mt-4 rounded-2xl p-5 flex gap-5">
        <div class="flex flex-col justify-between w-full">
            <div class="flex justify-center">
                <span class="font-medium">Not Have Track Loan</span>

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
                            <span class="text-sm">{{ $loan_application->member->birthday_date }}</span>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Phone Number</span>
                            <span class="text-sm">{{ $loan_application->member->phone_number }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Created At</span>
                            <span class="text-sm">{{ $loan_application->member->created_at->format('Y-m-d') }}</span>
                        </div>

                    </div>
                    <div class="flex flex-col gap-5 col-span-3">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">KTP Number</span>
                            <div class="flex items-center gap-3">
                                <div>
                                    <span id="ktp" class="text-stone-500 "></span>
                                </div>
                                <button class="flex items-center cursor-pointer" name="ktp" id="ktp-show"><span><i
                                            class="fa-light fa-eye"></i></span></button>
                            </div>


                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">KK Number</span>
                            <div class="flex items-center gap-3">
                                <div>
                                    <span id="kk" class="text-stone-500 "></span>
                                </div>
                                <button class="flex items-center cursor-pointer" name="kk" id="kk-show"><span><i
                                            class="fa-light fa-eye"></i></span></button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="mt-5 flex gap-8 flex-wrap ">



                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-stone-500">KTP </span>
                        <div class="h-60 w-60 rounded-2xl overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $loan_application->member->member_ktp_image) }}"
                                alt="">
                        </div>
                    </div>


                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-stone-500">Birthday Date</span>
                        <div class="h-60 w-60 rounded-2xl overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $loan_application->member->member_hold_ktp_image) }}"
                                alt="">
                        </div>
                    </div>

                </div>
            </div>
            <div class=" pr-9" id="address-information">

                <div class="mt-5 grid grid-cols-4">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Province</span>
                            <span class="text-sm">{{ $loan_application->member->province }}</span>
                        </div>

                        <div class="flex  flex-col gap-2">
                            <span class="text-xs text-stone-500">District</span>
                            <span class="text-sm whitespace-nowrap">{{ $loan_application->member->district }}</span>
                        </div>
                        <div class="flex  flex-col gap-2">
                            <span class="text-xs text-stone-500">Village</span>
                            <span class="text-sm whitespace-nowrap">{{ $loan_application->member->village }}</span>
                        </div>

                    </div>
                    <div class="flex flex-col ms-4 gap-5 col-span-3">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Rt And Rw</span>
                            <span class="text-sm">{{ substr($loan_application->member->rt_and_rw, 0, 2) }} /
                                {{ substr($loan_application->member->rt_and_rw, 2, 4) }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Street Or Building Name</span>
                            <span class="text-sm">{{ $loan_application->member->street_or_building_name }}</span>
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
                            <span class="text-sm">{{ $loan_application->member->business }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 col-span-3">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Business Location</span>
                            <span class="text-sm">{{ $loan_application->member->business_location }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex gap-5 flex-wrap ">
                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-stone-500">Business Image</span>
                        <div class="h-60 w-60 rounded-2xl overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $loan_application->member->business_image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const ktp = {{ $loan_application->member->ktp }};
        const kk = {{ $loan_application->member->ktp }};
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
    @include('dashboard.layout.bottomjs')
@endsection
