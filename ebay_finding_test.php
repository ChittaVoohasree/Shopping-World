<html>
<head>
<title>Welcome</title>
<!-- @BY team Name -->
<style>
#one {

	 height:800;
	width: 1080;
  float:left;
//background-color:red;
	 border:normal;
}
#two {
		 width:1080;
	 height:1050;
	 float:left;
 //background-color:green;
	
}
</style>
</head>
<body style="background-color:#b3c6ff">
<div id="one">
<h1>Ebay Results</h1>
<?php

require_once('class.ebay.php');
$ebay = new ebay('student93-9027-4244-891a-f8a94897de2', 'EBAY-IN');
$sort_orders = $ebay->sortOrders();
?>

<form action="ebay_finding_test.php"  method="post">
	<input type="text" name="search" id="search"  style="color:blue " placeholder="Enter the Key word">
	<select name="sort" id="sort">
	<?php
	foreach($sort_orders as $key => $sort_order){
	?>
		<option value="<?php echo $key; ?>"  style="background-color:#ccffff"><?php echo $sort_order; ?></option>
	<?php	
	}
	?>
	</select>
	<input type="submit" value="Search"  style="color:blue">
</form>

<?php
if(!empty($_POST['search'])){
	$results = $ebay->findItemsAdvanced($_POST['search'], $_POST['sort']);
	$item_count = $results['findItemsAdvancedResponse'][0]['searchResult'][0]['@count'];
	
	if($item_count > 0){
		$items = $results['findItemsAdvancedResponse'][0]['searchResult'][0]['item'];
		?>
		<table border="1" align="center" style="color:grey" target="one">
		<?php
		$count=0;
	$end = 1;
	
		foreach($items as $i){
			$count++;
	

$end = 0;
			if($count%3==1)
				echo '<tr><td align="center">';
			else if($count%3==2)
				echo '</td><td align="center">';
			else{
				echo '</td><td align="center">';
				$end =1;
			}
	?>

	
			<div class="item_title">
				<a href="<?php echo $i['viewItemURL'][0]; ?>"><?php echo $i['title'][0]; ?></a>
			</div>
			<div class="item_img">
				<img src="<?php echo $i['galleryURL'][0]; ?>" alt="<?php echo $i['title']; ?>">
			</div>
			<div class="item_price">
				<?php echo $i['sellingStatus'][0]['currentPrice'][0]['@currencyId']; ?>
				<?php echo $i['sellingStatus'][0]['currentPrice'][0]['__value__']; ?>
			</div>
			
			
<?php
		}
		?>
		</table>
		<?php
	}
if($item_count ==0)
{
?>
<h1 style="color:red" align="center">NO RESULT FOUND</h1>	
</div>
<?php
}
}
?>
<div id="two">
<h1>Flipkart Results</h1>
<?php
require_once('demo.php');
?>
</div>
</body>
</html>