<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller
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
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }
    	$patients = $this->homes->getallpatientslist();
    	if( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			$postdata = $this->input->post();
			$patients_search = $this->homes->search_patients($postdata['search_name']);
			
			$data['patients'] = $patients_search;
			$this->load->view('user/find_patient',$data);
		}
		else
		{
			$data['patients'] = $patients;
			$this->load->view('user/find_patient',$data);
		}
    }
    public function add_patient()
	{


		$session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }

		$diaseases = $this->homes->getalldiaseases();
    	$wards = $this->homes->getallwards();
    	//echo "<pre>";
    	//print_r($wards);die;
    	$data['diaseases'] = $diaseases;
    	$data['wards'] = $wards;
		if($this->input->server('REQUEST_METHOD')=="POST")
		{

			$postdata = $this->input->post();

				foreach ($postdata as $columns => $rows) {
						for ($i=0; $i <count($diaseases) ; $i++) { 
							if ($columns==$diaseases[$i]['diaseases_name'] && $rows==on) {
							$postdataverifiedreport['diaseases_ids'].=$diaseases[$i]['diaseases_id'] .',';
						}
						}
						
    				
				}
				//echo $postdataverifiedreport['diaseases_ids'];die;
			$checked = $this->input->post('diaseases_ids');
			$this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
	        $this->form_validation->set_rules('patient_address', 'Address', 'required');
	        $this->form_validation->set_rules('patient_areacode', 'Patient Area Code', 'required|max_length[6]|min_length[6]');
	        $this->form_validation->set_rules('patient_age', 'Age', 'required');
	     
	        $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
	       // $this->form_validation->set_rules('patient_email', 'Email', 'required');
	        $this->form_validation->set_rules('patient_phone', 'Mobile number', 'required|regex_match[/^[0-9]{10}$/]');
	        $this->form_validation->set_rules('patient_occupation', 'Occupation', 'required');
	        $this->form_validation->set_rules('patient_cast', 'Caste', 'required');
	        $this->form_validation->set_rules('Patient_bloodgroup', 'Patient Blood Group', 'required');
	                     
	        if ($this->form_validation->run() == FALSE)
	        {
	         	
	            $data['errormsg'] = '';
	            $data['patient_name'] = $postdata['patient_name'];
	            $data['patient_address'] = $postdata['patient_address'];
	            $data['patient_name'] = $postdata['patient_name'];
	            $data['patient_areacode'] = $postdata['patient_areacode'];
	            $data['patient_age'] = $postdata['patient_age'];
	            $data['patient_gender'] = $postdata['patient_gender'];
	            $data['patient_email'] = $postdata['patient_email'];
	            $data['patient_phone'] = $postdata['patient_phone'];
	            $data['patient_occupation'] = $postdata['patient_occupation'];
	            $data['patient_cast'] = $postdata['patient_cast'];
	            $this->load->view('user/add_patient_view',$data);    
	        }
	        else
	        {
	        	  	//patient data
					$postdataverified['hospital_id']= $this->session->userdata('hospital_id');
					$postdataverified['staff_id']= $this->session->userdata('staff_id');
					$postdataverified['ward_id']=$postdata['ward_id'];
					$postdataverified['patient_name']=$postdata['patient_name'];
					$postdataverified['patient_address']=$postdata['patient_address'];
					$postdataverified['patient_areacode']=$postdata['patient_areacode'];
					$postdataverified['patient_age']=$postdata['patient_age'];
					$postdataverified['patient_gender']=$postdata['patient_gender'];
					$postdataverified['patient_email']=$postdata['patient_email'];
					$postdataverified['patient_phone']=$postdata['patient_phone'];
					$postdataverified['patient_unique_id']=$this->common->randomcode();
					$postdataverified['patient_occupation']=$postdata['patient_occupation'];
					$postdataverified['patient_cast']=$postdata['patient_cast'];
	 				$this->homes->addpatient($postdataverified);		
					$thispatient = $this->homes->getparticularpatient($postdataverified['patient_unique_id']);
					//echo "<pre>";
					//print_r($thispatient);die;
					//report data

					$postdataverifiedreport['Patient_bloodgroup']=$postdata['Patient_bloodgroup'];
					$postdataverifiedreport['hospital_id']= $this->session->userdata('hospital_id');
					$postdataverifiedreport['staff_id']= $this->session->userdata('staff_id');
					$postdataverifiedreport['patient_id'] = $thispatient[0]['patient_id'];
						if($_FILES['pdf']['tmp_name']!="")
						{

													
							$img2_data = file_get_contents($_FILES['pdf']['tmp_name']);
							
						}
						if($_FILES['pdf']['tmp_name']!="")
						{						
								$file_name2= $this->homes->uploadpdffile($img2_data);
								$postdataverifiedreport['report_name_url']=$file_name2;
						}
						//echo "<pre>";
					//	print_r($postdataverifiedreport);die;
				    $this->homes->addpatientreport($postdataverifiedreport);
					$data['errormsg'] = '';
					$data['message'] = 'Patient added Successfully.';
					$this->load->view('user/add_patient_view',$data);
				}
			
		}
		else
		{
			redirect(site_url('home'), 'refresh');
		}
	}
    public function view_profile($patient_id="")
    {

    	$session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }
    	$patient = $this->homes->getparticularpatientbyid($patient_id);
    	$patient_reports =  $this->homes->getallreportsbypatientid($patient_id);
    	$patient_invoices =  $this->homes->getallinvoicesbypatientid($patient_id);
    	//echo "<pre>";
    	//print_r($patient_reports );die;
    	if( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			$postdata = $this->input->post();
			$patients_search = $this->homes->search_patients($postdata['search_name']);
			
			$data['patients'] = $patients_search;
			$this->load->view('user/find_patient',$data);
		}
		else
		{
			
			$data['patients'] = $patient;
			$data['patients_reports'] = $patient_reports;
			$data['patients_invoices'] = $patient_invoices;
			$this->load->view('user/profile',$data);
		}
    }
    public function sendsms($patient_id="")
    {

    	$session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }

    	$patient = $this->homes->getparticularpatientbyid($patient_id);

    	if( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			$postdata = $this->input->post();
			sendWay2SMS(WAY2SMSID,WAY2SMSPASS,$postdata['patient_phone'],$postdata['msg']);
			
			
			$data['patient'] = $patient[0];
			$data['message'] = 'SMS has been sent.';
			$this->load->view('user/sms',$data);
		}
		else
		{
			$data['patient'] = $patient[0];			
			$this->load->view('user/sms',$data);
		}
    }
    public function edit_profile($patient_id="")
    {

    
$session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }
		$patient = $this->homes->getparticularpatientbyid($patient_id);	

		$diaseases = $this->homes->getalldiaseases();
    	$wards = $this->homes->getallwards();
    
		$diaseases_ids = (explode(",",$patient[0]['diaseases_ids']));
    		//echo "<pre>";
    		//print_r($diaseases_ids);die;
		for ($i=0; $i <count($diaseases_ids) ; $i++) { 
		
				for ($j=0; $j <count($diaseases) ; $j++) { 
					if ($diaseases[$j]['diaseases_id'] == $diaseases_ids[$i]) {
						$data['diaseases_ids'][$i] = $diaseases[$j]['diaseases_id'];
					}
				
				}
		}
		
    		
						
    				
			

    	$data['patient'] = $patient[0];
    	$data['diaseases'] = $diaseases;
    	$data['wards'] = $wards;
		if($this->input->server('REQUEST_METHOD')=="POST")
		{

			$postdata = $this->input->post();

			$postdatatemp  = $postdata ;

			foreach($postdata as $pv => $pc)
			{

			    foreach($patient[0] as $v => $vp )
			    {
			    	
			        if( $vp == $pc)
			        {
			            unset($postdata[$pv]);

			        }
			    }
			   
			}
			 for ($i=0; $i <count($diaseases) ; $i++)
			 {
			    	foreach($postdata as $pv => $pc)
					{
			        	if( $pv == $diaseases[$i]['diaseases_name'])
			        	{
			           	 	unset($postdata[$pv]);
			           	}
			        }
			 }

			 if (count($postdata) > 0 || $_FILES['pdf']['tmp_name']!='') {
			 	
			 
				foreach ($postdatatemp as $columns => $rows) {
						for ($i=0; $i <count($diaseases) ; $i++) { 
							if ($columns==$diaseases[$i]['diaseases_name'] && $rows=="on") {
							$postdataverifiedreport['diaseases_ids'].=$diaseases[$i]['diaseases_id'] .',';
							}
						}
						
    				
				}
					
				//echo $postdataverifiedreport['diaseases_ids'];die;
			$checked = $this->input->post('diaseases_ids');
			$this->form_validation->set_rules('patient_name', 'Patient Name', 'required');
	        $this->form_validation->set_rules('patient_address', 'Address', 'required');
	        $this->form_validation->set_rules('patient_areacode', 'Patient Area Code', 'required|max_length[6]|min_length[6]');
	        $this->form_validation->set_rules('patient_age', 'Age', 'required');
	     
	        $this->form_validation->set_rules('patient_gender', 'Gender', 'required');
	       // $this->form_validation->set_rules('patient_email', 'Email', 'required');
	        $this->form_validation->set_rules('patient_phone', 'Mobile number', 'required|regex_match[/^[0-9]{10}$/]');
	        $this->form_validation->set_rules('patient_occupation', 'Occupation', 'required');
	        $this->form_validation->set_rules('patient_cast', 'Caste', 'required');
	        $this->form_validation->set_rules('Patient_bloodgroup', 'Patient Blood Group', 'required');
	                     
	        if ($this->form_validation->run() == FALSE)
	        {
	         	//echo "hello";die;
			//print_r($postdataverifiedreport);die;
	            $data['patient'] = $patient[0];
			    $data['diaseases'] = $diaseases;
			    $data['wards'] = $wards;
	            $this->load->view('user/edit_patient_view',$data);    
	        }
	        else
	        {
	        	  	//patient data
					$postdataverified['hospital_id']= $this->session->userdata('hospital_id');
					$postdataverified['staff_id']= $this->session->userdata('staff_id');
					$postdataverified['ward_id']=$postdatatemp['ward_id'];
					$postdataverified['patient_name']=$postdatatemp['patient_name'];
					$postdataverified['patient_address']=$postdatatemp['patient_address'];
					$postdataverified['patient_areacode']=$postdatatemp['patient_areacode'];
					$postdataverified['patient_age']=$postdatatemp['patient_age'];
					$postdataverified['patient_gender']=$postdatatemp['patient_gender'];
					$postdataverified['patient_email']=$postdatatemp['patient_email'];
					$postdataverified['patient_phone']=$postdatatemp['patient_phone'];
					$postdataverified['patient_unique_id']=$this->common->randomcode();
					$postdataverified['patient_occupation']=$postdatatemp['patient_occupation'];
					$postdataverified['patient_cast']=$postdatatemp['patient_cast'];
	 				$this->homes->updatepatient($postdataverified,$patient_id);		
					
					//echo "<pre>";
					//print_r($thispatient);die;
					//report data

					$postdataverifiedreport['Patient_bloodgroup']=$postdatatemp['Patient_bloodgroup'];
					$postdataverifiedreport['hospital_id']= $this->session->userdata('hospital_id');
					$postdataverifiedreport['staff_id']= $this->session->userdata('staff_id');
					$postdataverifiedreport['patient_id'] = $patient_id;
						{

						if($_FILES['pdf']['tmp_name']!="")

													
							$img2_data = file_get_contents($_FILES['pdf']['tmp_name']);
							
						}
						if($_FILES['pdf']['tmp_name']!="")
						{		

								$file_name2= $this->homes->uploadpdffile($img2_data);
								$postdataverifiedreport['report_name_url']=$file_name2;
						}
				
						if (isset($postdata['Patient_bloodgroup']) || isset($postdataverifiedreport['report_name_url'])) {
							
			
							$this->homes->addpatientreport($postdataverifiedreport);

						}

					$data['errormsg'] = '';
								$patient = $this->homes->getparticularpatientbyid($patient_id);		
					$diaseases = $this->homes->getalldiaseases();
			    	$wards = $this->homes->getallwards();
			    
					$diaseases_ids = (explode(",",$patient[0]['diaseases_ids']));
			    		//echo "<pre>";
			    		//print_r($diaseases_ids);die;
					for ($i=0; $i <count($diaseases_ids) ; $i++) { 
					
							for ($j=0; $j <count($diaseases) ; $j++) { 
								if ($diaseases[$j]['diaseases_id'] == $diaseases_ids[$i]) {
									$data['diaseases_ids'][$i] = $diaseases[$j]['diaseases_id'];
								}
							
							}
					}
					//echo "<pre>";
			    	//print_r($data['diaseases']);die;		
									
			    				
						

			    	$data['patient'] = $patient[0];
			    	$data['diaseases'] = $diaseases;
			    	$data['wards'] = $wards;
					$data['message'] = 'Patient Updated Successfully.';
					$this->load->view('user/edit_patient_view',$data);
				}
			}
			else
			{
					$data['patient'] = $patient[0];
			    	$data['diaseases'] = $diaseases;
			    	$data['wards'] = $wards;
					$data['message'] = 'Patient Updated Successfully.';
					$this->load->view('user/edit_patient_view',$data);
			}
			
		}
		else
		{
			$this->load->view('user/edit_patient_view',$data);
		}
    }

     public function uploadpdf($patient_id="",$report_id="")
    {

    	$session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }
    	$this->load->helper('tcpdf/pdf_helper');
    	$patient = $this->homes->getparticularpatientbyid($patient_id);
		$report = $this->homes->getreportbyid($report_id);
        $diaseases = $this->homes->getalldiaseases();

		$diaseases_ids = (explode(",",$report[0]['diaseases_ids']));
    		//echo "<pre>";
    		//print_r($patient);die;
		for ($i=0; $i <count($diaseases_ids) ; $i++) { 
		
				for ($j=0; $j <count($diaseases) ; $j++) { 
					if ($diaseases[$j]['diaseases_id'] == $diaseases_ids[$i]) {
						$data['diaseases_ids'][$i]=$diaseases[$j]['diaseases_name'];
					}
				
				}
		}
		//echo "<pre>";
    	//print_r($data['diaseases_ids']);die;
    	if( $this->input->server('REQUEST_METHOD') == 'POST')
		{
			$postdata = $this->input->post();
			$patients_search = $this->homes->search_patients($postdata['search_name']);
			
			$data['patients'] = $patients_search;
			$this->load->view('user/find_patient',$data);
		}


		$data['patients'] = $patient;
		$data['report'] = $report;
		$this->load->view('pdfreport',$data);
    }
    public function Diseases()
    {
    	 $diaseases = $this->homes->getalldiaseases();
    	 $data['diseases']= $diaseases;
    	$this->load->view('user/diseases',$data);
    }
}
?>