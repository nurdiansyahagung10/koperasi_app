@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="advance_payments.store" method="PUT" :actionparam="['advance_payment' => $advance_payment->id]" :input="[
        'input' => [
            [
                'label' => 'Balance',
                'name' => 'balance',
                'id' => 'balance',
                'type' => 'number',
                'value' => $advance_payment->balance,
            ],
            [
                'label' => 'Proof Advance Payment',
                'type' => 'image',
                'name' => 'proof_advance_payment',
                'id' => 'proof_advance_payment_input',
                'value' => $advance_payment->proof_advance_payment,
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection

