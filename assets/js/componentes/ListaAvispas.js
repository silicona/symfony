
import React, {Component} from 'react';

class ListaAvispas extends Component {

	constructor(){
		super();

		this.state = {

			entradas: [],
			hasError: false
		}
	}

	componentDidMount(){

		fetch('/avispas/avispas_json')
			.then(response => response.json())
			.then(entradas => {
				console.log(entradas);
				this.setState({
					entradas
				});
			});
			
	}

	static getDerivedStateFromError(error){

		return { hasError: true };
	}

	componentDidCatch(error, info){

		console.log(error, info);
	}

	render(){

		return(
			<section className="row">
				<article className="col-md-12">
					{ this.state.entradas.map(
						({ id, nombre, otro }) => (
							<div key={id} data-id={id} className="card avispa" style={{ padding: 200 }}>
								<div className="card-body">
									<h3 className="card-title">{nombre}</h3>
									<p className="card-text">{otro}</p>
								</div>
							</div>
						)
					)}
				</article>
			</section>
		);
	}

}

export default ListaAvispas;