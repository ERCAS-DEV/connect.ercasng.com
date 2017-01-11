<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Model		: user_group_model
 * Author		: Ravi Prakash
 * Dated		: 07/04/16
 */

class User_group_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();	
	}

	/*
	 * Function isUserExists checks whether user exists or not. It searches email ID in database.
	 * This query will be someting like this (select email from user_master where email = '$email')
	 * Added By Ravi Prakash
	 */
	

	/***  Function for User Group ***/
	public function user_group_list(){
		$query = $this->db->get('user_group')->result();
		return $query;
	}
	/****** EOF *****/

	/***  Function for User Group ***/
	public function user_group_detail($id){
		$query = $this->db->where(array('id'=>$id))->get('user_group')->result();
		return $query;
	}
	/****** EOF *****/
	
	/*** User Group & their permissions detail function **/
	public function user_group_permissions_detail($id){
		$query = $this->db->where(array('user_group_id'=>$id))->get('user_group_permissions_setting')->result();
		return $query;	
	}
	/***** EOF *****/

	public function delete_user_group_permissions($id){
		//delete from user_group_permissions_setting where `user_group_id`='10'
		$query = $this->db->delete('user_group_permissions_setting', array('user_group_id' => $id)); 
		return $query;	

	}
}


