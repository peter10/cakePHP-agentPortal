<?php

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
 <title>
<?php
if (isset($pageTitle)) echo $pageTitle;
else echo $title_for_layout;
?>
 </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
if (isset($description)) echo $html->meta('description', $description);
if (isset($keywords)) echo $html->meta('description', $keywords);
//echo $html->charset();

if ($site == 'malta' || $site == 'mexico') // we don't even use these sites anymore, could be removed
 echo $html->css('common_v1');
else
 echo $html->css('common');
echo $html->css(array($site, 'buttons'));
echo "<link rel='icon' href='/img/$site/favicon.ico' />";
echo $javascript->link(array('jquery', 'jquery-ui', 'swfobject', 'scripts'));
echo $scripts_for_layout;
?>

</head>
<body class="fr<?php if (isset($body_classes)) echo " $body_classes"; ?>">
<a name="top"></a> 
<div id="wrapper">
<div id="header">
 <div id="breadcrumb"><strong>Vous etes ici:&nbsp;&nbsp;</strong>
<?php echo $breadcrumb; ?>
 </div>
<?php // user menu for agent site
if ($site == 'agent'){
echo "<div id='user_menu'>";
echo "<a href='" . Router::url('', true) . "?lang=english'>English</a> &bull; "; // switch language button
if (!$user_id)
 echo "<a href='/login'>". __('Log in', true) . "</a>";
else
 echo "<a href='/logout'>" . __('Log out', true) . "</a> &bull; <a href='/change_password'>Changer mot de passe</a>"; // echo "<a href='/logout'>Log out $first_name $last_name</a> &bull; <a href='/change_password'>Changer mot de passe</a>";
echo "</div>";
}
?>
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
   <a href="http://www.yak.ca/" id="yakLink" title="Yak home page" target="_blank">Yak home page</a>
   <a href="/" id="ingleLink" title="Accuel">Accuel</a>
  </div>
<?php elseif ($site == 'cda') : ?>
  <div id="homeLink">
   <a href="http://www.diabetes.ca/" id="cdaLink" title="CDA home page" target="_blank">CDA home page</a>
   <a href="/" id="ingleLink" title="Accuel">Accuel</a>
  </div>
<?php elseif ($site == 'brokeradvantage') : ?>
  <div id="homeLink">
   <a href="/" id="ingleLink" title="Accuel">Accuel</a>
   <a href="http://brokeradvantageinc.com/" id="partnerLink" title="Broker Advantage home page" target="_blank">Broker Advantage home page</a> 
  </div>
<?php elseif ($site == 'insurance_canada') : ?>
  <div id="homeLink">
   <a href="/" id="ingleLink" title="Accuel">Accuel</a>
   <a href="http://insurance-canada.ca/" id="partnerLink" title="Insurance Canada home page" target="_blank">Insurance Canada home page</a> 
  </div>
<?php elseif ($site == 'marchofdimes' || $site == 'travelability') : ?>
  <div id="homeLink">
   <a href="/" id="ingleLink" title="Accuel">Accuel</a>
   <a href="http://www.marchofdimes.ca/" id="partnerLink" title="March of Dimes home page" target="_blank">March of Dimes home page</a> 
  </div>
<?php else: ?>
   <a href="home" id="homeLink" title="Accuel" class="rollover">Accuel</a>
   <?php
endif;
// navigation is getting a little complicated
if ($site != 'agent')
 echo $nav;
else {
if ($user_name != ''){
 echo '<h2 style="margin-bottom: 0; font-size: 1.5em">Produits</h2>';
 echo $nav;
 echo '<h2 style="margin-bottom: 0; font-size: 1.5em">Ressources</h2>';
 echo $resourceNav;
}}

if ($site != 'sportsure'):
?>
   <a href="snowbirds" id="snowbirdsLink" class="rollover"></a>
<?php else: ?>
   <a href="visitorsToCanada" id="visitorsLink"></a>
<?php endif; ?>
   <a href="contact" id="needHelpLink" class="rollover"></a>
  </div><!-- navBar -->
 
 </div><!-- page -->
 
 <div class="corners bottom"><!-- help out IE -->
   <a href="http://www.peakcontact.com" target="_blank" id="poweredByPeak_fr"><span>Site expoité par Peak Contact</span></a>
 </div>
 <div id="footer">
 <a href="/privacy">Protection des renseignements personnels</a> &bull; <a href="/legal">Avis juridique et licences</a> &bull; <a href="/termsOfService">Conditions d’utilisation</a><br />
Droits d'auteur &copy; <?php echo date('Y'); ?> Ingle International Inc.</div>
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
