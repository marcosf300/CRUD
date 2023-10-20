<?php
include_once "../ConecDB/Conection.php";
include_once "../Model/Usuario.php";
include_once "../DAO/UsuarioDAO.php";


$user = new Usuario();
$dao = new UsuarioDAO();


$d = filter_input_array(INPUT_POST);


if(isset($_POST['cadastrar'])){

    $user->setName($d['name']);
    $user->setSurname($d['surname']);
    $user->setAge($d['age']);
    $user->setGender($d['gender']);

    $dao->create($user);

    header("Location: ../../");
} 

else if(isset($_POST['editar'])){

    $user->setName($d['name']);
    $user->setSurname($d['surname']);
    $user->setAge($d['age']);
    $user->setGender($d['gender']);
    $user->setId($d['id']);

    $dao->update($user);

    header("Location: ../../");
}

else if(isset($_GET['del'])){

    $user->setId($_GET['del']);

    $dao->delete($user);

    header("Location: ../../");
}else{
    header("Location: ../../");
}