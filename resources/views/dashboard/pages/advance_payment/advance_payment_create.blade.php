@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="advance_payments.store" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'detail_resort',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['detail_resort' => ['name' => 'detail_resort_id', 'detail_resort_filtered_day' => true]],
        ],

        'input' => [
            [
                'label' => 'Balance',
                'name' => 'balance',
                'id' => 'balance',
                'type' => 'number',
            ],
            [
                'label' => 'Proof Advance Payment',
                'type' => 'image',
                'name' => 'proof_advance_payment',
                'id' => 'proof_advance_payment_input',
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
