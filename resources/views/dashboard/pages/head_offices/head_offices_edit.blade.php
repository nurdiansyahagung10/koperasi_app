@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="head_offices.update" method="PUT" :actionparam="['head_office' => $head_offices->id]" :input="[
        'selectaddress' => ['selectaddresslimit' => 'village', 'selectaddressvalue' => $head_offices],

        'inputgroup' => [
            ['label' => 'Rt / Rw', 'type' => 'rtrw', 'value' => $head_offices->rt_and_rw],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'value' => $head_offices->phone_number,
            ],
        ],

        'input' => [
            [
                'label' => 'Street Or Building Name',
                'type' => 'textarea',
                'name' => 'street_or_building_name',
                'id' => 'street_or_building_name',
                'value' => $head_offices->street_or_building_name,
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
