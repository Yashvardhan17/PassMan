<html>
<head>
	<script >
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();</script>

<style>
	h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 900;
  font-size: 12px;
  color: #641200;
  border-bottom: solid 1px rgba(255,255,255,0.1);
  
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
  background-image: url("https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs2/2118440/original/55/send-100-high-resolution-web-background-1920x1200.jpg");
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
form.example1 button {
  float: center;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}


form.example1 button:hover {
  background: #0b7dda;
}
	</style></head>
<body>
<?php 
echo '<section>
  <!--for demo wrap-->
  <h1>Passwords</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Website</th>
          <th>User Name</th>
          <th>Password</th>
         
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">  <tbody>';
session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
	$a="";
	$b="";
	$c="";
	$name1="";
	$d =1;

		//something was posted
		//$webs = $_POST['webs'];
		$name1 = $user_data['user_name'];


		
			
			//read from database
			$query = "select * from userinfo where user_id1 = '$name1' order by website";
			$result = mysqli_query($con, $query);
			

	
				
				if(mysqli_num_rows($result)> 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
					//$row = mysqli_fetch_assoc($result);
				
    					$a= $row['user_name1'];
    					$b= $row['website'];
    					$c= $row['password'];
    					echo '<tr>

    					<td>'.$d.'</td>
    					<td>'.$b.'</td>
    					<td>'.$a.'</td>
    					<td>'.$c.'</td>
    					</tr>';
    					$d=$d+1;
    					//echo $a;

    					//echo "Name ".$row['user_name1']." Website ".$row['website']." Password ".$row['password'];
    					//  echo '';
									
    				}
				}
				else 
				{
					echo 'Data not available';
				}
	
?>
</tbody>
    </table>
  </div>
</section>
</form>
     <center> <form class="example1">
     <br>
      <a href="Index1.php"><button type="button"  href="Index1.php">HOME</button></a></form></center>
</body>
</html>



