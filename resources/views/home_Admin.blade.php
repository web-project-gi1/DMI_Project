<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-DMI App @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        
</head>

<body>
    <div id="app">  
        <header>
            
                
                
            <form   class="row" name="form1" method="post" action="{{route('logout') }}">
                @csrf
                <img  class="col-lg-3" src="{{ asset('Capture.png') }}" width="150" height="100" >
                <div class="col-lg-7"></div>
                <div  class=" col-lg-2 " >
                    <p><br>Welcome {{\Auth::user()->name}}</p>
                    <input  name="submit2" type="submit" id="submit2" class=" btn btn-dark" value="se deconnecter">
                </div>
                        
            </form>
            <nav class="navbar navbar-dark navbar-expand-lg bg-dark ">
                        
                    <!---<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
                        <a class="navbar-brand" href="#">MENU </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost:8000/AddFiliere" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Add filiere
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost:8000/AddStudent" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Add Student
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://localhost:8000/AddAccount" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Add account
                                    </a>
                                </li>
                            </ul>
                        </div>
        </header>
        
            <section class="col-lg-10">
                                
            </section>       
            </div>
            <section class="col-lg-10">
                <main class="py-4">
                    
                    @yield('content')
                </main>
            </section> 

    </div>
    <footer>

    </footer>




</body>
</html>