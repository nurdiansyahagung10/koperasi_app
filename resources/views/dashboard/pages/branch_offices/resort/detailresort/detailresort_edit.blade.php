@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="detailresort.update" method="PUT" :actionparam="['resort_id' => $resort_id, 'detailresort' => $detailresort->id]" :input="[
        'select' => [
            'label' => 'Day Code',
            'name' => 'day_code',
            'id' => 'day_code',
            'option' => $day_code,
            'value' => $detailresort->day_code,
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection


