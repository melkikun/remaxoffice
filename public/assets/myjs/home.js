 $(document).ready(function(){
  $('.slider-bank').slick({
    slidesToShow: 7,
    slidesToScroll: 4,
    autoplay: true,
    infinite:true,
    mobileFirst:true
  });
  $(".tabs-wrap ul li a").on("click", function () {
    var href = $(this).attr("href");
    $(".tabs-wrap ul li a").removeClass("active");
    $(this).addClass("active");

    $(".search-wrap form").addClass("hideit");
    $(href).removeClass("hideit");
  });
  $('#rent').click(function(event) {
    /* Act on the event */
    $('#sale').val(0);
  });
  $('#buy').click(function(event) {
    /* Act on the event */
    $('#sale').val(1);
  });
});