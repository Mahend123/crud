<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Main_model');
    //$this->load->helper(array('form', 'url'));
  }

  public function index(){
    // load base_url 
    $this->load->helper('url');
    //load model 
    $this->load->model('Main_model');
    // get cities 
//    $data['cities'] = $this->Main_model->getCity();
  
    $this->load->view('user_view'); 
    if($this->input->post("save")==TRUE)
    { 
   // $this->load->view('user_view'); 
         $value['fname']=$this->input->post('fname');
         $value['lname']=$this->input->post('lname');
         $value['email']=$this->input->post('email');
                        $pass =$this->input->post('password');   
         $value['password']=md5($pass);
        // //$value['image']=$this->input->post('image');
          $this->load->library('upload');
          $image = array();
          $ImageCount = $_FILES['userfile']['name'];
       // for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['userfile']['name'];
            $_FILES['file']['type']       = $_FILES['userfile']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['userfile']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['userfile']['error'];
            $_FILES['file']['size']       = $_FILES['userfile']['size'];
            // File upload configuration
            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                 $value['userfile'] = $imageData['file_name'];
            }
         $value['gender']=$this->input->post('gender');
         $skill_data=$this->input->post('skill[]');
         $value['skill']= implode(" ",$skill_data);
         $value['country']=$this->input->post('country');
         $value['state']=$this->input->post('state');
         $value['city']=$this->input->post('city');

         $n= $this->Main_model->saverecord($value);
           // echo "$n";
            if($n>0)
                echo "<script> alert('Saved Record') </script>";
            else
                echo "<script> alert('Record Not Saved ') </script>";
    }
  }

  public function showall()
   {
       $data["res"]=$this->Main_model->showrecord();
       //echo "<pre>"; var_dump($data);
       // 
       //for sending data controller to view ***
      $this->load->view("showallview",$data);
       //***************************************
   
   }

   public function Edit($id){
      $data["res"]=$this->Main_model->EditRecord($id);
      $this->load->view("Edit_view",$data);
   
   // $this->load->view('Edit_view'); 
    if($this->input->post("update")==TRUE){
         $value['id']=$this->input->post('id'); 
         $value['fname']=$this->input->post('fname');
         $value['lname']=$this->input->post('lname');
         $value['email']=$this->input->post('email');
                  $pass =$this->input->post('password');   
         $value['password']=md5($pass);

        // //$value['image']=$this->input->post('image');


          $this->load->library('upload');
          $image = array();
          $ImageCount = $_FILES['userfile']['name'];
       // for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['userfile']['name'];
            $_FILES['file']['type']       = $_FILES['userfile']['type'];
            $_FILES['file']['tmp_name']   = $_FILES['userfile']['tmp_name'];
            $_FILES['file']['error']      = $_FILES['userfile']['error'];
            $_FILES['file']['size']       = $_FILES['userfile']['size'];
            // File upload configuration
            $uploadPath = './uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                 $value['userfile'] = $imageData['file_name'];
            }
         $value['gender']=$this->input->post('gender');
         $skill_data=$this->input->post('skill[]');
         $value['skill']= implode(" ",$skill_data);
         $value['country']=$this->input->post('country');
         $value['state']=$this->input->post('state');
         $value['city']=$this->input->post('city');
          $n= $this->Main_model->UpdateRecord($value);
            if($n>0)
                {
                echo "<script> alert('Update Record') </script>";
                
                redirect("http://localhost/crud/index.php/User/showall/");    
                }
              
            else
            {
                echo "<script> alert('Record Not Update ') </script>";
            }
    }
   }

   public function Delete(){
    $id=$this->uri->segment(3);
    $r=$this->Main_model->deleteentry($id);
    if($r>0){
    echo "<script> alert('Delete Record') </script>";
    redirect("http://localhost/crud/index.php/User/showall/");    
    }
    else{
      echo "<script> alert('Record Not Delete ') </script>";
    }
   }
}






















































/*
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('users_model');
  }
 
  public function index(){
    //load session library
    $this->load->library('session');
 
    //restrict users to go back to login if session has been set
    if($this->session->userdata('user')){
      redirect('home');
    }
    else{
      $this->load->view('login_page');
    }
  }
 
  public function login(){
    //load session library
    $this->load->library('session');
 
    $email = $_POST['email'];
    $password = $_POST['password'];
      
    $data = $this->users_model->login($email, $password);
 
    if($data){
      $this->session->set_userdata('user', $data);
      redirect('home');
    }
    else{
      header('location:'.base_url().$this->index());
      $this->session->set_flashdata('error','Invalid login. User not found');
    } 
  }
 
  public function home(){
    //load session library
    $this->load->library('session');
 
    //restrict users to go to home if not logged in
    if($this->session->userdata('user')){
      $this->load->view('home');
    }
    else{
      redirect('/');
    }
 
  }
 
  public function logout(){
    //load session library
    $this->load->library('session');
    $this->session->unset_userdata('user');
    redirect('/');
  }
 
}*/