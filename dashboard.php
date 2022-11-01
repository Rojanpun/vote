<?php
	session_start();
	if(!isset($_SESSION['userdata'])){
		header("location: ./");
	} 
	$userdata = $_SESSION['userdata'];
	$groupsdata = $_SESSION['groupsdata'];
	if($_SESSION['userdata']['status']==0){
	    $status = '<b style="color: red">Not Voted</b>'; 
	}
	else{
	    $status = '<b style="color: green"> Voted</b>';
	}
	
?>
<html>
<head>
	<title>Online Voting System . Dashboard</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<style type="text/css">
		  #backbtn{
		  	padding: 10px;
			border-radius: 5px;
			background-color: #1B9CFC;
			border: 2px solid black;
			float: left;
			margin: 10px;
		  }
		  #logoutbtn{
		  	padding: 10px;
			border-radius: 5px;
			background-color: #1B9CFC;
			border: 2px solid black;
			float: right;
			margin: 10px;
		  }
		  #profile{
			background-color : white;
			width: 30%;
			padding: 20px;
			float: left;

		  }
		  #Group{
			background-color:white;
			width: 62%;
			padding:20px;
			float:right;
		  }
		  #votebtn{
			padding: 10px;
			border-radius: 5px;
			background-color: #1B9CFC;
			border: 2px solid black;
			float: left;
	 		
		  }
		#mainpanel{
			padding:10px;
		}
		#voted{
			padding: 10px;
			border-radius: 5px;
			background-color:green;
			border: 2px solid black;
			float: left;
		}
		#result{
			padding: 20px;
			border-radius: 5px;
			background-color: #1B9CFC;
			border: 2px solid black;
			float:right;
			
		}
		 
	</style>

 <div id="mainSection">
		<center>
        <div id ="headerSection">
		<a href="index.html"> <button id="backbtn">Back</button></a>
		<a href="logout.php"><button id="logoutbtn">Logout</button></a>
	        <h1>Online Voting System</h1>
         </div>
		</center>
		<hr> 

	 <div id="mainpanel">
		<div id="Profile">
			<center><img src="./uploads/<?php echo $userdata['photo'];?>" height="200",width="200"></center>
			<b>Name:</b><?php echo $userdata['name']?><br><br>
			<b>Mobile:</b><?php echo $userdata['mobile']?><br><br>
			<b>Address:</b><?php echo $userdata['address']?><br><br>
			<b>Status:</b><?php echo $status?><br><br>
		
		</div>

		<div id="Group">
			<?php

			if($_SESSION['groupsdata']){
				for($i=0; $i<count($groupsdata) ;$i++){
					?>
					<div>
						<img style="float:right" src="./uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100">
						<b>Group Name: </b><?php echo $groupsdata[$i]['name']?> <br><br>
						<b>Votes: </b><?php echo $groupsdata[$i]['votes']?> <br><br>
						<form action="vote.php" method="POST">
							<input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
							<input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
							<?php
								if($_SESSION['userdata']['status']==0){
									?>
									<button type="submit" name="votebtn" value="vote" id="votebtn">Vote</button>
									<?php
								}
								else{
									?>	
									<button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
									<?php
								}
							?>
						</form>
						
					</div>
					<br><br>
					<hr>
					
					<?php
 			}
			}
			else{
				?>
				<div style = "border-bottom: 1px solid #bdc3c7; margin-bottom; 10px">
				<b>No gropus available right now.</b>
				</div>
			<?php
			
			}
			?>
 		</div>
	</div>
	<div>	
	<form action="result.php" method="POST">
		<br>
	<button type="submit" name="result" id="result" value="res">Result</button>
		</form>
	</div>
</body>
</html>