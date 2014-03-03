<?php

class CustomGroupRequestsController extends AppController {

    var $components = array('Formatting');
    var $helpers = array('Geography');

    function add() {

        if (!empty($this->data)) {
            $this->data['CustomGroupRequest']['agent'] = $this->Auth->user('username');
            $this->data['CustomGroupRequest']['site'] = $this->Site->siteName();
            $this->data['CustomGroupRequest']['ip'] = $_SERVER['REMOTE_ADDR'];
            $this->data['CustomGroupRequest']['host_name'] = $_SERVER['SERVER_NAME'];
            $this->data['CustomGroupRequest']['time'] = date('l jS \of F Y h:i:s A');
            $request = $this->CustomGroupRequest->save($this->data);
            if ($request) {
                $this->_sendEmail();
                $this->redirect('/thanks', null, true);
            }
        }
    }

    function _sendEmail() {
        //$this->Email->to = 'pduke@peakcontact.com';
        $this->Email->to = 'relay@ingleinsurance.com';
        $this->Email->from = 'webform@' . $_SERVER['SERVER_NAME'];
        $this->Email->subject = 'Health Insurance Request - ' . $this->Site->siteName();
        $this->Email->sendAs = 'html';
        //$body = print_r($this->data, true);
        $body = $this->Formatting->emailData($this->data);
        $this->Email->send($body);
    }

}