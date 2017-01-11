<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tickets extends CI_Controller {

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
        $this->load->model(array('user_model','tickets_model','biller_model'));
	} 
	
	/***** function for tickets listing ******/

	public function index()
	{		
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('apperror'));
		}
		$data = array();
		//$userid = $this->session->userdata['user_id'];
		$billerid = $this->session->userdata['biller_id'];
		$data['tcktlist'] = $this->tickets_model->ticket_listing($billerid);
		$data['page_title'] = 'Client Tickets Module';
		$data['menu'] = 'tickets';
		$data['sub_menu'] = 'tickets';
		$this->load->view('tickets',$data);
	}
	/****** end of function *****/

	public function new_tickets()
	{
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('apperror'));
		}
		$data = array();
		//print_R($this->session->userdata['user_id']);exit;
		if($this->input->post('email')!=''){		
		//	$data['user_id'] = $this->session->userdata['user_id'];
			$data['email']      = $this->input->post('email');			
			$data['first_name']  = $this->input->post('firstname');
			$data['last_name']   = $this->input->post('lastname');
			$data['phone']     = $this->input->post('mobile');
			$data['biller_id']     = $this->session->userdata['biller_id'];
			$data['issue_title'] = $this->input->post('issue_title');
			$data['issue_detail'] = $this->input->post('issue_desc');			
			$data['creation_date'] = date('Y-m-d H:i:s');
			$data['ticket_created_by'] = '2';
			$data['status'] = 'Pending';			
			$this->tickets_model->new_ticket($data);
			$this->session->set_flashdata('success',"Ticket created successfully.");
			redirect(getUrl('tickets'));
		}
		$data['page_title'] = 'Client New Tickets Module';
		$data['menu'] = 'tickets';
		$data['sub_menu'] = 'new_tickets';
		$this->load->view('new_tickets',$data);
	}

	public function ticket_detail($id)		
	{
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('apperror'));
		}
		
		$data = array();
		$data['tcktdt'] = $this->tickets_model->ticket_detail($id);
		$data['tktrply'] = $this->tickets_model->tickets_replies($id);
		$data['page_title'] = 'Tickets Detail Module';
		$data['menu'] = 'tickets';
		$data['sub_menu'] = 'tickets';
		$this->load->view('ticket_detail',$data);			
	}

	public function reply(){
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('apperror'));
		}
		
		$data = array();
		if($this->input->post('tkt_reply')=='Reply'){
			$save = array();
			$save['tickets_id'] = $this->input->post('tktid'); 
			$save['issue_details'] = $this->input->post('tckt_dt'); 
			$save['date_added'] = date('Y-m-d H:i:s');
			$save['replied_by'] = '2';
			$save['biller_id'] = $this->session->userdata['biller_id'];
			$tid = $this->input->post('tktid'); 
			$this->tickets_model->ticket_reply($save);
			$this->session->set_flashdata('success',"Ticket replied successfully.");
			redirect(getUrl('tickets/ticket_detail/'.$tid));
		}
		if($this->input->post('tkt_close')=='Close'){
			$save = array();
			$save['tickets_id'] = $this->input->post('tktid'); 
			$save['issue_details'] = $this->input->post('tckt_dt'); 
			$save['date_added'] = date('Y-m-d H:i:s');
			$save['replied_by'] = '1';			
			$data['biller_id']  = $this->session->userdata['biller_id'];
			$uid= $this->session->userdata['biller_id'];
			$tid = $this->input->post('tktid'); 
			$this->tickets_model->ticket_reply($save);
			$this->tickets_model->tickets_closed($tid,$uid);
			$this->session->set_flashdata('success',"Ticket closed successfully.");
			redirect(getUrl('tickets/ticket_detail/'.$tid));
		}
		if($this->input->post('tkt_reopen')=='Re-open'){
			$save = array();
			$save['tickets_id'] = $this->input->post('tktid'); 
			$save['issue_details'] = $this->input->post('tckt_dt'); 
			$save['date_added'] = date('Y-m-d H:i:s');
			$save['replied_by'] = '1';
			$data['biller_id']  = $this->session->userdata['biller_id'];
			$tid = $this->input->post('tktid');			
			$this->tickets_model->tickets_reopen($tid);
			$this->tickets_model->ticket_reply($save);
			$this->session->set_flashdata('success',"Ticket closed successfully.");
			redirect(getUrl('tickets/ticket_detail/'.$tid));
		}
	}
	
	public function closed_tickets(){
		if(!isAdminLoggedIn())
		{
			redirect(getUrl('apperror'));
		}
		
		$data = array();
		$data['menu'] = 'tickets';
		$data['sub_menu'] = 'closed_tickets';
		$data['closed_tkt'] = $this->tickets_model->all_closed_tickets();
		$data['page_title'] = 'Closed Tickets Listing Module';
		$this->load->view('tickets_closed',$data);	
	}
}

/* End of file tickets.php */
/* Location: ./application/controllers/tickets.php */