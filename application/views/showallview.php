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
</head>
<div class="container">
    
<body>
    <tr>
        <td>
            <a class="btn btn-info" href="<?=base_url();?>index.php/User/">Add New Entry</a>
        </td>
    </tr>
<table border="2" align="center">
    
    <thead>
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>skill</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
        <th>Images</th>    
        <th>Action</th>
    </tr>
    </thead>
<?php
if($res)
{
    foreach ($res as $r)
    {
        ?>
<tbody>        
<tr>
        <td><?php echo $r->id; ?></td>
        <td><?php echo $r->fname; ?></td>
        <td><?php echo $r->lname; ?></td>
        <td><?php echo $r->email; ?></td>
        <td><?php echo $r->gender; ?></td>
        <td><?php echo $r->skill; ?></td>
        <td><?php echo $r->country; ?></td>
        <td><?php echo $r->state; ?></td>
        <td><?php echo $r->city; ?></td>
        <td>  <img style="height: 100px; width: 100px;" src="<?php  echo base_url()."uploads/".$r->userfile; ?>"></td>
        <td>
            <a class="btn btn-primary" href="<?=base_url();?>index.php/User/Edit/<?=$r->id; ?>">Edit</a>
            <a class="btn btn-danger" href="<?=base_url();?>index.php/User/Delete/<?=$r->id; ?>">Delete</a>
        </td>
    </tr>
<?php
    }
    ?>

<?php
}
 else {
    
}
?>
</tbody>
</table>

    
</body>
</div>
</div>
</html>