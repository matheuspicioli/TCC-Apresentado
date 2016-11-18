<?php
  require_once "../Model/ModelAluno.class.php";
  require_once "../Model/ModelCandidatouse.class.php";
  require_once "../Model/ModelNotificacoesCandidatouse.class.php";
  require_once "../Model/ModelVaga.class.php";


  $codUsuarioEmpresa  = isset($_POST['idUsuario'])?$_POST['idUsuario']:null;
  $idEmpresa          = isset($_POST['idEmpresa'])?$_POST['idEmpresa']:null;
  $codUsuarioAluno    = isset($_POST['codUsuarioAluno'])?$_POST['codUsuarioAluno']:null;
  $idVaga             = isset($_POST['idVaga'])?$_POST['idVaga']:null;

  $vaga             = new ModelVaga();
  $Aluno            = new ModelAluno();
  $Candidato        = new Candidatouse();
  $notfCandidatouse = new ModelNotificacoesCandidatouse();


  $ResultAluno = mysqli_fetch_object($Aluno -> ReadAluno("where codUsuario = $codUsuarioAluno"));
  $idAluno     = $ResultAluno -> idAluno;

  $nome        = $ResultAluno -> nome;
  $foto        = $ResultAluno -> foto;

  $data        = array(
                    "nome"            => $nome,
                    "foto"            => $foto,
                    "ativo"           => 'S',
                    "codAluno"        => $idAluno,
                    "codVaga"         => $idVaga,
                    "codEmpresa"      => $idEmpresa
               );

  if ($Candidato -> CreateCandidatouse($data)) {
      $candidatouse     = mysqli_fetch_object($Candidato->ReadCandidatouse("order by idCandidatouse desc limit 1"));
      $idcandidatouse   = $candidatouse->idCandidatouse;
      $resultObjectVaga = mysqli_fetch_object($vaga->ReadVaga("where idVaga = $idVaga"));
      $dataAtual = date("Y-m-d");
      $horaAtual = date("H:i:s");

      $data22 = array(
        "titulo"          => "Nova candidatura",
        "de"              => $nome,
        "data"            => $dataAtual,
        "hora"            => $horaAtual,
        "mensagem"        => "O aluno $nome candidatou-se à vaga $resultObjectVaga->titulo.",
        "codCandidatouse" => $idcandidatouse,
        "codUsuario"      => $codUsuarioEmpresa
      );
      if($notfCandidatouse->CreateNotificacoesCandidatouse($data22))
        echo "criou notificacao";
      else
        echo "não criou notificacao";
  }
  else{
    echo "erro ao criar candidatura";
  }

 ?>
