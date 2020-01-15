@csrf
<div>
    <?php
    $roleUsuario=(is_null($usuario) ? -1 : $usuario->role->id);
    $cuantos=0;
    ?>
</div>
<div class="centraTabla">
    <table class="tabla-i-b">
        <thead></thead>
        <tbody>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Nombre del Usuario:</label>
                </td>
                <td class="texto-hl">
                    <input class="ancho-25 fondo-verdeMarOscuro fuente-20" type="text" name="name"
                        value="{{old('name', $usuario['name'])}}" placeholder="Nombre ...">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('name')}}</strong>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Email:</label>
                </td>
                <td class="texto-hl">
                    <input type="email" class="ancho-25 fondo-verdeMarOscuro fuente-20" name="email"
                        value="{{old('email', $usuario['email'])}}" placeholder="Email ...">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('email')}}</strong>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Password:</label>
                </td>
                <td class="texto-hl">
                    <input type="text" autocomplete="off" class="ancho-25 fondo-verdeMarOscuro fuente-20"
                        name="password" placeholder="Password ..."
                        value="{{old('password', is_null($usuario) ? null : decrypt($usuario['bcifrado']))}}">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('password')}}</strong>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Role:</label>
                </td>
                <td class="celda texto-hj fondo-blanco">
                    @foreach ($rolesKeyId as $id=>$key)
                    <input type="radio" name="role_id" value="{{$id}}" id="{{'role' .$id}}"
                        {{(is_null(old('role_id')) ? $id == $roleUsuario : $id == old('role_id')) ? "checked" : ""}}><label
                        for="{{'role' .$id}}" class="ancho-10 fondo-verdeMarOscuro">{{$key}}</label>
                    <?php ++$cuantos;?>
                    @if (($cuantos % 2) == 0)
                    <br />
                    @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('role_id')}}</strong>
                    </label>
                </td>
            </tr>
            <tr class="alto-3">
                <td colspan="4" class="fuente-20-bold">
                    {{'Estos datos se guardarán en una BD.'}}
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <input class="ancho-15 boton-normal" type="submit">
                </td>
            </tr>
        </tfoot>
    </table>
</div>
