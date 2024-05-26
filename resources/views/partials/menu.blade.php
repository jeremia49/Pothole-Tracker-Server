<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Pothole Tracker Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentroutenamed('settinginference') ? 'active': ''}}" href="{{route('settinginference')}}">Setting Inference</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Setting Model</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link {{ Route::currentroutenamed('verifypothole') ? 'active': ''}}" href="{{route('verifypothole')}}">Verify Pothole</a>
            </li>
        </ul>
    </div>
</nav>
