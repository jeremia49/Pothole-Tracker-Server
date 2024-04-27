<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pothole Tracker Official Website">
    <meta name="author" content="Jeremia Manurung">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Pothole Tracker Website</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        :root {
            --jumbotron-padding-y: 3rem;
        }

        .jumbotron {
            padding-top: var(--jumbotron-padding-y);
            padding-bottom: var(--jumbotron-padding-y);
            margin-bottom: 0;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .jumbotron {
                padding-top: calc(var(--jumbotron-padding-y) * 2);
                padding-bottom: calc(var(--jumbotron-padding-y) * 2);
            }
        }

        .jumbotron p:last-child {
            margin-bottom: 0;
        }

        .jumbotron-heading {
            font-weight: 300;
        }

        .jumbotron .container {
            max-width: 40rem;
        }

        footer {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        footer p {
            margin-bottom: .25rem;
        }

        .box-shadow {
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
        }

    </style>
</head>

<body>

    <header>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img width="100" height="100" src="{{ Vite::asset('resources/images/1-wo-watermark.png') }}" alt="">
                    <strong>Pothole Tracker</strong>
                </a>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Pothole Tracker</h1>
                <p class="mt-3 lead text-muted text-justify"> Dengan menggunakan teknologi sensor dan pemetaan, aplikasi ini secara otomatis mengidentifikasi lubang atau kerusakan pada jalan serta memberikan peringatan kepada pengguna melalui ponsel pintar mereka. Dengan begitu, pengemudi dapat menghindari kerusakan pada kendaraan dan memastikan keamanan perjalanan mereka.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Install Aplikasi (Play Store)</a>
                    <a href="#" class="btn btn-primary my-2">Install Aplikasi</a>
                    <a href="{{route('maps')}}" class="btn btn-secondary my-2">Lihat Pemetaan Jalan Rusak</a>
                </p>
            </div>
        </section>

    </main>  

    <footer class="text-muted bg-light">
        <div class="container">
            <p class="text-small">Project Tugas Akhir Mahasiswa S1 Ilmu Komputer Universitas Negeri Medan</p>
            <small class="d-block mb-3 text-muted">&copy; 2024 Jeremia Manurung</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>

</html>
