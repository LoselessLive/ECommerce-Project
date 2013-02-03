<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include('header.php'); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/coin-slider.js"></script>

	<link rel="stylesheet" href="assets/css/coin-slider-styles.css" type="text/css" />


	<title>Coin Slider: jQuery Image Slider Plugin with Unique Effects</title>
</head>
<body> 


<div class="row">
		<div id="games" style="margin:auto;margin-top:70px;">

					<?php foreach($banners as $banner):?>

					<a href="<?php echo $banner->link;?>" target="_blank">
						<img  src="<?php echo base_url('uploads/'.$banner->image);?>" alt="Mini Ninjas" />
					
						<span>
					<b><?php echo $banner->title ?></b><br />


					<?php echo $banner->description ?>
				</span>
					
						</a>

				<?php endforeach;?>



		
			
		</div>
		<script>
			$('#games').coinslider();
		</script>
<?php include('footer.php'); ?>
</body>
</html>