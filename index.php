<!DOCTYPE html>
<html lang="en">
<head>
    <!-- 
        BY IRAN NEJAD KHALAG, JAVID T.  
        LORENA, JOHN MICHAEL
        SECTION 1D
    -->
    <meta charset="utf-8">
    <title>306 Using the RadioButtons & Using Checkboxes</title>
	  <link rel ="icon" href ="images/landing.png" type ="image/x-icon">
    <style type="text/css">

    body{
        background-image: url("https://images.unsplash.com/photo-1472067662551-b6bc9eb3091a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80");
        background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		font-family: Helvetica;
        margin-left: auto;
        margin-right: auto;
        text-align:center;
        display:block;
        color: white;
        text-shadow: 3px 3px 3px rgba(	0, 0, 0, 0.4);
    }
    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 80%;
        max-width: 90%;
        background-color: white;
        margin-left: auto;
        margin-right: auto;
    }
    table, th, td {
        padding: 1em 0.5em;
    }
    tr:nth-child(even) {
        background-color: #84cae7
    }
    .box{   
            
            background-color: rgba(	71, 106, 111, 0.7);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
            width: 50%;
            padding: 1%;
            margin: 5% auto;
    }
    .box1{   
            
            background-color: rgba(	71, 106, 111, 0.7);
            box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px;
            padding: 1%;
            margin: 5% auto;
    }
    img{
        height:200px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .textblue {
		font-weight: 700;
        font-size: 19px;
        text-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
	}

    </style>
</head>
    <body>
    <div class="box">
	<h3> Using the Radio Buttons and Checkboxes </h3>
	<form method="post">
	<p> Full Name: 
	<input type="text" name ="firstname" size="30" >
    
    <?php 
        function test_input($data) {
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
		    return $data;
		}
	    if (empty($_POST['firstname']) OR empty ($_POST['etype'])){
		    $firstnameErr=""; $etypeErr="";
            if(empty($_POST['firstname'])){
                $_POST['firstname']="";
                $firstnameErr="*Name is required*";
                echo $firstnameErr;}	
            else{$firstname=test_input($_POST['firstname']);	  
            }
            echo "<br>";
            if(empty($_POST['etype'])){
                $_POST['etype']="";
                $etypeErr = "<br>Please select your employment type";
                echo $etypeErr;}
            
            else {
                $etype=test_input($_POST['etype']);
            }
        }
		
        echo "<p> Employee Type:";
        echo "<input type = 'radio' name ='etype' value = 'Full time' > Full time";
	    echo "<input type = 'radio' name ='etype' value = 'Part-time' > Part-Time </p>";
        
        ?>
    </p>
	
	<p> Degrees Received: 
	<br> <input type = "checkbox" name ="BA" value = "BA"> BA
	<br> <input type = "checkbox" name ="MA" value = "MA"> MA
	<br> <input type = "checkbox" name ="PHD" value = "PHD"> PHD
	</p>
	<p> <input type ="submit" value ="Submit Information">  <input name="submitreset" type="submit" value="Reset" />
    <?php 
        if (empty($_POST['submitreset'])) {
            $test = "test";
        }else{
            if ($_POST['submitreset']=="Reset") 
                {
                    $_POST["firstname"] = "";
                    $_POST["etype"] = "";
                    $_POST["BA"] = null;
                    $_POST["MA"] = null;
                    $_POST["PHD"] = null;
                    $firstname = " ";
                }
        }
    ?>
    </p>
    </div>
    <div class="box">
    <?php 
    
	if (empty($_POST['firstname']) OR empty($_POST['etype'])){
		$firstnameErr=""; $etypeErr="";

        $firstname = $_POST['firstname'];
		if ($firstname == " ") {
            echo "";	
        }elseif (preg_match("/^[a-zA-Z\s]+$/",$firstname) ) {
            echo "<p> You are <span class='textblue'> $firstname </span><br>";	
        }elseif(!empty($_POST['firstname'])){
			$firstname=test_input($_POST['firstname']);	
            echo "<br>Only letters and white space allowed for Full Name<br><br>";
        }
		if(empty($_POST['etype'])){
			$_POST['etype']="";
			echo $etypeErr;
        }else {
		    $etype=test_input($_POST['etype']);
            echo "<br>Your employment type is:<span class='textblue'> $etype </span> </p>";
        }
        
	}
	
	else{
		$etype = $_POST['etype'];
        $firstname = $_POST['firstname'];
        if (preg_match("/^[a-zA-Z\s]+$/",$firstname)) {
            echo "<p> You are <span class='textblue'> $firstname </span>";	
            echo " and your employment type is: ";
            echo "<span class='textblue'> $etype </span> </p>";
        }else{
            $etype = $_POST['etype'];
            echo "<br>Only letters and white space allowed for Full Name<br><br>";
            echo "Your employment type is: ";
            echo "<span class='textblue'> $etype </span> </p>";
        }
	}
		//test if the checkbox BA has been ticked.
		if (isset($_POST['BA']))
		{
			$BA = $_POST['BA'];
		} else {
			$BA = "";
		}
			//test if the checkbox MA has been ticked.
		if (isset($_POST['MA']))
		{
			$MA = $_POST['MA'];
		} else {
			$MA = "";
		}
			//test if the checkbox phd has been ticked.
		if (isset($_POST['PHD']))
		{
			$PHD = $_POST['PHD'];
		} else {
			$PHD = "";
		}

        if ( (!isset($_POST['PHD'])) && (!isset($_POST['MA'])) && (!isset($_POST['BA'])) ){
            print "<br>You haven't earned any degree: </p> ";
        }elseif( ( (isset($_POST['BA'])) && (isset($_POST['MA'])) ) || ( (isset($_POST['BA'])) && (isset($_POST['PHD'])) ) || ( (isset($_POST['MA'])) && (isset($_POST['PHD'])) ) || ( (isset($_POST['BA'])) && (isset($_POST['MA'])) && (isset($_POST['PHD'])) )  ){
            print "Here are the degrees you've earned : </p> ";
        }else{
            print "Here is the degree you've earned : </p> ";
        }
        print "<p><span class='textblue'> $BA </span></p>";
		print "<p><span class='textblue'> $MA </span></p>";
		print "<p><span class='textblue'> $PHD </span></p>";
		
	?>
	</form>
    </div>
    </body>
</html>
