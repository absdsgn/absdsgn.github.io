// Grid everything up
$(window).on('load', function() {
    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
    });
});

// Initiate carousel
var gridItem        = $('.grid-item');
var lightbox        = $('#Lightbox');
var lightboxImage   = $('#LightboxImage');
var lightboxOpen    = 'lightbox-open';
var buttonPrev      = $('#LightboxPrev');
var buttonNext      = $('#LightboxNext');
var buttonClose     = $('#LightboxClose');

// On click of grid item
gridItem.on('click', function() {

    // Get image source and ID of selected
    var imageSrc    = $(this).find('img').attr('src');
    var imageId     = $(this).find('img').attr('id');

    // Trigger that lightbox
    triggerLightbox(imageSrc, imageId);

});

// On click of previous button
buttonPrev.on('click', function() {

    // Set button as previous
    var button  = 'previous';

    // Initiate image change function from previous button
    imageChange(button);

});

// On click of next button
buttonNext.on('click', function() {

    // Set button as next 
    var button  = 'next';

    // Initiate image change function from next button
    imageChange(button);

});

// On click of close button
buttonClose.on('click', function() {

    // Trigger close 
    closeLightbox();

});

// Lightbox functionality
function triggerLightbox(imageSrc, imageId) {

    // Set select image source as lightbox image source
    lightboxImage.attr('src', imageSrc);

    // Set image id as attr of lightbox
    lightboxImage.attr('data-number', imageId);

    // If light box isn't already open 
    if ( !lightbox.hasClass(lightboxOpen) ) {

        // Open it up
        lightbox.addClass(lightboxOpen);

    }

    // Set selected image 
    var selected    = $('#' + imageId);

    // If selected image isn't first
    if ( !selected.hasClass('first') ) {

        // Show previous button
        buttonPrev.show();

    } else {

        // Hide previous button
        buttonPrev.hide();
    }

    // If selected image isn't last
    if ( !selected.hasClass('last') ) {

        // Show next button
        buttonNext.show();

    } else {

        // Hide next button
        buttonNext.hide();
    }
}

// Carousel next/prev button functionality
function imageChange(button) {

    // Get id of current lightbox image and parse for math
    var currentId   = lightboxImage.attr('data-number');
    var parsedId    = parseInt(currentId);
    
    // If button is previous button
    if ( button == 'previous' ) {

        // Set id for previous image
        var newId = ( parsedId - 1 );

        // Get image source and ID for previous image
        var imageSrc    = $('#' + newId).attr('src');
        var imageId     = $('#' + newId).attr('id');

    }

    // If button is next button
    if ( button == 'next' ) {

        // Set id for next image
        var newId = ( parsedId + 1 );

        // Get image source and ID for next image
        var imageSrc    = $('#' + newId).attr('src');
        var imageId     = $('#' + newId).attr('id');

    }

    // Trigger that lightbox
    triggerLightbox(imageSrc, imageId);

}

// Close lightbox 
function closeLightbox() {

    // What he said
    lightbox.removeClass(lightboxOpen);

}