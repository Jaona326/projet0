<?php
  // Include database file
  include 'Controler.php';
  $commentObj = new Comment();
  // Insert Record in Comment table
  if(isset($_POST['submit'])) {
    $commentObj->insertData($_POST);
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
</div><br> 
<div class="container">
  <form action="add.php" method="POST">
    <div class="form-group">
      <label for="titre">Titre :</label>
      <input type="text" class="form-control" name="titre" placeholder="Enter Titre" required="">
    </div>
    <div class="form-group">
      <label for="objet">Objet :</label>
      <input type="text" class="form-control" name="objet" placeholder="Enter Objet" required="">
    </div>
    <div class="form-group">
      <label for="sujet">Sujet :</label>
      <input type="text" class="form-control" name="sujet" placeholder="Enter sujet" required="">
    </div>
     <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
<script src="bootstrap-5.1.3\dist\js\jquery-1.11.3.min.js"></script>
<script src="bootstrap-5.1.3\dist\js\bootstrap.min.js"></script>
</body>
</html>