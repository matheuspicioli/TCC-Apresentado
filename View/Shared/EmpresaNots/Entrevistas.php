<?php
  session_start();
  require_once "../../../Model/ModelEntrevistas.class.php";
  require_once "../../../Model/ModelEmpresa.class.php";
  require_once "../../../Model/ModelAluno.class.php";
  require_once "../../../Model/ModelVaga.class.php";
  require_once "../../../Model/ModelMensagens.class.php";

  $Entrevista      = new ModelEntrevistas();
  $Empresa         = new ModelEmpresa();
  $Aluno           = new ModelAluno();
  $Vaga            = new ModelVaga();
  $Notificacao     = new Mensagens();
  $idUsuario       = $_SESSION['id'];
  $ConsultEmpresa  = mysqli_fetch_object($Empresa -> ReadEmpresa("where codUsuario = $idUsuario"));
  $idEmpresa       = $ConsultEmpresa->idEmpresa;
  if (mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"))){

      $ConsultaNum = mysqli_num_rows($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = 'S' "));
      // $ResultEntrevista = mysqli_fetch_object($Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa"));
      $ConsultaEntrevista            = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = 'S' ");
      $ConsultaEntrevistaFinalizada  = $Entrevista -> ReadEntrevista("where codEmpresa = $idEmpresa and ativo = '' ");
  }
  else{
    $ConsultaNum = 0;
  }
  $totalNotificacao = mysqli_num_rows($Notificacao -> ReadMensagens("where codUsuario = $idUsuario"));
  $totalVaga        = mysqli_num_rows($Vaga -> ReadVaga("where codEmpresa = $idEmpresa"));
 ?>




   <?php if ($ConsultaNum > 0){
  echo "<h1 class='center-align flow-text'>Suas entrevistas</h1>  <ul class='collection'> ";
     $Notificao = new Mensagens();
     while ($result = mysqli_fetch_object($ConsultaEntrevista)) {
       $idEntrevista = $result->idEntrevista;
       $idAluno      = $result -> codAluno;
       $ResultAluno      = mysqli_fetch_object($Aluno -> ReadAluno("where idAluno = $idAluno"));
       $ResultMensagem = mysqli_fetch_object($Notificao->ReadMensagens("where codEntrevista = $idEntrevista"));


       ?>

       <li class="avatar hoverable collection-item ">
         <div class="col s4 m1">
           <img src="Images/Upload/<?= $ResultAluno -> foto?>" alt="" class="circle" />
           <div class="secondary-content">
             <button data-target="<?= $idEntrevista?>" class="modal-trigger btn-flat btn-large waves-effect waves-light">
               <i class="material-icons blue-text">add</i>
             </button>
             <button data-target="<?= $ResultAluno -> rg?>" class=" modal-trigger btn-flat btn-large waves-effect waves-light recusar">
                <i class="material-icons red-text">delete</i>
             </button>
           </div>
         </div>
         <div class="col s8 m8 pull-m1">
           <span class="title">Candidato: <?= $ResultAluno -> nome ?> </span>
           <br>
           <span class="flow-text">
             <?php
             $data = date('d/m/Y', strtotime($result -> data));
             $hora = $result -> hora;
             ?>
             Entrevista Marcada para <?= $data ." as ".$hora?>
           </span>

         </div>
       </li><br>
       <div id="<?=$idEntrevista?>" class="modal modal-fixed-footer">
         <div class="modal-content">
           <h1 class="center-align flow-text">Entrevista Marcada</h1>

           <h4 class="flow-text"><?= $ResultAluno -> nome ?></h4>
           <a href="OnePage.php?link=Candidato<?= '&id='.$idAluno.'&cod='.$ResultAluno->codUsuario.'&anterior='.$_SERVER['QUERY_STRING'] ?>" > Ver perfil</a>
           <?php
           $data = date('d/m/Y', strtotime($ResultMensagem -> data));
           $hora = $ResultMensagem -> hora;
           ?>
           <button type="button" class="modal-action btn-flat disabled ">Enviado no dia: <?= $data. " as ". $hora ?></button>

           <p>
             <b>Dados sobre a vaga oferecida:</b><br>
             Vaga: <span class="flow-text"><?= $result-> vaga ?></span><br>
             Salário: <span class="flow-text"><?=$result-> salario ?></span><br>
             Carga horária semanal: <span class="flow-text"><?=$result-> cargaHoraria ?></span><br>
             descrição: <?=$result-> descricao ?><br>
             Benefícios: <?php
             include_once "../../../Model/ModelBeneficiosExperiencia.class.php";
             $Beneficio = new ModelBeneficiosExperiencia();
             $ConsultaB = $Beneficio -> ReadBeneficiosExperiencia("where codEntrevista = $idEntrevista");
             while($ResultB = mysqli_fetch_object($ConsultaB))
             {
               ?>
               <span class="chip"><?= $ResultB -> beneficio ?></span>
               <?php
             }
             ?>
           </p>
           <p>
             <b>Endereço da entrevista</b> <br>
             Local: <?= $result -> local?><br>
             Número: <?= $result -> numero?><br>
             Bairro: <?= $result -> bairro . " - " . $result->complemento?><br>
             Cidade: <?= $result -> cidade. " - ". $result->estado?><br>
           </p>
           <p>
             <b>Horário da Entrevista</b><br>
             <?php
             $dataE = date('d/m/Y', strtotime($result -> data));
             $horaE = $result -> hora;
             ?>
             Data: <?= $dataE ." as ". $horaE?>
           </p>
         </div>
         <div class="modal-footer">
           <button data-target="<?= $ResultAluno -> rg?>" data-identrevista="<?=$idEntrevista?>" class="modal-action modal-trigger modal-close waves-effect waves-red btn-flat " id="recusar">Cancelar Entrevista</button>
           <button data-target="<?= $ResultAluno -> cpf?>"  class="btn-flat btn waves-effect waves-yellow modal-trigger modal-close">
             Remarcar
           </button>
           <button type="button" name="button" class="btn-flat btn waves-effect waves-green modal-action modal-close" id="realizada" data-identrevista="<?=$idEntrevista?>" data-codusuarioaluno="<?= $ResultAluno -> codUsuario ?>" data-idempresa="<?= $result -> codEmpresa?>">Já foi realizada</button>



         </div>
       </div>
       <div class="modal modal-fixed-footer" id="<?= $ResultAluno -> rg ?>">
         <div class="modal-content">
           <div class="col s12 m12 flow-text">
             Enviar para:
             <div class="chip flow-text">
               <img src="images/Upload/<?= $ResultAluno -> foto?>" alt="Contact Person" width="50px" height="50px">
               <?= $ResultAluno -> nome?>
             </div>
           </div>
           <form action="Controller/CancelarEntrevistaEmpresa.php" method="post" id="CancelarEntrevistaEmpresa">
             <div class="input-field col s12 m12">
               <label for="motivo">Motivo:</label>
               <input type="text" name="motivo" id="motivo" required="true" length="40" maxlength="40">
             </div>
             <div class="input-field col s12 m12">
               <label for="mensagem">Mensagem:</label>
               <textarea name="mensagem" class="materialize-textarea" id="mensagem" rows="8" cols="40" required="true" length="255" maxlength="255"></textarea>
             </div>
         </div>
         <div class="modal-footer">
           <input type="hidden" name="idEmpresa" value="<?= $result -> codEmpresa ?>">
           <input type="hidden" name="codUsuarioAluno" value="<?= $ResultAluno -> codUsuario ?>">
           <input type="hidden" name="idEntrevista" value="<?= $idEntrevista ?>">
           <button class="btn btn-flat waves-effect waves-green modal-action modal-close" type="submit">Cancelar entrevista</button>
         </form>
         <button class="btn btn-flat waves-effect waves-red modal-close">Fechar</button>
         </div>
       </div>
       <div class="modal modal-fixed-footer" id="<?=$ResultAluno -> cpf ?>">
         <div class="modal-content">
           <div class="col s12 m12 flow-text">
             Enviar para:
             <div class="chip flow-text">
               <img src="images/Upload/<?= $ResultAluno -> foto?>" alt="Contact Person" width="50px" height="50px">
               <?= $ResultAluno -> nome?>
             </div>
           </div>
           <div class="col s12 m12">
             <form  action="Controller/RemarcarEntrevista.php" method="post" enctype="multipart/form-data">
               <div class="row">
                 <div class="input-field col s12 m12">
                   <label for="data">Nova data:</label><br>
                   <input type="date" name="data" id="data<?= $ResultAluno -> codUsuario ?>" placeholder="00/00/0000" required="true" >
                 </div>
                 <div class="input-field col s12 m12">
                   <label for="hora">Novo horário:</label><br>
                   <input type="time" name="hora" id="hora<?= $ResultAluno -> codUsuario ?>" placeholder="00:00" required="true">
                 </div>
               </div>
               <div class="row">
                 <div class="input-field col s12 m12">
                   <label for="motivo">Motivo da mudança:</label>
                   <input type="text" name="motivo" id="motivo<?= $ResultAluno -> codUsuario ?>" required="true" length="40" >
                 </div>
                 <div class="input-field col s12 m12">
                   <label for="mensagem">Mensagem:</label>
                   <textarea name="mensagem" id="mensagem<?= $ResultAluno -> codUsuario ?>" cols="30" rows="10" class="materialize-textarea" required="true" maxlength="255" length="255"></textarea>
                 </div>
               </div>
             </div>
           </div>
           <div class="modal-footer">
             <input type="hidden" name="idAluno" id="idAluno<?= $ResultAluno -> codUsuario ?>" value="<?= $ResultAluno -> idAluno ?>">
             <input type="hidden" name="idEntrevista" id="idEntrevista<?= $ResultAluno -> codUsuario ?>" value="<?= $idEntrevista?>">
             <input type="hidden" name="codUsuarioAluno" id="codUsuarioAluno<?= $ResultAluno -> codUsuario ?>" value="<?= $ResultAluno -> codUsuario ?>">
             <input type="hidden" name="nomeEmpresa" id="nomeEmpresa<?= $ResultAluno -> codUsuario ?>" value="<?= $ConsultEmpresa->nome ?>">
             <input type="hidden" name="empresa" id="empresa<?= $ResultAluno -> codUsuario ?>" value="empresa">
             <input type="submit" value="Remarca Entrevista" class="btn btn-flat waves-effect waves-yellow remarcar" data-codusuario="<?= $ResultAluno -> codUsuario ?>" data-idmodal="<?=$ResultAluno -> cpf ?>">

           </form>
           <button class="btn btn-flat waves-effect waves-red modal-close">Cancelar</button>
         </div>
       </div>
       <?php
     }

   }else{
     echo "<h1 class='center-align flow-text'>Você não tem entrevistas marcadas</h1>";
   } ?>


 </ul>
 <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <script type="text/javascript" src="js/HomeEmpresa.js"></script>
