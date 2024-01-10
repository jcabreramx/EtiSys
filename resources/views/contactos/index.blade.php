{{-- @include('partials.loading')
<div class="container-fluid"> --}}
{{-- <div id="card_general_contactos" class="card" style="margin-top: 0; display: block"> --}}
{{-- <div id="card_bodyContactos" class="card-body"> --}}
<div class="box_tooltip">
    <button {{ Popper::arrow('round')->theme('lightborder')->pop('Nuevo Contacto') }} class="box" alt="NUEVO CONTACTO"
        id="btnNuevoContacto" onclick="nuevoContacto()" type="button">
        <i class="fas fa-plus-circle"></i>
    </button>
</div>
<div class="row mb-1">
    <div class="col-lg-12 justify-content-sm-center">
        <div class="col-lg-12 input-group input-group-sm">
            <select id="searchTipoContacto" class="form-control ms-1 text-uppercase" style="border-radius: 5px">
                <option value="">Tipo: CUALQUIERA</option>
                @foreach ($combo_tipo as $tipo)
                    <option value="{{ $tipo->vchTipoClienteID }}">
                        ({{ $tipo->vchTipoClienteID }})
                        {{ $tipo->vchDescripcion }}</option>
                @endforeach
            </select>
            <select id="searchGrupoContacto" class="form-control ms-1 text-uppercase" style="border-radius: 5px">
                <option value="">Grupo: CUALQUIERA</option>
                @foreach ($combo_grupo as $grupo)
                    <option value="{{ $grupo->chGrupoID }}">({{ $grupo->chGrupoID }})
                        {{ $grupo->varDescripcion }}</option>
                @endforeach
            </select>
            <select id="searchOrigenContacto" class="form-control ms-1 text-uppercase" style="border-radius: 5px">
                <option value="">Origen: CUALQUIERA</option>
                @foreach ($combo_origen as $origen)
                    <option value="{{ $origen->vchOrigenID }}">({{ $origen->vchOrigenID }})
                        {{ $origen->vchDescripcion }}</option>
                @endforeach
            </select>
            <input type="text" id="searchNombreContacto" class="form-control ms-1 text-uppercase"
                placeholder="Nombre">
            <input type="text" id="searchNombreCortoContacto" class="form-control ms-1 text-uppercase"
                placeholder="Nombre Corto">
            <select id="searchAgenteContacto" class="form-control ms-1 text-uppercase" style="border-radius: 5px">
                <option value="">Agente: CUALQUIERA</option>
                @foreach ($combo_agente as $agente)
                    <option value="{{ $agente->vchUsuarioID }}">({{ $agente->vchUsuarioID }})
                        {{ $agente->vchNombre }}</option>
                @endforeach
            </select>
            <span class="input-group-append">
                <button type="button" onclick="cargarContactosAll()" id="btn-searchEstr"
                    class="btn btn-primary btn-flat ms-2 rounded-btn btn-sm"
                    {{ Popper::arrow('round')->theme('lightborder')->size('regular')->distance(10)->position('bottom')->pop('Buscar') }}
                    style="margin-top: -7px">
                    <i class="nav-icon fas fa-search"></i>
                </button>
                <button type="button" onclick="limpiarContactosAll()" id="btn-cleanEstr"
                    class="btn btn-danger btn-flat ms-2 rounded-btn btn-sm"
                    {{ Popper::arrow('round')->theme('lightborder')->size('regular')->distance(10)->position('bottom')->pop('Limpiar') }}
                    style="margin-top: -7px">
                    <i class="nav-icon fas fa-search-minus"></i>
                </button>
            </span>
        </div>
    </div>
    <div id="contactosDiv" class="col-lg-12">
        <table id="tblContactosAll" class="hover stripe compact nowrap tblnombre"
            style="font-size: 70% !important; width: 100%">
            <thead>
                {{-- <tr class="bg-blue-table">
                    <th colspan="8" class="text-center">CONTACTOS</th>
                </tr> --}}
                <tr class="bg-blue-table">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Titulo</th>
                    <th>Puesto</th>
                    <th>Sexo</th>
                    <th>Horario</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($contactos as $contacto)
                <tr>
                    <td>{{ $contacto->chContactoID }}</td>
                    <td>{{ $contacto->vchNombre }}</td>
                    <td>{{ $contacto->vchEmail }}</td>
                    <td>{{ $contacto->vchTitulo }}</td>
                    <td>{{ $contacto->vchPuesto }}</td>
                    <td>{{ $contacto->chSexo }}</td>
                    <td>{{ $contacto->vchHorario }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Sin Registros</td>
                </tr>
            @endforelse --}}
            </tbody>
            <tfoot>
                <tr class="bg-blue-table">
                    <th colspan="8"></th>
                </tr>
            </tfoot>
        </table>
    </div>
    {{-- {{ $contactos->links() }} --}}
</div>
{{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}
