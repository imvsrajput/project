<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	public function index() {
		if($this->chk_login()){
			$data=[];
			$data['user'] = $this->db->where('user_id',$this->session->userdata['vendor_id'])->get('users')->result_array()[0];
			$this->load->view('vendor',$data);
		}
	}
	public function login() {
		unset($_SESSION['vendor_id'],$_SESSION['user_id']);
		if($_SERVER['REQUEST_METHOD']==='GET'){
			$this->load->view('vendorLogin');
		}else{
			try {
				$where = [
					'mobile'=>$_POST['mobile'], 
					'password'=>$_POST['password'],
					'role'=>0
				];
				$user = $this->db->where($where)->get('users')->result_array();
				if(isset($user[0])){
					$this->session->set_userdata(['vendor_id'=>$user[0]['user_id']]);
					echo json_encode(['Status'=>1,'Message'=>'Success']);
				}else{
					echo json_encode(['Status'=>2,'Message'=>'Invalid Credentials']);
				}
			} catch (Exception $e) {
				echo json_encode(['Status'=>0,'Message'=>'Error.']);
			}
		}
	}

	public function registration() {
		if($_SERVER['REQUEST_METHOD']==='GET'){
			$this->load->view('vendorRegistration');
		}else{
			try {
				$insert = [];
				$insert['name']=$_POST['name'];
				$insert['mobile']=$_POST['mobile'];
				$insert['email']=$_POST['email'];
				$insert['password']=$_POST['password'];
				if($this->db->insert('users',$insert)){
					echo json_encode(['Status'=>1,'Message'=>'Success']);
				}else{
					echo json_encode(['Status'=>2,'Message'=>'Database Error.']);
				}
			} catch (Exception $e) {
				echo json_encode(['Status'=>0,'Message'=>'Error.']);
			}
		}
	}

	public function chk_login(){
		if(isset($this->session->userdata['vendor_id'])){
			return true;
		}else{
			echo json_encode(['Status'=>2,'Message'=>'You need to login.']);
		}
	}

	public function list() {
		if($this->chk_login()){
			if($_SERVER['REQUEST_METHOD']==='GET'){
				$where = ['user_id'=>$this->session->userdata['vendor_id'],'delete_at'=>null];
				$lists = $this->db->select('Title,Description,Price')->where($where)->get('lists')->result_array();
				echo json_encode(['Status'=>1,'Items'=>$lists]);
			}
		}
	}

	public function dellist($list_id=0) {
		if($this->chk_login()){
			if($_SERVER['REQUEST_METHOD']==='GET'){
				$where = [
					'user_id'=>$this->session->userdata['vendor_id'],
					'list_id'=>$list_id
				];
				if($this->db->where($where)->get('lists')->result_array()){
					$result = $this->db->set(['delete_at'=>date('Y-m-d H:i:s')])
			               ->where($where)
			               ->update('lists');
				}else{
					$result=0;
				}
                if($result){
					echo json_encode(['Status'=>1,'Message'=>'Id number :'.$list_id.' is Deleted Successfully']);
				}else{
					echo json_encode(['Status'=>2,'Message'=>'Error.']);
				}
			}
		}
	}

	public function lists($p=0) {
		if($this->chk_login()){
			$where = ['user_id'=>$this->session->userdata['vendor_id'],'delete_at'=>null];
			$data['lists'] = $this->db->where($where)->get('lists')->num_rows();
			$this->load->library('pagination');
			$this->pagination->initialize([
				'base_url'=>base_url('vendor/lists/'),
				'total_rows'=>$data['lists'],
				'per_page'=>10
			]);
			$data['p'] = $this->pagination->create_links();
			$data['lists'] = $this->db->select('list_id,Title,Description,Price')->where($where)->get('lists',10,$p)->result_array();
			$this->load->view('lists',$data);
		}
	}

	public function addList($list_id=0) {
		if($this->chk_login()){
			if($_SERVER['REQUEST_METHOD']==='GET'){
				$list = ['list_id'=>0,'Title'=>'','Description'=>'','Price'=>''];
				if($list_id!=0){
					$d_list = $this->db->select('list_id,Title,Price,Description')->where([
						'user_id'=>$this->session->userdata['vendor_id'],
						'list_id'=>$list_id
					])->get('lists')->result_array();
					if($d_list){
						$list = $d_list[0];
					}
				}
				$this->load->view('addList',['list'=>$list]);
			}else{
				try {
					$data = $_POST;
					$check = $this->db->where([
						'user_id'=>$this->session->userdata['vendor_id'],
						'list_id'=>$data['list_id']
					])->get('lists')->result_array();
					if($check){
						unset($data['list_id']);
						$result = $this->db->set($data)
						               ->where('list_id',$_POST['list_id'])
						               ->update('lists');
					}else{
						$data['user_id'] = $this->session->userdata['vendor_id'];
						$result = $this->db->insert('lists',$data);
					}
					if($result){
						echo json_encode(['Status'=>1,'Message'=>'Success']);
					}else{
						echo json_encode(['Status'=>2,'Message'=>'Database Error.']);
					}
				} catch (Exception $e) {
					echo json_encode(['Status'=>0,'Message'=>'Error.']);
				}
			}
		}
	}


}
