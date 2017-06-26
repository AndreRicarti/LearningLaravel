<!DOCTYPE html>
<html>
    <head>
        <title>{{$title or 'Curso de Laravel 5.4'}}</title>
    </head>
    <body>
        @yield('content')
        @stack('scripts')
    </body>
</html> 