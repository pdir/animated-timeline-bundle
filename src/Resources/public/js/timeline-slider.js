jQuery(document).ready( function($) {

  if( $('.ce_timelineSliderStart.vertical').length > 0 ) {

    $(document).scroll( function() {
      var top_of_element = $(".ce_timelineSliderStart.vertical").offset().top + 30;
      var bottom_of_element = $(".ce_timelineSliderStart.vertical").offset().top + $(".ce_timelineSliderStart.vertical").outerHeight();
      var bottom_of_screen = $(window).scrollTop() + $(window).height();
      var top_of_screen = $(window).scrollTop();

      if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
        $('.ce_timelineSliderStart.vertical > div').addClass('roadmap--initialized');
        setRoadmapHeight();
      } else {
        $('.ce_timelineSliderStart.vertical > div').removeClass('roadmap--initialized');
      }
    });

    $(".ce_timelineSliderStart.vertical").on('click', '.roadmap__navigation a', function() {
      console.log("click");
      setRoadmapHeight();
    });

    setRoadmapHeight();

    function setRoadmapHeight() {
      setTimeout(function(){
        $(".ce_timelineSliderStart.vertical li.roadmap__events__event").each( function() {
          var contentHeight = $(this).find(".event__content").height();
          $(this).css("height",contentHeight+"px");
        });
      }, 200);
    }
  }

});
