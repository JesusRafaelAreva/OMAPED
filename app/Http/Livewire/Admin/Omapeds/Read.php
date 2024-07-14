<?php

namespace App\Http\Livewire\Admin\Omapeds;

use App\Models\Omapeds;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use TCPDF; // Importa la clase TCPDF

class Read extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['omapedsDeleted'];

    public $sortType;
    public $sortColumn;

    public function omapedsDeleted()
    {
        // Método para manejar eventos de eliminación
    }

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';

        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

    public function generatePDF()
    {
        $data = Omapeds::query();

        if ($this->search) {
            $data->where(function (Builder $query) {
                $query->where('DNI', 'like', '%' . $this->search . '%')
                    ->orWhere('ficha', 'like', '%' . $this->search . '%')
                    ->orWhere('direccion', 'like', '%' . $this->search . '%')
                    ->orWhere('telefono', 'like', '%' . $this->search . '%')
                    ->orWhere('telefono_fijo', 'like', '%' . $this->search . '%')
                    ->orWhere('whatsapp', 'like', '%' . $this->search . '%')
                    ->orWhere('hogares_ocupan_vivienda', 'like', '%' . $this->search . '%')
                    ->orWhere('fecha_naci', 'like', '%' . $this->search . '%')
                    ->orWhere('anos', 'like', '%' . $this->search . '%')
                    ->orWhere('mes', 'like', '%' . $this->search . '%')
                    ->orWhere('nombre_supervisor', 'like', '%' . $this->search . '%')
                    ->orWhere('resultado_formulario', 'like', '%' . $this->search . '%')
                    ->orWhere('Tiempo_Limitación', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('id');
        }

        $omapedss = $data->get();

        // Crear el PDF usando TCPDF
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);
        $html = view('livewire.admin.omapeds.pdf', compact('omapedss'))->render();
        $pdf->writeHTML($html, true, false, true, false, '');

        return response()->streamDownload(function() use ($pdf) {
            $pdf->Output('omapeds-list.pdf', 'I');
        }, 'omapeds-list.pdf');
    }

    public function render()
    {
        $data = Omapeds::query();

        $instance = getCrudConfig('omapeds');
        if ($instance->searchable()) {
            $array = (array) $instance->searchable();
            $data->where(function (Builder $query) use ($array) {
                foreach ($array as $item) {
                    if (!\Str::contains($item, '.')) {
                        $query->orWhere($item, 'like', '%' . $this->search . '%');
                    } else {
                        $array = explode('.', $item);
                        $query->orWhereHas($array[0], function (Builder $query) use ($array) {
                            $query->where($array[1], 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }

        if ($this->sortColumn) {
            $data->orderBy($this->sortColumn, $this->sortType);
        } else {
            $data->latest('id');
        }

        $data = $data->paginate(config('easy_panel.pagination_count', 15));

        return view('livewire.admin.omapeds.read', [
            'omapedss' => $data
        ])->layout('admin::layouts.app', ['title' => __(\Str::plural('Omapeds'))]);
    }
}
