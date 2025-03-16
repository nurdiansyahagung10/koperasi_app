@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
    @include('dashboard.pages.layout.headpage', [
        'LinkCreate' => 'detailresort.create',
        'LinkParamCreate' => ['resort_id' => $resort_id],
    ])
@endsection

@section('Content')
    <x-datatable :data="['No', 'Day Code', 'Resort', 'Created At', 'Action']"></x-datatable>
    @vite('resources/js/package/table-package/main/main-table-package.js')
    @include('dashboard.layout.bottomjs')
@endsection
