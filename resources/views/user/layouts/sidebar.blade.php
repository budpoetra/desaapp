<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    {{-- <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div> --}}
    <div class="sidebar-brand-text mx-3">{{ $data[0]->app_name }}</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
    <a class="nav-link" href="/user">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider mb-n1">

  <li class="nav-item {{ Request::is('user/posts*') ? 'active' : '' }}">
    <a class="nav-link" href="/user/posts">
      <i class="fas fa-newspaper"></i>
      <span>Posts</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider mb-n1">

  <li class="nav-item {{ Request::is('user/ebooks*') ? 'active' : '' }}">
    <a class="nav-link" href="/user/ebooks">
      <i class="fas fa-book"></i>
      <span>E-Books</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider mb-n1">

  <!-- Nav Item - Pages Collapse Menu Ebooks -->
  <li class="nav-item {{ Request::is('user/videos*') || Request::is('user/playlist-videos*') ? 'active' : '' }}">
    <a class="nav-link {{ Request::is('user/videos*') || Request::is('user/playlist-videos*') ? '' : 'collapsed' }}"
      href="#" data-toggle="collapse" data-target="#collapseVideos" aria-expanded="true"
      aria-controls="collapseVideos">
      <i class="fas fa-video"></i>
      <span>Videos</span>
    </a>
    <div id="collapseVideos"
      class="collapse {{ Request::is('user/videos*') || Request::is('user/playlist-videos*') ? 'show' : '' }}"
      aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Request::is('user/videos*') ? 'active' : '' }}" href="/user/videos">All
          Videos</a>
        <a class="collapse-item {{ Request::is('user/playlist-videos*') ? 'active' : '' }}"
          href="/user/playlist-videos">Playlist Vidoes</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider mb-n1 d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
