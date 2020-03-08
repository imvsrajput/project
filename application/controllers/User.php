<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index($p=0) {
		if($this->chk_login()){
			$data = [];
			$data['lists'] = $this->db->where('delete_at',null)->get('lists')->num_rows();
			$this->load->library('pagination');
			$this->pagination->initialize([
				'base_url'=>base_url('user/index/'),
				'total_rows'=>$data['lists'],
				'per_page'=>10
			]);
			$data['p'] = $this->pagination->create_links();
			$data['lists'] = $this->db->where('delete_at',null)->get('lists',10,$p)->result_array();
			$data['user'] = $this->db->where('user_id',$this->session->userdata['user_id'])->get('users')->result_array()[0];
			$this->load->view('user',$data);
		}
	}
	public function chk_login(){
		if(isset($this->session->userdata['user_id'])){
			return true;
		}else{
			echo json_encode(['Status'=>2,'Message'=>'You need to login.']);
		}
	}
	public function login() {
		$this->session->unset_userdata('vendor_id');
		if($_SERVER['REQUEST_METHOD']==='GET'){
			$this->load->view('userLogin');
		}else{
			try {
				$where = [
					'username'=>$_POST['username'], 
					'password'=>md5($_POST['password']),
					'role'=>2
				];
				$user = $this->db->where($where)->get('users')->result_array();
				if(isset($user[0])){
					$this->session->set_userdata(['user_id'=>$user[0]['user_id']]);
					echo json_encode(['Status'=>1,'Message'=>'Success']);
				}else{
					echo json_encode(['Status'=>2,'Message'=>'Invalid Credentials']);
				}
			} catch (Exception $e) {
				echo json_encode(['Status'=>0,'Message'=>'Error.']);
			}
		}
	}

	public function out() {
		$this->session->unset_userdata('user_id');
		echo json_encode(['Status'=>1,'Message'=>'See You Soon']);
	}
	public function registration() {
		if($_SERVER['REQUEST_METHOD']==='GET'){
			$this->load->view('userRegistration');
		}else{
			try {
				$input = [];
				$input['name']=$_POST['name'];
				$input['username']=$_POST['username'];
				$input['mobile']=$_POST['mobile'];
				$input['email']=$_POST['email'];
				$input['password']=md5($_POST['password']);
				$input['role']=2;
				if($this->db->insert('users', $input)){
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
