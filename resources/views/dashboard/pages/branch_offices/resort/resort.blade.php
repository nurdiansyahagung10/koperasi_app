@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'resort.create',
        'LinkParamCreate' => ['branch_id' => $branch_id],
    ])
@endsection

@section('Content')
    <x-datatable :data="['No', 'Resort Number', 'Pdl', 'Created At', 'Action']"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
