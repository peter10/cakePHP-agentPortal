<?php

/*
 * for authenticated file browsing
 */
class AgentCommissionsController extends AppController {

// 
    var $uses = array();
    //var $directory = '/home/cookie/public_html/app/agentCommissions/';
    var $directory = "c:/wamp/www/app/agentCommissions/";

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->user_name != '')
            $this->directory .= $this->user_name . '/';
        else
            $this->flash('invalid user', '/logout');
        if (!file_exists($this->directory))
            $this->flash('invalid user', '/logout');
    }

    function index() {
        // browse the users' protected folder
        $this->set('files', $this->_dirList($this->directory));
    }

    function download($file) {
        $this->view = 'Media';

        // split up filename
        $file_info = explode('.', $file);
        $file_extension = array_pop($file_info);
        $file_name = implode('.', $file_info);
        $params = array(
            'id' => $file,
            'download' => true,
            'path' => 'agentCommissions/' . $this->user_name . '/',
            'name' => $file_name,
            'extension' => $file_extension
        );
        $this->set($params);
    }

    function _dirList($directory) {

        // create an array to hold directory list
        $results = array();

        // create a handler for the directory
        $handler = opendir($directory);

        // keep going until all files in directory have been read
        while ($file = readdir($handler)) {

            // if $file isn't this directory or its parent, 
            // add it to the results array
            if ($file != '.' && $file != '..')
                $results[] = $file;
        }

        // tidy up: close the handler
        closedir($handler);
        sort($results);
        // done!
        return $results;
    }

}
