"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["Resources_js_pages_section_Create_vue"],{

/***/ "./Resources/js/pages/section/partials/form.js":
/*!*****************************************************!*\
  !*** ./Resources/js/pages/section/partials/form.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var form = {
  config: {
    resource: "section"
  },
  inputs: [{
    component: "input",
    model: "name",
    label: "name",
    rules: {
      required: true
    },
    multiLang: true
  }, {
    component: "select",
    model: "type",
    label: "type",
    option_value: "value",
    cols: 6,
    endPoint: {
      name: 'constant.index',
      params: {
        no_pagination: true,
        key: 'sections_types'
      }
    },
    rules: {
      required: true
    }
  }, {
    component: "switch",
    model: "is_active",
    cols: 6,
    label: "is_active"
  },
  // 'title', 'text', 'image', 'section_id', 'is_active'
  {
    component: "crud",
    label: "blogs",
    model: "blogs",
    slug: "section_blog",
    show: function show() {
      var _this$form;
      return (this === null || this === void 0 || (_this$form = this.form) === null || _this$form === void 0 ? void 0 : _this$form.type) === 'blog_section';
    },
    columns: [{
      label: "id",
      value: "id"
    }, {
      label: "title",
      value: "title"
    }],
    inputs: [{
      component: "input",
      model: "title",
      label: "title",
      multiLang: true,
      rules: {
        required: true
      }
    }, {
      component: "textarea",
      model: "text",
      label: "text",
      multiLang: true,
      rules: {
        required: true
      }
    }, {
      component: "image",
      model: "image",
      label: "image",
      image_url_option: "image_url",
      cols: 6,
      rules: {
        required: true
      }
    }, {
      component: "switch",
      model: "is_active",
      cols: 6,
      label: "is_active"
    }]
  }, {
    component: "file",
    model: "images",
    crop: true,
    width: 500,
    label: "album",
    ratio: 16 / 9,
    endPoint: {
      name: "image.upload_album",
      params: {
        no_pagination: true
      }
    },
    show: function show() {
      var _this$form2;
      return (this === null || this === void 0 || (_this$form2 = this.form) === null || _this$form2 === void 0 ? void 0 : _this$form2.type) === 'slider_section';
    }
  }]
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (form);

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/section/Create.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/section/Create.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _partials_form__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./partials/form */ "./Resources/js/pages/section/partials/form.js");

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

/***/ "./Resources/js/pages/section/Create.vue":
/*!***********************************************!*\
  !*** ./Resources/js/pages/section/Create.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js */ "./Resources/js/pages/section/Create.vue?vue&type=script&lang=js");
/* harmony import */ var C_laragon_www_services_Modules_Admin_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");



;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_services_Modules_Admin_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"], [['__file',"Resources/js/pages/section/Create.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./Resources/js/pages/section/Create.vue?vue&type=script&lang=js":
/*!***********************************************************************!*\
  !*** ./Resources/js/pages/section/Create.vue?vue&type=script&lang=js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Create.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/section/Create.vue?vue&type=script&lang=js");
 

/***/ })

}]);