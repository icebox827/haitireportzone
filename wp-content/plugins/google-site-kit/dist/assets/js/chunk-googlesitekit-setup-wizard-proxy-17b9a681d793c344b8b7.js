(window.__googlesitekit_webpackJsonp=window.__googlesitekit_webpackJsonp||[]).push([[3],{150:function(e,t,n){"use strict";(function(e){var r=n(6),a=n.n(r),i=n(7),o=n.n(i),c=n(8),s=n.n(c),l=n(9),u=n.n(l),d=n(3),f=n.n(d),p=n(1),h=n(2),m=n.n(h),g=n(18),y=n.n(g),v=n(28);function k(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=f()(e);if(t){var a=f()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return u()(this,n)}}var b=function(t){s()(LayoutHeader,t);var n=k(LayoutHeader);function LayoutHeader(){return a()(this,LayoutHeader),n.apply(this,arguments)}return o()(LayoutHeader,[{key:"render",value:function(){var t=this.props,n=t.title,r=t.ctaLabel,a=t.ctaLink;return e.createElement("header",{className:"googlesitekit-layout__header"},e.createElement("div",{className:"mdc-layout-grid"},e.createElement("div",{className:"mdc-layout-grid__inner"},n&&e.createElement("div",{className:y()("mdc-layout-grid__cell","mdc-layout-grid__cell--align-middle","mdc-layout-grid__cell--span-4-phone",{"mdc-layout-grid__cell--span-6-desktop":a,"mdc-layout-grid__cell--span-12-desktop":!a,"mdc-layout-grid__cell--span-8-tablet":!a})},e.createElement("h3",{className:"googlesitekit-subheading-1 googlesitekit-layout__header-title"},n)),a&&e.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--align-right-tablet "},e.createElement(v.a,{href:a,external:!0,inherit:!0},r)))))}}]),LayoutHeader}(p.a);b.propTypes={title:m.a.string,ctaLabel:m.a.string,ctaLink:m.a.string},b.defaultProps={title:"",ctaLabel:"",ctaLink:""},t.a=b}).call(this,n(12))},151:function(e,t,n){"use strict";(function(e){var r=n(6),a=n.n(r),i=n(7),o=n.n(i),c=n(8),s=n.n(c),l=n(9),u=n.n(l),d=n(3),f=n.n(d),p=n(1),h=n(2),m=n.n(h),g=n(80);function y(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=f()(e);if(t){var a=f()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return u()(this,n)}}var v=function(t){s()(LayoutFooter,t);var n=y(LayoutFooter);function LayoutFooter(){return a()(this,LayoutFooter),n.apply(this,arguments)}return o()(LayoutFooter,[{key:"render",value:function(){var t=this.props,n=t.ctaLabel,r=t.ctaLink,a=t.footerContent;return e.createElement("footer",{className:"googlesitekit-layout__footer"},e.createElement("div",{className:"mdc-layout-grid"},e.createElement("div",{className:"mdc-layout-grid__inner"},e.createElement("div",{className:"mdc-layout-grid__cell mdc-layout-grid__cell--span-12"},r&&n&&e.createElement(g.a,{className:"googlesitekit-data-block__source",name:n,href:r,external:!0}),a))))}}]),LayoutFooter}(p.a);v.propTypes={ctaLabel:m.a.string,ctaLink:m.a.string},t.a=v}).call(this,n(12))},165:function(e,t,n){"use strict";(function(e,r){var a=n(4),i=n.n(a),o=n(14),c=n.n(o),s=n(6),l=n.n(s),u=n(7),d=n.n(u),f=n(22),p=n.n(f),h=n(8),m=n.n(h),g=n(9),y=n.n(g),v=n(3),k=n.n(v),b=n(1),_=n(0),R=n(5),E=n(109),O=n(47),x=n(166),w=n(114);function L(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=k()(e);if(t){var a=k()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return y()(this,n)}}var C=function(t){m()(UserMenu,t);var n,a=L(UserMenu);function UserMenu(e){var t;return l()(this,UserMenu),(t=a.call(this,e)).state={dialogActive:!1,menuOpen:!1},t.handleMenu=t.handleMenu.bind(p()(t)),t.handleMenuClose=t.handleMenuClose.bind(p()(t)),t.handleMenuItemSelect=t.handleMenuItemSelect.bind(p()(t)),t.handleDialog=t.handleDialog.bind(p()(t)),t.handleDialogClose=t.handleDialogClose.bind(p()(t)),t.handleUnlinkConfirm=t.handleUnlinkConfirm.bind(p()(t)),t.menuButtonRef=Object(b.h)(),t.menuRef=Object(b.h)(),t}return d()(UserMenu,[{key:"componentDidMount",value:function(){e.addEventListener("mouseup",this.handleMenuClose),e.addEventListener("keyup",this.handleMenuClose),e.addEventListener("keyup",this.handleDialogClose)}},{key:"componentWillUnmount",value:function(){e.removeEventListener("mouseup",this.handleMenuClose),e.removeEventListener("keyup",this.handleMenuClose),e.removeEventListener("keyup",this.handleDialogClose)}},{key:"handleMenu",value:function(){var e=this.state.menuOpen;this.setState({menuOpen:!e})}},{key:"handleMenuClose",value:function(e){("keyup"!==e.type||27!==e.keyCode)&&"mouseup"!==e.type||this.menuButtonRef.current.buttonRef.current.contains(e.target)||this.menuRef.current.menuRef.current.contains(e.target)||this.setState({menuOpen:!1})}},{key:"handleMenuItemSelect",value:function(t,n){var r=e._googlesitekitLegacyData.admin.proxyPermissionsURL;if("keydown"===n.type&&(13===n.keyCode||32===n.keyCode)||"click"===n.type)switch(t){case 0:this.handleDialog();break;case 1:e.location.assign(r);break;default:this.handleMenu()}}},{key:"handleDialog",value:function(){this.setState((function(e){return{dialogActive:!e.dialogActive,menuOpen:!1}}))}},{key:"handleDialogClose",value:function(e){27===e.keyCode&&this.setState({dialogActive:!1,menuOpen:!1})}},{key:"handleUnlinkConfirm",value:(n=c()(i.a.mark((function e(){return i.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:this.setState({dialogActive:!1}),Object(R.d)(),document.location=Object(R.m)("googlesitekit-splash",{googlesitekit_context:"revoked"});case 3:case"end":return e.stop()}}),e,this)}))),function(){return n.apply(this,arguments)})},{key:"render",value:function(){var t=e._googlesitekitLegacyData.admin,n=t.userData,a=n.email,i=void 0===a?"":a,o=n.picture,c=void 0===o?"":o,s=t.proxyPermissionsURL,l=this.state,u=l.dialogActive,d=l.menuOpen;return r.createElement(b.b,null,r.createElement("div",{className:"googlesitekit-dropdown-menu mdc-menu-surface--anchor"},r.createElement(O.a,{ref:this.menuButtonRef,className:"googlesitekit-header__dropdown mdc-button--dropdown",text:!0,onClick:this.handleMenu,icon:c?r.createElement("i",{className:"mdc-button__icon","aria-hidden":"true"},r.createElement("img",{className:"mdc-button__icon--image",src:c,alt:Object(_.__)("User Avatar","google-site-kit")})):void 0,ariaHaspopup:"menu",ariaExpanded:d,ariaControls:"user-menu"},i),r.createElement(x.a,{ref:this.menuRef,menuOpen:d,menuItems:[Object(_.__)("Disconnect","google-site-kit")].concat(s?[Object(_.__)("Manage sites…","google-site-kit")]:[]),onSelected:this.handleMenuItemSelect,id:"user-menu"})),r.createElement(w.a,null,r.createElement(E.a,{dialogActive:u,handleConfirm:this.handleUnlinkConfirm,handleDialog:this.handleDialog,title:Object(_.__)("Disconnect","google-site-kit"),subtitle:Object(_.__)("Disconnecting Site Kit by Google will remove your access to all services. After disconnecting, you will need to re-authorize to restore service.","google-site-kit"),confirmButton:Object(_.__)("Disconnect","google-site-kit"),provides:[],danger:!0})))}}]),UserMenu}(b.a);t.a=C}).call(this,n(15),n(12))},166:function(e,t,n){"use strict";(function(e){var r=n(6),a=n.n(r),i=n(7),o=n.n(i),c=n(8),s=n.n(c),l=n(9),u=n.n(l),d=n(3),f=n.n(d),p=n(1),h=n(2),m=n.n(h),g=n(43);function y(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=f()(e);if(t){var a=f()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return u()(this,n)}}var v=function(t){s()(Menu,t);var n=y(Menu);function Menu(e){var t;return a()(this,Menu),(t=n.call(this,e)).menuRef=Object(p.h)(),t}return o()(Menu,[{key:"componentDidMount",value:function(){var e=this.props.menuOpen;this.menu=new g.f(this.menuRef.current),this.menu.open=e,this.menu.setDefaultFocusState(1)}},{key:"componentDidUpdate",value:function(e){var t=this.props.menuOpen;t!==e.menuOpen&&(this.menu.open=t)}},{key:"render",value:function(){var t=this.props,n=t.menuOpen,r=t.menuItems,a=t.onSelected,i=t.id;return e.createElement("div",{className:"mdc-menu mdc-menu-surface",ref:this.menuRef},e.createElement("ul",{id:i,className:"mdc-list",role:"menu","aria-hidden":!n,"aria-orientation":"vertical",tabIndex:"-1"},r.map((function(t,n){return e.createElement("li",{key:n,className:"mdc-list-item",role:"menuitem",onClick:a.bind(null,n),onKeyDown:a.bind(null,n)},e.createElement("span",{className:"mdc-list-item__text"},t))}))))}}]),Menu}(p.a);v.propTypes={menuOpen:m.a.bool.isRequired,menuItems:m.a.array.isRequired,id:m.a.string.isRequired},t.a=v}).call(this,n(12))},167:function(e,t,n){"use strict";var r=n(6),a=n.n(r),i=n(7),o=n.n(i),c=n(8),s=n.n(c),l=n(9),u=n.n(l),d=n(3),f=n.n(d),p=n(83);function h(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=f()(e);if(t){var a=f()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return u()(this,n)}}var m=function(e){s()(ErrorNotification,e);var t=h(ErrorNotification);function ErrorNotification(){return a()(this,ErrorNotification),t.apply(this,arguments)}return o()(ErrorNotification,[{key:"render",value:function(){return null}}]),ErrorNotification}(n(1).a);t.a=Object(p.a)("googlesitekit.ErrorNotification")(m)},208:function(e,t,n){"use strict";(function(e){n.d(t,"b",(function(){return E})),n.d(t,"a",(function(){return w})),n.d(t,"c",(function(){return L}));var r=n(4),a=n.n(r),i=n(10),o=n.n(i),c=n(14),s=n.n(c),l=n(19),u=n.n(l),d=n(246),f=n.n(d),p=n(63),h=n(45),m=n(162),g=n(234),y=n(214),v=n(215),k=n(216),b=n(32);function _(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function R(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?_(Object(n),!0).forEach((function(t){o()(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):_(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var E=function(){var t=s()(a.a.mark((function t(n){var r,i,o,c,l;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return r=e._googlesitekitLegacyData.admin,i=r.homeURL,o=r.ampMode,c={tagverify:1,timestamp:Date.now()},t.next=4,O(Object(h.a)(i,c),n);case 4:if((l=t.sent)||b.b!==o){t.next=9;break}return t.next=8,Object(p.default)({path:"/wp/v2/posts?per_page=1"}).then((function(e){return e.slice(0,1).map(function(){var e=s()(a.a.mark((function e(t){return a.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,O(Object(h.a)(t.link,R(R({},c),{},{amp:1})),n);case 2:return e.abrupt("return",e.sent);case 3:case"end":return e.stop()}}),e)})));return function(t){return e.apply(this,arguments)}}()).pop()}));case 8:l=t.sent;case 9:return t.abrupt("return",Promise.resolve(l||null));case 10:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}(),O=function(){var e=s()(a.a.mark((function e(t,n){var r;return a.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.prev=0,e.next=3,fetch(t,{credentials:"omit"}).then((function(e){return e.text()}));case 3:return r=e.sent,e.abrupt("return",x(r,n)||null);case 7:return e.prev=7,e.t0=e.catch(0),e.abrupt("return",null);case 10:case"end":return e.stop()}}),e,null,[[0,7]])})));return function(t,n){return e.apply(this,arguments)}}(),x=function(e,t){var n=({adsense:y.a,analytics:v.a,tagmanager:k.b,setup:g.a}[t]||[]).find((function(t){return t.test(e)}));return!!n&&n.exec(e)[1]},w=function(e,t){var n=t.find((function(t){return t.test(e)}));return!!n&&n.exec(e)[1]},L=f()(function(){var e=s()(a.a.mark((function e(t){var n,r,i,o;return a.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(n=t.homeURL,r=t.ampMode,u()(Object(m.a)(n),"homeURL must be valid URL"),i=[n],b.b!==r){e.next=14;break}return e.prev=4,e.next=7,Object(p.default)({path:"/wp/v2/posts?per_page=1"}).then((function(e){return e.slice(0,1).map((function(e){return Object(h.a)(e.link,{amp:1})})).pop()}));case 7:(o=e.sent)&&i.push(o),e.next=14;break;case 11:return e.prev=11,e.t0=e.catch(4),e.abrupt("return",i);case 14:return e.abrupt("return",i);case 15:case"end":return e.stop()}}),e,null,[[4,11]])})));return function(t){return e.apply(this,arguments)}}())}).call(this,n(15))},212:function(e,t,n){"use strict";t.a=[/<script[^>]*>[^>]+?www.googletagmanager.com\/gtm[^>]+?['|"](GTM-[0-9A-Z]+)['|"]/,/<script[^>]*src=['|"]https:\/\/www.googletagmanager.com\/gtm\.js\?id=(GTM-[0-9A-Z]+)['|"]/,/<script[^>]*src=['|"]https:\/\/www.googletagmanager.com\/ns.html\?id=(GTM-[0-9A-Z]+)['|"]/,/<amp-analytics [^>]*config=['|"]https:\/\/www.googletagmanager.com\/amp.json\?id=(GTM-[0-9A-Z]+)['|"]/]},214:function(e,t,n){"use strict";t.a=[/google_ad_client: ?["|'](.*?)["|']/,/<(?:script|amp-auto-ads) [^>]*data-ad-client="([^"]+)"/]},215:function(e,t,n){"use strict";t.a=[/<script [^>]*src=['|"]https:\/\/www.googletagmanager.com\/gtag\/js\?id=(UA-.*?)['|"][^>]*><\/script>/,/<script[^>]*>[^<]+google-analytics\.com\/analytics\.js[^<]+(UA-\d+-\d+)/,/__gaTracker\( ?['|"]create['|"], ?['|"](UA-.*?)['|"], ?['|"]auto['|"] ?\)/,/ga\( ?['|"]create['|"], ?['|"](UA-.*?)['|"], ?['|"]auto['|"] ?\)/,/_gaq.push\( ?\[ ?['|"]_setAccount['|"], ?['|"](UA-.*?)['|"] ?] ?\)/,/<amp-analytics [^>]*type="gtag"[^>]*>[^<]*<script type="application\/json">[^<]*"gtag_id":\s*"(UA-[^"]+)"/,/<amp-analytics [^>]*type="googleanalytics"[^>]*>[^<]*<script type="application\/json">[^<]*"account":\s*"(UA-[^"]+)"/]},216:function(e,t,n){"use strict";function r(e){return(parseInt(e,10)||0)>0}n.d(t,"a",(function(){return r})),n.d(t,"b",(function(){return a.a}));var a=n(212)},234:function(e,t,n){"use strict";t.a=[/<meta name="googlesitekit-setup" content="([a-z0-9-]+)"/]},268:function(e,t,n){"use strict";(function(e){var r=n(4),a=n.n(r),i=n(10),o=n.n(i),c=n(14),s=n.n(c),l=n(6),u=n.n(l),d=n(7),f=n.n(d),p=n(22),h=n.n(p),m=n(8),g=n.n(m),y=n(9),v=n.n(y),k=n(3),b=n.n(k),_=n(1),R=n(2),E=n.n(R),O=n(18),x=n.n(O),w=n(63),L=n(0),C=n(5),S=n(269),j=n(50);function D(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=b()(e);if(t){var a=b()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return v()(this,n)}}var N=function(t){g()(OptIn,t);var n,r=D(OptIn);function OptIn(e){var t;return u()(this,OptIn),(t=r.call(this,e)).state={optIn:Object(j.a)(),error:!1},t.handleOptIn=t.handleOptIn.bind(h()(t)),t}return f()(OptIn,[{key:"handleOptIn",value:(n=s()(a.a.mark((function e(t){var n,r;return a.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(n=!!t.target.checked,r=Object(C.i)("googlesitekit_tracking_optin"),Object(j.b)(n),!n){e.next=6;break}return e.next=6,Object(j.c)("tracking_plugin",this.props.optinAction);case 6:return e.prev=6,e.next=9,Object(w.default)({path:"/wp/v2/users/me",method:"POST",data:{meta:o()({},r,n)}});case 9:this.setState({optIn:n,error:!1}),e.next=15;break;case 12:e.prev=12,e.t0=e.catch(6),this.setState({optIn:!n,error:{errorCode:e.t0.code,errorMsg:e.t0.message}});case 15:case"end":return e.stop()}}),e,this,[[6,12]])}))),function(e){return n.apply(this,arguments)})},{key:"render",value:function(){var t=this.state,n=t.optIn,r=t.error,a=this.props,i=a.id,o=a.name,c=a.className,s=Object(L.sprintf)(
/* translators: %s: privacy policy URL */
Object(L.__)('Help us improve the Site Kit plugin by allowing tracking of anonymous usage stats. All data are treated in accordance with <a href="%s" target="_blank" rel="noopener noreferrer">Google Privacy Policy</a>',"google-site-kit"),"https://policies.google.com/privacy");return e.createElement("div",{className:x()("googlesitekit-opt-in",c)},e.createElement(S.a,{id:i,name:o,value:"1",checked:n,onChange:this.handleOptIn},e.createElement("span",{dangerouslySetInnerHTML:Object(C.t)(s,{ALLOWED_TAGS:["a"],ALLOWED_ATTR:["href","target","rel"]})})),r&&e.createElement("div",{className:"googlesitekit-error-text"},r.errorMsg))}}]),OptIn}(_.a);N.propTypes={id:E.a.string,name:E.a.string,className:E.a.string,optinAction:E.a.string},N.defaultProps={id:"googlesitekit-opt-in",name:"optIn"},t.a=N}).call(this,n(12))},269:function(e,t,n){"use strict";(function(e){var r=n(6),a=n.n(r),i=n(7),o=n.n(i),c=n(8),s=n.n(c),l=n(9),u=n.n(l),d=n(3),f=n.n(d),p=n(1),h=n(2),m=n.n(h),g=n(18),y=n.n(g),v=n(43);function k(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=f()(e);if(t){var a=f()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return u()(this,n)}}var b=function(t){s()(Checkbox,t);var n=k(Checkbox);function Checkbox(e){var t;return a()(this,Checkbox),(t=n.call(this,e)).formFieldRef=Object(p.h)(),t.checkboxRef=Object(p.h)(),t}return o()(Checkbox,[{key:"componentDidMount",value:function(){new v.e(this.formFieldRef.current).input=new v.c(this.checkboxRef.current)}},{key:"render",value:function(){var t=this.props,n=t.onChange,r=t.id,a=t.name,i=t.value,o=t.checked,c=t.disabled,s=t.children;return e.createElement("div",{className:"mdc-form-field",ref:this.formFieldRef},e.createElement("div",{className:y()("mdc-checkbox",{"mdc-checkbox--disabled":c}),ref:this.checkboxRef},e.createElement("input",{className:"mdc-checkbox__native-control",type:"checkbox",id:r,name:a,value:i,checked:o,disabled:c,onChange:n}),e.createElement("div",{className:"mdc-checkbox__background"},e.createElement("svg",{className:"mdc-checkbox__checkmark",viewBox:"0 0 24 24"},e.createElement("path",{className:"mdc-checkbox__checkmark-path",fill:"none",d:"M1.73,12.91 8.1,19.28 22.79,4.59"})),e.createElement("div",{className:"mdc-checkbox__mixedmark"}))),e.createElement("label",{htmlFor:r},s))}}]),Checkbox}(p.a);b.propTypes={onChange:m.a.func.isRequired,id:m.a.string.isRequired,name:m.a.string.isRequired,value:m.a.string.isRequired,checked:m.a.bool,disabled:m.a.bool,children:m.a.node.isRequired},b.defaultProps={checked:!1,disabled:!1},t.a=b}).call(this,n(12))},27:function(e,t,n){"use strict";(function(e){var r=n(6),a=n.n(r),i=n(7),o=n.n(i),c=n(8),s=n.n(c),l=n(9),u=n.n(l),d=n(3),f=n.n(d),p=n(1),h=n(2),m=n.n(h),g=n(18),y=n.n(g),v=n(150),k=n(151);function b(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=f()(e);if(t){var a=f()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return u()(this,n)}}var _=function(t){s()(Layout,t);var n=b(Layout);function Layout(){return a()(this,Layout),n.apply(this,arguments)}return o()(Layout,[{key:"render",value:function(){var t=this.props,n=t.header,r=t.footer,a=t.children,i=t.title,o=t.headerCtaLabel,c=t.headerCtaLink,s=t.footerCtaLabel,l=t.footerCtaLink,u=t.footerContent,d=t.className,f=t.fill,p=t.relative;return e.createElement("div",{className:y()("googlesitekit-layout",d,{"googlesitekit-layout--fill":f,"googlesitekit-layout--relative":p})},n&&e.createElement(v.a,{title:i,ctaLabel:o,ctaLink:c}),a,r&&e.createElement(k.a,{ctaLabel:s,ctaLink:l,footerContent:u}))}}]),Layout}(p.a);_.propTypes={header:m.a.bool,footer:m.a.bool,children:m.a.node.isRequired,title:m.a.string,headerCtaLabel:m.a.string,headerCtaLink:m.a.string,footerCtaLabel:m.a.string,footerCtaLink:m.a.string,footerContent:m.a.node,className:m.a.string,fill:m.a.bool,relative:m.a.bool},_.defaultProps={header:!1,footer:!1,title:"",headerCtaLabel:"",headerCtaLink:"",footerCtaLabel:"",footerCtaLink:"",footerContent:null,className:"",fill:!1,relative:!1},t.a=_}).call(this,n(12))},32:function(e,t,n){"use strict";n.d(t,"c",(function(){return r})),n.d(t,"a",(function(){return a})),n.d(t,"b",(function(){return i}));var r="core/site",a="primary",i="secondary"},370:function(e,t,n){"use strict";(function(e,r){n.d(t,"a",(function(){return M}));var a=n(44),i=n.n(a),o=n(6),c=n.n(o),s=n(7),l=n.n(s),u=n(8),d=n.n(u),f=n(9),p=n.n(f),h=n(3),m=n.n(h),g=n(4),y=n.n(g),v=n(14),k=n.n(v),b=n(1),_=n(0),R=n(2),E=n.n(R),O=n(119),x=n(49),w=n(208),L=n(17),C=n(28);function S(e,t){var n;if("undefined"==typeof Symbol||null==e[Symbol.iterator]){if(Array.isArray(e)||(n=function(e,t){if(!e)return;if("string"==typeof e)return j(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return j(e,t)}(e))||t&&e&&"number"==typeof e.length){n&&(e=n);var r=0,a=function(){};return{s:a,n:function(){return r>=e.length?{done:!0}:{done:!1,value:e[r++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var i,o=!0,c=!1;return{s:function(){n=e[Symbol.iterator]()},n:function(){var e=n.next();return o=e.done,e},e:function(e){c=!0,i=e},f:function(){try{o||null==n.return||n.return()}finally{if(c)throw i}}}}function j(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function D(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=m()(e);if(t){var a=m()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return p()(this,n)}}var N=[k()(y.a.mark((function t(){var n;return y.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(n=e.location.hostname,!["localhost","127.0.0.1"].includes(n)&&!n.match(/\.(example|invalid|localhost|test)$/)){t.next=3;break}throw"invalid_hostname";case 3:case"end":return t.stop()}}),t)}))),k()(y.a.mark((function e(){var t,n,r;return y.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,L.c.set(L.a,"site","setup-tag");case 2:return t=e.sent,n=t.token,e.next=6,Object(w.b)("setup").catch((function(){throw"tag_fetch_failed"}));case 6:if(r=e.sent,n===r){e.next=9;break}throw"setup_token_mismatch";case 9:case"end":return e.stop()}}),e)})))],M=function(t){d()(CompatibilityChecks,t);var n,a=D(CompatibilityChecks);function CompatibilityChecks(t){var n;c()(this,CompatibilityChecks);var r=e._googlesitekitLegacyData.setup.isSiteKitConnected;return(n=a.call(this,t)).state={complete:r,error:null,developerPlugin:{}},n}return l()(CompatibilityChecks,[{key:"componentDidMount",value:(n=k()(y.a.mark((function e(){var t,n,r,a;return y.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!this.state.complete){e.next=2;break}return e.abrupt("return");case 2:e.prev=2,t=S(N),e.prev=4,t.s();case 6:if((n=t.n()).done){e.next=12;break}return r=n.value,e.next=10,r();case 10:e.next=6;break;case 12:e.next=17;break;case 14:e.prev=14,e.t0=e.catch(4),t.e(e.t0);case 17:return e.prev=17,t.f(),e.finish(17);case 20:e.next=28;break;case 22:return e.prev=22,e.t1=e.catch(2),e.next=26,L.c.get(L.a,"site","developer-plugin");case 26:a=e.sent,this.setState({error:e.t1,developerPlugin:a});case 28:this.setState({complete:!0});case 29:case"end":return e.stop()}}),e,this,[[2,22],[4,14,17,20]])}))),function(){return n.apply(this,arguments)})},{key:"helperCTA",value:function(){var e=this.state.developerPlugin,t=e.installed,n=e.active,r=e.installURL,a=e.activateURL,i=e.configureURL;return!t&&r?{labelHTML:Object(_.__)('Install<span class="screen-reader-text"> the helper plugin</span>',"google-site-kit"),href:r,external:!1}:t&&!n&&a?{labelHTML:Object(_.__)('Activate<span class="screen-reader-text"> the helper plugin</span>',"google-site-kit"),href:a,external:!1}:t&&n&&i?{labelHTML:Object(_.__)('Configure<span class="screen-reader-text"> the helper plugin</span>',"google-site-kit"),href:i,external:!1}:{labelHTML:Object(_.__)('Learn how<span class="screen-reader-text"> to install and use the helper plugin</span>',"google-site-kit"),href:"https://sitekit.withgoogle.com/documentation/using-site-kit-on-a-staging-environment/",external:!0}}},{key:"renderError",value:function(e){var t=this.state.developerPlugin.installed,n=this.helperCTA(),a=n.labelHTML,i=n.href,o=n.external;switch(e){case"invalid_hostname":case"tag_fetch_failed":return r.createElement(b.b,null,!t&&Object(_.__)("Looks like this may be a staging environment. If so, you’ll need to install a helper plugin and verify your production site in Search Console.","google-site-kit"),t&&Object(_.__)("Looks like this may be a staging environment and you already have the helper plugin. Before you can use Site Kit, please make sure you’ve provided the necessary credentials in the Authentication section and verified your production site in Search Console.","google-site-kit")," ",r.createElement(C.a,{href:i,dangerouslySetInnerHTML:{__html:a},external:o,inherit:!0}));case"setup_token_mismatch":return Object(_.__)("Looks like you may be using a caching plugin which could interfere with setup. Please deactivate any caching plugins before setting up Site Kit. You may reactivate them once setup has been completed.","google-site-kit")}}},{key:"render",value:function(){var e,t,n=this.state,a=n.complete,o=n.error,c=this.props,s=c.children,l=i()(c,["children"]);return o&&(e=r.createElement(b.b,null,r.createElement("div",{className:"googlesitekit-setup-compat mdc-layout-grid mdc-layout-grid--align-left"},r.createElement("div",{className:"mdc-layout-grid__inner"},r.createElement(O.a,null),r.createElement("div",{className:"googlesitekit-heading-4 mdc-layout-grid__cell--span-11"},Object(_.__)("Your site may not be ready for Site Kit","google-site-kit"))),r.createElement("p",null,this.renderError(o))))),a||(t=r.createElement("div",{style:{alignSelf:"center",marginLeft:"1rem"}},r.createElement("small",null,Object(_.__)("Checking Compatibility…","google-site-kit")),r.createElement(x.a,{small:!0,compress:!0}))),s({restProps:l,complete:a,error:o,inProgressFeedback:t,CTAFeedback:e})}}]),CompatibilityChecks}(b.a);M.propTypes={children:E.a.func.isRequired}}).call(this,n(15),n(12))},371:function(e,t,n){"use strict";(function(e,r){n.d(t,"a",(function(){return S}));var a=n(4),i=n.n(a),o=n(14),c=n.n(o),s=n(6),l=n.n(s),u=n(7),d=n.n(u),f=n(22),p=n.n(f),h=n(8),m=n.n(h),g=n(9),y=n.n(g),v=n(3),k=n.n(v),b=n(1),_=n(0),R=n(45),E=n(5),O=n(17),x=n(109),w=n(28),L=n(114);function C(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=k()(e);if(t){var a=k()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return y()(this,n)}}var S=function(t){m()(ResetButton,t);var n,a=C(ResetButton);function ResetButton(t){var n;l()(this,ResetButton),n=a.call(this,t);var r=e._googlesitekitBaseData.splashURL;return n.state={dialogActive:!1,postResetURL:Object(R.a)(r,{notification:"reset_success"})},n.handleDialog=n.handleDialog.bind(p()(n)),n.handleUnlinkConfirm=n.handleUnlinkConfirm.bind(p()(n)),n.handleCloseModal=n.handleCloseModal.bind(p()(n)),n}return d()(ResetButton,[{key:"componentDidMount",value:function(){e.addEventListener("keyup",this.handleCloseModal,!1)}},{key:"componentWillUnmount",value:function(){e.removeEventListener("keyup",this.handleCloseModal)}},{key:"handleUnlinkConfirm",value:(n=c()(i.a.mark((function e(){return i.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,O.c.set(O.a,"site","reset");case 2:Object(E.d)(),this.handleDialog(),document.location=this.state.postResetURL;case 5:case"end":return e.stop()}}),e,this)}))),function(){return n.apply(this,arguments)})},{key:"handleCloseModal",value:function(e){27===e.keyCode&&this.setState({dialogActive:!1})}},{key:"handleDialog",value:function(){this.setState((function(e){return{dialogActive:!e.dialogActive}}))}},{key:"render",value:function(){var e=this,t=this.props.children,n=this.state.dialogActive;return r.createElement(b.b,null,r.createElement(w.a,{className:"googlesitekit-reset-button",onClick:function(){return e.setState({dialogActive:!0})},inherit:!0},t||Object(_.__)("Reset Site Kit","google-site-kit")),r.createElement(L.a,null,r.createElement(x.a,{dialogActive:n,handleConfirm:this.handleUnlinkConfirm,handleDialog:this.handleDialog,title:Object(_.__)("Reset Site Kit","google-site-kit"),subtitle:Object(_.__)("Resetting this site will remove access to all services. After disconnecting, you will need to re-authorize your access to restore service.","google-site-kit"),confirmButton:Object(_.__)("Reset","google-site-kit"),provides:[],danger:!0})))}}]),ResetButton}(b.a)}).call(this,n(15),n(12))},647:function(e,t,n){"use strict";n.r(t),function(e,r){var a=n(4),i=n.n(a),o=n(14),c=n.n(o),s=n(6),l=n.n(s),u=n(7),d=n.n(u),f=n(8),p=n.n(f),h=n(9),m=n.n(h),g=n(3),y=n.n(g),v=n(1),k=n(478),b=n.n(k),_=n(13),R=n(0),E=n(289),O=n(5),x=n(90),w=n(47),L=n(371),C=n(27),S=n(37),j=n(268),D=n(370);function N(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=y()(e);if(t){var a=y()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return m()(this,n)}}var M=function(t){p()(SetupUsingProxy,t);var n=N(SetupUsingProxy);function SetupUsingProxy(t){var r;l()(this,SetupUsingProxy),r=n.call(this,t);var a=e._googlesitekitLegacyData.admin,i=a.proxySetupURL,o=a.siteURL,c=e._googlesitekitLegacyData.setup,s=c.isSiteKitConnected,u=c.isResettable,d=c.errorMessage,f=e._googlesitekitLegacyData.permissions.canSetup;return r.state={canSetup:f,errorMessage:d,isSiteKitConnected:s,isResettable:u,completeSetup:!1,proxySetupURL:i,resetSuccess:"reset_success"===Object(E.a)(location.href,"notification"),context:Object(E.a)(location.href,"googlesitekit_context"),siteHostname:b.a.toUnicode(new URL(o).hostname)},r}return d()(SetupUsingProxy,[{key:"isSetupFinished",value:function(){var e=this.state,t=e.isSiteKitConnected,n=e.completeSetup;return t&&n}},{key:"render",value:function(){if(this.isSetupFinished()){var t=Object(O.m)("googlesitekit-dashboard",{notification:"authentication_success"});Object(_.delay)((function(){e.location.replace(t)}),500,"later")}var n,a,o,s=this.state,l=s.context,u=s.errorMessage,d=s.isResettable,f=s.proxySetupURL,p=s.resetSuccess,h=s.siteHostname,m=d;"revoked"===l?(n=Object(R.sprintf)(
/* translators: %s is the site's hostname. (e.g. example.com) */
Object(R.__)("You revoked access to Site Kit for %s","google-site-kit"),h),a=Object(R.__)('Site Kit will no longer have access to your account. If you’d like to reconnect Site Kit, click "Start Setup" below to generate new credentials.',"google-site-kit"),o=Object(R.__)("Sign in with Google","google-site-kit")):m?(n=Object(R.__)("Sign in with Google to configure Site Kit","google-site-kit"),a=Object(R.__)("To use Site Kit, sign in with your Google account. The Site Kit service will guide you through 3 simple steps to complete the connection and configure the plugin.","google-site-kit"),o=Object(R.__)("Sign in with Google","google-site-kit")):(n=Object(R.__)("Sign in with Google to set up Site Kit","google-site-kit"),a=Object(R.__)("The Site Kit service will guide you through 3 simple setup steps.","google-site-kit"),o=Object(R.__)("Start setup","google-site-kit"));var g=function(){var t=c()(i.a.mark((function t(n){return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return n.preventDefault(),t.next=3,Object(O.w)("plugin_setup","proxy_start_setup_landing_page");case 3:e.location.assign(f);case 4:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}();return r.createElement(v.b,null,r.createElement(x.a,null),u&&r.createElement(S.a,{id:"setup_error",type:"win-error",title:Object(R.__)("Oops! There was a problem during set up. Please try again.","google-site-kit"),description:u,isDismissable:!1}),p&&r.createElement(S.a,{id:"reset_success",title:Object(R.__)("Site Kit by Google was successfully reset.","google-site-kit"),isDismissable:!1}),r.createElement("div",{className:"googlesitekit-wizard"},r.createElement("div",{className:"mdc-layout-grid"},r.createElement("div",{className:"mdc-layout-grid__inner"},r.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-12 "},r.createElement(C.a,null,r.createElement("section",{className:"googlesitekit-wizard-progress"},r.createElement("div",{className:"googlesitekit-setup__footer"},r.createElement("div",{className:"mdc-layout-grid"},r.createElement("div",{className:"mdc-layout-grid__inner"},r.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-12 "},r.createElement("h1",{className:"googlesitekit-setup__title"},n),r.createElement("p",{className:"googlesitekit-setup__description"},a),r.createElement(D.a,null,(function(e){var t=e.complete,n=e.inProgressFeedback,a=e.CTAFeedback;return r.createElement(v.b,null,a,r.createElement(j.a,{optinAction:"analytics_optin_setup_fallback"}),r.createElement("div",{className:"googlesitekit-start-setup-wrap"},r.createElement(w.a,{className:"googlesitekit-start-setup",href:f,onClick:g,disabled:!t},o),n,d&&r.createElement(L.a,null)))})))))))))))))}}]),SetupUsingProxy}(v.a);t.default=M}.call(this,n(15),n(12))},90:function(e,t,n){"use strict";(function(e,r){var a=n(6),i=n.n(a),o=n(7),c=n.n(o),s=n(8),l=n.n(s),u=n(9),d=n.n(u),f=n(3),p=n.n(f),h=n(1),m=n(135),g=n(165),y=n(167);function v(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=p()(e);if(t){var a=p()(this).constructor;n=Reflect.construct(r,arguments,a)}else n=r.apply(this,arguments);return d()(this,n)}}var k=function(t){l()(Header,t);var n=v(Header);function Header(){return i()(this,Header),n.apply(this,arguments)}return c()(Header,[{key:"render",value:function(){var t=e._googlesitekitLegacyData.setup.isAuthenticated;return r.createElement(h.b,null,r.createElement("header",{className:"googlesitekit-header"},r.createElement("section",{className:"mdc-layout-grid"},r.createElement("div",{className:"mdc-layout-grid__inner"},r.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--span-3-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},r.createElement(m.a,null)),r.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--align-right-phone mdc-layout-grid__cell--span-1-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},t&&r.createElement(g.a,null))))),r.createElement(y.a,null))}}]),Header}(h.a);t.a=k}).call(this,n(15),n(12))}}]);