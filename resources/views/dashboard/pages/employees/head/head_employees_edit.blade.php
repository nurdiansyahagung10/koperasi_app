@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="head_employees.update" method="PUT" :actionparam="['role' => $role, 'head_employee' => $head_employee->id]" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'head_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['head_office' => ['name' => 'head_id']],
            'selectofficevalue' => $head_employee,
        ],

        'input' => [
            [
                'label' => $role_name . ' Name',
                'name' => 'user_name',
                'id' => 'user_name',
                'value' => $head_employee->user_name,
            ],
            [
                'label' => 'Basic Salary',
                'type' => 'number',
                'name' => 'basic_salary',
                'id' => 'basic_salary',
                'value' => $head_employee->basic_salary,
            ],
            [
                'label' => 'HomeTown',
                'type' => 'textarea',
                'name' => 'hometown',
                'id' => 'hometown',
                'value' => $head_employee->hometown,
            ],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'maxlength' => '13',
                'value' => $head_employee->phone_number,
            ],
            ['label' => 'SK', 'name' => 'sk', 'id' => 'sk', 'value' => $head_employee->sk],
            [
                'label' => 'Email',
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'value' => $head_employee->email,
            ],
        ],
    ]">
    </x-form>

    @include('dashboard.layout.bottomjs')
@endsection
