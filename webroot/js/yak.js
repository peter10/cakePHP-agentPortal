$(function(){

/* style navigation links
 * loop through anchors in top level ul
 * if anchor href matches 'folder' variable set in DB then open the sub ul
 * then loop through each link, if the anchor href matches 'link' variable then set classname
 */
	$('ul#nav ul').hide();
	$('ul#nav > li > a').each(function(){
		if (folder == '') return; // this is the default value set by view.ctp
		var folderRE = new RegExp('\/'+folder+'$'); 
		if (this.href.match(folderRE)){ // next sibiling of this is the ul
			$(this).next().show();
		}
	});
	$('ul#nav a').each(function(){
		if (link == '') return; // this is the default value set by view.ctp
		var linkRE = new RegExp('\/'+link+'$');
		if (this.href.match(linkRE)){
			$(this).addClass('current');
		}
	});

/* style forms
 * alternate background colors on form rows
 */
	$('#content div.input:even').addClass('highlight');
	$('.addStripes > li:even').addClass('highlight');
// add 'powered by peak' swf
swfobject.embedSWF('/img/peak/powered_by_peak.swf', 'poweredByPeak', '178', '45', '9.0.0');

// convert emails from form like <span class="email">someone at somedomain dot com</span>
$('span.email').each(function(){
 var email = $(this).html();
 var match = email.match(/(\w+)\sat\s(\w+)\sdot\s(\w+)/);
 if (match && match[1] && match[2] && match[3]){
  email = match[1] + '@' + match[2] + '.' + match[3];
  $(this).html('<a href="mailto:' + email + '">' + email + '</a>');
 }
});
});
