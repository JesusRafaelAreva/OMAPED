<form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <!-- Sección de Información Personal -->
            <div class="col-md-6">
                <h4>Información Personal</h4>
                <!-- Foto Input -->
                <div class='form-group'>
                    <label for='input-foto'>{{ __('Foto') }}</label>
                    <input type='file' id='input-foto' wire:model='foto' class="form-control-file @error('foto') is-invalid @enderror">
                    @if($foto and !$errors->has('foto') and $foto instanceof Illuminate\Http\UploadedFile and $foto->isPreviewable())
                        <a href="{{ $foto->temporaryUrl() }}" target="_blank"><img width="200" height="200" class="mt-3 img-fluid shadow" src="{{ $foto->temporaryUrl() }}" alt=""></a>
                    @endif
                    @error('foto') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- DNI Input -->
                <div class='form-group'>
                    <label for='input-DNI'>{{ __('DNI') }}</label>
                    <input type='number' id='input-DNI' wire:model.lazy='DNI' class="form-control @error('DNI') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('DNI') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Nombre_apellidos Input -->
                <div class='form-group'>
                    <label for='input-nombre_apellidos'>{{ __('Nombres y Apellidos') }}</label>
                    <input type='text' id='input-nombre_apellidos' wire:model.lazy='nombre_apellidos' class="form-control @error('nombre_apellidos') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('nombre_apellidos') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Fecha_naci Input -->
                <div class='form-group'>
                    <label for='input-fecha_naci'>{{ __('Fecha de Nacimiento') }}</label>
                    <input type='date' id='input-fecha_naci' wire:model.lazy='fecha_naci' class="form-control @error('fecha_naci') is-invalid @enderror" autocomplete='on'>
                    @error('fecha_naci') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Anos Input -->
                <div class='form-group'>
                    <label for='input-anos'>{{ __('Años') }}</label>
                    <input type='text' id='input-anos' wire:model.lazy='anos' class="form-control @error('anos') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('anos') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Mes Input -->
                <div class='form-group'>
                    <label for='input-mes'>{{ __('Meses') }}</label>
                    <input type='text' id='input-mes' wire:model.lazy='mes' class="form-control @error('mes') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('mes') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Sección de Ubicación -->
            <div class="col-md-6">
                <h4>Ubicación</h4>
                <!-- Departamento_id Input -->
                <div class='form-group'>
                    <label for='input-departamento_id'>{{ __('Departamento') }}</label>
                    <select id='input-departamento_id' wire:model.lazy='departamento_id' class="form-control @error('departamento_id') is-invalid @enderror">
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->idDepa }}">{{ $departamento->nombre_departamento }}</option>
                        @endforeach
                    </select>
                    @error('departamento_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Provincia_id Input -->
                <div class='form-group'>
                    <label for='input-provincia_id'>{{ __('Provincia') }}</label>
                    <select id='input-provincia_id' wire:model.lazy='provincia_id' class="form-control @error('provincia_id') is-invalid @enderror">
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->idProv }}">{{ $provincia->nombre_provincia }}</option>
                        @endforeach
                    </select>
                    @error('provincia_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Distrito_id Input -->
                <div class='form-group'>
                    <label for='input-distrito_id'>{{ __('Distrito') }}</label>
                    <select id='input-distrito_id' wire:model.lazy='distrito_id' class="form-control @error('distrito_id') is-invalid @enderror">
                        @foreach($distritos as $distrito)
                            <option value="{{ $distrito->idDist }}">{{ $distrito->nombre_distrito }}</option>
                        @endforeach
                    </select>
                    @error('distrito_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Centro_poblado_id Input -->
                <div class='form-group'>
                    <label for='input-centro_poblado_id'>{{ __('Centros Poblados') }}</label>
                    <select id='input-centro_poblado_id' wire:model.lazy='centro_poblado_id' class="form-control @error('centro_poblado_id') is-invalid @enderror">
                        @foreach ($centrosPoblados as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->centro_poblado }}</option>
                        @endforeach
                    </select>
                    @error('centro_poblado_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Sector_id Input -->
                <div class='form-group'>
                    <label for='input-sector_id'>{{ __('AAHH y Casco urbano') }}</label>
                    <select id='input-sector_id' wire:model.lazy='sector_id' class="form-control @error('sector_id') is-invalid @enderror">
                        @foreach ($sectores as $sector)
                            <option value="{{ $sector->id }}">{{ $sector->sector }}</option>
                        @endforeach
                    </select>
                    @error('sector_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Direccion Input -->
                <div class='form-group'>
                    <label for='input-direccion'>{{ __('Direccion') }}</label>
                    <input type='text' id='input-direccion' wire:model.lazy='direccion' class="form-control @error('direccion') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('direccion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Sección de Contacto -->
            <div class="col-md-6">
                <h4>Información de Contacto</h4>
                <!-- Telefono Input -->
                <div class='form-group'>
                    <label for='input-telefono'>{{ __('Numero de Telefono') }}</label>
                    <input type='number' id='input-telefono' wire:model.lazy='telefono' class="form-control @error('telefono') is-invalid @enderror" placeholder='+51 XXX-XXX-XXX' autocomplete='on'>
                    @error('telefono') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Telefono_fijo Input -->
                <div class='form-group'>
                    <label for='input-telefono_fijo'>{{ __('Numero de Telefono Fijo') }}</label>
                    <input type='number' id='input-telefono_fijo' wire:model.lazy='telefono_fijo' class="form-control @error('telefono_fijo') is-invalid @enderror" placeholder='073 XX-XX-XX' autocomplete='on'>
                    @error('telefono_fijo') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Whatsapp Input -->
                <div class='form-group'>
                    <label for='input-whatsapp'>{{ __('Numero de Whatsapp') }}</label>
                    <input type='number' id='input-whatsapp' wire:model.lazy='whatsapp' class="form-control @error('whatsapp') is-invalid @enderror" placeholder='+51 XXX-XXX-XXX' autocomplete='on'>
                    @error('whatsapp') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Sección de Información Adicional -->
            <div class="col-md-6">
                <h4>Información Adicional</h4>
                <!-- Ficha Input -->
                <div class='form-group'>
                    <label for='input-ficha'>{{ __('Ficha') }}</label>
                    <input type='text' id='input-ficha' wire:model.lazy='ficha' class="form-control @error('ficha') is-invalid @enderror" placeholder='' autocomplete='off' readonly>
                    @error('ficha') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Nucleo_id Input -->
                <div class='form-group'>
                    <label for='input-nucleo_id'>{{ __('Nucleo Familiar') }}</label>
                    <select id='input-nucleo_id' wire:model.lazy='nucleo_id' class="form-control @error('nucleo_id') is-invalid @enderror">
                        @foreach ($nucleos as $nucleo)
                            <option value="{{ $nucleo->id }}">{{ $nucleo->nucleo }}</option>
                        @endforeach
                    </select>
                    @error('nucleo_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Hogares_ocupan_vivienda Input -->
                <div class='form-group'>
                    <label for='input-hogares_ocupan_vivienda'>{{ __('Hogares que ocupan la vivienda') }}</label>
                    <input type='text' id='input-hogares_ocupan_vivienda' wire:model.lazy='hogares_ocupan_vivienda' class="form-control @error('hogares_ocupan_vivienda') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('hogares_ocupan_vivienda') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Sección de Limitación -->
            <div class="col-md-6">
                <h4>Información de Limitación</h4>
                <!-- Tiempo_Limitación Input -->
                <div class='form-group'>
                    <label for='input-Tiempo_Limitación'>{{ __('Tiempo de Limitación') }}</label>
                    <input type='text' id='input-Tiempo_Limitación' wire:model.lazy='Tiempo_Limitación' class="form-control @error('Tiempo_Limitación') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('Tiempo_Limitación') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Tipo_limitacion_id Input -->
                <div class='form-group'>
                    <label for='input-tipo_limitacion_id'>{{ __('Tipo de Limitación') }}</label>
                    <select id='input-tipo_limitacion_id' wire:model.lazy='tipo_limitacion_id' class="form-control @error('tipo_limitacion_id') is-invalid @enderror">
                        @foreach ($tiposLimitacion as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo_limitacion }}</option>
                        @endforeach
                    </select>
                    @error('tipo_limitacion_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Sección de Encuesta -->
            <div class="col-md-6">
                <h4>Información de Encuesta</h4>
                <!-- Nombre_apellido_encuestador Input -->
                <div class='form-group'>
                    <label for='input-nombre_apellido_encuestador'>{{ __('Nombres y Apellidos del Encuestador') }}</label>
                    <input type='text' id='input-nombre_apellido_encuestador' wire:model.lazy='nombre_apellido_encuestador' class="form-control @error('nombre_apellido_encuestador') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('nombre_apellido_encuestador') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Nombre_supervisor Input -->
                <div class='form-group'>
                    <label for='input-nombre_supervisor'>{{ __('Nombre del Supervisor') }}</label>
                    <input type='text' id='input-nombre_supervisor' wire:model.lazy='nombre_supervisor' class="form-control @error('nombre_supervisor') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('nombre_supervisor') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <!-- Resultado_formulario Input -->
                <div class='form-group'>
                    <label for='input-resultado_formulario'>{{ __('Resultado del Formulario') }}</label>
                    <input type='text' id='input-resultado_formulario' wire:model.lazy='resultado_formulario' class="form-control @error('resultado_formulario') is-invalid @enderror" placeholder='' autocomplete='on'>
                    @error('resultado_formulario') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
        <a href="@route(getRouteName().'.omapeds.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
    </div>
</form>