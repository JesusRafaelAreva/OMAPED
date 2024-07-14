<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $provincia->nombre_provincia }}</td>
    <td class="">{{$departamentoNombre}}</td>
    
    @if(getCrudConfig('Provincia')->delete or getCrudConfig('Provincia')->update)
        <td>

            @if(getCrudConfig('Provincia')->update && hasPermission(getRouteName().'.provincia.update', 1, 1, $provincia))
                <a href="@route(getRouteName().'.provincia.update', $provincia->idProv)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Provincia')->delete && hasPermission(getRouteName().'.provincia.delete', 1, 1, $provincia))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Provincia') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Provincia') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
