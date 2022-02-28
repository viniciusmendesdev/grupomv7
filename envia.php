<?php


$nome   = $_POST['nome'];
$email  = $_POST['email'];
$celular = $_POST['celular'];
$mensagem   = $_POST['mensagem'];

if(empty($nome)){
    echo '<p>Digite seu nome</p>';
}elseif(empty($email)){
    echo '<p>Digite seu e-mail</p>';
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<p>Você digitou um e-mail inválido</p>";
}elseif(empty($celular)){
    echo '<p>Digite seu celular com DDD</p>';
}else{

require 'PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer;



$mail->isSMTP();


$mail->Host = "ddtizan.org";
$mail->Port = 587;
$mail->SMTPSecure   = "tls";
$mail->SMTPAuth     = "true";
$mail->Username     = "contato@ddtizan.org";
$mail->Password     = "ddtizan123@@";

$mail->setFrom($mail->Username, "Contato Via Site"); //Remetente
$mail->addAddress("grupomv7@gmail.com"); //destinatário
$mail->addBCC('somosmacro@gmail.com', 'Cópia Oculta');
$mail->Subject = "Contato via site ddtizan.org"; //Assunto

$conteudo = "

    <p>Você recebeu um contato pelo site:</p>
    
    <p>
    <b>Nome:</b> $nome <br>
    <b>E-mail:</b> $email <br>
    <b>Celular:</b> $celular</p>

    <p>$mensagem</p>

    <p></p>
    <p></p>
    <small>Enviado pelo website www.ddtizan.org | Criado por MacroDigital.com.br</small>
";

$mail->IsHTML(true);
$mail->Body = $conteudo;

if($mail->send()){
    echo "<p>Enviado com sucesso! você será direcionado para o nosso Whatsapp. Aguarde!</p>";
    $urlDestino = "http://ddtizan.org/obrigado.php";
    echo "<script language= \"JavaScript\">setTimeout(\"document.location = '".$urlDestino."' \",2000);</script>";

}else{
    echo "<p>Erro ao enviar e-mail" . $mail->ErrorInfo . "</p>";
}

}


?>