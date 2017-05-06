jQuery(document).ready(function($) {
    $("img.lazy").lazyload();
    $('#mygallery').lightGallery({
      mode: 'lg-fade',
      thumbnail: true,
      share:true
    });
    $("#mygallery").justifiedGallery({
     rowHeight: 250,
     margins : 1,
     waitThumbnailsLoad :false
   });
  });