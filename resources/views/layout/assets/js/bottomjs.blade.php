@if (session('access_token'))
    <script>
        window.apikey = @json(session('access_token'));
    </script>
@endif
@vite('resources/js/components/sidenav.js')
