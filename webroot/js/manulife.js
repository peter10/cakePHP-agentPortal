$(function(){
// add some form elements to allow the user to adjust the airport select options
$('select#ManulifePlanDepartureAirport').parent().append('<label>name <input type="radio" name="airport_order" value="name" /></label> <label>city <input type="radio" name="airport_order" value="city" /></label>').append('<label>Country <select id="airport_country"></select></label>');

// load the list of countries and link onchange to airport code select
$('select#airport_country').load("/airport_ajax/countries")

$('select#airport_country').change(get_airports);
$('input:radio[name=airport_order]').click(get_airports);

function get_airports(e){
  $('select#ManulifePlanDepartureAirport').load("/airport_ajax/index/" + escape($('select#airport_country').val()) + '/' + $('input:radio[name=airport_order]:checked').val() );
$('input:radio[name=airport_order]:checked').val();
}

});