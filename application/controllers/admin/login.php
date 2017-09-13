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
 	
		$this->load->model('admin/admin');
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		//$this->load->library('user_agent');
		
		
	
       
    }
    
   public function index()
   {
		  
        if( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			$logindata = $this->input->post();
	
		  
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['errormsg'] = '';
				$data['username'] = $logindata['username'];
				$this->load->view('admin/login',$data);    
			}
			else
			{
				$result = $this->admin->checkauth($logindata['username'],$logindata['password']);
			
				if(count($result) > 0)  //isset($result)
				{
					$this->session->set_userdata('admin_id', $result[0]['admin_id']); // $_SESSION['admin_id'] = $result[0]['admin_id']
				
					
					redirect(site_url('admin/home'), 'refresh');
					//echo "hello";
					exit;                
				}
				else
				{
					$data['errormsg'] = 'Username or password is not correct.';
					$data['username'] = $logindata['username'];
					$this->load->view('admin/login',$data); 
				}
            
			}
		}
		else
		{
			$session = $this->session->userdata('admin_id');
			if(!(empty($session)))
			{
				redirect(site_url('admin/home'), 'refresh');
			}
			else
			{
				$data['errormsg'] = '';
				$data['username'] = '';
				$this->load->view('admin/login');  
			}
		}
	}
	
	
	
	
}
?>