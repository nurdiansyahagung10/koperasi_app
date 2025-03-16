@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'branch_employees.create',
        'LinkParamCreate' => ['role' => $role],
    ])
@endsection

@section('Content')
    <x-datatable :data="['No', 'Name', 'Email', 'Head Office', 'Branch Office', 'Created At', 'Action']"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
