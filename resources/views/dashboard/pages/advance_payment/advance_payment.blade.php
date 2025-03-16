@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'advance_payments.create',
    ])
@endsection

@section('Content')
    <x-datatable :data="['No', 'Detail resort', 'Pdl', 'Balance', 'Cashier', 'Created At', 'Action']"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
