<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ALS MEDICINE - @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <script src="{{  asset('js/app.js')}}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">

        <!-- Styles -->
        @livewireStyles
        <style>
            body {
               font-family: 'Raleway', sans-serif;
            }
        </style>

    </head>
    <body class="container-fluid">

        <div class="container-fluid bg-secondary p-2 text-white" role="alert">
            <h4 class="text-center">ALS MEDICINE INVENTORY</h4>
        </div>

        <hr />

        @yield('content')


        <script>
          window.addEventListener('openBadgesModal', ()=>{
            var myModal = document.getElementById('badgesModal')
            var modal = new bootstrap.Modal.getInstance('badgesModal')

            console.log(modal);

            // console.dir(myModal)



          })
        </script>

@livewireScripts

    </body>
</html>
