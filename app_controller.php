<?php

uses('L10n');

class AppController extends Controller {

    var $helpers = array('Html', 'Javascript', 'Form');
    var $components = array('Site', 'Email', 'Auth', 'Session', 'Navigation');
    // variables to be shared amongst controllers
    var $user_name, $site_name, $language = 'english', $lang = 'en', $first_name, $body_classes = '', $bilingual = false;

    function beforeFilter() {

        // redirect to SSL if appropriate
        // the function returns false if no redirect needed, otherwise returns the redirect URL
        $redirect_url = $this->Site->redirect();
        if ($redirect_url) {
            $this->redirect($redirect_url);
        }

        $this->Auth->allow('*');

        // site customization:
        $this->pageTitle = $this->Site->siteTitle();

        $this->site_name = $this->Site->siteName();
        $this->set('site', $this->site_name);
        $this->Session->write('site', $this->site_name);

        $this->bilingual = $this->Site->bilingual();
        $this->set('bilingual', $this->bilingual);

        $this->set('ga_code', $this->Site->gaCode());
        $this->set('user_id', $this->Auth->user('id'));

        $this->user_name = $this->Auth->user('username');
        $this->set('user_name', $this->user_name);
        $this->Session->write('user', $this->user_name);

        $this->first_name = $this->Auth->user('firstName');
        $this->set('first_name', $this->first_name);

        $this->set('last_name', $this->Auth->user('lastName'));

        // set language, either by query string or session
        if (isset($this->params['url']['lang'])) {
            if ($this->params['url']['lang'] == 'english' || $this->params['url']['lang'] == 'en') {
                $this->Session->write('language', 'english');
            } else if ($this->params['url']['lang'] == 'french' || $this->params['url']['lang'] == 'fr') {
                $this->Session->write('language', 'french');
            }
        }
        if ($this->Session->check('language'))
            $this->language = $this->Session->read('language');

        // French layout and views and stuff
        if ($this->language == 'french') {

            $this->L10n = new L10n();
            $this->L10n->get("fr");
            Configure::write('Config.language', 'fr');
            $this->set('language', 'fr');
            $this->set('lang', 'fr');
            $this->lang = 'fr';
            $this->body_classes .= ' fr';
            $this->Session->write('lang', 'fr');

            //$this->layout = 'default_french';
            //check if French view folder exists before enabling
            foreach (Configure::read('viewPaths') as $path) {
                if (file_exists($path . $this->viewPath . "_french")) {
                    $this->viewPath = $this->viewPath . "_french";
                }
            }
        } else {
            $this->set('language', 'en');
            $this->set('lang', 'en');
            $this->lang = 'en';
            $this->body_classes .= ' en';
            $this->Session->write('lang', 'en');
        }

        $this->set('body_classes', $this->body_classes);
        // navigation and breadcrumb
        // navigation menu is stored as nested arrays in Site component, pass the array to the Navigation component for nested ul and breadcrumb
        // Agent site uses second navigation for resources
        $navigation = $this->Navigation->getNav($this->Site->nav());
        //$resourceNav = $this->Navigation->getNav($this->Navigation->resourceNav); 
        $resourceNav = $this->Navigation->get_resource_nav();
        $loginNav = $this->Navigation->get_login_nav();
        $footerNav = $this->Navigation->get_footer_nav();
        $this->set('nav', $navigation['list']);
        $this->set('resourceNav', $resourceNav['list']);
        // pick the more specific breadcrumb
        if ($navigation['page_found'])
            $this->set('breadcrumb', $navigation['breadcrumb']);
        elseif ($resourceNav['page_found'])
            $this->set('breadcrumb', $resourceNav['breadcrumb']);
        elseif ($loginNav['page_found'])
            $this->set('breadcrumb', $loginNav['breadcrumb']);
        elseif ($footerNav['page_found'])
            $this->set('breadcrumb', $footerNav['breadcrumb']);
        else
            $this->set('breadcrumb', $navigation['breadcrumb']);
        // navigation not enabled for agent site if not logged in
        $this->set('showNav', ($this->site_name != 'agent' || $this->user_name != ''));
        $this->set('showTopNav', ($this->site_name == 'agent' && $this->user_name != ''));
    }

}