/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

require('bootstrap');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


$('#jquery').html('Dentro');

$(function(){

	$('.boton_ajax').click(function(e){

		boton = e.currentTarget;
		id = $(boton).attr('data-id');
		campo = $('#respuesta');

		$.ajax({
			type: 'POST',
			url: '/ajax/recibir',
			dataType: 'json',
			data: {
				hash: 'hash',
				id: id
			},
			success: function(res){

				obj_res = $.parseJSON(res);

				if( obj_res.status == 'ok' ){

					campo.html(obj_res.mensaje.nombre);

				} else {

					campo.html(obj_res.error);
				}
			},
			fail: function(res){

				campo.html(res);
			},
			complete: function(res){

				console.log(res);
				campo.append('<p>Ajax terminado!!</p>');
			}
		})
	});
});