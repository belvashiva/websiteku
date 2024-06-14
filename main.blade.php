<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Nama Aplikasi - @yield('title'):.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { margin: 0 auto; }
        .rule-1 { background-color: magenta; color: white; }
        #rule-2 { background-color: black; color: yellow; }
        .rule-3 { font-style: italic; font-weight: bold; }
        input[type="text"] { width: 50%; background-color: pink; }
        input[type="number"] { width: 50%; background-color: orange; }
        body { background-color: #ffe2ff; color: #dc2efd; }
        .card-body { color: #920fa6; }
        .custom-bg { background-color: magenta; color: pink; }
        .btn-primary { color: #fff; background-color: #d500ff; border-color: #723f77; }
        .nav-pills .nav-link { color: purple; }
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link { color: #fff !important; background-color: magenta !important; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Nama Aplikasi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                @if(Auth::check())
    <!-- Jika sudah login -->
    <li class="nav-item">
        <a class="nav-link" href="#">Selamat Datang, {{ Auth::user()->name }}</a>
    </li>
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="post" class="form-inline">
            @csrf
            <button type="submit" class="btn btn-link nav-link">Logout</button>
        </form>
    </li>
@else
    <!-- Jika belum login -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('signup') }}">Signup</a>
    </li>
@endif

                </ul>
            </div>
        </nav>

        <!-- Header -->
        <div class="row">
            <div class="col-md-12 custom-bg py-4"></div>
        </div>

        <!-- Content Section -->
        <div class="row mt-4">
            <div class="col-md-2">
                <!-- Vertical Navigation -->
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" id="v-pills-home-tab" href="/">Home</a>
                    <a class="nav-link {{ Request::is('cosmetics') ? 'active' : '' }}" id="v-pills-profile-tab" href="/cosmetics">Cosmetics</a>
                    <a class="nav-link" id="v-pills-messages-tab" href="#">Messages</a>
                    <a class="nav-link" id="v-pills-settings-tab" href="#">Settings</a>
                </div>
            </div>
            <div class="col-md-10">
                <!-- Main Content -->
                <div class="card mt-4">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8vwgVpC5bsDk3dIbdI0CKFgZOqZYw2krF+78a" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>
