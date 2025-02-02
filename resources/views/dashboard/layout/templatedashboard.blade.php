@extends('layout.template')

@section('main')
    <section class="2xl:container  flex  w-full h-screen mx-auto ps-2 p-4">
        @include('dashboard.layout.sidenav')

        <main class="w-full max-h-[52rem] h-full overflow-y-auto p-4 px-6 rounded-2xl hide-scrollbar bg-white border">
            @include('dashboard.layout.topnav')
            <div class="flex gap-6 mt-3 @if (url()->current() == url('/')) pb-4 @endif">
                @yield('dashboardmain')
            </div>
        </main>

    </section>
@endsection
