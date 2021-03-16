( function( $ ) {
	'use strict';

	const hasDuplicates = ( array, permitEmpty = true ) => {
		if( ! permitEmpty )
			array =  array.filter(function(el) { return el; });

		console.log(array);

		let all = [];
		for (let i = 0; i < array.length; ++i) {
			let value = array[i];
			if (all.indexOf(value) !== -1) {
	            return true;
	        }
	        all.push(value);
		}
		return false;
	}

	wp.customize( 'ri_home_top_setting', function( setting ) {
	    setting.bind( function( value ) {
	    	if( hasDuplicates( value.split(","), false ) ){
	    		setting.notifications.add( 'repeat_post', new wp.customize.Notification(
					'repeat_post',
					{
						dismiss: true,
				        type: 'warning',
				        message: 'No puedes repetir entradas'
				    }
				) );
	    	} else {
	    		setting.notifications.remove( 'repeat_post' );
	    	}
	    } );
	} );
} )( jQuery );

jQuery(document).ready(function ($) {
    "use strict";

    $('.sortable .repeater .repeater-input').select2({
		placeholder: 'Seleccionar una opción',
		dropdownCssClass: 'increasezindex'
	});

	$(document).on('select2:select', '.sortable .repeater-input', function (e) {
		let container = $(this);

		let selected = $('#ri_home_top_control').val();
			selected = selected.split(',');

		let select = e.params.data;

		getAllInputs( $(this).closest('.sortable_repeater_control') );

		if( selected.includes(select.id) ) {
			container.val('').trigger('change.select2');
			getAllInputs( $(this).closest('.sortable_repeater_control') );
		}
	});

    $(this).find('.sortable').sortable({
        update: function (event, ui) {
        	getAllInputs( $(this).closest('.sortable_repeater_control') );
        }
    });

    // Eliminamos un item
    $('.sortable').on('click', '.customize-control-sortable-repeater-delete', function (event) {
    	event.preventDefault();
    	let numItems = $(this).closest('.sortable_repeater_control').find('.repeater').length;
    	if (numItems > 1) {
            $(this).parent().remove();
    	} else {
    		$(this).parent().find('.repeater-input').val('');
    	}
    	getAllInputs( $(this).closest('.sortable_repeater_control') );
    });

    // Agregamos un un nuevo item
    $('.customize-control-sortable-repeater-add').click(function (event) {
    	event.preventDefault();
    	let numItems = $(this).prev('.sortable').find('.repeater').length;
    	let post = document.querySelector('.repeater.hide-template').cloneNode(true);

    	if (numItems < 10) {
    		post.classList.remove('hide-template');
    		document.querySelector('.sortable').appendChild(post);
    		$('.sortable .repeater:last-child .repeater-input').select2({
		    	placeholder: 'Seleccionar una opción',
		    	dropdownCssClass: 'increasezindex'
		    });

    	}

    	getAllInputs( $(this).closest('.sortable_repeater_control') );
    
    });

    function getAllInputs(element) {
    	let inputValues = element.find('.sortable .repeater-input').map(function () {
            return $(this).val();
        }).toArray();
        element.find('.customize-control-sortable-repeater').val(inputValues);
        element.find('.customize-control-sortable-repeater').trigger('change');
    }
});