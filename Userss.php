<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Userss extends CI_Model {

  function returnusers()
  {
    $this->load->database();
    $data=$this->db->query("select name,age from data");
    return $data->result_array();
  }

  function updatedetails($name)
  {
      $this->load->database();
      $this->db->where('name', $name);
      $q = $this->db->get('data');
      $d = $q->result_array();
      // print_r ($d);
      return $d;
  }
  function deletetabuser($name)
  {
    $this->load->database();
    $this->db->where('name',$name);
    $this->db->delete('data');
  }
  function updateuser($data)
  {
    $this->load->database();
    $this->db->where('name', $data['name']);
    $this->db->update('data',$data);
  }
  function insertusers($data)
  {
    $this->load->database();
    $this->db->insert('data',$data);
  }
  function deleteuser($data)
  {
    $this->load->database();

    $this->db->where('name', $data);
    $q = $this->db->get('data');
    $d = $q->result_array();
    if(!empty($d))
    {
    $this->db->where('name', $data);
    $this->db->delete('data');
    return 1;
    }
    else {
      return 0;
    }

  }
}
?>
