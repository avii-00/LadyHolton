// JavaScript Document
//Image slider 

var index = 0;
var i = 0;
var slider = document.getElementsByClassName("slider");
var line = document.getElementsByClassName("line");

auto();

function show(n)
{
	for(i=0; i<slider.length; i++)    /* slider.length=4  */
		{
			slider[i].style.display="none";
		}
	for(i=0; i<line.length; i++)     /* line.length=4  */
		{
			line[i].className = line[i].className.replace("active");
		}
	slider[n - 1].style.display=("block");
	line[n - 1].className += "active";   /* add space */
}

function auto()
{
	index++;
	if(index > slider.length) /* To move from last slide to the first slide */
		{
			index = 1;
		}
	show(index); /* calling show */
	setTimeout(auto,5000);  /* Next slide will appear after 5s  */
}

function plusSlide(n)
{
	index += n;  /* n=1 or n= -1  */
	if(index > slider.length) /* To move from last slide to the first slide */
		{
			index = 1;
		}
	
	if(index < 1)  /* To move from first slide to last the slide  */
		{
			index = slider.length;
		}
	
	show(index);
}

function currentSlide(n)
{
	index = n;
	show(index);
}
