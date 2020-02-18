jQuery(document).ready( function($) {

  if( $('.ce_timelineSliderStart.vertical').length > 0 ) {

    $(document).scroll( function() {
      var top_of_element = $(".ce_timelineSliderStart.vertical").offset().top + 30;
      var bottom_of_element = $(".ce_timelineSliderStart.vertical").offset().top + $(".ce_timelineSliderStart.vertical").outerHeight();
      var bottom_of_screen = $(window).scrollTop() + $(window).height();
      var top_of_screen = $(window).scrollTop();

      if((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
        $('.ce_timelineSliderStart.vertical > div').addClass('roadmap--initialized');
        setRoadmapVerticalHeight();
      } else {
        $('.ce_timelineSliderStart.vertical > div').removeClass('roadmap--initialized');
      }
    });

    $(".ce_timelineSliderStart.vertical").on('click', '.roadmap__navigation a', function() {
      setRoadmapVerticalHeight();
    });

    setRoadmapVerticalHeight();
  }

  function setRoadmapVerticalHeight() {
    setTimeout(function(){
      $(".ce_timelineSliderStart.vertical li.roadmap__events__event").each( function() {
        var contentHeight = $(this).find(".event__content").height();
        $(this).css("height",contentHeight+"px");
      });
    }, 100);
  }

  if( $('.ce_timelineSliderStart:not(.vertical)').length > 0 ) {
    if( $(document).width() > 992 ) {
      setRoadmapHorizontalHeightDesktop();

      $(".ce_timelineSliderStart:not(.vertical)").on('click', '.roadmap__navigation a', function() {
        setRoadmapHorizontalHeightDesktop();
      });
    } else if( $('.ce_timelineSliderStart').hasClass('auto') ) {
      setRoadmapAutoHeightMobile();

      $(".ce_timelineSliderStart.auto").on('click', '.roadmap__navigation a', function() {
        setRoadmapAutoHeightMobile();
      });
    }
  }

  function setRoadmapHorizontalHeightDesktop() {
    setTimeout(function(){
      var heightOdd = 0;
      var heightEven = 0;

      $(".ce_timelineSliderStart:not(.vertical) li.roadmap__events__event:nth-child(odd)").each( function() {
        var event = $(this).find(".event");
        var eventHeight = event.height() + parseFloat(event.css('top').replace('px'));

        if(eventHeight > heightOdd) {
          heightOdd = eventHeight;
        }
      });
      $(".ce_timelineSliderStart:not(.vertical) li.roadmap__events__event:nth-child(odd)").height(heightOdd);
      $(".ce_timelineSliderStart:not(.vertical) .roadmap__events").css("padding-bottom",heightOdd + "px");

      $(".ce_timelineSliderStart:not(.vertical) li.roadmap__events__event:nth-child(even)").each( function() {
        var event = $(this).find(".event");
        var eventHeight = event.height() + parseFloat(event.css('bottom').replace('px'));

        if(eventHeight > heightEven) {
          heightEven = eventHeight;
        }
      });
      $(".ce_timelineSliderStart:not(.vertical) li.roadmap__events__event:nth-child(even)").height(heightEven);
      $(".ce_timelineSliderStart:not(.vertical) .roadmap__events").css("padding-top",heightEven + "px");

      var sliderHeight = $(".ce_timelineSliderStart:not(.vertical)").height();
      $(".ce_timelineSliderStart:not(.vertical)").height(heightOdd + heightEven);
    }, 500);
  }

  function setRoadmapAutoHeightMobile() {
    console.log("setRoadmapAutoHeightMobile");
    setTimeout(function(){
      $(".ce_timelineSliderStart.auto li.roadmap__events__event").each( function() {
        var eventHeight = $(this).find(".event__date").height() + $(this).find(".event__content").height();
        $(this).height(eventHeight);
      });
    }, 500);
  }


});
