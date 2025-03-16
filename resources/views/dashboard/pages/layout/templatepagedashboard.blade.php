@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">

        @include('components.success_notification')
        @include('components.errors_notification')

        <div class=" flex justify-between p-2 items-center  ">
            <h2 class="text-lg font-semibold">{{ $tittle }}</h2>
            @yield('HeadContent')
        </div>

        </div>
        @yield('Content')
    </section>
@endsection
