<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $distrito->nombre_distrito }}</td>
    <td class="">{{ $distrito->provincia->nombre_provincia }}</td>

    @if(getCrudConfig('Distrito')->delete or getCrudConfig('Distrito')->update)
        <td>
            @if(getCrudConfig('Distrito')->update && hasPermission(getRouteName().'.distrito.update', 1, 1, $distrito))
                <a href="@route(getRouteName().'.distrito.update', $distrito->idDist)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Distrito')->delete && hasPermission(getRouteName().'.distrito.delete', 1, 1, $distrito))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Distrito') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Distrito') ]) }}</p>
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
