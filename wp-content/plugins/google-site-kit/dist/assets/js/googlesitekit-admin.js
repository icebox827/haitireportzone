!function(e){function r(r){for(var o,i,u=r[0],a=r[1],c=r[2],l=0,s=[];l<u.length;l++)i=u[l],n[i]&&s.push(n[i][0]),n[i]=0;for(o in a)Object.prototype.hasOwnProperty.call(a,o)&&(e[o]=a[o]);for(p&&p(r);s.length;)s.shift()();return _.push.apply(_,c||[]),t()}function t(){for(var e,r=0;r<_.length;r++){for(var t=_[r],o=!0,i=1;i<t.length;i++){var u=t[i];0!==n[u]&&(o=!1)}o&&(_.splice(r--,1),e=__webpack_require__(__webpack_require__.s=t[0]))}return e}var o={},n={8:0},_=[];function __webpack_require__(r){if(o[r])return o[r].exports;var t=o[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,__webpack_require__),t.l=!0,t.exports}__webpack_require__.m=e,__webpack_require__.c=o,__webpack_require__.d=function(e,r,t){__webpack_require__.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},__webpack_require__.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},__webpack_require__.t=function(e,r){if(1&r&&(e=__webpack_require__(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(__webpack_require__.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var o in e)__webpack_require__.d(t,o,function(r){return e[r]}.bind(null,o));return t},__webpack_require__.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return __webpack_require__.d(r,"a",r),r},__webpack_require__.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},__webpack_require__.p="";var i=window.webpackJsonp=window.webpackJsonp||[],u=i.push.bind(i);i.push=r,i=i.slice();for(var a=0;a<i.length;a++)r(i[a]);var p=u;_.push([184,0,1]),t()}({0:function(e,r){e.exports=wp.i18n},1:function(e,r){e.exports=wp.element},10:function(e,r){e.exports=wp.hooks},11:function(e,r){e.exports=lodash},18:function(e,r){e.exports=React},184:function(e,r,t){"use strict";t.r(r);var o=t(2);if("toplevel_page_googlesitekit-dashboard"!==window.pagenow&&"site-kit_page_googlesitekit-splash"!==window.pagenow&&"admin_page_googlesitekit-splash"!==window.pagenow&&window.localStorage){var n=window.localStorage.getItem("googlesitekit::total-notifications")||0;Object(o.b)(n)}var _=document.querySelector("#wp-admin-bar-logout a");_||(_=document.querySelector(".sidebar__me-signout button")),_&&_.addEventListener("click",(function(){Object(o.d)()}))},35:function(e,r){e.exports=wp.apiFetch},36:function(e,r){e.exports=wp.url},50:function(e,r){e.exports=ReactDOM}});