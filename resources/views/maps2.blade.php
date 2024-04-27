<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>Pothole Tracker</title>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html,
        body,
        #map {
            height: 100%;
            width: 100vw;
        }

        .loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transform: -webkit-translate(-50%, -50%);
            transform: -moz-translate(-50%, -50%);
            transform: -ms-translate(-50%, -50%);
            color: #3498db;
        }

        .loader {
            display: block;
            margin: auto;
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body class="antialiased">

    <div id="map">

    </div>

    <script>
        let map = L.map('map').setView([2.964283004846631, 99.0595995064405], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '<img width="10" height="10" src="{{ Vite::asset("resources/images/1-wo-watermark.png") }}" alt=""> Pothole Tracker &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


    </script>
</body>

</html>
