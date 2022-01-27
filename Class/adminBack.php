<?php 
		class adminBack{

		private $conn;

		 function __construct(){
			$dbhost = "localhost";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "php-oop-crud";


			$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

			if (!$this->conn) {
				die("DB connection Failed...!!!");
			}
		}
		//------------Insert Data------
		function save_data($data){
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];

			$image_name = $_FILES['files']['name'];
			$image_tmp_name = $_FILES['files']['tmp_name'];

			$query= "INSERT INTO user_info(name,address,phone,image) VALUES('$name','$address','$phone','$image_name')";

			if (mysqli_query($this->conn,$query)) {
				move_uploaded_file($image_tmp_name,'upload/'.$image_name);
				$msg = "Data inserted Successfully..";

				return $msg;
			}

		}

		//--------------------Show Data-----
		function show_data(){
			$query = "SELECT * FROM user_info";
			if ($data =mysqli_query($this->conn,$query)) {
				return $data;
			}
		}

		//-------------DELETE Data-----------
		function delete_data($id){
			$query = "DELETE FROM user_info WHERE id='$id'";
			if (mysqli_query($this->conn,$query)) {
				$msg = "Data deleted Successfully..";
				return $msg;
			}
		}

		//-------------EDIT-----------
		function edit_data($edit_id){
		$query = "SELECT * FROM user_info WHERE id='$edit_id'";
			if ($data =mysqli_query($this->conn,$query)) {
				return $data;
			}
		}

		//--------------Update---------
		function update_data($data){
			$u_id= $_POST['id'];
			$u_name= $_POST['name'];
			$u_address= $_POST['address'];
			$u_phone= $_POST['phone'];

			$u_image_name = $_FILES['files']['name'];
			$u_tmp_name = $_FILES['files']['tmp_name'];

			$query = "UPDATE user_info SET 
			name='$u_name',
			address='$u_address',
			phone='$u_phone',
			image='$u_image_name'
			WHERE id='$u_id'";

			if (mysqli_query($this->conn,$query)) {
				$msg = "Data Updated successfully..";
				return $msg;
			}
		}

	}

 ?>