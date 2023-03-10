<?php
	class Comment
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "commentaire";
		public  $con;
		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}
		// Insert comment data into comment table..........................................
		
		public function insertData($post)
		{
			$titre = $this->con->real_escape_string($_POST['titre']);
			$objet = $this->con->real_escape_string($_POST['objet']);
			$sujet = $this->con->real_escape_string($_POST['sujet']);
			$query="INSERT INTO comment (titre,objet,sujet) VALUES('$titre','$objet','$sujet')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?hafatra1=insert");
			}else{
			    echo "Registration failed try again!";
			}
		}
		// Fetch comment records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM comment";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}
		// Fetch single data for edit from comment table
		public function displayRecordById($id)
		{
		    $query = "SELECT * FROM comment WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}
		// Update comment data into comment table
		public function updateRecord($postData)
		{
		    $titre = $this->con->real_escape_string($_POST['utitre']);
		    $objet = $this->con->real_escape_string($_POST['uobjet']);
		    $sujet = $this->con->real_escape_string($_POST['usujet']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE comment SET titre = '$titre', objet = '$objet', sujet = '$sujet' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?hafatra2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}
		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM comment WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?hafatra3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
	}
?>