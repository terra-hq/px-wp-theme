
/**
 * Included when FIELD_NAME fields are rendered for editing by publishers.
 */
 ( function( $ ) {
	function initialize_field( $field ) {
		/**
		 * $field is a jQuery object wrapping field elements in the editor.
		 */
		$.each($($field.find(".js--position").find("button")),function(){
			if($field.find("input").val()){
				$.each($($field.find(".js--position").find("button")),function(){
					if($(this).val() == $field.find("input").val()){
						$(this).addClass('active')
					}else{
						$(this).addClass('no-active')
					}
				});
			}
			$(this).on("click", (e) => {
				e.preventDefault();
				var buttonValue = $(this).val();
				$field.find("input").val(buttonValue)
				
				$.each($($field.find(".js--position").find("button")),function(){
					$(this).removeClass('active')
					$(this).addClass('no-active')
				});
				$(this).addClass('active')
				$(this).removeClass('no-active')
			});
		});

	}

	if( typeof acf.add_action !== 'undefined' ) {
		/**
		 * Run initialize_field when existing fields of this type load,
		 * or when new fields are appended via repeaters or similar.
		 */

		acf.add_action( 'ready_field/type=position', initialize_field );
		acf.add_action( 'append_field/type=position', initialize_field );
	}
} )( jQuery );
