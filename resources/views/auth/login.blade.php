<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Custom CSS for login page */

        /* Centering the container vertically */


        /* Background color for left column */
        .left-column {
            background-color: #e7f3ff;
            padding: 20px;
        }



        /* Logo styling */
        .logo {
            width: 100%;
            height: auto;
        }

        label,
        input,
        button {
            font-family: 'Open Sans', sans-serif;
            /* Ganti 'Roboto' dengan nama font yang Anda inginkan */
        }

        .btn-custom {
            background-color: #080761;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            /* Transisi untuk efek hover */
        }

        .btn-custom:hover {
            background-color: #0a0942;
            /* Warna latar belakang berubah saat tombol dihover */
        }

        /* Form styling */
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto shadow">
                <div class="row">
                    <div class="col-12">
                        <div class="mx-auto text-center"> <!-- Menambahkan class text-center di sini -->
                            <img src="{{ asset('img/logo1.png') }}" class="logo" alt="Logo">
                            <h3 class="fw-bold text-center" style="color: #080761">Aplikasi SARPRAS</h3>
                            <p class="fw-bold text-center " style="color: #080761">SD IT Insan Cermat</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('postlogin') }}" class="form-group " method="POST">
                        @csrf
                        <label for="email" class="text-muted">Email</label>
                        <input type="email" class="form-control mb-3 text-muted" required name="email"
                            style="border-radius: 20px;">
                        <label for="password" class="text-muted">Password</label>
                        <input type="password" class="form-control mb-4 text-muted" required name="password"
                            style="border-radius: 20px;">
                        @if (Session::has('status'))
                            <div class="alert mt-3 mb-3 alert-sm alert-primary">{{ Session::get('status') }}</div>
                        @endif
                        <button class="btn form-control mb-5 text-white  btn-custom"
                            style="border-radius: 20px;">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
