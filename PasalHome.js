// JavaScript Document
var imgs = new Array('Images/SuperDiscount.jpg','Images/OffersWNTY.png','Images/SpecialOffers2.jpg','Images/SalePer.jpg','Images/GreatDeal.jpg','Images/NewItems.gif','Images/AffordablePrices.jpg','Images/GreatService.jpg','Images/Sale.jpg');
var i=0,j=1,k=2;
function ld()
{
	//alert("This site uses cookies to store your cart details.");
	setInterval(function(){
		imgslid();			
	},2000);
}
function imgslid()
{
	if(i>imgs.length-1)
		i = 0;
	if(j>imgs.length-1)
		j = 0;
	if(k>imgs.length-1)
		k = 0;
	document.getElementById('imgsli').innerHTML = "<img src = '"+imgs[i++]+"' height = '200px' width = '500px'>"+"<img src = '"+imgs[j++]+"' height = '200px' width = '500px'>"+"<img src = '"+imgs[k++]+"' height = '200px' width = '500px'>";	
}
function dis()
{
	setTimeout(location.href='PasalCart.php',5000);	
}
function readcookie(cname)
{
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ')
			c = c.substring(1);
		if (c.indexOf(name) == 0)
			return c.substring(name.length, c.length);
  }
  return "";	
}
function cart(id)
{
	var Q = document.getElementById('Q'+id);
	if(!Q.checkValidity())
		Q.reportValidity();
	else{
		document.getElementById('D'+id).innerHTML = 'Already selected';
		document.getElementById('cid').value+=id+'#';
		document.getElementById('cq').value+=Q.value+'#';
		document.cookie = "IID = "+document.getElementById('cid').value;
		document.cookie = "IQNT = "+document.getElementById('cq').value;
		//The values of the cookies are later accessed in PHP				
		if(document.getElementById('cid').value!='')
			document.getElementById('cdot').style.visibility = 'visible';
	}
}
/*Scroll
window.onscroll = function() {scrollFunction()};
	function scrollFunction() {	
	  if(document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
		//document.getElementById("start").style.height='';
		document.getElementById("logo").innerHTML= "<i class='fa fa-shopping-cart' style = 'font-size:20px'>";
	  } else {
		document.getElementById("logo").innerHTML = "PASAL<i class='fa fa-shopping-cart'>";
	  }
}*/