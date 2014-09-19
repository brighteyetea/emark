
	<?php
	
        //Library of Database Functions
        
        //Database Connection Vriables
        $localhost = "localhost";
        $user = "root";
        $password = "root";
        $db = "e-mark";
        $dsn = "mysql:host=$localhost;dbname=$db;";
        
        //Declare Global Vriables
        $dbConnection = NULL;
        $stmt = NULL;
        $numRecords = NULL;

        
        //Establish MYSQL Connection
        function connect(){
            global $user,$password,$dsn,$dbConnection;//Required to access global variables
            try{
                //create a PDO connectio with the configuration data
                $dbConnection = new PDO($dsn, $user, $password);
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
        }
        
        //selecting all records from a table
        function readQuery($table){
            global $numRecords,$dbConnection,$stmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM ".$table." WHERE Role='Teacher'";
            
            //run query
            try{
                $stmt = $dbConnection->query($sqlStr);
                if($stmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $numRecords = $stmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
        }
		
		//Insert a user details Record
		function insertTeacherDetails()
		{
			global $dbConnection, $stmt, $strUserID,$strFirstName,$strLastName,$strPassword,$strStatus,$strRole;
			
			connect(); // connect function
			
			//gets the input values and insert it into the database
		$sqlStr = "INSERT INTO user values ('".$strUserID."','".$strFirstName."','".$strLastName."','".$strPassword."','".$strStatus."','".$strRole."');";
			
			//run query
			try
			{
				$stmt = $dbConnection->exec($sqlStr);
				if($stmt === false)
				{
					die("Error executing the query: $sqlStr");
				}
				else
				{
					//offer success message
					echo "<p>The User " .$strFirstName." " .$strLastName." has been added to the database";
				}
			}
			catch(PDOExcepetion $error)
			{
				//display error if applicable
				echo "An Error occored; ".$error->getMessage();
			}
			
			//close the database connection
			$dbConnection = NULL;
		}
		
		//Function to return a single record
		function readQuerySingle($table, $column, $colValue, $colType){
			global $numRecords,$dbConnection, $stmt;
			
			connect(); //Run connect function
			
			$sqlStr = NULL; //Initialise variable to hold query
			
			if($colType === "numeric"){
				//select individual record
				$sqlStr = "SELECT * FROM ".$table." WHERE ".$column." = ".$colValue.";";
			}
			else{
				//select individual record
				$sqlStr = "SELECT * FROM ".$table." WHERE ".$column." = '".$colValue."';";
			}
			
			//Run Query
			try{
				
				$stmt = $dbConnection->query($sqlStr);
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
			}
			catch(PDOExcepetion $error)
			{
				//display error if applicable
				echo "An Error occored; ".$error->getMessage();
			}
			
			//How many records are there?
			$numRecords = $stmt->rowcount();
			
			//close the database connection
			$dbConnection = NULL;
		}
		
		//update skill record
		function UpdateTeacherDetails(){
			
			global $dbConnection, $stmt, $strUserID,$strFirstName,$strLastName,$strPassword,$strStatus,$strRole;
			
			
			connect(); //run connect function
			
			$sqlStr = "UPDATE user SET UserID = '".$strUserID."',";
			$sqlStr .= "First_Name = '".$strFirstName."',";
			$sqlStr .= "Last_Name = '".$strLastName."',";
			$sqlStr .= "Password = '".$strPassword."',";
			$sqlStr .= "Status = '".$strStatus."',";
			$sqlStr .= "Role = '".$strRole."'";
			$sqlStr .= "WHERE UserID = '".$strUserID."';";
			
			//Run Query
			try{
				
				$stmt = $dbConnection->exec($sqlStr);
				if($stmt === false){
					die("Error executing the query: $sqlStr");
				}
				else{
					//offer success message
					echo "<p>The User " .$strFirstName." " .$strLastName." has been updated to the database";
				}
			}
			catch(PDOExcepetion $error)
			{
				//display error if applicable
				echo "An Error occored; ".$error->getMessage();
			}
			
			//close the database connection
			$dbConnection = NULL;
		}
		
		//get all subjects
		function GetSubjects($table){
			
			global $subjectNumRecords,$dbConnection,$subjectStmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM ".$table." ";
            
            //run query
            try{
                $subjectStmt = $dbConnection->query($sqlStr);
                if($subjectStmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $subjectNumRecords = $subjectStmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}
		
		//get assessment  of a selected subject
		function getAssessment($subjectID){
			
			global $assessmentNumRecords,$dbConnection,$assessmentStmt;
			
            connect();
			 //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM assessment where SubjectID = '".$subjectID."' ";
			
			 //run query
            try{
                $assessmentStmt = $dbConnection->query($sqlStr);
                if($assessmentStmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $assessmentNumRecords = $assessmentStmt->rowcount();
            //close the database conecction
            $dbConnection = NULL;
		}
		
		//get class
		function getClass($subjectID){
			global $classNumRecords,$dbConnection,$classStmt;
			
            connect();
			 //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM classes where SubjectID = '".$subjectID."' ";
			
			 //run query
            try{
                $classStmt = $dbConnection->query($sqlStr);
                if($classStmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $classNumRecords = $classStmt->rowcount();
            //close the database conecction
            $dbConnection = NULL;
		}
		
		
		//get assessmentItem
		function getAssessmentItem($assessmentID){
			
			 global $assessmentItemnumRecords,$dbConnection,$assessmentItemstmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM assessmentitem where AssessmentID = '".$assessmentID."' ";
            
            //run query
            try{
                $assessmentItemstmt = $dbConnection->query($sqlStr);
                if($assessmentItemstmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $assessmentItemnumRecords = $assessmentItemstmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}
		
		//get assessmentItem Mark
		function getItemMark($itemID){
			global $ItemMarknumRecords,$dbConnection,$ItemMarkstmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT ItemMark FROM assessmentitem where ItemID = '".$itemID."' ";
            
            //run query
            try{
                $ItemMarkstmt = $dbConnection->query($sqlStr);
                if($ItemMarkstmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $ItemMarknumRecords = $ItemMarkstmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}
		
		
		//get the datesubmited
		function getItemSubmittedDate($itemID){
			global $ItemSubmittedDatenumRecords,$dbConnection,$ItemSubmittedDatestmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT DateSubmitted FROM assessmentitem where ItemID = '".$itemID."' ";
            
            //run query
            try{
                $ItemSubmittedDatestmt = $dbConnection->query($sqlStr);
                if($ItemSubmittedDatestmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $ItemSubmittedDatenumRecords = $ItemSubmittedDatestmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}
		
		
		
		//get assessment item description
		function getItemDescription($itemID){
			
			 global $ItemDescriptionnumRecords,$dbConnection,$ItemDescriptionstmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT Description FROM assessmentitem where ItemID = '".$itemID."' ";
            
            //run query
            try{
                $ItemDescriptionstmt = $dbConnection->query($sqlStr);
                if($ItemDescriptionstmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $ItemDescriptionnumRecords = $ItemDescriptionstmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}
		
		//get all the item comment
		function getItemComment($itemID){
			global $ItemCommentNumRecords,$dbConnection,$ItemCommentStmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT Comment FROM  itemcomment where ItemID = '".$itemID."' ";
            
            //run query
            try{
                $ItemCommentStmt = $dbConnection->query($sqlStr);
                if($ItemCommentStmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $getItemCommentNumRecords = $ItemCommentStmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}
		
		//get all the general comments
		function GetGeneralComments($table){
			 global $generalNumRecords,$dbConnection,$generalCommentStmt;
            connect();
            //SQL query - Results sorted by specified columns
            $sqlStr = "SELECT * FROM ".$table." ";
            
            //run query
            try{
                $generalCommentStmt = $dbConnection->query($sqlStr);
                if($generalCommentStmt === false){
                    die("Error executing the query: $sqlStr");
                }
            }
            catch(PDOException $error){
                //display error message if applicable
                echo "An error occured: ".$error->getMessage();
            }
            
            $generalNumRecords = $generalCommentStmt->rowcount();
            
            //close the database conecction
            $dbConnection = NULL;
		}

    
    ?>
