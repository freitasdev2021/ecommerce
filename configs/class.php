<?php
session_start();
require"bd.php";
require_once"SimpleXLSXGen.php";
class Cursos{
    public static function setProspect($dados){
        $nascimento = implode('-', array_reverse(explode('/', trim($dados['nascimento']))));
        if(empty($dados['cidade'])){
            $SQL = "INSERT INTO prospects (nome,email,telefone,Origem) VALUES('".$dados['nome']."','".$dados['email']."','".$dados['telefone']."','".$dados['Origem']."')";
        }else{
            $SQL = "INSERT INTO prospects (nome,nascimento,cidade,curso,email,telefone,Origem) VALUES('".$dados['nome']."','".$nascimento."','".$dados['cidade']."','".$dados['curso']."','".$dados['email']."','".$dados['telefone']."','".$dados['Origem']."')";
        }
        $verificaEmail = mysqli_fetch_row(mysqli_query(Microlins::DB(),"SELECT ID FROM prospects WHERE email = '".$dados['email']."' "));
        $verificaTelefone = mysqli_fetch_row(mysqli_query(Microlins::DB(),"SELECT ID FROM prospects WHERE telefone = '".$dados['telefone']."' "));
        if($verificaTelefone || $verificaEmail ){
            if($verificaTelefone){
                $retorno['erro_telefone'] = "Numero ja cadastrado";
            }
            if($verificaEmail){
                $retorno['erro_email'] = "Email já cadastrado";
            }
            $retorno['mensagem'] = "Houve um erro de preenchimento";
        }else{
            if(mysqli_query(Microlins::DB(),$SQL)){
                $retorno['mensagem'] = "Dados enviados com sucesso! aguarde o contato";
            }else{
                $retorno['mensagem'] = "Houve um erro, contate a equipe";
            }
        }

        return json_encode($retorno);
    }

    public static function getCategorias(){
        $SQL = "SELECT IDCategoria,NMCategoria,FTCategoria FROM categorias";
        return mysqli_query(Microlins::DB(),$SQL);
    }

    public static function getCursos($dado,$rota){
        if($rota == "Pesquisa"){
            $SQL = mysqli_query(Microlins::DB(),"SELECT NMCurso,IDCurso,NMCategoria FROM cursos INNER JOIN categorias USING(IDCategoria) WHERE NMCategoria LIKE '%".$dado."%' OR NMCurso LIKE '%".$dado."%' ");
        }elseif($rota == "Cursos"){ 
            $SQL['cursos'] = mysqli_query(Microlins::DB(),"SELECT NMCurso,IDCurso,NMCategoria FROM cursos INNER JOIN categorias USING(IDCategoria) WHERE IDCategoria = $dado ORDER BY NMCurso ASC ");
            $SQL['desc'] = mysqli_fetch_assoc(mysqli_query(Microlins::DB(),"SELECT DSCategoria,NMCategoria,FTCategoria FROM categorias WHERE IDCategoria = $dado "));
        }else{
            $SQL = mysqli_query(Microlins::DB(),"SELECT NMCategoria FROM categorias");
        }
        return $SQL;
    }

    public static function getLeads($table){
        $leads = json_decode(file_get_contents("https://microlinsteste.shop/app.php?key=MQY1159"));
        if($table == "Site"){
            ob_start();
            foreach($leads->SITE as $site){
            ?>
            <tr>
                <td data-content="Nome"><?=$site->nome?></th>
                <td data-content="Nascimento"><?=($site->nascimento != NULL)?date('d/m/Y',strtotime($site->nascimento)) : '-'?></td>
                <td data-content="Cidade"><?=($site->cidade)?$site->cidade:'-'?></td>
                <td data-content="Curso"><?=($site->curso)?$site->curso : '-'?></td>
                <td data-content="Email"><?=$site->email?></td>
                <td data-content="Telefone"><?=$site->telefone?></td>
                <td data-content="Data"><?=date('d/m/Y', strtotime($site->data))?></td>
            </tr>
            <?php
            }
            $retorno = ob_get_clean();
        }elseif($table == "PIQ"){
            ob_start();
            foreach($leads->PIQ as $piq){
            ?>
            <tr>
                <td data-content="Nome"><?=$piq->nome?></th>
                <td data-content="Nascimento"><?=date('d/m/Y', strtotime($piq->nascimento))?></td>
                <td data-content="Cidade"><?=$piq->cidade?></td>
                <td data-content="Curso"><?=$piq->curso?></td>
                <td data-content="Email"><?=$piq->email?></td>
                <td data-content="Telefone"><?=$piq->telefone?></td>
                <td data-content="Data"><?=date('d/m/Y', strtotime($piq->data))?></td>
            </tr>
            <?php
            }
            $retorno = ob_get_clean();
        }elseif($table == "WhatsApp"){
            ob_start();
            foreach($leads->ZAP as $zap){
            ?>
            <tr>
                <td data-content="Nome"><?=$zap->nome?></th>
                <td data-content="Email"><?=$zap->email?></td>
                <td data-content="Telefone"><?=$zap->telefone?></td>
                <td data-content="Data"><?=date('d/m/Y', strtotime($zap->data))?></td>
            </tr>
            <?php
            }
            $retorno = ob_get_clean();
        }
        return $retorno;
    }

    public static function delLeads($table){
        if($table == "WhatsApp"){
            return mysqli_query(Microlins::DB(),"DELETE FROM prospects WHERE nascimento IS NULL AND curso IS NULL AND cidade IS NULL ");
        }else{
            return mysqli_query(Microlins::DB(),"DELETE FROM prospects WHERE Origem = '$table' ");
        }
    }

    public static function getProspect(){
        $SQL = "SELECT * FROM prospects";
        return mysqli_query(Microlins::DB(),$SQL);
    }

    public static function limparLeads(){
        $SQL = "DELETE FROM prospects";
        return mysqli_query(Microlins::DB(),$SQL);
    }

}
