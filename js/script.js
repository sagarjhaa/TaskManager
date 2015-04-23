$(document).ready(function() {

    var allPanels = $('.accordion > dd').hide();
      
    $('.accordion > dt > a').click(function() {
      allPanels.slideUp();
      $(this).parent().next().slideDown();
      return false;
    });

    $('#add').click(function() {
        
        // var tohead = $("input[name=data]").val();
        // var toAdd = $("input[name=message]").val();
        // $('#menu').append("<div> <h4>"+tohead+"</h4> </div>");
        // $('#menu').append("<div> <p>"+toAdd+"</p> </div>");

        var tohead = $("input[name=data]").val();
        var toAdd = $("input[name=message]").val();
        $('.accordion').append("<dt> <a href="">"+ tohead +"</a> </dt>");
        $('.accordion').append("<dd>"+toAdd+"</dd>");
    	    
    });
    
    $('#list').click(function(){
        
        $('#menu').accordion();
        
    });
});