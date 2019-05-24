/**
    * FileName => index2.js
	* Created By => Lakshmi (Created On Jun-06-2018)
	* Modified By => Lakshmi(Modified On Jun-11-2018)
    * COMMENT =>To display the stars for evaluation rating.
    */

$(document).ready(function(){
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars2 li').on('mouseover', function(){
    var onStar2 = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar2) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover'); 
    });
  });
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}