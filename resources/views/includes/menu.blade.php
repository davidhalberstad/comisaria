
@if(auth()->check())
<div class="card border-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Menu</div>
    <div class="card-body">
      <ul class="nav flex-column">
        <!-- @if(auth()->check()) -->
          <li><a href="#">Dashboard </a></li>

          @if(! auth()->user()->is_client)
          <li><a href="{{ url('home') }}">Ver Denuncias </a></li>
          @endif

          <!-- <li><a href="reportar">Rerportar Incidencias </a></li> -->

          @if(auth()->user()->is_admin)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administracion</a>
            <div class="dropdown-menu">
              <!-- <a class="dropdown-item" href="usuarios">Usuarios</a> -->
              <a class="dropdown-item" href="{{ url('denuncias') }}">Denuncias</a>
              <!-- <a class="dropdown-item" href="proyectos">Proyectos</a>
              <a class="dropdown-item" href="#">Configuracion</a> -->
           </div>
          </li>
          @endif

        <!-- @else
          <li><a href="#">Bienvenido </a></li>
          <!-- <li><a href="#">Instrucciones </a></li>
          <li><a href="#">Creditos </a></li> -->
        @endif -->
      </ul>
    </div>
</div>
@endif
