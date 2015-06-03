// add twitter bootstrap classes and color based on how many times tag is used
function addTwitterBSClass(thisObj) {
    var title = jQuery(thisObj).attr('title');
    if (title) {
        var titles = title.split(' ');
        if (titles[0]) {
            var num = parseInt(titles[0]);
            if (num > 0)
                jQuery(thisObj).addClass('label label-default');
            if (num == 2)
                jQuery(thisObj).addClass('label label-info');
            if (num > 2 && num < 4)
                jQuery(thisObj).addClass('label label-success');
            if (num >= 5 && num < 10)
                jQuery(thisObj).addClass('label label-warning');
            if (num >=10)
                jQuery(thisObj).addClass('label label-important');
        }
    }
    else
        jQuery(thisObj).addClass('label');
    return true;
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

    $('.close-quote').css('display', 'block');
    $('.open-quote').css('display', 'block');
    $('.slider-wrapper ul li').css('display', 'block');


    /*Contact US JS*/

    var UsStates = ["AL" , "AK" , "AZ" , "AR" , "CA" , "CO" , "CT" , "DE" , "FL" , "GA" , "HI" , "ID" , "IL" , "IN" , "IA" , "KS" ,
        "KY" , "LA" , "ME" , "MD" , "MA" , "MI" , "MN" , "MS" , "MO" , "MT" , "NE" , "NV" , "NH" , "NJ" , "NM" , "NY" , "NC" , "ND" ,
        "OH" , "OK" , "OR" , "PA" , "RI" , "SC" , "SD" , "TN" , "TX" , "UT" , "VT" , "VA" , "WA" , "WV" , "WI" , "WY"];
    console.log(UsStates[0]);
    for(var i = 0; i <= UsStates.length; i++ )
    {
    $('.states-dropdown ul').append('<li role="presentation"><a role="menuitem" tabindex="-1" href="#">'+UsStates[i]+'</a></li>');

    }

    $("select[name='dropdown-1'] option:first:contains('')").html('WHEN YOU WILL NEED SERVICE?').attr('disabled', true).addClass('wpcf7-display-none');
    $("select[name='dropdown-2'] option:first:contains('')").html('HOW DID YOU HEAR ABOUT US?').attr('disabled', true).addClass('wpcf7-display-none');
    $("select[name='dropdown-3'] option:first:contains('')").html('BEST TIME TO CONTACT YOU').attr('disabled', true).addClass('wpcf7-display-none');

// modify tag cloud links to match up with twitter bootstrap
    $("#tag-cloud a").each(function() {
        addTwitterBSClass(this);
        return true;
    });

    $("p.tags a").each(function() {
        addTwitterBSClass(this);
        return true;
    });

    $("ol.commentlist a.comment-reply-link").each(function() {
        $(this).addClass('btn btn-success btn-mini');
        return true;
    });

    $('#cancel-comment-reply-link').each(function() {
        $(this).addClass('btn btn-danger btn-mini');
        return true;
    });

    // $('article.post').hover(function(){
    // 	$('a.edit-post').show();
    // },function(){
    // 	$('a.edit-post').hide();
    // });

    // Prevent submission of empty form
    $('[placeholder]').parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        })
    });

    $('.alert-message').alert();

    $('.dropdown-toggle').dropdown();
    // Adjust footer newsletter subscription table
    
    var newsletterSubscripe = $('.subscripe-to-newsletters');
    var emailField = $('.subscripe-to-newsletters tr:first-child');
    var submitBtn = $('.subscripe-to-newsletters tr:last-child td');
    emailField.append(submitBtn);
    $('.subscribeButton').show().val('submit');
    $('#frm-email').attr('placeholder', 'Join Our Newsletter').placeholder();

    $('carousel-our-customers').carousel({
        interval: 2000,
        wrap : true
    });
    $('carousel-our-customers-two').carousel({
        interval: 2000,
        wrap : true
    });

    // Menu hamburger icon to X
    /*$('.menu-icon').click(function() {
        $(this).toggleClass('toggle');
    });*/


    /*********************************************************************************************************/
    /*Function to initialize mixItUp Object */


    $(document).ready(function() {
        // $('.display-container').html($('#imageGallery ul').html());
        //var itemsInt = ($('#imageGallery li').length / 2);
        //var width = (($('#imageGallery li').length / 2) * 213) + 1040;
        //var layout = 'grid', // Store the current layout as a variable
            $container = $('#imageGallery'), // Cache the MixItUp container
            $changeLayout = $('#ChangeLayout'), // Cache the changeLayout button
            $myState;
        var galleryWorker = [];
        // Instantiate MixItUp with some custom options:
        $container.mixItUp({
            activeClass: 'activeMix',
            animation: {
            	enable : false,
                animateChangeLayout: false, // Animate the positions of targets as the layout changes
                animateResizeTargets: false, // Animate the width/height of targets as the layout changes
                effects: 'fade rotateX(-40deg) translateZ(-100px)'
            },
            layout: {
                containerClass: layout // Add the class 'list' to the container on load
            },
            callbacks: {
                onMixLoad: function(state){
                    //alert('MixItUp ready!');
                },
                onMixStart: function(state, futureState){
                },
                onMixEnd : function(state, futureState){
                }
            }
        });

        /*********************************************/
       /* Our Customers page */
      
        $('#ourCustomersBanner').lightSlider({
            gallery:true,
            item: 8,
            slideMargin:8,
            currentPagerPosition:'left',
            onSliderLoad: function() {
            },
            controls : true,
            prevHtml : '<span class="previous-profile">Prev</span>',
            nextHtml : '<span class="next-profile">Next</span>',
            adaptiveHeight:false,
            autoWidth : false,
            addClass : 'ourCustomersBanner',
            pager : false,
            slideMove : 8
        });
        
        $('#ourCustomersSliderQuotes').lightSlider({
            gallery:true,
            item: 8,
            slideMargin:8,
            currentPagerPosition:'left',
            onSliderLoad: function() {
            },
            controls : true,
            prevHtml : '<span class="previous-profile">Prev</span>',
            nextHtml : '<span class="next-profile">Next</span>',
            adaptiveHeight:false,
            autoWidth : false,
            addClass : 'ourCustomersSliderQuotes',
            pager : false,
            slideMove : 8
        });
        
        
        /*******************************************/
        
        $('#imageGallery').lightSlider({
            gallery:true,
            item: 8,
            slideMargin:8,
            currentPagerPosition:'left',
            onSliderLoad: function() {
                $('#imageGallery').width(width);
            },
            controls : true,
            prevHtml : '<span class="previous-profile">Prev</span>',
            nextHtml : '<span class="next-profile">Next</span>',
            adaptiveHeight:false,
            autoWidth : false,
            addClass : 'profiles',
            pager : false,
            slideMove : 8
        });


        
        $('#imageGallery').on('mixEnd', function(e, state){
            var loopEnd  = $('#imageGallery li').length, indexEl = 0, elementsCtn = 0, elmIndex = 0;
            var jsonArr  = [];
            var jsonData = [], jsonDataMap = [];
            $('#imageGallery li').each(function(){
                if($(this).css('display') == 'block'){
                    elmIndex = $(this).index();
                    jsonDataMap.push([{ elmIndex : elmIndex, mapIndex : elementsCtn }]);
                    jsonData.push({'src' : this.outerHTML, 'type' : 'inline' });
                    elementsCtn ++;
                }
            });
            //console.log(jsonDataMap);
            console.log(jsonData);
            $('#imageGallery li').click(function(){
                var tmp = $(this).index();
                for(var x = 0; x < jsonDataMap.length; x++){
                    if(tmp == jsonDataMap[x][0].elmIndex) {
                        indexEl = jsonDataMap[x][0].mapIndex;
                        break;
                    }else{indexEl = 0; }
                    console.log(jsonDataMap[x][0].elmIndex + '   ' + jsonDataMap[x][0].mapIndex);
                }
            });
            $('#imageGallery li').magnificPopup({
                items: jsonData,
                gallery: {
                    enabled: true
                },
                type : 'inline',
                enableEscapeKey : true,
                closeBtnInside: true,
                closeOnContentClick: false,
                callbacks: {
                    open: function() {
                        var self = this;
                        self.wrap.on('click.pinhandler', 'li', function() {
                            self.wrap.toggleClass('mfp-force-scrollbars');
                        });
                        $(this).magnificPopup('goTo', indexEl);
                    },
                    beforeClose: function() {
                        this.wrap.off('click.pinhandler');
                        this.wrap.removeClass('mfp-force-scrollbars');
                    }
                }
            });
            $('#imageGallery').width(((elementsCtn /2)*213)+1040);
        });
        // OPTIONAL - to change layout.
        // MixItUp does not provide a default "change layout" button, so we need to make our own and bind it with a click handler:
        $changeLayout.on('click', function(){
            // If the current layout is a list, change to grid:
            if(layout == 'list'){
                layout = 'grid';
                $changeLayout.text('List'); // Update the button text
                $container.mixItUp('changeLayout', {
                    containerClass: layout // change the container class to "grid"
                });
                // Else if the current layout is a grid, change to list:
            } else {
                layout = 'list';
                $changeLayout.text('Grid'); // Update the button text
                $container.mixItUp('changeLayout', {
                    containerClass: layout // Change the container class to 'list'
                });
            }
        });

    });

    /*********************************************************************************************************/

    /* Our Facilities

    /*********************************************************************************************************/

    var facilityData = [], facilitySlidesCtn = 0;

    $('.department').click(function(){
        console.log('fired' + $(this).children('.facility-slider').each('li'));

    });


/*.children('li').each(function(){
 console.log($(this));
 //elmIndex = $(this).index();
 //facilityData.push({'src' : this.outerHTML, 'type' : 'inline' });
 //elementsCtn ++;
 });*/


    /*********************************************************************************************************/
    /* Sliders */


    var current = 0,
        max = $(".sidebar-quotes-slider > .quote-slide").length;
    $(".sidebar-quotes-slider > .quote-slide:gt(0)").hide();
    //$('.counter').text('1 of ' + max);
    $('.sidebar-quotes-slider').show().animate({
        'min-height': $('.sidebar-quotes-slider > .quote-slide:first').height()
    }, 200);


    /* later */

    setInterval(function() {
        $('.sidebar-quotes-slider > .quote-slide:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('.sidebar-quotes-slider');
        current++;
        if (current >= max) current = 0;
        /* Some extra options */
        // $('.progress').width((current+1) * 315 / max);
        // $('.counter').text(current+1 + ' of ' + max);
        var adjustedHeight = $('.sidebar-quotes-slider > .quote-slide:first').height();
        $('.sidebar-quotes-slider').animate({'min-height': adjustedHeight }, 500);
        },  3000);




    /*$("#lightSlider").lightSlider({
        item: 1,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,

        addClass: '',
        mode: "fade",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 600, //ms'
        auto: true,
        loop: true,
        slideEndAnimatoin: true,
        pause: 5000,

        keyPress: false,
        controls: false,
        prevHtml: '',
        nextHtml: '',

        rtl:false,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,

        thumbItem:10,
        pager: true,
        gallery: true,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',

        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,

        responsive : [],

        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {

        },
        onBeforeSlide: function (el) {
            //var adjustedHeight = $('.lslide.active').height();
            //console.log(adjustedHeight);
            //jQuery('#sidebar_slider').css('padding-bottom', adjustedHeight);
            //adjustedHeight = null;
        },
        onAfterSlide: function (el) {

        },
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });*/

    /*********************************************************************************************************/
    /* Gallery Sliders */
    /*$("#lightSlider").lightGallery({
        mode:'slide',
        speed: 500
        //mode :	, //'slide' or 'fade'
        //useCSS :	, //boolean	true	LightGallery will try to use CSS transitions by default and fall back to jQuery animation if they are not supported. You can force exclusive usage of jQuery animation by setting this option to false.
        //cssEasing :	, // string	'ease'	Type of easing to be used for css animations
        //easing :	, //string	'linear'	Type of easing to be used for jquery animations
        //speed:	, //	number	600	Transition duration (in ms).
        //addClass:	, //	string	''	Add custom class for gallery, can be used to set different style for different gallery
        //preload	number:	, //	1	number of preload slides. will exicute only after the current slide is fully loaded. ex:// you clicked on 4th image and if preload = 1 then 3rd slide and 5th slide will be loaded in the background after the 4th slide is fully loaded.. if preload is 2 then 2nd 3rd 5th 6th slides will be preloaded
        //showAfterLoad	:	, //boolean	true	Show Content once it is fully loaded
        //selector:	, //	class name / id name	null	Custom selector property instead of just child.
        //index	number:	, //	false	Allows to set which image/video should load when using dynamicEl
        //dynamic	boolean	:	, //false	LightGallery can be instantiated and launched programmatically by setting this option to true and populating dynamicEl option (see below) with the definitions of images.
        //dynamicEl	:	, //array of objects	[]	An array of objects (src, mobileSrc, thumb, html, url, iframe) representing gallery elements. See example.
        //thumbnail	:	, //boolean	true	Whether to display a button to show thumbnails.
        //showThumbByDefault:	, //	boolean	false	Whether to display thumbnails by default.
        //exThumbImage:	, //	string or false	false	If you want to use external image for thumbnail, add the path of that image inside "data-" attribute and set value of this option to the name of your custom attribute.
        // <li data-exthumbimage="externalThumb.jpg" data-src="img/img1.jpg"></li>
        // exThumbImage: 'data-exthumbimage';
        //animateThumb:	, //	boolean	true	Enable thumbnail animation.
        //currentPagerPosition:	, //	'left' or 'middle' or 'right'	'middle'	Position of selected thumbnail.
        //thumbWidth	:	, //umber	100	Width of the thumbnaills
        //exThumbImage	:	, //number	100	Width of each thumbnails (in px)
        //thumbMargin:	, //number	5	Spacing between each thumbnails
        //controls	:	, //boolean	true	If false, prev/next buttons will not be displayed.
        //hideControlOnEnd:	, //	boolean	false	If true, prev/next button will be hidden on first/last image.
        //loop	:	, //boolean	false	If false, will disable the ability to loop back to the beginning of the gallery when on the last element.
        //auto	:	, //boolean	false	Enables slideshow mode.
        //pause:	, //	number	4000	The time (in ms) between each auto transition.
        //escKey	:	, //boolean	true	Whether the LightGallery could be closed by pressing the "Esc" key.
        //closable:	, //	boolean	true	allows clicks on dimmer to close gallery.
        //counter:	, //	boolean	false	Whether to show total number of images and index number of currently displayed image.
        //lang:	, //	object	{ allPhotos: 'All photos' }	Define text of labels.
        //mobileSrc:	, //	boolean	false	To make your website faster in mobile devices you can load separate images (low quality) for Mobile devices. Add the path of the image which you wish to load in mobile devices inside data-responsive-src attribute.
        //mobileSrcMaxWidth	:	, //number	640	You can define from which resolution the images for mobile devices should be loaded.
        //swipeThreshold	:	, //number	50	By setting the swipeThreshold (in px) you can set how far the user must swipe for the next/prev image.
        //enableTouch:	, //	boolean	true	Enables touch support
        //enableDrag	:	, //boolean	true	Enables desktop mouse drag support
        //vimeoColor	:	, //hex color code	'CCCCCC'	Set vimeo video player theme color.
        //videoAutoplay:	, //	boolean	true	Switch to false to disable video autoplay option.
        //videoMaxWidth:	, //	string	855px	Set limit for video maximal width.

    });*/



    /*********************************************************************************************************/
   
   $('.responsive-slider').lightSlider({
        item:1,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        slideMargin:0,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:0
                }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:0,
                }
            }
        ]
    });



    $('.customers-slider').lightSlider({
        item:1,
        slideMove:1,
        pager: true,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        controls: true,
        slideMargin:0,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:0
                }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:0,
                }
            }
        ],
        onSliderLoad: function(){
            $('.customers-slider p.quote').prepend('<span class="open-quote"></span>');
            $('.customers-slider p.quote').append('<span class="close-quote"></span>');
        }
    });



});