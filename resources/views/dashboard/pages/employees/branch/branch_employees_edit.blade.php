@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="branch_employees.update" method="PUT" :actionparam="['role' => $role, 'branch_employee' => $branch_employee->id]" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'branch_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['head_office' => ['name' => 'head_id'],'branch_office' => ['name' => 'branch_id']],
            'selectofficevalue' => $branch_employee,
        ],

        'input' => [
            [
                'label' => $role_name . ' Name',
                'name' => 'user_name',
                'id' => 'user_name',
                'value' => $branch_employee->user_name,
            ],
            [
                'label' => 'Basic Salary',
                'type' => 'number',
                'name' => 'basic_salary',
                'id' => 'basic_salary',
                'value' => $branch_employee->basic_salary,
            ],
            [
                'label' => 'HomeTown',
                'type' => 'textarea',
                'name' => 'hometown',
                'id' => 'hometown',
                'value' => $branch_employee->hometown,
            ],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'maxlength' => '13',
                'value' => $branch_employee->phone_number,
            ],
            ['label' => 'SK', 'name' => 'sk', 'id' => 'sk', 'value' => $branch_employee->sk],
            [
                'label' => 'Email',
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'value' => $branch_employee->email,
            ],
        ],
    ]">
    </x-form>

    @include('dashboard.layout.bottomjs')
@endsection


