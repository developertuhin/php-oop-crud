<?php 
	include("Class/adminBack.php");
	$obj = new adminBack();
	
	if (isset($_GET['status'])) {
		$get_id = $_GET['id'];

		if ($_GET['status']=='edit') {
			$data = $obj->edit_data($get_id);

			$edit_values = array();
			while($edited = mysqli_fetch_array($data)){
				$edit_values[]=$edited;
			}
		}
	}
	//----------Update----------
	if (isset($_POST['update-button'])) {
		$msg = $obj->update_data($_POST);
	}
 ?>

<?php include('includes/header.php'); ?>
<div class="container">
	<h2 class="text-center text-light p-3 my-3 bg-dark">PHP-OOP-CRUD</h2>
</div>
<div class="container">
	<form action="" method="POST" class="form bg-light p-5" enctype="multipart/form-data">
		  			<?php 
						foreach($edit_values as $values)
					 ?>
		<div>
			<div class="form-group " style="display:none">
				<input type="text" name="id" class="form-control" required value="<?php echo $values['id']; ?>">
			</div>
			<div class="form-group">
				<label for="name">Name </label>
				<input type="text" name="name" placeholder="Enter Name" class="form-control" required
					value="<?php echo $values['name']; ?>">
			</div>
			<div class="form-group ">
				<label for="name">Address </label>
				<input type="text" name="address" placeholder="Enter Address" class="form-control" required
					value="<?php echo $values['address']; ?>">
			</div>
			<div class="form-group">
				<label for="name">Phone </label>
				<input type="number" name="phone" placeholder="Enter Phone" class="form-control" required
					value="<?php echo $values['phone']; ?>">
			</div>
			<div class="form-group">
				<label for="name">Image </label>
				<input type="file" name="files" class="form-control" required>
				<img src="upload/<?php echo $values['image'] ?> " alt="image" width="120px"
					style="border-radius: 50%; height: 120px; margin-top: 30px;">
			</div>
			<div class="form-group">
				<input class="btn btn-success" type="submit" value="Update Data" id="submit-button"
					name="update-button">

				<a href="index.php" type="button" class="btn btn-warning" data-dismiss="modal">Back</a href="index.php">

							<?php 
								if (isset($msg)) {
									echo "<span style='color:green; font-size:30px;'>$msg</span>";
								}
							 ?>
			</div>
		</div>
	</form>
</div>
<?php include('includes/footer.php'); ?>
