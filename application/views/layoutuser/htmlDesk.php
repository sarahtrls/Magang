<!DOCTYPE html>
<html lang="en">
<?php include 'headUser.php'?>
<?php include 'navbarUser.php';?>
<?=$content?>

<body>
	<div class="col-auto">
		
	</div>
	<div class="container body">
		
		<?php include 'mainUSer.php'?>

	</div>
    <?php include 'footerUser.php';?>
	<?php include 'jsUSer.php'?>
	<?php
    if(isset($js)){
        echo $js;
    }
?>

</body>

</html>