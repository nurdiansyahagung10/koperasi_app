@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="pdls.update" method="PUT" :actionparam="['pdl' => $pdl->id]" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'branch_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => [
                'branch_office' => ['name' => 'branch_id'],
                'head_office' => ['name' => 'head_id'],
            ],
            'selectofficevalue' => $pdl,
        ],

        'input' => [
            [
                'label' => 'PDL Name',
                'name' => 'pdl_name',
                'id' => 'pdl_name',
                'value' => $pdl->pdl_name,
            ],
            [
                'label' => 'Basic Salary',
                'name' => 'basic_salary',
                'id' => 'basic_salary',
                'type' => 'number',
                'value' => $pdl->basic_salary,
            ],
            [
                'label' => 'Hometown',
                'name' => 'hometown',
                'id' => 'hometown',
                'type' => 'textarea',
                'value' => $pdl->hometown,
            ],
            [
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'type' => 'number',
                'maxlength' => '13',
                'value' => $pdl->phone_number,
            ],
            [
                'label' => 'SK',
                'name' => 'sk',
                'id' => 'sk',
                'type' => 'string',
                'value' => $pdl->sk,
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
