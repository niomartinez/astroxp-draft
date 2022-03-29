	var resizeCover = function () {
		var banner = document.querySelector('#banner')
        console.log(banner);
        var owlSlider = banner.querySelector(".owl-stage-outer");
        console.log(owlSlider);
		var newHeight = window.innerHeight - document.getElementById('header').clientHeight;
		owlSlider.style.height = newHeight + "px";
		owlSlider.style.minHeight = newHeight + "px";

        console.log(newHeight);
	  }
	
	  $(document).ready(resizeCover);
	  window.onresize = resizeCover;
