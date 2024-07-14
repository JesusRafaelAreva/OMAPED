<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Distrito') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.distrito.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Distrito')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

                        <!-- Nombre_distrito Input -->
            <div class='form-group'>
                <label for='input-nombre_distrito' class='col-sm-2 control-label '> {{ __('Nombre_distrito') }}</label>
                <input type='text' id='input-nombre_distrito' wire:model.lazy='nombre_distrito' class="form-control  @error('nombre_distrito') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre_distrito') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- IdProv Input -->
            <div class='form-group'>
                <label for='input-idProv' class='col-sm-2 control-label '> {{ __('IdProv') }}</label>
                <select id='input-idProv' wire:model.lazy='idProv' class="form-control  @error('idProv') is-invalid @enderror">
                    @foreach(getCrudConfig('Distrito')->inputs()['idProv']['select'] as $key => $value)
                        <option value='{{ $key }}'>{{ $value }}</option>
                    @endforeach
                </select>
                @error('idProv') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.distrito.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
