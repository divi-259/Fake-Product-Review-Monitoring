<!DOCTYPE html>
<?php
	 session_start();
	 include('connect.php');
	 
	 $pid=$_SESSION['pid'];
	 $q="SELECT * FROM products WHERE pid='$pid'";
	 $result=mysqli_query($connection,$q);
	 $row1=mysqli_fetch_assoc($result);
	 $pname=$row1['pfullname'];
	 $des=$row1['p_des'];
	 $image=$row1['p_image'];
	 $link=$row1['p_link'];
	 $high=$row1['highlight'];
	$price=$row1['price'];
?>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title><?php echo $pname; ?></title>
</head>
<body bgcolor="#D7DFAC">

<div class="container">

<header>
<br>
   <a href="index.php" style="text-decoration:none"><center><b><div class="title"><font size="20px">Shop Genuine</font></div></b></center></a>
   <br><br>
<div id="Top_menu" align="left"> 
	<a href="index.php"><div class="tab">Home</div></a>
	<a  href="about.php"><div class="tab">About Us</div></a>
	<a  href="contact.php"><div class="tab">Contact Us</div></a>
	
   <?php	
	
	  if(isset($_SESSION['id']))
	 {
		 
		 $uid=$_SESSION['id'];
		 $query="SELECT * FROM user1 WHERE id='$uid'";
		 $result=mysqli_query($connection,$query);
		 $row=mysqli_fetch_assoc($result);
		 $fname=$row['fname'];
		 $lname=$row['lname'];
	 }	
  if(!isset($_SESSION['logged_in']))
 {
   echo "<div align='right' id='r'>
   <a href='registration.php' ><div class='tab'>Sign Up</div></a>
	<a  href='Login.php'><div class='tab'>User Login</div></a>
	</div>";
 }
 else
 {
	  if($_SESSION['user']==0)
	 {
	 echo "<div STYLE='position:relative'><button type='button' class='btn logout' onclick=\"location.href='logout.php'\">LOGOUT</button>
	<a style='text-decoration:none' href='overview.php'>
	<div class='icon'>
	<img src=".$row['photo']." width='22px' height='20px' STYLE='position:absolute;border-radius:10px'></img>
	<font size='5px'><b>&nbsp&nbsp&nbsp&nbsp ".$fname."</b><br></font>
	</div>
	</a></div>";
	}
	else
	{
		echo "<div STYLE='position:relative'><button type='button' class='btn logout' onclick=\"location.href='logout.php'\">LOGOUT</button>
	<a style='text-decoration:none' href='admin.php'>
	<div class='icon'>
	<img src='icon.png' width='22px' height='20px' STYLE='position:absolute;border-radius:10px'></img>
	<font size='5px'><b>&nbsp&nbsp&nbsp&nbsp Admin</b><br></font>
	</div>
	</a></div>";
	}
 }
?>
	
</div>
</header>
  
 <nav> 
  <ul>
    <li><a href="mobile.php">Mobiles</a><hr>
				<ul >
					<li><a href="m_samsung.php">Samsung</a></li>
					<li><a href="m_nokia.php">Nokia</a></li>
					<li><a href="m_apple.php">Apple</a></li>
					<li><a href="m_sony.php">Sony</a></li>
					
					<li><a href="m_lenovo.php">Lenovo</a></li>
				</ul>
				</li>
    <li><a href="laptop.php">Laptops</a><hr>
			<ul>
					<li><a href="l_samsung.php">Samsung</a></li>
					<li><a href="l_nokia.php">Toshiba</a></li>
					<li><a href="l_dell.php">Dell</a></li>
					<li><a href="l_sony.php">Sony</a></li>
					
					<li><a href="l_lenovo.php">Lenovo</a></li>
				</ul>
	</li>
    <li><a href="tablet.php">Tablets</a><hr>
			<ul>
					<li><a href="t_samsung.php">Samsung</a></li>
					<li><a href="t_htc.php">HTC</a></li>
					<li><a href="t_apple.php">Apple</a></li>
					
					<li><a href="t_asus.php">ASUS</a></li>
					<li><a href="t_lenovo.php">Lenovo</a></li>
				</ul>
			</li>
  </ul>
</nav>

 
   <article STYLE="padding:0px;overflow:hidden;height:100%">
   <div class="promenu">
	<div  id="t1">
	<button type="button" class="btn b1" id="b11" onclick="location.href='viewreview.php'">Reviews</button>
	</div>
	<div  id="t2">
	<button type="button" class="btn b1" id="b12" onclick="location.href='des.php'">About Product</button>
	</div>
</div>


   <div STYLE="padding:20px 20px 20px 20px;overflow-y:auto;position:relative;height:690px;top:51px">
  <a href="#" title=<?php echo $pname; ?> >
  <div STYLE="position:absolute;top:70px;left:200px">
 <?php echo "<img src=".$image."  height='250' width='300' style='border:2px groove grey'/>"; ?> 
  </div></a>
 <a href=<?php echo $link; ?> >
   <input type="button" value="Buy Now" STYLE="position:absolute; TOP:340px; LEFT:200px;width:300px;height:30px"></input></a>
 <h1 STYLE="color:# 191C6B;position:absolute; TOP:20px; LEFT:200px">&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $pname; ?></h1> 
	<h1 STYLE="border-radius:5px;border:1px solid;position:absolute;top:20px;left:580px;background-color:#d9d9d9;padding-left:5px;padding-right:5px;padding-bottom:2px">Price: Rs.<?php echo $price; ?></h1> <br>
   <div STYLE="width:500px;height:300px;position:absolute;left:500px;top:70px" >
	<ul class="detail"><font size="5px" STYLE="font-weight:bold;color:#434343;text-decoration:underline">HIGHLIGHTS</font>
	
	
	<font style="color:#434343"><?php echo $high; ?></font>

   </ul>
   </div>
   </ul>
   </div>
  
   <div STYLE="position:absolute;top:440px;width:1050px;left:25px;
	background-image:url('back.jpg');border:1px solid grey;
	overflow-y:auto;
	height:150px">
   <pre><h2><center>Reviews</center></h2></pre>
   
   <ul>
   <?php 
		$q="SELECT * FROM reviews WHERE pid='$pid'";
		$result =mysqli_query($connection,$q);
		
		while($row = mysqli_fetch_assoc($result))
		{ 
			$rev=$row['review'];
			$uid=$row['uid'];
			$q="SELECT * FROM user1 WHERE id='$uid'";
			$result1=mysqli_query($connection,$q);
			$row1=mysqli_fetch_assoc($result1);
			$ph=$row1['photo'];
			$name=$row1['fname']." ".$row1['lname'];
			echo "<li><img src=".$ph." STYLE='width:15px;height:14px;border:groove;border-radius:2px'><font size='3px' color=#000000><b>".$name."</b></font><p><font size='4px'>&nbsp&nbsp&nbsp&nbsp".$rev."</font><p></li><br><br>";
		}
		
	?>
	</ul>
   </div>
   <form STYLE="position:absolute;top:565px;left:-10px;margin:10px;padding:30px" method="POST" action="addreview.php">
   <textarea STYLE="width:920px ; height:90px;border:1px solid ;;bottom:20px" name="rev"></textarea>
   <div STYLE="position:absolute;top:30px;left:960px">
    <input type="submit" value="Add Comment" name="save"/>
   </div>
   </form>
 </article>  

<footer>Created By- Divyanshi Dixit, Parul Choudhary and Komal Agarawal</footer>

</div>

</body>
</html>
