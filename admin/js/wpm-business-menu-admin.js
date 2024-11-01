(function( $ ) {
	'use strict';
	
	//Add new set of menu item
	function addMenuItem( $item = 0 ){
		if( $item === 0 ){
			$( '#wpm-business-menu-item-clone' ).children( '.wpm-business-menu-item' ).clone( true, true ).appendTo( '#wpm-business-menu-container' );			
		} else{
			$( '#wpm-business-menu-item-clone' ).children( '.wpm-business-menu-item' ).clone( true, true ).insertAfter( $item );
		}
		reindexMenuItem();
	}
	
	//Reindex all menu items
	function reindexMenuItem(){
		var $menu_items = $( '#wpm-business-menu-container' ).children( '.wpm-business-menu-item' );
		$menu_items.each(function( index ){
			$( this ).find( '.wpmb-item-title' ).attr( 'name', 'wpm-business-menu-item[' + index + '][title]');
			$( this ).find( '.wpmb-item-price' ).attr( 'name', 'wpm-business-menu-item[' + index + '][price]');
			$( this ).find( '.wpmb-item-desc' ).attr( 'name', 'wpm-business-menu-item[' + index + '][desc]');
		});
	}
	
	/*
	 * When the document is ready: initiate jQuery UI Sortable, shortcode select
	 */
	$( document ).ready( function(){
		
		//Initiate jQuery UI Sortable
		$( "#wpm-business-menu-container" ).sortable({
			placeholder: "ui-state-highlight",
			handle: ".wpmb-item-handle",
			stop: function(event, ui) {
        console.log("New position: " + ui.item.index());
				reindexMenuItem();
			}
		});
		$( "#wpm-business-menu-container" ).disableSelection();

		//Shortcode copy meta box
		$( '.wpm-business-menu-shortcode-select' ).on( 'click', function() {
			$( this ).select();
		});
	});
	
	$( document ).on( 'click', '#wpmb-add-menu-item', function( event ){
		addMenuItem();
	});
	$( document ).on( 'click', '.wpmb-item-add', function( event ){
		var $current_menu_item = $( this ).closest( '.wpm-business-menu-item' );
		addMenuItem( $current_menu_item );
	});
	$( document ).on( 'click', '.wpmb-item-remove', function( event ){
		$( this ).closest( '.wpm-business-menu-item' ).remove();
		reindexMenuItem();
	});
	
	

})( jQuery );
