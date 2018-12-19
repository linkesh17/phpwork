<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// if ($_SERVER['HTTP_REFERER'] == base_url().'user') {
//   header('Location: login'); //redirect to some other page
//   exit();
// }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>List of Users</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-1">
          <a href="<?php echo base_url() ?>user/"><button class="btn btn-warning btn-sm">Home</button></a>
        </div>
        <div class="col-1">
          <a href="<?php echo base_url() ?>login/logout"><button class="btn btn-warning btn-sm">Logout</button></a>
        </div>
        <div class="col-10">
          <h3>A Simple CRUD Application</h3>
      </div>
      </div>
      <div class="row">
        <div class="col-6">
          <?php
          if(isset($user_details))
          {
            // print_r ($user_details);
            // print_r ($user_details[0]['name']);
            ?>
            <form method="post"  action="<?php echo base_url() ?>user/update" >
                <label>Update Existing User:</label><br>
                <input type="text" name="name" value="<?php echo $user_details[0]['name'] ?>" placeholder="Enter your name">
                <input type="text" name="age" value="<?php echo $user_details[0]['age'] ?>" placeholder="Enter your age">
                <button type="submit" name="button" class="btn btn-primary btn-sm" style="margin-top:-3px;">Update</button>
            </form>
          <?php } ?>
          <?php
          if(!isset($user_details))
          {
          ?>
          <form method="post"  action="<?php echo base_url() ?>user/newuser" >
              <label>Insert New User:</label><br>
              <input type="text" name="name" value="" placeholder="Enter your name">
              <input type="text" name="age" value=""placeholder="Enter your age">
              <button type="submit" name="button" class="btn btn-primary btn-sm" style="margin-top:-3px;">Submit</button>
          </form>
        <?php } ?>
        </div>
        <div class="col-6">

          <form method="post"  action="<?php echo base_url() ?>user/deleteuser" >
              <label>Delete Existing User:</label><br>
            <input type="text" name="name" placeholder="Enter name to delete">
            <button type="submit" name="button" class="btn btn-primary btn-sm" style="margin-top:-3px;">Submit</button>
          </form>

        </div>

      </div>

    </div>
    <table border="1" cellspacing="1">
      <th>Name</th>
      <th>Age</th>
      <th>Edit</th>
      <th>Delete</th>
    <?php
    if(isset($details))
    {
    foreach ($details as $key => $value) {
      ?>
        <tr>
          <td><?php echo $value['name'] ?></td>
          <td><?php echo $value['age'] ?></td>
          <td><a href="<?php echo base_url();?>user/edit/<?php echo $value['name'] ?>/<?php echo $value['age'] ?>">Edit</a></td>
          <td><a href="<?php echo base_url();?>user/delete/<?php echo $value['name'] ?>">Delete</a></td>
          </tr>

 <?php
}}
    ?>
   </table>
   <div id="final" class="container">
     <?php if($this->uri->segment(2)=='inserted')
     {
       echo "<h4>Data Inserted Successfully..!!</h4>";
     }
     ?>
     <?php if($this->uri->segment(2)=='deleted')
     {
       echo "<h4>Data Deleted Successfully..!!</h4>";
     }
     ?>
   </div>
  </body>
</html>

<style media="screen">
body h3
{
  text-align: center;
  color:limegreen;
  margin-bottom: 30px;
}
  body
  {
    background-color:black;
    color:white;
    margin-top:50px;
  }
  table
  {
    width: 550px;
    margin: 40px auto;
    text-align: center;
    font-size: 1.2em;
    border: 2px solid yellow;
  }
  label
  {
    color:white;
  }
  #final
  {
    width: 350px;
    margin: 20px auto;
  }
</style>
