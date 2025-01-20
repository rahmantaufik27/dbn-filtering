<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="content-wrapper">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <br>
                        <br>
                        <div class="jumbotron">
                            @if (Route::has('login'))
                                <div class="top-right links">
                                    @auth
                                        <a href="{{ url('/exercise') }}">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                            <h1 class="display-4">ITSAESW</h1>
                            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                            <hr class="my-4">
                            <p> Aplikasi ITSAESW adalah aplikasi untuk membantu siswa meningkatkan hasil belajar
                dengan merekomendasikan soal-soal latihan yang bersifat adaptif berdasarkan
                perkembangan pengetahuan siswa. Pengetahuan siswa yang diidentifikasi meliputi
                kelemahan siswa pada tingkat pengetahuan maupun miskonsepsi pada topik tertentu. Untuk
                menjamin konsistensi belajar siswa, pada aplikasi ini terdapat layanan akses materi,
                informasi timbal balik berupa identifikasi kelemahan siswa, serta soal-soal latihan yang
                diberikan sesuai kemampuan masing-masing siswa (satu siswa, satu soal latihan).</p>
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
