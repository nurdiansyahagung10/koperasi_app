@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="branch_employees.store" :actionparam="['role' => $role]" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'branch_office',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['head_office' => ['name' => 'head_id'],'branch_office' => ['name' => 'branch_id']],
        ],

        'input' => [
            ['label' => $role_name . ' Name', 'name' => 'user_name', 'id' => 'user_name'],
            ['label' => 'Basic Salary', 'type' => 'number', 'name' => 'basic_salary', 'id' => 'basic_salary'],
            ['label' => 'HomeTown', 'type' => 'textarea', 'name' => 'hometown', 'id' => 'hometown'],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'maxlength' => '13',
            ],
            ['label' => 'SK', 'name' => 'sk', 'id' => 'sk'],
            ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'id' => 'email'],
            ['label' => 'Password', 'type' => 'password', 'name' => 'password', 'id' => 'password'],
            [
                'label' => 'Password Confirmation',
                'type' => 'password',
                'name' => 'password_confirmation',
                'id' => 'password_confirmation',
            ],
        ],
    ]">
    </x-form>

    @include('dashboard.layout.bottomjs')
@endsection

