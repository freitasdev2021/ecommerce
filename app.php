<?php
if(isset($_GET['key']) && $_GET['key'] == 'MQY1159'){
    $servername = "127.0.0.1";
    $username = "u207961157_mic001577";
    $senha = "SwPx3841";
    $database = "u207961157_micParaiso";
    $connect = mysqli_connect($servername,$username,$senha,$database);
    $SQL = mysqli_query($connect,"SELECT * FROM prospects");
    $piq = [];
    $site = [];
    $zap = [];
    $prospects = array(
        "SITE" => array(),
        "PIQ" => array(),
        "ZAP" => array()
    );
    foreach($SQL as $s){
        if($s['Origem'] == "SITE"){
            array_push($site,$s);
        }elseif($s['Origem'] == 'PIQ'){
            array_push($piq,$s);
        }
        if(empty($s['nascimento']) && empty($s['cidade']) && empty($s['curso'])){
            array_push($zap,$s);
        }
    }
    $prospects['SITE'] = $site;
    $prospects['PIQ'] = $piq;
    $prospects['ZAP'] = $zap;
    echo json_encode($prospects);
}else{
    header("location:index.php");
}
