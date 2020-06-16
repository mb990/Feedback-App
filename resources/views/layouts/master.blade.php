<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/main-js.js') }}"></script>
        <script src="{{ asset('js/superadmin-js.js') }}"></script>
        <script src="{{ asset('js/company-list.js') }}"></script>
        <script src="{{ asset('js/job-titles.js') }}"></script>
        <script src="{{ asset('js/admin-js.js') }}"></script>
{{--        <script src="{{ asset('js/test.js') }}"></script>--}}
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </head>
    <body>
<div class="aside">
    <div class="web-name">
        <div class="logo">F</div>
        <span class="logo-name">FEEDBACK
            <br>
        APP</span>
    </div>
    @yield('users')
</div>
<div class="main">
    @yield('content')
</div>
    @yield('script')
    </body>
</html>
