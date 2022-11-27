<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('RegisterModel');
	}
	public function index()
	{
		$this->customer_registration();
	}
	public function customer_registration(){
		if (isset($_POST['reg_submit'])) {
			// print_r();die('cc');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('first_name', 'First name', 'required');
			$this->form_validation->set_rules('middle_name', 'Middle name', 'required');
			$this->form_validation->set_rules('last_name', 'Last name', 'required');
			$this->form_validation->set_rules('course', 'Course', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password]');

	        // $this->form_validation->set_error_delimiters('<div class="error">','</div>');
	        // $this->form_validation->set_message('required', 'Enter %s');	

			if ($this->form_validation->run() == FALSE){
				validation_errors();
			} else {
				$data = array(
		            'first_name' => $this->input->post('first_name'),
		            'middle_name' => $this->input->post('middle_name'),
		            'last_name' => $this->input->post('last_name'),
		            'course' => $this->input->post('course'),
		            'gender' => $this->input->post('gender'),
		            'email' => $this->input->post('email'),
		            'mobile' => $this->input->post('mobile'),
		            'call_code' => $this->input->post('call_code'),
		            'address' => $this->input->post('address'),
		            'password' => md5($this->input->post('password')),
		            'request_data' => json_encode($this->input->post())
		        );
		        $result=$this->RegisterModel->reg_insert($data);
		        if ($result == 1) {
		        	$this->session->set_flashdata('reg_success', 'Record created successful');
		        	redirect('register');
		        } else {
		        	$this->session->set_flashdata('reg_error', 'Registration Failed');
		        	redirect('register');
		        }
			}
		}
		$this->load->view('common/header');
		$this->load->view('register/register');
		$this->load->view('common/footer');	
	}
	public function checkEmail(){
		$arr = array(
			'email' => $this->input->post('email')
		);
		$result = $this->RegisterModel->check_existing_data($arr); 
		echo json_encode($result);
	}
}
