
import React, {Component} from 'react';
import Saludo from './Saludo';

class App extends Component {
// class App extends React.Component {

	contructor() {

		//super();

		this.state = {

			entradas: []
		};
	}

	componentDidMount(){

		console.log('Componente montado');

		//fetch('/avispas/avispas_json').then( response => response)
	}

	render() {

		return(
			<div className="row">
				<Saludo />
				
			</div>
		);
	}


}

export default App;
