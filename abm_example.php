<?php
require_once('../model.php');
# Traer los datos de un usuario
$usuario1 = new Usuario();
$usuario1->get('user@email.com');
print $usuario1->nombre . ' ' . $usuario1->apellido . ' existe<br>';
# Crear un nuevo usuario
$new_user_data = array(
'nombre'=>'Alberto',
'apellido'=>'Jacinto',
'email'=>'albert2000@email.com',
'clave'=>'corodos'
);
//crear un usuario
$usuario2 = new Usuario();
$usuario2->set($new_user_data);
$usuario2->get($new_user_data['email']);
print $usuario2->nombre . ' ' . $usuario2->apellido . ' ha sido creado<br>';
# Editar los datos de un usuario existente
$edit_user_data = array(
'nombre'=>'Gabriel',
'apellido'=>'Lopez',
'email'=>'albert2000@email.com',
'clave'=>'69274'
);

$usuario3 = new Usuario();
$usuario3->edit($edit_user_data);
$usuario3->get($edit_user_data['email']);
print $usuario3->nombre . ' ' . $usuario3->apellido . ' ha sido editado<br>';
#eliminar un usuario
$usuario4 = new Usuario();
$usuario4->get('albert2000@email.com');
$usuario4->delete('albert2000@email.com');
print $usuario4->nombre . ' ' . $usuario4->apellido . ' ha sido eliminado';
?>
