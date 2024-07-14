<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Provincia') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.provincia.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Provincia')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            <!-- Nombre_provincia Input -->
            <div class='form-group'>
                <label for='input-nombre_provincia' class='col-sm-2 control-label'>{{ __('Nombre_provincia') }}</label>
                <input type='text' id='input-nombre_provincia' wire:model.lazy='nombre_provincia' class="form-control @error('nombre_provincia') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre_provincia') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- IdDepa Input -->
            <div class='form-group'>
                <label for='input-idDepa' class='col-sm-2 control-label'>{{ __('Departamento') }}</label>
                <select id='input-idDepa' wire:model.lazy='idDepa' class="form-control @error('idDepa') is-invalid @enderror">
                    <option value="">{{ __('Select Departamento') }}</option>
                    @if($departamentos)
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->idDepa }}">{{ $departamento->nombre_departamento }}</option>
                        @endforeach
                    @endif
                </select>
                @error('idDepa') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.provincia.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
