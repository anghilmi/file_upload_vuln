<?php

/* Hilangkan // pada 1 baris di bawah ini untuk mengaktifkan whitelist filter jenis file upload */
//$whitelist_type = array('image/jpg', 'image/jpeg', 'image/png', 'image/bmp');


if (isset($_POST['submit'])) {

	$target_dir  = 'uploads/';
	$target_path = $target_dir . basename($_FILES['image']['name']); //tambahkan .".pdf" sebelum titik koma
	$uploadOk    = false;
	
	/* Hilangkan // pada 3 baris di bawah ini untuk mengaktifkan whitelist filter jenis file upload */
	//if (!in_array($_FILES['image']['type'], $whitelist_type)){
	//	die("File upload harus berupa gambar!");
	//}
	
	/* Hilangkan // pada 4 baris di bawah ini untuk memeriksa ekstensi file upload */
	//$cek_ekstensi = pathinfo($target_path, PATHINFO_EXTENSION);
	//if($cek_ekstensi == 'php'){
	//	die("Anda mau ngehack ya?");
	//}

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path))
	{	
		$uploadOk = true;	
	}
	else 
	{
		die("Upload gagal!");
	}		

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Upload Gambar</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>

<body>
	
	<?php
	
	if (!empty($uploadOk))
	{
		echo "<p>Upload berhasil:</p>";
		echo "<img src='".$target_path."'>";
	}
	
	?>
		
	<form action="" method="post" enctype="multipart/form-data">
		<p>Masukkan gambar:</p>
		<input type="file" name="image" accept="image/*"/>
		<br/>
		<br/>
		<input type="submit" name="submit"/>
	</form>
	
</body>

</html>
