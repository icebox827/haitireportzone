!function(e){function t(t){for(var n,a,c=t[0],u=t[1],s=t[2],l=0,p=[];l<c.length;l++)a=c[l],i[a]&&p.push(i[a][0]),i[a]=0;for(n in u)Object.prototype.hasOwnProperty.call(u,n)&&(e[n]=u[n]);for(_&&_(t);p.length;)p.shift()();return o.push.apply(o,s||[]),r()}function r(){for(var e,t=0;t<o.length;t++){for(var r=o[t],n=!0,a=1;a<r.length;a++){var c=r[a];0!==i[c]&&(n=!1)}n&&(o.splice(t--,1),e=__webpack_require__(__webpack_require__.s=r[0]))}return e}var n={},i={9:0},o=[];function __webpack_require__(t){if(n[t])return n[t].exports;var r=n[t]={i:t,l:!1,exports:{}};return e[t].call(r.exports,r,r.exports,__webpack_require__),r.l=!0,r.exports}__webpack_require__.e=function(e){var t=[],r=i[e];if(0!==r)if(r)t.push(r[2]);else{var n=new Promise((function(t,n){r=i[e]=[t,n]}));t.push(r[2]=n);var o,a=document.createElement("script");a.charset="utf-8",a.timeout=120,__webpack_require__.nc&&a.setAttribute("nonce",__webpack_require__.nc),a.src=function(e){return __webpack_require__.p+""+({4:"chunk-googlesitekit-adminbar"}[e]||e)+".js"}(e),o=function(t){a.onerror=a.onload=null,clearTimeout(c);var r=i[e];if(0!==r){if(r){var n=t&&("load"===t.type?"missing":t.type),o=t&&t.target&&t.target.src,u=new Error("Loading chunk "+e+" failed.\n("+n+": "+o+")");u.type=n,u.request=o,r[1](u)}i[e]=void 0}};var c=setTimeout((function(){o({type:"timeout",target:a})}),12e4);a.onerror=a.onload=o,document.head.appendChild(a)}return Promise.all(t)},__webpack_require__.m=e,__webpack_require__.c=n,__webpack_require__.d=function(e,t,r){__webpack_require__.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},__webpack_require__.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},__webpack_require__.t=function(e,t){if(1&t&&(e=__webpack_require__(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(__webpack_require__.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)__webpack_require__.d(r,n,function(t){return e[t]}.bind(null,n));return r},__webpack_require__.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return __webpack_require__.d(t,"a",t),t},__webpack_require__.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},__webpack_require__.p="",__webpack_require__.oe=function(e){throw console.error(e),e};var a=window.webpackJsonp=window.webpackJsonp||[],c=a.push.bind(a);a.push=t,a=a.slice();for(var u=0;u<a.length;u++)t(a[u]);var _=c;o.push([183,0,1]),r()}({0:function(e,t){e.exports=wp.i18n},1:function(e,t){e.exports=wp.element},10:function(e,t){e.exports=wp.hooks},11:function(e,t){e.exports=lodash},18:function(e,t){e.exports=React},183:function(e,t,r){"use strict";r.r(t);var n=r(2);window.googlesitekitAdminbar&&window.googlesitekitAdminbar.publicPath&&(r.p=window.googlesitekitAdminbar.publicPath);var i=!1;function o(){r.e(4).then(r.bind(null,207)).then((function(e){return e})).catch((function(){return new Error("Site Kit: An error occurred while loading the Adminbar component files.")})).then((function(e){try{e.init()}catch(e){console.error("Site Kit: An error occurred while loading the Adminbar components."),document.getElementById("js-googlesitekit-adminbar").classList.add("googlesitekit-adminbar--has-error")}document.getElementById("js-googlesitekit-adminbar").classList.remove("googlesitekit-adminbar--loading")}))}window.addEventListener("load",(function(){var e=document.getElementById("wp-admin-bar-google-site-kit"),t=!1;if(e&&window.localStorage){var r=window.localStorage.getItem("googlesitekit::total-notifications")||0;Object(n.b)(r);var a=function(){if(!i){if(googlesitekit.admin.trackingOptin)if("undefined"!=typeof gtag||t)Object(n.v)("admin_bar","page_stats_view");else{t=!0;var e=document.createElement("script");e.type="text/javascript",e.setAttribute("async","true"),e.onload=function(){window.gtag=function(){window.dataLayer.push(arguments)},Object(n.v)("admin_bar","page_stats_view")},e.setAttribute("src","https://www.googletagmanager.com/gtag/js?id=".concat(googlesitekit.admin.trackingID)),document.head.appendChild(e)}var r=window.googlesitekitAdminbar.properties.isAdmin,a=r&&window.googlesitekit.admin.currentScreen&&"post"===window.googlesitekit.admin.currentScreen.id,c="".concat(window.googlesitekitAdminbar.publicPath,"allmodules.js"),u=document.querySelector('script[src="'.concat(c,'"]'));if(!r||r&&a&&!u){var _=document.createElement("script");_.type="text/javascript",_.onload=function(){_.onload=null,o()},document.getElementsByTagName("head")[0].appendChild(_),_.src=c,i=!0}else o(),i=!0}};"true"===Object(n.l)("googlesitekit_adminbar_open")?(a(),e.classList.add("hover")):e.addEventListener("mouseenter",a,!1)}}))},35:function(e,t){e.exports=wp.apiFetch},36:function(e,t){e.exports=wp.url},50:function(e,t){e.exports=ReactDOM},59:function(e,t){e.exports=wp.compose}});