<?php require_once("../connect.php");
$id = $_GET['id']; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Image Upload and edit in PHP and MYSQL database</title>
</head>

<body>
	<?php
	if (isset($_POST['update_submit'])) {
		$description = $_POST['description'];
		$cv_link = $_POST['cv_link'];
		$contact_link = $_POST['contact_link'];
		$github_link = $_POST['github_link'];
		$linkedin_link = $_POST['linkedin_link'];

		$folder = "uploads/";
		$image_file = $_FILES['image']['name'];
		$file = $_FILES['image']['tmp_name'];
		$path = $folder . $image_file;
		$target_file = $folder . basename($image_file);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		if ($file != '') {
			//Set image upload size 
			if ($_FILES["image"]["size"] > 50000000) {
				$error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
			}
			//Allow only JPG, JPEG, PNG & GIF 
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				$error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
			}
		}
		if (!isset($error)) {
			if ($file != '') {
				$res = mysqli_query($connection, "SELECT* from profile WHERE id=1");
				if ($row = mysqli_fetch_array($res)) {
					$deleteimage = $row['image'];
				}
				unlink($folder . $deleteimage);
				move_uploaded_file($file, $target_file);
				$result = mysqli_query($connection, "UPDATE profile SET image='$image_file',description='$description', cv_link='$cv_link',contact_link='$contact_link',github_link='$github_link',linkedin_link='$linkedin_link' WHERE id=1");
			} else {
				$result = mysqli_query($connection, "UPDATE profile SET description='$description', cv_link='$cv_link',contact_link='$contact_link',github_link='$github_link',linkedin_link='$linkedin_link' WHERE id=1");
			}
			if ($result) {
				header("location:../admin.php?action=saved");
			} else {
				echo 'Something went wrong';
			}
		}
	}


	if (isset($error)) {

		foreach ($error as $error) {
			echo '<div class="message">' . $error . '</div><br>';
		}
	}
	$res = mysqli_query($connection, "SELECT * from profile WHERE id=1");
	if ($row = mysqli_fetch_array($res)) {
		$image = $row['image'];
		$description = $row['description'];
		$cv_link = $row['cv_link'];
		$contact_link = $row['contact_link'];
		$github_link = $row['github_link'];
		$linkedin_link = $row['linkedin_link'];
	}
	?>
	<div class="container" style="width:500px;">
		<h1> Edit </h1>
		<?php if (isset($update_sucess)) {
			echo '<div class="success">Image Updated successfully</div>';
		} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<label>Image Preview </label><br>
			<img src="uploads/<?php echo $image; ?>" height="100"><br>
			<label>Change Image </label>
			<input type="file" name="image" class="form-control">
			<label>Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>" class="form-control">
			<label>CV Link</label>
			<input type="text" name="cv_link" value="<?php echo $cv_link; ?>" class="form-control">
			<label>Contact Link</label>
			<input type="text" name="contact_link" value="<?php echo $contact_link; ?>" class="form-control">
			<label>Github Link</label>
			<input type="text" name="github_link" value="<?php echo $github_link; ?>" class="form-control">
			<label>Linked Link</label>
			<input type="text" name="linkedin_link" value="<?php echo $linkedin_link; ?>" class="form-control">
			<br><br>
			<button name="update_submit" class="btn-primary">Update </button>
		</form>
	</div>
</body>

</html>