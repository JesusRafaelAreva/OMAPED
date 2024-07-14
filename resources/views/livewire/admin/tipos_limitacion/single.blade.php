<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $tipos_limitacion->tipo_limitacion }}</td>
    
    @if(getCrudConfig('Tipos_limitacion')->delete or getCrudConfig('Tipos_limitacion')->update)
        <td>

            @if(getCrudConfig('Tipos_limitacion')->update && hasPermission(getRouteName().'.tipos_limitacion.update', 1, 1, $tipos_limitacion))
                <a href="@route(getRouteName().'.tipos_limitacion.update', $tipos_limitacion->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Tipos_limitacion')->delete && hasPermission(getRouteName().'.tipos_limitacion.delete', 1, 1, $tipos_limitacion))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Tipos_limitacion') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Tipos_limitacion') ]) }}</p>
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
