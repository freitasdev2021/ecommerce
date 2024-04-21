<?php
require"class.php";
if($_POST['action'] == "setRegistro"){
    $dados = array(
        "nome" => $_POST['nome'],
        "nascimento" => (isset($_POST['nascimento']))?$_POST['nascimento'] : NULL,
        'cidade' => (isset($_POST['cidade']))?$_POST['cidade'] : '',
        'curso' => (isset($_POST['area']))?$_POST['area'] : '',
        'email' => $_POST['email'],
        'Origem' => $_POST['Origem'],
        'telefone' => $_POST['telefone'] 
    );
    echo Cursos::setProspect($dados);
}else if($_POST['action'] == "login"){
    if($_POST['username'] == "microlinsIpatinga001577" && $_POST['password'] == "v/5:!|+2!M"){
        if($_SESSION['login'] = 1){
            echo "Logado";
        }
    }else{
        session_destroy();
        echo "Erro";
    }
}elseif($_POST['action'] == "Leads"){
    echo Cursos::getLeads($_POST['table']);
}elseif($_POST['action'] == "apagaLeads"){
    echo Cursos::delLeads($_POST['table']);
}