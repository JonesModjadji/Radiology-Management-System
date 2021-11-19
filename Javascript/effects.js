$(function() {

  $('content').hide().slideDown();
  var $li = $('FadeIn');
  
  $li.hide().each(function(index) {
    $(this).delay(900000 * index).fadeIn(5000);
  });
	
  $li.on('click', function() {
    $(this).fadeOut(5000);
  });
  
  });
$("#tabs").tabs({
    active: 2,
    activate: function (event, ui) {
      var active = $('#tabs').tabs('option', 'active');
      $("#tabid").html('the tab id is ' + $("#tabs ul>li a").eq(active).attr("href"));

    }
});
var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);