
import React from 'react';
import Lista from './ListaAvispas';

class Inicio extends React.Component {
	
	render(){

		return (
			[
				<div className="row">
					<section className="col-md-12">
						<article>
							<h2>Hola Mundo!</h2>
						</article>
					</section>
				</div>,

				<Lista/>
			]

		);
	}
}

export default Inicio;