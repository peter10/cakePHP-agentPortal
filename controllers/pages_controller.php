<?php

class PagesController extends AppController {

    function view($link = 'home') {

        $language = $this->language; // set in app_controller
        $site_name = $this->site_name; // set in app_controller
        // travel page and home page are the same for some sites
        if (($site_name == 'journeyman' || $site_name == 'suelee' || $site_name == 'absolute') && $link == 'home')
            $this->redirect(array('controller' => 'pages', 'action' => 'view', 'travel',));

        // first try to find the site specific page
        $page = $this->Page->find('first', array('conditions' => array(
                'Page.link' => $link,
                'Page.language' => $language,
                'Page.site' => $site_name
        )));
        // if that didn't work get the generic page
        if (!$page) {
            $page = $this->Page->find('first', array('conditions' => array(
                    'Page.link' => $link,
                    'Page.language' => $language,
                    'Page.site' => 'generic'
            )));
        }
        // now try the english site specific page
        if (!$page) {
            $page = $this->Page->find('first', array('conditions' => array(
                    'Page.link' => $link,
                    'Page.language' => 'english',
                    'Page.site' => $site_name
            )));
        }
        // english generic page
        if (!$page) {
            $page = $this->Page->find('first', array('conditions' => array(
                    'Page.link' => $link,
                    'Page.language' => 'english',
                    'Page.site' => 'generic'
            )));
        }
        // if that didn't work give a 404
        if (!$page) {
            $page = $this->Page->find('first', array('conditions' => array(
                    'Page.link' => 'notFound',
                    'Page.language' => $language,
                    'Page.site' => 'generic'
            )));
            $this->header("HTTP/1.0 404 Not Found");
        }

        // agent home page has special logic for logged/not logged in
        if ($site_name == 'agent' && $link == 'home' && $this->user_name != '') {
            if ($language == 'english')
                $this->set('copy', $this->_agentHomePage());
            else // $language == 'french'
                $this->set('copy', $this->_agentHomePage_french());
        } else
            $this->set('copy', $page['Page']['content']);

        // hack to add meta tags to some pages   
        if ($link == 'snowbirds')
            $this->set(array('page_title' => 'Snowbirds Travel, Medical insurance for Canadians', 'description' => 'Travel health insurance quotes for Canadian snowbirds: best coverage and rates. Snowbirds quote for travel insurance, Snowbird medical insurance Best Coverage rates. call ingletravel.com', 'keywords' => 'Snowbird coverages, snowbird travel insurance, snowbird consumer travel insurance, canadian snowbirds, snowbird travel medical insurance, snowbird travel quotes, travel insurance quotes for snowbirds, snowbird traveler, snowbird traveller, snowbird medical insurance, snowbird health insurance, snowbird travel health insurance, snowbird medical insurance quotes, snowbird traveller quotes, snowbird insurance'));
    }

    function _agentHomePage() {
        return '<h1 class="header home"><span>Welcome to Ingle International</span></h1>
<p><b>Welcome, ' . $this->first_name . '!</b></p>
<p>Thank you for entering the Ingle International and Imagine Financial online agent portal.  Here you will find information on our products and services, links to purchase products online, copies of your commission statements, and more.</p>
<p>If you have any questions, please do not hesitate to contact us:</p>
<p><b>Broker Services</b><br />
Tel.: 1 800 292-9460<br />
E: <span class="email" class="email">agent at imagineinsurance dot com</span>
</p>';
    }

    function _agentHomePage_french() {
        return '<h1 class="header home"><span>Bienvenue � Ingle International</span></h1>
<p><b>Bienvenue, ' . $this->first_name . '!</b></p>
<p>Merci de vous enregistrer sur le portail des repr�sentants d�Ingle International et Imagine Financier. Vous trouverez sur le site des informations sur nos produits et services, des liens pour acheter des produits en ligne, les copies des relev�s de vos commissions, et bien plus encore.</p>
<p>Si vous avez des questions, n�h�sitez pas � nous contacter :</p>
<p><b>Service aux Courtiers</b><br />
T�l�phone : 1 800 292-9460<br />
Courriel : <span class="email" class="email">agent at imagineinsurance dot com</span>
</p>';
    }

}
