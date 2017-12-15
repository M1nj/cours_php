<form method="POST" name="wishlist" >
	<input type="number" min="0" name="wl_quantity" value="1" />
	<input type="hidden" name="wl_product" value="<?php echo $post->ID; ?>" />
	<input type="submit" value="<?php printf( __( 'add product') ); ?>" />
</form>

<?php
	// If user is logged in and has capability 'read'
	if( current_user_can( 'read' ) ) {
		// Create the wishlist array
		$_SESSION[ 'wishlist' ] = array();
	}
	
	// Check if a request for adding product ID to wishlist was made
	if( isset( $_REQUEST[ 'wl_product' ] ) && intval( $_REQUEST[ 'wl_product' ] ) ) {						
		// Add the product ID to the wishlist
		$_SESSION[ 'wishlist' ][ 'product_id' ] = intval( $_REQUEST[ 'wl_product' ] );
	}
	
	// Check if a request for adding product quantity to the wishlist was made
	if( !empty($_REQUEST[ 'wl_quantity' ] ) ) {
		//The wp_quantity value is set, so we want to increment the quantity in the session now
	// If there's already a value for quantity set in the session, append the new value - else replace it
		if( !empty($_SESSION[ 'wishlist' ][ 'product_quantity' ] ) ) :
			$_SESSION[ 'wishlist' ][ 'product_quantity' ] = $_SESSION[ 'wishlist' ][ 'product_quantity' ] + intval( $_REQUEST[ 'wl_quantity' ] );
		else : 
			$_SESSION[ 'wishlist' ][ 'product_quantity' ] = intval( $_REQUEST[ 'wl_quantity' ] );
		endif;
	}
?>