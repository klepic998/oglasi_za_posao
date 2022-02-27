<!DOCTYPE html>
<html lang="en">

<head>
  @yield('head')
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-decoration-underline" href="{{route('home')}}">Početna stranica</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('user.profile')}}">Profil</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="dropdown-item">Odjavi se</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{route('user.posts')}}">
                        Pregled oglasa
                    </a>
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{route('user.createpost')}}">
                        Kreiraj novi oglas
                    </a>
                  </div>
            </div>
        </nav>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @yield('content')
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Pronađi posao 2022</div>
                    <div>
                        <a href="{{route('show.pp')}}">Politika privatnosti</a>
                        &middot;
                        <a href="{{route('show.terms')}}">Uslovi koristenja</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
</body>
</html>
