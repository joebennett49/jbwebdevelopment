//use function to use $ instead of jQuery
(function($) {

  $( document ).ready(function() {

    //intersectobserver

    const images = document.querySelectorAll("[data-src]");

    function preloadImage(img){
      const src = img.getAttribute("data-src");
      if(!src){
        return;
      }
      img.src = src;
    }

    const imgOptions = {
      threshold : 0,
      rootMargin : "0px 0px 200px 0px"
    };

    const imgObserver = new IntersectionObserver((entries,imgObserver) => {
      entries.forEach(entry =>{
        if(!entry.isIntersecting){
          return;
        }else{
          preloadImage(entry.target);
          imgObserver.unobserve(entry.target);
        }
      })
    },imgOptions);

    images.forEach(image => {
      imgObserver.observe(image);
    });



    //animation intersectobserver

    const imagesAnim = document.querySelectorAll(".toAnimate");

    const imgOptionsAnim = {
      threshold : 0.9,
      rootMargin : "0px 0px 0px 0px"
    };

    const imgObserverAnim = new IntersectionObserver((entries,imgObserver) => {
      entries.forEach(entry =>{
        if(!entry.isIntersecting){
          var target =  entry.target;
          target.classList.remove('visible'+animationName);
          return;
        }else{
          imgObserver.unobserve(entry.target);
          var target =  entry.target;
          var animationName = target.getAttribute("data-anim");
          target.classList.add('visible','animate__'+animationName);
          target.addEventListener('animationend', () => {
            target.classList.remove('animate__'+animationName);
          });
        }
      })
    },imgOptionsAnim);

    imagesAnim.forEach(imageAnim => {
      imgObserverAnim.observe(imageAnim);
    });


    //Header Typewriter effect

    if($('#anim-typewriting').length){
      var i = 0;
      var txt = document.querySelector("#anim-typewriting").textContent;
      var speed = 70;


      function typeWriter() {
        if (i < txt.length) {
          document.getElementById("anim-typewriting").innerHTML += txt.charAt(i);
          i++;
          setTimeout(typeWriter, speed);
        }
      }

      var newHeight = $("#anim-typewriting").height();
      $('#anim-typewriting').height(newHeight);
      $('#anim-typewriting').empty().removeClass('hidden');
      typeWriter();
    }else{
      return;
    }

    //Offcanvas menu

    $(".checkLabel").click(function(){
      if($('#checkbox').is(":checked")){
        $(".offCanvasMenu").removeClass("open");
        $(".websiteContent").removeClass("pushed");
      }else{
        $(".offCanvasMenu").addClass("open");
        $(".websiteContent").addClass("pushed");
      };
    });

    //NavBar Animation

    $(".checkLabel").click(function(){
      if($('#checkbox').prop('checked')){
        //close click
        $("#burgerMenu").removeClass('opened');
        $('.sideNav').addClass('nav-down').removeClass('nav-up');
        $('#burgerMenu').addClass('nav-down').removeClass('nav-up');
      }else{
        //open click
        $("#burgerMenu").addClass('opened');
        $('.sideNav').removeClass('nav-down').addClass('nav-up');
      }
    });


    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.sideNav').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st == 0){
          $('.sideNav').removeClass('fixed');
          $('#burgerMenu').removeClass('fixed');
        }

        if (st > lastScrollTop && st > navbarHeight){
          // Scroll Down
          $('.sideNav').removeClass('nav-down').addClass('nav-up');
          $('#burgerMenu').removeClass('nav-down').addClass('nav-up');
          if($('.sideNav').hasClass('fixed')){
            $('.sideNav').addClass('fixed');
            $('#burgerMenu').addClass('fixed');
          }else{
            $('.sideNav').addClass('fixed').css('opacity' , '0');
            $('#burgerMenu').addClass('fixed').css('opacity' , '0');
          }
        } else {
          // Scroll Up
          if(!$("#burgerMenu").hasClass('opened')){
            if(st + $(window).height() < $(document).height()) {
              $('.sideNav').removeClass('nav-up').addClass('nav-down');
              $('.sideNav').css('opacity' , '1');
              $('#burgerMenu').removeClass('nav-up').addClass('nav-down');
              $('#burgerMenu').css('opacity' , '1');
            }
          }
        }

        lastScrollTop = st;
    }

    //Footer CF7 textarea expansion

    if($('#autoExpand').length){
      var textarea = document.getElementById("autoExpand");
      var limit = 200;

      textarea.oninput = function() {
        var height = (textarea.scrollHeight - 10);
        textarea.style.height = "";
        textarea.style.height = Math.min(height, 300) + "px";
        if (!$.trim($("#autoExpand").val())) {
          textarea.style.height = "";
        }
      };
    }
  });


})( jQuery );
