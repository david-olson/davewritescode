/*! For license information please see app.js.LICENSE.txt */
!function(e){var t={};function n(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(o,i,function(t){return e[t]}.bind(null,i));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=0)}([function(e,t,n){n(1),n(4),e.exports=n(9)},function(e,t){var n,o;n=function(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent("on"+t,n)},window.fitText=function(e,t,o){var i=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e}({minFontSize:-1/0,maxFontSize:1/0},o),r=function(e){var o=t||1,r=function(){e.style.fontSize=Math.max(Math.min(e.clientWidth/(10*o),parseFloat(i.maxFontSize)),parseFloat(i.minFontSize))+"px"};r(),n(window,"resize",r),n(window,"orientationchange",r)};if(e.length)for(var a=0;a<e.length;a++)r(e[a]);else r(e);return e},document.querySelector("#image")&&(o=document.querySelector("#image"),new Promise((function(e,t){window.fitText(o,5),document.querySelector(".monitor-placeholder").classList.add("fit-to-area"),e()}))).then((function(){document.querySelector("#image").classList.add("fit-to-area")}));var i=i||{};i.expFactor=3.75,i.loadMode=1,i.preloadAfterLoad=!0,i.loadHidden=!0;var r=document.querySelectorAll("[data-project]");function a(e){if(!e.classList.contains("is-active")){e.classList.add("is-active");var t=e.dataset.project,n=document.querySelector("#"+t);n.classList.contains("active")||new Promise((function(e,t){document.querySelectorAll("[data-project].is-active").forEach((function(e){e.classList.remove("is-active")})),document.querySelector(".project-list").classList.remove("has-active");var n=document.querySelector(".monitor-placeholder"),o=document.querySelector("pre#image");o.classList.remove("fit-to-area"),n.classList.remove("fit-to-area"),TweenLite.to(n,.25,{opacity:0}),TweenLite.to(o,.25,{opacity:0}),document.querySelectorAll("article.project.active").forEach((function(e){e.classList.add("is-leaving"),e.classList.remove("active");var t=document.querySelector("#"+e.id+" .preview-image-holder"),n=document.querySelector("#"+e.id+" .details");TweenLite.to(n,.25,{opacity:0,x:"-20px"}),TweenLite.to(t,.25,{opacity:0,onComplete:function(){e.classList.remove("visible"),e.classList.remove("is-leaving"),e.classList.remove("animating")}})})),e()})).then((function(){!function e(t){if(t.classList.contains("is-leaving"))return setTimeout((function(){e(t)}),250),!1;t.classList.add("active","visible"),t.classList.add("animating");var n=document.querySelector("#"+t.id+" .preview-image-holder"),o=document.querySelector("#"+t.id+" .details");return TweenLite.set(n,{opacity:0}),TweenLite.set(o,{opacity:0,x:"-20px"}),TweenLite.to(n,.25,{opacity:1}),TweenLite.to(o,.25,{x:"0",opacity:1,delay:.25}),!0}(n),e.classList.add("is-active")}))}}window.onload=function(){document.querySelectorAll(".project-display-area article.project").forEach((function(e){e.classList.add("loaded")}))},r.forEach((function(e){e.addEventListener("mouseenter",(function(){a(e)})),e.addEventListener("focus",(function(){a(e)})),e.addEventListener("click",(function(){document.querySelector(".project-list").classList.add("has-active")}))}))},,,function(e,t){},,,,,function(e,t){}]);