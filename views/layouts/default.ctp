<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <title>
<?php
if (isset($pageTitle)) echo $pageTitle;
else echo $title_for_layout;
?>
 </title>
<?php
if (isset($description)) echo $html->meta('description', $description);
if (isset($keywords)) echo $html->meta('description', $keywords);
echo $html->charset('iso-8859-1');

echo $html->css(array('common', $site, 'buttons'));
echo "<link rel='icon' href='/img/$site/favicon.ico' />";
echo $javascript->link(array('jquery', 'jquery-ui', 'swfobject', 'scripts'));
echo $scripts_for_layout;
// remove home and auto links for French cystic site
if ($site == 'cystic' && $lang == 'fr')
	echo $javascript->link('ccff_fr_custom');
?>
</head>
<body<?php if (isset($body_classes)) echo " class='$body_classes'"; ?>>
<a name="top"></a> 
<div id="wrapper">
<div id="header">
 <div id="breadcrumb"><strong><?php __('You are here:'); ?>&nbsp;&nbsp;</strong>
<?php echo $breadcrumb; ?>
 </div>
 <div id='user_menu'>
<?php
// french/english switch
if ($bilingual){
	if ($lang == 'en')
		echo "<a href='" . Router::url('', true) . "?lang=french'>Fran&ccedil;ais</a>";
	else // $lang == 'fr
		echo "<a href='" . Router::url('', true) . "?lang=english'>English</a>";
}
// user menu for agent site
if ($site == 'agent'){
 if ($bilingual) echo " &bull; ";
if (!$user_id)
 echo $html->link( __('Log in', true), array('controller' => 'users', 'action' => 'login'));
else
 echo $html->link( __('Log out', true), array('controller' => 'users', 'action' => 'logout'), null, null, false) . " &bull; " . $html->link(__('Change Password', true), array('controller' => 'users', 'action' => 'change_password'));
}
?>
</div><!-- end user menu -->
</div>
 <div class="corners top"><!-- help out IE --></div>
 
 <div id="page">
  
  <div id="content">
<?php
echo $content_for_layout
?>
  </div><!-- content -->
  
  <div id="navBar">
<?php if ($site == 'yak') : ?>
  <div id="homeLink">
   <a href="http://www.yak.ca/" id="yakLink" title="Yak home page" target="_blank"><?php __('Yak home page'); ?></a>
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
  </div>
<?php elseif ($site == 'cda') : ?>
  <div id="homeLink">
   <a href="http://www.diabetes.ca/" id="cdaLink" title="CDA home page" target="_blank"><?php __('CDA home page'); ?></a>
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
  </div>
<?php elseif ($site == 'brokeradvantage') : ?>
  <div id="homeLink">
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
   <a href="http://brokeradvantageinc.com/" id="partnerLink" title="Broker Advantage home page" target="_blank"><?php __('Broker Advantage home page'); ?></a> 
  </div>
<?php elseif ($site == 'insurance_canada') : ?>
  <div id="homeLink">
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
   <a href="http://insurance-canada.ca/" id="partnerLink" title="Insurance Canada home page" target="_blank"><?php __('Insurance Canada home page'); ?></a> 
  </div>
<?php elseif ($site == 'staynomad') : ?>
  <div id="homeLink">
   <a href="http://www.staynomad.com/" id="partnerLink" title="Staynomad home page" target="_blank"><?php __('Staynomad home page'); ?></a> 
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
  </div>
<?php elseif ($site == 'marchofdimes' || $site == 'travelability') : ?>
  <div id="homeLink">
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
   <a href="http://www.marchofdimes.ca/" id="partnerLink" title="March of Dimes home page" target="_blank"><?php __('March of Dimes home page'); ?></a> 
  </div>
<?php elseif ($site == 'cystic') : ?>
  <div id="homeLink">
   <a href="http://<?php __('www.cysticfibrosis.ca/'); ?>" id="partnerLink" title="<?php __('Canadian Cystic Fibrosis Foundation home page'); ?>" target="_blank"><?php __('Canadian Cystic Fibrosis Foundation home page'); ?></a> 
   <a href="/" id="ingleLink" title="<?php __('Home'); ?>"><?php __('Home'); ?></a>
  </div>
<?php else: ?>
   <a href="home" id="homeLink" title="<?php __('Home'); ?>" class="rollover"><?php __('Home'); ?></a>
   <?php
endif;
// navigation is getting a little complicated
if ($site != 'agent')
 echo $nav;
else {
if ($user_name != ''){
 echo '<h2 style="margin-bottom: 0; font-size: 1.5em">' . __('Products', true) . '</h2>';
 echo $nav;
 echo '<h2 style="margin-bottom: 0; font-size: 1.5em">' . __('Resources', true) . '</h2>';
 echo $resourceNav;
}}

if ($site != 'sportsure' && $site != 'journeyman' && $site != 'agent'):
?>
   <a href="snowbirds" id="snowbirdsLink" title="<?php __('Snowbird Insurance'); ?>" class="rollover"><?php __('Snowbird Insurance'); ?></a>
<?php elseif ($site == 'sportsure') : ?>
   <a href="visitorsToCanada" id="visitorsLink" title="<?php __('Visitors to Canada Insurance'); ?>"><?php __('Visitors to Canada Insurance'); ?></a>
<?php elseif ($site == 'journeyman') : ?>
   <a href="primelink" id="snowbirdsLink" title="<?php __('Snowbird Insurance'); ?>"><?php __('Snowbird Insurance'); ?></a>
<?php endif; ?>
   <a href="contact" id="needHelpLink" title="<?php __('Contact Us'); ?>" class="rollover"><?php __('Contact us'); ?></a>
  </div><!-- navBar -->
 
 </div><!-- page -->
 
 <div class="corners bottom"><!-- help out IE -->
   <a href="http://www.peakcontact.com" target="_blank" id="poweredByPeak<?php if ($lang == 'fr') echo "_fr"; ?>"><span><?php __('Powered by Peak Contact'); ?></span></a>
 </div>
 <div id="footer">
 <a href="/privacy"><?php __('Privacy Policy'); ?></a> &bull; <a href="/legal"><?php __('Legal Notice'); ?></a> &bull; <a href="/termsOfService"><?php __('Terms of Service'); ?></a><br />
<?php __('Copyright'); ?> &copy; <?php echo date('Y'); ?> Ingle International Inc.</div>
</div><!-- wrapper -->
<?php // Google analytics tracking code, variable set in app_controller through Site component
if ($ga_code && $ga_code != '') :
?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("<?php echo $ga_code; ?>");
pageTracker._trackPageview();
} catch(err) {}</script>
<?php endif; ?>
</body>
</html>
