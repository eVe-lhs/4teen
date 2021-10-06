document.getElementsByClassName("landingbutton").addEventListener("click",fadeout(this));
function fadeout(elem)
{	
			elem.classList.add("fadeout");
			$(".topic1").addClass("animatetopic1");
			$(".topic2").addClass("animatetopic2");
			$(".topic3").addClass("animatetopic3");
			$(".topic4").addClass("animatetopic4");}
$('a[href]').on('click', function () {
        performPageTransition(this.getAttribute('href'));
        return false;
    }
);

function performPageTransition(newUrl) {
   $(".topic1").addClass("fadeout");
			$(".topic2").addClass("fadeout1");
			$(".topic3").addClass("fadeout2");
			$(".topic4").addClass("fadeout3");
        window.location = newUrl;
    
}
            

