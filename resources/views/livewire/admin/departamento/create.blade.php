<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Departamento') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.departamento.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Departamento')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Nombre_departamento Input -->
            <div class='form-group'>
                <label for='input-nombre_departamento' class='col-sm-2 control-label '> {{ __('Departamento') }}</label>
                <input type='text' id='input-nombre_departamento' wire:model.lazy='nombre_departamento' class="form-control  @error('nombre_departamento') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre_departamento') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.departamento.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
