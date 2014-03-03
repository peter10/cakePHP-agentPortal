<?php

class UsersController extends AppController {

    var $name = 'Users';

    function beforeFilter() {
        Security::setHash('md5');
        parent::beforeFilter();
        $this->Auth->deny('change_password');
    }

    function index() {
        
    }

    function login($reset_key = null, $lang = 'en') {

        // if reset_key is set the user is trying to log in by email link
        if ($reset_key) {
            $user = $this->User->find('first', array('conditions' => array('User.reset_key' => $reset_key)));
            // don't proceed if the user is not found or the time difference is too great
            if (!$user)
                return;
            $time_difference = (time() - strtotime($user['User']['reset_time'])) / (60 * 60);
            if ($time_difference > 3)
                return;
            // now we can log in the user and unset the backdoor key
            $this->User->unset_key($user);
            $this->Auth->login($user);
            $this->redirect(array('action' => 'change_password'));
        }
    }

    function change_password() {
        if (!empty($this->data)) {
            $ps1 = $this->data['User']['password1'];
            $ps2 = $this->data['User']['password2'];
            if ($ps1 != $ps2 || $ps1 == '') {
                $this->Session->setFlash(__("Your passwords must match", true));
            } else { // we can reset the password
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('password', $this->Auth->password($ps1));
                $this->Session->setFlash(__("Your password has been reset", true));
            }
        }
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }

    // allow users to log in by following an emailed link
    function email_login() {

        $login_key = false;

        if (isset($this->data['User']['username'])) {
            // returns false if username is not valid, otherwise returns key to insert in reset link
            $login_key = $this->User->login_key($this->data['User']['username']);
            $email_address = $this->User->get_email_address_from_username($this->data['User']['username']);
        }
        if ($login_key) {
            $this->_sendEmail($login_key, $this->User->get_email_address_from_username($this->data['User']['username']));
            // pass a 'success' variable to the view
            $this->set('email_sent', true);
        }
    }

    function _sendEmail($login_key = null, $email_address) {
        $this->Email->reset();
        $this->Email->to = $email_address;
        $this->Email->bcc = array('<pduke@peakcontact.com>');
        $this->Email->from = 'Ingle International <helpline@ingleinternational.com>';
        $this->Email->subject = __('Forgotten Password', true);
        $this->Email->sendAs = 'html';
        // attachments

        /* SMTP Options */
        $this->Email->smtpOptions = array(
            'port' => '25',
            'timeout' => '30',
            'host' => '172.24.8.11',
        );
        $this->Email->delivery = 'mail';
        $this->Email->template = 'password_reset';
        //$reset_link = "http://agent.ingleinsurance.ca/login/" . $login_key;
        $reset_link = "https://www.ingleagents.com/login/" . $login_key;
        if ($this->lang == 'en') {
            $this->Email->template = 'password_reset';
            $body_text = "Did you forget your password to the Ingle Insurance Agent site? If so please follow this link and reset your password: <a href='" . $reset_link . "'>" . $reset_link . "</a>";
        } else {// ($this->lang == 'fr'
            $this->Email->template = 'password_reset_fr';
            $body_text = "Vous avez r�cemment demand� que votre mot de passe soit r�initialis� pour le site web d�agents d�Ingle International. Veuillez suivre ce lien pour le r�initialiser : <a href='" . $reset_link . "'>" . $reset_link . "</a>";
        }
        $this->set('reset_link', $reset_link);
        /* Do not pass any args to send() */
        $this->Email->send();

        /* Check for SMTP errors. */
        $this->set('smtpErrors', $this->Email->smtpError);
    }

}
