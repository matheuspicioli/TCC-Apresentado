<head>
    <meta charset="utf-8">
</head>
<?php
    require "PHPMailer/class.phpmailer.php";
    require "PHPMailer/class.smtp.php";
    class Email
    {
        /*
            Contrate um aluno - Classe de Email
            Conta no Gmail: contrateumaluno@gmail.com
            Senha no Gmail: contrate123

            Essa conta vai ser usada para o envio de email pelo site Contrate um Aluno

        */
        var $email;

        public function EnviarSenha($email, $senha,$nome)
        {
            $mail = new PHPMailer();
            $mail -> setLanguage('pt');

//            $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
//            $nome = "teste com construct";

            $from = "contrateumaluno@gmail.com";
            $fromName = "Contrate um Aluno";

            $host = 'smtp.gmail.com';
            $username = 'contrateumaluno@gmail.com';
            $password = 'contrate123';
            $port = 587;
            $secure = false;
            header('Content-Type: text/html; charset=UTF-8');

            $mail ->  isSMTP();
            $mail -> Host = $host;
            $mail -> SMTPAuth = true;
            $mail -> Username = $username;
            $mail -> Password = $password;
            $mail -> Port = $port;
            $mail -> SMTPSecure = $secure;

            $mail -> From = $from;
            $mail -> FromName = $fromName;
            $mail -> addReplyTo($from, $fromName);

            $mail -> addAddress($email,$nome);

            $mail -> isHTML(true);
            $mail -> CharSet = 'UTF-8';
            $mail -> WordWrap = 70;

            $mail -> Subject = 'Requisição de senha';
            $mail -> Body = "<h1>Contrate um Aluno</h1> <p> Esse email foi enviado pelo site Contrate um Aluno </p>
                <p>Sua senha é $senha</p><p>Seu email é $email</p><p>Seu nome é $nome</p>
            ";
            $mail -> AltBody = 'Teste';

            $send = $mail -> Send();
            if($send){
               echo "Enviado com Sucesso!";
            }
            else{
               echo "Erro". $mail -> ErrorInfo;
            }

        }

        public function EnviarBoasVindas($email)
        {
            $mail = new PHPMailer();
            $mail -> setLanguage('pt');

//            $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
//            $nome = "teste com construct";

            $from = "contrateumaluno@gmail.com";
            $fromName = "Contrate um Aluno";

            $host = 'smtp.gmail.com';
            $username = 'contrateumaluno@gmail.com';
            $password = 'contrate123';
            $port = 587;
            $secure = false;
            header('Content-Type: text/html; charset=UTF-8');
            $mail ->  isSMTP();
            $mail -> Host = $host;
            $mail -> SMTPAuth = true;
            $mail -> Username = $username;
            $mail -> Password = $password;
            $mail -> Port = $port;
            $mail -> SMTPSecure = $secure;

            $mail -> From = $from;
            $mail -> FromName = $fromName;
            $mail -> addReplyTo($from, $fromName);

            $mail -> addAddress($email,"Contrate um Aluno");

            $mail -> isHTML(true);
            $mail -> CharSet = 'UTF-8';
            $mail -> WordWrap = 70;

            $mail -> Subject = 'Bem-vindo ao Contrate um Aluno';
            $mail -> Body = "<h1>Contrate um Aluno</h1>
                            <p style='font-size:18px;'>Bem-vindo ao contrate um aluno, esse site tem por objetivo divulgar vagas a alunos e candidatos a empresas, esperamos que você goste do site e aproveite essa jornada em busca de seus objetivos</p>

                            <p>Esse e-mail foi enviando automaticamente pelo site <b>Contrate um Aluno</b>, não responda esse e-mail</p>
            ";
            $mail -> AltBody = 'Teste';

            $send = $mail -> Send();
            if($send){
               echo "Enviado com Sucesso!";
            }
            else{
               echo "Erro". $mail -> ErrorInfo;
            }

        }

        public function EnviarEmailEntrevista($email, $nome)
        {
          $mail = new PHPMailer();
          $mail -> setLanguage('pt');

//            $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
//            $nome = "teste com construct";

          $from = "contrateumaluno@gmail.com";
          $fromName = "Contrate um Aluno";

          $host = 'smtp.gmail.com';
          $username = 'contrateumaluno@gmail.com';
          $password = 'contrate123';
          $port = 587;
          $secure = false;
          header('Content-Type: text/html; charset=UTF-8');

          $mail ->  isSMTP();
          $mail -> Host = $host;
          $mail -> SMTPAuth = true;
          $mail -> Username = $username;
          $mail -> Password = $password;
          $mail -> Port = $port;
          $mail -> SMTPSecure = $secure;

          $mail -> From = $from;
          $mail -> FromName = $fromName;
          $mail -> addReplyTo($from, $fromName);

          $mail -> addAddress($email,$nome);

          $mail -> isHTML(true);
          $mail -> CharSet = 'UTF-8';
          $mail -> WordWrap = 70;

          $mail -> Subject = "Nova entrevista, empresa $nome";
          $mail -> Body = "<h1>Contrate um Aluno</h1> <p> A empresa $nome marcou uma entrevista com você, entre no Contrate um Aluno para ver mais detalhes sobre a entrevista. <br /> <a href='http://www.contrateumaluno.pe.hu'>Entrar</a></p>

          ";
          $mail -> AltBody = 'Teste';

          $send = $mail -> Send();
          if($send){
             echo "Enviado com Sucesso!";
          }
          else{
             echo "Erro". $mail -> ErrorInfo;
          }
        }
        public function EnviarEmailCandidatouse($email,$nome, $vaga)
        {
          $mail = new PHPMailer();
          $mail -> setLanguage('pt');

//            $email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
//            $nome = "teste com construct";

          $from = "contrateumaluno@gmail.com";
          $fromName = "Contrate um Aluno";

          $host = 'smtp.gmail.com';
          $username = 'contrateumaluno@gmail.com';
          $password = 'contrate123';
          $port = 587;
          $secure = false;
          header('Content-Type: text/html; charset=UTF-8');

          $mail ->  isSMTP();
          $mail -> Host = $host;
          $mail -> SMTPAuth = true;
          $mail -> Username = $username;
          $mail -> Password = $password;
          $mail -> Port = $port;
          $mail -> SMTPSecure = $secure;

          $mail -> From = $from;
          $mail -> FromName = $fromName;
          $mail -> addReplyTo($from, $fromName);

          $mail -> addAddress($email,$nome);

          $mail -> isHTML(true);
          $mail -> CharSet = 'UTF-8';
          $mail -> WordWrap = 70;

          $mail -> Subject = "Candidatura a vaga $vaga";
          $mail -> Body = "<h1>Contrate um Aluno</h1> <p> O Candidato $nome, se candidatou a sua vaga $vaga, para mais detalhes entre no Contrate um Aluno</p>
          <a href='http://www.contrateumaluno.pe.hu'>Entrar</a>
          ";
          $mail -> AltBody = 'Teste';

          $send = $mail -> Send();
          if($send){
             echo "Enviado com Sucesso!";
          }
          else{
             echo "Erro". $mail -> ErrorInfo;
          }

        }
    }


?>
