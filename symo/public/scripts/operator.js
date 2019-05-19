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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/assets/scripts/operator.js":
/*!*******************************************!*\
  !*** ./public/assets/scripts/operator.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function sendmsg(userid) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var msg = $("#msg-" + userid).val();
  $.ajax({
    /* the route pointing to the post function */
    url: "/",
    type: 'POST',

    /* send the csrf-token and the input to the controller */
    data: {
      _token: CSRF_TOKEN,
      'userid': userid,
      'op': 'addtext',
      'msg': msg
    },
    dataType: 'JSON',
    success: function success(data) {
      if (data['status'] == 200) {
        $("#btn-input").val("");
        chat_user(userid);
      } else alert(data);
    }
  });
}

function chat_user(id) {
  userid = id;
  $("#chat-log-" + id).html("");
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    /* the route pointing to the post function */
    url: "",
    type: 'POST',

    /* send the csrf-token and the input to the controller */
    data: {
      _token: CSRF_TOKEN,
      'userid': id,
      'op': 'chatlog'
    },
    dataType: 'JSON',
    success: function success(data) {
      if (data['status'] == 200) {
        for (i = 0; data[i] != null; i++) {
          if (data[i].type == "operator") {
            $("#chat-log-" + id).append("  \
                         <li class=\"left clearfix\">\
                        <span class=\"chat-img pull-left\">\
                        <img src=\"http://placehold.it/50/55C1E7/fff\" alt=\"User Avatar\" class=\"img-circle\" />\
                        </span>\
                        <div class=\"chat-body clearfix\">\
                        <div class=\"header\">\
                        <strong class=\"primary-font\">" + data[i].src_name + "  </strong>\
                        <small class=\" text-muted\">\
                        <i class=\"fa fa-clock-o fa-fw\"></i>" + data[i].date + "\
                        </small>\
                        </div>\
                        <p>\
                        " + data[i].msg + "\
                        </p>\
                        </div>\
                        </li>\
                           ");
          } else {
            $("#chat-log-" + id).append("  \
                         <li class=\"right clearfix\">\
                        <span class=\"chat-img pull-right\">\
                        <img src=\"http://placehold.it/50/FA6F57/fff\" alt=\"User Avatar\" class=\"img-circle\" />\
                        </span>\
                        <div class=\"chat-body clearfix\">\
                        <div class=\"header\">\
                        <strong class=\"pull-right primary-font\">" + data[i].src_name + "  </strong>\
                        <small class=\"text-muted\">\
                        <i class=\"fa fa-clock-o fa-fw\"></i>" + data[i].date + "\
                        </small>\
                        </div>\
                        <p>\
                        " + data[i].msg + "\
                        </p>\
                        </div>\
                        </li>\
                           ");
          }
        }
      } else alert(data);
    }
  });
}

/***/ }),

/***/ 5:
/*!*************************************************!*\
  !*** multi ./public/assets/scripts/operator.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\symo\public\assets\scripts\operator.js */"./public/assets/scripts/operator.js");


/***/ })

/******/ });