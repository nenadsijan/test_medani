<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">


</head>

<body>

    <div class="wrapper">
         <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Medani Test</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="{{request()->is('admin/home') ? 'active' : '' }}">
                    <a href="{{route('admin.home')}}">Home</a>
                </li>
                <li class="{{(request()->is('posts') or  request()->is('create-post') or  request()->is('edit-post/*'))  ? 'active' : '' }}">
                    <a href="{{route('posts')}}">Posts</a>
                </li>
                <li class="{{(request()->is('users') or request()->is('edit-user/*'))  ? 'active' : '' }}">
                    <a href="{{route('users')}}">Users</a>
                </li>
                <li class="{{(request()->is('comments')  or request()->is('edit-comment/*'))  ? 'active' : '' }}">
                    <a href="{{route('comments')}}">Comments</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{route('home')}}" class="article">Back to Home Page</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                                
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

               @if(count($errors) > 0) 
                <div class="alert alert-danger" role="alert">
                  <h4>Warning</h4>
                        <span>   
                            @foreach($errors ->all() as $error)
                                  <ul>
                                      <li>{{$error}}</li>
                                  </ul>         
                            @endforeach 
                       </span>
                </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                      <p class="text-center">
                        {{ session('success') }}
                      </p>  
                    </div>
                @endif

                @yield('content')
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
