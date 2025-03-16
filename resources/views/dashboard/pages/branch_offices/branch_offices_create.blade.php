@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="branch_offices.store" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'head_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['head_office' => ['name' => 'head_id']],
        ],

        'input' => [
            [
                'label' => 'Branch Name',
                'name' => 'branch_name',
                'id' => 'branch_name',
            ],
        ],

        'selectaddress' => [
            'selectaddressfromheadoffice' => true,
            'selectaddresslimit' => 'head_office',
        ],

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

        'input2' => [
            [
                'label' => 'Street Or Building Name',
                'name' => 'street_or_building_name',
                'id' => 'street_or_building_name',
                'type' => 'textarea',
            ],
            [
                'label' => 'Max Resort',
                'name' => 'maxresort',
                'id' => 'maxresort',
                'type' => 'number',
            ],
            [
                'label' => 'Service Charge',
                'name' => 'service_charge',
                'id' => 'service_charge',
                'type' => 'number',
                'endinputattr' => '%',
            ],
            [
                'label' => 'Admin Charge',
                'name' => 'admin_charge',
                'id' => 'admin_charge',
                'type' => 'number',
                'endinputattr' => '%',
            ],
            [
                'label' => 'Commision Charge',
                'name' => 'comision_charge',
                'id' => 'comision_charge',
                'type' => 'number',
                'endinputattr' => '%',
            ],
            [
                'label' => 'Deposite',
                'name' => 'deposite',
                'id' => 'deposite',
                'type' => 'number',
                'endinputattr' => '%',
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
