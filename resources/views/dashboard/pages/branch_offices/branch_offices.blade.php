@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'branch_offices.create',
    ])
@endsection

@section('Content')
    <x-datatable :data="[
        'No',
        'Branch Name',
        'Province',
        'Phone Number',
        'Services Charge',
        'Admin Charge',
        'Commision Charge',
        'Deposite',
        'Created At',
        'Action',
    ]"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
