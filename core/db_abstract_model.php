<?php

abstract class DBAbstractModel {

    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '123';
    protected $db_name = 'mydb';
    protected $query;
    protected $rows = array();
    private $conn;
    public $mensaje = 'Hecho';

    //metodos abstractos para ABM de clases que heredan

    abstract protected function get();

    abstract protected function set();

    abstract protected function edit();

    abstract protected function delete();

    //los sgtes metodos puede definirse con exactitud
    //no son abstractos
    //conectar a la base de datos

    private function open_conection() {

        $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
    }

    //desconectar la base de datos

    private function close_connection() {

        $this->conn->close();
    }

    //ejecutar un query simple de tipo INSERT, DELETE, UPDATE

    protected function execute_single_query() {

        $this->open_conection();
        $this->conn->query($this->query);
        $this->close_connection();
    }

    //traer resultados de una consulta en un Array

    protected function get_results_from_query() {

        if ($_POST) {
            $this->open_conection();
            $result = $this->conn->query($this->query);
            while ($this->rows[] = $result->fetch_assoc());
            $result->close();
            $this->close_connection();
        } else {
            $this->mensaje = 'Metodo no permitido';
        }
        array_pop($this->rows);
    }

}

?>