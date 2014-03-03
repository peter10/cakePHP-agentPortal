<?php

class NavigationComponent extends Object {

    var $components = array('Site');

    function getCurrentLink() {
        // get current_link from URL
        $current_link = Router::getPaths();
        $current_link = $current_link['here'];
        $current_link = explode('/', $current_link);
        $link = array_pop($current_link);
        if ($link != '')
            return $link;
        return array_pop($current_link);
    }

    function locatePage($nav) {
        // parses $nav and extracts current and parent page/link

        $current_link = $this->getCurrentLink();
        $current_name = '';
        $mid_link = '';
        $mid_name = '';
        $top_link = '';
        $top_name = '';
        foreach ($nav as $item) {
            if ($current_link == $item['link']) {
                $top_link = $current_link;
                $current_name = $item['name'];
                break;
            }
            // loop through subnav
            if (array_key_exists('subNav', $item) && is_array($item['subNav'])) {
                foreach ($item['subNav'] as $subItem) {
                    if ($current_link == $subItem['link']) {
                        $top_link = $item['link'];
                        $top_name = $item['name'];
                        $mid_link = $subItem['link'];
                        $current_name = $subItem['name'];
                        break;
                    }
                    // loop through sub-sub nav
                    if (array_key_exists('subNav', $subItem) && is_array($subItem['subNav'])) {
                        foreach ($subItem['subNav'] as $subSubItem) {
                            if ($current_link == $subSubItem['link']) {
                                $top_link = $item['link'];
                                $top_name = $item['name'];
                                $mid_link = $subItem['link'];
                                $mid_name = $subItem['name'];
                                $current_name = $subSubItem['name'];
                            }
                        }
                    }
                }
            }
        }
        return compact('top_link', 'top_name', 'mid_link', 'mid_name', 'current_link', 'current_name');
    }

    function getNav($nav) {

        // whether the page exists in the menu, switch to false if not found
        $page_found = true;

        // set link variables
        extract($this->locatePage($nav));

        // build breadcrumb
        if ($top_link == '') { // current page is not in the nav structure
            $breadcrumb = __('Home', true);
            $page_found = false;
        } elseif ($top_link == $current_link) // first-level nav page
            $breadcrumb = "<a href='/home'>" . __('Home', true) . "</a> &gt; " . $current_name;
        elseif ($mid_link == $current_link) // second level nav page
            $breadcrumb = "<a href='/home'>" . __('Home', true) . "</a> &gt; <a href='/" . $top_link . "'>" . $top_name . '</a> &gt; ' . $current_name;
        else // third level nav page
            $breadcrumb = "<a href='/home'>" . __('Home', true) . "</a> &gt; <a href='/" . $top_link . "'>" . $top_name . '</a> &gt; <a href="' . $mid_link . '">' . $mid_name . '</a> &gt; ' . $current_name;

        // build nav ul
        $list = '<ul class="nav">';
        foreach ($nav as $item) {
            $list .= '<li><a href="/' . $item['link'] . '"';
            if ($current_link != '' && $current_link == $item['link']) // first-level nav page
                $list .= ' class="current"';
            $list .= '>' . $item['name'] . '</a>';
            if ($top_link != '' && $top_link == $item['link'] && array_key_exists('subNav', $item) && is_array($item['subNav'])) { // build sub-nav
                $list .= '<ul>';
                foreach ($item['subNav'] as $subItem) {
                    $list .= '<li><a href="/' . $subItem['link'] . '"';
                    if ($mid_link != '' && $mid_link == $subItem['link']) // second level nav page
                        $list .= ' class="current"';
                    $list .= '>' . $subItem['name'] . '</a></li>';
                }
                $list .= '</ul>';
            }
            $list .= '</li>';
        }
        $list .= '</ul>';

        return array('list' => $list, 'breadcrumb' => $breadcrumb, 'page_found' => $page_found);
    }

    function get_resource_nav() {
        return $this->getNav(
                        array(
                            array('link' => 'agentCommissions', 'name' => __('Commission Statements', true)),
                            array('link' => 'bookingSystems', 'name' => __('Booking & Admin Systems', true)),
                            array('link' => 'formsAndBrochures', 'name' => __('Forms & Resources', true)),
                            array('link' => 'info', 'name' => __('Information Centre', true)),
                            array('link' => 'about', 'name' => __('About Us', true)),
                            array('link' => 'contact', 'name' => __('Contact Us', true))
        ));
    }

    function get_footer_nav() {
        return $this->getNav(
                        array(
                            array('link' => 'Login', 'name' => __('Login', true)),
                            array('link' => 'privacy', 'name' => __('Privacy Policy', true)),
                            array('link' => 'legal', 'name' => __('Legal Notice', true)),
                            array('link' => 'termsOfService', 'name' => __('Terms of Service', true))
        ));
    }

    function get_login_nav() {
        return $this->getNav(
                        array(
                            array('link' => 'login', 'name' => __('Registered Agents: Log In Here', true)),
                            array('link' => 'change_password', 'name' => __('Change Your Password', true)),
                            array('link' => 'howToRegister', 'name' => __('New Agents: Register Now', true))
        ));
    }

}
