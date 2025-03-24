@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="resort.update" method="PUT" :actionparam="['branch_id' => $branch_id, 'resort' => $resort->id]" :input="[
        'select' => [
            'label' => 'PDL',
            'name' => 'pdl_id',
            'id' => 'pdl_id',
            'option' => $pdl,
            'value' => $resort->pdl_id,
            'optionfield' => 'pdl_name',
        ],

        'input' => [
            [
                'label' => 'Resort Number',
                'name' => 'resort_number',
                'id' => 'resort_number',
                'value' => $resort->resort_number,
                'type' => 'number',
                'maxlength' => '3',
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
