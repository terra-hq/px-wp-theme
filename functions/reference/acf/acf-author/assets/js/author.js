
/**
 * Included when FIELD_NAME fields are rendered for editing by publishers.
 */
 ( function( $ ) {
	function initialize_field( $field ) {
		$.each($($field.find(".js--author").find("select")),function(){
			$(this).on('change', function() {
				$field.find("input").val(this.value);
			});
			if($field.find("input").val()){
				$(this).val($field.find("input").val()); 
			}else{
				$(this).val("-")
			}
		})
	}

	if( typeof acf.add_action !== 'undefined' ) {
		/**
		 * Run initialize_field when existing fields of this type load,
		 * or when new fields are appended via repeaters or similar.
		 */

		acf.add_action( 'ready_field/type=author', initialize_field );
		acf.add_action( 'append_field/type=author', initialize_field );
	}
} )( jQuery );
