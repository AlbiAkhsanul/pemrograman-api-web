<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">DOG Blog</a>
      <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/')||Request::is('home') ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blogs') ? 'active' : '' }}" href="/blogs">Blog</a>
          </li>
          <li class="nav-item">
            @if (session('user'))
                <!-- Tombol Dashboard jika session user ada -->
                <a class="nav-link" href="/dashboard">Dashboard</a>
            @else
                <!-- Tombol Login jika session user tidak ada -->
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">Login</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
    </nav>