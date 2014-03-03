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
<h2>Relev�s de commission et Information</h2>

<p>
Nous �mettons les relev�s mensuellement, � la fin du mois suivant le mois o� la vente a �t� compl�t�e. Par exemple, � la fin du mois d�ao�t, un relev� sera �mis pour les ventes r�alis�es au mois de juillet.
</p>
<p>
Votre relev� sera affich� sur cette page si vous avez effectu� des activit�s durant le mois pr�c�dent.
<p>
</p>
Pour les commissions inf�rieures � 50 $, un relev� sera �mis, mais aucun ch�que ne sera envoy� avant que vous atteigniez une somme cumulative de plus de 50 $. Nous conserverons toutes sommes inf�rieures � 50 $ jusqu�au moment o� le total exc�dera le seuil minimum.
<p>
</p>
Si vous avez des questions � propos des commissions, veuillez contacter le Service aux Courtiers au 1 800 292-9460 ou � l�adresse suivante : <span class="email">agent at imagineinsurance dot com</span>.
</p>
<p>
<b>Relev�s disponibles pour t�l�chargement : </b>
</p>
<?php
endif;

foreach($files as $file){
 echo "<a href='/agentCommissions/download/". $file. "'>". $file. "</a><br />";
}
?>
