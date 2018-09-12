<?php 
include_once ('lib/Session.php');
include_once ('lib/Database.php');
include_once ('helpers/Format.php');
class User
{
   private $db;
   private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
	}
	
	

    public function getRegisterData($data, $file)
    {
    	$email = mysqli_real_escape_string($this->db->link, $data['email']);
    	$fname = mysqli_real_escape_string($this->db->link, $data['fname']);
    	$lname = mysqli_real_escape_string($this->db->link, $data['lname']);
    	$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
    	$role = mysqli_real_escape_string($this->db->link, $data['role']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
    	$file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;

	    $chkquery = "select * from register where email = '$email'";
	    $result = $this->db->select($chkquery);
	    if ($result != false) {
	    	$msg = "<span class='error'>Email Already Exist In database !</span>";
	    	return $msg;
	    }else {
	    
	    if (empty($email) || empty($fname) || empty($lname) || empty($password) || empty($file_name)) {
	      $msg ="<span class='error'>Fields Must Not be empty !</span>";
	      return $msg;
	    }elseif ($file_size >1048567) {
	     echo "<span class='error'>Image Size should be less then 1MB!</span>";
	    } elseif (in_array($file_ext, $permited) === false) {
	     echo "<span class='error'>You can upload only:-"
	     .implode(', ', $permited)."</span>";
	    } else{
	      move_uploaded_file($file_temp, $uploaded_image);
	      $query = "INSERT INTO register(email, fname, lname, password, image, role) 
		    VALUES('$email','$fname','$lname','$password','$uploaded_image','$role')";
		    $inserted_rows = $this->db->insert($query);
		    if ($inserted_rows) {
		     $msg = "<span class='success'>Registrtion  Successfully.</span>";
		     return $msg;
		    }else {
		     $msg = "<span class='error'>Soemthing Went Problem !</span>";
		     return $msg;
		    }
	    }
	}
	}

	public function updateUserData($id,$data,$file){

		$email = mysqli_real_escape_string($this->db->link, $data['email']);
    	$fname = mysqli_real_escape_string($this->db->link, $data['fname']);
    	$lname = mysqli_real_escape_string($this->db->link, $data['lname']);
		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
		
		
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
    	$file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;

	    
	    if (empty($email) || empty($fname) || empty($lname)) {
	      $msg ="<span class='error'>Fields Must Not be empty !</span>";
	      return $msg;
	    }elseif ($file_size >1048567) {
	     echo "<span class='error'>Image Size should be less then 1MB!</span>";
	    } elseif (in_array($file_ext, $permited) === false) {
	     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
	    } else{
		  move_uploaded_file($file_temp, $uploaded_image);


		  
		  $query = "update register set email='$email', fname='$fname', 
		            lname='$lname', password='$password', image='$uploaded_image' where id = '$id'";
		  $update_rows = $this->db->update($query);
			
		    if ($update_rows) {
				echo "<script>window.location = 'dashborad.php'</script>";
			}
		}
	}

	public function getLoginData($data)
	{
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));

		if (empty($email) || empty($password)) {
			 $msg = "<span class='error'>Fields Must Not be Empty !</span>";
		     return $msg;
		}

		$query = "select * from register where email = '$email' and password = '$password'";
		$login = $this->db->select($query);
		if ($login != false) {
			$value = $login->fetch_assoc();
			Session::set("login", true);
			Session::set("usrId", $value['id']);
			Session::set("usremail", $value['email']);
			Session::set("usrfname", $value['fname']);
			Session::set("usrrole", $value['role']);
			header("Location: dashborad.php");
		}else {
			 $msg = "<span class='error'>Email And Password Wrong !</span>";
		     return $msg;
		}
	}

	public function UserData($id){
		$query = "select * from register where id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function TotoalUser(){
		$query = "select * from register where role = 1";
		$result = $this->db->select($query);
		$count = mysqli_num_rows($result);
		return $count;
	}

	public function changepass($id,$data){

		$old_password = mysqli_real_escape_string($this->db->link, md5($data['old_password']));
		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
		$confirm = mysqli_real_escape_string($this->db->link, md5($data['confirm']));
		
	   if (empty($old_password) || empty($password) || empty($confirm)) {
		  $msg = "<span class='error'>Field Must Not Be EMpty</span>";
		  return $msg;
	   }elseif($password != $confirm){
		$msg = "<span class='error'>PassWord DOes Not Match</span>";
		return $msg;
	   }else{
		   $query = "update register set password = '$password' where id = '$id'";
		   $result = $this->db->update($query);

		   if ($result) {
			  $msg = "<span class='success'>Password Reset Successfully</span>";
			  return $msg;
		   }else{
			$msg = "<span class='success'>Something Went Probelm</span>";
			return $msg;
		   }
	   }
	}
}
 ?>