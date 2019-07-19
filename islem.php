<?php

	$mysqli = new mysqli('localhost','root','','php_crud') or die(mysql_error($mysqli));
	$update=false;
	$name='';
	$location='';
	if (isset($_POST['save'])) {
		$name=$_POST['name'];
		$location=$_POST['location'];
		$mysqli->query("INSERT INTO php_crud (name,location) VALUES ('$name','$location')") or die($mysqli->error);
		header("location:s.php");
	}
	if (isset($_GET['delete'])){
		$id=$_GET['delete'];
		$mysqli->query("DELETE FROM php_crud WHERE id=$id") or die($mysqli->error());
		header("location:s.php");
	}
		if (isset($_GET['edit'])){
		$id=$_GET['edit'];
		$update=true;
		$result=$mysqli->query("SELECT * FROM php_crud WHERE id=$id") or die($mysqli->error());
		
			$row=$result->fetch_array();
			$name=$row['name'];
			$location=$row['location'];
		


	}

	if (isset($_POST['update'])) {
		$id=$_POST['id'];
		$name=$_POST['name'];
		$location=$_POST['location'];
		$mysqli->query("UPDATE php_crud SET name='$name
		',location='$location' WHERE id=$id") or die($mysqli->error);
		header("location:s.php");
	}