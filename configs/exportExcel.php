<?php
$leads = json_decode(file_get_contents("https://microlinsteste.shop/app.php?key=MQY1159"));
require"SimpleXLSXGen.php";
if($_GET['action'] == "Site"){
    $table = [
        ["Nome","Data de nascimento","Cidade","Curso de interesse","Email","Telefone"]
    ];
    foreach($leads->SITE as $dado){
        $table[] = [$dado->nome,($dado->nascimento)?date('d/m/Y',strtotime($dado->nascimento)) : '',$dado->cidade,$dado->curso,$dado->email,$dado->telefone];
    }
    Shuchkin\SimpleXLSXGen::fromArray( $table )->downloadAs('Leads_Site.xlsx');
}elseif($_GET['action'] == 'PIQ'){
    $table = [
        ["Nome","Data de nascimento","Cidade","Curso de interesse","Email","Telefone"]
    ];
    foreach($leads->PIQ as $dado){
        $table[] = [$dado->nome,date('d/m/Y',strtotime($dado->nascimento)),$dado->cidade,$dado->curso,$dado->email,$dado->telefone];
    }
    Shuchkin\SimpleXLSXGen::fromArray( $table )->downloadAs('Leads_PIQ.xlsx');
}elseif($_GET['action'] == 'WhatsApp'){
    $table = [
        ["Nome","Email","Telefone"]
    ];
    foreach($leads->ZAP as $dado){
        $table[] = [$dado->nome,$dado->email,$dado->telefone];
    }
    Shuchkin\SimpleXLSXGen::fromArray( $table )->downloadAs('Leads_WhatsApp.xlsx');
}