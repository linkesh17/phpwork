<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  function index()
  {
    // echo "adf";
    $this->load->model('userss');
    $data['details']=$this->userss->returnusers();
    $this->load->view('user',$data);
  }
  function edit()
  {
    $name=$this->uri->segment(3);
    $age=$this->uri->segment(4);

    // echo $name;
    $this->load->model('userss');
    $data['user_details']=$this->userss->updatedetails($name);
    $data['details']=$this->userss->returnusers();
    $this->load->view('user',$data);
  // print_r($dat);
  }

  function delete()
  {
    $name =$this->uri->segment(3);
    $this->load->model('userss');
    $this->userss->deletetabuser($name);
    redirect(base_url().'user/deleted');
  }

  function update(){
    $this->load->model('userss');
    $data=array(
      "name"=> $this->input->post('name'),
      "age"=> $this->input->post('age')
    );
    if(!empty($data['name']))
    {
      $this->userss->updateuser($data);
      redirect(base_url().'user/updated');
    }
    else {
      $this->index();
    }

   }
  function newuser()
  {
    // echo "aldfjn" ;
    $this->load->model('userss');
    $data=array(
      "name"=> $this->input->post('name'),
      "age"=> $this->input->post('age')
    );
    if(!empty($data['name']))
    {
      $this->userss->insertusers($data);
      redirect(base_url().'user/inserted');
    }
    else {
      $this->index();
    }

  }
  function deleteuser()
  {
    $this->load->model('userss');
    $data = strtolower($this->input->post('name'));
    // echo $data;

    $d=$this->userss->deleteuser($data);
    if($d==0)
    {
      $this->index();
    }
    if($d==1) {
     redirect(base_url().'user/deleted');
    }

  }

  function inserted()
  {
    $this->index();
  }
  function deleted()
  {
    $this->index();
  }
  function updated()
  {
    $this->index();
  }

}


 ?>
