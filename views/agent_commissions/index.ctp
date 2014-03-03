<?php
if ($language == 'en'):
?>
<h2>Commission Statements & Information</h2>

<p>
We issue commission statements on a monthly basis, at the end of the month following the month of sale.  For example, at the end of August, a statement would be issued for all sales made in the month of July.
</p>
<p>
Your statement will be posted on this page if there was any activity in the applicable month.
<p>
</p>
For commissions under $50, a statement will be issued, but no cheque will be sent until the cumulative amount due is over $50.  We will keep any amounts under $50 on file until the total exceeds the threshold.
<p>
</p>
If you have any questions about your commissions, please contact Broker Services at 1 800 292-9460 or <span class="email">agent at imagineinsurance dot com</span>.
</p>
<p>
<b>Statements available for download:</b>
</p>
<?php
else: // $language == 'fr'
?>
<h2>Relevés de commission et Information</h2>

<p>
Nous émettons les relevés mensuellement, à la fin du mois suivant le mois où la vente a été complétée. Par exemple, à la fin du mois d’août, un relevé sera émis pour les ventes réalisées au mois de juillet.
</p>
<p>
Votre relevé sera affiché sur cette page si vous avez effectué des activités durant le mois précédent.
<p>
</p>
Pour les commissions inférieures à 50 $, un relevé sera émis, mais aucun chèque ne sera envoyé avant que vous atteigniez une somme cumulative de plus de 50 $. Nous conserverons toutes sommes inférieures à 50 $ jusqu’au moment où le total excèdera le seuil minimum.
<p>
</p>
Si vous avez des questions à propos des commissions, veuillez contacter le Service aux Courtiers au 1 800 292-9460 ou à l’adresse suivante : <span class="email">agent at imagineinsurance dot com</span>.
</p>
<p>
<b>Relevés disponibles pour téléchargement : </b>
</p>
<?php
endif;

foreach($files as $file){
 echo "<a href='/agentCommissions/download/". $file. "'>". $file. "</a><br />";
}
?>
