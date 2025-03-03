@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
<section id="section-roles-dashboard" class="flex-1">
    <h1 class="text-xl mt-2.5 font-medium">Detail Advance Payment</h1>
    <div class="flex flex-col gap-2">
        <div class="border mt-4 rounded-2xl p-5 flex gap-5 w-full">
            <div class="flex flex-col justify-between w-full">
                <div class="flex justify-between">
                    <span class="font-medium">Cashier Information</span>
                </div>
                <div>
                    <div class="mt-5  grid grid-cols-4">
                        <div class="flex flex-col gap-5">

                            <div class="flex flex-col gap-2">
                                <span class="text-xs text-stone-500">Cashier</span>
                                <span class="text-sm">{{ $advance_payment->user->user_name }}</span>
                            </div>

                        </div>
                        <div class="flex flex-col gap-5 col-span-3">
                            <div class="flex flex-col gap-5 col-span-3">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Balance</span>
                                    <span class="text-sm">{{ $advance_payment->balance }}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="border mt-4 rounded-2xl p-5 flex gap-5 w-full">
            <div class="flex flex-col justify-between w-full">
                <div class="flex justify-between">
                    <span class="font-medium">Pdl Information</span>
                </div>
                <div>
                    <div class="mt-5  grid grid-cols-4">
                        <div class="flex flex-col gap-5">
                            <div class="flex flex-col gap-2">
                                <span class="text-xs text-stone-500">Date</span>
                                <span class="text-sm">{{ $advance_payment->created_at->format('Y-m-d') }}</span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <span class="text-xs text-stone-500">Pdl</span>
                                <span class="text-sm">{{ $advance_payment->pdl->pdl_name }}</span>
                            </div>

                        </div>
                        <div class="flex flex-col gap-5 col-span-3">
                            <div class="flex flex-col gap-5 col-span-3">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Province</span>
                                    <span
                                        class="text-sm">{{ $advance_payment->detail_resort->resorts->branch_offices->head_offices->province }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-5 col-span-3">
                                <div class="flex flex-col gap-2">
                                    <span class="text-xs text-stone-500">Branch Office</span>
                                    <span
                                        class="text-sm">{{ $advance_payment->detail_resort->resorts->branch_offices->branch_name }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 flex gap-5 flex-wrap ">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-stone-500">Proof Advance Payment</span>
                            <div class="h-60 w-60 rounded-2xl overflow-hidden">
                                <img class="w-full h-full object-cover"
                                    src="{{ asset('storage/' . $advance_payment->proof_advance_payment) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
