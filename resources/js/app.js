

/*!
* FitText.js 1.0 jQuery free version
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license
* http://sam.zoy.org/wtfpl/
* Modified by Slawomir Kolodziej http://slawekk.info
*
* Date: Tue Aug 09 2011 10:45:54 GMT+0200 (CEST)
*/
(function(){

  var addEvent = function (el, type, fn) {
    if (el.addEventListener)
      el.addEventListener(type, fn, false);
		else
			el.attachEvent('on'+type, fn);
  };

  var extend = function(obj,ext){
    for(var key in ext)
      if(ext.hasOwnProperty(key))
        obj[key] = ext[key];
    return obj;
  };

  window.fitText = function (el, kompressor, options) {

    var settings = extend({
      'minFontSize' : -1/0,
      'maxFontSize' : 1/0
    },options);

    var fit = function (el) {
      var compressor = kompressor || 1;

      var resizer = function () {
        el.style.fontSize = Math.max(Math.min(el.clientWidth / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)) + 'px';
      };

      // Call once to set.
      resizer();

      // Bind events
      // If you have any js library which support Events, replace this part
      // and remove addEvent function (or use original jQuery version)
      addEvent(window, 'resize', resizer);
      addEvent(window, 'orientationchange', resizer);
    };

    if (el.length)
      for(var i=0; i<el.length; i++)
        fit(el[i]);
    else
      fit(el);

    // return set of elements
    return el;
  };
})();

if (document.querySelector('#image')) {

  makeFitText(document.querySelector('#image')).then(function() {
    document.querySelector('#image').classList.add('fit-to-area')
  })
}

function makeFitText(element) {
  return new Promise(function(resolve, reject) {
    window.fitText(element, 5);
    document.querySelector('.monitor-placeholder').classList.add('fit-to-area');
    resolve();
  });
}

document.querySelectorAll('[data-action]').forEach(function(e) {
  var action = e.dataset.action;
  var value = e.dataset.value;
    e.addEventListener('click', function() {
      sendEvent(action, value);
    })
});

var inView = true;
var deetTimeouts

// Lazysizes Config ////
////////////////////////
var lazySizesConfig = lazySizesConfig || {};
lazySizesConfig.expFactor = 3.75;
lazySizesConfig.loadMode = 1;
lazySizesConfig.preloadAfterLoad = true;
lazySizesConfig.loadHidden = true;



var projectPreviews = document.querySelectorAll('[data-project]');

window.onload = function() {
  document.querySelectorAll('.project-display-area article.project').forEach(function(e) {
    e.classList.add('loaded');
  })
}


projectPreviews.forEach(function(e) {
  e.addEventListener('mouseenter', function() {
    processHover(e)
  });
  e.addEventListener('focus', function() {
    processHover(e)
  })
  e.addEventListener('click', function() {
    document.querySelector('.project-list').classList.add('has-active');
  });
})

function processHover(e) {
  if (!e.classList.contains('is-active')) {
    e.classList.add('is-active');
    var project_id = e.dataset.project;
    var project = document.querySelector('#' + project_id);
    if (!project.classList.contains('active')) {
      hideAllProjectPreviews().then(function() {
        showProject(project);
        e.classList.add('is-active');
      })
    }

  }
}

// $(document).ready(function() {
//   $('input#code').keyup(function() {
//     var $input = $(this);
//     if ($('input#code').val().length > 0) {
//       $input.addClass('has-text');
//     } else {
//       $input.removeClass('has-text');
//     }
//   });

//   $('body').on('mouseenter', '[data-project]', function() {
//     $('button.is-active').removeClass('is-active');
//     var $project = $('#' + $(this).data('project'));
//     $(this).addClass('is-active');
//     hideAllProjectPreviews().then(function() {

//       showProject($project);
//     });

//   });
// });


function hideAllProjectPreviews() {
  return new Promise(function(resolve, reject) {
    document.querySelectorAll('[data-project].is-active').forEach(function(e) {
      e.classList.remove('is-active');
    });
    document.querySelector('.project-list').classList.remove('has-active');
    var placeholder = document.querySelector('.monitor-placeholder');
    var monitor = document.querySelector('pre#image');
    monitor.classList.remove('fit-to-area');
    placeholder.classList.remove('fit-to-area');
    TweenLite.to(placeholder, 0.25, {opacity: 0});
    TweenLite.to(monitor, 0.25, {opacity: 0})

    document.querySelectorAll('article.project.active').forEach(function(e) {
      e.classList.add('is-leaving');
      e.classList.remove('active');
      var imageTarget = document.querySelector('#' + e.id + ' .preview-image-holder');
      var detailsTarget = document.querySelector('#' + e.id + ' .details');
      TweenLite.to(detailsTarget, 0.25, {opacity: 0, x: '-20px'});
      TweenLite.to(imageTarget, 0.25, {opacity: 0, onComplete: function() {
        e.classList.remove('visible')
        e.classList.remove('is-leaving');
        e.classList.remove('animating');
      }});
    });
    resolve();

  })

}

function showProject(project) {
  if (project.classList.contains('is-leaving')) {
    setTimeout(function() {
      showProject(project);
    }, 250)

    return false;
  }
  project.classList.add('active', 'visible');
  project.classList.add('animating');
  var imageTarget = document.querySelector('#' + project.id + ' .preview-image-holder');
  var detailsTarget = document.querySelector('#' + project.id + ' .details');
  TweenLite.set(imageTarget, {opacity: 0});
  TweenLite.set(detailsTarget, {opacity: 0, x: '-20px'})
  TweenLite.to(imageTarget, 0.25, {opacity: 1});
  TweenLite.to(detailsTarget, 0.25, {x: '0', opacity: 1, delay: 0.25});
  return true;
}

function sendEvent(action, value) {
  var xhttp = new XMLHttpRequest();
  var meta = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  xhttp.open('POST', '/event-track?action=' + action + '&value=' + value, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.setRequestHeader("X-CSRF-TOKEN", meta);
  xhttp.send();
}

