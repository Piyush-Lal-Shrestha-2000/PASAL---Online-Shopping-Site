<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>
	<script>
		val = document.getElementById('hello');
		function clk()
		{
			document.getElementById('abc').value += 'abc';	
			alert(document.getElementById('val').value);
			document.getElementById('val').value = 'new data';
			document.getElementById('v1').value = 'VALUEEEFOR1';
			document.getElementById('v2').value = 'VALUEEEFOR2';
		}
		function dis()
		{
			//document.getElementById('f2').style.visibility = 'visible';	
		//	document.getElementById('toshow').style.visibility = 'hidden';	
			var a = document.getElementById('v1').value;
			var b = document.getElementById('v2').value;
			//document.getElementById('toshow').style.position = 'absolute';
			document.getElementById('toshow').style.margin = '-85px 0 0 0';
			document.getElementById('toshow').innerHTML = '<br>Hey here is '+a+' & '+b+' is here too.';		
		}
		function po()
		{
			//alert(val.max);
			if(val.value>val.max||val.value<val.min)
				alert('Not ok');		
			else
				alert('ok');
		}
    </script>
    <style>
		body {
		  width: 100px;
		  height: 100px;
		  background-color: red;
		  -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
		  -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
		  animation-name: example;
		  animation-duration: 4s;
		  background-color: yellow;
		
		}
		
		/* Safari 4.0 - 8.0 */
		@-webkit-keyframes example {
		  from {background-color: red;}
		  to {background-color: yellow;}
		}
		
		/* Standard syntax */
		@keyframes example {
		  from {background-color: red;}
		  to {background-color: yellow;}
		}
		#toshow{
			z-index:0;	
			position: absolute;
			margin: -65px 0 0 0;
		}
		#f2{
			z-index: -1;
		}
		#out{
			margin: -50px -30px;
		}
	</style>
    <form>
    	<input type = 'text' name = 'abc' id = 'abc'><br>
		<input type = 'text' name = 'val' id = 'val' value = '123' disabled>
    </form>
    <button id = 'ob' onclick = 'clk()'>Outside</button>
    <button onmouseover = 'dis()'>Hover on Me</button>
    <form method = 'post' id = 'f2' action = '#' style = 'visibility:hidden;'>
    	Value1 = <input type = 'text' name = 'v1' id = 'v1'><br>
		Value2 = <input type = 'text' name = 'v2' id = 'v2'><br>
		<input type = 'submit' name = 'sub' id = 'sub' value = 'SUBMIT'>
    </form>
    <div id = 'toshow'>
    	HELLO THIS IS ....
    </div>
    <div id = 'out'>
    <button style = 'position:absolute;margin: 10px 40px;border-radius: 40px;z-index:-1;background-image:url(Images/bell.jpg);background-color:#EB8F90; height:55px; background-position:center;background-size:contain;width: 60px;'></button>
                	<div style = 'background:red; height: 10px; box-shadow: 1px 1px 1px 1px #000;border: solid thin red; border-radius: 40px; width: 10px;margin:0px 80px;z-index:2;'></div>
	</div>
    <br><br><br><br><br><input type = 'number' step="" min = '2' max = '4'><br>
	
    <form>
    	<form>
        	Quantity: <input type = 'number' min = '1' max = '10' id = 'hello'>
        	<button onclick = 'po()'>Click</button>
        </form>
        <button onclick = 'po()'>Click</button>
    </form><br>
	<div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div>
    <a href = '#' id = 'pos'>You should be here</a>
    <div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div><div>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br>HELLO<br></div>
</body>
</html>