/* [ ---- Gebo Admin Panel - dashboard ---- ] */

$(document).ready(function() {

    //* resize elements on window resize
    var lastWindowHeight = $(window).height();
    var lastWindowWidth = $(window).width();
    $(window).on("debouncedresize",function() {
        if($(window).height()!=lastWindowHeight || $(window).width()!=lastWindowWidth){
            lastWindowHeight = $(window).height();
            lastWindowWidth = $(window).width();            
        }
    });
    //    
		
    //* to top
    $().UItoTop({
        inDelay:200,
        outDelay:200,
        scrollSpeed: 500
    });
});
	
	
  