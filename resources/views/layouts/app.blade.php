<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') - {{ settings('app_name') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/apple-touch-icon-152x152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/favicon-16x16.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ settings('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/mstile-144x144.png') }}" />

    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/vendor.css')) }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/app.css')) }}">
    
    @yield('styles')
</head>
<body>
    @include('partials.navbar')
    @include('partials.sidebar')
    <div id="content">
            <div class="container">
                    <div class="row">
                        
            
                        <div class="col-md-12">
                            <main>
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </div>
    </div>

    <script src="{{ url(mix('assets/js/vendor.js')) }}"></script>
    <script src="{{ url('assets/js/as/app.js') }}"></script>
    @include('partials.scripts')
    <script>
    $(document).ready(function() {
    $('#list').DataTable(
        {
            dom: 'Bfrtilp',
    buttons: [
       'excel', 'pdf', 'print'
    ]
        }
    );
    table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
    
} );</script>
    @yield('scripts')
    <script>
        $(document).ready(function(){
            $.fn.selectpicker.Constructor.BootstrapVersion = '4';
             $('select').selectpicker();
    });
        </script>
@yield('javascript')
</body>
</html>
