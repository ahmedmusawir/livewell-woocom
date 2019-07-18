<?php
/**
 *
 * WOOCOM FUCTIONS FOR CYFI
 *
 */

/**
 *
 * Removing All Labels from Checkout Page
 *
 */

// WooCommerce Checkout Fields Hook
// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields

function custom_wc_checkout_fields_no_label($fields) {
    // loop by category
    foreach ($fields as $category => $value) {
        // loop by fields
        foreach ($fields[$category] as $field => $property) {
            // remove label property
            unset($fields[$category][$field]['label']);
        }
    }
     return $fields;
}

add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');

/**
 *
 * Adding Placeholder Text to All
 *
 */

function wpt_custom_billing_fields ( $fields = array() ) {

	// echo '<pre>';
	// var_export( $fields );
	// echo '</pre>';
    
     $fields['billing_first_name']['placeholder'] = 'First Name';
     // $fields['billing_first_name']['label'] = 'My new label';	
     $fields['billing_last_name']['placeholder'] = 'Last Name';
     $fields['billing_company']['placeholder'] = 'Company Name';
     unset($fields['billing_company']);
     $fields['billing_address_1']['placeholder'] = 'Address 1'; // DOESN'T WORK
     $fields['billing_address_2']['placeholder'] = 'Address 2'; // DOESN'T WORK
     unset($fields['billing_address_2']);
     $fields['billing_city']['placeholder'] = 'City';
     $fields['billing_postcode']['placeholder'] = 'Zip Code';
     $fields['billing_country']['placeholder'] = 'Country';
     // unset($fields['billing_country']);
     $fields['billing_state']['placeholder'] = 'State';
     $fields['billing_email']['placeholder'] = 'Email';
     $fields['billing_phone']['placeholder'] = 'Phone (Optional)';
     $fields['billing_phone']['required'] = false;
               
	return $fields;
}

add_filter('woocommerce_billing_fields','wpt_custom_billing_fields');

/**
 *
 * Redirect to Custom Thank You Page
 *
 */

function woo_custom_redirect_after_purchase() {
    global $wp;
    if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) ) {
        wp_redirect( '/thank-you/' );
        exit;
    }
}

add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );



/**
 *
 * ADD PRODUCT TO CART AUTOMAGICALLY
 *
 */
/**
 * Add items to cart on loading checkout page.
 */
// function auto_add_to_cart() {
//     if ( ! is_page( 'checkout' ) ) {
//         return;
//     }

//     // if ( ! WC()->cart->is_empty() ) {
//     //     return;
//     // }

//     WC()->cart->add_to_cart( 5680, 1 );
//     // WC()->cart->add_to_cart( 22, 2 );
// }

// add_action( 'wp', 'auto_add_to_cart' );



/**
 *
 * CHANGE CHECKOUT PAGE ORDER BUTTON TEXT
 *
 */

add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
    return __( 'MOOSE IS LOOSE', 'woocommerce' ); 
}


/**
 *
 * REMOVE RECURRING TOTALS FROM SUBSCRIPTION CHECKOUT
 *
 */

add_filter( 'woocommerce_cart_calculate_fees', 'add_recurring_postage_fees', 10, 1 );

function add_recurring_postage_fees( $cart ) {
    if ( ! empty( $cart->recurring_cart_key ) ) {
        remove_action( 'woocommerce_cart_totals_after_order_total', array( 'WC_Subscriptions_Cart', 'display_recurring_totals' ), 10 );
        remove_action( 'woocommerce_review_order_after_order_total', array( 'WC_Subscriptions_Cart', 'display_recurring_totals' ), 10 );
    }
}


/**
 *
 * REMOVE COUPON FROM CHECKOUT PAGE
 *
 */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 


/**
 *
 * CHANGE DEFAULT COUNTRY AND STATE CODE
 *
 */

/**
 * Change the default state and country on the checkout page
 */
add_filter( 'default_checkout_billing_country', 'change_default_checkout_country' );
// add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );

function change_default_checkout_country() {
  return 'US'; // country code
}

// function change_default_checkout_state() {
//   return 'GA'; // state code
// }

/**
 *
 * CART DISCOUNT FUNCTION
 *
 */


/**
 * WooCom Discount Function
 */

function discount_based_on_product( $cart ) {

   $product_id = get_field('woocom_product_id', 'option');


   $product_cart_id = WC()->cart->generate_cart_id( $product_id );
   $in_cart = WC()->cart->find_product_in_cart( $product_cart_id );
 
   if ( $in_cart ) {
        // Collecting Product ID from ACF
        $discount_percent = get_field('woocom_order_bump_discount', 'option');

        // Cart Total
        $total = $cart->cart_contents_total;
        // Discount Calculation 
        $discount = $total * $discount_percent * 0.01;
        // Add the discount 

        $cart->add_fee(__( $discount_percent . '% Discount', 'woocommerce'), -$discount );  

   }
}

add_action('woocommerce_cart_calculate_fees', 'discount_based_on_product', 10, 1);



/**
 *
 * PRICE DISPLAY CHANGE
 *
 */

// only copy opening php tag if needed
// Adds "per package" after each product price throughout the shop
function sv_change_product_price_display( $price, $cart_item, $cart_item_key ) {

   $product_id = get_field('woocom_product_id', 'option');

   // echo $product_id;
   // echo $cart_item['product_id'];

   if ( $product_id == $cart_item['product_id'] ) {

     $price = '$0.00';

   }

   return $price;
}
// add_filter( 'woocommerce_get_price_html', 'sv_change_product_price_display', 10, 3 );
// add_filter( 'woocommerce_cart_item_price', 'sv_change_product_price_display', 10, 3 );
add_filter( 'woocommerce_cart_item_subtotal', 'sv_change_product_price_display', 10, 3 );


//======================================================================

/**
 *
 * RESTRICTING CART TO 2 ITEMS TOTAL ONLY
 *
 */
// Checking and validating when products are added to cart

function only_two_items_allowed_add_to_cart( $passed, $product_id, $quantity ) {

    $cart_items_count = WC()->cart->get_cart_contents_count();
    $total_count = $cart_items_count + $quantity;

    if( $cart_items_count >= 1 || $total_count > 1 ){
        // Set to false
        $passed = false;
        // Display a message
         // wc_add_notice( __( "You can’t have more than 2 items in cart", "woocommerce" ), "error" );
    }
    return $passed;
}

add_filter( 'woocommerce_add_to_cart_validation', 'only_two_items_allowed_add_to_cart', 10, 3 );













