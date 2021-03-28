/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';
const $ = require("jquery");
global.$ = global.jQuery = $;
import "bootstrap";




require('@fortawesome/fontawesome-free/css/all.min.css');
require('animate.css')

$(document).ready(function () {
    $('[data-toggle="popover"]').popover();

});
$("#solidaire_alert").toggle(2000)

$("#solidaire_alert").delay(3000).slideUp(2000, function () {
    $(this).alert('close');
});
//fonction pour mettre les items du carrousel à la même hauteur
$('.carousel').each(function () {
    var items = $('.carousel-item', this);
    // reset the height
    items.css('min-height', 0);
    // set the height
    var maxHeight = Math.max.apply(null,
        items.map(function () {
            return $(this).outerHeight()
        }).get());
    items.css('min-height', maxHeight + 'px');
})

