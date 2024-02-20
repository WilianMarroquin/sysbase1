
<li class="nav-item">
    <a href="{{ route('tipoMonedas.index') }}" class="nav-link {{ Request::is('tipoMonedas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Monedas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tipoMovimientos.index') }}" class="nav-link {{ Request::is('tipoMovimientos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Movimientos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tipoCuentas.index') }}" class="nav-link {{ Request::is('tipoCuentas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Cuentas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li>
