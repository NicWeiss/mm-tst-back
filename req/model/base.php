<?php

namespace model;

use lib\dba as dba;

/**
 * standard checking
 */
final class base
{
    public static function add_product()
    {
        $DB = DB_PRODUCTS;
        $sql = "INSERT INTO  $DB (`name`) VALUES ('Новый товар') ";
        return dba:: query($sql);
    }


    public static function edit($DB, $id, $name, $description, $doctype = "", $data = "")
    {
        $additional_sql = "";
        if ($DB == DB_ELEMENT){
            $additional_sql = ", `doctype`= '$doctype',`data`= '$data'";
        }
        $sql = "UPDATE $DB SET 
            `name`= '$name', `description`= '$description',  `update_time` = NOW() $additional_sql 
            WHERE `id`=$id";
        return dba:: query($sql);
    }


    public static function delete_by_id($DB, $id)
    {
        $sql = "DELETE FROM  $DB WHERE `id`=$id";
        return dba:: query($sql);
    }



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