<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_control extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model'); // Add this line
	}

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
	public function index()
	{
		$this->load->view('login_view');
	}

	public function check_login()
	{
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$user_details = $this->Login_model->check_login($name);

		if ($user_details) {
			if ($password === $user_details['password']) {
				$this->user_viewbyid($user_details['name']);
			} else {
				$data['error_message'] = 'Incorrect password';
				$this->load->view('login_view', $data); // Change 'login_view' to your actual login view
			}
		} else {
			$data['error_message'] = 'Incorrect credentials';
			$this->load->view('login_view', $data); // Change 'login_view' to your actual login view
		}
	}

	public function user_viewbyid($name)
	{
		$data['name'] = $name;
		$this->load->view('user_viewbyid', $data);
	}
	// public function check_login()
	// {
	// 	$name = $this->input->post('name');
	// 	$password = trim($this->input->post('password'));

	// 	// Call the method to check login
	// 	$user_details = $this->Login_model->check_login($name);

	// 	if ($user_details) {
	// 		// Debugging statements
	// 		echo 'Entered Password: ' . $password . '<br>';
	// 		echo 'Hashed Password from Database: ' . $user_details['password'] . '<br>';
	// 		if ($password == $user_details['password']) {
	// 			echo 'Login successful';
	// 		} else {
	// 			echo 'Incorrect password';
	// 		}
	// 	} else {
	// 		echo 'Incorrect credentials';
	// 	}
	// }
	public function new_userpage()
	{
		$this->load->view('new_user_viewpage');
	}
	// public function newuser_create()
	// {
	// 	$this->load->model('Login_model');
	// 	$name = $this->input->post('name');
	// 	$name_exists = $this->Login_model->check_name_existence($name);

	// 	if ($name_exists) {
	// 		echo json_encode(array('exists' => true, 'message' => 'Name already exists!'));
	// 	} else {
	// 		$data = array(
	// 			'name' => $this->input->post('name'),
	// 			'gmail' => $this->input->post('gmail'),
	// 			'phone_no' => $this->input->post('phone_no'),
	// 			'password' => $this->input->post('confirm_password'),
	// 		);
	// 		$this->Login_model->create_login($data);
	// 		redirect('Login_control');
	// 	}
	// }
	public function newuser_create()
	{
		$this->load->model('Login_model');
		$name = $this->input->post('name');
		$name_exists = $this->Login_model->check_name_existence($name);

		if ($name_exists) {
			echo json_encode(array('exists' => true, 'message' => 'Name already exists!'));
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'gmail' => $this->input->post('gmail'),
				'phone_no' => $this->input->post('phone_no'),
				'password' => $this->input->post('confirm_password'),
			);
			$this->Login_model->create_login($data);
			// Provide a redirect URL in the response
			echo json_encode(array('exists' => false, 'message' => 'saved successfully', 'redirect_url' => base_url('Login_control')));
		}
	}
}


// public function check_name_existence()
	// {
	// 	$name = $this->input->post('name');
	// 	$name_exists = $this->Login_model->check_name_existence($name);
	// 	echo json_encode(array('exists' => $name_exists));
	// }