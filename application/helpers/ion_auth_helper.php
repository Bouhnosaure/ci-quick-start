<?php

function is_admin(){
    $ci =& get_instance();
    return $ci->ion_auth->is_admin();
}

function is_logged(){
    $ci =& get_instance();
    return $ci->ion_auth->logged_in();
}

