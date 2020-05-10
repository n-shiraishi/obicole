<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', 'Obicole')</title>
        <meta name="description" content="@yield('description')">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    
    <body>
        
        @include('commons.navbar')
        
        @include('commons.error_messages')
            
        @yield('content')

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
    
    <footer>
        <small>&copy; 2020 Obi collection.</small>
    </footer>
</html>