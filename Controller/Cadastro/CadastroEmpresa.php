<?php
    session_start();
    include_once("../Banco/funcoesBanco.php");
    include_once("../../Util.php");
    include_once("../VerificaSeEstaLogado.class.php");

    $DB = new DataBase();
    
    //$VerificaSeEstaLogado = new VerificaSeEstaLogado();
    //$VarSessions = $VerificaSeEstaLogado->EstaLogado();

    $dados = array(
        "nome"          => (isset($_POST["nome"]))      ? $_POST["nome"] : $msg,
        "cnpj"          => (isset($_POST["cnpj"]))      ? $_POST["cnpj"] : $msg,
        "email"         => (isset($_POST["email"]))     ? $_POST["email"] : $msg,
        "telefone"      => (isset($_POST["telefone"]))  ? $_POST["telefone"] : $msg,
        "endereco"      => (isset($_POST["endereco"]))  ? $_POST["endereco"] : $msg,
        "codUsuario"    => $_SESSION['id']
    );

    $resultado = $DB->InsertQuery("empresa", $dados);

    if($resultado){
        echo "<script>
                    window.location.href = '../../OnePage.html';
                    alert('".$Sucess."');
                </script>";
    }
    else{
        echo "<script>
                    window.location.href = '../../OnePage.html';
                    alert('".$Sucess."');
                </script>";
    }
?>