<?php

namespace model;

use lib\dba as dba;

/**
 * standard checking
 */
final class base
{
    /**
     * @param $DB
     * @param $name
     * @param int $parent
     * @param $description
     * @param string $doctype
     * @param string $data
     * @return bool
     * add function
     */
    public static function add($DB, $name, $parent = 0, $description, $doctype = "", $data = "")
    {
        $additional_key = "";
        $additional_data="";
        if ($DB == DB_ELEMENT){
            $additional_key = ', `doctype`, `data`';
            $additional_data = ", '".$doctype."', '".$data."'";
        }
        $sql = "INSERT INTO  
            $DB  ( `parent_id`, `name`, `description`".$additional_key.") 
            VALUES ($parent, '$name', '$description'".$additional_data.")";
        return dba:: query($sql);
    }

    /**
     * @param $DB
     * @param $id
     * @param int $new_parent
     * @return bool
     * move function
     */
    public static function move($DB, $id, $new_parent = 0)
    {
        $sql = "UPDATE $DB SET `parent_id`=$new_parent, `update_time` = NOW() WHERE `id`=$id";
        return dba:: query($sql);
    }

    /**
     * @param $DB
     * @param $id
     * @param $name
     * @param $description
     * @param string $doctype
     * @param string $data
     * @return bool
     * edit function
     */
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

    /**
     * @param $DB
     * @param $id
     * @return bool
     * delete by id function
     */
    public static function delete_by_id($DB, $id)
    {
        $sql = "DELETE FROM  $DB WHERE `id`=$id";
        return dba:: query($sql);
    }

    /**
     * @param $DB
     * @param $id
     * @return mixed
     * if_exists function
     */
    public static function if_exists($DB, $id)
    {
        $sql = "SELECT * FROM  $DB WHERE `id`=$id";
        dba:: query($sql);
        return dba::fetch_assoc();
    }

    /**
     * @param $DB
     * @param $parent
     * @return bool
     * delete by parent function
     * need for recursive delete catalog and elements
     * NOT USED
     */
    public static function delete_by_parent($DB, $parent)
    {
        $sql = "DELETE FROM  $DB WHERE `parent_id`=$parent";
        return dba:: query($sql);
    }

    /**
     * @param $DB
     * @param $parent
     * @return array
     * function get_list
     */
    public static function get_list($DB, $parent)
    {
        $sql = "SELECT * FROM  $DB WHERE `parent_id`=$parent ORDER BY `name`";
        dba:: query($sql);
        return dba::fetch_assoc_all();
    }

    /**
     * @param $DB
     * @param $id
     * @return mixed
     * function get_item
     */
    public static function get_item($DB, $id)
    {
        $sql = "SELECT * FROM  $DB WHERE `id`=$id";
        dba:: query($sql);
        return dba::fetch_assoc();
    }
}