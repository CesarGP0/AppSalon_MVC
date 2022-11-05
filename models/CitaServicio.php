<?php

namespace Model;

class CitaServicio extends ActiveRecord {
    protected static $tabla = 'citasServicios';
    protected static $columnasDB = ['id', 'citaId', 'servicioId'];

    public $id;
    public $citaId;
    public $servicioId;

    public function __construct($arg = [])
    {
        $this->id = $arg['id'] ?? null;
        $this->citaId = $arg['citaId'] ?? '';
        $this->servicioId = $arg['servicioId'] ?? '';

    }
}