  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
      </div>
      <div class="sidebar-brand-text mx-3">Admin Satpol PP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('profile.index', Auth::user()->id)}}">
          <i class="fas fa-user"></i>
          <span>Profile Admin</span></a>
      </li>

    <li class="nav-item active">
    <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{route('member.index')}}">
          <i class="fas fa-user"></i>
          <span>Data Anggota</span></a>
      </li>

      @if (Auth::user()->roles == 'ADMIN')
      <li class="nav-item active">
        <a class="nav-link" href="{{route('performance.create')}}">
            <i class="fas fa-book"></i>
            <span>Tambah Data Kinerja</span></a>
        </li>
      @endif
    

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->