@csrf
<div class="centraTabla">
    <table class="tabla-i-b">
        <thead></thead>
        <tbody>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Clave del Role:</label>
                </td>
                <td class="texto-hl">
                    <input class="ancho-15 fondo-verdeMarOscuro fuente-20" type="text" name="key"
                        value="{{old('key', $role['key'])}}" placeholder="Clave ...">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('key')}}</strong>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Función:</label>
                </td>
                <td class="texto-hl">
                    <input type="text" class="ancho-25 fondo-verdeMarOscuro fuente-20" name="funcion"
                        value="{{old('funcion', $role['funcion'])}}" placeholder="Función ...">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('funcion')}}</strong>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Descripción:</label>
                </td>
                <td class="texto-hl">
                    <textarea class="ancho-25 fondo-verdeMarOscuro fuente-20" name="descripcion"
                        placeholder="Descripción ...">{{old('descripcion', $role['descripcion'])}}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('descripcion')}}</strong>
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
