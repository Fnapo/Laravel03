@if(session('estado') != null)
<br />
<h2 class="texto-hc fondo-blanco">
    {{'Acción de la sesión: '.session('estado')}}
</h2>
@endif
