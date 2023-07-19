var app = (function(app, $) {
  'use strict';
  
  var EVENT_START_COORDS,
      START_POSITION,
      HANDLE_POSITION = {
        'from': 0,
        'to': 100
      },
      
      MIN = 1,
      MAX = 140000,
      INCREMENT = 1,
      VALUES = [],
      STEPS = [],
      STEP_LENGTH,
      
      $rangeSlider = $('.rangeSlider'),
      $rangeSliderHandles = $rangeSlider.find('.rangeSlider__handle'),
      $rangeSliderTooltips = $rangeSlider.find('.rangeSlider__tooltip'),
      $rangeSliderRange = $rangeSlider.find('.rangeSlider__range');
  
  function init() {
    var i, len;
    
    VALUES.push(MIN);
    for(i = MIN + INCREMENT; i < MAX; i += INCREMENT) {
      VALUES.push(i);
    }
    VALUES.push(MAX);
    
    STEP_LENGTH = 100 / (VALUES.length - 1);
    
    STEPS.push(0);    
    for(i = 0, len = VALUES.length; i < len; i++) {
      STEPS.push((STEP_LENGTH / 2) + i * STEP_LENGTH);
    }
    STEPS.push(100);
  }
  
  function getValue(position) {
    var i, len,
        index = -1;

    for(i = 0, len = (STEPS.length - 1); i < len; i++) {
      if(position >= STEPS[i] && position < STEPS[i+1]) {
        index = i;
        break;
      }
    }
    
    return VALUES[index];
  }
  
  function getEventCoords(e) {
    var isTouch = e.type.indexOf('touch') >= 0;
    return {
      x: isTouch ? e.originalEvent.touches[0].clientX : e.clientX,
      y: isTouch ? e.originalEvent.touches[0].clientY : e.clientY,
    };
  }
    
  function pxToPerc(px) {
    return (100 * px) / $rangeSlider.width();
  }
  
  function render() {
    ['from', 'to'].forEach(function(handleType) {
      $rangeSliderHandles.filter('.rangeSlider__handle--' + handleType)
        .attr('style', 'left: calc(' + HANDLE_POSITION[handleType] + '% - ' + ($rangeSliderHandles.width() / 2) + 'px);')
        .attr('data-value', getValue(HANDLE_POSITION[handleType]));
      
      $rangeSliderTooltips.filter('.rangeSlider__tooltip--' + handleType)
          .attr('style', 'left: calc(' + HANDLE_POSITION[handleType] + '% - ' + ($rangeSliderTooltips.width() / 2) + 'px);');
    });
    
    $rangeSliderRange.css('left', HANDLE_POSITION['from'] + '%');
    $rangeSliderRange.css('width', (HANDLE_POSITION['to'] - HANDLE_POSITION['from']) + '%');
  }
  
  function dragging(e) {
    var $handle = e.data.$handle,
        handleType = $handle.attr('data-handle-type'),
        eventCoords = getEventCoords(e),
        xDiff = eventCoords.x - EVENT_START_COORDS.x,
        position = START_POSITION + pxToPerc(xDiff);
    
    position = Math.max(position, 0);
    position = Math.min(position, 100);
    position = Math[handleType === 'from' ? 'min' : 'max'](position, HANDLE_POSITION[handleType === 'from' ? 'to' : 'from']);
    
    HANDLE_POSITION[handleType] = position;
    
    render();
  }
  
  function stopDragging(e) {
    var $handle = e.data.$handle,
        handleType = $handle.data('handle-type'),
        value = getValue(HANDLE_POSITION[handleType]),
        snapPosition = VALUES.indexOf(value) * STEP_LENGTH;
    
    if(snapPosition !== HANDLE_POSITION[handleType]) {
      $rangeSlider.addClass('rangeSlider--animate');
    }
    
    HANDLE_POSITION[handleType] = VALUES.indexOf(value) * STEP_LENGTH;
    render();
    
    $(document).off('mousemove touchmove', dragging);
    $(document).off('mouseup touchend', stopDragging);
  }
  
  init();
  render();
  $rangeSliderHandles.on('mousedown touchstart', function(e) {
    var $this = $(this);

    START_POSITION = HANDLE_POSITION[$this.attr('data-handle-type')];
    EVENT_START_COORDS = getEventCoords(e);
    
    $rangeSlider.removeClass('rangeSlider--animate');
    
    $rangeSliderHandles.removeClass('rangeSlider__handle--active');
    $this.addClass('rangeSlider__handle--active');

    $(document).on('mousemove touchmove', {
      $handle: $this
    }, dragging);
    $(document).on('mouseup touchend', {
      $handle: $this
    }, stopDragging);
  });
  
  return app;
})(app || {}, jQuery);