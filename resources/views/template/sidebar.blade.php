<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('csss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icon/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <style>
        .chart-container {
            width: 400px;
            margin: 0 auto;
            text-align: center;
        }

        .chart {
            width: 100%;
            height: 300px;
        }
    </style>
    <style>
        .sidebar-link {
            text-decoration: none;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand px-3 py-3 sticky-top">
        <div class="navbar-brand">
            <h5 class=""
                style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 25px; color: #0a0942">
                INVENTARIS SARPRAS SD IT INSAN CERMAT</h5>
        </div>
        <form action="#" class="d-none d-sm-inline-block">

        </form>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" id="dropdownToggle" data-bs-toggle="dropdown"
                        class="nav-icon pe-md-0 text-dark dropdown-toggle-start">
                        <img src="{{ asset(Auth::user()->foto) }}" class="avatar img-fluid rounded-circle"
                            alt="">
                        {{-- {{ Auth::user()->nama }} --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-center rounded" id="dropdownMenu"
                        style="display: none; left: auto; right: 0; width: 240px; padding: 0;">
                        <div class="dropdown-item1 fw-bold" style="background-color: #0a0942; color: white;">
                            <img src="{{ asset(Auth::user()->foto) }}" class="avatar img-fluid rounded-circle"
                                alt="">
                            <span style="margin-left: 10px">{{ Auth::user()->nama }}</span>
                        </div>

                        <a href="{{ route('profile') }}" class="dropdown-item1 " style="font-size: 14px;">
                            <i class="bi bi-person"></i>
                            <span>Profile</span>
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item1 " style="font-size: 14px;">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>




        {{-- <div class="navbar-collapse collapse ">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a href="#" id="dropdownToggle" data-bs-toggle="dropdown" class="nav-icon pe-md-0 text-dark dropdown-toggle-end">
                        <img src="{{ asset(Auth::user()->foto) }}" class="avatar img-fluid" alt="">
                        {{ Auth::user()->nama }}

                    </a>
                    <div class="dropdown-menu dropdown-menu-center  rounded" id="dropdownMenu" style="display: none;">
                        <a href="{{ route('logout') }}" class="sidebar-link">
                            <i class="lni lni-exit"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div> --}}



    </nav>
    <div class="wrapper">

        <aside id="sidebar" class="expand">
            <div class="d-flex mt-3">
                <button class="toggle-btn" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="{{ route('menu') }}" class="text-white">
                        <span>Dashboard</span>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#sarana" aria-expanded="false" aria-controls="sarana">
                        <i class="bi bi-laptop"></i>
                        <span>Sarana</span>
                    </a>
                    <ul id="sarana" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('homesarana') }}" class="sidebar-link">
                                <i class="bi bi-box-arrow-right"></i>

                                <span>Barang Masuk</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('inputpeminjaman') }}" class="sidebar-link"><i
                                    class="bi bi-cart-plus"></i>
                                Peminjaman</a>

                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('inputpengembalian') }}" class="sidebar-link">
                                <i class="bi bi-cart-check"></i>
                                Pengembalian</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('inputbarangkeluar') }}" class="sidebar-link">
                                <i class="bi bi-box-arrow-left"></i>
                                Barang Keluar</a>
                        </li>


                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('homeprasarana') }}" class="sidebar-link">
                        <i class="bi bi-building   "></i>
                        <span>Prasarana</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('sebaransarpras') }}" class="sidebar-link">
                        <i class="bi bi-diagram-2"></i>
                        <span>Sebaran Sarpras</span>
                    </a>
                </li>


                

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#laporan" aria-expanded="false" aria-controls="laporan">
                        <i class="bi bi-cart-plus"></i>
                        <span>Laporan</span>
                    </a>
                    <ul id="laporan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('laporanpeminjaman') }}" class="sidebar-link"><i
                                    class="bi bi-file-earmark-bar-graph"></i>
                                Laporan Peminjaman</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporanpengembalian') }}" class="sidebar-link"><i
                                    class="bi bi-file-earmark-text"></i>
                                Laporan Pengembalian</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporanbarangkeluar') }}" class="sidebar-link"><i
                                    class="bi bi-file-earmark-minus"></i>
                                Laporan Barang Keluar</a>

                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a href="{{ route('menudatapengguna') }}" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span>Data Pengguna</span>
                    </a>
                </li>
            </ul>

        </aside>
        <div class="main">

            <main class="content px-3 py-4">
                <div class="container">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">@yield('title')</h3>
                        @yield('content')
                    </div>
                </div>

            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('jss/script.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        // Menangani klik tombol close
        document.addEventListener('DOMContentLoaded', function() {
            var closeButton = document.querySelector('.pesan .close');
            closeButton.addEventListener('click', function() {
                var pesanElement = this.parentNode;
                pesanElement.parentNode.removeChild(pesanElement);
            });
        });
    </script>
    <script>
        // Menangani klik tombol close
        document.addEventListener('DOMContentLoaded', function() {
            var closeButton = document.querySelector('.pesan .close-danger');
            closeButton.addEventListener('click', function() {
                var pesanElement = this.parentNode;
                pesanElement.parentNode.removeChild(pesanElement);
            });
        });
    </script>
    <script>
        var dropdownToggle = document.getElementById('dropdownToggle');
        var dropdownMenu = document.getElementById('dropdownMenu');

        dropdownToggle.addEventListener('click', function(event) {
            if (dropdownMenu.style.display === 'block') {
                dropdownMenu.style.display = 'none';
            } else {
                dropdownMenu.style.display = 'block';
            }
        });
    </script>


    <script>
        new DataTable('#example');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>


</body>

</html>
