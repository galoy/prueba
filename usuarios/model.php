<?php
        require_once('../core/db_abstract_model.php');
        class Usuario extends DBAbstractModel {
            
        public $nombre;
        public $apellido;
        public $email;
        private $clave;
        protected $id;
function __construct() {
$this->db_name = 'mydb';
}
#traer datos de un usuario
public function get($user_email='') {
  if($user_email != ''){
         $this->query = "
            SELECT id, nombre, apellido, email, clave
            FROM usuarios
            WHERE email = '$user_email'
            ";
            $this->get_results_from_query();
}
if(count($this->rows) == 1){
    foreach ($this->rows[0] as $propiedad=>$valor){
        $this->$propiedad = $valor;
    }
    $this->mensaje ='usuario no encontrado';
        }else{
    $this->mensaje ='usuario no encontrado';
        }
   
    }
    #crear un nuevo usuario
public function set($user_data=array()) {
  if(array_key_exists('email', $user_data)){
    $this->get($user_data['email']);
if($user_data['email'] != $this->email){
                foreach ($user_data as $campo=>$valor){
                $$campo = $valor;
            }
                $this->query = "
                INSERT INTO usuarios
                (nombre, apellido, email, clave)
                VALUES
                ('$nombre', '$apellido', '$email', '$clave')
                ";
                $this->execute_single_query();
                $this->mensaje = 'usuario agregado exitosamente';
}else{
    $this->mensaje='el usuario ya existe';
                }
        }else{$this->mensaje = 'no se ha agregado el usuario';
        }
        }
        #modificar un usuario
public function edit($user_data=array()) {
     foreach ($user_data as $campo=>$valor){
            $$campo = $valor;
     }
            $this->query = "
            UPDATE usuarios
            SET nombre='$nombre',
            apellido='$apellido',
            clave='$clave'
            WHERE email = '$email'
            ";
            $this->execute_single_query();
            $this->mensaje = 'usuario modificado';
            }
            #eliminar un usuario
    public function delete($user_email='') {
     $this->query = "
        DELETE FROM usuarios
        WHERE email = '$user_email'
        ";
    $this->execute_single_query();
    $this->mensaje ='usuario eliminado';
    }
    #metodo constructor
    function _construct(){
        $this->db_name='mydb';
    }
            function __destruct() {
                unset($this);
}
}
?>

