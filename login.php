<?php
session_start();

// Initialize the session
//#C1eAn^waRe
//cw2022@cleanware.com.my

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}



//connection
require_once "dbConnection.php";

?>
 
 
 <?php
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
$empass_err = "";
$id="";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "The email can't be blank";
		 }
	else{
        $email = trim($_POST["email"]);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$email_err="Invalid email format";
	}
    }
	
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "The password can't be blank";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT adm_mail, adm_pw FROM admin WHERE adm_mail = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
	
			
			$result=mysqli_query($conn,"select * from admin where adm_mail='$email'");
			while($row=mysqli_fetch_array($result)){
				$id=$row['adm_id'];
				}

            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt,$email, $hashed_password);
					
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
							$_SESSION['status']="Active";
										
							
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } 
						else
						{
                            // Display an error message if password is not valid
                            $empass_err = "Email or Password is incorrect";
                        }
                    }
                } 
				else{
                    // Display an error message if email doesn't exist
                    $empass_err = "Email or Password is incorrect";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cleanware Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
    <style>
        body{  
		   background-color: black;
            max-width: max-content; 
            margin: auto; 
            font: 14px sans-serif; 
            padding-top: 5%; 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
		
        }
        .wrapper{ 
            text-align: center; 
            height: 500px; 
            width: 450px; 
            padding: 80px; 
            background-color: #FFFFFF; 
            opacity: 75%;
			 border-radius: 5%;
        }
		
		.log{
			 margin-top:70px;
			 
		}
		
		.input-container {
			display: -ms-flexbox; /* IE10 */
			display: flex;
			width: 100%;
			margin-bottom: 15px;
			}
			
			.icon {
			  padding: 10px;
			  background: dodgerblue;
			  color: white;
			  min-width: 50px;
			  text-align: center;
			  }
			
		#sub{
			width:290px;
			float:left;
			background-color:black;
			color:white;				
		}
		
		.form-group{
			position: static;
		}
		
		
			

    </style>
</head>


<body>


    <div class="wrapper">
        <img src="images/logo.png" style="width:280px;height:60px;">
		
		<div class="log">
        
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
             <div class="input-container" style="margin-top:20px;">
              <i class="fa fa-envelope icon"></i>

                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
			 </div>
			   
			   <?php
			    if(empty($email_err))
				{
					?>
					<div id="a" style="visibility:hidden;float:right;"><span class="help-block" style="color:#FF0000;"> <?php echo "#"; ?></span></div>
					<?php
				}
				else 
				{
					
			   ?>
               <div id="a" style="float:right;"><span class="help-block" style="color:#FF0000;"> <?php echo $email_err; ?></span></div>
			   <?php
			   
			    }
			   ?>
			
            </div> 			
             <br><br>
			
			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : '';
			echo (!empty($empass_err)) ? 'has-error' : '';?>">
			<div class="input-container">
			<i class="fa fa-key icon"></i>
                <input type="password" name="password" class="form-control">
			</div>
			<?php
			    if(empty($password_err))
				{
					?>
                <span class="help-block" style="color:#FF0000;visibility:hidden;float:right;"><?php echo "#"; ?></span>
				<?php
				}
				else
				{
				?>
				<span class="help-block" style="color:#FF0000;float:right;"><?php echo $password_err; ?></span>
				<?php
				}
				
				?>
				<span class="help-block" style="color:#FF0000;float:right;"><?php echo $empass_err; ?></span>
				
            </div>
			<br><br><br>
			
			
            <div class="form-group">
                <input type="submit" class="btn btn-primary" id="sub" value="Login as Admin">
            </div>
			
        </form>
		
		</div>
	</div>

	
</body>

</html>