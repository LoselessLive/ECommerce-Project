<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>
<?php if(isset($meta)):?>
		<?php echo $meta;?>
<?php else:?>
		<meta name="Keywords" content="Shopping Cart, eCommerce, Code Igniter">
		<meta name="Description" content="Go Cart is an open source shopping cart built on the Code Igniter framework">
<?php endif;?>

<?php echo get_style(); ?>
<?php echo get_js(); ?>
<?php echo get_js("header"); ?>

<?php
//with this I can put header data in the header instead of in the body.
if(isset($additional_header_info))
{
	echo $additional_header_info;
}

?>
</head>

<body>
	<div class="container">
		<header id="header-menu-container">
			<div id="header-logo"></div>
			<div id="header-menu">
				<ul class="header-menu">
				    <li>
				        <a href="<?php echo site_url();?>">
				            <span class="header-icon icon-home"></span>
				            <div class="header-content">
				                <h2 class="header-main">Home</h2>
				            </div>
				        </a>
				    </li>
				    <li class="browse-all">
				        <a href="<?php echo site_url('?see=all');?>">
				            <span class="header-icon icon-th"></span>
				            <div class="header-content">
				                <h2 class="header-main">Browse All</h2>
				            </div>
				        </a>
				    </li>
				</ul>
			</div>

			<!-- Right Set -->
			<div id="header-rightset">
				<div class="rightset-first">
					<div id="header-cartmenu" class="btn-group pull-right">
						
					</div>

					<div id="header-search" class="pull-right">
						<form class="form" action="<?php echo site_url('cart/search');?>">
							<div class="input-append">
								
								<input type="text" name="term" placeholder="<?php echo lang('search');?>">
								<button type="submit" class="btn submit-not-disable"><span class="icon-search"></span></button>
								<a class="btn" href="<?php echo site_url('cart/view_cart');?>">
									<span class="icon-shopping-cart"></span> 
									<?php
										if ($this->go_cart->total_items()==0)
										{
											echo lang('empty_cart');
										}
										else
										{
											if($this->go_cart->total_items() > 1)
											{
												echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
											}
											else
											{
												echo sprintf (lang('single_item'), $this->go_cart->total_items());
											}
										}
									?>
								</a>

							</div>
						</form>
					</div>
				</div>
				<div class="rightset-second">
					<div id="header-usermenu" class="btn-group pull-right">
						<?php if($this->Customer_model->is_logged_in(false, false)):?>
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="icon-user"></span> <?php echo lang('account');?>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('secure/my_account');?>">
										<i class="icon-cog icon-large"></i><?php echo lang('my_account')?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('secure/my_downloads');?>">
										<i class="icon-download-alt icon-large"></i><?php echo lang('my_downloads')?>
									</a>
								</li>
								<li>
									<a href="<?php echo site_url('secure/logout');?>">
										<i class="icon-off icon-large"></i><?php echo lang('logout');?>
									</a>
								</li>
							</ul>
						<?php else: ?>
							<a class="btn" href="<?php echo site_url('secure/login');?>">
								<span class="icon-key"></span> <?php echo lang('login');?>
							</a>
						<?php endif; ?>
					</div>

					<div id="dd" class="wrapper-dropdown" tabindex="0">
					    <span>
					    	<?php
					    		if(!empty($category->name)){
					    			echo $category->name;
					    		}else{
					    			echo 'Browse by category';
					    		} 
					    	?>
					    </span>
					    <ul class="cate-dropdown">
					    	<?php foreach($this->categories as $cat_menu):?>
								<li>
									<a href="<?php echo site_url($cat_menu['category']->slug);?>">
										<i class="icon-double-angle-right icon-large"></i> <?php echo $cat_menu['category']->name;?>
									</a>
								</li>
							<?php endforeach;?>
					    </ul>
					</div>

				</div>
				
			</div>
			<!-- End right set -->
		</header>


		<?php if(!empty($base_url) && is_array($base_url)):?>
			<div class="row">
				<div class="span12">
					<ul class="breadcrumb">
						<?php
						$url_path	= '';
						$count	 	= 1;
						foreach($base_url as $bc):
							$url_path .= '/'.$bc;
							if($count == count($base_url)):?>
								<li class="active"><?php echo $bc;?></li>
							<?php else:?>
								<li><a href="<?php echo site_url($url_path);?>"><?php echo $bc;?></a></li> <span class="divider">/</span>
							<?php endif;
							$count++;
						endforeach;?>
 					</ul>
				</div>
			</div>
		<?php endif;?>
		
		<?php if ($this->session->flashdata('message')):?>
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php endif;?>
		
		<?php if ($this->session->flashdata('error')):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('error');?>
			</div>
		<?php endif;?>
		
		<?php if (!empty($error)):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $error;?>
			</div>
		<?php endif;?>
		
		

<?php
/*
End header.php file
*/