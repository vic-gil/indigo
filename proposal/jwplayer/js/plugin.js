(function() {
    tinymce.PluginManager.add( 'jwplayer', function( editor ){
        editor.addButton( 'jwplayer', {
            title: 'jwplayer',
            image: active_theme_uri + '/assets/images/iconos/editor/jwplayer.png',
            onclick: async function(){
                editor.windowManager.open({
                    title: 'Inserta un video',
                    body: [
                        {
                            type: 'textbox',
                            name: 'script',
                            label: 'URL de video',
                        }
                    ],
                    size: 'large',
                    onsubmit: function(e){
                        let script = e.data.script;
                        let block = `<blockquote class="wp-block-embed is-type-video is-provider-jwplayer wp-block-embed-jwplayer wp-embed-aspect-16-9 wp-has-aspect-ratio"><script src="${script}"></script></blockquote>`;

                        if( script.match(/https:\/\/cdn.jwplayer.com\/players\/\S+-\S+.js/ ) ) {
                            editor.execCommand('mceInsertContent', false, block);
                        } else {
                            editor.windowManager.alert('La URL no corresponde con el formato de JWPlayer');
                        }

                    }
                })
            }
        });
    });
})();
