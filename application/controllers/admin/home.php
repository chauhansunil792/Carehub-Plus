<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
   
    public function __construct()
    {
        header("content-type: text/html; charset=utf-8");
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
		$this->load->helper('xcrud');
		$this->load->model('admin/admin');
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		//$this->load->library('user_agent');
		
		
	
       
    }
    
   public function index()
   {
 
		$session = $this->session->userdata('admin_id');
        if(empty($session))
        {
            redirect(site_url('admin/login'), 'refresh');
        }
       
        $table_name=$this->input->get('table');
       
        
        $xcrud = Xcrud::get_instance();
        if(isset($table_name) && !empty($table_name))
            $xcrud->table($table_name);
        else
             $xcrud->table('patients');
       // $xcrud->order_by('patient_id','desc');
        

        
      

        //$xcrud->highlight('status','=','5','red');
     
        //$xcrud->unset_print();
        //$xcrud->change_type('status','select','',array('values'=>array('0'=>'Pending','1'=>'Started','2'=>'Confirmed','3'=>'Deleted','4'=>'Closed','5'=>'Missed')));
        
        $data['content'] = $xcrud->render();
      
        $this->load->view('admin/tableview', $data);    
		
       
   }
	
	
	
	
}
?>