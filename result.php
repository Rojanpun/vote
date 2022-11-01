<?php
session_start();
include("connect.php");
if(!isset($_SESSION['groupsdata'])){
    header("location: index.html");
}

?>
<html>
    <head>
        <title>Result</title>
    </head>

    <body style="background-color:#122b3e">
    <style>
        #back{
            padding: 20px;
			border-radius: 5px;
			background-color: #1B9CFC;
			border: 2px solid black;
			
        }
        </style>
    <marquee scrollamount=10><h1 style="color:crimson">🥳 CONGRATULATION 🥳 </h1></marquee>
    <hr>
    <br><br>
       <div class="box">
                <?php
                $total = 0;
                $rowSQL = mysqli_query($connect, "SELECT MAX(votes) AS max FROM user ");
                $row = mysqli_fetch_array($rowSQL);
                $largestNumber = $row['max'];
                $votes = (int)$largestNumber;
                $selectData = mysqli_query($connect, "SELECT * FROM user WHERE votes = '$votes'");
                while ($row = mysqli_fetch_assoc($selectData)) {
                ?>
                <center>
                <h1 style="color: red">Project Voting Winner<?php if(mysqli_num_rows($selectData)>1) {echo "s";}else{echo"";} ?></h1>
                
                    <div class="row">
                        <div class="data">
                            <h3 class="id" style="color:red">ID: <?php echo $row['id']  ?></h3>
                            <h3 class="name" style="color:red">NAME: <?php echo $row['name']  ?></h3>
                            <h3 class="vote" style="color:red">VOTES: <?php echo $row['votes']  ?></h3>
                           
                        </div>
                        <div class="image">
                            <img src="./uploads/<?php echo $row['photo']?>" alt="" height="200", width="200">
                        </div>
                    </div>
                </center>
                <?php  } ?>
            </div>
           
       <h1 style="text-align:center; color:red"> Buy Premium Version For More!!😁🤣</h1>

       <form action="logout.php" method="POST">
		<br>
	<button type="submit" id="back">Log Out</button>
		</form>
    </body>
</html> 
