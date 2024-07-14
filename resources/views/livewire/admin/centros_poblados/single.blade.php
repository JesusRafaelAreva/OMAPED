<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $centros_poblados->centro_poblado }}</td>
    
    @if(getCrudConfig('Centros_poblados')->delete or getCrudConfig('Centros_poblados')->update)
        <td>

            @if(getCrudConfig('Centros_poblados')->update && hasPermission(getRouteName().'.centros_poblados.update', 1, 1, $centros_poblados))
                <a href="@route(getRouteName().'.centros_poblados.update', $centros_poblados->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Centros_poblados')->delete && hasPermission(getRouteName().'.centros_poblados.delete', 1, 1, $centros_poblados))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Centros_poblados') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Centros_poblados') ]) }}</p>
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
