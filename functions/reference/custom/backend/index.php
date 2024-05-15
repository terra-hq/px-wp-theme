<?php 

// Removes YOAST Information from the Custom Post Types
// Preguntaria  Maria si deberiamos quitarlo para todos los proeyctos por defecto
function my_manage_columns( $columns ) {
    unset( $columns['wpseo-score'] );
    unset( $columns['wpseo-title'] );
    unset( $columns['wpseo-metadesc'] );
    unset( $columns['wpseo-focuskw'] );
    unset( $columns['wpseo-score-readability'] );
    unset( $columns['wpseo-links'] );
    unset( $columns['wpseo-linked'] );
    return $columns;
  }
  
  function my_column_init() {
    /* remove from posts */
    add_filter ( 'manage_edit-post_columns', 'my_manage_columns' );
     /* remove from posts */
    add_filter ( 'manage_edit-page_columns', 'my_manage_columns' );
    add_filter ( 'manage_edit-team_member_columns', 'my_manage_columns' );
    add_filter ( 'manage_edit-insight_columns', 'my_manage_columns' );
    add_filter ( 'manage_edit-industry_columns', 'my_manage_columns' );
    add_filter ( 'manage_edit-transaction_columns', 'my_manage_columns' );
    add_filter ( 'manage_edit-lender', 'my_manage_columns' );
  }
  
  add_action( 'admin_init' , 'my_column_init' );

?>