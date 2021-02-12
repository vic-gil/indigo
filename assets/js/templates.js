"use strict";

class Templates {

	constructor( post ) {
		this.author  	= post.author;
		this.category 	= post.category;
		this.excerpt 	= post.excerpt;
		this.local 		= post.local;
		this.tema 		= post.tema;
		this.title 	 	= post.title;
	}

	/**
	 * Componente general con query strings
	 *
	**/
	componentGeneral () {
		let componentLocal = '';
		let componentCategory = '';
		


		if( false !== local )
			componentLocal = componentCategory(local);

		if( false !== local )
			componentCategory = componentCategory(local);
		

		return `
			<div class="component-general">
				<article itemtype="http://schema.org/Article">
					${componentLocal}
				</article>
			</div>
		`;
	}

	/**
	 * Subcomponente categoría con query strings
	 *
	**/
	
	componentCategory (data) {
		return `
			<div class="entry-local">
				<h3>
					<a href="${data.link}" title="Ir a entradas de ${data.title}">
						${data.title}
					</a>
				</h3>
			</div>
		`;
	}

	/**
	 * Subcomponente local con query strings
	 *
	**/

	componentLocal (data) {
		return `
			<div class="entry-local">
				<h3>
					<a href="${data.link}" title="Ir a entradas de ${data.title}">
						${data.title}
					</a>
				</h3>
			</div>
		`;
	}
}