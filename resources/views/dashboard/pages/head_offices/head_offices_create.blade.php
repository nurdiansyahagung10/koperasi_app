@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="head_offices.store" :input="[
        'selectaddress' => ['selectaddresslimit' => 'village'],

        'inputgroup' => [
            ['label' => 'Rt / Rw', 'type' => 'rtrw'],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'phone_number',
                'id' => 'phone_number',
            ],
        ],

        'input' => [
            [
                'label' => 'Street Or Building Name',
                'type' => 'textarea',
                'name' => 'street_or_building_name',
                'id' => 'street_or_building_name',
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
