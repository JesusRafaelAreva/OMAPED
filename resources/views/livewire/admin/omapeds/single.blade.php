<tr x-data="{ modalIsOpen : false }">
    <td class="">
        @if($omapeds->foto)
            <img src="{{ asset('storage/' . $omapeds->foto) }}" alt="Foto" style="max-width: 100px;">
        @else
            No hay imagen
        @endif
    </td>
    <td class="">{{ $omapeds->DNI }}</td>
    <td class="">{{ $omapeds->ficha }}</td>
    <td class="">{{ $omapeds->direccion }}</td>
    <td class="">{{ $omapeds->telefono }}</td>
    <td class="">{{ $omapeds->telefono_fijo }}</td>
    <td class="">{{ $omapeds->whatsapp }}</td>
    <td class="">{{ $omapeds->hogares_ocupan_vivienda }}</td>
    <td class="">{{ $omapeds->fecha_naci }}</td>
    <td class="">{{ $omapeds->anos }}</td>
    <td class="">{{ $omapeds->mes }}</td>
    <td class="">{{ $omapeds->nombre_supervisor }}</td>
    <td class="">{{ $omapeds->resultado_formulario }}</td>
    <td class="">{{ $omapeds->Tiempo_Limitación }}</td>
    
    @if(getCrudConfig('Omapeds')->delete or getCrudConfig('Omapeds')->update)
        <td>
            @if(getCrudConfig('Omapeds')->update && hasPermission(getRouteName().'.omapeds.update', 1, 1, $omapeds))
                <a href="@route(getRouteName().'.omapeds.update', $omapeds->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Omapeds')->delete && hasPermission(getRouteName().'.omapeds.delete', 1, 1, $omapeds))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false">
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Omapeds') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Omapeds') ]) }}</p>
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
