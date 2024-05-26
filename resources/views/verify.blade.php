@extends('template')

@section('title', "Verify Inference")

@section('head')
<style>
    #map {
        flex:1;
        height: auto;
        width: auto;
    }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="container d-block m-auto">
        <table id="myTable" border="1px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengguna</th>
                    <th>Lat.</th>
                    <th>Long.</th>
                    <th>Nama Jalan</th>
                    <th>Status</th>
                    <th>Waktu</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inferences as $inference)
                    <tr>
                        <td>{{$inference->id}}</td>
                        <td>{{$inference->username}}</td>
                        <td>{{$inference->latitude}}</td>
                        <td>{{$inference->longitude}}</td>
                        <td>{{$inference->streetname}}</td>
                        <td>{{$inference->status}}</td>
                        <td>{{$inference->timestamp}}</td>
                        <td><img src="{{$inference->url}}" height="150px" width="150px" alt=""></td>
                        <td>Verifikasi</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection


@section('foot')
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script>

        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        // $(function () {
        //     var markers = L.markerClusterGroup();

        //     map = L.map('map',{
        //         preferCanvas: true
        //     })

        //     map.setView([2.964283004846631, 99.0595995064405], 13);

        //     L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        //         maxZoom: 20,
        //         subdomains:['mt0','mt1','mt2','mt3']
        //     }).addTo(map);

        // });
</script>
@endsection
