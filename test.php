<?php

require_once 'Vanita/connection.php';
$id=$_GET['id'];
?>

<?php
include 'header2.php';
?>

<!-- Fancybox CSS library -->
<link rel="stylesheet" href="fancybox/jquery.fancybox.css">

<!-- Stylesheet file -->
<link rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="style.css" />

<!-- jQuery library -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="js/jquery.min.js"></script>

<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>

<!-- Initialize fancybox -->
<script>
	$("[data-fancybox]").fancybox();
</script>
</head>	
	<div class="container">	
	<div class="row">
			<div class="navbar-collapse gallery">
				<ul>
				<?php	
				$limit = 10;  
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
					$start_from = ($page-1) * $limit;
				
						$sql_query1="SELECT * FROM collection where catid=".$id." LIMIT $start_from,$limit";
					$resultset = mysqli_query($conn, $sql_query1) or die("database error:". mysqli_error($conn));
					while($rows = mysqli_fetch_array($resultset) ) { ?>
					<li>					
					
				
				<a href="http://localhost:81/h1/Vanita/<?php echo $rows["collection_image"];?>" data-fancybox="gallery" data-caption="<?php echo $rows["collection_image_name"]; ?>" >
                <img src="http://localhost:81/h1/Vanita/<?php echo $rows["collection_image"];?>" alt="" /></a>
					</li>
					<?php } ?>
				</ul>			
			</div>
			</div>
				<?php  
$sql = "SELECT COUNT(id) FROM collection where catid=".$id.""; 
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  


 $pagLink .= "<a href='test.php?id=".$id."&page=".$i."'>". $i . "</a>";

};  
echo ($pagLink ). "</ul>";  

                    // Close connection
                    mysqli_close($conn);
					?>
	
	
</div>


<?php 
include'footer.php';
?>
