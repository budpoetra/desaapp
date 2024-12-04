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
  <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}" style="margin-bottom: -5%">
    <a class="nav-link" href="/admin">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu Users -->
  <li class="nav-item {{ Request::is('admin/users*') || Request::is('admin/new-users*') ? 'active' : '' }}"
    style="margin-bottom: -5%">
    <a class="nav-link {{ Request::is('admin/users*') || Request::is('admin/new-users*') ? '' : 'collapsed' }}"
      href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
      aria-controls="collapseUsers">
      <i class="fas fa-users"></i>
      <span>Users</span>
    </a>
    <div id="collapseUsers"
      class="collapse {{ Request::is('admin/users*') || Request::is('admin/new-users*') ? 'show' : '' }}"
      aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Request::is('admin/users*') ? 'active' : '' }}" href="/admin/users">All Users</a>
        <a class="collapse-item {{ Request::is('admin/new-users*') ? 'active' : '' }}" href="/admin/new-users">New
          Users</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu Posts -->
  <li class="nav-item {{ Request::is('admin/posts*') || Request::is('admin/post-categories*') ? 'active' : '' }}"
    style="margin-bottom: -5%">
    <a class="nav-link {{ Request::is('admin/posts*') || Request::is('admin/post-categories*') ? '' : 'collapsed' }}"
      href="#" data-toggle="collapse" data-target="#collapsePosts" aria-expanded="true"
      aria-controls="collapsePosts">
      <i class="fas fa-newspaper"></i>
      <span>Posts</span>
    </a>
    <div id="collapsePosts"
      class="collapse {{ Request::is('admin/posts*') || Request::is('admin/post-categories*') ? 'show' : '' }}"
      aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Request::is('admin/posts*') ? 'active' : '' }}" href="/admin/posts">All Posts</a>
        <a class="collapse-item {{ Request::is('admin/post-categories*') ? 'active' : '' }}"
          href="/admin/post-categories">Post Categories</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu Ebooks -->
  <li class="nav-item {{ Request::is('admin/ebooks*') || Request::is('admin/ebook-categories*') ? 'active' : '' }}"
    style="margin-bottom: -5%">
    <a class="nav-link {{ Request::is('admin/ebooks*') || Request::is('admin/ebook-categories*') ? '' : 'collapsed' }}"
      href="#" data-toggle="collapse" data-target="#collapseEbooks" aria-expanded="true"
      aria-controls="collapseEbooks">
      <i class="fas fa-book"></i>
      <span>Ebooks</span>
    </a>
    <div id="collapseEbooks"
      class="collapse {{ Request::is('admin/ebooks*') || Request::is('admin/ebook-categories*') ? 'show' : '' }}"
      aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Request::is('admin/ebooks*') ? 'active' : '' }}" href="/admin/ebooks">All
          E-Books</a>
        <a class="collapse-item {{ Request::is('admin/ebook-categories*') ? 'active' : '' }}"
          href="/admin/ebook-categories">E-Book Categories</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu Videos -->
  <li class="nav-item {{ Request::is('admin/videos*') || Request::is('admin/playlist-videos*') ? 'active' : '' }}"
    style="margin-bottom: -5%">
    <a class="nav-link {{ Request::is('admin/videos*') || Request::is('admin/playlist-videos*') ? '' : 'collapsed' }}"
      href="#" data-toggle="collapse" data-target="#collapseVideos" aria-expanded="true"
      aria-controls="collapseVideos">
      <i class="fas fa-video"></i>
      <span>Videos</span>
    </a>
    <div id="collapseVideos"
      class="collapse {{ Request::is('admin/videos*') || Request::is('admin/playlist-videos*') ? 'show' : '' }}"
      aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Request::is('admin/videos*') ? 'active' : '' }}" href="/admin/videos">All Videos
        </a>
        <a class="collapse-item {{ Request::is('admin/playlist-videos*') ? 'active' : '' }}"
          href="/admin/playlist-videos">Playlist Videos</a>
      </div>
    </div>
  </li>

  <!-- Announcement -->
  <li class="nav-item {{ Request::is('admin/announcements*') ? 'active' : '' }}" style="margin-bottom: -5%">
    <a class="nav-link" href="/admin/announcements">
      <i class="fas fa-scroll"></i>
      <span>Announcements</span></a>
  </li>

  <!-- Advertisement -->
  <li class="nav-item {{ Request::is('admin/advertisements*') ? 'active' : '' }}" style="margin-bottom: -5%">
    <a class="nav-link" href="/admin/advertisements">
      <i class="fas fa-ad"></i>
      <span>Advertisements</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu Contents -->
  <li
    class="nav-item {{ Request::is('admin/contents*') || Request::is('admin/sub-contents*') || Request::is('admin/sub-sub-contents*') ? 'active' : '' }}"
    style="margin-bottom: -5%">
    <a class="nav-link {{ Request::is('admin/contents*') || Request::is('admin/sub-contents*') || Request::is('admin/sub-sub-contents*') ? '' : 'collapsed' }}"
      href="#" data-toggle="collapse" data-target="#collapseContents" aria-expanded="true"
      aria-controls="collapseContents">
      <i class="fas fa-folder"></i>
      <span>Contents</span>
    </a>
    <div id="collapseContents"
      class="collapse {{ Request::is('admin/contents*') || Request::is('admin/sub-contents*') || Request::is('admin/sub-sub-contents*') ? 'show' : '' }}"
      aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item {{ Request::is('admin/contents*') ? 'active' : '' }}" href="/admin/contents">All
          Contents</a>
        <a class="collapse-item {{ Request::is('admin/sub-contents*') ? 'active' : '' }}"
          href="/admin/sub-contents">All Sub Contents</a>
        <a class="collapse-item {{ Request::is('admin/sub-sub-contents*') ? 'active' : '' }}"
          href="/admin/sub-sub-contents">All Sub Sub Contents</a>
      </div>
    </div>
  </li>

  <!-- Setting -->
  <li class="nav-item {{ Request::is('admin/settings*') ? 'active' : '' }}">
    <a class="nav-link" href="/admin/settings">
      <i class="fas fa-tools"></i>
      <span>Setting</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
