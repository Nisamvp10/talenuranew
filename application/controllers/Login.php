<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('common');
       
    }

    function loginCheck(){
        if(!$this->session->has_userdata('logged_in') ){
            redirect('login');
        }else{
            redirect('home');
        }
    }

    function index(){
       $this->load->view('front/login');
    }
    public function submit() {
        // Get the POST data
        $identifier = $this->input->post('username'); // Can be email or contact number
        $password = $this->input->post('password');

        // Load the user model
        $user = $this->common->get_user_by_email_or_contact($identifier); // Custom function to retrieve user

        // If user exists
        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set user session data
                $this->session->set_userdata([
                    'user_id'   => $user['id'],
                    'username'  => $user['email'], // Assuming it's the email field
                    'name'      => $user['first_name'],
                    'profilepic' => $user['profile'],
                    'logged_in' => true,
                ]);

                // Return JSON response with success
                echo json_encode([
                    'success' => true,
                    'message' => 'Login successful',
                    'redirect' => base_url('home') // Redirect after login
                ]);
            } else {
                // Return JSON response with invalid password error
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid password',
                ]);
            }
        } else {
            // Return JSON response with user not found error
            echo json_encode([
                'success' => false,
                'status' => 400,
                'message' => 'User not found',
            ]);
        }
    }


}
