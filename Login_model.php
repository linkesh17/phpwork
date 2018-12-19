<?php
class Login_model extends CI_Model {

  function logindata($data)
  {
     // print_r($data);
    $this->load->database();
    $this->db->where('name',$data['username']);
    $this->db->where('password',$data['password']);
    $output=$this->db->get('login');

    if($output->num_rows() > 0)
    {
      return true;
    }
    else {
      return false;
    }

  }
}
 ?>
