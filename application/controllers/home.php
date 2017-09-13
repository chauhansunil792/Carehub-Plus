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
        $this->load->model('user/homes');
		$this->load->model('api/common');
		$this->load->model('admin/admin');
		$this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->library('user_agent');
		$this->load->library('image_lib');
        $this->load->library('googlemaps');
		
	
       
    }
    
    public function index()
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
		$this->load->view('user/add_patient_view',$data);
	}

	
	public function staff_home()
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
	    	$patients=$this->homes->getallpatients();
		$allpatients=$this->homes->getallpatientslist();
        $uhcgroups=$this->homes->getuhcgroups();

		$data['age_wise_filter']['0-10']=0;
		$data['age_wise_filter']['10-20']=0;
		$data['age_wise_filter']['20-30']=0;
		$data['age_wise_filter']['30-40']=0;
		$data['age_wise_filter']['40-50']=0;
        $data['age_wise_filter']['50-60']=0;
        $data['age_wise_filter']['60-70']=0;
        $data['age_wise_filter']['70-80']=0;
        $data['age_wise_filter']['80-90']=0;
        $data['age_wise_filter']['90-100']=0;


		for ($i=0; $i < count($allpatients); $i++) { 


			if ($allpatients[$i]['patient_age']<=10) {

				$data['age_wise_filter']['0-10']++;

			}
			if ($allpatients[$i]['patient_age']>10 && $allpatients[$i]['patient_age']<=20)  $data['age_wise_filter']['10-20']++;
			if ($allpatients[$i]['patient_age']>20 && $allpatients[$i]['patient_age']<=30) {

				$data['age_wise_filter']['20-30']++;
				
			}
			if ($allpatients[$i]['patient_age']>30 && $allpatients[$i]['patient_age']<=40) {

				$data['age_wise_filter']['30-40']++;
				
			}
			if ($allpatients[$i]['patient_age']>40 && $allpatients[$i]['patient_age']<=50) {

				$data['age_wise_filter']['40-50']++;
				
			}
            if ($allpatients[$i]['patient_age']>50 && $allpatients[$i]['patient_age']<=60)  $data['age_wise_filter']['50-60']++;
            if ($allpatients[$i]['patient_age']>60 && $allpatients[$i]['patient_age']<=70)  $data['age_wise_filter']['60-70']++;
            if ($allpatients[$i]['patient_age']>70 && $allpatients[$i]['patient_age']<=80)  $data['age_wise_filter']['70-80']++;
            if ($allpatients[$i]['patient_age']>80 && $allpatients[$i]['patient_age']<=90)  $data['age_wise_filter']['10-20']++;
            if ($allpatients[$i]['patient_age']>90 && $allpatients[$i]['patient_age']<=100)  $data['age_wise_filter']['10-20']++;
		}
		$data['age_wise_filter']['0-10p']=(($data['age_wise_filter']['0-10']*100)/count($allpatients));
		$data['age_wise_filter']['10-20p']=(($data['age_wise_filter']['10-20']*100)/count($allpatients));
		$data['age_wise_filter']['20-30p']=(($data['age_wise_filter']['20-30']*100)/count($allpatients));
		$data['age_wise_filter']['30-40p']=(($data['age_wise_filter']['30-40']*100)/count($allpatients));
		$data['age_wise_filter']['40-50p']=(($data['age_wise_filter']['40-50']*100)/count($allpatients));
        $data['age_wise_filter']['50-60p']=(($data['age_wise_filter']['50-60']*100)/count($allpatients));
        $data['age_wise_filter']['60-70p']=(($data['age_wise_filter']['60-70']*100)/count($allpatients));
        $data['age_wise_filter']['70-80p']=(($data['age_wise_filter']['70-80']*100)/count($allpatients));
        $data['age_wise_filter']['80-90p']=(($data['age_wise_filter']['80-90']*100)/count($allpatients));
        $data['age_wise_filter']['90-100p']=(($data['age_wise_filter']['90-100']*100)/count($allpatients));
		//echo "<pre>";
    	//print_r($data['age_wise_filter']);die;
        $diaseases_age = array();

        $diaseases_age[] = $data['age_wise_filter']['0-10p'];
        $diaseases_age[] = $data['age_wise_filter']['10-20p'];
        $diaseases_age[] = $data['age_wise_filter']['20-30p'];
        $diaseases_age[] = $data['age_wise_filter']['40-50p'];
        $diaseases_age[] = $data['age_wise_filter']['30-40p'];

        $diaseases_age[] = $data['age_wise_filter']['40-50p'];
        $diaseases_age[] = $data['age_wise_filter']['50-60p'];
        $diaseases_age[] = $data['age_wise_filter']['60-70p'];
        $diaseases_age[] = $data['age_wise_filter']['70-80p'];
        $diaseases_age[] = $data['age_wise_filter']['80-90p'];
        $diaseases_age[] = $data['age_wise_filter']['90-100p'];

    	
        $diaseases=$this->homes->getalldiaseases();
    	$a_total = count($allpatients);
        $d_total = 0;

    	for($i=0;$i<count($diaseases);$i++)
    	{
            
    		$diaseases[$i]['count']=0;
    		for($j=0;$j<count($patients);$j++)
    		{
    			$myArray = explode(',', $patients[$j]['diaseases_ids']);
    			for($k=0;$k<count($myArray);$k++)
    			{
    				if($diaseases[$i]['diaseases_id']==$myArray[$k]) {    				
    					$diaseases[$i]['count']++;
                        $d_total++;
    				}
    			}
    		}
    	}
        $diaseases_names = array();
        $diaseases_no = array();
        $diaseases_no_p = array();
        
    	for($i=0;$i<count($diaseases);$i++)
    	{
            $diaseases_no[] = $diaseases[$i]['count'];
    		$diaseases_no_p[]=(($diaseases[$i]['count']*100)/$d_total);
            $diaseases_names[] = $diaseases[$i]['diaseases_name'];
    	}
        $uhc_names = array();
        $uhc_counts = array();

        for($i=0;$i<count($uhcgroups);$i++){
            $uhc_names[] = $uhcgroups[$i]['hospital_name'];
            $uhc_counts[] = $uhcgroups[$i]['total'];
        }
        $total = $this->homes->getpatientsbyhospitalid($this->session->userdata('hospital_id'));
        $data['males']=0;
        $data['females']=0;
        $data['other']=0;
        for($i=0;$i<count($total);$i++){
            if($total[$i]['patient_gender']==0) $data['other']++;
            else if($total[$i]['patient_gender']==1) $data['males']++;
            else if($total[$i]['patient_gender']==2) $data['females']++;
            else;
        }
    	
        $data['uhc_names']=$uhc_names;
        $data['uhc_counts']=$uhc_counts;
    	$data['diaseases']=$diaseases;
        $data['diaseases_names']=$diaseases_names;
        $data['diaseases_no']=$diaseases_no;
        $data['diaseases_no_p']=$diaseases_no_p;

        $data['diaseases_age']=$diaseases_age;
        // $data['d_total']=$d_total;
        $data['a_total']=$a_total;
    	//echo "<pre>";
    	//print_r($patients);die;
        $hosp_list=$this->homes->getallhospitals();
        $occu_list=$this->homes->getocculist();
       $data['occu_list'] =  $occu_list;
        $data['hosp_list']=$hosp_list;
        
    	$data['diaseases'] = $diaseases;
           $data['staff'] = $this->homes->getallstaffbyhospitalid($this->session->userdata('hospital_id')); 
    	$data['wards'] = $wards;
           $config['center'] = '22.3039, 70.8022';
$config['zoom'] = 17;
$this->googlemaps->initialize($config);

$circle = array();
$circle['center'] = '22.3039, 70.8022';
$circle['radius'] = '100';
$this->googlemaps->add_circle($circle);
$data['map'] = $this->googlemaps->create_map();
		$this->load->view('user/staff_home',$data);
	
	}
  public function diseasesdata($id)
    {
            $session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }
           // $areas=$this->homes->getallareas();
            $diaseases = $this->homes->getalldiaseases();
            $wards = $this->homes->getallwards();
            //echo "<pre>";
            //print_r($wards);die;
            $patients=$this->homes->getallpatients();
        $allpatients=$this->homes->getallpatientslist();
        $uhcgroups=$this->homes->getuhcgroups();

        $data['age_wise_filter']['0-10']=0;
        $data['age_wise_filter']['10-20']=0;
        $data['age_wise_filter']['20-30']=0;
        $data['age_wise_filter']['30-40']=0;
        $data['age_wise_filter']['40-50']=0;
        $data['age_wise_filter']['50-60']=0;
        $data['age_wise_filter']['60-70']=0;
        $data['age_wise_filter']['70-80']=0;
        $data['age_wise_filter']['80-90']=0;
        $data['age_wise_filter']['90-100']=0;


        for ($i=0; $i < count($allpatients); $i++) { 


            if ($allpatients[$i]['patient_age']<=10) {

                $data['age_wise_filter']['0-10']++;

            }
            if ($allpatients[$i]['patient_age']>10 && $allpatients[$i]['patient_age']<=20)  $data['age_wise_filter']['10-20']++;
            if ($allpatients[$i]['patient_age']>20 && $allpatients[$i]['patient_age']<=30) {

                $data['age_wise_filter']['20-30']++;
                
            }
            if ($allpatients[$i]['patient_age']>30 && $allpatients[$i]['patient_age']<=40) {

                $data['age_wise_filter']['30-40']++;
                
            }
            if ($allpatients[$i]['patient_age']>40 && $allpatients[$i]['patient_age']<=50) {

                $data['age_wise_filter']['40-50']++;
                
            }
            if ($allpatients[$i]['patient_age']>50 && $allpatients[$i]['patient_age']<=60)  $data['age_wise_filter']['50-60']++;
            if ($allpatients[$i]['patient_age']>60 && $allpatients[$i]['patient_age']<=70)  $data['age_wise_filter']['60-70']++;
            if ($allpatients[$i]['patient_age']>70 && $allpatients[$i]['patient_age']<=80)  $data['age_wise_filter']['70-80']++;
            if ($allpatients[$i]['patient_age']>80 && $allpatients[$i]['patient_age']<=90)  $data['age_wise_filter']['10-20']++;
            if ($allpatients[$i]['patient_age']>90 && $allpatients[$i]['patient_age']<=100)  $data['age_wise_filter']['10-20']++;
        }
        $data['age_wise_filter']['0-10p']=(($data['age_wise_filter']['0-10']*100)/count($allpatients));
        $data['age_wise_filter']['10-20p']=(($data['age_wise_filter']['10-20']*100)/count($allpatients));
        $data['age_wise_filter']['20-30p']=(($data['age_wise_filter']['20-30']*100)/count($allpatients));
        $data['age_wise_filter']['30-40p']=(($data['age_wise_filter']['30-40']*100)/count($allpatients));
        $data['age_wise_filter']['40-50p']=(($data['age_wise_filter']['40-50']*100)/count($allpatients));
        $data['age_wise_filter']['50-60p']=(($data['age_wise_filter']['50-60']*100)/count($allpatients));
        $data['age_wise_filter']['60-70p']=(($data['age_wise_filter']['60-70']*100)/count($allpatients));
        $data['age_wise_filter']['70-80p']=(($data['age_wise_filter']['70-80']*100)/count($allpatients));
        $data['age_wise_filter']['80-90p']=(($data['age_wise_filter']['80-90']*100)/count($allpatients));
        $data['age_wise_filter']['90-100p']=(($data['age_wise_filter']['90-100']*100)/count($allpatients));
        //echo "<pre>";
        //print_r($data['age_wise_filter']);die;
        $diaseases_age = array();

        $diaseases_age[] = $data['age_wise_filter']['0-10p'];
        $diaseases_age[] = $data['age_wise_filter']['10-20p'];
        $diaseases_age[] = $data['age_wise_filter']['20-30p'];
        $diaseases_age[] = $data['age_wise_filter']['40-50p'];
        $diaseases_age[] = $data['age_wise_filter']['30-40p'];

        $diaseases_age[] = $data['age_wise_filter']['40-50p'];
        $diaseases_age[] = $data['age_wise_filter']['50-60p'];
        $diaseases_age[] = $data['age_wise_filter']['60-70p'];
        $diaseases_age[] = $data['age_wise_filter']['70-80p'];
        $diaseases_age[] = $data['age_wise_filter']['80-90p'];
        $diaseases_age[] = $data['age_wise_filter']['90-100p'];

        
        $diaseases=$this->homes->getalldiaseases();
        $a_total = count($allpatients);
        $d_total = 0;

        for($i=0;$i<count($diaseases);$i++)
        {
            
            $diaseases[$i]['count']=0;
            for($j=0;$j<count($patients);$j++)
            {
                $myArray = explode(',', $patients[$j]['diaseases_ids']);
                for($k=0;$k<count($myArray);$k++)
                {
                    if($diaseases[$i]['diaseases_id']==$myArray[$k]) {                  
                        $diaseases[$i]['count']++;
                        $d_total++;
                    }
                }
            }
        }
        $diaseases_names = array();
        $diaseases_no = array();
        $diaseases_no_p = array();
        
        for($i=0;$i<count($diaseases);$i++)
        {
            $diaseases_no[] = $diaseases[$i]['count'];
            $diaseases_no_p[]=(($diaseases[$i]['count']*100)/$d_total);
            $diaseases_names[] = $diaseases[$i]['diaseases_name'];
        }
        $uhc_names = array();
        $uhc_counts = array();

        for($i=0;$i<count($uhcgroups);$i++){
            $uhc_names[] = $uhcgroups[$i]['hospital_name'];
            $uhc_counts[] = $uhcgroups[$i]['total'];
        }
        $total = $this->homes->getpatientsbyhospitalid($this->session->userdata('hospital_id'));
        $data['males']=0;
        $data['females']=0;
        $data['other']=0;
        for($i=0;$i<count($total);$i++){
            if($total[$i]['patient_gender']==0) $data['other']++;
            else if($total[$i]['patient_gender']==1) $data['males']++;
            else if($total[$i]['patient_gender']==2) $data['females']++;
            else;
        }
        
        $data['uhc_names']=$uhc_names;
        $data['uhc_counts']=$uhc_counts;
        $data['diaseases']=$diaseases;
        $data['diaseases_names']=$diaseases_names;
        $data['diaseases_no']=$diaseases_no;
        $data['diaseases_no_p']=$diaseases_no_p;

        $data['diaseases_age']=$diaseases_age;
        // $data['d_total']=$d_total;
        $data['a_total']=$a_total;
        //echo "<pre>";
        //print_r($patients);die;
        $hosp_list=$this->homes->getallhospitals();
        $occu_list=$this->homes->getocculist();
       $data['occu_list'] =  $occu_list;
        $data['hosp_list']=$hosp_list;
        
        $data['diaseases'] = $diaseases;
        $data['wards'] = $wards;
        $data=$this->homes->getpatientbydiseases($id);



            $config['center'] = '22.3039, 70.8022';
$config['zoom'] = 12;
$this->googlemaps->initialize($config);

for($i=0;$i<count($data);$i++){
    $circle= array();

$circle['center'] = $data[$i]['latitude'].",".$data[$i]['longitude'];
//echo $circle['center'];die;
$circle['radius'] = '500';
$this->googlemaps->add_circle($circle);
}
$data['map'] = $this->googlemaps->create_map();

        $this->load->view('user/staff_home',$data);

    }
    public function edit_staff()
    {

      $session = $this->session->userdata('staff_id');
        if((empty($session)))
        {
            redirect(site_url('welcome'), 'refresh');
            exit;
        }
            if( $this->input->server('REQUEST_METHOD') == 'POST')
        {
            $postdata=$this->input->post();
             $this->form_validation->set_rules('staff_name', 'Username', 'required');
             $this->form_validation->set_rules('staff_phone', 'Password', 'required');
             $this->form_validation->set_rules('staff_gender', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_address', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_areacode', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_username', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_password', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_shift', 'Select Hospital', 'required');

            
             if ($this->form_validation->run() == FALSE)
             {
                
                $data['errormsg'] = '';
                $data['addstaff'] = $postdata;
               $this->load->view('user/edit_staff',$data); 
             }
             else
             {
                $this->homes->updatestaff($postdata);
                 $data['message'] = 'Staff Updated succesfully.';
            
               $this->load->view('user/add_staff',$data);
             }
        }
        else
        {
                $staff=$this->homes->getstaffbystaffid();
                $data['addstaff']=$staff[0];
                  $hosp_list=$this->homes->getallhospitals();
        $data['hosp_list']=$hosp_list;
                $this->load->view('user/edit_staff',$data);
        }


      }
    
	public function add_staff()
	{
        $hosp_list=$this->homes->getallhospitals();
        $data['hosp_list']=$hosp_list;
        
		if( $this->input->server('REQUEST_METHOD') == 'POST')
        {
            $postdata=$this->input->post();
             $this->form_validation->set_rules('staff_name', 'Username', 'required');
             $this->form_validation->set_rules('staff_phone', 'Password', 'required');
             $this->form_validation->set_rules('staff_gender', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_address', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_areacode', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_username', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_password', 'Select Hospital', 'required');
             $this->form_validation->set_rules('staff_shift', 'Select Hospital', 'required');

            
             if ($this->form_validation->run() == FALSE)
             {
                
                $data['errormsg'] = '';
                $data['addstaff'] = $postdata;
               $this->load->view('user/add_staff',$data); 
             }
             else
             {
                $this->homes->addstaff($postdata);
                 $data['message'] = 'Staff added succesfully.';
            
               $this->load->view('user/add_staff',$data);
             }
        }
        else
        {
                $this->load->view('user/add_staff',$data);
        }
	}
	
}
?>