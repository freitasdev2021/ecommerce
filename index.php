<?php
include"includes/header.html";
require"configs/class.php";
include"includes/modalLead.html";
include"includes/modalPdp.html";
if(isset($_GET['Matricula'])){
  $matricula = $_GET['Matricula'];
}else{
  $matricula = "";
}
?>
<div class="banner container-fluid main">
  <div class="brandBanner">
    <br>
    <h1 class="text-white">
        Tenha um futuro promissor<br>
        no mercado de trabalho.<br>
        Venha para a Microlins!
    </h1>
    <p class="text-white">
        Não perca mais tempo e invista em seu futuro!<br> Comece agora mesmo a aprimorar suas competências e conquiste novas possibilidades de carreira.<br> <strong>Venha para a Microlins e transforme sua vida! Matricule-se já!</strong>
    </p>
  </div>
</div>
<br>
<!--AREAS DE ATUAÇÃO-->
<h1 align="center">Áreas de Atuação</h1>
<div id="cursos">
  <?php
    $categorias = Cursos::getCategorias();
    foreach($categorias as $cat){
  ?>
    <div class="categoria">
        <strong class="hoverCat">
          <?=$cat['NMCategoria']?>
        </strong>
        <span id="imgCat">
            <img src="<?=$cat['FTCategoria']?>">
        </span>
        <!-- <br> -->
        <span id="btnMat">
          <a href="cursos.php?ID=<?=$cat['IDCategoria']?>">VER MÓDULOS</a>
        </span>
    </div>
    <?php
    }
    ?>
</div>
<br>
<!--PDP-->
<div class="pdp">
  <h1>Você sabe qual é a melhor
    <br>
    carreira para você?</h1>
    <h2>
    Após esse caminho você saberá
    o que precisa desenvolver para conseguir
    o seu primeiro emprego.
    </h2>
    <img src="files/pdp1.png" id="pdp1">
    <img src="files/pdp2.png" id="pdp2">
    <div id="beneficios" ></div>
    <img src="files/pdp3.png" id="pdp3">
    <button class="btPdp">QUERO PARTICIPAR DO PDP</button>
</div>
<!---BENEFICIOS-->
<br>
<h1 align="center">Benefícios de ser Aluno <strong style="color:rgb(0,57,121)">Microlins</strong></h1>
<br>
<div class="beneficios">
    <div class="ben">
      <span>
      <img src="files/professor.png">
      </span>
        <strong>Professores qualificados</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/poscurso.png">
      </span>
        <strong>Assistência Pós-Curso</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/aprendizagem.png">
      </span>
        <strong>Garantia de Aprendizagem</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/certificado.png">
      </span>
        <strong>Certificação Reconhecida em todo território nacional</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/ensino.png">
      </span>
        <strong>Método de Ensino Individualizado</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/livro.png">
      </span>
        <strong>Material Didático Próprio</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/relogio.png">
      </span>
        <strong>Flexibilidade de dias e horários</strong>
    </div>
    <div class="ben">
      <span>
      <img src="files/pedagogico.png">
      </span>
        <strong>Acompanhamento pedagógico</strong>
    </div>
</div>
<!-- <hr> -->
<br>
<div class="matriculese" id="matricula">
  <div class="matricula">
    <h1 align="center">Faça Já sua Matricula!</h1>
    <!--NOME-->
      <div class="col-sm-12 input">
          <label>Nome completo:</label>
          <input type="name" name="nome" class="form-control" minlength="5" maxlength="100">
          <label class="error-input">Preenchimento incorreto</label>
      </div>
      <!--NASCIMENTO-->
      <input type="hidden" name="Origem" value="SITE">
      <div class="col-sm-12 input">
          <label>Data de nascimento:</label>
          <input type="text" name="nascimento" class="form-control" minlength="10">
          <label class="error-input">Preenchimento incorreto</label>
      </div>
      <!--CIDADE-->
      <div class="col-sm-12 input">
          <label>Cidade:</label>
          <input type="name" name="cidade" class="form-control" minlength="2" maxlenght="100">
          <label class="error-input">Preenchimento incorreto</label>
      </div>
      <!--CURSO DE INTERESSE-->
      <div class="col-sm-12 select">
          <label>Curso de interesse:</label>
          <select name="area" class="form-control">
              <option value="">Selecione</option>
              <?php
              $cursos = Cursos::getCursos("","");
              foreach($cursos as $curso){
                if($matricula == $curso['NMCategoria']){
                  echo "<option value=".$curso['NMCategoria']." selected>".$curso['NMCategoria']."</option>";
                }else{
                  echo "<option value=".$curso['NMCategoria'].">".$curso['NMCategoria']."</option>";
                }
              }
              ?>
          </select>
          <label class="error-input">Preenchimento incorreto</label>
      </div>
      <!--EMAIL-->
      <div class="col-sm-12 input">
          <label>Email:</label>
          <input type="email" name="email" class="form-control" minlength="5" maxlength="100">
          <label class="error-input">Preenchimento incorreto</label>
      </div>
      <!--TELEFONE-->
      <div class="col-sm-12 input">
          <label>Telefone:</label>
          <input type="text" name="telefone" class="form-control" minlength="14" maxlength="18">
          <label class="error-input">Preenchimento incorreto</label>
      </div>
      <!--BOTÃO-->
      <br>
      <div class="col-sm-12">
          <button class="btn btn-primary bt_enviar">Receba seu Desconto</button>
      </div>
  </div>
</div>
<br>
<!-- <hr> -->
<h1 align="center">Onde estamos localizados?</h1>
<div id="contato">
  <br>
  <div class="loc">
    <span id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15045.92815596744!2d-42.525666!3d-19.4778863!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xb000410c449ed5%3A0xc371adca4606d19f!2sMicrolins!5e0!3m2!1spt-BR!2sbr!4v1684633888523!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </span>
    <span id="ctt">
      <label class="labelRow">
        <strong>Endereço:&nbsp;</strong>
        Avenida Vinte e Oito de Abril, 240 - Centro, Ipatinga - MG, 35160-004
      </label>
      <label class="labelRow">
        <strong>Setor Comercial: </strong>&nbsp;<i class="fa fa-whatsapp"></i>&nbsp;
        <a href="https://api.whatsapp.com/send/?phone=31991303397" target="_blank">(31) 9 9130-3397</a>&nbsp;
      </label>
      <label class="labelRow">
      <strong>Setor Financeiro: </strong>&nbsp;<i class="fa fa-whatsapp"></i>&nbsp;
        <a href="https://api.whatsapp.com/send/?phone=31985111696" target="_blank">(31) 9 8511-1696</a>
      </label>
      <label class="labelRow">
        <strong>Telefone:</strong>
        (31) 3617-7711
      </label>
      <label class="labelRow">
        <strong>Remarcação de Aulas e Reposições:</strong>
        &nbsp;<i class="fa fa-whatsapp"></i>&nbsp; <a href="https://api.whatsapp.com/send/?phone=31992328859" target="_blank">(31) 9 9232-8859</a>
      </label>
      <label class="labelRow">
        <strong>Email:</strong>&nbsp;
        <a href="mailto:escolamicrolinsipatinga@gmail.com" target="_blank">
          escolamicrolinsipatinga@gmail.com
        </a>
      </label>
      <label>
        <strong>Horários de Funcionamento:</strong>
        <ul>
          <li>Segunda e Quarta de 8:00 as 21:00</li>
          <li>Terça,Quinta e Sexta de 8:00 as 18:30 </li>
          <li>Sabado de 8:00 as 14:00</li>
        </ul>
      </label>
    </span>
  </div>
</div>
<!---------------->
<?php
include"includes/footer.html";
?>
