<?php
$vote = $_REQUEST['vote'];

$filename = "poll_result.txt";
$content = file($filename);


$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];

$yespercentage = 100*round($yes/($no+$yes),2);
$nopercentage = 100*round($no/($no+$yes),2);

$yesdecimal = $yespercentage/100;
$nodecimal = $nopercentage/100;

$rautepercentage = round($yespercentage*1.41);


if ($vote == 0) {
  $yes = $yes + 1;
}
if ($vote == 1) {
  $no = $no + 1;
}


$insertvote = $yes."||".$no;
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<div class="container">


	<div class="row text-center">
			<b>Result:</b> <span style="color:green"><?php echo $yes; ?> (yes)</span> / <span style="color:red"><?php echo $no; ?> (no)</span><br  />
			<b>Percentage:</b> <span style="color:green"><?php echo $yespercentage; ?>% (yes)</span> / <span style="color:red"><?php echo $nopercentage; ?>% (no) </span>
	</div>
	

	<div class="row">
		<div class="col-lg-12">
			<?php include('./circle.php'); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<?php include('./raute2.php'); ?>
		</div>
	</div>

	</div><!-- Ende row -->
	

</div>
