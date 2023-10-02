"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["Resources_js_pages_service_List_vue"],{

/***/ "./Resources/js/pages/service/partials/list.js":
/*!*****************************************************!*\
  !*** ./Resources/js/pages/service/partials/list.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   actions: () => (/* binding */ actions),
/* harmony export */   columns: () => (/* binding */ columns),
/* harmony export */   config: () => (/* binding */ config),
/* harmony export */   filters: () => (/* binding */ filters),
/* harmony export */   resource: () => (/* binding */ resource)
/* harmony export */ });
var resource = "service";
var columns = [{
  text: "id",
  value: "id"
}, {
  text: "name",
  value: "name"
}, {
  text: "category_name",
  value: "category_name"
}, {
  text: "order_determine_types",
  value: "order_determine_types_name"
}, {
  text: "is_active",
  value: "is_active",
  name: "service.update",
  component: "switch-status"
}];
var config = {
  importBtn: false,
  pdfBtn: false,
  excelBtn: false,
  createBtn: true
};
var filters = [
  // {
  //     component: "input",
  //     model: "name_email",
  //     label: "name_email",
  //     cols: 4,
  //
  // },
  // {
  //     component: "select",
  //     model: "role",
  //     label: "role",
  //     cols: 4,
  //     endPoint: {name: 'role.index', params: {no_pagination: true}},
  //
  // },
];
var actions = [{
  slug: "edit",
  color: "success"
}, {
  slug: "delete",
  color: "danger"
}];


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/service/List.vue?vue&type=script&lang=js":
/*!*************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/service/List.vue?vue&type=script&lang=js ***!
  \*************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _partials_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./partials/list */ "./Resources/js/pages/service/partials/list.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "List",
  template: "<VList v-bind=\"list\"> </VList>",
  data: function data() {
    return {
      list: _partials_list__WEBPACK_IMPORTED_MODULE_0__
    };
  }
});

/***/ }),

/***/ "./Resources/js/pages/service/List.vue":
/*!*********************************************!*\
  !*** ./Resources/js/pages/service/List.vue ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _List_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./List.vue?vue&type=script&lang=js */ "./Resources/js/pages/service/List.vue?vue&type=script&lang=js");
/* harmony import */ var C_laragon_www_services_Modules_Admin_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");



;
const __exports__ = /*#__PURE__*/(0,C_laragon_www_services_Modules_Admin_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_1__["default"])(_List_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"], [['__file',"Resources/js/pages/service/List.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./Resources/js/pages/service/List.vue?vue&type=script&lang=js":
/*!*********************************************************************!*\
  !*** ./Resources/js/pages/service/List.vue?vue&type=script&lang=js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_List_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_List_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./List.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Resources/js/pages/service/List.vue?vue&type=script&lang=js");
 

/***/ })

}]);