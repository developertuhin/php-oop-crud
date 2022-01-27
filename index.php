<?php 
	include("Class/adminBack.php");
	$obj = new adminBack();

	if (isset($_POST['save-button'])) {
		$msg = $obj->save_data($_POST);
	}

	//--------Show Data ----

	$data = $obj->show_data();

	$datas = array();
	while ($all_data = mysqli_fetch_array($data)) {
		$datas[] = $all_data;
	}


	//------------Delete-----

	if (isset($_GET['status'])) {
		$get_id = $_GET['id'];
		if ($_GET['status']=='delete') {
			$msg = $obj->delete_data($get_id);
		}
	}


 ?>


<?php include('includes/header.php'); ?>
<div class="container">
	<h2 class="text-center text-light p-3 my-3 bg-dark">PHP-OOP-CRUD</h2>
</div>

<div class="container d-flex justify-content-end">
	   <button type="button" class="btn btn-primary w-25" data-toggle="modal" data-target="#exampleModal">
	  		Add Friends
	   </button>

</div>

<div class="container">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Friends</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

 <!-- ---------------Mdal Body Started --------------------- -->
      <div class="modal-body">

      

		<form action="" method="POST" class="form" enctype="multipart/form-data">
			
				<div class="form-group">
					<label for="name">Name </label>
				    <input type="text" name="name" placeholder="Enter Name" class="form-control" required >
				</div>

				<div class="form-group ">
					<label for="name">Address </label>
				    <input type="text" name="address" placeholder="Enter Address" class="form-control"required >
				</div>

				<div class="form-group">
					<label for="name">Phone </label>
				    <input type="number" name="phone" placeholder="Enter Phone" class="form-control"required >
				</div>

				<div class="form-group">
					<label for="name">Image </label>
				    <input type="file" name="files" class="form-control"required  >
				</div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" value="Save Data" id="submit-button" name="save-button">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
				</div>
			

			</form>

			

      </div>
   
    </div>
  </div>
</div>









<h2 class="text-primary ">All Friends</h2>

	<table class="table bg-light p-5">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Image</th>
			<th>Action</th>
		</tr>


		<?php foreach ($datas as  $value) {
			# code...
		 ?>
		<tr>
			<td><?php echo $value['id'] ?></td>
			<td><?php echo $value['name'] ?></td>
			<td><?php echo $value['address'] ?></td>
			<td><?php echo $value['phone'] ?></td>
			<td><img src="upload/<?php echo $value['image'] ?>" alt="" height="70px" style="width:70px; border-radius: 50%;"></td>
			<td>
				<a href="edit.php?status=edit&&id=<?php echo $value['id'] ?>" class="btn btn-info">EDIT</a>

				<a href="?status=delete&&id=<?php echo $value['id'] ?>" class="btn btn-danger" id="delete_btn">DELETE</a>
			</td>
		</tr>
		<?php } ?>


	</table>
</div>




<?php include('includes/footer.php'); ?>
    






