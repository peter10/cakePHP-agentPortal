<?php
if ($language == 'en'):
?>
<h1 class="header home"><span>Welcome to Ingle International</span></h1>
<p>
change your password
</p>
<?php
else: // $language == 'fr'
?>
<h1 class="header home"><span>Bienvenue à Ingle International</span></h1>
<p>
Changer votre mot de passe
</p>
<?php
endif;

    $session->flash();
    echo $form->create('User', array('action' => 'change_password'));
    echo $form->input('password1', array('type'=>'password', 'label'=>__('Enter your new password', true)));
    echo $form->input('password2', array('type'=>'password', 'label'=>__('Enter your new password a second time', true)));
    echo $form->end(__('Change Password', true));
?>
