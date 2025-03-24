@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <div class="border mt-4 rounded-2xl p-5 flex gap-5">
        <div class="w-20 h-20 rounded-full overflow-hidden">
            <img src="{{ asset('storage/' . $dropping->loan_application->member->member_image) }}"
                class="w-full h-full object-cover" alt="">
        </div>
        <div class="flex flex-col justify-between">
            <span class="font-medium ">{{ $dropping->loan_application->member->member_name }}</span>
            <div>
                <button class="text-sm  rounded-2xl flex gap-1 items-center">
                    <span class="text-green-500">Member Aktif</span>
                    <div class="w-2 h-2 rounded-full relative bg-green-500">
                        <div class="w-2 h-2 rounded-full bg-green-500 animate-ping absolute"></div>
                    </div>
                </button>
                <span
                    class="font-medium text-xs">{{ $dropping->loan_application->member->detail_resorts->day_code }}{{ $dropping->loan_application->member->detail_resorts->resorts->resort_number }}</span><span
                    class="text-stone-500 text-xs">-{{ $dropping->loan_application->member->detail_resorts->resorts->branch_offices->branch_name }}-{{ $dropping->loan_application->member->detail_resorts->resorts->branch_offices->head_offices->province }}</span>
            </div>
        </div>
    </div>
    <div class="border mt-4 rounded-2xl p-5 flex gap-5">
        <div class="flex flex-col justify-between w-full">
            <div class="flex justify-between">
                <span class="font-medium">Loan Application Information</span>

            </div>
            <div>
                <div class="mt-5 grid grid-cols-4 ">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">action Date</span>
                            <span class="text-sm">{{ $dropping->loan_application->action_date ?? 'Not Yet' }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">action By</span>
                            <span class="text-sm">{{ $dropping->loan_application->user_action_by->user_name }}</span>
                        </div>

                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Pdl</span>
                            <span class="text-sm">{{ $dropping->loan_application->pdl->pdl_name }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 col-span-3">

                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Loan To</span>
                            <span class="text-sm">1</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Binding Letter</span>
                            <span class="text-sm">{{ $dropping->loan_application->binding_letter }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Applicaiton At</span>
                            <span class="text-sm">{{ $dropping->loan_application->created_at->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex gap-8 flex-wrap ">
                    <div class="flex flex-col gap-2">
                        <span class="text-xs text-stone-500">Binding Letter Image </span>
                        <div class="h-60 w-60 rounded-2xl overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $dropping->loan_application->binding_letter_image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border mt-4 rounded-2xl p-5 flex gap-5">
        <div class="flex flex-col justify-between w-full">
            <div class="flex justify-between">
                <span class="font-medium">Dropping Information</span>
                @switch($dropping->status)
                    @case(1)
                        <button class="bg-yellow-400 text-white px-2 rounded-xl text-xs">Waiting To Drop</button>
                    @break

                    @case(2)
                        <button class="bg-green-400 text-white px-2 rounded-xl text-xs">Finished</button>
                    @break

                    @case(3)
                        <button class="bg-red-400 text-white px-2 rounded-xl text-xs">Cancelled</button>
                    @break

                    @default
                @endswitch
            </div>

            <div>
                <div class="mt-5 grid grid-cols-4 ">

                    <div class="flex flex-col gap-5 ">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Nominal Admin</span>
                            <span class="text-sm">{{ $dropping->loan_application->nominal_admin }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Nominal Provisi</span>
                            <span class="text-sm">{{ $dropping->loan_application->nominal_provisi }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Deposite</span>
                            <span class="text-sm">{{ $dropping->loan_application->nominal_deposite }}</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-5 col-span-3">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Nominal Loan Application</span>
                            <span class="text-sm">{{ $dropping->loan_application->nominal_loan_application }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Nominal Pure Dropping</span>
                            <span class="text-sm">{{ $dropping->loan_application->nominal_pure_dropping }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($dropping->status == 1)
        <div class="mt-4 flex gap-2">
            <a href="" class="border shadow-xs rounded-xl w-full py-1 text-center">Drop</a>
            <button onclick="document.getElementById('modal-cancelled').classList.add('!visible', '!opacity-100')"
                class="rounded-xl text-white w-full py-1 shadow-xs bg-red-500">Cancelled</button>
        </div>

        <div id="modal-cancelled" class="relative invisible opacity-0 z-10" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">

            <div class="fixed inset-0 bg-black opacity-65 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-base font-semibold text-gray-900" id="modal-title">cancelled dropping?
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to cancelled Your dropping?
                                            This
                                            action cannot be undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="{{ route('droppings.cancelled', ['dropping' => $dropping->id]) }}"
                            class="bg-gray-100 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            @csrf
                            @method('PUT')
                            <button id="final-choices-cancelled"
                                class="inline-flex w-full justify-center rounded-md cursor-pointer bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</button>
                            <button type="button"
                                onclick="document.getElementById('modal-cancelled').classList.remove('!visible', '!opacity-100')"
                                id="modal-button-hidden-cancelled"
                                class="mt-3 inline-flex w-full justify-center rounded-md cursor-pointer bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 shadow-xs ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('dashboard.layout.bottomjs')
@endsection
