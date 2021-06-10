add_filter( 'woocommerce_loop_add_to_cart_link', 'codeithub_quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );

function codeithub_quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( is_user_logged_in() && is_shop() || is_product_category() && $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}
