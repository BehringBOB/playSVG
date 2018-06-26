<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">    
<style>

html, body
	{
	background-color:rgba(0,0,0,0.0) !important;
	}

body
	{
	display:table;
	height:100%;
	width:100%;
		font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;

	}

#poll
	{
	display:table-cell;
	height:100%;
	width:100%;
	vertical-align:bottom;
	text-align:center;
	}

*:focus { outline: none; }
	
.btn
	{
	border-radius:0px;
	border:2px solid #fff !important;
	background-color:transparent !important;
	}
#allbox
	{
	padding:30px;
	}
#outerraute
	{
	background-color:transparent;
	border:1px solid white;
	transform:rotate(45deg);
	position:absolute;
	top:37px;
	left:37px;
	}
	
#rautebox
	{
	margin: auto;
	z-index:1;
	position:relative;
	}
	
#rautegrid
	{
	margin:auto;
	background-color:black;
	border: 3px solid rgba(255,255,255,0.9);
	padding:10px;
	margin-bottom: 46px;
	opacity:0.8;
	}
	


form, button
	{
	background-color:transparent !important;
	border:0 !important;
	padding:0;
	margin:0;
	}
	
button img
	{
		width:100px;

	}

.resultbox, button
	{
	width:100px;
	position: absolute;
	bottom: 40px;
	z-index:999;

	}
#resbox_l, #yess
	{
    left: calc(25% - 50px);
	}
#resbox_r, #nope
	{
    right: calc(25% - 50px);
	}
		
.result
	{
	height:100px;
	width:100px;
	text-align:center;
	font-size:20px;
	font-weight:bold;
		display:table-cell;
	vertical-align:middle;
	    line-height: 24px;
	}

#result_black, #result_white
	{
	background-image: url("black2.png");
    background-repeat: no-repeat;
    background-color: transparent;
    background-size:100px 100px;

	}
	
#result_white
	{
	background-image: url("white2.png");
	}

</style>

</head>

<body>

<div id="poll">


	<form>


				<lable onclick="getVote(document.getElementById('yess').value)" for="yess">
					<button type="button" id="yess" name="vote" for="yess" value="0" >
						<img src="black.png" />
					</button>
				</lable>

			
		<svg id="rautegrid" viewBox="0 0 1 1" width="100" height="100" version="1.1" xmlns="http://www.w3.org/2000/svg" transform='rotate(-135)'>

			<svg viewBox="0 0 100 100" width="1" height="1" version="1.1" xmlns="http://www.w3.org/2000/svg" style="" transform="rotate(45)">
				<!-- die Width ist die Height bzw. der Prozentsatz der daragestellt werden soll -->
				<rect id="rautevalue" x="0" y="-106" width='<?php echo $rautepercentage; ?>' height='212'  style="fill: white;" transform="rotate(45)">
					 <animate id="rauteattribute" attributeName="width" from="0" to="<?php echo $rautepercentage; ?>" dur="1s" begin="0.0s" />
				</rect>
			</svg>
		</svg>		
		
			

				<lable onclick="getVote(document.getElementById('nope').value)" for="nope">
					<button type="button" id="nope" name="vote" value="1" >
						<img src="white.png" />
					</button>
				</label>

	</form>


</div>


<script>



function getVote(int) 
	{
	if (window.XMLHttpRequest) 
		{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
  
	else 
		{  // code for IE6, IE5
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		
  	xmlhttp.onreadystatechange=function() 
  		{
    	if (this.readyState==4 && this.status==200) 
    		{
      		document.getElementById("poll").innerHTML=this.responseText;
      		raute();
    		}
  		}
  
	xmlhttp.open("GET","raute_vote.php?vote="+int,true);
	xmlhttp.send();
}

function raute()
	{

var rautegridwidth = document.getElementById('rautegrid').getBBox();

document.getElementById('rautegrid').setAttribute('width',100);
document.getElementById('rautegrid').setAttribute('height',100);


// Diagonale der Raute berechnen mit Satz des Pythagoras (gerundet)
// (a+a) + (b*b) = Math.round(Math.sqrt(c))
var rautHeight = document.getElementById('rautegrid').getAttribute('height');
var rautWidth = document.getElementById('rautegrid').getAttribute('width');
var rautediagonale = Math.round(Math.sqrt((rautHeight*rautHeight) + (rautWidth*rautWidth)));

//margin-left weil Quadrat um 45° gedreht breiter ist als normal
//document.getElementById('rautegrid').style.marginLeft = (rautediagonale - rautWidth)/2;
//gleiches fuer margin-top
//document.getElementById('rautegrid').style.marginTop = (rautediagonale - rautWidth)/2;
//Jetzt nur noch die Div Box drum herum aufziehen, damit sie so hoch wie die Raute ist
document.getElementById('rautebox').style.height = rautediagonale;
document.getElementById('rautebox').style.width = rautediagonale;

document.getElementById('outerraute').style.height = (210);
document.getElementById('outerraute').style.width = (210);

	}



</script>

</body>
</html>