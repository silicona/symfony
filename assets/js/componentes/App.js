
import React from 'react';
import {BrowserRouter, NavLink, Route, Switch} from 'react-router-dom';

import Saludo from './Saludo';
import ListaAvispas from './ListaAvispas';
import Inicio from './Inicio';
import OtraPagina from './OtraPagina';
import TickTack from './TickTack';

class App extends React.Component {

	contructor() {

		//super();

		this.state = {

			entradas: []
		};
	}

	componentDidMount(){

		console.log('Componente montado');
	}

	render() {
		/*
		return(
			<div>
				<Saludo />
				<ListaAvispas />
			</div>
		);
		*/
		return (

			<BrowserRouter>
				<div>
					<ul>
						<li><NavLink to="/react">Inicio</NavLink></li>
						<li><NavLink to="/otra-pagina">Otra página</NavLink></li>
						<li><NavLink to="/tick-tack">3 en raya</NavLink></li>
					</ul>
					<Switch>
						<Route path="/otra-pagina" component={OtraPagina}/>
						<Route path="/react" component={Inicio}/>
						<Route path="/tick-tack" component={TickTack}/>
					</Switch>
				</div>
			</BrowserRouter>

			<div id="errors" style="
			  background: #c00;
			  color: #fff;
			  display: none;
			  margin: -20px -20px 20px;
			  padding: 20px;
			  white-space: pre-wrap;
			"></div>

		);
	}
}

export default App;
