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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    @include('partials.menu')

    <div class="loading">
        <div class="loader"></div>
        <h1 id="loadingtext">Sedang Memuat ...</h1>
    </div>

    <div id="map">

    </div>

    <script>
        $(function () {
            $('#loadingtext').text("Mengunduh titik jalan rusak ...")
            var page = 1;
            var marker = new Array();
            var map;

            var markers = L.markerClusterGroup();

            $.ajax({
                url: "/api/allInferences",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.loader').hide()
                    $('#loadingtext').text("Memuat peta...")

                    setTimeout(function () {
                        marker = new Array();

                        map = L.map('map', {
                            preferCanvas: true
                        })

                        map.setView([2.964283004846631, 99.0595995064405], 13);

                        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                            attribution: 'Data Map disediakan Google Maps &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        for (let d of data['data']) {
                            let markerr = L
                                .marker([d.latitude, d.longitude])
                            
                            markerr
                                .bindPopup(`
                                    <b>ID : ${d.id}</b>
                                    <br>
                                    <b>Status : ${d.status}</b>
                                    <br>
                                    <img src="${d.url}" width="150px" height="150px"/>
                                    <br>
                                    <b>Submitter : ${d.username}</b>
                                    <br>
                                    <button onClick="fetch('{{route('deleteinference')}}/${d.id}');">Delete</button>
                                    `)

                            markers.addLayer(
                                markerr
                            );
                        }

                        map.addLayer(markers);

                    }, 2000);

                },
                error: function (error) {
                    $('.loader').hide()
                    $('#loadingtext').text("Gagal mengunduh data dari server")

                    console.log("Error:");
                    console.log(error);
                }
            });

            function markerDelAgain() {
                for (i = 0; i < marker.length; i++) {
                    map.removeLayer(marker[i]);
                }
            }

            // setTimeout(function(){
            //     markerDelAgain()
            // },5000)

            // $('.loading').hide();
        });

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body>

</html>
