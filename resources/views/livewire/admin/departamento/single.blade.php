<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $departamento->nombre_departamento }}</td>
    
    @if(getCrudConfig('Departamento')->delete or getCrudConfig('Departamento')->update)
        <td>

            @if(getCrudConfig('Departamento')->update && hasPermission(getRouteName().'.departamento.update', 1, 1, $departamento))
                <a href="@route(getRouteName().'.departamento.update', $departamento->idDepa)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Departamento')->delete && hasPermission(getRouteName().'.departamento.delete', 1, 1, $departamento))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Departamento') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Departamento') ]) }}</p>
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
