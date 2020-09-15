/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
(function () {
  var addEvent = function addEvent(el, type, fn) {
    if (el.addEventListener) el.addEventListener(type, fn, false);else el.attachEvent('on' + type, fn);
  };

  var extend = function extend(obj, ext) {
    for (var key in ext) {
      if (ext.hasOwnProperty(key)) obj[key] = ext[key];
    }

    return obj;
  };

  window.fitText = function (el, kompressor, options) {
    var settings = extend({
      'minFontSize': -1 / 0,
      'maxFontSize': 1 / 0
    }, options);

    var fit = function fit(el) {
      var compressor = kompressor || 1;

      var resizer = function resizer() {
        el.style.fontSize = Math.max(Math.min(el.clientWidth / (compressor * 10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)) + 'px';
      }; // Call once to set.


      resizer(); // Bind events
      // If you have any js library which support Events, replace this part
      // and remove addEvent function (or use original jQuery version)

      addEvent(window, 'resize', resizer);
      addEvent(window, 'orientationchange', resizer);
    };

    if (el.length) for (var i = 0; i < el.length; i++) {
      fit(el[i]);
    } else fit(el); // return set of elements

    return el;
  };
})();

var sticky = new Sticky('.project-display-area');
console.log(sticky);

if (document.querySelector('#image')) {
  window.fitText(document.querySelector('#image'), 5);
}

var inView = true;
var deetTimeouts;

if (document.querySelector('.single')) {
  window.addEventListener('scroll', function () {
    var details = document.querySelector('.project-details');
    var secondaryDeets = document.querySelector('.secondary-project-details');

    if (inView && details.getBoundingClientRect().y < 0 - details.getBoundingClientRect().height) {
      inView = false;
      clearTimeout(deetTimeouts);
      secondaryDeets.classList.add('visible');
      deetTimeouts = setTimeout(function () {
        secondaryDeets.classList.add('fade-in');
      }, 10);
    } else if (!inView && details.getBoundingClientRect().y > 0 - details.getBoundingClientRect().height) {
      inView = true;
      clearTimeout(deetTimeouts);
      secondaryDeets.classList.remove('fade-in');
      deetTimeouts = setTimeout(function () {
        secondaryDeets.classList.remove('visible');
      }, 250);
    }
  });
}

var projectPreviews = document.querySelectorAll('[data-project]');
projectPreviews.forEach(function (e) {
  e.addEventListener('mouseenter', function () {
    processHover(e);
  });
  e.addEventListener('focus', function () {
    processHover(e);
  });
  e.addEventListener('click', function () {
    document.querySelector('.project-list').classList.add('has-active');
  });
});

function processHover(e) {
  if (!e.classList.contains('is-active')) {
    e.classList.add('is-active');
    var project_id = e.dataset.project;
    var project = document.querySelector('#' + project_id);

    if (!project.classList.contains('active')) {
      hideAllProjectPreviews().then(function () {
        showProject(project);
        e.classList.add('is-active');
      });
    }
  }
} // $(document).ready(function() {
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
  return new Promise(function (resolve, reject) {
    document.querySelectorAll('[data-project].is-active').forEach(function (e) {
      e.classList.remove('is-active');
    });
    document.querySelector('.project-list').classList.remove('has-active');
    var placeholder = document.querySelector('.monitor-placeholder');
    TweenLite.to(placeholder, 0.25, {
      opacity: 0
    });
    document.querySelectorAll('article.project.active').forEach(function (e) {
      e.classList.add('is-leaving');
      e.classList.remove('active');
      var imageTarget = document.querySelector('#' + e.id + ' .preview-image-holder');
      var detailsTarget = document.querySelector('#' + e.id + ' .details');
      TweenLite.to(detailsTarget, 0.25, {
        opacity: 0,
        x: '-20px'
      });
      TweenLite.to(imageTarget, 0.25, {
        opacity: 0,
        y: '-10px',
        onComplete: function onComplete() {
          e.classList.remove('visible');
          e.classList.remove('is-leaving');
        }
      });
    });
    resolve();
  });
}

function showProject(project) {
  if (project.classList.contains('is-leaving')) {
    setTimeout(function () {
      showProject(project);
    }, 250);
    return false;
  }

  project.classList.add('active', 'visible');
  var imageTarget = document.querySelector('#' + project.id + ' .preview-image-holder');
  var detailsTarget = document.querySelector('#' + project.id + ' .details');
  TweenLite.set(imageTarget, {
    opacity: 0,
    y: '-10px'
  });
  TweenLite.set(detailsTarget, {
    opacity: 0,
    x: '-20px'
  });
  TweenLite.to(imageTarget, 0.25, {
    opacity: 1,
    y: '0px'
  });
  TweenLite.to(detailsTarget, 0.25, {
    x: '0',
    opacity: 1,
    delay: 0.25
  });
  return true;
}

/***/ }),

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/admin.scss ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/davidolson/Code/davewritescode/resources/js/app.js */"./resources/js/app.js");
__webpack_require__(/*! /Users/davidolson/Code/davewritescode/resources/sass/app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! /Users/davidolson/Code/davewritescode/resources/sass/admin.scss */"./resources/sass/admin.scss");


/***/ })

/******/ });