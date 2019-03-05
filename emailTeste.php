<?php 

	include 'mailer/phpmailer_autoload/PHPMailerAutoload.php';
	

	if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		/*$nome = $_POST['nome'];
		$email = $_POST['email'];
		$msg = $_POST['msg'];

		$para = "lucianoromualdo94@gmail.com";
		$assunto = "Dúvida relacionada ao plano semestral";
		$corpo = "Nome: ".$nome." - email: ".$email." -Mensagem: ".$msg;
		$cabecalho = "From "*/

		$email = $_POST['email'];
		$nome = $_POST['nome'];
		$msg = $_POST['msg'];

		//Instância da classe PHPMailer
		$mail = new PHPMailer(true);

		try {

		/*Configuração dos dados de envio */

		//Informamos o protocolo SMTP , recomendado pelo servidor(GMAIL)
		$mail->isSMTP();
		//Informamos o endereço do servidor de email que queremos utiliza-la
		$mail->Host = 'smtp.gmail.com';
		//Habilitamos a autênticação SMTP
		$mail->SMTPAuth = true;
		//Definimos a critografia a ser utilizada conforme o nome do servidor de email(GMAIL)
		$mail->SMTPSecure = 'tls';
		//Para autenticar via SSL precisamos informar a porta ,conforme recomendado pelo servidor utilizado
		$mail->Port = 587;
		//Linhas  38 e 39 informamos os dados de uma conta de email ativa para concluir o envio 
		$mail->Username="luciano@gmail.com";
		$mail->Password="xxxxxxxx";
		

		//Lista de remetentes e destinatários
		$mail->setFrom($email); // Email do remetente , quem está enviando
		$mail->addReplyTo($email); // Email de que receberá as respostas
		$mail->addAddress('luciano@gmail.com', 'EuMesmo'); 
		//$mail->addAddress('email@email.com.br', 'Contato'’);
		//$mail->addCC('luciano@gmail.com', 'Cópia');
		//$mail->addBCC('luciano@gmail.com', 'Cópia Oculta');

		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = 'Dúvida sobre o plano';
		$mail->Body    = "<b>Nome</b>: ".$nome."\r\n"."<b>email</b>: ".$email."\r\n"."<b>Mensagem</b>: ".$msg;
		$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
		//$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

		if(!$mail->send()) {
	    echo 'Não foi possível enviar a mensagem.<br>';
	    echo 'Erro: ' . $mail->ErrorInfo;
		} else {
		    echo 'Mensagem enviada.';
		    exit;
		}
			
		} catch (phpmailerException $e) {
			 echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
 		 echo $e->getMessage(); //Boring error messages from anything else!
}
		
	}


 ?>

 <form method="POST">  
 	Nome:<br>
 	<input type="text" name="nome"><br>
 	Email:<br>
 	<input type="text" name="email"><br>
 	Mensagem:<br>
 	<textarea name="msg"></textarea><br>
 	<input type="submit" name="Enviar">

 </form>