<footer class="text-muted bg-light">
        <div class="container">
            <p class="text-small">Project Tugas Akhir Mahasiswa S1 Ilmu Komputer Universitas Negeri Medan</p>
            <small class="d-block mb-3 text-muted">&copy; 2024 Jeremia Manurung</small>
        </div>
</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @hasSection('foot')
        @yield('foot')
    @endif

</body>

</html>
