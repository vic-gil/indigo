(function() {
	var survey = '';
	tinymce.PluginManager.add( 'encuestas', function( editor ){
		editor.addButton( 'encuestas', {
			title: 'Encuestas',
			image: active_theme_uri + '/assets/images/iconos/editor/survey.png',
			onclick: async function(){
				editor.windowManager.open({
					title: 'Selecciona una encuesta  ',
					body: [
						{
							type: 'listbox',
							name: 'survey',
							label: 'Encuesta',
							values: await wp.ajax.post('ri_surveys', {})
							.done( function( response ) {
								return response;
							})
							.fail( function(xfr){
								return [
									{
										text: 'No hay encuestas disponibles',
										value: ''
									}
								]
							})
						},
						{
							type: 'listbox',
							name: 'style',
							label: 'Estilo',
							values: [
								{
									text: 'El valor del voto 2021',
									value: 'survey-voto-2021'
								}
							]
						}
					],
					onsubmit: function(e){
						let tag = 'ri_survey';
						let postID = e.data.survey;
						let estilo = e.data.style;

						editor.insertContent(`[${tag} id="${postID}" style="${estilo}"]`);
					}
				})
			}
		});
	});
})();
