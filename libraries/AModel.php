<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author anirudh
 */
abstract class AModel {

    protected $db;

    function __construct() {
        $this->db = DBConnection::Connect();
    }

}

?>
