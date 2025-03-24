@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'loan_applications.create',
    ])
@endsection

@section('Content')
    <x-datatable :data="[
        'No',
        'Member',
        'Nominal',
        'Pdl',
        'Branch Office',
        'Detail Resort',
        'Status',
        'Aprove By',
        'Created At',
        'Action',
    ]"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
