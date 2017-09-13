<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
   
    public function __construct()
    {
        header("content-type: text/html; charset=utf-8");
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user/homes');
		$this->load->model('api/common');
		$this->load->model('admin/admin');
		$this->load->model('user/homes');
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->library('user_agent');
		$this->load->library('image_lib');
		
	
       
    }
    
	public function index()
    {
    	
    	$session = $this->session->userdata('staff_id');
		if(!(empty($session)))
		{
			redirect(site_url('home/staff_home'), 'refresh');
		}
    	$hosp_list=$this->homes->getallhospitals();
    	
		$data['hosp_list']=$hosp_list;
    	if( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			 $login_data = $this->input->post();
			 //echo "<pre>";
			// print_r($login_data);die;
			 $this->form_validation->set_rules('username', 'Username', 'required');
	         $this->form_validation->set_rules('password', 'Password', 'required');
	         $this->form_validation->set_rules('hospital_id', 'Select Hospital', 'required');
	        
	         if ($this->form_validation->run() == FALSE)
	         {
	         	
	            $data['errormsg'] = '';
	            $data['username'] = $login_data['username'];
	            $this->load->view('user/welcome',$data);    
	         }
	         else
	         {
			        $result = $this->homes->checkauth($login_data);
			    
			    	
		            if(count($result) > 0)  //isset($result)
		            {
		                $this->session->set_userdata('staff_id', $result[0]['staff_id']); // $_SESSION['admin_id'] = $result[0]['admin_id']
		                $this->session->set_userdata('hospital_id', $result[0]['hospital_id']);
		                $this->session->set_userdata('name', $result[0]['staff_name']);
		              
		                
		                redirect(site_url('home/staff_home'), 'refresh');
		                //echo "hello";
		                exit;                
		            }
		            else
		            {
		                $data['errormsg'] = 'Username or password or Hospital is not correct.';
		                $data['username'] = $login_data['username'];
		                $this->load->view('user/welcome',$data); 
		            }
	         }

		
		}
		else
		{
			$hosp_list=$this->homes->getallhospitals();
			$data['hosp_list']=$hosp_list;
			$this->load->view('user/login',$data);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('staff_id');
		$this->session->unset_userdata('hospital_id');
		$this->session->unset_userdata('name');
        
		redirect(site_url('welcome'), 'refresh');
	}
	
}
?>