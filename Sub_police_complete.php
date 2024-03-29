<!DOCTYPE html>
<html>
<head>
	<title>Police completed complaint</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
     <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Sub_policelogin.php");
     
    $conn=mysqli_connect("localhost","root","");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"on_the_go incident reporter");
      
    
    $p_id=$_SESSION['pol'];
     $result=mysqli_query($conn,"SELECT c_id,type_crime,d_o_c,location,mob,sub,woreda FROM p_handler natural join user where p_id='$p_id' and pol_status='ChargeSheet Filed' order by c_id desc");
    ?>

</head>
<body>
	<nav  class="navbar navbar-default navbar-fixed-top" style="background-color:#3b3b3b;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>On_The_Go Incident Reporter</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="Sub_policelogin.php">Subcity Police Login</a></li>
        <li><a href="Sub_policeHome.php">Subcity Police Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Sub_policeHome.php">Pending Complaints</a></li>
        <li  class="active" ><a href="Sub_police_complete.php">Completed Complaints</a></li>
        <li><a href="Sub_police_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
    
    
    
 <div style="padding:50px;margin-top:5%;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
          <th scope="col">Location of Crime</th>
          <th scope="col">Complainant Mobile</th>
          <th scope="col">Complainant Address</th>
          <th scope="col">Woreda</th>
        
      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_assoc($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['c_id']; ?></td>
        <td><?php echo $rows['type_crime']; ?></td>     
        <td><?php echo $rows['d_o_c']; ?></td>   
        <td><?php echo $rows['location']; ?></td>
        <td><?php echo $rows['mob']; ?></td>
        <td><?php echo $rows['sub']; ?></td>
        <td><?php echo $rows['woreda']; ?></td>
                   
      </tr>
    </tbody>
    
    <?php
    } 
    ?>
  
</table>
 </div>

 <div style="position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color:#3b3b3b;
            color: white;
            text-align: center;">
            <h4 style="color: white;">&copy <b>On_The_Go Incident Reporter</b></h4>
         </div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>