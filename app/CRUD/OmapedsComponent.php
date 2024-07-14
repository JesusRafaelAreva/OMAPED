<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Omapeds;

class OmapedsComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Omapeds::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['foto', 'DNI', 'ficha', 'direccion', 'telefono', 'telefono_fijo', 'whatsapp', 'hogares_ocupan_vivienda', 'fecha_naci', 'anos', 'mes', 'nombre_supervisor', 'resultado_formulario', 'Tiempo_Limitación'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['foto', 'DNI', 'ficha', 'direccion', 'telefono', 'telefono_fijo', 'whatsapp', 'hogares_ocupan_vivienda', 'fecha_naci', 'anos', 'mes', 'nombre_supervisor', 'resultado_formulario', 'Tiempo_Limitación'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'foto'=>'file',
            'DNI'=>'number',
            'nombre_apellidos'=>'text',
            'ficha'=>'number',
            'departamento_id'=>'select',
            'provincia_id'=>'select',
            'distrito_id' =>'select',
            'nucleo_id'=>'select',
            'centro_poblado_id'=>'select',
            'sector_id'=>'select',
            'direccion'=>'text',
            'telefono'=>'number',
            'telefono_fijo'=>'number',
            'whatsapp'=>'number',
            'hogares_ocupan_vivienda'=>'text',
            'fecha_naci'=>'date',
            'anos'=>'text',
            'mes'=>'text',
            'nombre_apellido_encuestador'=>'text',
            'nombre_supervisor'=>'text',
            'resultado_formulario'=>'text',
            'Tiempo_Limitación'=>'text',
            'tipo_limitacion_id'=>'select'

        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
