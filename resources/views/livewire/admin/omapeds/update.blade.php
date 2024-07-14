<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Omapeds') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.omapeds.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Omapeds')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Foto Input -->
            <div class='form-group'>
                <label for='input-foto' class='col-sm-2 control-label '> {{ __('Foto') }}</label>
                <input type='file' id='input-foto' wire:model='foto' class="form-control-file  @error('foto') is-invalid @enderror">
                @if($foto and !$errors->has('foto') and $foto instanceof Illuminate\Http\UploadedFile and $foto->isPreviewable())
                    <a href="{{ $foto->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $foto->temporaryUrl() }}" alt=""></a>
                @endif
                @error('foto') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- DNI Input -->
            <div class='form-group'>
                <label for='input-DNI' class='col-sm-2 control-label '> {{ __('DNI') }}</label>
                <input type='number' id='input-DNI' wire:model.lazy='DNI' class="form-control  @error('DNI') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('DNI') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Nombre_apellidos Input -->
            <div class='form-group'>
                <label for='input-nombre_apellidos' class='col-sm-2 control-label '> {{ __('Nombre_apellidos') }}</label>
                <input type='text' id='input-nombre_apellidos' wire:model.lazy='nombre_apellidos' class="form-control  @error('nombre_apellidos') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre_apellidos') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Ficha Input -->
            <div class='form-group'>
                <label for='input-ficha' class='col-sm-2 control-label '> {{ __('Ficha') }}</label>
                <input type='number' id='input-ficha' wire:model.lazy='ficha' class="form-control  @error('ficha') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('ficha') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Departamento_id Input -->
            <select wire:model="departamento_id" class="form-control">
                <option value="">Seleccione un departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->idDepa }}">{{ $departamento->nombre_departamento }}</option>
                @endforeach
            </select>
            <!-- Provincia_id Input -->
            <select wire:model="provincia_id" class="form-control">
                <option value="">Seleccione una provincia</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->idProv }}">{{ $provincia->nombre_provincia }}</option>
                @endforeach
            </select>
            <!-- Distrito_id Input -->
            <select wire:model="distrito_id" class="form-control">
                <option value="">Seleccione un distrito</option>
                @foreach ($distritos as $distrito)
                    <option value="{{ $distrito->idDist }}">{{ $distrito->nombre_distrito }}</option>
                @endforeach
            </select>
            <!-- Nucleo_id Input -->
            <select wire:model="nucleo_id" class="form-control">
                <option value="">Seleccione un núcleo</option>
                @foreach ($nucleos as $nucleo)
                    <option value="{{ $nucleo->id }}">{{ $nucleo->nucleo }}</option>
                @endforeach
            </select>
            <!-- Centro_poblado_id Input -->
            <select wire:model="centro_poblado_id" class="form-control">
                <option value="">Seleccione un centro poblado</option>
                @foreach ($centros_poblados as $centro_poblado)
                    <option value="{{ $centro_poblado->id }}">{{ $centro_poblado->centro_poblado }}</option>
                @endforeach
            </select>
            <!-- Sector_id Input -->
            <select wire:model="sector_id" class="form-control">
                <option value="">Seleccione un sector</option>
                @foreach ($sectores as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->sector }}</option>
                @endforeach
            </select>
            <!-- Direccion Input -->
            <div class='form-group'>
                <label for='input-direccion' class='col-sm-2 control-label '> {{ __('Direccion') }}</label>
                <input type='text' id='input-direccion' wire:model.lazy='direccion' class="form-control  @error('direccion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('direccion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Telefono Input -->
            <div class='form-group'>
                <label for='input-telefono' class='col-sm-2 control-label '> {{ __('Telefono') }}</label>
                <input type='number' id='input-telefono' wire:model.lazy='telefono' class="form-control  @error('telefono') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('telefono') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Telefono_fijo Input -->
            <div class='form-group'>
                <label for='input-telefono_fijo' class='col-sm-2 control-label '> {{ __('Telefono_fijo') }}</label>
                <input type='number' id='input-telefono_fijo' wire:model.lazy='telefono_fijo' class="form-control  @error('telefono_fijo') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('telefono_fijo') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Whatsapp Input -->
            <div class='form-group'>
                <label for='input-whatsapp' class='col-sm-2 control-label '> {{ __('Whatsapp') }}</label>
                <input type='number' id='input-whatsapp' wire:model.lazy='whatsapp' class="form-control  @error('whatsapp') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('whatsapp') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Hogares_ocupan_vivienda Input -->
            <div class='form-group'>
                <label for='input-hogares_ocupan_vivienda' class='col-sm-2 control-label '> {{ __('Hogares_ocupan_vivienda') }}</label>
                <input type='text' id='input-hogares_ocupan_vivienda' wire:model.lazy='hogares_ocupan_vivienda' class="form-control  @error('hogares_ocupan_vivienda') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('hogares_ocupan_vivienda') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Fecha_naci Input -->
            <div class='form-group'>
                <label for='input-fecha_naci' class='col-sm-2 control-label '> {{ __('Fecha_naci') }}</label>
                <input type='date' id='input-fecha_naci' wire:model.lazy='fecha_naci' class="form-control  @error('fecha_naci') is-invalid @enderror" autocomplete='on'>
                @error('fecha_naci') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Anos Input -->
            <div class='form-group'>
                <label for='input-anos' class='col-sm-2 control-label '> {{ __('Anos') }}</label>
                <input type='text' id='input-anos' wire:model.lazy='anos' class="form-control  @error('anos') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('anos') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Mes Input -->
            <div class='form-group'>
                <label for='input-mes' class='col-sm-2 control-label '> {{ __('Mes') }}</label>
                <input type='text' id='input-mes' wire:model.lazy='mes' class="form-control  @error('mes') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('mes') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Nombre_apellido_encuestador Input -->
            <div class='form-group'>
                <label for='input-nombre_apellido_encuestador' class='col-sm-2 control-label '> {{ __('Nombre_apellido_encuestador') }}</label>
                <input type='text' id='input-nombre_apellido_encuestador' wire:model.lazy='nombre_apellido_encuestador' class="form-control  @error('nombre_apellido_encuestador') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre_apellido_encuestador') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Nombre_supervisor Input -->
            <div class='form-group'>
                <label for='input-nombre_supervisor' class='col-sm-2 control-label '> {{ __('Nombre_supervisor') }}</label>
                <input type='text' id='input-nombre_supervisor' wire:model.lazy='nombre_supervisor' class="form-control  @error('nombre_supervisor') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre_supervisor') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Resultado_formulario Input -->
            <div class='form-group'>
                <label for='input-resultado_formulario' class='col-sm-2 control-label '> {{ __('Resultado_formulario') }}</label>
                <input type='text' id='input-resultado_formulario' wire:model.lazy='resultado_formulario' class="form-control  @error('resultado_formulario') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('resultado_formulario') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Tiempo_Limitación Input -->
            <div class='form-group'>
                <label for='input-Tiempo_Limitación' class='col-sm-2 control-label '> {{ __('Tiempo_Limitación') }}</label>
                <input type='text' id='input-Tiempo_Limitación' wire:model.lazy='Tiempo_Limitación' class="form-control  @error('Tiempo_Limitación') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('Tiempo_Limitación') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Tipo_limitacion_id Input -->
            <select wire:model="tipo_limitacion_id" class="form-control">
                <option value="">Seleccione un tipo de limitación</option>
                @foreach ($tipos_limitacion as $tipo_limitacion)
                    <option value="{{ $tipo_limitacion->id }}">{{ $tipo_limitacion->tipo_limitacion }}</option>
                @endforeach
            </select>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.omapeds.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
