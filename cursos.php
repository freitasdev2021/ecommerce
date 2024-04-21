<?php
include"includes/header.html";
require"configs/class.php";
include"includes/modalLead.html";
if(isset($_GET['ID'])){
?>
<div class="p-5 contentCursos">
<?php
$cursos = Cursos::getCursos($_GET['ID'],"Cursos");
echo "<h1 align='center'>".$cursos['desc']['NMCategoria']."</h1>";
echo "<img src=".$cursos['desc']['FTCategoria']." class='ftCat'>";
echo "<hr>";
$descricao = json_decode($cursos['desc']['DSCategoria']);
if(isset($descricao->atuacao)){
    $ds = $descricao->atuacao; //array
}else{
    $ds = $descricao; //string
}
if(is_array($ds)){
    foreach($ds as $d){
?>
<!--GRID DE CURSOS -->
        <h2><?=$d->Area?></h2>
        <p><?=$d->Descricao?></p>
        <br>
        <p><?=(isset($d->Salario))? $d->Salario:''?></p>
        <br>
        <p><?=(isset($d->Vantagens))? $d->Vantagens:''?></p>
        
<!---->
<?php
    }
}else{// SE NÃO FOR UM ARRAY, AREAS SEM ARRAY
?>
    <?php
    if(!empty($ds->Descricao)){
    ?>
    <h2>Descrição</h2>
    <p><?=$ds->Descricao?></p>
    <?php
     }
     if(!empty($ds->Salario)){
    ?>
    <h2>Pretensão Salarial</h2>
    <p><?=$ds->Salario?></p>
    <?php
     }
     if(!empty($ds->Atuacao)){
    ?>
    <h2>Atuação</h2>
    <p><?=$ds->Atuacao?></p>
    <?php
     }
     if(!empty($ds->Vantagens)){
    ?>
    <h2>Vantagens</h2>
    <p>
        <?php
        if(is_array($ds->Vantagens)){
            foreach($ds->Vantagens as $v){
        ?>
        <p><?=$v?></p>
        <?php
            }
        }else{
        echo "<p>$ds->Vantagens</p>";
        }
    }
        ?>
    </p>
<?php
} 
?>
    <hr>
    <h2 align="center">Grade Curricular</h2>
    <div class="gridCursos">
    <?php
    foreach($cursos['cursos'] as $c){
    ?>
    <span class="moduloCurso">
        <a href="index.php?Matricula=<?=$c['NMCategoria']?>#matricula">
            <label style="cursor:pointer;"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;<?=$c['NMCurso']?></label>
        </a>
    </span>
<?php
    }
    ?>
    </div>
</div>
<div class="fter">
    <div class="footerDesconto">
        <a href="index.php?Matricula=<?=$cursos['desc']['NMCategoria']?>#matricula">Quero Desconto</a>
    </div>
</div>
<?php
}elseif(isset($_GET['pesquisa'])){
$pesquisa = Cursos::getCursos($_GET['pesquisa'],"Pesquisa");
//Encontrou $pesquisa->num_rows Resultados
if($pesquisa->num_rows > 1){
    $encontrou = " Encontrou $pesquisa->num_rows Resultados";
}elseif($pesquisa->num_rows == 0){
    $encontrou = " Não encontrou nenhum Resultado";
}elseif($pesquisa->num_rows == 1){
    $encontrou = " Encontrou 1 Resultado";
}
?>
<div class="contentCursos">
<?php echo "<h2 align='center'>Sua Pesquisa por '".$_GET['pesquisa']."' $encontrou</h2>";?>
<div class="gridCursos">

<?php
//print_r($pesquisa);
    foreach($pesquisa as $p){
?>
<!--GRID DE CURSOS-->
    <span class="moduloCurso">
        <a href="index.php?Matricula=<?=$p['NMCategoria']?>#matricula">
            <i class="fa fa-book" aria-hidden="true"></i>&nbsp;<?=$p['NMCurso']?>(<?=$p['NMCategoria']?>)
        </a>
    </span>
<!---->
<?php
    }
?>
</div>
</div>
<?php 
}else{
    echo "Página não encontrada";
}
include"includes/footer.html";
?>