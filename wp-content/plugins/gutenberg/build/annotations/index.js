this.wp=this.wp||{},this.wp.annotations=function(t){var n={};function e(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,e),o.l=!0,o.exports}return e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{configurable:!1,enumerable:!0,get:r})},e.r=function(t){Object.defineProperty(t,"__esModule",{value:!0})},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=206)}({1:function(t,n){!function(){t.exports=this.wp.i18n}()},15:function(t,n,e){"use strict";function r(t,n,e){return n in t?Object.defineProperty(t,n,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[n]=e,t}e.d(n,"a",function(){return r})},19:function(t,n,e){"use strict";var r=e(31);function o(t){return function(t){if(Array.isArray(t)){for(var n=0,e=new Array(t.length);n<t.length;n++)e[n]=t[n];return e}}(t)||Object(r.a)(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance")}()}e.d(n,"a",function(){return o})},2:function(t,n){!function(){t.exports=this.lodash}()},20:function(t,n,e){"use strict";function r(t,n){if(null==t)return{};var e,r,o=function(t,n){if(null==t)return{};var e,r,o={},i=Object.keys(t);for(r=0;r<i.length;r++)e=i[r],n.indexOf(e)>=0||(o[e]=t[e]);return o}(t,n);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);for(r=0;r<i.length;r++)e=i[r],n.indexOf(e)>=0||Object.prototype.propertyIsEnumerable.call(t,e)&&(o[e]=t[e])}return o}e.d(n,"a",function(){return r})},206:function(t,n,e){"use strict";e.r(n);var r={};e.d(r,"__experimentalGetAnnotationsForBlock",function(){return b}),e.d(r,"__experimentalGetAnnotationsForRichText",function(){return v}),e.d(r,"__experimentalGetAnnotations",function(){return y});var o={};e.d(o,"__experimentalAddAnnotation",function(){return g}),e.d(o,"__experimentalRemoveAnnotation",function(){return m}),e.d(o,"__experimentalRemoveAnnotationsBySource",function(){return x});var i=e(5),a=e(15),u=e(8),c=e(19),l=e(2);function f(t,n){var e=t.filter(n);return t.length===e.length?t:e}var s=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{all:[],byBlockClientId:{}},n=arguments.length>1?arguments[1]:void 0;switch(n.type){case"ANNOTATION_ADD":var e=n.blockClientId,r={id:n.id,blockClientId:e,richTextIdentifier:n.richTextIdentifier,source:n.source,selector:n.selector,range:n.range};if("range"===r.selector&&!function(t){return Object(l.isNumber)(t.start)&&Object(l.isNumber)(t.end)&&t.start<=t.end}(r.range))return t;var o=t.byBlockClientId[e]||[];return{all:Object(c.a)(t.all).concat([r]),byBlockClientId:Object(u.a)({},t.byBlockClientId,Object(a.a)({},e,Object(c.a)(o).concat([n.id])))};case"ANNOTATION_REMOVE":return{all:t.all.filter(function(t){return t.id!==n.annotationId}),byBlockClientId:Object(l.mapValues)(t.byBlockClientId,function(t){return f(t,function(t){return t!==n.annotationId})})};case"ANNOTATION_REMOVE_SOURCE":var i=[];return{all:t.all.filter(function(t){return t.source!==n.source||(i.push(t.id),!1)}),byBlockClientId:Object(l.mapValues)(t.byBlockClientId,function(t){return f(t,function(t){return!i.includes(t)})})}}return t},d=e(20),p=e(30),b=Object(p.a)(function(t,n){return t.all.filter(function(t){return"block"===t.selector&&t.blockClientId===n})},function(t,n){return[t.byBlockClientId[n]]}),v=Object(p.a)(function(t,n,e){return t.all.filter(function(t){return"range"===t.selector&&t.blockClientId===n&&e===t.richTextIdentifier}).map(function(t){var n=t.range,e=Object(d.a)(t,["range"]);return Object(u.a)({},n,e)})},function(t,n){return[t.byBlockClientId[n]]});function y(t){return t.all}var O=e(60),h=e.n(O);function g(t){var n=t.blockClientId,e=t.richTextIdentifier,r=void 0===e?null:e,o=t.range,i=void 0===o?null:o,a=t.selector,u=void 0===a?"range":a,c=t.source,l=void 0===c?"default":c,f=t.id,s={type:"ANNOTATION_ADD",id:void 0===f?h()():f,blockClientId:n,richTextIdentifier:r,source:l,selector:u};return"range"===u&&(s.range=i),s}function m(t){return{type:"ANNOTATION_REMOVE",annotationId:t}}function x(t){return{type:"ANNOTATION_REMOVE_SOURCE",source:t}}Object(i.registerStore)("core/annotations",{reducer:s,selectors:r,actions:o});var j=e(21),I=e(1);var _={name:"core/annotation",title:Object(I.__)("Annotation"),tagName:"mark",className:"annotation-text",attributes:{className:"class"},edit:function(){return null},__experimentalGetPropsForEditableTreePreparation:function(t,n){var e=n.richTextIdentifier,r=n.blockClientId;return{annotations:t("core/annotations").__experimentalGetAnnotationsForRichText(r,e)}},__experimentalCreatePrepareEditableTree:function(t){return function(n,e){if(0===t.annotations.length)return n;var r={formats:n,text:e};return(r=function(t){return(arguments.length>1&&void 0!==arguments[1]?arguments[1]:[]).forEach(function(n){var e=n.start,r=n.end;e>t.text.length&&(e=t.text.length),r>t.text.length&&(r=t.text.length);var o="annotation-text-"+n.source;t=Object(j.applyFormat)(t,{type:"core/annotation",attributes:{className:o}},e,r)}),t}(r,t.annotations)).formats}}},A=_.name,k=Object(d.a)(_,["name"]);Object(j.registerFormatType)(A,k);var w=e(23);Object(w.addFilter)("editor.BlockListBlock","core/annotations",function(t){return Object(i.withSelect)(function(t,n){var e=n.clientId;return{className:t("core/annotations").__experimentalGetAnnotationsForBlock(e).map(function(t){return"is-annotated-by-"+t.source})}})(t)})},21:function(t,n){!function(){t.exports=this.wp.richText}()},23:function(t,n){!function(){t.exports=this.wp.hooks}()},30:function(t,n,e){"use strict";var r,o;function i(t){return[t]}function a(t){return!!t&&"object"==typeof t}function u(){var t={clear:function(){t.head=null}};return t}function c(t,n,e){var r;if(t.length!==n.length)return!1;for(r=e;r<t.length;r++)if(t[r]!==n[r])return!1;return!0}r={},o="undefined"!=typeof WeakMap,n.a=function(t,n){var e,l;function f(){e=o?new WeakMap:u()}function s(){var e,r,o,i,a,u=arguments.length;for(i=new Array(u),o=0;o<u;o++)i[o]=arguments[o];for(a=n.apply(null,i),(e=l(a)).isUniqueByDependants||(e.lastDependants&&!c(a,e.lastDependants,0)&&e.clear(),e.lastDependants=a),r=e.head;r;){if(c(r.args,i,1))return r!==e.head&&(r.prev.next=r.next,r.next&&(r.next.prev=r.prev),r.next=e.head,r.prev=null,e.head.prev=r,e.head=r),r.val;r=r.next}return r={val:t.apply(null,i)},i[0]=null,r.args=i,e.head&&(e.head.prev=r,r.next=e.head),e.head=r,r.val}return n||(n=i),l=o?function(t){var n,o,i,c,l=e,f=!0;for(n=0;n<t.length;n++){if(!a(o=t[n])){f=!1;break}l.has(o)?l=l.get(o):(i=new WeakMap,l.set(o,i),l=i)}return l.has(r)||((c=u()).isUniqueByDependants=f,l.set(r,c)),l.get(r)}:function(){return e},s.getDependants=n,s.clear=f,f(),s}},31:function(t,n,e){"use strict";function r(t){if(Symbol.iterator in Object(t)||"[object Arguments]"===Object.prototype.toString.call(t))return Array.from(t)}e.d(n,"a",function(){return r})},5:function(t,n){!function(){t.exports=this.wp.data}()},60:function(t,n,e){var r=e(84),o=e(83);t.exports=function(t,n,e){var i=n&&e||0;"string"==typeof t&&(n="binary"===t?new Array(16):null,t=null);var a=(t=t||{}).random||(t.rng||r)();if(a[6]=15&a[6]|64,a[8]=63&a[8]|128,n)for(var u=0;u<16;++u)n[i+u]=a[u];return n||o(a)}},8:function(t,n,e){"use strict";e.d(n,"a",function(){return o});var r=e(15);function o(t){for(var n=1;n<arguments.length;n++){var e=null!=arguments[n]?arguments[n]:{},o=Object.keys(e);"function"==typeof Object.getOwnPropertySymbols&&(o=o.concat(Object.getOwnPropertySymbols(e).filter(function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.forEach(function(n){Object(r.a)(t,n,e[n])})}return t}},83:function(t,n){for(var e=[],r=0;r<256;++r)e[r]=(r+256).toString(16).substr(1);t.exports=function(t,n){var r=n||0,o=e;return[o[t[r++]],o[t[r++]],o[t[r++]],o[t[r++]],"-",o[t[r++]],o[t[r++]],"-",o[t[r++]],o[t[r++]],"-",o[t[r++]],o[t[r++]],"-",o[t[r++]],o[t[r++]],o[t[r++]],o[t[r++]],o[t[r++]],o[t[r++]]].join("")}},84:function(t,n){var e="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto)||"undefined"!=typeof msCrypto&&"function"==typeof window.msCrypto.getRandomValues&&msCrypto.getRandomValues.bind(msCrypto);if(e){var r=new Uint8Array(16);t.exports=function(){return e(r),r}}else{var o=new Array(16);t.exports=function(){for(var t,n=0;n<16;n++)0==(3&n)&&(t=4294967296*Math.random()),o[n]=t>>>((3&n)<<3)&255;return o}}}});