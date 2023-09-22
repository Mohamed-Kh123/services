"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[8730],{58730:(e,o,t)=>{t.r(o),t.d(o,{default:()=>i});var a=t(70821);const i=(0,a.defineComponent)({props:{icon:{type:String,required:!0},to:{type:Object,default:void 0},href:{type:String,default:void 0},color:{type:String,default:void 0,validator:e=>-1!==[void 0,"primary","info","success","warning","danger","white"].indexOf(e)||(console.warn(`VIconButton: invalid "${e}" color. Should be primary, info, success, warning, danger, white or undefined`),!1)},dark:{type:String,default:void 0,validator:e=>!e||(-1!==["1","2","3","4","5","6"].indexOf(e)||(console.warn(`VIconButton: invalid "${e}" dark. Should be 1, 2, 3, 4, 5, 6 or undefined`),!1))},circle:{type:Boolean,default:!1},bold:{type:Boolean,default:!1},light:{type:Boolean,default:!1},raised:{type:Boolean,default:!1},elevated:{type:Boolean,default:!1},outlined:{type:Boolean,default:!1},darkOutlined:{type:Boolean,default:!1},loading:{type:Boolean,default:!1},disabled:{type:Boolean,default:!1}},setup(e,{attrs:o}){const t=(0,a.computed)((()=>[...o?.class||[],e.disabled&&"is-disabled",e.circle&&"is-circle",e.bold&&"is-bold",e.outlined&&"is-outlined",e.raised&&"is-raised",e.dark&&`is-dark-bg-${e.dark}`,e.darkOutlined&&"is-dark-outlined",e.elevated&&"is-elevated",e.loading&&"is-loading",e.color&&`is-${e.color}`,e.light&&"is-light"])),i=(0,a.computed)((()=>e.icon&&-1!==e.icon.indexOf(":")));return()=>{let d;d=i.value?(0,a.h)("Icon",{"aria-hidden":!0,class:"iconify",icon:e.icon}):(0,a.h)("i",{"aria-hidden":!0,class:e.icon});const l=(0,a.h)("span",{class:"icon"},d);return e.to?(0,a.h)((0,a.resolveComponent)("RouterLink"),{...o,to:e.to,class:["button",...t.value]},l):e.href?(0,a.h)("a",{...o,href:e.href,class:t.value},l):(0,a.h)("button",{type:"button",...o,disabled:e.disabled,class:["button",...t.value]},l)}}})}}]);