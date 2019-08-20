<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

   function __construct() 
    {
        parent::__construct();
        
        //for connecting to database
        $this->load->database();
    }  


  public function saverecord($value){ 

    $n=$this->db->insert("reg_table",$value);
    return $n;
  }

  public function getRecord(){
      $this->db->select("*");
      $this->db->from('reg_table');
      $query = $this->db->get();
      return $query->result();
    }

    function showrecord()
    {
        $query=$this->db->get("reg_table");
        if($query->num_rows()>0)
        {
          return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    public function EditRecord($id){
      $this->db->select('*');
      $this->db->from('reg_table');
      $this->db->where('id',$id );
      $query = $this->db->get();
      return $result = $query->row_array();
    }


    public function UpdateRecord($value){
      $id=$this->db->where("id",$value['id']);
      return $this->db->update("reg_table",$value);
    }

    public function deleteentry($id){
      $n=$this->db->delete('reg_table',array('id'=>$id));
      return $n;
    }
}