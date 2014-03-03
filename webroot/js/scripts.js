$(function(){

/* style forms
 * alternate background colors on form rows
 */
	$('#content div.input:even').addClass('highlight');
	$('.addStripes > li:even').addClass('highlight');
	$('.add_highlight tr:even').addClass('highlight');

// add 'powered by peak' swf
swfobject.embedSWF('/img/peak/powered_by_peak.swf', 'poweredByPeak', '178', '45', '9.0.0');
swfobject.embedSWF('/img/peak/powered_by_peak_fr.swf', 'poweredByPeak_fr', '178', '45', '9.0.0');

// convert emails from form like <span class="email">someone at somedomain dot com</span>
$('span.email').each(function(){
 var email = $(this).html();
 var match = email.match(/([\w\-]+)\sat\s(\w+)\sdot\s(\w+)/);
 if (match && match[1] && match[2] && match[3]){
  email = match[1] + '@' + match[2] + '.' + match[3];
  $(this).html('<a href="mailto:' + email + '">' + email + '</a>');
 }
});

/** rollover effect, not for IE6 **/
if (!jQuery.browser.msie || jQuery.browser.version >= 7){

// create div to hold roll-over image
$('a.rollover').append('<div></div>');

// add the image to the div
$('a.rollover').each(function(){
 var img = $(this).css('background-image');
 $(this).find('div').css({'background-image': img});
 $(this).addClass('js');
});

// add rollover effect
$('a.rollover').hover(
 function(){ 
  $(this).find('div').fadeIn('normal') ;
 },
 function(){ 
  $(this).find('div').fadeOut('slow') ;
 }
);
} // end rollover if

// fix PNG tranparency issue for IE 6
if (jQuery.browser.msie && jQuery.browser.version < 7){
 $('img[src$=".png"]').each(function(){
  src = $(this).attr('src');
  $(this).attr('src', '/img/common/transparent.gif').css('filter', "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "')");
 });
}
});
