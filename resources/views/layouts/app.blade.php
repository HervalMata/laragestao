<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'userId' => Auth::check() ? Auth::user()->id : null
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <?php
        $navbar = Navbar::withBrand(config('app.name'), url('/'));
        if (Auth::check()) {
            $links = Navigation::links([
                [
                    'Unidades',
                    [
                        [
                            'link' => route('units.index'),
                            'title' => 'Unidades'
                        ],
                        [
                            'link' => route('trashed.units.index'),
                            'title' => 'Lixeira'
                        ]
                    ]
                ],
                [
                    'link' => route('users.index'),
                    'title' => 'Usuários'
                ]
            ]);
            $logout = Navigation::links([
                [
                    Auth::user()->name,
                    [
                        [
                            'link' => url("/logout"),
                            'title' => 'Sair',
                            'linkAttributes' => [
                                'onclick' => "event.preventDefault();document.getElementById(\"logout-form\").submit();"
                            ]
                        ]
                    ]
                ]
            ])->right();
            $navbar->withContent($links)->withContent($logout);
        }
        ?>
        {!! $navbar !!}
        {!! Form::open(['url' => url('/logout'), 'id' => 'logout-form', 'style' => 'display:none']) !!}
        {!! Form::close() !!}
        @if(Session::has('message'))
            <div class="container">
               {!! Alert::success(Session::get('message'))->close() !!}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
