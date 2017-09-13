<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homes extends CI_Model
{
    public function getallhospitals()
    {
	
            $this->db->select();
            $this->db->from('hospitals');
            $this->db->order_by("hospital_id", "desc");
            $result = $this->db->get();
            return $result->result_array();
    }
    public function addstaff($data)
    {
        $data['status']=0;
        $this->db->insert('staff',$data);       
    }
   public function getallstaffbyhospitalid($hospital_id)
    {
    
            $this->db->select();
            $this->db->from('staff');
            $this->db->where(hospital_id,$hospital_id);
            $this->db->order_by("hospital_id", "desc");
            $result = $this->db->get();
            return $result->result_array();
    }
    public function getpatients()
    {
           $this->db->select();
            $this->db->from('patients');
            $this->db->order_by("patient_id", "desc");
            $result = $this->db->get();
            return $result->result_array();
    }


    public function getpatientsbyhospitalid($hosp_id)
    {
           $this->db->select();
            $this->db->from('patients');
            $this->db->order_by("patient_id", "desc");
            $this->db->where('hospital_id',$hosp_id);

            $result = $this->db->get();
            return $result->result_array();
    }
       public function getuhcgroups(){
        $this->db->select('hospital_name, reports.hospital_id, COUNT(carehub_reports.hospital_id) as "total"');
        $this->db->from('reports');

        $this->db->join('hospitals', 'hospitals.hospital_id = reports.hospital_id','left');
        $this->db->where('reports.status',1);
        $this->db->group_by('hospital_id');  

        $result = $this->db->get();
        return $result->result_array();
    }
    public function getocculist()
    {
        $this->db->from('patients');
        $this->db->group_by('patient_occupation');
        $this->db->where('status',1);
        $result = $this->db->get();
        return $result->result_array();
    }
    public function checkauth($logindata)
    {
            $this->db->select();
            $this->db->from('staff');
            $this->db->where('staff_username',$logindata['username']);
            $this->db->where('staff_password',$logindata['password']);
            $this->db->where('hospital_id',$logindata['hospital_id']);
            $result = $this->db->get();
            
            return $result->result_array();
    }

    public function getallpatients()
    {

            $this->db->select();
            $this->db->from('reports');
            $this->db->join('patients', 'patients.patient_id = reports.patient_id','left');

            $this->db->where('reports.status',1);
    
            $result = $this->db->get();
            
            return $result->result_array();
    }

     public function getallpatientsbygender($postdata)
    {
        

            $this->db->select();
            $this->db->from('reports');
            $this->db->join('patients', 'patients.patient_id = reports.patient_id','left');
            $this->db->where('patients.hospital_id', $this->session->userdata('hospital_id'));
        
            if($postdata['gender']!='')
            {

                  $this->db->where('patient_gender',$postdata['gender']);
            }
            if($postdata['occupation']!='')
            {
                   
                  $this->db->where('patient_occupation',$postdata['occupation']);
            }
            if($postdata['start_date']!='')
            {
                 
                  $this->db->where('patients.create_on >=',date('y-m-d',strtotime($postdata['start_date'])));

            }

            if($postdata['end_date']!='') 
                  $this->db->where('patients.create_on <=',date('y-m-d',strtotime($postdata['end_date'])));

          
            $this->db->where('reports.status',1);
    
            $result = $this->db->get();
            
            return $result->result_array();


    }

    public function getallpatientslist()
    {
            $this->db->select();
            $this->db->from('patients');
            $this->db->where('status',1);
    
            $result = $this->db->get();
            
            return $result->result_array();
    }

    public function updatestaff($postdata)
    {
        $this->db->where('staff_id',$this->session->userdata('staff_id'));
        $this->db->update('staff', $postdata);
    }
      public function getstaffbystaffid()
    {
    
            $this->db->select();
            $this->db->from('staff');
            $this->db->where(staff_id,$this->session->userdata('staff_id'));
        
            $result = $this->db->get();
            return $result->result_array();
    }
   public function getallpatientslistbygender($postdata)
    {
            $this->db->select();
            $this->db->from('patients');
            if($postdata['gender']!='')
             $this->db->where('patient_gender',$postdata['gender']);


            if($postdata['occupation']!='')
             $this->db->where('patient_occupation',$postdata['occupation']);

          if($postdata['start_date']!='')
            {
                 
                  $this->db->where('patients.create_on >=',date('y-m-d',strtotime($postdata['start_date'])));

            }

            if($postdata['end_date']!='') 
                  $this->db->where('patients.create_on <=',date('y-m-d',strtotime($postdata['end_date'])));


            $this->db->where('status',1);
    
            $result = $this->db->get();
            
            return $result->result_array();
    }
       public function getpatientbydiseases($d_id)
    {
        
            $this->db->select('patients.patient_areacode,latlongbyareacode.latitude,latlongbyareacode.longitude, COUNT(carehub_patients.patient_id) as "count"');
            $this->db->from('reports');
            $this->db->join('patients', 'patients.patient_id = reports.patient_id','left');

            $this->db->join('latlongbyareacode', 'patients.patient_areacode = latlongbyareacode.areacode','left');
            $this->db->where('reports.status',1);
            $this->db->like('reports.diaseases_ids',$d_id);
            $this->db->group_by('patients.patient_areacode');
            $result = $this->db->get();
            
            return $result->result_array();
    }

    public function getalldiaseases()
    {
            $this->db->select();
            $this->db->from('diaseases');
            $this->db->where('status',1);
            $this->db->order_by('diaseases_id',"desc"                                                                                               );
            $result = $this->db->get();
            
            return $result->result_array();
    }
    public function getallwards()
    {
            $this->db->select();
            $this->db->from('wards');
            $this->db->where('status',1);
    
            $result = $this->db->get();
            
            return $result->result_array();
    }

    public function addpatient($patientdata)
    {
           $this->db->insert('patients',$patientdata);
    }

    public function updatepatient($patientdata,$patient_id)
    {
        $this->db->where('patient_id',$patient_id);
        $this->db->update('patients', $patientdata);
    }

    public function updatepatientreport($patientdata,$patient_id)
    {
        $this->db->where('patient_id',$patient_id);
        $this->db->update('reports', $patientdata);
    }

    public function addpatientreport($patientdatareport)
    {
           $this->db->insert('reports',$patientdatareport);
    }
    public function uploadpdffile($image_data)
    {
    
      
        $imageName = base_convert(str_replace(' ', '', microtime()) . rand(), 10, 36) .".pdf";
            
        $filename = "uploadpdf/".$imageName;
            if (!file_exists($filename)) {
                    fopen($filename,'w');
            }
            chmod($filename,0777);
           
            file_put_contents($filename, $image_data);
            
            //file_put_contents("uploads/".$filename,$imageData);
        
            return $imageName;
    }
    public function getparticularpatient($patienteuniqueid)
    {
            $this->db->select();
            $this->db->from('patients');
            $this->db->where('patients.status',1);
            $this->db->where('patient_unique_id',$patienteuniqueid);
            

            $result = $this->db->get();
            
            return $result->result_array();
    }
    public function getallreportsbypatientid($patienteuniqueid)
    {
            $this->db->select();
            $this->db->from('reports');
            $this->db->where('patient_id',$patienteuniqueid);
            

            $result = $this->db->get();
            
            return $result->result_array();
    }
    public function getallinvoicesbypatientid($patienteuniqueid)
    {
            $this->db->select();
            $this->db->from('invoices');
            $this->db->where('patient_id',$patienteuniqueid);
            

            $result = $this->db->get();
            
            return $result->result_array();
    }
    
    public function getreportbyid($report_id)
    {
        $this->db->select();
            $this->db->from('reports');
            $this->db->where('report_id',$report_id);
            

            $result = $this->db->get();
            
            return $result->result_array();
    }
    public function getparticularpatientbyid($patienteuniqueid)
    {
            $this->db->select();
            $this->db->from('patients');
            $this->db->where('patients.status',1);
            $this->db->where('patients.patient_id',$patienteuniqueid);
            $this->db->join('reports', 'patients.patient_id = reports.patient_id','left');
            $this->db->join('wards', 'patients.ward_id = wards.ward_id','left');

            $result = $this->db->get();
            
            return $result->result_array();
    }

     public function search_patients($patients_data)
    {
            $this->db->select();
            $this->db->from('patients');
            
            $this->db->where('patient_name',$patients_data);
            $result = $this->db->get();
            $result =  $result->result_array();

            if (count($result) == 0)
            {
                $this->db->select();
                $this->db->from('patients');
                
                $this->db->where('patient_phone',$patients_data);
                $result = $this->db->get();
                $result =  $result->result_array();
            }
            if (count($result) == 0)
            {
                 $this->db->select();
                $this->db->from('patients');
                
                $this->db->where('patient_unique_id',$patients_data);
                $result = $this->db->get();
                $result =  $result->result_array();
               
            }
            if (count($result) == 0)
            {
                $this->db->select();
                $this->db->from('patients');
              
                $this->db->like('patient_name',$patients_data);
                $result = $this->db->get();
                $result =  $result->result_array();
                   
            }
            if (count($result) == 0) {
                 $this->db->select();
                 $this->db->from('patients');
                
                 $this->db->like('patient_unique_id',$patients_data);
                 $result = $this->db->get();
                 $result =  $result->result_array();
            }
            if (count($result) == 0) {
                 $this->db->select();
                 $this->db->from('patients');
                
                 $this->db->like('patient_phone',$patients_data);
                 $result = $this->db->get();
                 $result =  $result->result_array();
            }
            if (count($result) == 0) {
                 $this->db->select();
                 $this->db->from('patients');
                 
                 $this->db->like('patient_email',$patients_data);
                 $result = $this->db->get();
                 $result =  $result->result_array();
            }
            return $result;
    }

  
}
?>