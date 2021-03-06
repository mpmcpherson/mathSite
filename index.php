<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	</head>
	<body>
		<div id="container">
			<div id="moreProblems" style="cursor: pointer;">
				<h2>Make more problems!</h2>
				<h3><a style="text-decoration: none;" href="harder">Try harder problems!</a></h3>
			</div>
			<br/>
			
			<div id="body"></div>
			<br/>
			
			<div id="finished">You're done!</div>
		</div>
	</body>
	<?php require 'pierrefrancoisdulac.php'; ?>
</html>

<script>
	let MAX = 15;
	
	document.addEventListener("DOMContentLoaded", (event) => {
		loadAdditionProblems();

		let moreProblems = document.getElementById("moreProblems");

		moreProblems.addEventListener("click", function(){
			loadAdditionProblems();
		});

	});

	function loadAdditionProblems()
	{
		let localBody = document.getElementById("body");

		localBody.innerHTML ="";

		localBody.innerHTML = generateProblems(10);
		
		let inps = document.getElementsByClassName("inpVal");
		for(let j=0;j<inps.length;j++)
		{
			inps[j].oninput = function(){
				
				//alert("yo");
				//console.log(inps[j].value);
				/*
				if(inps[j].value==="")
				{
					inps[j].removeAttribute("style");
					inps[j].style="margin:10px";
				}
				*/

				if(inps[j].value==inps[j].getAttribute("target")){
					inps[j].style = "outline-color: green; outline-width: 10px;outline-offset: 0px;outline-style: outset; margin:10px;";
					//alert("correct!");
				}//else{inps[j].style = "outline-color: red; outline-width: 10px;outline-offset: 0px;outline-style: outset; margin:10px;";}
			}
		}
	}

	function generateProblems(numberOfProblems)
	{
		let lineOut = "";
		for(let i = 0; i < numberOfProblems; i++)
		{
			let firstInt = getRandomInt(MAX) * (Math.random() < 0.5 ? -1 : 1);
			let secondInt = getRandomInt(MAX) * (Math.random() < 0.5 ? -1 : 1);
			lineOut += "<div id='np"+i+"'><div>" + firstInt;
			if(secondInt >= 0){
				lineOut = lineOut + " + " + secondInt;  
			}else
			{
				lineOut = lineOut + " - " + (secondInt * -1);
			}  
			lineOut = lineOut + " = </div><input class='inpVal' type='number' style='margin:10px;' target="+(firstInt+secondInt)+"></input> </div>";
		}
		return lineOut;
	}


	function getRandomInt(max) {
	  return Math.floor(Math.random() * Math.floor(max));
	}

</script>