<?php
$vote = $_REQUEST['vote'];

$filename = "poll_result.txt";
$content = file($filename);


$array = explode("||", $content[0]);
$yes = $array[0];
$no = $array[1];


// in verschiedenen Einheiten
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


<style>
body
	{
	background-color:grey;
	}
</style>




		<div  id="resbox_l" class="resultbox"><div id="result_black"  class="result" style="color:#fff;"><?php echo $yes; ?>
		<br  /><span style="font-size:8px;line-height: 5px;">Stimmen</span>
		</div></div>
	
		<div id="resbox_r" class="resultbox"><div id="result_white" class="result" style="color:#000;"><?php echo $no; ?>
		<br  /><span style="font-size:8px;line-height: 5px;">Stimmen</span>
		</div></div>

	
		<svg id="rautegrid" viewBox="0 0 1 1" width="100" height="100" version="1.1" xmlns="http://www.w3.org/2000/svg" transform='rotate(-135)'>
		
			<svg viewBox="0 0 100 100" width="1" height="1" version="1.1" xmlns="http://www.w3.org/2000/svg" style="" transform="rotate(45)">
				<!-- die Width ist die Height bzw. der Prozentsatz der daragestellt werden soll -->
				<rect id="rautevalue" x="0" y="-106" width='<?php echo $rautepercentage; ?>' height='212'  style="fill: white;" transform="rotate(45)">
					 <animate id="rauteattribute" attributeName="width" from="0" to="<?php echo $rautepercentage; ?>" dur="1s" begin="0.0s" />
				</rect>
			</svg>

		</svg>
		
		
	