"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[5451],{95451:(e,t,l)=>{l.r(t),l.d(t,{default:()=>c});var a=l(70821);const s={class:"tabs-inner"},i=["onClick"],n={key:0,class:"tab-naver"},o={class:"tab-content is-active"};const r={props:{selected:{default:void 0},type:{default:void 0},align:{default:void 0},tabs:{default:[]},slow:{default:!1}},data:()=>({activeValue:void 0}),created(){this.activeValue=this.tabs[0].value},computed:{sliderClass(){if(!this.slider)return"";if("rounded"===this.type)return 3===this.tabs.length?"is-triple-slider":2===this.tabs.length?"is-slider":"";if(!this.type){if(3===this.tabs.length)return"is-squared is-triple-slider";if(2===this.tabs.length)return"is-squared is-slider"}return""}}};const c=(0,l(83744).Z)(r,[["render",function(e,t,l,r,c,d){const u=(0,a.resolveComponent)("VIcon");return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:(0,a.normalizeClass)(["tabs-wrapper",[d.sliderClass]])},[(0,a.createElementVNode)("div",s,[(0,a.createElementVNode)("div",{class:(0,a.normalizeClass)(["tabs",["centered"===l.align&&"is-centered","right"===l.align&&"is-right","rounded"===l.type&&!e.slider&&"is-toggle is-toggle-rounded","toggle"===l.type&&"is-toggle","boxed"===l.type&&"is-boxed"]])},[(0,a.createElementVNode)("ul",null,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(l.tabs,((e,t)=>((0,a.openBlock)(),(0,a.createElementBlock)("li",{key:t,class:(0,a.normalizeClass)([c.activeValue===e.value&&"is-active"])},[(0,a.createElementVNode)("a",{onClick:t=>c.activeValue=e.value},[e.icon?((0,a.openBlock)(),(0,a.createBlock)(u,{key:0,icon:e.icon},null,8,["icon"])):(0,a.createCommentVNode)("",!0),(0,a.createElementVNode)("span",null,(0,a.toDisplayString)(e.label),1)],8,i)],2)))),128)),d.sliderClass?((0,a.openBlock)(),(0,a.createElementBlock)("li",n)):(0,a.createCommentVNode)("",!0)])],2)]),(0,a.createElementVNode)("div",o,[(0,a.createVNode)(a.Transition,{name:l.slow?"fade-slow":"fade-fast",mode:"out-in"},{default:(0,a.withCtx)((()=>[(0,a.renderSlot)(e.$slots,"tab",{activeValue:c.activeValue})])),_:3},8,["name"])])],2)}]])}}]);