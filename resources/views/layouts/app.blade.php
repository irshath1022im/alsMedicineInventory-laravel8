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

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">
                ALS MEDICINE INVENTORY
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{  route('items.index') }}">ITEMS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">RECEIVING</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled">CONSUMPTION</a>
                  </li>
                </ul>
              </div>

            </div>
        </nav>

        <hr />

        @yield('content')
        
        @livewireScripts

        <script>
          // window.addEventListener('openModal', ()=>{
          //   var myModal = document.getElementById('openModal')
         
          //   console.log(myModal);

          //   myModal.setAttribute('data-bs-toggle', 'modal')
          //   myModal.setAttribute('data-bs-target', "#exampleModal")
          //   console.dir(myModal);

            // console.dir(myModal)
        // var myModal = document.getElementById('exampleModal')


        //     Livewire.on('showBootstrapModal', () => {
        //         $(myModal).modal('show');
        //       });
        </script>


    </body>
</html>
