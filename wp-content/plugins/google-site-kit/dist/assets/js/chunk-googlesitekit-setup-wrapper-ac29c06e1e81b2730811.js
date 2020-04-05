(window.webpackJsonp=window.webpackJsonp||[]).push([[5,20],{149:function(e,t,n){"use strict";(function(e){var o=n(5),i=n.n(o),r=n(6),a=n.n(r),c=n(7),u=n.n(c),s=n(8),l=n.n(s),d=n(9),m=n.n(d),p=n(2),f=n.n(p),h=n(33),v=n(19),g=n(25),y=n(190),b=n.n(y),_=n(14),k=n.n(_),E=n(247),O=n(1),N=n(0),D=function(t){function Dialog(){var e;return i()(this,Dialog),(e=u()(this,l()(Dialog).call(this))).state={attributes:[Object(N.__)("Audience overview","google-site-kit"),Object(N.__)("Top pages","google-site-kit"),Object(N.__)("Top acquisition sources","google-site-kit"),Object(N.__)("AdSense & Analytics metrics for top pages","google-site-kit")]},e.dialogRef=Object(O.createRef)(),e}return m()(Dialog,t),a()(Dialog,[{key:"componentDidMount",value:function(){new g.d(this.dialogRef.current)}},{key:"render",value:function(){var t=this.props,n=t.dialogActive,o=t.handleDialog,i=t.title,r=t.provides,a=t.handleConfirm,c=t.subtitle,u=t.confirmButton,s=t.dependentModules,l=t.instanceId,d="googlesitekit-dialog-label-".concat(l),m="googlesitekit-dialog-description-".concat(l),p=!(!r||!r.length);return e.createElement("div",{ref:this.dialogRef,className:k()("mdc-dialog",{"mdc-dialog--open":n}),role:"alertdialog","aria-modal":"true","aria-labelledby":i?d:void 0,"aria-describedby":p?m:void 0,"aria-hidden":n?"false":"true",tabIndex:"-1"},e.createElement("div",{className:"mdc-dialog__scrim"}," "),e.createElement(b.a,{active:n},e.createElement("div",null,e.createElement("div",{className:"mdc-dialog__container"},e.createElement("div",{className:"mdc-dialog__surface"},i&&e.createElement("h2",{id:d,className:"mdc-dialog__title"},i),c&&e.createElement("p",{className:"mdc-dialog__lead"},c),p&&e.createElement("section",{id:m,className:"mdc-dialog__content"},e.createElement("ul",{className:"mdc-list mdc-list--underlined mdc-list--non-interactive"},r.map((function(t){return e.createElement("li",{className:"mdc-list-item",key:t},e.createElement("span",{className:"mdc-list-item__text"},t))})))),s&&e.createElement("p",{className:"mdc-dialog__dependecies"},e.createElement("strong",null,Object(N.__)("Note: ","google-site-kit")),s),e.createElement("footer",{className:"mdc-dialog__actions"},e.createElement(h.a,{onClick:a,danger:!0},u||Object(N.__)("Disconnect","google-site-kit")),e.createElement(v.a,{className:"mdc-dialog__cancel-button",onClick:function(){return o()},inherit:!0},Object(N.__)("Cancel","google-site-kit"))))))))}}]),Dialog}(O.Component);D.propTypes={dialogActive:f.a.bool,handleDialog:f.a.func,handleConfirm:f.a.func.isRequired,title:f.a.string,description:f.a.string,confirmButton:f.a.string},D.defaultProps={dialogActive:!1,handleDialog:null,title:null,description:null,confirmButton:null},t.a=Object(E.a)(D)}).call(this,n(1))},159:function(e,t,n){"use strict";n.d(t,"a",(function(){return h}));var o=n(5),i=n.n(o),r=n(6),a=n.n(r),c=n(7),u=n.n(c),s=n(8),l=n.n(s),d=n(9),m=n.n(d),p=n(80),f=n(1),h=function(e){function Modal(e){var t;return i()(this,Modal),(t=u()(this,l()(Modal).call(this,e))).el=document.createElement("div"),t.root=document.querySelector(".googlesitekit-plugin")||document.body,t}return m()(Modal,e),a()(Modal,[{key:"componentDidMount",value:function(){this.root.appendChild(this.el)}},{key:"componentWillUnmount",value:function(){this.root.removeChild(this.el)}},{key:"render",value:function(){return Object(p.createPortal)(this.props.children,this.el)}}]),Modal}(f.Component)},190:function(e,t,n){"use strict";var o=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}();var i=n(1),r=n(80),a=n(252),c=function(e){function FocusTrap(e){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,FocusTrap);var t=function(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}(this,(FocusTrap.__proto__||Object.getPrototypeOf(FocusTrap)).call(this,e));return t.setFocusTrapElement=function(e){t.focusTrapElement=e},"undefined"!=typeof document&&(t.previouslyFocusedElement=document.activeElement),t}return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}(FocusTrap,e),o(FocusTrap,[{key:"componentDidMount",value:function(){var e=this.props.focusTrapOptions,t={returnFocusOnDeactivate:!1};for(var n in e)e.hasOwnProperty(n)&&"returnFocusOnDeactivate"!==n&&(t[n]=e[n]);var o=r.findDOMNode(this.focusTrapElement);this.focusTrap=this.props._createFocusTrap(o,t),this.props.active&&this.focusTrap.activate(),this.props.paused&&this.focusTrap.pause()}},{key:"componentDidUpdate",value:function(e){if(e.active&&!this.props.active){var t={returnFocus:this.props.focusTrapOptions.returnFocusOnDeactivate||!1};this.focusTrap.deactivate(t)}else!e.active&&this.props.active&&this.focusTrap.activate();e.paused&&!this.props.paused?this.focusTrap.unpause():!e.paused&&this.props.paused&&this.focusTrap.pause()}},{key:"componentWillUnmount",value:function(){this.focusTrap.deactivate(),!1!==this.props.focusTrapOptions.returnFocusOnDeactivate&&this.previouslyFocusedElement&&this.previouslyFocusedElement.focus&&this.previouslyFocusedElement.focus()}},{key:"render",value:function(){var e=this,t=i.Children.only(this.props.children);return i.cloneElement(t,{ref:function(n){e.setFocusTrapElement(n),"function"==typeof t.ref&&t.ref(n)}})}}]),FocusTrap}(i.Component);c.defaultProps={active:!0,paused:!1,focusTrapOptions:{},_createFocusTrap:a},e.exports=c},191:function(e,t,n){"use strict";var o=n(5),i=n.n(o),r=n(6),a=n.n(r),c=n(7),u=n.n(c),s=n(8),l=n.n(s),d=n(9),m=n.n(d),p=n(60),f=n(1),h=function(e){function ErrorNotification(){return i()(this,ErrorNotification),u()(this,l()(ErrorNotification).apply(this,arguments))}return m()(ErrorNotification,e),a()(ErrorNotification,[{key:"render",value:function(){return null}}]),ErrorNotification}(f.Component);t.a=Object(p.a)("googlesitekit.ErrorNotification")(h)},192:function(e,t,n){"use strict";(function(e,o){var i=n(11),r=n.n(i),a=n(5),c=n.n(a),u=n(6),s=n.n(u),l=n(7),d=n.n(l),m=n(8),p=n.n(m),f=n(16),h=n.n(f),v=n(9),g=n.n(v),y=n(149),b=n(33),_=n(193),k=n(159),E=n(3),O=n(1),N=n(0),D=function(t){function UserMenu(e){var t;return c()(this,UserMenu),(t=d()(this,p()(UserMenu).call(this,e))).state={dialogActive:!1,menuOpen:!1},t.handleMenu=t.handleMenu.bind(h()(t)),t.handleMenuClose=t.handleMenuClose.bind(h()(t)),t.handleMenuItemSelect=t.handleMenuItemSelect.bind(h()(t)),t.handleDialog=t.handleDialog.bind(h()(t)),t.handleDialogClose=t.handleDialogClose.bind(h()(t)),t.handleUnlinkConfirm=t.handleUnlinkConfirm.bind(h()(t)),t.menuButtonRef=Object(O.createRef)(),t.menuRef=Object(O.createRef)(),t}return g()(UserMenu,t),s()(UserMenu,[{key:"componentDidMount",value:function(){e.addEventListener("mouseup",this.handleMenuClose),e.addEventListener("keyup",this.handleMenuClose),e.addEventListener("keyup",this.handleDialogClose)}},{key:"componentWillUnmount",value:function(){e.removeEventListener("mouseup",this.handleMenuClose),e.removeEventListener("keyup",this.handleMenuClose),e.removeEventListener("keyup",this.handleDialogClose)}},{key:"handleMenu",value:function(){var e=this.state.menuOpen;this.setState({menuOpen:!e})}},{key:"handleMenuClose",value:function(e){("keyup"!==e.type||27!==e.keyCode)&&"mouseup"!==e.type||this.menuButtonRef.current.buttonRef.current.contains(e.target)||this.menuRef.current.menuRef.current.contains(e.target)||this.setState({menuOpen:!1})}},{key:"handleMenuItemSelect",value:function(t,n){var o=e.googlesitekit.admin.proxyPermissionsURL;if("keydown"===n.type&&(13===n.keyCode||32===n.keyCode)||"click"===n.type)switch(t){case 0:this.handleDialog();break;case 1:e.location.assign(o);break;default:this.handleMenu()}}},{key:"handleDialog",value:function(){this.setState((function(e){return{dialogActive:!e.dialogActive,menuOpen:!1}}))}},{key:"handleDialogClose",value:function(e){27===e.keyCode&&this.setState({dialogActive:!1,menuOpen:!1})}},{key:"handleUnlinkConfirm",value:function(){return r.a.async((function(e){for(;;)switch(e.prev=e.next){case 0:this.setState({dialogActive:!1}),Object(E.c)(),document.location=Object(E.n)("googlesitekit-splash",{googlesitekit_context:"revoked"});case 3:case"end":return e.stop()}}),null,this)}},{key:"render",value:function(){var t=e.googlesitekit.admin,n=t.userData,i=n.email,r=void 0===i?"":i,a=n.picture,c=void 0===a?"":a,u=t.proxyPermissionsURL,s=this.state,l=s.dialogActive,d=s.menuOpen;return o.createElement(O.Fragment,null,o.createElement("div",{className:"googlesitekit-dropdown-menu mdc-menu-surface--anchor"},o.createElement(b.a,{ref:this.menuButtonRef,className:"googlesitekit-header__dropdown mdc-button--dropdown",text:!0,onClick:this.handleMenu,icon:c?o.createElement("i",{className:"mdc-button__icon","aria-hidden":"true"},o.createElement("img",{className:"mdc-button__icon--image",src:c,alt:Object(N.__)("User Avatar","google-site-kit")})):void 0,ariaHaspopup:"menu",ariaExpanded:d,ariaControls:"user-menu"},r),o.createElement(_.a,{ref:this.menuRef,menuOpen:d,menuItems:[Object(N.__)("Disconnect","google-site-kit")].concat(u?[Object(N.__)("Manage sites...","google-site-kit")]:[]),onSelected:this.handleMenuItemSelect,id:"user-menu"})),o.createElement(k.a,null,o.createElement(y.a,{dialogActive:l,handleConfirm:this.handleUnlinkConfirm,handleDialog:this.handleDialog,title:Object(N.__)("Disconnect","google-site-kit"),subtitle:Object(N.__)("Disconnecting Site Kit by Google will remove your access to all services. After disconnecting, you will need to re-authorize to restore service.","google-site-kit"),confirmButton:Object(N.__)("Disconnect","google-site-kit"),provides:[]})))}}]),UserMenu}(O.Component);t.a=D}).call(this,n(15),n(1))},193:function(e,t,n){"use strict";(function(e){var o=n(5),i=n.n(o),r=n(6),a=n.n(r),c=n(7),u=n.n(c),s=n(8),l=n.n(s),d=n(9),m=n.n(d),p=n(25),f=n(2),h=n.n(f),v=n(1),g=function(t){function Menu(e){var t;return i()(this,Menu),(t=u()(this,l()(Menu).call(this,e))).menuRef=Object(v.createRef)(),t}return m()(Menu,t),a()(Menu,[{key:"componentDidMount",value:function(){var e=this.props.menuOpen;this.menu=new p.f(this.menuRef.current),this.menu.open=e,this.menu.setDefaultFocusState(1)}},{key:"componentDidUpdate",value:function(e){var t=this.props.menuOpen;t!==e.menuOpen&&(this.menu.open=t)}},{key:"render",value:function(){var t=this.props,n=t.menuOpen,o=t.menuItems,i=t.onSelected,r=t.id;return e.createElement("div",{className:"mdc-menu mdc-menu-surface",ref:this.menuRef},e.createElement("ul",{id:r,className:"mdc-list",role:"menu","aria-hidden":!n,"aria-orientation":"vertical",tabIndex:"-1"},o.map((function(t,n){return e.createElement("li",{key:n,className:"mdc-list-item",role:"menuitem",onClick:i.bind(null,n),onKeyDown:i.bind(null,n)},e.createElement("span",{className:"mdc-list-item__text"},t))}))))}}]),Menu}(v.Component);g.propTypes={menuOpen:h.a.bool.isRequired,menuItems:h.a.array.isRequired,id:h.a.string.isRequired},t.a=g}).call(this,n(1))},247:function(e,t,n){"use strict";function o(){return(o=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e}).apply(this,arguments)}function i(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}function r(e){return(r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function a(e,t){return!t||"object"!==r(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function c(e){return(c=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function u(e,t){return(u=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}var s=n(1),l=n(13);var d=function(e,t){return function(n){var o=e(n),i=n.displayName,r=void 0===i?n.name||"Component":i;return o.displayName="".concat(Object(l.upperFirst)(Object(l.camelCase)(t)),"(").concat(r,")"),o}};t.a=d((function(e){var t=0;return(function(n){function r(){var e;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,r),(e=a(this,c(r).apply(this,arguments))).instanceId=t++,e}var l,d,m;return function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&u(e,t)}(r,n),l=r,(d=[{key:"render",value:function(){return Object(s.createElement)(e,o({},this.props,{instanceId:this.instanceId}))}}])&&i(l.prototype,d),m&&i(l,m),r}(s.Component))}),"withInstanceId")},252:function(e,t,n){var o=n(253),i=n(136),r=null;function a(e){return setTimeout(e,0)}e.exports=function(e,t){var n=document,c="string"==typeof e?n.querySelector(e):e,u=i({returnFocusOnDeactivate:!0,escapeDeactivates:!0},t),s={firstTabbableNode:null,lastTabbableNode:null,nodeFocusedBeforeActivation:null,mostRecentlyFocusedNode:null,active:!1,paused:!1},l={activate:function(e){if(s.active)return;_(),s.active=!0,s.paused=!1,s.nodeFocusedBeforeActivation=n.activeElement;var t=e&&e.onActivate?e.onActivate:u.onActivate;t&&t();return m(),l},deactivate:d,pause:function(){if(s.paused||!s.active)return;s.paused=!0,p()},unpause:function(){if(!s.paused||!s.active)return;s.paused=!1,m()}};return l;function d(e){if(s.active){p(),s.active=!1,s.paused=!1;var t=e&&void 0!==e.onDeactivate?e.onDeactivate:u.onDeactivate;return t&&t(),(e&&void 0!==e.returnFocus?e.returnFocus:u.returnFocusOnDeactivate)&&a((function(){k(s.nodeFocusedBeforeActivation)})),l}}function m(){if(s.active)return r&&r.pause(),r=l,_(),a((function(){k(h())})),n.addEventListener("focusin",g,!0),n.addEventListener("mousedown",v,!0),n.addEventListener("touchstart",v,!0),n.addEventListener("click",b,!0),n.addEventListener("keydown",y,!0),l}function p(){if(s.active&&r===l)return n.removeEventListener("focusin",g,!0),n.removeEventListener("mousedown",v,!0),n.removeEventListener("touchstart",v,!0),n.removeEventListener("click",b,!0),n.removeEventListener("keydown",y,!0),r=null,l}function f(e){var t=u[e],o=t;if(!t)return null;if("string"==typeof t&&!(o=n.querySelector(t)))throw new Error("`"+e+"` refers to no known node");if("function"==typeof t&&!(o=t()))throw new Error("`"+e+"` did not return a node");return o}function h(){var e;if(!(e=null!==f("initialFocus")?f("initialFocus"):c.contains(n.activeElement)?n.activeElement:s.firstTabbableNode||f("fallbackFocus")))throw new Error("You can't have a focus-trap without at least one focusable element");return e}function v(e){c.contains(e.target)||(u.clickOutsideDeactivates?d({returnFocus:!o.isFocusable(e.target)}):e.preventDefault())}function g(e){c.contains(e.target)||e.target instanceof Document||(e.stopImmediatePropagation(),k(s.mostRecentlyFocusedNode||h()))}function y(e){if(!1!==u.escapeDeactivates&&function(e){return"Escape"===e.key||"Esc"===e.key||27===e.keyCode}(e))return e.preventDefault(),void d();(function(e){return"Tab"===e.key||9===e.keyCode})(e)&&function(e){if(_(),e.shiftKey&&e.target===s.firstTabbableNode)return e.preventDefault(),void k(s.lastTabbableNode);if(!e.shiftKey&&e.target===s.lastTabbableNode)e.preventDefault(),k(s.firstTabbableNode)}(e)}function b(e){u.clickOutsideDeactivates||c.contains(e.target)||(e.preventDefault(),e.stopImmediatePropagation())}function _(){var e=o(c);s.firstTabbableNode=e[0]||h(),s.lastTabbableNode=e[e.length-1]||h()}function k(e){e!==n.activeElement&&(e&&e.focus?(e.focus(),s.mostRecentlyFocusedNode=e,function(e){return e.tagName&&"input"===e.tagName.toLowerCase()&&"function"==typeof e.select}(e)&&e.select()):k(h()))}}},253:function(e,t){var n=["input","select","textarea","a[href]","button","[tabindex]","audio[controls]","video[controls]",'[contenteditable]:not([contenteditable="false"])'],o=n.join(","),i="undefined"==typeof Element?function(){}:Element.prototype.matches||Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector;function r(e,t){t=t||{};var n,r,c,u=[],d=[],m=new UntouchabilityChecker(e.ownerDocument||e),p=e.querySelectorAll(o);for(t.includeContainer&&i.call(e,o)&&(p=Array.prototype.slice.apply(p)).unshift(e),n=0;n<p.length;n++)a(r=p[n],m)&&(0===(c=s(r))?u.push(r):d.push({documentOrder:n,tabIndex:c,node:r}));return d.sort(l).map((function(e){return e.node})).concat(u)}function a(e,t){return!(!c(e,t)||function(e){return function(e){return d(e)&&"radio"===e.type}(e)&&!function(e){if(!e.name)return!0;var t=function(e){for(var t=0;t<e.length;t++)if(e[t].checked)return e[t]}(e.ownerDocument.querySelectorAll('input[type="radio"][name="'+e.name+'"]'));return!t||t===e}(e)}(e)||s(e)<0)}function c(e,t){return t=t||new UntouchabilityChecker(e.ownerDocument||e),!(e.disabled||function(e){return d(e)&&"hidden"===e.type}(e)||t.isUntouchable(e))}r.isTabbable=function(e,t){if(!e)throw new Error("No node provided");return!1!==i.call(e,o)&&a(e,t)},r.isFocusable=function(e,t){if(!e)throw new Error("No node provided");return!1!==i.call(e,u)&&c(e,t)};var u=n.concat("iframe").join(",");function s(e){var t=parseInt(e.getAttribute("tabindex"),10);return isNaN(t)?function(e){return"true"===e.contentEditable}(e)?0:e.tabIndex:t}function l(e,t){return e.tabIndex===t.tabIndex?e.documentOrder-t.documentOrder:e.tabIndex-t.tabIndex}function d(e){return"INPUT"===e.tagName}function UntouchabilityChecker(e){this.doc=e,this.cache=[]}UntouchabilityChecker.prototype.hasDisplayNone=function(e,t){if(e===this.doc.documentElement)return!1;var n=function(e,t){for(var n=0,o=e.length;n<o;n++)if(t(e[n]))return e[n]}(this.cache,(function(t){return t===e}));if(n)return n[1];var o=!1;return"none"===(t=t||this.doc.defaultView.getComputedStyle(e)).display?o=!0:e.parentNode&&(o=this.hasDisplayNone(e.parentNode)),this.cache.push([e,o]),o},UntouchabilityChecker.prototype.isUntouchable=function(e){if(e===this.doc.documentElement)return!1;var t=this.doc.defaultView.getComputedStyle(e);return!!this.hasDisplayNone(e,t)||"hidden"===t.visibility},e.exports=r},281:function(e,t,n){"use strict";n.r(t),function(e,o){var i=n(16),r=n.n(i),a=n(5),c=n.n(a),u=n(6),s=n.n(u),l=n(7),d=n.n(l),m=n(8),p=n.n(m),f=n(9),h=n.n(f),v=n(13),g=n(66),y=n(19),b=n(65),_=n(3),k=n(60),E=n(1),O=n(0),N=n(12),D=function(t){function BaseComponent(){return c()(this,BaseComponent),d()(this,p()(BaseComponent).apply(this,arguments))}return h()(BaseComponent,t),s()(BaseComponent,[{key:"render",value:function(){var t=this.props.children;return e.createElement(E.Fragment,null,t)}}]),BaseComponent}(E.Component),C=function(t){function SetupWrapper(e){var t;c()(this,SetupWrapper),t=d()(this,p()(SetupWrapper).call(this,e));var n=o.googlesitekit.setup.moduleToSetup;return t.state={currentModule:n,refresh:!1},t.timeoutID=null,t.unfocusedTime=0,t.autoRefreshModules=Object(N.c)("googlesitekit.autoRefreshModules",[]),t.moduleRefresh=t.autoRefreshModules.find((function(e){return t.state.currentModule===e.identifier})),t.refreshStatus=t.refreshStatus.bind(r()(t)),t.startUnfocusedTimer=t.startUnfocusedTimer.bind(r()(t)),t}return h()(SetupWrapper,t),s()(SetupWrapper,[{key:"componentDidMount",value:function(){o.addEventListener("focus",this.refreshStatus),o.addEventListener("blur",this.startUnfocusedTimer)}},{key:"componentWillUnmount",value:function(){o.removeEventListener("focus",this.refreshStatus),o.removeEventListener("blur",this.startUnfocusedTimer)}},{key:"startUnfocusedTimer",value:function(){var e=this;if(this.moduleRefresh){var t=!0;this.moduleRefresh.toRefresh&&(t=this.moduleRefresh.toRefresh()),t&&(this.timeoutID=o.setInterval((function(){e.unfocusedTime++}),1e3))}}},{key:"refreshStatus",value:function(){if(this.moduleRefresh){var e=this.moduleRefresh.idleTime||15,t=!0;this.moduleRefresh.toRefresh&&(t=this.moduleRefresh.toRefresh()),t&&(e<this.unfocusedTime&&this.setState({refresh:this.timeoutID}),o.clearTimeout(this.timeoutID),this.unfocusedTime=0,this.timeoutID=null)}}},{key:"render",value:function(){var t=this.state.currentModule,n=SetupWrapper.loadSetupModule(t),o=Object(_.n)("googlesitekit-settings",{});return e.createElement(E.Fragment,null,e.createElement(g.a,null),e.createElement("div",{className:"googlesitekit-setup"},e.createElement("div",{className:"mdc-layout-grid"},e.createElement("div",{className:"mdc-layout-grid__inner"},e.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-12 "},e.createElement("section",{className:"googlesitekit-setup__wrapper"},e.createElement("div",{className:"mdc-layout-grid"},e.createElement("div",{className:"mdc-layout-grid__inner"},e.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-12 "},e.createElement("p",{className:" googlesitekit-setup__intro-title googlesitekit-overline "},Object(O.__)("Connect Service","google-site-kit")),n))),e.createElement("div",{className:"googlesitekit-setup__footer"},e.createElement("div",{className:"mdc-layout-grid"},e.createElement("div",{className:"mdc-layout-grid__inner"},e.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-2-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},e.createElement(y.a,{id:"setup-".concat(t,"-cancel"),href:o},Object(O.__)("Cancel","google-site-kit"))),e.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-2-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--align-right "},e.createElement(b.a,null)))))))))))}}],[{key:"loadSetupModule",value:function(t){var n=Object(k.a)("googlesitekit.ModuleSetup-".concat(t))(D);return e.createElement(n,{finishSetup:SetupWrapper.finishSetup,onSettingsPage:!1,isEditing:!0})}},{key:"finishSetup",value:function(){var e={notification:"authentication_success"};o.googlesitekit.setup&&o.googlesitekit.setup.moduleToSetup&&(e.slug=o.googlesitekit.setup.moduleToSetup);var t=Object(_.n)("googlesitekit-dashboard",e);Object(v.delay)((function(){o.location.replace(t)}),500,"later")}}]),SetupWrapper}(E.Component);t.default=C}.call(this,n(1),n(15))},65:function(e,t,n){"use strict";(function(e){var o=n(0),i=n(19);t.a=function HelpLink(){var t=Object(o.__)("Need help?","google-site-kit");return e.createElement(i.a,{className:"googlesitekit-help-link",href:"https://sitekit.withgoogle.com/documentation/",external:!0},t)}}).call(this,n(1))},66:function(e,t,n){"use strict";(function(e,o){var i=n(5),r=n.n(i),a=n(6),c=n.n(a),u=n(7),s=n.n(u),l=n(8),d=n.n(l),m=n(9),p=n.n(m),f=n(191),h=n(137),v=n(192),g=n(1),y=function(t){function Header(){return r()(this,Header),s()(this,d()(Header).apply(this,arguments))}return p()(Header,t),c()(Header,[{key:"render",value:function(){var t=e.googlesitekit.setup.isAuthenticated;return o.createElement(g.Fragment,null,o.createElement("header",{className:"googlesitekit-header"},o.createElement("section",{className:"mdc-layout-grid"},o.createElement("div",{className:"mdc-layout-grid__inner"},o.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--span-3-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},o.createElement(h.a,null)),o.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--align-right-phone mdc-layout-grid__cell--span-1-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},t&&o.createElement(v.a,null))))),o.createElement(f.a,null))}}]),Header}(g.Component);t.a=y}).call(this,n(15),n(1))}}]);