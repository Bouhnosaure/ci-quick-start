<?php

use Hybridauth\Provider\Facebook as FacebookProvider;
use Hybridauth\Provider\Google as GoogleProvider;
use Hybridauth\Provider\Twitter as TwitterProvider;

/**
 * Description of auth
 *
 * @author Alexandre Mangin
 */
class Social_auth extends CI_Controller {

    private $user_data = null;
    private $providers = null;

    public function __construct() {
        parent::__construct();
        $this->load->library(array('ion_auth'));
        $this->load->model(array('openid_model'));
        $this->providers = $this->config->item('providers');
    }

    public function login($provider) {

        try {
            switch ($provider) {
                case 'facebook':
                    $facebook = new FacebookProvider($this->providers['facebook']);
                    $facebook->authenticate();
                    $this->user_data = $facebook->getUserProfile();
                    $facebook->disconnect();
                    break;
                case 'twitter':
                    $twitter = new TwitterProvider($this->providers['twitter']);
                    $twitter->authenticate();
                    $this->user_data = $twitter->getUserProfile();
                    $twitter->disconnect();
                    break;
                case 'google':
                    $google = new GoogleProvider($this->providers['google']);
                    $google->authenticate();
                    $this->user_data = $google->getUserProfile();
                    $google->disconnect();
                    break;
                default:
                    show_404();
                    break;
            }

            //has account
            if ($user = $this->openid_model->get_by_openid($this->user_data->identifier)) {
                if (!$this->ion_auth->logged_in()) { //not logged
                    $this->ion_auth->login_social($user->user_id);
                }
                //logged
                redirect('user');
            } else {
                //No account
                if (!$this->ion_auth->logged_in()) {//not logged
                    $this->session->set_userdata('connect_create', array('provider' => $provider, 'identifier' => $this->user_data->identifier));
                    redirect('register/social');
                } else {//logged -> link
                    $this->openid_model->insert($this->user_data->identifier, $provider, $this->session->userdata('user_id'));
                    redirect('user');
                }
            }

            $this->_render_page('layouts/auth/profile_info', array('user' => $this->user_data));
        } catch (Hybridauth\Exception\HttpClientFailureException $e) {
            show_error('Curl text error message : <pre>' . $e . '</pre>');
        } catch (Hybridauth\Exception\HttpRequestFailedException $e) {
            show_error('Raw API Response: <pre>' . $e . '</pre>');
        } catch (Exception $e) {
            show_error("Ooophs, we ran into an issue! <pre>" . $e->getMessage() . "</pre>");
        }
    }

    function unlink_account($open_id) {
        
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        }
        
        $user = $this->ion_auth->user()->row();
        $openid_user = $this->openid_model->get_by_openid($open_id);
        
        if($openid_user->user_id == $user->id){
            
            $this->openid_model->delete($open_id);
            $this->session->set_flashdata('message', 'Unlink is successful');
            
            redirect('user');
            
        }else{
            
            $this->session->set_flashdata('message', 'Error during the unlink');
            
            redirect('user');
        }
        
        $this->session->set_flashdata('message', 'Error during the unlink');
    }

    function _render_page($view, $data = nul) {
        $this->viewdata = (empty($data)) ? $this->data : $data;

        $this->twig->display($view . TWIG_EXT, $this->viewdata);
    }

}
