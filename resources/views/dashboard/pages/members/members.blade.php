@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'members.create',
    ])
@endsection

@section('Content')
    <x-datatable :data="['No', 'Name', 'Resort', 'Detail Resort', 'Pdl', 'Branch Office', 'Status', 'Created At', 'Action']"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
