@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="head_employee.renew_password" method="PUT" :actionparam="['role' => $role, 'id' => $head_employee->id]" :input="[
        'input' => [
            [
                'label' => 'New Password',
                'type' => 'password',
                'name' => 'password',
                'id' => 'password',
            ],
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
