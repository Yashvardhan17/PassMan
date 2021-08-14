<?php 

session_start();

  include("connection.php");
  include("functions.php");
  $user_data = check_login($con);
  $a="";
  $b="";
  $c="";
  $webs="";
  $result=0;
  $d=1;
if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    //$webs ="";
    $webs = $_POST['webs'];
    $name1 = $user_data['user_name'];
    /*if(($webs)=="")
      $b="No Data Entered";
    //echo $webs;
      else{*/
      //read from database
     $query = "select * from userinfo where user_id1 = '$name1' and upper(website) like trim(upper('%{$webs}%')) ";
       //$query = "select * from userinfo";

      $result = mysqli_query($con, $query);
      
        //unset($webs);
      /*  if($result)
        {
          $row = mysqli_fetch_assoc($result);
        
              $a= $row['user_name1'];
              $b= $row['website'];
              $c= $row['password'];

        }
        else 
        {
          //$b='Data not available';
          echo 'Data not available';
          echo "<h2><center>No data</center></h2>";
        }*/
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>PassMan page</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


	<script >// '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();</script>
</head>
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
  font-weight: 900;
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
* {
  box-sizing: border-box;
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
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

form.example button:hover {
  background: #0b7dda;
}
form.example1 button:hover {
  background: #0b7dda;
}
/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
	</style>
<body>

<div class="container vh-100">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- The form -->
<form class="example" method ="POST" style="margin:auto;max-width:300px">
 
              <input type="text"  placeholder="Search.." id="name"  name="webs" />
  <button type="submit"><i class="fa fa-search"></i></button>
  <!-- <a href="Index1.php"><button type="button"  href="Index1.php">HOME</button></a>-->
  </form>
     <center> <form class="example1">
     <br>
      <a href="Index1.php"><button type="button"  href="Index1.php">HOME</button></a></form></center>
        
        </div>
      </div>
    </div>
  </div>
	<section>
  
  <h1>Searched Content</h1>
  
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



  <?php
  error_reporting(E_ERROR | E_PARSE);
  if (mysqli_num_rows($result)==0)
    echo "<h2><center>No data</center></h2>";
  else{?>
    
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
          <?php

            while($row = mysqli_fetch_array($result))
          {
          //$row = mysqli_fetch_assoc($result);
        
              $a= $row['user_name1'];
              $b= $row['website'];
              $c= $row['password'];
              echo '<tr>

              <td scope="row">'.$d.'</td>
              <td>'.$b.'</td>
              <td>'.$a.'</td>
              <td>'.$c.'</td>
              </tr>';
              $d=$d+1;
       }
        ?>
    <!--  <td scope="row">1</td>
      <td><?php echo $b ?></td>
      <td><?php echo $a ?></td>
      <td><?php echo $c ?></td>
    </tr>-->
      </tbody>
    </table>
  </div>
<?php
}

?>
</section>






</body>
</html>
