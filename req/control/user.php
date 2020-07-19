<?php
/**
 * class user
 * controller for users
 */

namespace control;

use lib\request;
use model\base as base;

class user
{
    public static function login(){
        $data =  json_decode(file_get_contents('php://input'), true);
        $ansver = ($data['password'] === "motmom") ? 200 : 403;
        $obj = array('status' => $ansver);
        return $obj;
    }
}