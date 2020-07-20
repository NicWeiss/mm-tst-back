<?php

namespace model;

use lib\dba as dba;

/**
 * standard checking
 */
final class base
{
    /**
     * @return bool
     */
    public static function add_product()
    {
        $DB = DB_PRODUCTS;
        $sql = "INSERT INTO  $DB (`name`) VALUES ('Новый товар') ";
        return dba:: query($sql);
    }


    public static function edit_product($id, $field, $value)
    {
        $DB = DB_PRODUCTS;
        $sql = "UPDATE $DB SET `$field`= '$value'  WHERE `id`=$id";
        return dba:: query($sql);
    }

    /**
     * @param $id
     * @return bool
     */
    public static function remove_product($id)
    {
        $DB = DB_PRODUCTS;
        $sql = "DELETE FROM  $DB WHERE `id`=$id";
        return dba:: query($sql);
    }


    /**
     * @param $filter
     * @return array
     */
    public static function get_products($filter)
    {
        $DB = DB_PRODUCTS;
        $add = "";
        if ( strlen($filter)>0 ) $add = " where `name` like '%" . $filter . "%'";
        $sql = "SELECT * FROM  $DB " . $add;
        dba:: query($sql);
        return dba::fetch_assoc_all();
    }

}