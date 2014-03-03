<?php
if ($language == 'en'):
?>
<h1 class="header travel"><span>Travel Insurance</span></h1>
<p>
Every trip and every traveller is unique. Your requirements may not fit neatly into the standard travel plans offered here. Don't fret, we can help.
</p>
<p>
Ingle International Services Representative can help you find a plan to suit your specific needs. We offer special quotes for groups of 10 or more, coverage for extreme sports and adventure travel, and plans for travel into hot spots and dangerous places.
</p>
<p>
If you are affiliated with an educational institution, faith-based organization, tour company or professional association, we may be able to get you a customized quote.
</p>
<p>
Fill out the fields below and click Submit. One of our specially trained representatives will review your information and contact you within 48 hours.
</p>
<p>
<span class="required" style="padding-left: 20px;">indicates a required field
</p>
<?php
else:
?>
<h1 class="header travel"><span>Assurance voyage</span></h1>
<p>
Tous les voyages et tous les voyageurs sont différents. Les régimes standards décrits ici ne conviennent peut-être pas exactement à vos besoins. Peu importe, nous avons une solution.
</p>
<p>
Les représentants du service à la clientèle de Ingle International vous aideront à choisir un régime bien adapté à vos besoins particuliers. Nous offrons des soumissions spéciales pour les groupes de dix personnes et plus, des assurances pour les sports extrêmes et les voyages d’aventure, et des assurances pour les personnes qui voyagent vers des destinations dangereuses.
</p>
<p>
Si vous êtes associé à un établissement scolaire, un organisme confessionnel, une agence de voyages organisés ou une association professionnelle, nous pourrons vous aider à obtenir une soumission personnalisée.
</p>
<p>
Remplissez les champs ci-dessous et cliquez sur « Soumettre ». Un de nos représentants spécialisés examinera vos renseignements et communiquera avec vous d’ici 48 heures.
</p>
<p>
<span class="required" style="padding-left: 20px;">champ requis</span>
</p>
<?php
endif;

echo $form->create('CustomGroupRequest');
echo $form->input('first_name', array('label' => __('First Name', true)));
echo $form->input('last_name', array('label' => __('Last Name', true)));
echo $form->input('organization', array('label' => __('Organization', true)));
echo $form->input('position', array('label' => __('Position', true)));
echo $form->input('email', array('label' => __('Email', true), 'error' => array('valid_email' => __('Please enter a valid email address', true))));
echo $form->input('address', array('label' => __('Address', true)));
echo $form->input('city', array('label' => __('City', true)));
echo $form->input('province', array('label' => __('Province', true), 'options' => $geography->get_provinces(), 'escape' => false));
echo $form->input('postal_code', array('label' => __('Postal Code', true), 'error' => array('valid_postal' => __('Please enter a valid postal code', true))));
echo $form->input('country', array('options' => $geography->get_countries(), 'label' => __('Country', true), 'escape' => false));
echo $form->input('phone', array('label' => __('Phone', true)));
echo $form->input('fax', array('label' => __('Fax', true)));
echo $form->input('gender', array('options' => array('male' => __('male', true), 'female' => __('female', true)), 'label' => __('Gender', true), 'escape' => false));
echo $form->input('date_of_birth', array('maxYear' => date('Y'), 'minYear' => date('Y')-100, 'label' => __('Date of Birth', true)));
echo $form->input('number_of_travellers', array('label' => __('Number of Travellers', true)));
echo $form->input('destination', array('label' => __('Destination', true)));
echo $form->input('departure_date', array('maxYear' => date('Y')+10, 'minYear' => date('Y'), 'label' => __('Departure Date', true)));
echo $form->input('return_date', array('maxYear' => date('Y')+10, 'minYear' => date('Y'), 'label' => __('Return Date', true)));
echo $form->input('purpose_of_travel', array('label' => __('Purpose of Travel', true)));
echo $form->input('special_needs', array('label' => __('Special Needs', true)));
echo $form->input('additional_comments', array('label' => __('Additional Comments', true)));
echo $form->end(__('Submit', true));
?>