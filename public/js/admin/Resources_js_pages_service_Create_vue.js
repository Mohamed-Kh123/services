"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["Resources_js_pages_service_Create_vue"],{

/***/ "./Resources/js/pages/service/partials/form.js":
/*!*****************************************************!*\
  !*** ./Resources/js/pages/service/partials/form.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var form = {
  config: {
    resource: "service"
  },
  inputs: [{
    component: "input",
    model: "name",
    label: "name",
    cols: 12,
    rules: {
      required: true
    },
    multiLang: true
  }, {
    component: "editor",
    model: "description",
    label: "description",
    cols: 12,
    rules: {
      required: true
    },
    multiLang: true
  }, {
    component: "select",
    model: "category_id",
    label: "category_name",
    cols: 6,
    endPoint: {
      name: 'category.index',
      params: {
        no_pagination: true,
        activated: true
      }
    },
    rules: {
      required: true
    }
  },
  // {
  //     component: "input",
  //     model: "price",
  //     label: "price",
  //     cols: 6,
  //     rules: {
  //         required: true
  //     },
  // },

  {
    component: "select",
    model: "order_determine_types",
    label: "order_determine_types",
    option_value: "value",
    cols: 6,
    endPoint: {
      name: 'constant.index',
      params: {
        no_pagination: true,
        key: 'order_determine_types'
      }
    },
    rules: {
      required: true
    }
  }, {
    component: "input",
    model: "min_price",
    label: "min_price",
    cols: 6,
    rules: {
      required: true
    }
  }, {
    component: "switch",
    model: "is_active",
    cols: 6,
    label: "is_active"
  }, {
    component: "image",
    model: "image",
    label: "image",
    image_url_option: "image_url",
    cols: 6
  }, {
    component: "repeater",
    label: "counter_fields",
    model: "counter_fields",
    show: function show() {
      var _this$form;
      return (this === null || this === void 0 || (_this$form = this.form) === null || _this$form === void 0 ? void 0 : _this$form.order_determine_types) === 'counter_fields';
    },
    inputs: [{
      component: "input",
      model: "label",
      label: "label",
      cols: 6
    }, {
      component: "input",
      model: "unit_price",
      label: "unit_price",
      cols: 6
    }]
  }, {
    component: "crud",
    label: "select_group",
    model: "select_group",
    slug: "select_group",
    show: function show() {
      var _this$form2;
      return (this === null || this === void 0 || (_this$form2 = this.form) === null || _this$form2 === void 0 ? void 0 : _this$form2.order_determine_types) === 'select_group';
    },
    columns: [{
      label: "id",
      value: "id"
    }, {
      label: "title",
      value: "title"
    }, {
      label: "description",
      value: "description"
    }],
    inputs: [{
      component: "input",
      model: "title",
      label: "title",
      cols: 6,
      rules: {
        required: true
      },
      multiLang: true
    }, {
      component: "input",
      model: "description",
      label: "description",
      cols: 6,
      rules: {
        required: true
      },
      multiLang: true
    }, {
      component: "repeater",
      label: "group_options",
      model: "group_options",
      inputs: [{
        component: "input",
        model: "label",
        label: "label",
        cols: 6
      }, {
        component: "input",
        model: "unit_price",
        label: "unit_price",
        cols: 6
      }]
    }]
  }]
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (form);

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/service/Create.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/service/Create.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _partials_form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./partials/form */ "./Resources/js/pages/service/partials/form.js");

// import Test ,{} from "./Test";

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  template: "<FormLayout v-bind=\"form\"></FormLayout>",
  data: function data() {
    return {
      form: _partials_form__WEBPACK_IMPORTED_MODULE_0__["default"]
    };
  },
  created: function created() {
    // alert('create')
  } // components : {
  //     Test,
  // },
});

/***/ }),

/***/ "./Resources/js/pages/service/Create.vue":
/*!***********************************************!*\
  !*** ./Resources/js/pages/service/Create.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js */ "./Resources/js/pages/service/Create.vue?vue&type=script&lang=js");
/* harmony import */ var C_laragon_www_services_Modules_Admin_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");



;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_services_Modules_Admin_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"], [['__file',"Resources/js/pages/service/Create.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./Resources/js/pages/service/Create.vue?vue&type=script&lang=js":
/*!***********************************************************************!*\
  !*** ./Resources/js/pages/service/Create.vue?vue&type=script&lang=js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Create.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/service/Create.vue?vue&type=script&lang=js");
 

/***/ })

}]);