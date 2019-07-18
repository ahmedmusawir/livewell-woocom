<?php

$this->checkout_fields['billing']    = $woocommerce->countries->get_address_fields( $this->get_value('billing_country'), 'billing_' );
$this->checkout_fields['shipping']   = $woocommerce->countries->get_address_fields( $this->get_value('shipping_country'), 'shipping_' );
$this->checkout_fields['account']    = array(
    'account_username' => array(
        'type' => 'text',
        'label' => __('Account username', 'woocommerce'),
        'placeholder' => _x('Username', 'placeholder', 'woocommerce')
        ),
    'account_password' => array(
        'type' => 'password',
        'label' => __('Account password', 'woocommerce'),
        'placeholder' => _x('Password', 'placeholder', 'woocommerce'),
        'class' => array('form-row-first')
        ),
    'account_password-2' => array(
        'type' => 'password',
        'label' => __('Account password', 'woocommerce'),
        'placeholder' => _x('Password', 'placeholder', 'woocommerce'),
        'class' => array('form-row-last'),
        'label_class' => array('hidden')
        )
    );
$this->checkout_fields['order']  = array(
    'order_comments' => array(
        'type' => 'textarea',
        'class' => array('notes'),
        'label' => __('Order Notes', 'woocommerce'),
        'placeholder' => _x('Notes about your order, e.g. special notes for delivery.', 'placeholder', 'woocommerce')
        )
    );




$this->checkout_fields = apply_filters('woocommerce_checkout_fields', $this->checkout_fields);


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
     return $fields;
}


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
     $fields['order']['order_comments']['label'] = 'My new label';
     return $fields;
}


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);

     return $fields;
}
















    