
import React from 'react';
import {BrowserRouter, NavLink, Route, Switch} from 'react-router-dom';

import Saludo from './Saludo';
import ListaAvispas from './ListaAvispas';
import Inicio from './Inicio';
import OtraPagina from './OtraPagina';

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
						<NavLink to="/react">Inicio</NavLink>
						<NavLink to="/otra-pagina">Otra página</NavLink>
					</ul>
					<Switch>
						<Route path="/otra-pagina" component={OtraPagina}/>
						<Route path="/react" component={Inicio}/>
					</Switch>
				</div>
			</BrowserRouter>

		);
	}
}

export default App;
