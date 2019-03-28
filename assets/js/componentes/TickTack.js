
import React, { Component } from 'react';

	/*
class Cuadrado extends Component {

	constructor(props){

		super(props);
		this.state = {
			valor: null,
		};
	}
	
	render(){

		return(

			<button 
				className = "cuadrado" 
				onClick = { () => this.props.onClick() }
			>
				{this.props.valor}
			</button>
		);
	}
}
	*/

function Cuadrado(props){

	return(
		<button className = "cuadrado" onClick = { props.onClick }>
			{ props.valor }
		</button>
	);
}

function calcularGanador(cuadrados){

	const lineas = [
		[0, 1, 2],
		[3, 4, 5],
		[6, 7, 8],
		[0, 3, 6],
		[1, 4, 7],
		[2, 5, 8],
		[0, 4, 8],
		[2, 4, 6],
	];

	for( let i = 0; i < lineas.length; i++){

		const [a, b, c] = lineas[i];

		if( cuadrados[a] && cuadrados[a] === cuadrados[b] && cuadrados[a] === cuadrados[c] ){

			return cuadrados[a];
		}
	}

	return null;
}

class Tablero extends Component {

	renderCuadrado(i){

		return (
			<Cuadrado 
				valor = { this.props.cuadrados[i] }
				onClick = { () => this.props.onClick(i) }
			/>
		);
	}

	render(){

		return(

			[
			<div>Desde <a href="https://reactjs.org/tutorial/tutorial.html" target="_blank">Este tutorial</a></div>
			,
			<div className="interior">
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
			]
		);
	}	
}

class Juego extends Component {
	
	constructor(props){

		super(props);
		this.state = {
			historial: [{
				cuadrados: Array(9).fill(null),
			}],
			paso: 0,
			xIsNext: true,
		}
	}

	irA(movimiento){

		this.setState({
			paso: movimiento,
			xIsNext: (movimiento % 2) === 0,
		})
	}

	handleClick(i){

		const historial = this.state.historial.slice(0, this.state.paso + 1 );
		const actual = historial[historial.length -1];
		const cuadrados = actual.cuadrados.slice();

		if( calcularGanador(cuadrados) || cuadrados[i] ){

			return;
		}
		
		cuadrados[i] = this.state.xIsNext ? 'X' : 'O';
		this.setState({
			historial: historial.concat([{
				cuadrados: cuadrados,
			}]),
			paso: historial.length,
			xIsNext: !this.state.xIsNext,
		})
	}

	render(){

		const historial = this.state.historial;
		const actual = historial[this.state.paso];
		const ganador = calcularGanador(actual.cuadrados);

		const movimientos = historial.map( (paso, movimiento) => {
			const texto = movimiento ?
				'Ir al movimiento #' + movimiento : 'Ir al inicio del juego';
			return(
				<li key={movimiento}>
					<button onClick = { () => this.irA(movimiento) }>{texto}</button>
				</li>
			);
		});

		let estado;

		if( ganador ){

			estado = 'Ganador: ' + ganador;

		} else {
			
			estado = 'Turno: ' + (this.state.xIsNext ? 'X' : 'O');
		}

		return(

			<div className="juego">

				<div className="tablero">

					<Tablero
						cuadrados = {actual.cuadrados}
						onClick = { i => this.handleClick(i) }
					/>

				</div>

				<div className="info">

					<div>{ estado }</div>

					<ol>{ movimientos }</ol>

				</div>

			</div>
		);
	}
}

export default Juego;