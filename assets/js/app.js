/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');
//require('./extra.js');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

require('bootstrap');

import React from 'react';
import ReactDOM from 'react-dom';
import App from './componentes/App';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


$('#jquery').html('Dentro');

function enviar_ajax(id, campo){

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
}

$(function(){

	$('.boton_ajax').click(function(e){

		boton = e.currentTarget;
		id = $(boton).attr('data-id');
		campo = $('#respuesta');

		enviar_ajax(id, campo);
	});
	
});


var ventana = window.location.href;

if( ventana.indexOf('react') != -1 ){

	ReactDOM.render(<App />, document.getElementById('root'));
}
