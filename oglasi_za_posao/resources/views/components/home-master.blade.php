<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pronađi Posao - početna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/font-awesome.min.css">
</head>

<body class="bg-light">

  <!-- Navigation -->
<div>
  <nav class="navbar navbar-expand-lg navbar-white bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/"><b>PronađiPosao.ba</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/"><b>Početna</b>
                    <span class="sr-only">(trenutno)</span>
                </a>
            </li>
            @if(Auth::check() && Auth::user()->hasRole('Admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.index')}}"><b>Admin</b></a>
                </li>
            @endif
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><b>{{ __('Prijava') }}</b></a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><b>{{ __('Registracija') }}</b></a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       <b>{{ Auth::user()->name }}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('user.profile')}}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{route('user.posts')}}">Moji oglasi</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form method="post" action="{{route('logout')}}">
                            @csrf
                                <button type="submit" class="dropdown-item">Odjavi se</button>
                            </form>
                        </li>
                    </ul>
                </li>
        @endguest
        <!-- </ul> -->
            <!-- </div> -->
        </ul>
      </div>
  </nav>

  <!-- Page Content -->
  <div class="container py-5 px-0">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">
      <h1 class="my-2"><b>Aktuelni oglasi</b></h1>
          <hr>
         @yield('content')
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4 mt-3">

        <!-- Search Widget -->
        <div class="card my-3">
            <h5 class="card-header bg-primary text-white-50">Pretraga</h5>
          <div class="card-body">
              <form method="GET" action="{{route('search')}}" >
                <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Pretraga...">
                  <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>
          </div>
        </div>

        <!-- Categories Widget -->
       @yield('category_nav')


       </div>
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container -->
 </div>
  <!-- Footer -->
  <footer class="container-fluid bg-dark mx-0">
        <div class="row">
            <div class="col-md-6 m-5">
                    <h4 class="text-white"><b>O nama</b></h4>
                    <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vivamus et nisl augue. <br>
                        Vestibulum a elit sed quam tincidunt ullamcorper nec eu dui. <br>
                        Proin sed odio ante.
                        <br>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                        <br>
                        Maecenas facilisis quam nec neque rutrum, eu commodo nibh imperdiet.
                        <br>
                        Praesent ut elit sed tortor accumsan pharetra.
                        <br>
                        Nam condimentum nisi id urna varius rutrum.
                        <br>
                        Praesent convallis elit est, ut rutrum sapien ullamcorper a.
                    </p>
            </div>
            <div class="col-md-4 m-5">
            <h4 class="text-white"><b>Kontakt</b></h4>

                <h5 class="text-white">Telefon:</h5>
                <p class="text-white">+387(0)57123456</p>
                <h5 class="text-white">Fax:</h5>
                <p class="text-white">+387(0)57123456</p>
                <h5 class="text-white">Email:</h5>
                <p class="text-white">pronadjiposao008@gmail.com</p>
                <a href="#!"><i class="fab fa-facebook-square text-white-50 fa-2x m-2"></i></a>
                <a href="#!"><i class="fab fa-instagram-square text-white-50 fa-2x m-2"></i></a>
                <a href="#!"><i class="fab fa-twitter-square text-white-50 fa-2x m-2"></i></a>
                <a href="#!"><i class="fab fa-linkedin text-white-50 fa-2x m-2"></i></a>
            </div>

        <p class="mt-1 text-center text-white">Copyright &copy; Pronađi posao 2022</p>
        </div>
    <!-- /.container -->
  </footer>





  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</body>

</html>
