<?php

class GeographyComponent extends Object {
 var $provinces = array('Alberta' => 'Alberta', 'British Columbia' => 'British Columbia', 'Manitoba' => 'Manitoba', 'New Brunswick' => 'New Brunswick', 'Newfoundland & Labrador' => 'Newfoundland & Labrador', 'Northwest Territories' => 'Northwest Territories', 'Nova Scotia' => 'Nova Scotia', 'Nunavut' => 'Nunavut', 'Ontario' => 'Ontario', 'Prince Edward Island' => 'Prince Edward Island', 'Quebec' => 'Quebec', 'Saskatchewan' => 'Saskatchewan', 'Yukon' => 'Yukon');

 var $countries = array(
		"Afghanistan"  =>  "Afghanistan",
		"Albania"  =>  "Albania",
		"Algeria"  =>  "Algeria",
		"Andorra"  =>  "Andorra",
		"Angola"  =>  "Angola",
		"Antigua and Barbuda"  =>  "Antigua and Barbuda",
		"Argentina"  =>  "Argentina",
		"Armenia"  =>  "Armenia",
		"Australia"  =>  "Australia",
		"Austria"  =>  "Austria",
		"Azerbaijan"  =>  "Azerbaijan",
		"Bahamas"  =>  "Bahamas",
		"Bahrain"  =>  "Bahrain",
		"Bangladesh"  =>  "Bangladesh",
		"Barbados"  =>  "Barbados",
		"Belarus"  =>  "Belarus",
		"Belgium"  =>  "Belgium",
		"Belize"  =>  "Belize",
		"Benin"  =>  "Benin",
		"Bhutan"  =>  "Bhutan",
		"Bolivia"  =>  "Bolivia",
		"Bosnia and Herzegovina"  =>  "Bosnia and Herzegovina",
		"Botswana"  =>  "Botswana",
		"Brazil"  =>  "Brazil",
		"Brunei"  =>  "Brunei",
		"Bulgaria"  =>  "Bulgaria",
		"Burkina Faso"  =>  "Burkina Faso",
		"Burundi"  =>  "Burundi",
		"Cambodia"  =>  "Cambodia",
		"Cameroon"  =>  "Cameroon",
		"Canada"  =>  "Canada",
		"Cape Verde"  =>  "Cape Verde",
		"Central African Republic"  =>  "Central African Republic",
		"Chad"  =>  "Chad",
		"Chile"  =>  "Chile",
		"China"  =>  "China",
		"Colombi"  =>  "Colombi",
		"Comoros"  =>  "Comoros",
		"Congo (Brazzaville)" => "Congo (Brazzaville)",
		"Congo"  =>  "Congo",
		"Costa Rica"  =>  "Costa Rica",
		"Cote d'Ivoire" => "Cote d'Ivoire",
		"Croatia"  =>  "Croatia",
		"Cuba"  =>  "Cuba",
		"Cyprus"  =>  "Cyprus",
		"Czech Republic"  =>  "Czech Republic",
		"Denmark"  =>  "Denmark",
		"Djibouti"  =>  "Djibouti",
		"Dominica"  =>  "Dominica",
		"Dominican Republic"  =>  "Dominican Republic",
		"East Timor (Timor Timur)" => "East Timor (Timor Timur)",
		"Ecuador"  =>  "Ecuador",
		"Egypt"  =>  "Egypt",
		"El Salvador"  =>  "El Salvador",
		"Equatorial Guinea"  =>  "Equatorial Guinea",
		"Eritrea"  =>  "Eritrea",
		"Estonia"  =>  "Estonia",
		"Ethiopia"  =>  "Ethiopia",
		"Fiji"  =>  "Fiji",
		"Finland"  =>  "Finland",
		"France"  =>  "France",
		"Gabon"  =>  "Gabon",
		"Gambia, The" => "Gambia, The",
		"Georgia"  =>  "Georgia",
		"Germany"  =>  "Germany",
		"Ghana"  =>  "Ghana",
		"Greece"  =>  "Greece",
		"Grenada"  =>  "Grenada",
		"Guatemala"  =>  "Guatemala",
		"Guinea"  =>  "Guinea",
		"Guinea-Bissau" => "Guinea-Bissau",
		"Guyana"  =>  "Guyana",
		"Haiti"  =>  "Haiti",
		"Honduras"  =>  "Honduras",
		"Hungary"  =>  "Hungary",
		"Iceland"  =>  "Iceland",
		"India"  =>  "India",
		"Indonesia"  =>  "Indonesia",
		"Iran"  =>  "Iran",
		"Iraq"  =>  "Iraq",
		"Ireland"  =>  "Ireland",
		"Israel"  =>  "Israel",
		"Italy"  =>  "Italy",
		"Jamaica"  =>  "Jamaica",
		"Japan"  =>  "Japan",
		"Jordan"  =>  "Jordan",
		"Kazakhstan"  =>  "Kazakhstan",
		"Kenya"  =>  "Kenya",
		"Kiribati"  =>  "Kiribati",
		"Korea, North" =>"Korea, North",
		"Korea, South" => "Korea, South",
		"Kuwait"  =>  "Kuwait",
		"Kyrgyzstan"  =>  "Kyrgyzstan",
		"Laos"  =>  "Laos",
		"Latvia"  =>  "Latvia",
		"Lebanon"  =>  "Lebanon",
		"Lesotho"  =>  "Lesotho",
		"Liberia"  =>  "Liberia",
		"Libya"  =>  "Libya",
		"Liechtenstein"  =>  "Liechtenstein",
		"Lithuania"  =>  "Lithuania",
		"Luxembourg"  =>  "Luxembourg",
		"Macedonia"  =>  "Macedonia",
		"Madagascar"  =>  "Madagascar",
		"Malawi"  =>  "Malawi",
		"Malaysia"  =>  "Malaysia",
		"Maldives"  =>  "Maldives",
		"Mali"  =>  "Mali",
		"Malta"  =>  "Malta",
		"Marshall Islands"  =>  "Marshall Islands",
		"Mauritania"  =>  "Mauritania",
		"Mauritius"  =>  "Mauritius",
		"Mexico"  =>  "Mexico",
		"Micronesia"  =>  "Micronesia",
		"Moldova"  =>  "Moldova",
		"Monaco"  =>  "Monaco",
		"Mongolia"  =>  "Mongolia",
		"Morocco"  =>  "Morocco",
		"Mozambique"  =>  "Mozambique",
		"Myanmar"  =>  "Myanmar",
		"Namibia"  =>  "Namibia",
		"Nauru"  =>  "Nauru",
		"Nepa"  =>  "Nepa",
		"Netherlands"  =>  "Netherlands",
		"New Zealand"  =>  "New Zealand",
		"Nicaragua"  =>  "Nicaragua",
		"Niger"  =>  "Niger",
		"Nigeria"  =>  "Nigeria",
		"Norway"  =>  "Norway",
		"Oman"  =>  "Oman",
		"Pakistan"  =>  "Pakistan",
		"Palau"  =>  "Palau",
		"Panama"  =>  "Panama",
		"Papua New Guinea"  =>  "Papua New Guinea",
		"Paraguay"  =>  "Paraguay",
		"Peru"  =>  "Peru",
		"Philippines"  =>  "Philippines",
		"Poland"  =>  "Poland",
		"Portugal"  =>  "Portugal",
		"Qatar"  =>  "Qatar",
		"Romania"  =>  "Romania",
		"Russia"  =>  "Russia",
		"Rwanda"  =>  "Rwanda",
		"Saint Kitts and Nevis"  =>  "Saint Kitts and Nevis",
		"Saint Lucia"  =>  "Saint Lucia",
		"Saint Vincent"  =>  "Saint Vincent",
		"Samoa"  =>  "Samoa",
		"San Marino"  =>  "San Marino",
		"Sao Tome and Principe"  =>  "Sao Tome and Principe",
		"Saudi Arabia"  =>  "Saudi Arabia",
		"Senegal"  =>  "Senegal",
		"Serbia and Montenegro"  =>  "Serbia and Montenegro",
		"Seychelles"  =>  "Seychelles",
		"Sierra Leone"  =>  "Sierra Leone",
		"Singapore"  =>  "Singapore",
		"Slovakia"  =>  "Slovakia",
		"Slovenia"  =>  "Slovenia",
		"Solomon Islands"  =>  "Solomon Islands",
		"Somalia"  =>  "Somalia",
		"South Africa"  =>  "South Africa",
		"Spain"  =>  "Spain",
		"Sri Lanka"  =>  "Sri Lanka",
		"Sudan"  =>  "Sudan",
		"Suriname"  =>  "Suriname",
		"Swaziland"  =>  "Swaziland",
		"Sweden"  =>  "Sweden",
		"Switzerland"  =>  "Switzerland",
		"Syria"  =>  "Syria",
		"Taiwan"  =>  "Taiwan",
		"Tajikistan"  =>  "Tajikistan",
		"Tanzania"  =>  "Tanzania",
		"Thailand"  =>  "Thailand",
		"Togo"  =>  "Togo",
		"Tonga"  =>  "Tonga",
		"Trinidad and Tobago"  =>  "Trinidad and Tobago",
		"Tunisia"  =>  "Tunisia",
		"Turkey"  =>  "Turkey",
		"Turkmenistan"  =>  "Turkmenistan",
		"Tuvalu"  =>  "Tuvalu",
		"Uganda"  =>  "Uganda",
		"Ukraine"  =>  "Ukraine",
		"United Arab Emirates"  =>  "United Arab Emirates",
		"United Kingdom"  =>  "United Kingdom",
		"United States"  =>  "United States",
		"Uruguay"  =>  "Uruguay",
		"Uzbekistan"  =>  "Uzbekistan",
		"Vanuatu"  =>  "Vanuatu",
		"Vatican City"  =>  "Vatican City",
		"Venezuela"  =>  "Venezuela",
		"Vietnam"  =>  "Vietnam",
		"Yemen"  =>  "Yemen",
		"Zambia"  =>  "Zambia",
		"Zimbabwe"  =>  "Zimbabwe"
	);
var $countries_french = array(
 "afghanistan"=>"afghanistan",
 "afrique du sud"=>"afrique du sud",
 "�land, �les"=>"�land, �les",
 "albanie"=>"albanie",
 "alg�rie"=>"alg�rie",
 "allemagne"=>"allemagne",
 "andorre"=>"andorre",
 "angola"=>"angola",
 "anguilla"=>"anguilla",
 "antarctique"=>"antarctique",
 "antigua et barbuda"=>"antigua et barbuda",
 "antilles n�erlandaises"=>"antilles n�erlandaises",
 "arabie saoudite"=>"arabie saoudite",
 "argentine"=>"argentine",
 "arm�nie"=>"arm�nie",
 "aruba"=>"aruba",
 "australie"=>"australie",
 "autriche"=>"autriche",
 "azerba�djan"=>"azerba�djan",
 "bahamas"=>"bahamas",
 "bahre�n"=>"bahre�n",
 "bangladesh"=>"bangladesh",
 "barbade"=>"barbade",
 "b�larus"=>"b�larus",
 "belgique"=>"belgique",
 "belize"=>"belize",
 "b�nin"=>"b�nin",
 "bermudes"=>"bermudes",
 "bhoutan"=>"bhoutan",
 "bolivie, l'�tat plurinational de"=>"bolivie, l'�tat plurinational de",
 "bosnie-herz�govine"=>"bosnie-herz�govine",
 "botswana"=>"botswana",
 "bouvet, �le"=>"bouvet, �le",
 "br�sil"=>"br�sil",
 "brun�i darussalam"=>"brun�i darussalam",
 "bulgarie"=>"bulgarie",
 "burkina faso"=>"burkina faso",
 "burundi"=>"burundi",
 "ca�manes, �les"=>"ca�manes, �les",
 "cambodge"=>"cambodge",
 "cameroun"=>"cameroun",
 "canada"=>"canada",
 "cap-vert"=>"cap-vert",
 "centrafricaine, r�publique"=>"centrafricaine, r�publique",
 "chili"=>"chili",
 "chine"=>"chine",
 "christmas, �le"=>"christmas, �le",
 "chypre"=>"chypre",
 "cocos (keeling), �les"=>"cocos (keeling), �les",
 "colombie"=>"colombie",
 "comores"=>"comores",
 "congo"=>"congo",
 "congo, la r�publique d�mocratique du"=>"congo, la r�publique d�mocratique du",
 "cook, �les"=>"cook, �les",
 "cor�e, r�publique de"=>"cor�e, r�publique de",
 "cor�e, r�publique populaire d�mocratique de"=>"cor�e, r�publique populaire d�mocratique de",
 "costa rica"=>"costa rica",
 "c�te d'ivoire"=>"c�te d'ivoire",
 "croatie"=>"croatie",
 "cuba"=>"cuba",
 "danemark"=>"danemark",
 "djibouti"=>"djibouti",
 "dominicaine, r�publique"=>"dominicaine, r�publique",
 "dominique"=>"dominique",
 "�gypte"=>"�gypte",
 "el salvador"=>"el salvador",
 "�mirats arabes unis"=>"�mirats arabes unis",
 "�quateur"=>"�quateur",
 "�rythr�e"=>"�rythr�e",
 "espagne"=>"espagne",
 "estonie"=>"estonie",
 "�tats-unis"=>"�tats-unis",
 "�thiopie"=>"�thiopie",
 "falkland, �les (malvinas)"=>"falkland, �les (malvinas)",
 "f�ro�, �les"=>"f�ro�, �les",
 "fidji"=>"fidji",
 "finlande"=>"finlande",
 "france"=>"france",
 "gabon"=>"gabon",
 "gambie"=>"gambie",
 "g�orgie"=>"g�orgie",
 "g�orgie du sud et les �les sandwich du sud"=>"g�orgie du sud et les �les sandwich du sud",
 "ghana"=>"ghana",
 "gibraltar"=>"gibraltar",
 "gr�ce"=>"gr�ce",
 "grenade"=>"grenade",
 "groenland"=>"groenland",
 "guadeloupe"=>"guadeloupe",
 "guam"=>"guam",
 "guatemala"=>"guatemala",
 "guernesey"=>"guernesey",
 "guin�e"=>"guin�e",
 "guin�e-bissau"=>"guin�e-bissau",
 "guin�e �quatoriale"=>"guin�e �quatoriale",
 "guyana"=>"guyana",
 "guyane fran�aise"=>"guyane fran�aise",
 "heard, �le et mcdonald, �les"=>"heard, �le et mcdonald, �les",
 "honduras"=>"honduras",
 "hong-kong"=>"hong-kong",
 "hongrie"=>"hongrie",
 "�le de man"=>"�le de man",
 "�les mineures �loign�es des �tats-unis"=>"�les mineures �loign�es des �tats-unis",
 "�les vierges britanniques"=>"�les vierges britanniques",
 "�les vierges des �tats-unis"=>"�les vierges des �tats-unis",
 "inde"=>"inde",
 "indon�sie"=>"indon�sie",
 "iran, r�publique islamique d'"=>"iran, r�publique islamique d'",
 "iraq"=>"iraq",
 "irlande"=>"irlande",
 "islande"=>"islande",
 "isra�l"=>"isra�l",
 "italie"=>"italie",
 "jama�que"=>"jama�que",
 "japon"=>"japon",
 "jersey"=>"jersey",
 "jordanie"=>"jordanie",
 "kazakhstan"=>"kazakhstan",
 "kenya"=>"kenya",
 "kirghizistan"=>"kirghizistan",
 "kiribati"=>"kiribati",
 "kowe�t"=>"kowe�t",
 "lao, r�publique d�mocratique populaire"=>"lao, r�publique d�mocratique populaire",
 "lesotho"=>"lesotho",
 "lettonie"=>"lettonie",
 "liban"=>"liban",
 "lib�ria"=>"lib�ria",
 "libyenne, jamahiriya arabe"=>"libyenne, jamahiriya arabe",
 "liechtenstein"=>"liechtenstein",
 "lituanie"=>"lituanie",
 "luxembourg"=>"luxembourg",
 "macao"=>"macao",
 "mac�doine, l'ex-r�publique yougoslave de"=>"mac�doine, l'ex-r�publique yougoslave de",
 "madagascar"=>"madagascar",
 "malaisie"=>"malaisie",
 "malawi"=>"malawi",
 "maldives"=>"maldives",
 "mali"=>"mali",
 "malte"=>"malte",
 "mariannes du nord, �les"=>"mariannes du nord, �les",
 "maroc"=>"maroc",
 "marshall, �les"=>"marshall, �les",
 "martinique"=>"martinique",
 "maurice"=>"maurice",
 "mauritanie"=>"mauritanie",
 "mayotte"=>"mayotte",
 "mexique"=>"mexique",
 "micron�sie, �tats f�d�r�s de"=>"micron�sie, �tats f�d�r�s de",
 "moldova"=>"moldova",
 "monaco"=>"monaco",
 "mongolie"=>"mongolie",
 "mont�n�gro"=>"mont�n�gro",
 "montserrat"=>"montserrat",
 "mozambique"=>"mozambique",
 "myanmar"=>"myanmar",
 "namibie"=>"namibie",
 "nauru"=>"nauru",
 "n�pal"=>"n�pal",
 "nicaragua"=>"nicaragua",
 "niger"=>"niger",
 "nig�ria"=>"nig�ria",
 "niu�"=>"niu�",
 "norfolk, �le"=>"norfolk, �le",
 "norv�ge"=>"norv�ge",
 "nouvelle-cal�donie"=>"nouvelle-cal�donie",
 "nouvelle-z�lande"=>"nouvelle-z�lande",
 "oc�an indien, territoire britannique de l'"=>"oc�an indien, territoire britannique de l'",
 "oman"=>"oman",
 "ouganda"=>"ouganda",
 "ouzb�kistan"=>"ouzb�kistan",
 "pakistan"=>"pakistan",
 "palaos"=>"palaos",
 "palestinien occup�, territoire"=>"palestinien occup�, territoire",
 "panama"=>"panama",
 "papouasie-nouvelle-guin�e"=>"papouasie-nouvelle-guin�e",
 "paraguay"=>"paraguay",
 "pays-bas"=>"pays-bas",
 "p�rou"=>"p�rou",
 "philippines"=>"philippines",
 "pitcairn"=>"pitcairn",
 "pologne"=>"pologne",
 "polyn�sie fran�aise"=>"polyn�sie fran�aise",
 "porto rico"=>"porto rico",
 "portugal"=>"portugal",
 "qatar"=>"qatar",
 "r�union"=>"r�union",
 "roumanie"=>"roumanie",
 "royaume-uni"=>"royaume-uni",
 "russie, f�d�ration de"=>"russie, f�d�ration de",
 "rwanda"=>"rwanda",
 "sahara occidental"=>"sahara occidental",
 "saint-barth�lemy"=>"saint-barth�lemy",
 "sainte-h�l�ne"=>"sainte-h�l�ne",
 "sainte-lucie"=>"sainte-lucie",
 "saint-kitts-et-nevis"=>"saint-kitts-et-nevis",
 "saint-marin"=>"saint-marin",
 "saint-martin"=>"saint-martin",
 "saint-pierre-et-miquelon"=>"saint-pierre-et-miquelon",
 "saint-si�ge (�tat de la cit� du vatican)"=>"saint-si�ge (�tat de la cit� du vatican)",
 "saint-vincent-et-les grenadines"=>"saint-vincent-et-les grenadines",
 "salomon, �les"=>"salomon, �les",
 "samoa"=>"samoa",
 "samoa am�ricaines"=>"samoa am�ricaines",
 "sao tom�-et-principe"=>"sao tom�-et-principe",
 "s�n�gal"=>"s�n�gal",
 "serbie"=>"serbie",
 "seychelles"=>"seychelles",
 "sierra leone"=>"sierra leone",
 "singapour"=>"singapour",
 "slovaquie"=>"slovaquie",
 "slov�nie"=>"slov�nie",
 "somalie"=>"somalie",
 "soudan"=>"soudan",
 "sri lanka"=>"sri lanka",
 "su�de"=>"su�de",
 "suisse"=>"suisse",
 "suriname"=>"suriname",
 "svalbard et �le jan mayen"=>"svalbard et �le jan mayen",
 "swaziland"=>"swaziland",
 "syrienne, r�publique arabe"=>"syrienne, r�publique arabe",
 "tadjikistan"=>"tadjikistan",
 "ta�wan, province de chine"=>"ta�wan, province de chine",
 "tanzanie, r�publique-unie de"=>"tanzanie, r�publique-unie de",
 "tchad"=>"tchad",
 "tch�que, r�publique"=>"tch�que, r�publique",
 "terres australes fran�aises"=>"terres australes fran�aises",
 "tha�lande"=>"tha�lande",
 "timor-leste"=>"timor-leste",
 "togo"=>"togo",
 "tokelau"=>"tokelau",
 "tonga"=>"tonga",
 "trinit�-et-tobago"=>"trinit�-et-tobago",
 "tunisie"=>"tunisie",
 "turkm�nistan"=>"turkm�nistan",
 "turks et ca�ques, �les"=>"turks et ca�ques, �les",
 "turquie"=>"turquie",
 "tuvalu"=>"tuvalu",
 "ukraine"=>"ukraine",
 "uruguay"=>"uruguay",
 "vanuatu"=>"vanuatu",
 "vatican, �tat de la cit� du"=>"vatican, �tat de la cit� du",
 "venezuela, r�publique bolivarienne du"=>"venezuela, r�publique bolivarienne du",
 "viet nam"=>"viet nam",
 "wallis et futuna"=>"wallis et futuna",
 "y�men"=>"y�men",
 "zambie"=>"zambie",
 "zimbabwe"=>"zimbabwe",
);
}

?>
