@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage')
@endsection

@section('Content')
    <x-datatable :data="[
        'No',
        'Member',
        'Nominal_loan_application',
        'Nominal_dropping',
        'Pdl',
        'Branch Office',
        'Detail Resort',
        'Status',
        'Created At',
        'Action',
    ]"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
