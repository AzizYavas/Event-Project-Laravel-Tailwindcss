<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.layouts.partials.head')

<body class="w-full h-screen bg-neutral-100">
    {{-- @include('layouts.partials.navbar') --}}
    @yield('content')
    @include('admin.layouts.partials.footer')
    <x-notify::notify />
    @notifyJs
    @yield('footer')
</body>

</html>
