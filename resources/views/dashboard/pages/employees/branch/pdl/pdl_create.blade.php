@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="pdls.store" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'branch_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['branch_office' => ['name' => 'branch_id'], 'head_office' => ['name' => 'head_id']],
        ],

        'input' => [
            [
                'label' => 'PDL Name',
                'name' => 'pdl_name',
                'id' => 'pdl_name',
            ],
            [
                'label' => 'Basic Salary',
                'name' => 'basic_salary',
                'id' => 'basic_salary',
                'type' => 'number',
            ],
            [
                'label' => 'Hometown',
                'name' => 'hometown',
                'id' => 'hometown',
                'type' => 'textarea',
            ],
            [
                'label' => 'Phone Number',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'type' => 'number',
                'maxlength' => '13',
            ],
            [
                'label' => 'SK',
                'name' => 'sk',
                'id' => 'sk',
                'type' => 'string',
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
