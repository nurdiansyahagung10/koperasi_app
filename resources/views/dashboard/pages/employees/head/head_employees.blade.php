@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'head_employees.create',
        'LinkParamCreate' => ['role' => $role],
    ])
@endsection

@section('Content')
    <x-datatable :data="['No', 'Name', 'Email', 'Head Office', 'Created At', 'Action']"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
