<?php
//start session
session_start();
//load and initialize user class
include 'user.php';
$user = new User();
if(isset($_POST['signupSubmit'])){
	//check whether user details are empty
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
		//password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirme que la contraseña debe coincidir con la contraseña.'; 
        }else{
			//check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $user->getRows($prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'El correo electrónico ya existe, utilice otro correo electrónico.';
            }else{
				//insert user data in the database
                $userData = array(
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'password' => md5($_POST['password']),
                    'phone' => $_POST['phone']
                );
                $insert = $user->insert($userData);
				//set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Te has registrado correctamente, inicia sesión con tus credenciales.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Se produjo algún problema, por favor intente nuevamente.';
                }
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Todos los campos son obligatorios, complete todos los campos.'; 
    }
	
// almacena el estado de registro en la sesión
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'registro_usuario.php':'registro_usuario.php';
	//redirect to the home/registration page
    header("Location:".$redirectURL);
}