<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Tipos_limitacion') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.tipos_limitacion.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Tipos_limitacion')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Tipo_limitacion Input -->
            <div class='form-group'>
                <label for='input-tipo_limitacion' class='col-sm-2 control-label '> {{ __('Tipo_limitacion') }}</label>
                <input type='text' id='input-tipo_limitacion' wire:model.lazy='tipo_limitacion' class="form-control  @error('tipo_limitacion') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('tipo_limitacion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.tipos_limitacion.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
