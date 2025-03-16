@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="members.store" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'detail_resort',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['detail_resort' => ['name' => 'detail_resort_id']],
        ],

        'input' => [
            ['label' => 'Member Name', 'name' => 'member_name', 'id' => 'member_name'],
            ['label' => 'Birthday Date', 'type' => 'date', 'name' => 'birthday_date', 'id' => 'birthday_date'],
        ],

        'selectaddress' => [
            'selectaddresslimit' => 'village',
        ],

        'inputgroup' => [
            ['label' => 'Rt / Rw', 'type' => 'rtrw'],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'phone_number',
                'id' => 'phone_number',
            ],
        ],
        'input2' => [
            [
                'label' => 'Street Or Building Name',
                'type' => 'textarea',
                'name' => 'street_or_building_name',
                'id' => 'street_or_building_name',
            ],
            [
                'label' => 'KTP Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'ktp',
                'id' => 'ktp',
            ],
            [
                'label' => 'KK Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'kk',
                'id' => 'kk',
            ],
            [
                'label' => 'Member Image',
                'type' => 'image',
                'name' => 'member_image',
                'id' => 'member_image_input',
            ],
            [
                'label' => 'Member KTP Image',
                'type' => 'image',
                'name' => 'member_ktp_image',
                'id' => 'member_ktp_image_input',
            ],
            [
                'label' => 'Member Hold KTP Image',
                'type' => 'image',
                'name' => 'member_hold_ktp_image',
                'id' => 'member_hold_ktp_image_input',
            ],
            [
                'label' => 'Business',
                'name' => 'business',
                'id' => 'business',
            ],
            [
                'label' => 'Business image',
                'type' => 'image',
                'name' => 'business_image',
                'id' => 'business_image_input',
            ],
            [
                'label' => 'Business Location',
                'type' => 'textarea',
                'name' => 'business_location',
                'id' => 'business_location',
            ],
        ],
    ]">
    </x-form>

    @include('dashboard.layout.bottomjs')
@endsection
