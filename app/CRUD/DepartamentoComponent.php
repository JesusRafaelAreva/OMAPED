<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Departamento;

class DepartamentoComponent implements CRUDComponent
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
        return Departamento::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['nombre_departamento'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['nombre_departamento'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'nombre_departamento'=>'text'
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'nombre_departamento'=>'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
