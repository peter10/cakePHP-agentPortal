<?php

class User extends AppModel {

    var $name = 'User';

    /* functionality for forgotten passwords
     *   
     */

    function login_key($username) {

        $user = $this->find('first', array('conditions' => array('User.username' => $username)));

        if (!$user)
            return false;

        //create and save a random reset key with time stamp
        $reset_key = md5(time() . 'afdsae93');
        $this->id = $user['User']['id'];
        $this->saveField('reset_time', date('Y-m-d H:i:s'));
        $this->saveField('reset_key', $reset_key);

        return $reset_key;
    }

    function get_email_address_from_username($username) {
        $email = $this->find('first', array(
            'conditions' => array('User.username' => $username),
            'fields' => 'email'
        ));
        return $email['User']['email'];
    }

    function unset_key($user) {
        // neutralizes the backdoor email login
        $this->id = $user['User']['id'];
        $this->saveField('reset_key', '');
    }

}
