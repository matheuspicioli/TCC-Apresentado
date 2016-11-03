<?php
  include "Model/DataBase.class.php";
   $DB                    = new DataBase();

   $ConsultaAluno         = $DB->SearchQuery("aluno","where idAluno = $idAluno");
   $ResultAluno           = mysqli_fetch_assoc($ConsultaAluno);
   $codUsuario  = $ResultAluno['codUsuario'];
   //var_dump($codUsuario);
   $ConsultaEndereco      = $DB->SearchQuery("enderecos e
                                              inner join aluno a",
                                              "on e.codUsuario = $codUsuario
                                              and a.codUsuario = $codUsuario");
   $ResultEndereco        = mysqli_fetch_assoc($ConsultaEndereco);

   $ConsultaTelefone      = $DB->SearchQuery("telefones","where codUsuario = $idUsuario");

   $ConsultaExperiencia   = $DB->SearchQuery("experiencias","where codAluno = $idAluno");

   $ConsultaFormacoes     = $DB->SearchQuery("formacoes","where codAluno = $idAluno");

   $ConsultaQualificacoes = $DB->SearchQuery("qualificacoes", "where codAluno = $idAluno");
   /*$idAluno               = $_GET['id'];
   $idUsuario             = $_SESSION['id'];
   include_once "Model/ModelTelefones.class.php";
   $Telefone = new Telefones();
   $ConsultaTelefone = $Telefone -> ReadTelefones("where codUsuario = $idAluno");*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $ResultAluno['nome'] ?>" readonly>
                    </div>
                    <div class="input-field col s12 m6 push-m2">
                        <img src="Images/Upload/<?= $ResultAluno['foto']?>" alt="Foto Perfil" class="responsive-img circle" width="200px" height="200px">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m4">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="text" name="dataNascimento" id="dataNascimento" value="<?= $ResultAluno['dataNascimento'] ?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?= $ResultAluno['cpf']?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="rg">Rg:</label>
                        <input type="text" name="rg" id="rg" value="<?= $ResultAluno['rg']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <?php
                        while($ResultTelefone = mysqli_fetch_assoc($ConsultaTelefone))
                        {
                    ?>
                        <div class="input-field col s12 m4">
                            <label for="<?=$ResultTelefone['idTelefone']?>">Telefone:</label>
                            <input type="text" name="<?=$ResultTelefone['idTelefone']?>" id="<?=$ResultTelefone['idTelefone']?>" value="<?=$ResultTelefone['telefone']?>" readonly>
                        </div>

                    <?php
                        }
                    ?>
                </div>
                <div class="row">
                  <div class="input-field col s12 m2">
                      <label for="cep">CEP:</label>
                      <input type="text" name="cep" id="cep" value="<?= $ResultEndereco['cep'] ?>">
                  </div>
                   <div class="input-field col s12 m4">
                       <label for="rua">Rua:</label>
                       <input type="text" name="rua" id="rua" value="<?= $ResultEndereco['rua'] ?>" readonly>
                   </div>
                   <div class="input-field col s12 m1">
                       <label for="numero">Número:</label>
                       <input type="text" name="numero" id="numero" value="<?= $ResultEndereco['numero']?>" readonly>
                   </div>
                   <div class="input-field col s12 m4">
                       <label for="bairro">Bairro:</label>
                       <input type="text" name="bairro" id="bairro" value="<?= $ResultEndereco['bairro']?>" readonly>
                   </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m5">
                        <label for="complemento">Complemento:</label>
                        <input type="text" name="complemento" id="complemento" value="<?= $ResultEndereco['complemento']?>" readonly>
                    </div>
                    <div class="input-field col s12 m4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" value="<?= $ResultEndereco['cidade']?>" readonly>
                    </div>
                    <div class="input-field col s12 m3">
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" id="estado" value="<?= $ResultEndereco['estado']?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <p class="center-align flow-text">Habilidades</p>
                    <?php while($Qualificacao = mysqli_fetch_assoc($ConsultaQualificacoes)){ ?>
                    <span class="chip blue white-text"><?= $Qualificacao['competencia']?></span>
                    <?php } ?>
                </div>
                <div class="row">
                   <p class="center-align flow-text">Formações</p>
                    <?php
                        while($ResultFormacoes = mysqli_fetch_assoc($ConsultaFormacoes))
                        {

                        ?>
                            <div class="card col s12 m6">
                                <span class="card-title"><?=  $ResultFormacoes['curso'] ?></span>
                                <div class="card-content">
                                    <?= $ResultFormacoes['anoConclusao']. " - ". $ResultFormacoes['instituicao'] ?>
                                </div>

                            </div>

                        <?php
                        }

                    ?>
                </div>
                <div class="row">
                              <p class="center-align flow-text">Experiências</p>

                    <?php
                        while($ResultExperiencia = mysqli_fetch_assoc($ConsultaExperiencia)){
                    ?>
                        <div class="card col s12 m6 hoverable">
                            <span class="card-title">  <?= $ResultExperiencia['cargo']  ?></span>
                            <div class="card-content">
                               <p>
                                 Data de Inicio: <?= $ResultExperiencia['dataInicio']?>
                               </p>
                               <p>
                                 Data de Saída: <?= $ResultExperiencia['dataSaida']  ?> -
                               </p>
                                <p>
                                  Descrição: <?= $ResultExperiencia['descricao']  ?>
                                </p>
                            </div>

                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="row">
                    <a href="" class="btn btn-large blue">Marcar Entrevista</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
