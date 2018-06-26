<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



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

html, body
	{
	background-color:rgba(0,0,0,1) !important;
	}

*
	{
	color:#fff;
	}
	


</style>

</head>

<body>


<div class="container">
<div class="row text-center">
		<b>Result:</b> <?php echo $yes; ?> (yes) / <?php echo $no; ?> (no)<br  />
		<b>Percentage:</b> <?php echo $yespercentage; ?>% (yes) / <?php echo $nopercentage; ?>% (no)
</div>
</div>




<!--
// 100 / (π * 2) = 15,91549430918952
// cx = cy (because its a circle)
// cx = r + (stroke-width / 2)
// viewbox values = cx * 2
-->

		<div id="circlebox">	
		
			<svg id="circlegrid" viewbox="0 0 37.83098862 37.83098862"  width="350" height="350" version="1.1" xmlns="http://www.w3.org/2000/svg" style="border:1px solid red;background-color:rgba(255,255,255,0.3);">
      			<circle class="circle-background"cx="18.91549431" cy="18.91549431" r="15.91549431" fill="none" stroke="rgba(200,200,200,1)" stroke-width="1" />
      			<circle class="circle-fill" cx="18.91549431" cy="18.91549431" r="15.91549431" fill="none" stroke="#0085b4" stroke-width="1" stroke-dasharray="<?php echo $yespercentage; ?>,100" />
  			</svg>

		</div>
		
		
		<div id="rectanglebox">
			
			<svg id="rectanglegrid" viewBox="0 0 250 250"  width="250" height="250" version="1.1" xmlns="http://www.w3.org/2000/svg" style="border:1px solid red;background-color:rgba(255,255,255,0.3);">
				
				<g transform="translate(0,0)" style="background-color:rgba(212, 103, 103, 0.2);">
					<rect id="rectangleleft" x="0" width='50' height='25%'  style="stroke:#009900; fill: #00cc00"/>
					<rect id="rectangleright" x="0" width='50' height='25%'  style="stroke:#009900; fill: red"/>
				</g>
			</svg>
			
		</div>
		


<script>

function circleshizzle()
	{
	    var circleboxHeight = document.getElementById('circlebox').offsetHeight;
		var circleboxWidth = document.getElementById('circlebox').offsetWidth;
		
		if (circleboxHeight > circleboxWidth)
			{
			circleboxHeight = circleboxWidth;
			}
		if (circleboxHeight > circleboxWidth)
			{
			circleboxWidth = circleboxHeight;
			}

		document.getElementById('circlegrid').setAttribute("height", circleboxHeight);
		document.getElementById('circlegrid').setAttribute("width", circleboxWidth);
	}
	
function rectangleshizzle()
	{
		var yespercent = '<?php echo $yespercentage; ?>';
		var nopercent = '<?php echo $nopercentage; ?>';
		
		var fullwidth = document.getElementById('rectanglebox').offsetWidth;
		//prozent in pixel gemessen an der gesamtbreite
		var yespixel = Math.round(document.getElementById('rectanglebox').offsetWidth * (yespercent/100));
		var nopixel = Math.round(document.getElementById('rectanglebox').offsetWidth * (nopercent/100));
		
	
// x-Wert (Zahlen) fuer x-Ursprung der viewBox: fullwidth - rectangle left fuer viewBox
var xviewBox = "-"+ (Math.round(fullwidth / 2));

//Einzelteile (x y width height) fuer viewBox zusammensetzen
var myview = xviewBox+" 0 "+rectanglebox.offsetWidth+" "+rectanglebox.offsetHeight;

//viewBox einstellen
document.getElementById('rectanglegrid').setAttribute('viewBox', myview); 

//x wert fuer rechtes rectangle
document.getElementById('rectangleleft').setAttribute('x', '-'+yespixel);


		//Prozentzahlen als width fuer links und rechts rectangle in Prozent --> shitty
		document.getElementById('rectangleleft').setAttribute('width', yespixel);
		document.getElementById('rectangleright').setAttribute('width', nopixel);
		

console.log('fullwidth : '+fullwidth+' = '+ yespixel+' : '+nopixel);
console.log('viewBox : '+myview);


	document.getElementById('rectanglegrid').setAttribute("width", fullwidth - 20);
	
	}

document.addEventListener("DOMContentLoaded",circleshizzle);
document.addEventListener("DOMContentLoaded",rectangleshizzle);

window.addEventListener("resize", circleshizzle);
window.addEventListener("resize", rectangleshizzle);

</script>
		
		
		
		
		<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-6 text-center">
			<div style="color:#fff;margin:auto;background-color:#fff;height:<?php echo(100*round($yes/($no+$yes),2)); ?>;width:55px;">		</div>


			<h3>Anne is saucool!</h3>
			<?php echo(100*round($yes/($no+$yes),2)); ?>%
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-center">
			<div style="color:#fff;margin:auto;background-color:#fff;height:<?php echo(100*round($no/($no+$yes),2)); ?>;width:55px;">		</div>


			<h3>Anne is...nett</h3>
			<?php echo(100*round($no/($no+$yes),2)); ?>%

		</div>
	
		
		
		
</body>
</html>
