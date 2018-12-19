<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Portal</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <h2>LOGIN PAGE</h2>
    <div class="container">
      <form action="<?php echo base_url()?>login/enter" method="post">
        <input type="text" name="name" placeholder="Admin Name">
        <input type="password" name="password" placeholder="Password">
        <button class="btn btn-warning btn-sm" type="submit" name="button">Submit</button>
        <div class="message" style="color:maroon;"><?php echo $this->session->flashdata('error');?></div>
      </form>
  </div>

  </body>
</html>

<style media="screen">

h2
{
  text-align: center;
  color:limegreen;
  margin-top: 30px;
}
  .container
  {
    padding-top: 30px;
    padding-left: 55px;
    margin: 40px auto;
    width: 550px;
    height: 100px;
    background-color: grey;
    border:2px solid yellow;
  }
  body
  {

    height:600px;
    background-image: url('../assets/images/home.jpg');

  }
</style>
