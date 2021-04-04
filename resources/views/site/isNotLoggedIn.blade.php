<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Acessar Administrador</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.index') }}" class="dropdown-item dropdown-footer">
            <i class="fas fa-sign-in-alt mr-2"></i> Entrar
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->