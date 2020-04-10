@if(auth()->check())
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Panel de Control del Calificador -->
    @if(auth()->user()->is_admin)
    <li class="nav-item has-treeview menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Modulo Denuncias
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ url('visualizar') }}" class="nav-link {{ ! Route::is('visualizar') ?: 'active' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Ver Denuncias</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('denuncias') }}" class="nav-link {{ ! Route::is('denuncias') ?: 'active' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Alta Denuncias</p>
          </a>
        </li>

      </ul>
    </li>
    @endif

  </ul>
</nav>
@endif
