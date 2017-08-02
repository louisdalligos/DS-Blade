$(function() {
	$( ".ds-blade-slider" ).slider();

	$( ".ds-blade-slider .ui-slider-handle").append('<div class="ds-blade-handle"><img src="img/ui-handle.png" alt="handle" /></div>');
});

function dateFormatter(date) {
    return date.toTimeString();
}

// Map
function init_map(){
    var gmMapDiv = $("#dealer-map");

    (function($){
               
        if (gmMapDiv.length) {
        
            var gmCenterAddress = gmMapDiv.attr("data-address");
            var gmMarkerAddress = gmMapDiv.attr("data-address");
            
            
            gmMapDiv.gmap3({
                action: "init",
                marker: {
                    address: gmMarkerAddress,
                    options: {
                        icon: "img/map-marker.png"
                    }
                },
                map: {
                    options: {
                        zoom: 16,
                        zoomControl: true,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.SMALL
                        },
                        mapTypeControl: false,
                        scaleControl: false,
                        scrollwheel: false,
                        streetViewControl: false,
                        draggable: true,
                        styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#a6a6a0"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#f5f5f5"}]}]
                    }
                }
            });
        }
    })(jQuery);
}

// Slider range on search form
function range_slider() {
    $('#price-range').slider({
        max: 30000,
        min: 1000,
        range: true,
        step: 500,
        values: [4500, 26000],
        slide: function(event, ui) {
            $("#amount-min").val("$" + ui.values[0]);
            $("#amount-max").val("$" + ui.values[1]);
        }
    });
    $("#amount-min").val("$" + $("#price-range").slider("values", 0));
    $("#amount-max").val("$" + $("#price-range").slider("values", 1));
    $('#year-range').slider({
        max: 2016,
        min: 1970,
        range: true,
        step: 1,
        values: [1982, 1999],
        slide: function(event, ui) {
            $("#year-min").val(ui.values[0]);
            $("#year-max").val(ui.values[1]);
        }
    });
    $("#year-min").val($("#year-range").slider("values", 0));
    $("#year-max").val($("#year-range").slider("values", 1));
}


$(document).ready(function() {
    range_slider();
	init_map();	

    $('.slide-navigation').on('click', 'li', function() {
        $('.slide-navigation li.active').removeClass('active');
        $(this).addClass('active');
    });
}); 