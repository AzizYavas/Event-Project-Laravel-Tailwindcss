<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- @include('notify::components.notify') --}}
@include('layouts.partials.head')

<body class="w-full h-screen bg-neutral-100">
    @include('layouts.partials.navbar')
    @yield('content')
    @include('layouts.partials.footer')
    <x-notify::notify />
    @notifyJs
</body>

</html>
