
import React, { Component } from 'react';

class Cuadrado extends Component {
	
	render(){

		return(

			<button className="cuadrado">
				{}
			</button>
		);
	}
}

class Tablero extends Component {

	renderCuadrado(i){

		return <Cuadrado />;
	}

	render(){

		const estado = 'Próximo jugador: X';

		return(

			<div>Desde <a href="https://reactjs.org/tutorial/tutorial.html" target="_blank">Este tutorial</a></div>

			<div>
				<div className="estado">{ estado }</div>
				<div className="fila">
					{ this.renderCuadrado(0) }
					{ this.renderCuadrado(1) }
					{ this.renderCuadrado(2) }
				</div>
				<div className="fila">
					{ this.renderCuadrado(3) }
					{ this.renderCuadrado(4) }
					{ this.renderCuadrado(5) }
				</div>
				<div className="fila">
					{ this.renderCuadrado(6) }
					{ this.renderCuadrado(7) }
					{ this.renderCuadrado(8) }
				</div>
			</div>
		);
	}	
}

class Juego extends Component {

	render(){

		return(

			<div className="juego">

				<div className="tablero">

					<Tablero />

				</div>

				<div className="info">

					<div>{/* estado */}</div>

					<ol>{ }</ol>

				</div>

			</div>
		);
	}
}

export default Juego;