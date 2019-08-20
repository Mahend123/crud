









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
   function validate(){
      var pass=document.getElementById("pass");
      if(pass.value===cpass.value)
        {
          var rdisplay=document.getElementById("rdisplay");
          rdisplay.innerHTML="Password Matched";
          rdisplay.style.color="green";
          }
       else
       {
        var rdisplay=document.getElementById("rdisplay");
        rdisplay.innerHTML="Password does not Matched";
           rdisplay.style.color="red";
           return false;
       }           
  }
</script>
</head>
<div class="container">
    <tr>
        <td>
            <a class="btn btn-info" href="<?=base_url();?>index.php/User/showall/">Show All Record</a>
        </td>
    </tr>
<div align="center">
<body>
     <form method="post" enctype="multipart/form-data"> 
     <table border='0'>  
     <tr>
       <td>Id</td>
       <td> <input type="text" value="<?php echo $res['id']; ?>" name="id" readonly> </td>
     </tr>
     <tr>
       <td>First_name</td>
       <td> <input type="text" value="<?php echo $res['fname']; ?>" name="fname"> </td>
     </tr>
     <tr>
       <td>Last_name</td>
       <td> <input type="text" value="<?php echo $res['lname']; ?>" name="lname" > </td>
     </tr>
     <tr>
       <td>Email</td>
       <td> <input type="email" value="<?php echo $res['email']; ?>" name="email" > </td>
     </tr>
     <tr>
       <td>Password</td>
       <td> <input type="password" value="<?php echo $res['password']; ?>" name="password" id="pass" onkeyup="validate()"> </td>
        <td><span id="pdisplay" style="color:red;">*</span></td>
     </tr>
     <tr>
       <td>Confirm Password</td>
       <td>  <input type="password" id="cpass" value="<?php echo $res['password']; ?>" name="confirm_password"  onkeyup="validate()" /> </td>
       <td><span id="rdisplay" style="color:red;">*</span></td>
     </tr> 
     <tr>
       <td>Images</td>
       <td> <input type="file" name="userfile" > </td>
     </tr>
     <tr>
      <td>Gender</td>
      <td>
        <input type="radio" name="gender" value="male" <?php if($res['gender']=="male"){ echo "checked";}?> > Male
        <input type="radio" name="gender" value="female" <?php if($res['gender']=="female"){ echo "checked";}?> > Female
        <input type="radio" name="gender" value="other" <?php if($res['gender']=="other"){ echo "checked";}?> > Other
      </td>
      </tr>
      <tr>
        <td>Skill</td>
        <td>
          <?php
          $n= $res['skill'];
          $r =explode(" ", $n);
          ?>

          <input type="checkbox" name="skill[]" <?php foreach ($r as $val) if($val=="C"){ echo "checked";}?> value="C">C
          <input type="checkbox" name="skill[]" <?php foreach ($r as $val) if($val=="C++"){ echo "checked";}?>  value="C++">C++ 
          <input type="checkbox" name="skill[]" <?php foreach ($r as $val) if($val=="PHP"){ echo "checked";}?> value="PHP">PHP
    
        </td>
      </tr>
    <tr>
      <tr>
        <td>Country</td>
        <td>
         <select name="country"  class="countries" id="countryId">
             <option value="">Select Country</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>State</td>
        <td>
          <select name="state" class="states" id="stateId">
          <option value="">Select State</option>
          </select>
        </td>
      </tr>
    <tr>
      <td>City</td>
      <td>
          <select name="city" class="cities" id="cityId">
          <option value="">Select City</option>
      </td>
    </tr>
    <tr>
      <td>
       <input class="btn btn-primary" onclick="return validate()"  type="submit" name="update" value="update"></td>
    </tr>
  </table>
</form>
</fieldset>

  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>


 </body>
 </div>
 </div>
</html>