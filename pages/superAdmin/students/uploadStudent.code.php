<?php
	
	class uploadStudent extends mysqli
	{
		private $state_csv =false;
		public function __construct()
		{
			parent::__construct("localhost", "root", "","duesMgmtSystem");
			
			if ($this->connect_error){
				die("Failed to connect to Database: ".$this->connect_error);
			}
		}
		
		public function import($file){
			
			$first = false;
			$this->state_csv=false;
			
			$file = fopen($file,'r');
			while ($row = fgetcsv($file)) {
				if(!$first){
					$first=true;
				}else{
					//			echo $value = "'".implode("','",$row)."'"."<br>";
//                echo "<pre>";
//                print_r($row);
//                echo "</pre>";
                    $indexNumber = "0".$row[3];
					$checkSql = "SELECT `index_number` FROM `students` WHERE `index_number`='$indexNumber'";
					$result = $this->query($checkSql);

//die($indexNumber);

					if($row1 = mysqli_fetch_assoc($result)>0) {
						$rowIndex = $row1['index_number'];
						$me = "UPDATE `students` SET
						`firstName`='$row[0]',`lastName`='$row[1]',`otherName`='$row[2]',
						`index_number`='$row[3]',`std_class`=$row[4],`phone`=$row[5]
						 WHERE index_number ='$rowIndex'";


						if ($this->query($me)) {
							$this->state_csv = true;
						} else {
							$this->state_csv = true;
						}


					}
					else {
					   $indexNumber = "0".$row[3];
                        $phoneNumber = "0".$row[5];
						$sql = "INSERT INTO students(firstName, lastName, otherName, index_number,std_class, phone)
                        VALUES ('$row[0]','$row[1]','$row[2]','$indexNumber','$row[4]','$phoneNumber')";
						if ($this->query($sql)) {
							$this->state_csv = true;
						} else {
							$this->state_csv = false;
						}

					}
				}
			}//while
			if ($this->state_csv){
				?>
				<script type="text/javascript">
                    window.location.assign("http://localhost/duesManagementSystem/pages/superAdmin/students/uploadStudent.php?file_uploadSuccess=".concat("File Uploaded Successfully"));
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
                    window.location.assign("http://localhost/duesManagementSystem/pages/superAdmin/students/uploadStudent.php?file_not_uploaded=".concat("Something went wrong! Try Again Later"));
				</script>
				<?php
			}
		}// function imports
	}// class Extends
	
