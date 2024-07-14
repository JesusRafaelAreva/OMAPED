<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Omapeds')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Omapeds')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Omapeds')->create && hasPermission(getRouteName().'.omapeds.create', 1, 1))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.omapeds.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Omapeds') ]) }}</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('admin.omapeds.generate-pdf', ['search' => $search]) }}" class="btn btn-primary" target="_blank">Generate PDF</a>
                        </div>
                        
                        @endif
                        @if(getCrudConfig('Omapeds')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('foto')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'foto') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'foto') fa-sort-amount-up ml-2 @endif'></i> {{ __('Foto') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('DNI')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'DNI') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'DNI') fa-sort-amount-up ml-2 @endif'></i> {{ __('DNI') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('ficha')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'ficha') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'ficha') fa-sort-amount-up ml-2 @endif'></i> {{ __('Ficha') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('direccion')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'direccion') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'direccion') fa-sort-amount-up ml-2 @endif'></i> {{ __('Direccion') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('telefono')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'telefono') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'telefono') fa-sort-amount-up ml-2 @endif'></i> {{ __('Numero de Telefono') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('telefono_fijo')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'telefono_fijo') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'telefono_fijo') fa-sort-amount-up ml-2 @endif'></i> {{ __('Telefono Fijo') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('whatsapp')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'whatsapp') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'whatsapp') fa-sort-amount-up ml-2 @endif'></i> {{ __('Whatsapp') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('hogares_ocupan_vivienda')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'hogares_ocupan_vivienda') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'hogares_ocupan_vivienda') fa-sort-amount-up ml-2 @endif'></i> {{ __('Hogares_ocupan_vivienda') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('fecha_naci')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'fecha_naci') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'fecha_naci') fa-sort-amount-up ml-2 @endif'></i> {{ __('Fecha Nacimiento') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('anos')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'anos') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'anos') fa-sort-amount-up ml-2 @endif'></i> {{ __('Anos') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('mes')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'mes') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'mes') fa-sort-amount-up ml-2 @endif'></i> {{ __('Mes') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('nombre_supervisor')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'nombre_supervisor') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'nombre_supervisor') fa-sort-amount-up ml-2 @endif'></i> {{ __('Nombre_supervisor') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('resultado_formulario')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'resultado_formulario') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'resultado_formulario') fa-sort-amount-up ml-2 @endif'></i> {{ __('Resultado_formulario') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('Tiempo_Limitación')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'Tiempo_Limitación') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'Tiempo_Limitación') fa-sort-amount-up ml-2 @endif'></i> {{ __('Tiempo_Limitación') }} </th>
                            
                            @if(getCrudConfig('Omapeds')->delete or getCrudConfig('Omapeds')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($omapedss as $omapeds)
                            @livewire('admin.omapeds.single', [$omapeds], key($omapeds->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $omapedss->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
