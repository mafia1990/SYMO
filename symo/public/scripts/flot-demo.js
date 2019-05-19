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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./public/assets/scripts/flot-demo.js":
/*!********************************************!*\
  !*** ./public/assets/scripts/flot-demo.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//Flot Pie Chart
$(function () {
  try {
    var data = [{
      label: "Clothes",
      data: parseInt($('#flot-pie-chart').attr('data-content').split(',')[0])
    }, {
      label: "set",
      data: parseInt($('#flot-pie-chart').attr('data-content').split(',')[1])
    }];
    var plotObj = $.plot($("#flot-pie-chart"), data, {
      series: {
        pie: {
          show: true
        }
      },
      grid: {
        hoverable: true
      },
      tooltip: true,
      tooltipOpts: {
        content: "%p.0%, %s",
        // show percentages, rounding to 2 decimal places
        shifts: {
          x: 20,
          y: 0
        },
        defaultTheme: false
      }
    });
  } catch (e) {
    console.log(e);
  }
});
$(function () {
  try {
    var data = [{
      label: "saler",
      data: parseInt($('#flot-pie-chart2').attr('data-content').split(',')[0])
    }, {
      label: "clothes",
      data: parseInt($('#flot-pie-chart2').attr('data-content').split(',')[1])
    }];
    var plotObj = $.plot($("#flot-pie-chart2"), data, {
      series: {
        pie: {
          show: true
        }
      },
      grid: {
        hoverable: true
      },
      tooltip: true,
      tooltipOpts: {
        content: "%p.0%, %s",
        // show percentages, rounding to 2 decimal places
        shifts: {
          x: 20,
          y: 0
        },
        defaultTheme: false
      }
    });
  } catch (e) {
    console.log(e);
  }
});
$(function () {
  try {
    var data = [{
      label: "designers",
      data: parseInt($('#flot-pie-chart1').attr('data-content').split(',')[0])
    }, {
      label: "set",
      data: parseInt($('#flot-pie-chart1').attr('data-content').split(',')[1])
    }];
    var plotObj = $.plot($("#flot-pie-chart1"), data, {
      series: {
        pie: {
          show: true
        }
      },
      grid: {
        hoverable: true
      },
      tooltip: true,
      tooltipOpts: {
        content: "%p.0%, %s",
        // show percentages, rounding to 2 decimal places
        shifts: {
          x: 20,
          y: 0
        },
        defaultTheme: false
      }
    });
  } catch (e) {
    console.log(e);
  }
}); //Flot Moving Line Chart

$(function () {
  var container = $("#flot-line-chart-moving"); // Determine how many data points to keep based on the placeholder's initial size;
  // this gives us a nice high-res plot while avoiding more than one point per pixel.

  var maximum = container.outerWidth() / 2 || 300; //

  var data = [];

  function getRandomData() {
    if (data.length) {
      data = data.slice(1);
    }

    while (data.length < maximum) {
      var previous = data.length ? data[data.length - 1] : 50;
      var y = previous + Math.random() * 10 - 5;
      data.push(y < 0 ? 0 : y > 100 ? 100 : y);
    } // zip the generated y values with the x values


    var res = [];

    for (var i = 0; i < data.length; ++i) {
      res.push([i, data[i]]);
    }

    return res;
  } //


  series = [{
    data: getRandomData(),
    lines: {
      fill: true
    }
  }]; //

  var plot = $.plot(container, series, {
    grid: {
      borderWidth: 1,
      minBorderMargin: 20,
      labelMargin: 10,
      backgroundColor: {
        colors: ["#fff", "#e4f4f4"]
      },
      margin: {
        top: 8,
        bottom: 20,
        left: 20
      },
      markings: function markings(axes) {
        var markings = [];
        var xaxis = axes.xaxis;

        for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 2) {
          markings.push({
            xaxis: {
              from: x,
              to: x + xaxis.tickSize
            },
            color: "rgba(232, 232, 255, 0.2)"
          });
        }

        return markings;
      }
    },
    xaxis: {
      tickFormatter: function tickFormatter() {
        return "";
      }
    },
    yaxis: {
      min: 0,
      max: 100
    },
    legend: {
      show: true
    }
  }); // Update the random dataset at 25FPS for a smoothly-animating chart

  setInterval(function updateRandom() {
    series[0].data = getRandomData();
    plot.setData(series);
    plot.draw();
  }, 40);
});

/***/ }),

/***/ 8:
/*!**************************************************!*\
  !*** multi ./public/assets/scripts/flot-demo.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\symo\public\assets\scripts\flot-demo.js */"./public/assets/scripts/flot-demo.js");


/***/ })

/******/ });