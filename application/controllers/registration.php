<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 * created by Ravi Prakash
	 */

	public function  __construct()
	{
		parent::__construct();
        $this->load->model(array('user_model','biller_model'));
	} 
	
	/***** function for biller subuser registration ******/

	public function index()
	{		
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('login'));
		}
		$data = array();		
		if($this->input->post('email')!=''){
			$email = $this->input->post('email');
			$pwd = $this->input->post('password');
			$usernm = $this->input->post('username');
			$name = $this->input->post('firstname').' '.$this->input->post('lastname');
			$data['username']   = $this->input->post('username');
			$data['email']      = $this->input->post('email');
			$data['password']   = sha1(md5($this->input->post('password')));
			$data['first_name']  = $this->input->post('firstname');
			$data['last_name']   = $this->input->post('lastname');
			$data['mobile']     = $this->input->post('mobile');
			$data['biller_id'] = $this->input->post('biller_id');
			$user_exists = $this->biller_model->biller_subuser_exists($data['email'],$data['username']);
			if($user_exists>0){
				$this->session->set_flashdata('error',"Username/Email already exists"); 
				redirect(getUrl('registration'));
			}else{
				$this->biller_model->subuser_registration($data);
				$data['title']='Welcome to ERCASConnect Biller Module!!!!';
				$link = site_url('login');
				$data['htmlmsg'] = 'We\'re so excited you joined us. Now see what\'s next.Your login credentials are as follows - <br/>Link - '.$link.'<br/>Email Address - '.$email.'<br/>Password - '.$pwd.'<br/>Username - '.$usernm.'<br/>Please use the credentials for login to web application.';
				$billerdt = $this->biller_model->biller_detail($this->input->post('biller_id'));
				$this->load->library('email');
				$this->email->from('noreply@ercasng.com', 'ERCASConnect Biller Module');
				$this->email->to($email); 
				$this->email->subject($data['title']);
				$this->email->set_mailtype("html");
				$msg = $this->load->view('hostinghtml',$data,TRUE);
				$this->email->message($msg);
				$this->email->send();

				//Send mail to biller
				$data2['title']='Biller Subuser successfully created';
				$link = 'http://ravi-prakash.com/billermodule/login';
				$data2['htmlmsg'] = 'We\'re so excited to inform you that subuser profile has been successfully created. Now see what\'s next. Biller subuser information is as follows - <br/>Name - '.$name.'<br/>Email Address - '.$email.'<br/>Username - '.$usernm;
				$this->email->from('noreply@ercasng.com', 'ERCASConnect Biller Module');
				$this->email->to($billerdt[0]->email_address); 
				$this->email->subject($data['title']);
				$this->email->set_mailtype("html");
				$msg2 = $this->load->view('hostinghtml',$data2,TRUE);
				$this->email->message($msg2);
				$this->email->send();
				$this->session->set_flashdata('success',"User registered successfully.");
				redirect(getUrl('biller'));
			}			
		}
		$data['page_title'] = 'Client User Registration Module';
		$data['menu'] = 'registration';
		$data['sub_menu'] = 'registration';
		$this->load->view('registration',$data);
	}
	/****** end of function *****/
}

/* End of file registration.php */
/* Location: ./application/controllers/registration.php */