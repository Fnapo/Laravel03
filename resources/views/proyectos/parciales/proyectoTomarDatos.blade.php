@csrf
<div class="centraTabla">
    <table class="tabla-i-b">
        <thead></thead>
        <tbody>
            <tr>
                <td>
                    <label class="ancho-20 texto-hc fondo-naranja fuente-20-bold margen-0">Título del Proyecto:</label>
                </td>
                <td>
                    <input class="ancho-20 fondo-verdeMarOscuro fuente-20" type="text" name="titulo"
                        value="{{old('titulo', $proyecto['titulo'])}}" placeholder="Título ...">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('titulo')}}</strong>
                    </label>
                </td>
            </tr>
            <tr class="alto-3">
                <td>
                    <label class="ancho-20 texto-hc fondo-naranja fuente-20-bold margen-0">Descripción del Proyecto:</label>
                </td>
                <td>
                    <textarea class="ancho-20 fondo-verdeMarOscuro alineado-v fuente-20" name="descripcion"
                        placeholder="Descripción ...">{{$proyecto == null
                        ? old('descripcion') : old('descripcion', $proyecto['descripcion'])}}</textarea>
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
                <td colspan="2" class="texto-hc fuente-20-bold">
                    {{'Estos datos se guardarán en una BD.'}}
                </td>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table>
</div>
<div class="centraTabla">
    <table class="tabla-i-b">
        <thead></thead>
        <tbody class="texto-hc">
            <tr>
                <td>
                    <input class="ancho-15 boton-normal" type="submit">
                </td>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table>
</div>
