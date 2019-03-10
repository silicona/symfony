
import React from 'react';

import Saludo from './Saludo';
import ListaAvispas from './ListaAvispas';

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

		return(
			<div>
				<Saludo />
				<ListaAvispas />
			</div>
		);
	}


}

export default App;
