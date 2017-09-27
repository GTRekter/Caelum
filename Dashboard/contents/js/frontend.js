/*!
 * Login Page 
 * Author: Andrea Giada Bassani & Ivan Porta
 */


/* ==== VARIABLES ==== */
self.Urls = {
    Dogs: {
        getAllDogs: baseUrl + "DogController/GetAllDogs",
    },
};

/* ===== ELEMENTS ===== */
$aboutSection = $("#about");
$contactSection = $("#contact");
$homepageHeaderSection = $("#homepage-header");
$homepageSection = $("#homepage");
$breedingHeaderSection = $("#breeding-header");
$breedingSection = $("#breeding");
$retireHeaderSection = $("#retire-header");
$retireSection = $("#retire");




$(document).ready(function (e) {  

    // Initialize WOW
    new WOW().init();

    // Initialize Isotope
    // init Isotope
    var $grid = $('.isotope-grid').isotope({
        itemSelector: '.element-item',
        layoutMode: 'fitRows'
    });
    // filter functions
    var filterFns = {
        // show if number is greater than 50
        numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
        },
        // show if name ends with -ium
        ium: function() {
            var name = $(this).find('.name').text();
            return name.match( /ium$/ );
        }
    };
    // bind filter button click
    $('.filters-button-group').on( 'click', 'button', function() {
        var filterValue = $( this ).attr('data-filter');
        // use filterFn if matches value
        filterValue = filterFns[ filterValue ] || filterValue;
        $grid.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
        var $buttonGroup = $( buttonGroup );
        $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
        });
    });


    setVisibilities("homepage");
  
});

/* ===== EVENTS ===== */
$("#mainNav [data-element-link='homepage']").click(function(){
    setVisibilities("homepage");
});
$("#mainNav [data-element-link='about']").click(function(){
    setVisibilities("about");
});
$("#mainNav [data-element-link='contact']").click(function(){
    setVisibilities("contact");
});
$("#mainNav [data-element-link='breeding']").click(function(){
    setVisibilities("breeding");
});
$("#mainNav [data-element-link='retire']").click(function(){
    setVisibilities("retire");
});

/* ===== FUNCTIONS ===== */
function setVisibilities(sectionToShow) {
    $aboutSection.hide();
    $contactSection.hide();
    $homepageHeaderSection.hide();
    $homepageSection.hide();
    $breedingHeaderSection.hide();
    $breedingSection.hide();
    $retireHeaderSection.hide();
    $retireSection.hide();

    switch(sectionToShow) {
        case "homepage": 
            $homepageHeaderSection.show();
            $homepageSection.show();
            break;
        case "contact": 
            $contactSection.show();
            break;
        case "about": 
            $aboutSection.show();
            break;
        case "breeding": 
            $breedingHeaderSection.show();
            $breedingSection.show();
            break;
        case "retire": 
            $retireHeaderSection.show();
            $retireSection.show();
            break;
    }
}

function getAllDogs() {
    $.ajax({
        type: "POST",
        dataType: 'json',
        cache: false,
        data: ajaxData,
        url: self.Urls.Dogs.getAllDogs,
        success: function(viewModel) {
            if(viewModel.execution) {
                // viewModel.dogs.forEach(function(dog) {
                //     var dogToAdd = new Dog(dog);
                //     self.Dogs.push(dogToAdd);
                // }, this);
                
                // TODO: Gestire i cani
            } else {
                // TODO: Handle error
            }
        }
    });
}