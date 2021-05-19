<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}



		public function displayAllSpecificWithOrder($table,$value,$item,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} WHERE $value='$item' ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return 0;
		}
	}


	//Display Specific



	public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


		public function displayById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


			public function displayByMatno($table,$value)
	{
		$matno = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where matno='$matno' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}




		public function displayNameById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return 0;
		}
	}


	
	

//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
			return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}





	
// Inserting



		public function addApplication($post)
	{

		$name = $this->cleanse($_POST['name']);
		$matno = $this->cleanse($_POST['matno']);
		$course = $this->cleanse($_POST['course']);
		$year = $this->cleanse($_POST['year']);
		$c1 = $this->cleanse($_POST['c1']);
		$c2 = $this->cleanse($_POST['c2']);
		$c3 = $this->cleanse($_POST['c3']);
		$c4 = $this->cleanse($_POST['c4']);
		$c5 = $this->cleanse($_POST['c5']);
		$c6 = $this->cleanse($_POST['c6']);
		$c7 = $this->cleanse($_POST['c7']);
		$c8 = $this->cleanse($_POST['c8']);
		$school = strtoupper($this->cleanse($_POST['school']));

		$query="INSERT into application(name,matno,course,year,c1,c2,c3,c4,c5,c6,c7,c8,school,status) values('$name','$matno','$course','$year','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$school','0')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:application.php?msg=Application was created successfully&type=success");
		}else{
			header("Location:application.php?msg=Error adding data try again!&type=error");
		}
	}


	public function addCourse($post)
	{

		$name = strtoupper($this->cleanse($_POST['name']));

		$query="INSERT into course(name) values('$name')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-course.php?msg=Course was created successfully&type=success");
		}else{
			header("Location:view-course.php?msg=Error adding data try again!&type=error");
		}
	}




	public function updateAdmin($post)
	{
		
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE admin SET email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}



		public function updateCourse($post)
	{
		
		$name=strtoupper($this->cleanse($_POST['name']));
		$id=$this->cleanse($_POST['cid']);
		$query="UPDATE course SET name='$name' WHERE id='$id' ";
		var_dump($query);
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:view-course.php?msg=Course was updated successfully&type=success");
		}else{
			header("Location:view-course.php?msg=Error updating course try again!&type=error");
		}
	}


		public function checkApplication($matno)
	{

		$matno = strtoupper($this->cleanse($matno));

		$query="SELECT * from application where matno='$matno' ";
		$sql = $this->con->query($query);
		$qu=$sql->fetch_assoc();
        if($qu){
           if ($qu['status'] === '1') {
           	header("Location:success.php?matno=$matno");
           	// header("Location:application-check.php?msg=You have been successfully screened...visit www.bsum.edu.ng?matno=$matno to obtain a copy of Transcript Approval&type=success");
           } else {
           	header("Location:application-check.php?msg=Transcript is undergoing screening process ..check another time!!!&type=error");
           
        }
    }
        else{
        		header("Location:application-check.php?msg=Invalid Matriculation Number!!!&type=error");
        	}
	}




		public function toggle($id)
	{
		$query="SELECT * FROM application where id='$id' ";
		$qry=$this->con->query($query);
		$row=$qry->fetch_assoc();

		$idp=$row['id'];
		$apm=$row['status'];

		 if($apm=='0'){
		$this->con->query("UPDATE application SET status='1' WHERE id='$idp'");
		header("Location:view-application.php?msg=Account was updated successfully&type=success");
		 }            
		 elseif($apm=='1'){
		$this->con->query("UPDATE application SET status='0' WHERE id='$idp'");
		header("Location:view-application.php?msg=Account was updated successfully&type=success");
		 }
		 elseif($apm==''){
		$this->con->query("UPDATE application SET status='0' WHERE id='$idp'");
		header("Location:view-application.php?msg=Account was updated successfully&type=success");
		 }else{
			header("Location:view-application.php?msg=Error updating account try again!&type=error");
		}
	}



//Empty Table
	public function emptyTable($table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "TRUNCATE {$table}";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}



//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}
	


	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}




	

	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 

 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!,"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!,"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!,"; 

		return $welcome_string;

	}



}

?>

