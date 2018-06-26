<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">    
<style>

html, body
	{
	background-color:rgba(0,0,0,1) !important;
	}

*
	{
	color:#fff !important;
	}
	
.btn
	{
	border-radius:0px;
	border:2px solid #fff !important;
	background-color:transparent !important;
	}

/* Kreisdiagramm */
#circlebox
	{
	width:50%;
	max-width:250px;
	height:50%;
	max-height:250px;
	margin:auto;
	padding:0;
	border:none;
	}
	
#circlegrid circle
	{
	transform: rotate(-90deg); 
	transform-origin: center;
	stroke-linecap:round;
	}
.circle-fill
	{
	animation: circle-chart-fill 2s reverse;
	}	
@keyframes circle-chart-fill {
  to { stroke-dasharray: 0 100; }
}

</style>

</head>

<body>



<br  /><br  />
	<h1 class="text-center">Ist Anne cool?</h1>
<br  /><br  />


<div id="poll" class="container">

	<div div class="row">

	<form>
		<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-6">
			<lable class="btn btn-lg btn-primary btn-block" onclick="getVote(document.getElementById('yess').value)" for="yess">
			
				<input type="hidden"  name="vote" value="0" id="yess" >Na klar!
				
			</label>
		</div>
	

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
			<lable class="btn btn-lg btn-primary btn-block" onclick="getVote(document.getElementById('nope').value)" for="nope">
			
				<input type="hidden" name="vote" value="1" id="nope" >Anne ist...nett
				
			</label>
		</div>
	</form>

	</div>


</div>


<script>

function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    
      	document.getElementById("poll").innerHTML=this.responseText;
      	circleshizzle();	
    }
  }
  xmlhttp.open("GET","kreis_vote.php?vote="+int,true);
  xmlhttp.send();
}

document.addEventListener("DOMContentLoaded",circleshizzle);
window.addEventListener("resize", circleshizzle);


// Circle Diagram
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
		
		
		console.log('Circle Box Height: '+circleboxHeight);
		console.log('Circle Box Width: '+circleboxWidth);
		
		document.getElementById('circlegrid').setAttribute("height", circleboxHeight);
		document.getElementById('circlegrid').setAttribute("width", circleboxWidth);
	}



</script>

</body>
</html>