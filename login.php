<?php
$pagetitle = "Login";
require_once '_header.php';
require_once 'connect.php';

if(isset($_SESSION['id']))
{
    echo "<p class='error'>You are already logged in. <a href='logout.php'>Click here to LOGOUT.</a></p>";
    include_once '_footer.php';
    exit();
}

$showform = 1;
$errormsg = "";

if(isset ($_POST['loginButton']))
{

    //CLEANSE DATA
    $formfield['email'] = trim($_POST['email']);
    $formfield['pwd'] = trim($_POST['pwd']);
	
	//CHECKING FOR EMPTY FIELDS
    if (empty($formfield['email'])){$errormsg .= "<p class='error'>EMAIL CANNOT BE EMPTY.</p>";}
    if (empty($formfield['pwd'])){$errormsg .= "<p class='error'>PASSWORD CANNOT BE EMPTY.</p>";}

    //display error
    if($errormsg !="")
    {
        echo "<p class='error'>There are errors:  <br> " . $errormsg . "</p>";
    }
    else
    {
        //GET THE EMAIL AND PWD FROM THE DATABASE
        try
        {
            $sql = 'SELECT email, pwd FROM user WHERE email = :email';
            $s = $conn->prepare($sql);
            $s->bindValue(':email', $formfield['email']);
            $s->execute();
            $count = $s->rowCount();
        }
        catch (PDOException $e)
        {
            echo 'Error fetching users: ' . $e->getMessage();
            exit();
        }
        //if query okay, see if there is a result
        if ($count < 1)
        {
            echo  "<p class='error'>This user cannot be found.</p>";
        }
        else
        {


            $row = $s->fetch();
            $confirmedemail = $row['email'];
           
            $confirmedpwd = $row['pwd'];
          

            try
            {
                $sql2 = 'SELECT * FROM user
                             WHERE email = :email
                             AND pwd = :pwd';
                $s2 = $conn->prepare($sql2);
                $s2->bindValue(':email', $confirmedemail);
                $s2->bindValue(':pwd', $confirmedpwd);
                $s2->execute();
                $count2 = $s2->rowCount();
                
            }
            catch (PDOException $e2)
            {
                echo 'Error fetching users 2: ' . $e2->getMessage();
                exit();
            }

            $row2 = $s2->fetch();
            if ($count2 <1)
            {
                echo "<p class='error'>The email and password combination you entered is not correct.  Please try again.</p>";
            }
            else
            {
                $_SESSION['id']= $row2['id'];
                $_SESSION['email'] = $row2['email'];
                $_SESSION['status'] = $row2['status'];
                $showform = 0;
				//once logged in and session vars populated, redirect to confirmation page.
                header("Location: confirm.php");
            }
        }//username exists
    }//else errormessage

}// end ifisset login

/************************************************************************/

// ifisset signup
if(isset ($_POST['signupButton'])){
	//SANITIZE USER INPUT
    //CREATE NEW VARIABLES TO STORE CLEANSED DATA
	$formfield['name'] = trim($_POST['name']);
    $formfield['email'] = trim($_POST['email']);
	$formfield['status'] = trim($_POST['status']);
	$formfield['pwd'] = trim($_POST['pwd']);


    // ERROR CHECKING - APPEND THE $errormsg VAR WITH ANY ERRORS
	/****************************************************************************
     CHECK FOR EMPTY FIELDS
     Complete the lines below for any REQIURED form fields. Do not do for optional fields.
    **************************************************************************** */
    if(empty($formfield['name'])){$errormsg .= "<p>NAME CANNOT BE EMPTY.</p>";}
    if(empty($formfield['email'])){$errormsg .= "<p>EMAIL CANNOT BE EMPTY.</p>";}
    if(empty($formfield['status'])){$errormsg .= "<p>PARKING TYPE CANNOT BE EMPTY.</p>";}
    if(empty($formfield['pwd'])){$errormsg .= "<p>PASSWORD CANNOT BE EMPTY.</p>";}

	/******************************************************************************
     CHECK TO SEE IF EMAIL IS VALID
     There are many variations that can be used.
     Tutorial on Regular Expressions:  http://youtu.be/GVZOJ1rEnUg?list=PLfdtiltiRHWGRPyPMGuLPWuiWgEI9Kp1w
     ****************************************************************************  */
    if(!preg_match('/[\w-]+@([\w-]+\.)+[\w-]+/', $formfield['email']))
    {
        $errormsg .= "<p>EMAIL IS NOT A VALID EMAIL.</p>";
    }
	
	
/*  ****************************************************************************
    CHECK TO SEE IF THE EMAIL ALREADY EXISTS IN THE DATABASE
    ****************************************************************************
*/
	
    try
    {
        $sqlemails = "SELECT email FROM user WHERE email = :email";
        // Prepares a statement for execution and returns a statement object
        $stmtemails= $conn->prepare($sqlemails);
  
        $stmtemails->bindValue(':email', $formfield['email']);
        //Execute the prepared statement.
        $stmtemails->execute();
        /*checking to see if this user already exists: Count the number of returned rows. */
        $countemails = $stmtemails->rowCount();
        //If there are entries in the database, then concatenate the error message.
        if ($countemails > 0)
        {
            $errormsg .= "<p>This email is already taken.</p>";
        }
    }
    catch (PDOException $e)
    {
        echo 'Unable to fetch emails to check for existing. <br />ERROR MESSAGE:<br />' . $e->getMessage();
        include "_examplefooter.php";
        exit();
    }


    /*  ****************************************************************************
        ALL ERROR CHECKING DONE.  NOW DISPLAY ANY ERRORS
        **************************************************************************** */
    //if we have concatenated the error message with details, then let the user know
    if($errormsg != "")
    {
        echo "<div class='error'><p>THERE ARE ERRORS!</p>";
        echo $errormsg;
        echo "</div>";
    }
    else
    {

        try {
        /*  ****************************************************************************
            INSERT DATA INTO THE DATABASE
            ****************************************************************************
        */

            $sqlinsert = 'INSERT INTO user (`name`, `email`, `pwd`, `status`)
                                VALUES (:name, :email, :pwd, :status)';
            $stmtinsert = $conn->prepare($sqlinsert);
            $stmtinsert->bindvalue(':name', $formfield['name']); // using data from form
            $stmtinsert->bindvalue(':email', $formfield['email']); // using data from form
            $stmtinsert->bindvalue(':pwd', $formfield['pwd']);
            $stmtinsert->bindvalue(':status', $formfield['status']);
    
            $stmtinsert->execute();
            
            echo "<p class='success'>Successful addition of new user! <a href='login.php'>Return to Login page</a></p>";
            $showform = 0; //hide form
        }
        catch(PDOException $e)
        {
            echo 'Error inserting into database. <br />ERROR MESSAGE:<br />' .$e->getMessage();
            include "_footer.php";
            exit();
        }
    }//no errors
	
}// end ifisset signup

if($showform ==1)
{
?>
			<div id="formbody" class="container">

			<div class="row">
				
				<div class="col-md-2 col-xs-1"></div>	<!-- Column spacing -->
				
				<button type="button" class="btn btn-primary btn-lg col-md-3 col-xs-4" id="loginBtn">Login</button>	<!-- Button triggers a modal(popup) to appear -->
				
				<div class="col-md-2 col-xs-2"></div>
				
				<button type="button" class="btn btn-primary btn-lg col-md-3 col-xs-4" id="signupBtn">Signup</button>	<!-- Button triggers a modal(popup) to appear -->
				
				<div class="col-md-2 col-xs-1"></div>
			</div>
			
			<div class="row">
				<div class="col-md-2 col-xs-2"></div>
				<img src="img/cculogo2.png" class="media-object col-md-8 col-xs-8">	<!-- Logo image in between two blank columns -->
				<div class="col-md-2 col-xs-2"></div>
			</div>
			
			<!-- Modal for loginBtn -->
			<div class="modal fade" id="loginModal" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">	<!-- Modal header content -->
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
						</div>
						<div class="modal-body">	<!-- Modal body contains form for the login -->
							<form name="loginForm" id="loginForm" method="post" action="login.php">
								<div class="form-group">	<!-- Code for the login -->
									<label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
									<input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
								</div>
								<div class="form-group">	<!-- Code for the signup -->
									<label for="pwd"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
									<input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
								</div>
								<div class="checkbox">	<!-- Remember me checkbox code -->
									<label><input type="checkbox" value="" checked>Remember me</label>
								</div>
								<!--<a href="index.html" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</a> <!-- This is just a link to the index.html, the nextline contains the submit function --> 
								<input type="submit" name="loginButton" class="btn btn-success btn-block" value="Login">
							</form>
						</div>
						<div class="modal-footer">	<!-- Modal footer contains the close button -->
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>
			
			<!-- Modal for signupBtn -->
			<div class="modal fade" id="signupModal" role="dialog">
				<div class="modal-dialog">
			
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">	<!-- Modal header content -->
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><span class="glyphicon glyphicon-lock"></span> Signup</h4>
						</div>
						<div class="modal-body">	<!-- Modal body contains content for the signup form -->
							<form name="signupForm" id="signupForm" method="post" action="login.php">
							
								<div class="form-group">	<!-- Form for lastname -->
									<label for="name">Name</label>
									<input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
								</div>				
								<div class="form-group">	<!-- Form for email -->
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
								</div>		
								<div class="form-group">	<!-- Form for status -->
									<label for="status">Parking Type</label>
									<input type="text" name="status" class="form-control" id="status" placeholder="Resident / Commuter / UP Commuter / Veteran">
								</div>
								<div class="form-group">	<!-- Form for password -->
									<label for="pwd">Password</label>
									<input type="password" name="pwd" class="form-control" id="pwd" placeholder="Enter password">
								</div>
								<!-- Sumbit button for signup -->
								<input type="submit" name="signupButton" class="btn btn-success btn-block" value="Signup">
							</form>
						</div>
						<div class="modal-footer">
							<!-- close button for the modal -->
							<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>		  
				</div>
			</div>			
		</div>	

	<script>
		<!-- code that allows login modal to popup -->
		$(document).ready(function(){
			$("#loginBtn").click(function(){
				$("#loginModal").modal();
			});
		});
		
		<!-- code that allows signup modal to popup -->
		$(document).ready(function(){
			$("#signupBtn").click(function(){
				$("#signupModal").modal();
			});
		});	
	</script>		
<?php
}//showform
include_once '_footer.php';
?>