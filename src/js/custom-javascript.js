// Add your custom JS here.
(function(){
  // hide header on scroll

  var doc = document.documentElement;
  var w = window;

  var prevScroll = w.scrollY || doc.scrollTop;
  var curScroll;
  var direction = 0;
  var prevDirection = 0;

  var header = document.getElementById('wrapper-navbar');

  var checkScroll = function() {

    /*
    ** Find the direction of scroll
    ** 0 - initial, 1 - up, 2 - down
    */

    curScroll = w.scrollY || doc.scrollTop;
    if (curScroll > prevScroll) { 
      //scrolled up
      direction = 2;
    }
    else if (curScroll < prevScroll) { 
      //scrolled down
      direction = 1;
    }

    if (direction !== prevDirection) {
      toggleHeader(direction, curScroll);
    }

    prevScroll = curScroll;
  };

  var toggleHeader = function(direction, curScroll) {
    if (direction === 2 && curScroll > 52) { 

      //replace 52 with the height of your header in px
      if (!document.getElementById('navbarCollapse').classList.contains("show")) {
          header.classList.add('hide');
          prevDirection = direction;
      }
    }
    else if (direction === 1) {
      header.classList.remove('hide');
      prevDirection = direction;
    }
  };

  // window.addEventListener('scroll', checkScroll);

    $('#searchTrigger').on('click',function(e) {
        e.stopPropagation();
        console.log('clunk');
        $('#searchBox').toggleClass('d-none');
    });
 
    $('#searchTriggerM').on('click',function(e) {
        e.stopPropagation();
        console.log('click');
        $('#searchBox').toggleClass('d-none');
    });

    $('#closeTrigger').on('click',function(e) {
        e.stopPropagation();
        $('#searchBox').addClass('d-none');
    });

    lightbox.option({
      'resizeDuration': 200,
      'imageFadeDuration': 300,
      'wrapAround': true,
      'disableScrolling': true
    });

    document.addEventListener('DOMContentLoaded', function () {
      const mcstatus = document.querySelector('.modal-body .mc4wp-alert');
      if (mcstatus) {
          console.log('mcstatus ' + mcstatus);
          const hasContent = mcstatus.textContent.trim().length;
          if (hasContent > 0) {
              console.log('doing modal');
              // Ensure Bootstrap Modal is available
              if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                  const modalElement = document.getElementById('mcModal');
                  const bootstrapModal = new bootstrap.Modal(modalElement);
                  bootstrapModal.show();
              } else {
                  console.error('Bootstrap Modal is not available.');
              }
          }
      }
  });

})();
