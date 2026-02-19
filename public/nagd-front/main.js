//----------------------------------------------------------------
// Toggle Navbar
$(".header .nav-big-nav-icon").on("click", function () {
  $(".big-nav").toggleClass("big-nav-hiddin");
  $(".close-overlay").addClass("open-over");
});
// $(".header .nav-logo .nav-search-icon").on("click", function () {
//   $(".big-nav").toggleClass("big-nav-hiddin");
//   $(".big-nav .big-nav-search .form-control").focus();
//   $(".close-overlay").addClass("open-over");
// });
$(".li-link .li-link-icon").on("click", function () {
  $(this)
    .parent()
    .parent()
    .find(".nav-link-popup")
    .removeClass("big-nav-hiddin");
});
//----------------------------------------------------------------

$(".big-nav .close-big-nav").on("click", function () {
  $(".big-nav").addClass("big-nav-hiddin");
  $(".close-overlay").removeClass("open-over");
});

$(".close-link-popup").on("click", function () {
  $(".nav-link-popup").addClass("big-nav-hiddin");
});

// All Popups
$(".close-overlay").on("click", function () {
  $(this).removeClass("open-over");
  $(".big-nav").addClass("big-nav-hiddin");
  $(".nav-link-popup").addClass("big-nav-hiddin");
  $(".order-service").removeClass("open-popup");
  $(".contact-container").removeClass("open-popup");
});

//----------------------------------------------------------------
// ERP Slider
$(document).ready(function() {
  const sliderWrapper = $('.erp-slider-wrapper');
  if (sliderWrapper.length === 0) return;

  const track = $('.erp-slider-track');
  const items = $('.erp-slider-item');
  const prevBtn = $('.erp-slider-prev');
  const nextBtn = $('.erp-slider-next');
  const container = $('.erp-slider-container');
  
  let currentIndex = 0;
  let itemsPerView = 3; // Default: 3 cards visible
  
  // Calculate items per view based on screen size
  function updateItemsPerView() {
    const width = $(window).width();
    if (width <= 575) {
      itemsPerView = 1;
    } else if (width <= 991) {
      itemsPerView = 2;
    } else {
      itemsPerView = 3;
    }
    currentIndex = 0; // Reset to first slide on resize
    updateSlider();
  }
  
  // Update slider position
  function updateSlider() {
    if (items.length === 0) return;
    
    // Get the actual width of the first item (includes gap in flexbox)
    const itemWidth = items.first().outerWidth(true);
    const translateX = -currentIndex * itemWidth;
    track.css('transform', `translateX(${translateX}px)`);
    
    // Update button states
    prevBtn.prop('disabled', currentIndex === 0);
    const maxIndex = Math.max(0, items.length - itemsPerView);
    nextBtn.prop('disabled', currentIndex >= maxIndex);
  }
  
  // Next button
  nextBtn.on('click', function() {
    const maxIndex = Math.max(0, items.length - itemsPerView);
    if (currentIndex < maxIndex) {
      currentIndex++;
      updateSlider();
    }
  });
  
  // Previous button
  prevBtn.on('click', function() {
    if (currentIndex > 0) {
      currentIndex--;
      updateSlider();
    }
  });
  
  // Initialize on load and resize
  updateItemsPerView();
  $(window).on('resize', function() {
    updateItemsPerView();
  });
});