@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="loan_applications.store" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'detail_resort',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => [
                'detail_resort' => [
                    'name' => 'detail_resort_id',
                    'detail_resort_filter_day' => true,
                ],
            ],
        ],

        'select' => [
            'label' => 'Member',
            'id' => 'member_id',
            'name' => 'member_id',
            'option' => $members,
            'optionfield' => 'member_name',
            'filteredfromotherinput' => [
                'placeholder' => 'Detail Resort First',
                'id' => 'detail_resort',
                'attr' => 'detail_resort_id',
            ],
        ],
        'input' => [
            [
                'id' => 'binding_letter_id',
                'name' => 'binding_letter',
                'label' => 'Binding Letter',
            ],
            [
                'id' => 'binding_letter_image_input',
                'name' => 'binding_letter_image',
                'label' => 'Bindnig Letter Image',
                'type' => 'image',
            ],
            [
                'id' => 'nominal_loan_application_id',
                'name' => 'nominal_loan_application',
                'type' => 'number',
                'label' => 'Nominal Loan Application'
            ],
        ],
    ]">
    </x-form>

    @include('dashboard.layout.bottomjs')
@endsection
