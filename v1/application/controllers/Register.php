<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct(){
        parent::__construct();
       $this->load->model('common');
    }


    function index(){
        $data['country'] =  $this->common->getdataFromdatabase('*','country');
        $data['business_areas'] =  $this->common->getdataFromdatabase('id,name','business_interest_areas');
       $this->load->view('front/register',$data);
    }
    public function dupemail()
    { 
        $email = $this->input->post('email'); // Get email from the request
        $result =  $this->common->check_row('email','users',['email'=>$email]);
        if ($result > 0) {
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
        
    }
    public function dupcontactNumber()
    { 
        $email = $this->input->post('email'); // Get email from the request
        $result =  $this->common->check_row('email','users',['email'=>$email]);
        if ($result > 0) {
            echo json_encode(false);
        } else {
            echo json_encode(true);
        }
        
    }

    function submit(){
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[31]');
        $this->form_validation->set_rules('month', 'Month', 'required|numeric|greater_than_equal_to[1]|less_than_equal_to[12]');
        $this->form_validation->set_rules('year', 'Year', 'required|numeric|greater_than_equal_to[1945]');
        $this->form_validation->set_rules('contactnumber', 'Contact Number', 'required|numeric|min_length[8]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

          // Define validation rules
          $rules = [
            [
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'required'
            ],
            [
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ]
        ];

        // Set validation rules
        $this->form_validation->set_rules($rules);

        // Check if the validation fails
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            if($this->common->value_number_exists('users',array('email'=>$this->input->post('email'))))
            {
                echo json_encode([
                    'success' => false,
                    'message' => 'This Email  already exists'
                ]);
              
                
            }else if($this->common->value_number_exists('users',array('contact_number'=>$this->input->post('contactnumber'))))
            {
                echo json_encode([
                    'success' => false,
                    'message' => 'This contact Number already exists.'
                ]);
               
            }else{
                $data = [
                    'first_name'     => $this->input->post('firstname'),
                    'last_name'      => $this->input->post('lastname'),
                    'zip_code'       => $this->input->post('zipcode'),
                    'country'        => $this->input->post('country'),
                    'dob'            => $this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day'),
                    'contact_number' => $this->input->post('contactnumber'),
                    'email'         => $this->input->post('email'),
                    'status'        => 1,
                    'role'          => 1,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                ];

                $insertedId = $this->common->insertdataTodatabase('users',$data);

    
        if ($insertedId) {
            $datamentee = [
                'userId'        => $insertedId,
                'graduationyear'=> $this->input->post('graduationyear'),
                'school'        => $this->input->post('school'),
                'businessarea'  => $this->input->post('businessarea'),
                'created_at'    => date('Y-m-d H:i:s'),
            ];
            
            // Insert mentee details
                if ( $this->common->insertdataTodatabase('mentee_details',$datamentee)) {
                        
                    echo json_encode([
                            'success' => true,
                            'status' => 200 , 
                            'message' => 'Congratulations, your account has been successfully created'
                        ]);
                    }

                }else{
                    echo json_encode([
                        'success' => false,
                        'status' => 400 , 
                        'message' => 'User Details somthing went wrong Please contact to admin'
                    ]);
                }
            }
            

        }else{
           
            echo json_encode([
                'success' => false,
                'message' => $this->form_validation->error_array()
            ]);
        }
    }


}