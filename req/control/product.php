<?php
/**
 * class product
 * controller for product operation
 */

namespace control;

use lib\request;
use model\base as base;

class product
{
    public static function get_products(){
        $data =  json_decode(file_get_contents('php://input'), true);
        return base::get_products($data['filter']);
    }
    public static function add_product(){
        return base::add_product();
    }
    public static function remove_product(){

    }
}