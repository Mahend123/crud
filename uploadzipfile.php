<?=
public function upoloaddocs_zip($dbaid){ 
	   
	    $this->db->select('*');
		$this->db->from('businessinfo');
		$this->db->where('id',$dbaid);
		$query = $this->db->get();
        $result = $query->row_array();
        
        $dbaname = preg_replace("/[^a-zA-Z0-9\s.]/", "", $result['dbaname']);
        $newfilenm = $dbaname.time();
        
        $this->form_validation->set_rules('filename','filename','trim|required');
        $this->form_validation->set_rules('usercode','usercode','trim|required');
        
        if($this->form_validation->run()==true){
          
          if ($_FILES["userfile"]["size"] > 200000) {
            
	       if (isset($_FILES['userfile']) ) {
                    $curl = curl_init();
                    $type = $_FILES['userfile']['type'];
                    $tmp_name = $_FILES['userfile']['tmp_name'];
                    $name = $_FILES['userfile']['name'];
                
                $POST_DATA = array("file" => curl_file_create($tmp_name,$type,$name),"dbaname"=>$newfilenm);
                curl_setopt($curl, CURLOPT_URL, 'https://app.abcname.com/assets/uploadba_test.php');
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type:multipart/form-data'));
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $POST_DATA);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                
                $response = curl_exec($curl);
                curl_close($curl);
                $data = json_decode($response,true);
                
                if($data['status']==1 && $data['fnname'] !=''){
                  $res = $this->AppFormSubmit->uploaddocument_zip($dbaid,$data['fnname']);  
                  if($res=='true'){    
                    $this->session->set_flashdata('success','Document Successfully Uploaded'); 
                    }else{
                        $this->session->set_flashdata('failed','Something Went Wrong..Please Try again'); 
                    }
                }else{
                    $this->session->set_flashdata('failed','Something Went Wrong..Please check file'); 
                }
            }else{
                $this->session->set_flashdata('failed','Not upload file.Try again'); 
            }
          }else{
            $this->session->set_flashdata('failed','Sorry, your file is too large.');   
          }    
            
        }else{
            $this->session->set_flashdata('failed','Insert All Filed'); 
        }
        redirect(base_url().'ApplicationStep/merchant/'.$dbaid);
	 }

























<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// echo "<pre>";
// echo ($_POST['dbaname']);
// echo "<pre>";
// print_r($_FILES);
// exit;

if($_POST['dbaname']){
    $extension = new SplFileInfo($_FILES["file"]["name"]);
    $ext=$extension->getExtension();
    
    $fileName = $_FILES["file"]["name"];
    
    $fileNm = $_POST['dbaname'].$fileName;
    
    $fileTmpLoc = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"]; 
    $fileSize = $_FILES["file"]["size"]; 
    $fileErrorMsg = $_FILES["file"]["error"];
    
    if($ext == 'zip' || $ext == 'ZIP'){
         if(move_uploaded_file($fileTmpLoc, "/home/abcfolder/public_html/supersite.abcname.com/admin/doc_upload_zipfile/$fileNm")){
           $dataToReturn['status'] = 1;
           $dataToReturn['fnname'] = $fileNm;
           echo json_encode($dataToReturn);
         }else{
           $dataToReturn['status'] = 0;
           $dataToReturn['fnname'] = '';
           echo json_encode($dataToReturn);
         }
    }else{
        $dataToReturn['status'] = 0;
        $dataToReturn['fnname'] = '';
        echo json_encode($dataToReturn);
    }
}else{
    $dataToReturn['status'] = 0;
    $dataToReturn['fnname'] = '';
    echo json_encode($dataToReturn);
}    
    