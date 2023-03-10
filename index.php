<?php
  
  // Include database file
  include 'Controler.php';
  $commentObj = new Comment();
  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $commentObj->deleteRecord($deleteId);
  }
     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP: CRUD </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-5.1.3\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="font\css\all.css"/>
</head>
<body>
<div class="card text-center" style="padding:15px;">
  <h4>PHP: CRUD </h4>
</div><br><br> 


<div class="container">
  <?php
    if (isset($_GET['hafatra1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['hafatra2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['hafatra3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <h2>Voir commentaire
    <a href="add.php" class="btn btn-primary" style="float:right;">Ajout nouveau commentaire</a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Objet</th>
        <th>Sujet</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $comment = $commentObj->displayData(); 
          foreach ($comment as $com) {
        ?>
        <tr>
          <td><?php echo $com['id'] ?></td>
          <td><?php echo $com['titre'] ?></td>
          <td><?php echo $com['objet'] ?></td>
          <td><?php echo $com['sujet'] ?></td>
          <td>
            <a href="edit.php?editId=<?php echo $com['id'] ?>" style="color:green">
              update</a>&nbsp
            <a href="index.php?deleteId=<?php echo $com['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="bootstrap-5.1.3\dist\js\jquery-1.11.3.min.js"></script>
<script src="bootstrap-5.1.3\dist\js\bootstrap.min.js"></script>
</body>
</html>