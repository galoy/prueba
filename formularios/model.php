<?php

require_once ('../core/db_abstract_model.php');
class formulario extends DBAbstractModel {
    public $nombre;
    public $descripcion;
    public $ubicacion;
    public $estado;
    protected $id;
    function __construct() {
        $this->db_name = 'mydb';
    }
}

