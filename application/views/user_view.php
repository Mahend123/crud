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
<body>
     <fieldset>
     <form method="post" enctype="multipart/form-data"> 
     <table border='0'>  
     <tr>
       <td>First_name</td>
       <td> <input type="text" name="fname" required> </td>
     </tr>
     <tr>
       <td>Last_name</td>
       <td> <input type="text" name="lname" required> </td>
     </tr>
     <tr>
       <td>Email</td>
       <td> <input type="email" name="email" required> </td>
     </tr>
     <tr>
       <td>Password</td>
       <td> <input type="password" name="password" id="pass" onkeyup="validate()"> </td>
        <td><span id="pdisplay" style="color:red;">*</span></td>
     </tr>
     <tr>
       <td>Confirm Password</td>
       <td>  <input type="password" id="cpass" name="confirm_password"  onkeyup="validate()" /> </td>
       <td><span id="rdisplay" style="color:red;">*</span></td>
     </tr> 
     <tr>
       <td>Images</td>
       <td> <input type="file" name="userfile" required> </td>
     </tr>
     <tr>
      <td>Gender</td>
      <td>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
      </td>
      </tr>
      <tr>
        <td>Skill</td>
        <td>
          <input type="checkbox" name="skill[]" value="C">C
          <input type="checkbox" name="skill[]" value="C++">C++ 
          <input type="checkbox" name="skill[]" value="PHP">PHP
        </td>
      </tr>
    <tr>
      <tr>
        <td>Country</td>
        <td>
         <select name="country" class="countries" id="countryId">
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
       <input onclick="return validate()"  type="submit" name="save" value="save"></td>
    </tr>
  </table>
</form>
</fieldset>

    <tr>
        <td>
            <a href="<?=base_url();?>index.php/User/showall/">Show All Record</a>
        </td>
    </tr>
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/countrystatecity.js"></script>


 </body>
</div>
</html>