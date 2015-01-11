<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CITest
 *
 * @author Alexandre
 */
class CITest extends PHPUnit_Framework_TestCase {

    private $CI;

    public function setUp() {
        // Load CI instance normally
        $this->CI = &get_instance();
    }

    public function testGetPost() {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_GET['foo'] = 'bar';
        $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }

}
