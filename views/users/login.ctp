<?php
if ($language == 'en'):
?>
<h1 class="header home"><span>Welcome to Ingle International</span></h1>
<p>
Fill in your username and password to log into the site. <?php echo $html->link('Click here', array('controller'=>'users', 'action'=>'email_login')); ?> if you've forgotten your password.
</p>
<?php
else: // $language == 'fr'
?>
<h1 class="header home"><span>Bienvenue à Ingle International</span></h1>
<p>
Entrez votre nom d’utilisateur et votre mot de passe pour accéder au site. <?php echo $html->link('Cliquez ici', array('controller'=>'users', 'action'=>'email_login')); ?> si vous avez oublié votre mot de passe.
</p>
<?php
endif;

    if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array('tabindex' => 1));
    echo $form->input('password', array('tabindex' => 2));
    echo $form->end(array('label' => __('Login', true), 'tabindex' => 3));
?>
