@csrf
<div class="centraTabla">
    <table class="tabla-i-b">
        <thead></thead>
        <tbody>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Título del Libro:</label>
                </td>
                <td>
                    <input class="ancho-20 fondo-verdeMarOscuro fuente-20" type="text" name="titulo"
                        value="{{old('titulo', $libro['titulo'])}}" placeholder="Título ...">
                </td>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">{{is_null($libro)
                        ? '' : 'Otros '}} Autores del Libro:
                    </label>
                </td>
                <td>
                    <select name="autores[]" multiple class="ancho-20">
                        <option value="{{App\Modelos\Autor::valorAnonimo()}}">{{App\Modelos\Autor::anonimo()}}</option>
                        <option disabled class="texto-hc">
                            <hr />
                        </option>
                        @foreach ($noAutores as $id=>$nombreCompleto)
                        <option value="{{$id}}">
                            {{$nombreCompleto}}
                        </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('titulo')}}</strong>
                    </label>
                </td>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('autores')}}</strong>
                    </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Ejemplares Obtenidos:</label>
                </td>
                <td class="texto-hl">
                    <input type="number" class="ancho-5 fondo-verdeMarOscuro margen alineado-v fuente-20"
                        name="obtenidos" value="{{old('obtenidos', $libro['obtenidos'])}}">
                </td>
                <td colspan="2" rowspan="3">
                    <label class="ancho-20 texto-hc fondo-blanco fuente-20-bold margen-0">Notas: Se debe elegir al menos
                        un autor.
                        <hr />Si se opta por {{App\Modelos\Autor::anonimo()}} se
                        ignorarán el resto de los seleccionados.</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('obtenidos')}}</strong>
                    </label>
                </td>
            </tr>
            @if ($libro != null)
            <tr>
                <td>
                    <label class="ancho-10 texto-hc fondo-naranja fuente-20-bold margen-0">Ejemplares
                        Disponibles:</label>
                </td>
                <td class="texto-hl">
                    <input type="number" class="ancho-5 fondo-verdeMarOscuro margen alineado-v fuente-20"
                        name="disponibles" value="{{old('disponibles', $libro['disponibles'])}}">
                </td>
                @endif
            </tr>
            <tr>
                @if ($libro != null)
                <td colspan="2" class="texto-hc color-rojo">
                    <label>
                        <strong>{{$errors->first('disponibles')}}</strong>
                    </label>
                </td>
                @endif
            </tr>
            <tr class="alto-3">
                <td colspan="4" class="texto-hc fuente-20-bold">
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
