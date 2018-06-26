
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

<!--
// 100 / (π * 2) = 15,91549430918952
// cx = cy (because its a circle)
// cx = r + (stroke-width / 2)
// viewbox values = cx * 2
-->

<br  />

	<svg id="rautegrid" viewBox="0 0 1 1" width="200" height="200" version="1.1" xmlns="http://www.w3.org/2000/svg" style="background-color:red;" transform='rotate(-135)' style="margin-top:35px;margin-left:35px;">
		<svg id="rautegrid" viewBox="0 0 100 100" width="1" height="1" version="1.1" xmlns="http://www.w3.org/2000/svg" style="" transform="rotate(45)"  >
			<rect id="rautevalue" x="0" y="-106" width='' height='212'  style="fill: green;" transform="rotate(45)">
				<animate id="rauteattribute" attributeName="width" from="0" to="100" dur="2s" begin="0.5s" />
			</rect>
		</svg>
	</svg>


<script>


//RAUTE SHIZZLE

// red/left = x
// green/top = y

//width = height



function rauteshizzle()
	{
	var rautediag = Math.round(Math.sqrt(20000));
	console.log('Diagonale: '+rautediag);

	var yespercentage = <?php echo $yespercentage; ?> ;
	var hundret = 141;
	var one = 1.41;

	var rauteheight = <?php echo $rautepercentage; ?>
	
console.log(rauteheight);

	document.getElementById('rautevalue').setAttribute('width',rauteheight);
	document.getElementById('rauteattribute').setAttribute('to',rauteheight);
	}

window.addEventListener("load",rauteshizzle);

document.addEventListener("DOMContentLoaded",rauteshizzle);



</script>

		
