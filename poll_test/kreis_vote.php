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
			<div id="circlebox">	
		
				<svg id="circlegrid" viewbox="0 0 37.83098862 37.83098862"  width="350" height="350" version="1.1" xmlns="http://www.w3.org/2000/svg">
					<circle class="circle-background" cx="18.91549431" cy="18.91549431" r="15.91549431" fill="none" stroke="rgba(200,200,200,1)" stroke-width="3" />
					<circle class="circle-fill" cx="18.91549431" cy="18.91549431" r="15.91549431" fill="none" stroke="#0085b4" stroke-width="3" stroke-dasharray="<?php echo $yespercentage; ?>,100" />
				</svg>

			</div>
		
		</div>
	</div>
	


	</div><!-- Ende row -->
	

</div>
