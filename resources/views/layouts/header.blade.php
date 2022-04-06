<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="https://cdn.tiny.cloud/1/3kei4hf1965t1p1zix6r1uyu07upx3fj85u6rcmde92uqup5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
        <script src="https://kit.fontawesome.com/dddac5da95.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        {{-- <link rel="icon" href="{{ asset('images/icons/favicon.ico') }}" type="image/x-icon"> --}}
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icons/apple-touch-icon.png') }}>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">
        <link rel="manifest" href="/site.webmanifest">

        <script src="{{ asset('js/ckeditor.js') }}"></script>
		<script src="{{ asset('js/sample.js') }}"></script>
		<link rel="stylesheet" href="{{ asset('css/samples.css') }}">
		<link rel="stylesheet" href="{{ asset('toolbarconfigurator/lib/codemirror/neo.css') }}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <h3>MyQR</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        @if (session('AuthUser'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="add-page">Add Page</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/dashboard">View All</a></li>
                                </ul>
                            </li>   
                            <li class="nav-item">
                                <form action="logout" method="post">
                                    @csrf
                                    <input type="submit" value="Logout" class="btn-primary">
                                </form>
                            </li>
                        @else   
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 ps-5 my-4 border-top cd-footer-holder" style="background-color: white">
            <div class="col-md-4 d-flex ">
                <a href="https://www.codeholic.in/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="{{ asset('images/icons/logo-dark.png') }}" alt="#">
                </a>
                <span class="text-muted">Powered by Codeholic</span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex pe-5">
                <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/codeholicindia/"><i class="fab fa-instagram cd-icon-01"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/codeholicindia/"><i class="fab fa-facebook-f cd-icon-f-02"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://twitter.com/codeholicindia"><i class="fab fa-twitter cd-icon-twitter-01"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/company/codeholicindia/"><i class="fab fa-linkedin-in cd-icon-01"></i></a></li>
            </ul>
        </footer>
    </body>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>