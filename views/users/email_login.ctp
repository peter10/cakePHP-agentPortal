<?php
if ($language == 'en')
	echo '<h1 class="header home"><span>Welcome to Ingle International</span></h1>';
else // $lang == 'fr
	echo '<h1 class="header home"><span>Bienvenue à Ingle International</span></h1>';
if (!$email_sent){
	if ($language == 'en')
		echo "<p>Enter your username and press 'Submit'. An email will be sent to the email address on file, please follow the instructions to reset your password.</p>";
	else // $lang == 'fr'
		echo "<p>Entrez votre nom d’utilisateur et cliquez sur 'Soumettre'. Un courriel vous sera envoyé à l’adresse dans nos dossiers; veuillez suivre les instructions contenues dans ce courriel pour réinitialiser votre mot de passe.</p>";
		
    if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('User', array('action' => 'email_login'));
    echo $form->input('username');
    echo $form->end(__('Submit', true));
}
else { // email has been sent
if ($language == 'en')
	echo '<p>An email has been sent to the email address on file for you. Please follow the instructions in that email to reset your password.</p>';
else // $lang == 'fr'
	echo '<p>Un courriel vous a été envoyé à l’adresse dans nos dossiers. Veuillez suivre les instructions contenues dans ce courriel pour réinitialiser votre mot de passe.</p>';
} //endif