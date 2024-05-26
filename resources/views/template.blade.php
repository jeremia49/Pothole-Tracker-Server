
@include('partials.header')
<body>
    @include('partials.menu')
    @hasSection('content')
	    @yield('content')
	@endif
</body>
@include('partials.footer')