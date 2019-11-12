jQuery(document).ready( function($) {

  if( $('.ce_timelineSliderStart').length > 0 ) {

    var isMobile = false;
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      isMobile = true;
    }

    //if(isMobile === false) {
      $(document).scroll( function() {
        var top_of_element = $(".ce_timelineSliderStart").offset().top + 30;
        var bottom_of_element = $(".ce_timelineSliderStart").offset().top + $(".ce_timelineSliderStart").outerHeight();
        var bottom_of_screen = $(window).scrollTop() + $(window).height();
        var top_of_screen = $(window).scrollTop();

        if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
          $('.ce_timelineSliderStart > div').addClass('roadmap--initialized');
          setRoadmapHeight();
        } else {
          $('.ce_timelineSliderStart > div').removeClass('roadmap--initialized');
        }
      });
    //}

    setRoadmapHeight();

    function setRoadmapHeight() {
      setTimeout(function(){
        $("li.roadmap__events__event").each( function() {
          var contentHeight = $(this).find(".event__content").height();
          console.log( contentHeight );
          $(this).css("height",contentHeight+"px");
        });
      }, 200);
    }
  }

});
