
  // add/remove checked class
  $(".image-checkbox").each(function(){
    if($(this).find('input[type="checkbox"]').first().attr("checked")){
      $(this).addClass('image-checkbox-checked');
    }else{
      $(this).removeClass('image-checkbox-checked');
    }
  });

// sync the input state
$(".image-checkbox").on("click", function(e){
  $(this).toggleClass('image-checkbox-checked');
  var $checkbox = $(this).find('input[type="checkbox"]');
  $checkbox.prop("checked",!$checkbox.prop("checked"));
  
  e.preventDefault();
});
