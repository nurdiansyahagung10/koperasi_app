@extends("layout.template")

@section("main")
<section class="2xl:container flex gap-5 w-full h-screen mx-auto p-4">
    @include("dashboard.layout.sidenav")
    @yield('dashboardmain')
</section>
@endsection
