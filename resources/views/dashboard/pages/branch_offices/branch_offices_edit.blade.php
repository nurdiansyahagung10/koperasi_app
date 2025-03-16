@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="branch_offices.store" :actionparam="['branch_office' => $branch_offices->id]" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'head_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['head_office' => ['name' => 'head_id']],
            'selectofficevalue' => $branch_offices,
        ],

        'input' => [
            [
                'label' => 'Branch Name',
                'name' => 'branch_name',
                'id' => 'branch_name',
                'value' => $branch_offices->branch_name,
            ],
        ],

        'selectaddress' => [
            'selectaddressfromheadoffice' => true,
            'selectaddresslimit' => 'head_office',
            'selectaddressvalue' => $branch_offices,
        ],

        'inputgroup' => [
            ['label' => 'Rt / Rw', 'type' => 'rtrw', 'value' => $branch_offices->rt_and_rw],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'value' => $branch_offices->phone_number,
            ],
        ],

        'input2' => [
            [
                'label' => 'Street Or Building Name',
                'name' => 'street_or_building_name',
                'id' => 'street_or_building_name',
                'type' => 'textarea',
                'value' => $branch_offices->street_or_building_name,
            ],
            [
                'label' => 'Max Resort',
                'name' => 'maxresort',
                'id' => 'maxresort',
                'type' => 'number',
                'value' => $branch_offices->maxresort,
            ],
            [
                'label' => 'Service Charge',
                'name' => 'service_charge',
                'id' => 'service_charge',
                'type' => 'number',
                'endinputattr' => '%',
                'value' => $branch_offices->service_charge,
            ],
            [
                'label' => 'Admin Charge',
                'name' => 'admin_charge',
                'id' => 'admin_charge',
                'type' => 'number',
                'endinputattr' => '%',
                'value' => $branch_offices->admin_charge,
            ],
            [
                'label' => 'Commision Charge',
                'name' => 'comision_charge',
                'id' => 'comision_charge',
                'type' => 'number',
                'endinputattr' => '%',
                'value' => $branch_offices->comision_charge,
            ],
            [
                'label' => 'Deposite',
                'name' => 'deposite',
                'id' => 'deposite',
                'type' => 'number',
                'endinputattr' => '%',
                'value' => $branch_offices->deposite,
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
