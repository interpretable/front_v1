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

$(document).ready(function () {
  // Init materialize Js features
  $('.collapsible').collapsible();
  $('.modal').modal();
  $('select').formSelect(); // TABLE PREVIEW

  var zones = 0;
  var form = "#form"; // Gets value form changed input and calls readURL

  $(document).on('change', '#imgInp', function () {
    console.log('ON CHANGE INPUT');
    console.log($(this).data('id'));
    readURL(this, $(this).data('id'));
  }); // Add Zones

  $('.btn_add_zone').click(function () {
    switch (zones) {
      case 0:
        $('.zones').append('<div class="zone zone1"></div>');
        $('.zone1').addClass('w100 h100');
        formGen('.zone1', 'zone1');
        zones = 1;
        break;

      case 1:
        $('.zones').append('<div class="zone zone2"></div>');
        $('.zone1').addClass('h50');
        $('.zone2').addClass('h50');
        formGen('.zone2', 'zone2');
        zones = 2;
        break;

      case 2:
        $('.zones').append('<div class="zone zone3"></div>');
        $('.zone1').addClass('h25');
        $('.zone2').addClass('h25');
        $('.zone3').addClass('h50');
        formGen('.zone3', 'zone3');
        zones = 3;
        break;

      case 3:
        $('.zones').append('<div class="zone zone4"></div>');
        $('.zone3').addClass('w50 left');
        $('.zone4').addClass('w50 h50 left');
        formGen('.zone4', 'zone4');
        zones = 4;
        break;
    }
  }); // Delete Zones

  $('.btn_delete_zone').click(function () {
    switch (zones) {
      case 4:
        $('.zone4').remove();
        $('.zone3').removeClass('w50 left');
        zones = 3;
        break;

      case 3:
        $('.zone3').remove();
        $('.zone2').removeClass('h25');
        $('.zone1').removeClass('h25');
        zones = 2;
        break;

      case 2:
        $('.zone2').remove();
        $('.zone1').removeClass('h50');
        zones = 1;
        break;

      case 1:
        $('.zone1').remove();
        zones = 0;
        break;
    }
  }); // Appends the default form

  function formGen(zoneClass, zoneName) {
    $(zoneClass).append("<img id='" + zoneName + "' src='#' alt='Image' />");
    $(form).append("<input name='" + zoneName + "' type='file' id='imgInp' data-id='" + zoneName + "' />");
    console.log('click');
  } // Gets the file in the input and appends a base 64 image in html


  function readURL(input, zoneName) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        console.log('test');
        $('#' + zoneName).attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
});

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
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/interpretable/front/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /var/www/interpretable/front/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });