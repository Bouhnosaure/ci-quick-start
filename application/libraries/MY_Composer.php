<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Composer
 *
 * @author Alexandre Mangin
 */
class MY_Composer {

    function __construct() {
        if (ENVIRONMENT != 'testing') {
            include("./vendor/autoload.php");
        } else {
            include("../vendor/autoload.php");
        }
    }

}
