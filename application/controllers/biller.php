<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biller extends CI_Controller {

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
        $this->load->model(array('user_model','biller_model','basic_model'));
		$this->load->library('upload');
		$this->load->helper(array('url'));
	} 
	
	/***** function for biller listing ******/

	public function index()
	{		
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('login'));
		}
		$data = array();
		$data['page_title'] = 'Biller Listing Module';
		$data['biller_listing'] = $this->biller_model->biller_subusers_listing();
		$data['menu'] = 'biller_subuser';
		$data['sub_menu'] = 'biller_subuser';
		$this->load->view('biller_subusers',$data);
	}
	/****** end of function *****/
	
	/******* Edit User function ********/
	public function edit_subuser($id)
	{
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('login'));
		}
		$data = array();		
		if($this->input->post('email')!=''){
			$save = array();
			if($this->input->post('password')!=''){
				$save['password']   = sha1(md5($this->input->post('password')));
			}			
			$save['first_name']  = $this->input->post('firstname');
			$save['last_name']   = $this->input->post('lastname');
			$save['mobile']     = $this->input->post('mobile');
			$save['biller_id'] = $this->input->post('biller_id');
			$upd['id'] = $id;
			$this->basic_model->customupd('biller_subuser',$save,$upd);
			$this->session->set_flashdata('success',"User edited successfully.");
			redirect(getUrl('biller'));
		}
		$data['page_title'] = 'Client User Edit Module';
		$data['user_detail'] = $this->biller_model->billersubuser_detail($id);
		$data['menu'] = 'biller_subuser';
		$data['sub_menu'] = 'biller_subuser';
		$this->load->view('edit_subuser',$data);
	}
	/****** EOF ******/
	
	// delete billersubuser record for given id
    public function delete_billersubuser($id)
    {
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('login'));
		}
		$data = array();
		$this->basic_model->dele('biller_subuser',$id);
		$this->session->set_flashdata('success',"Biller Subuser deleted successfully.");
		redirect(getUrl('biller'));
    }
}

/* End of file biller.php */
/* Location: ./application/controllers/biller.php */