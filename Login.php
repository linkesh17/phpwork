<?php
class Login extends CI_Controller {


function index()
{
  $this->load->view('login');
}
function enter(){
$data = array(
  "username"=>$this->input->post('name'),
  "password"=>$this->input->post('password')
);
// print_r($data);

$this->load->model('Login_model');
  if($this->Login_model->logindata($data))
    {
      $session_data = $data['username'];
     $this->session->set_userdata($session_data);
     // $this->load->view('user');  not refreshing the directed page
     redirect(base_url().'user/');
     // $this->load->view('user');
    }
    else {
      $this->session->set_flashdata('error','Invalid UserName and Password');
      // echo "<h3 style='margin:30px 0px;color:black;'>Ooops...Invalid UserName and Password..!!</h3>";
      // echo '<script language="javascript">';
      // echo 'alert("Invalid User Name / Password")';
      // echo '</script>';
      redirect(base_url().'login/');
      // header('Loacation:http://localhost/CodeIgniter/login/');
      // $this->load->view('login');
    }
}
function logout()
{
  $this->session->unset_userdata('username');
  redirect(base_url().'login/');
}


}


 ?>
