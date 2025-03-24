@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="resort.store" :actionparam="['branch_id' => $branch_id]" :input="[
        'select' => [
            'label' => 'PDL',
            'name' => 'pdl_id',
            'id' => 'pdl_id',
            'option' => $pdl,
            'optionfield' => 'pdl_name',
        ],

        'input' => [
            [
                'label' => 'Resort Number',
                'name' => 'resort_number',
                'id' => 'resort_number',
                'type' => 'number',
                'maxlength' => '3',
            ],
        ],
    ]"></x-form>

    @include('dashboard.layout.bottomjs')
@endsection
