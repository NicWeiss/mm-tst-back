<?php
/**
 * ROUTE LIST
 */

dispatcher :: add('api/login', array(
    'control_class' => 'control\user',
    'control_function' => 'login'
));

dispatcher :: add('api/get_products', array(
    'control_class' => 'control\product',
    'control_function' => 'get_products'
));

dispatcher :: add('api/add_product', array(
    'control_class' => 'control\product',
    'control_function' => 'add_product'
));

dispatcher :: add('api/remove_product', array(
    'control_class' => 'control\product',
    'control_function' => 'remove_product'
));