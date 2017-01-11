<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_management extends CI_Controller {

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
        $this->load->model(array('user_model','basic_model','biller_model'));
		$this->load->library('upload');
	    $this->load->helper(array('url'));
	} 
	
	
	/***** Profile Management Function to change password & contact details *****/
	public function index(){
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('login'));
		}
		$id = $this->session->userdata('biller_id');
		$data = array();
		if($this->input->post('email_address')!=''){
			$save = array();
			if($this->input->post('password')!=''){
				$save['password']   = sha1(md5($this->input->post('password')));
			}			
			$save['name']  = $this->input->post('firstname');
			$save['mobile']     = $this->input->post('mobile');
			$save['company_name'] = $this->input->post('company_name');
			$upd['id'] = $id;
			$this->basic_model->customupd('biller',$save,$upd);
			$this->session->set_flashdata('success',"Profile edited successfully.");
			redirect(getUrl('profile_management'));
		}
		$data['page_title'] = 'Biller Profile Edit Module';
		$data['user_detail'] = $this->biller_model->biller_detail($id);
		$this->load->view('profile_management',$data);
	}
	/*****  EOF ****/
}

/* End of file profile_management.php */
/* Location: ./application/controllers/profile_management.php */