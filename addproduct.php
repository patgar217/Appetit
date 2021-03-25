<!--PROCESS: Add new product-->
<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$pdes=$_POST['pdes'];
	$price=$_POST['price'];
	$category=$_POST['category'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	
	$sql="insert into product (productname, categoryid, productdes, price, photo) values ('$pname', '$category', '$pdes','$price', '$location')";
	$conn->query($sql);

	header('location:product.php');

?>