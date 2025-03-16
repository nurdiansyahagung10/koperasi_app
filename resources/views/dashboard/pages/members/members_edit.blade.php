@extends('dashboard.pages.layout.templatepagedashboard')

@section('HeadContent')
@endsection

@section('Content')
    <x-form action="members.update" method="PUT" :actionparam="['member' => $members->id]" :input="[
        'selectoffice' => [
            'selectofficelimit' => 'detail_resort',
            'selectheadofficeoption' => $head_offices,
            'selectofficecustom' => ['detail_resort' => ['name' => 'detail_resort_id']],
            'selectofficevalue' => $members
        ],

        'input' => [
            ['label' => 'Member Name', 'name' => 'member_name', 'id' => 'member_name', 'value' => $members->member_name],
            ['label' => 'Birthday Date', 'type' => 'date', 'name' => 'birthday_date', 'id' => 'birthday_date', 'value' => $members->birthday_date],
        ],

        'selectaddress' => [
            'selectaddresslimit' => 'village',
            'selectaddressvalue' => $members
        ],

        'inputgroup' => [
            ['label' => 'Rt / Rw', 'type' => 'rtrw', 'value' => $members->rt_and_rw],
            [
                'label' => 'Phone Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'phone_number',
                'id' => 'phone_number',
                'value' => $members->phone_number
            ],
        ],
        'input2' => [
            [
                'label' => 'Street Or Building Name',
                'type' => 'textarea',
                'name' => 'street_or_building_name',
                'id' => 'street_or_building_name',
                'value' => $members->street_or_building_name
            ],
            [
                'label' => 'KTP Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'ktp',
                'id' => 'ktp',
                'value' => $members->ktp
            ],
            [
                'label' => 'KK Number',
                'type' => 'number',
                'maxlength' => '13',
                'name' => 'kk',
                'id' => 'kk',
                'value' => $members->kk
            ],
            [
                'label' => 'Member Image',
                'type' => 'image',
                'name' => 'member_image',
                'id' => 'member_image_input',
                'value' => $members->member_image
            ],
            [
                'label' => 'Member KTP Image',
                'type' => 'image',
                'name' => 'member_ktp_image',
                'id' => 'member_ktp_image_input',
                'value' => $members->member_ktp_image

            ],
            [
                'label' => 'Member Hold KTP Image',
                'type' => 'image',
                'name' => 'member_hold_ktp_image',
                'id' => 'member_hold_ktp_image_input',
                'value' => $members->member_hold_ktp_image

            ],
            [
                'label' => 'Business',
                'name' => 'business',
                'id' => 'business',
                'value' => $members->business

            ],
            [
                'label' => 'Business image',
                'type' => 'image',
                'name' => 'business_image',
                'id' => 'business_image_input',
                'value' => $members->business_image

            ],
            [
                'label' => 'Business Location',
                'type' => 'textarea',
                'name' => 'business_location',
                'id' => 'business_location',
                'value' => $members->business_location

            ],
        ],
    ]">
    </x-form>

    @include('dashboard.layout.bottomjs')
@endsection
