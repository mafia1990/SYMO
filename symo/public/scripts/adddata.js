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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/assets/scripts/adddata.js":
/*!******************************************!*\
  !*** ./public/assets/scripts/adddata.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('.add').click(function (e) {
  var type = $(this).attr('data-title');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var name = $("input[name=" + type + "]").val();
  var formData = new FormData();

  if (type == "category") {
    var image = $("input[name=" + type + "-image]")[0].files[0];

    if (image == null) {
      alert("لطفا عکسی برای این دسته بندی قرار دهید");
      return;
    }

    formData.append("category-image", image);
    $("input[name=" + type + "-image]")[0].value = "";
  } else if (type == "category_properties") formData.append("catid", $("[name=pcategory]").val());else if (type == "category_properties_data") formData.append("pcatid", $("[name=category_properties_data]").val());
  /* send the csrf-token and the input to the controller */


  formData.append("_token", CSRF_TOKEN);
  formData.append("cat", type);
  formData.append("op", 'add');
  formData.append("name", name);
  $.ajax({
    /* the route pointing to the post function */
    url: "",
    type: 'POST',
    enctype: 'multipart/form-data',
    processData: false,
    // Important!
    contentType: false,
    cache: false,
    // data: {_token: CSRF_TOKEN, 'name':name,'cat':type,'op':'add','image':(image)?image:""},
    data: formData,
    dataType: 'JSON',
    success: function success(data) {
      if (data['status'] == 200) {
        $("input[name=" + type + "]").val('');
        $("#" + type).append('<option value=' + data['id'] + '>' + name + '</option>');
      } else alert(data);
    }
  });
});
$('.del').click(function (e) {
  var type = $(this).attr('data-title');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var catlist = document.getElementById(type);

  for (var i = catlist.selectedOptions.length - 1; i > -1; i--) {
    $.ajaxSetup({
      async: false
    });
    $.ajax({
      /* the route pointing to the post function */
      url: "",
      type: 'POST',

      /* send the csrf-token and the input to the controller */
      data: {
        _token: CSRF_TOKEN,
        'id': catlist.selectedOptions[i].value,
        'cat': type,
        'op': 'del'
      },
      dataType: 'JSON',
      success: function success(data) {
        if (data['status'] == 200) {
          catlist.remove(catlist.selectedOptions[i].index);
        } else alert(data);
      }
    });
  }
});

function changecat(e) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var formData = new FormData();
  /* send the csrf-token and the input to the controller */

  $("#category_properties").html("");
  formData.append("_token", CSRF_TOKEN);
  formData.append("catid", e.value);
  formData.append("op", 'changecat');
  $.ajax({
    /* the route pointing to the post function */
    url: "",
    type: 'POST',
    enctype: 'multipart/form-data',
    processData: false,
    // Important!
    contentType: false,
    cache: false,
    // data: {_token: CSRF_TOKEN, 'name':name,'cat':type,'op':'add','image':(image)?image:""},
    data: formData,
    dataType: 'JSON',
    success: function success(data) {
      data.forEach(function (d) {
        data.forEach(function (d) {
          $("#category_properties").append("  <option value=" + d['id'] + ">" + d['title'] + "</option> ");
        });
      });
    }
  });
}

function select_cat(e) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var formData = new FormData();
  /* send the csrf-token and the input to the controller */

  $("#select_category").html("");
  formData.append("_token", CSRF_TOKEN);
  formData.append("catid", e.value);
  formData.append("op", 'changecat');
  $.ajax({
    /* the route pointing to the post function */
    url: "",
    type: 'POST',
    enctype: 'multipart/form-data',
    processData: false,
    // Important!
    contentType: false,
    cache: false,
    data: formData,
    dataType: 'JSON',
    success: function success(data) {
      data.forEach(function (d) {
        $("#select_category").html("<option value=\"0\">انتخاب کنید</option>");
        data.forEach(function (d) {
          $("#select_category").append("  <option value=" + d['id'] + ">" + d['title'] + "</option> ");
        });
      });
    }
  });
}

function select_pcat(e) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var formData = new FormData();
  /* send the csrf-token and the input to the controller */

  $("#category_properties_data").html("");
  formData.append("_token", CSRF_TOKEN);
  formData.append("pcatid", e.value);
  formData.append("op", 'changepcat');
  $.ajax({
    /* the route pointing to the post function */
    url: "",
    type: 'POST',
    enctype: 'multipart/form-data',
    processData: false,
    // Important!
    contentType: false,
    cache: false,
    // data: {_token: CSRF_TOKEN, 'name':name,'cat':type,'op':'add','image':(image)?image:""},
    data: formData,
    dataType: 'JSON',
    success: function success(data) {
      data.forEach(function (d) {
        data.forEach(function (d) {
          $("#category_properties_data").append("  <option value=" + d['id'] + ">" + d['name'] + "</option> ");
        });
      });
    }
  });
}

/***/ }),

/***/ 1:
/*!************************************************!*\
  !*** multi ./public/assets/scripts/adddata.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\symo\public\assets\scripts\adddata.js */"./public/assets/scripts/adddata.js");


/***/ })

/******/ });