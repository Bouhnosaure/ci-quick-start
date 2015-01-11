<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Openid_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get account openid
     *
     * @access public
     * @param string $user_id
     * @return object account openid
     */
    function get_by_user_id($user_id) {
        return $this->db->get_where('user_openid', array('user_id' => $user_id))->result();
    }

    // --------------------------------------------------------------------

    /**
     * Get account openid
     *
     * @access public
     * @param string $openid
     * @return object account openid
     */
    function get_by_openid($openid) {
        return $this->db->get_where('user_openid', array('openid' => $openid))->row();
    }

    // --------------------------------------------------------------------

    /**
     * Insert account openid
     *
     * @access public
     * @param string $openid
     * @param int    $user_id
     * @return void
     */
    function insert($openid, $provider, $user_id) {
        $this->load->helper('date');

        if (!$this->get_by_openid($openid)) { // ignore insert
            $this->db->insert('user_openid', array('openid' => $openid, 'provider' => $provider, 'user_id' => $user_id, 'linked_on' => time()));
            return TRUE;
        }
        return FALSE;
    }

    // --------------------------------------------------------------------

    /**
     * Delete account openid
     *
     * @access public
     * @param string $openid
     * @return void
     */
    function delete($openid) {
        $this->db->delete('user_openid', array('openid' => $openid));
    }

}

/* End of file account_openid_model.php */
/* Location: ./application/account/models/account_openid_model.php */