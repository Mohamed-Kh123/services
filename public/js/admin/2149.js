"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[2149],{22149:(e,l,t)=>{t.r(l),t.d(l,{default:()=>n});const o={config:{resource:"section"},inputs:[{component:"input",model:"name",label:"name",rules:{required:!0},multiLang:!0},{component:"select",model:"type",label:"type",option_value:"value",cols:6,endPoint:{name:"constant.index",params:{no_pagination:!0,key:"sections_types"}},rules:{required:!0}},{component:"switch",model:"is_active",cols:6,label:"is_active"},{component:"crud",label:"blogs",model:"blogs",slug:"section_blog",show:function(){var e;return"section_blogs"===(null==this||null===(e=this.form)||void 0===e?void 0:e.type)},columns:[{label:"id",value:"id"},{label:"title",value:"title"}],inputs:[{component:"input",model:"title",label:"title",multiLang:!0,rules:{required:!0}},{component:"textarea",model:"text",label:"text",multiLang:!0,rules:{required:!0}},{component:"image",model:"image",label:"image",image_url_option:"image_url",cols:6,rules:{required:!0}},{component:"switch",model:"is_active",cols:6,label:"is_active"}]},{component:"file",model:"images",crop:!0,width:500,label:"album",ratio:16/9,endPoint:"upload.album",show:function(){var e;return"section_sliders"===(null==this||null===(e=this.form)||void 0===e?void 0:e.type)}}]},n={template:'<FormLayout v-bind="form"></FormLayout>',data:function(){return{form:o}},created:function(){}}}}]);