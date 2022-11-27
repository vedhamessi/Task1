<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('AdminModel');
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}
	public function index()
	{
		$this->login();
	}
	public function login(){
		$this->load->view('common/header');
		$this->load->view('admin/login');
		$this->load->view('common/footer');
	}
	public function login_process(){
		$data = array();
		if($this->input->post('loginSubmit')){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required');
			if($this->form_validation->run() == true){
				$arr['query'] = array(
					'email'=> $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'status' => 1,
					'is_admin' => 1
				);
				$checkLogin = $this->AdminModel->getLog($arr);
				// print_r($checkLogin);die('nn');
				// $e_checkLogin = json_encode($checkLogin);
				// print_r($checkLogin['is_admin']);die('nn');
				if($checkLogin['is_admin'] == 1){
					$this->session->set_userdata('isUserLoggedIn', TRUE);
					$this->session->set_userdata('User_info', $checkLogin);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('login_res', 'Wrong email or password, please try again.');
					$data['error_msg'] = 'Wrong email or password, please try again.';
				}
			}else{
				validation_errors();
			}
		}
		redirect('login');
	}
	public function dashboard(){
		if($this->isUserLoggedIn){

			$this->load->view('common/header');
			$this->load->view('admin/nav');
			$this->load->view('admin/dashboard');
			$this->load->view('common/footer');
		}else{
			redirect('login');
		}
	}
	public function user(){
		if($this->isUserLoggedIn){
			$data['result'] = $this->AdminModel->getUsers();
			$this->load->view('common/header');
			$this->load->view('admin/nav');
			$this->load->view('admin/user', $data);
			$this->load->view('common/footer');
		}else{
			redirect('login');
		}
	}
	public function get_user_by_id($id){
		if($this->isUserLoggedIn){
			$data['result'] = $this->AdminModel->getUserById($id);
			// print_r(is_array($data['result']));die('bb');
			if (is_array($data['result']) == 1) {
				$this->load->view('common/header');
				$this->load->view('admin/nav');
				$this->load->view('admin/user_edit', $data);
				$this->load->view('common/footer');
			} else {
				$this->load->view('common/header');
				$this->load->view('admin/nav');
				$this->load->view('admin/user_edit', $data);
				$this->load->view('common/footer');
			}
			
		}else{
			redirect('login');
		}
	}
	public function edit_user_by_id($id){
		if($this->isUserLoggedIn){
			if (isset($_POST['reg_update'])) {
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
		            'request_data' => json_encode($this->input->post())
		        );
		        $result=$this->AdminModel->reg_update($data, $id);
		        // print_r($result);die('m');
		        if ($result == 1) {
		        	$this->session->set_flashdata('up_success', 'Record updated successful');
		        	redirect('user/'.$id);
		        } else {
		        	$this->session->set_flashdata('up_error', 'Record updation Failed');
		        	redirect('user/'.$id);
		        }
			}
		}
		}else{
			redirect('login');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
