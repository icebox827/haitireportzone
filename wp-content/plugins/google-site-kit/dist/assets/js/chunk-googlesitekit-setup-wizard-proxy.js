(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{143:function(e,t,n){"use strict";var a=n(3),i=n.n(a),o=n(4),c=n.n(o),l=n(5),r=n.n(l),s=n(6),d=n.n(s),u=n(13),m=n.n(u),g=n(7),h=n.n(g),p=n(1),f=n(22),k=n(8),_=n.n(k),v=function(e){function t(e){var n;return i()(this,t),(n=r()(this,d()(t).call(this,e))).formFieldRef=Object(p.createRef)(),n.checkboxRef=Object(p.createRef)(),n}return h()(t,e),c()(t,[{key:"componentDidMount",value:function(){new f.e(this.formFieldRef.current).input=new f.c(this.checkboxRef.current)}},{key:"render",value:function(){var e=this.props,t=e.onChange,n=e.id,a=e.name,i=e.value,o=e.checked,c=e.disabled,l=e.children;return React.createElement("div",{className:"mdc-form-field",ref:this.formFieldRef},React.createElement("div",{className:"\n\t\t\t\t\t\tmdc-checkbox\n\t\t\t\t\t\t".concat(c?"mdc-checkbox--disabled":"","\n\t\t\t\t\t"),ref:this.checkboxRef},React.createElement("input",{className:"mdc-checkbox__native-control",type:"checkbox",id:n,name:a,value:i,checked:o,disabled:c,onChange:t}),React.createElement("div",{className:"mdc-checkbox__background"},React.createElement("svg",{className:"mdc-checkbox__checkmark",viewBox:"0 0 24 24"},React.createElement("path",{className:"mdc-checkbox__checkmark-path",fill:"none",d:"M1.73,12.91 8.1,19.28 22.79,4.59"})),React.createElement("div",{className:"mdc-checkbox__mixedmark"}))),React.createElement("label",{htmlFor:n},l))}}]),t}(p.Component);v.propTypes={onChange:_.a.func.isRequired,id:_.a.string.isRequired,name:_.a.string.isRequired,value:_.a.string.isRequired,checked:_.a.bool,disabled:_.a.bool,children:_.a.node.isRequired},v.defaultProps={checked:!1,disabled:!1};var y=v,R=n(35),b=n.n(R),E=n(0),C=function(e){function t(e){var n;return i()(this,t),(n=r()(this,d()(t).call(this,e))).state={scriptOnPage:!!googlesitekit.admin.trackingOptin,optIn:!!googlesitekit.admin.trackingOptin,error:!1},n.handleOptIn=n.handleOptIn.bind(m()(n)),n}return h()(t,e),c()(t,[{key:"handleOptIn",value:function(e){var t=this,n=e.target.checked,a={googlesitekit_tracking_optin:n};b()({path:"/wp/v2/settings",headers:{"Content-Type":"application/json; charset=UTF-8"},body:JSON.stringify(a),method:"POST"}).then((function(){if(n&&!t.state.scriptOnPage){var e=window.document;if(!e)return;window.googlesitekitTrackingEnabled=!!n,e.body.insertAdjacentHTML("beforeend",'\n\t\t\t\t\t\t<script async src="https://www.googletagmanager.com/gtag/js?id='.concat(googlesitekit.admin.trackingID,'"><\/script>\n\t\t\t\t\t')),e.body.insertAdjacentHTML("beforeend","\n\t\t\t\t\t\t<script>\n\t\t\t\t\t\t\twindow.dataLayer = window.dataLayer || [];\n\t\t\t\t\t\t\tfunction gtag(){dataLayer.push(arguments);}\n\t\t\t\t\t\t\tgtag('js', new Date());\n\t\t\t\t\t\t\tgtag('config', '".concat(googlesitekit.admin.trackingID,"');\n\t\t\t\t\t\t<\/script>\n\t\t\t\t\t"))}t.setState({optIn:!!n,error:!1,scriptOnPage:!0})})).catch((function(n){t.setState({optIn:!e.target.checked,error:{errorCode:n.code,errorMsg:n.message}})}))}},{key:"render",value:function(){var e=this.state,t=e.optIn,n=e.error,a=this.props,i=a.id,o=a.name;return React.createElement("div",{className:"googlesitekit-opt-in"},React.createElement(y,{id:i,name:o,value:"1",checked:t,onChange:this.handleOptIn},Object(E.__)("Help us improve the Site Kit plugin by allowing tracking of anonymous usage stats. All data are treated in accordance with ","google-site-kit"),React.createElement("a",{href:"https://policies.google.com/privacy",target:"_blank",rel:"noopener noreferrer"},Object(E.__)("Google Privacy Policy","google-site-kit")),"."),n&&React.createElement("div",{className:"googlesitekit-error-text"},n.errorMsg))}}]),t}(p.Component);C.propTypes={id:_.a.string,name:_.a.string},C.defaultProps={id:"googlesitekit-opt-in",name:"optIn"};t.a=C},145:function(e,t,n){"use strict";var a=n(12),i=n.n(a),o=n(3),c=n.n(o),l=n(4),r=n.n(l),s=n(5),d=n.n(s),u=n(6),m=n.n(u),g=n(13),h=n.n(g),p=n(7),f=n.n(p),k=n(1),_=n(9),v=n(2),y=n(67),R=n(0),b=n(14),E=function(e){function t(e){var n;return c()(this,t),(n=d()(this,m()(t).call(this,e))).el=document.createElement("div"),n.root=document.querySelector(".googlesitekit-plugin")||document.body,n}return f()(t,e),r()(t,[{key:"componentDidMount",value:function(){this.root.appendChild(this.el)}},{key:"componentWillUnmount",value:function(){this.root.removeChild(this.el)}},{key:"render",value:function(){return Object(k.createPortal)(this.props.children,this.el)}}]),t}(k.Component);n.d(t,"a",(function(){return C}));var C=function(e){function t(e){var n;return c()(this,t),(n=d()(this,m()(t).call(this,e))).state={dialogActive:!1},n.handleDialog=n.handleDialog.bind(h()(n)),n.handleUnlinkConfirm=n.handleUnlinkConfirm.bind(h()(n)),n.handleCloseModal=n.handleCloseModal.bind(h()(n)),n}return f()(t,e),r()(t,[{key:"componentDidMount",value:function(){window.addEventListener("keyup",this.handleCloseModal,!1)}},{key:"componentWillUnmount",value:function(){window.removeEventListener("keyup",this.handleCloseModal)}},{key:"handleUnlinkConfirm",value:function(){return i.a.async((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,i.a.awrap(_.c.set(_.a,"site","reset"));case 2:Object(v.d)(),this.handleDialog(),document.location=Object(v.n)("googlesitekit-splash",{notification:"reset_success"});case 5:case"end":return e.stop()}}),null,this)}},{key:"handleCloseModal",value:function(e){27===e.keyCode&&this.setState({dialogActive:!1})}},{key:"handleDialog",value:function(){this.setState((function(e){return{dialogActive:!e.dialogActive}}))}},{key:"render",value:function(){var e=this,t=this.props.children,n=this.state.dialogActive;return React.createElement(k.Fragment,null,React.createElement(b.a,{className:"googlesitekit-reset-button",onClick:function(){return e.setState({dialogActive:!0})},inherit:!0},t||Object(R.__)("Reset Site Kit","google-site-kit")),React.createElement(E,null,React.createElement(y.a,{dialogActive:n,handleConfirm:this.handleUnlinkConfirm,handleDialog:this.handleDialog,title:Object(R.__)("Reset Site Kit","google-site-kit"),subtitle:Object(R.__)("Resetting this site will remove access to all services. After disconnecting, you will need to re-authorize your access to restore service.","google-site-kit"),confirmButton:Object(R.__)("Reset","google-site-kit"),provides:[]})))}}]),t}(k.Component)},17:function(e,t,n){"use strict";var a=n(3),i=n.n(a),o=n(4),c=n.n(o),l=n(5),r=n.n(l),s=n(6),d=n.n(s),u=n(7),m=n.n(u),g=n(1),h=n(8),p=n.n(h),f=n(14),k=function(e){function t(){return i()(this,t),r()(this,d()(t).apply(this,arguments))}return m()(t,e),c()(t,[{key:"render",value:function(){var e=this.props,t=e.title,n=e.ctaLabel,a=e.ctaLink;return React.createElement("header",{className:"googlesitekit-layout__header"},React.createElement("div",{className:"mdc-layout-grid"},React.createElement("div",{className:"mdc-layout-grid__inner"},t&&React.createElement("div",{className:"\n\t\t\t\t\t\t\t\t\tmdc-layout-grid__cell\n\t\t\t\t\t\t\t\t\t".concat(a?"mdc-layout-grid__cell--span-6-desktop":"mdc-layout-grid__cell--span-12-desktop","\n\t\t\t\t\t\t\t\t\tmdc-layout-grid__cell--align-middle\n\t\t\t\t\t\t\t\t\t").concat(a?"":"mdc-layout-grid__cell--span-8-tablet","\n\t\t\t\t\t\t\t\t\tmdc-layout-grid__cell--span-4-phone\n\t\t\t\t\t\t\t\t")},React.createElement("h3",{className:"googlesitekit-subheading-1 googlesitekit-layout__header-title"},t)),a&&React.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--align-right-tablet "},React.createElement(f.a,{href:a,external:!0,inherit:!0},n)))))}}]),t}(g.Component);k.propTypes={title:p.a.string,ctaLabel:p.a.string,ctaLink:p.a.string},k.defaultProps={title:"",ctaLabel:"",ctaLink:""};var _=k,v=n(60),y=function(e){function t(){return i()(this,t),r()(this,d()(t).apply(this,arguments))}return m()(t,e),c()(t,[{key:"render",value:function(){var e=this.props,t=e.ctaLabel,n=e.ctaLink,a=e.footerContent;return React.createElement("footer",{className:"googlesitekit-layout__footer"},React.createElement("div",{className:"mdc-layout-grid"},React.createElement("div",{className:"mdc-layout-grid__inner"},React.createElement("div",{className:"mdc-layout-grid__cell mdc-layout-grid__cell--span-12"},n&&t&&React.createElement(v.a,{className:"googlesitekit-data-block__source",name:t,href:n,external:!0}),a))))}}]),t}(g.Component);y.propTypes={ctaLabel:p.a.string,ctaLink:p.a.string};var R=y,b=function(e){function t(){return i()(this,t),r()(this,d()(t).apply(this,arguments))}return m()(t,e),c()(t,[{key:"render",value:function(){var e=this.props,t=e.header,n=e.footer,a=e.children,i=e.title,o=e.headerCtaLabel,c=e.headerCtaLink,l=e.footerCtaLabel,r=e.footerCtaLink,s=e.footerContent,d=e.className,u=e.fill,m=e.relative;return React.createElement("div",{className:"\n\t\t\t\tgooglesitekit-layout\n\t\t\t\t".concat(d&&d,"\n\t\t\t\t").concat(u?"googlesitekit-layout--fill":"","\n\t\t\t\t").concat(m?"googlesitekit-layout--relative":"","\n\t\t\t")},t&&React.createElement(_,{title:i,ctaLabel:o,ctaLink:c}),a,n&&React.createElement(R,{ctaLabel:l,ctaLink:r,footerContent:s}))}}]),t}(g.Component);b.propTypes={header:p.a.bool,footer:p.a.bool,children:p.a.node.isRequired,title:p.a.string,headerCtaLabel:p.a.string,headerCtaLink:p.a.string,footerCtaLabel:p.a.string,footerCtaLink:p.a.string,footerContent:p.a.node,className:p.a.string,fill:p.a.bool,relative:p.a.bool},b.defaultProps={header:!1,footer:!1,title:"",headerCtaLabel:"",headerCtaLink:"",footerCtaLabel:"",footerCtaLink:"",footerContent:null,className:"",fill:!1,relative:!1};t.a=b},208:function(e,t,n){"use strict";n.r(t);var a=n(3),i=n.n(a),o=n(4),c=n.n(o),l=n(5),r=n.n(l),s=n(6),d=n.n(s),u=n(7),m=n.n(u),g=n(1),h=n(43),p=n(29),f=n(145),k=n(17),_=n(26),v=n(143),y=n(2),R=n(11),b=n(0),E=n(36),C=function(e){function t(e){var n;i()(this,t),n=r()(this,d()(t).call(this,e));var a=googlesitekit.admin,o=a.proxySetupURL,c=a.siteURL,l=googlesitekit.setup,s=l.isSiteKitConnected,u=l.isResettable,m=googlesitekit.permissions.canSetup;return n.state={canSetup:m,isSiteKitConnected:s,isResettable:u,completeSetup:!1,proxySetupURL:o,resetSuccess:"reset_success"===Object(E.getQueryArg)(location.href,"notification"),context:Object(E.getQueryArg)(location.href,"googlesitekit_context"),siteHostname:new URL(c).hostname},n}return m()(t,e),c()(t,[{key:"isSetupFinished",value:function(){var e=this.state,t=e.isSiteKitConnected,n=e.completeSetup;return t&&n}},{key:"render",value:function(){if(this.isSetupFinished()){var e=Object(y.n)("googlesitekit-dashboard",{notification:"authentication_success"});Object(R.delay)((function(){window.location.replace(e)}),500,"later")}var t=this.state,n=t.context,a=t.isResettable,i=t.proxySetupURL,o=t.resetSuccess,c=t.siteHostname,l="revoked"===n;return React.createElement(g.Fragment,null,React.createElement(h.a,null),o&&React.createElement(_.a,{id:"reset_success",title:Object(b.__)("Site Kit by Google was successfully reset.","google-site-kit"),isDismissable:!1}),React.createElement("div",{className:"googlesitekit-wizard"},React.createElement("div",{className:"mdc-layout-grid"},React.createElement("div",{className:"mdc-layout-grid__inner"},React.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-12 "},React.createElement(k.a,null,React.createElement("section",{className:"googlesitekit-wizard-progress"},React.createElement("div",{className:"googlesitekit-setup__footer"},React.createElement("div",{className:"mdc-layout-grid"},React.createElement("div",{className:"mdc-layout-grid__inner"},React.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--span-12 "},l?React.createElement(g.Fragment,null,React.createElement("h1",{className:"googlesitekit-setup__title"},Object(b.sprintf)(
/* translators: %s is the site's hostname. (e.g. example.com) */
Object(b.__)("You revoked access to Site Kit for %s","google-site-kit"),c)),React.createElement("p",{className:"googlesitekit-setup__description"},Object(b.__)('Site Kit will no longer have access to your account. If you’d like to reconnect Site Kit, click "Start Setup" below to generate new credentials.',"google-site-kit"))):React.createElement(g.Fragment,null,React.createElement("h1",{className:"googlesitekit-setup__title"},Object(b.__)("The Site Kit plugin is active but requires setup","google-site-kit")),React.createElement("p",{className:"googlesitekit-setup__description"},Object(b.__)("Site Kit Service will guide you through 3 simple setup steps.","google-site-kit"))),React.createElement(v.a,null),React.createElement(p.a,{className:"googlesitekit-start-setup",href:i,onClick:function(){Object(y.v)("plugin_setup","proxy_start_setup_landing_page")}},Object(b.__)("Start setup","google-site-kit")),a&&React.createElement(f.a,null))))))))))))}}]),t}(g.Component);t.default=C},43:function(e,t,n){"use strict";var a=n(3),i=n.n(a),o=n(4),c=n.n(o),l=n(5),r=n.n(l),s=n(6),d=n.n(s),u=n(7),m=n.n(u),g=n(1),h=n(21),p=function(e){function t(){return i()(this,t),r()(this,d()(t).apply(this,arguments))}return m()(t,e),c()(t,[{key:"render",value:function(){return null}}]),t}(g.Component),f=Object(h.a)("googlesitekit.ErrorNotification")(p),k=n(80),_=n(12),v=n.n(_),y=n(13),R=n.n(y),b=n(67),E=n(29),C=n(22),w=n(8),N=n.n(w),O=function(e){function t(e){var n;return i()(this,t),(n=r()(this,d()(t).call(this,e))).menuRef=Object(g.createRef)(),n}return m()(t,e),c()(t,[{key:"componentDidMount",value:function(){var e=this.props.menuOpen;this.menu=new C.f(this.menuRef.current),this.menu.open=e,this.menu.setDefaultFocusState(1)}},{key:"componentDidUpdate",value:function(e){var t=this.props.menuOpen;t!==e.menuOpen&&(this.menu.open=t)}},{key:"render",value:function(){var e=this.props,t=e.menuOpen,n=e.menuItems,a=e.onSelected,i=e.id;return React.createElement("div",{className:"mdc-menu mdc-menu-surface",ref:this.menuRef},React.createElement("ul",{id:i,className:"mdc-list",role:"menu","aria-hidden":!t,"aria-orientation":"vertical",tabIndex:"-1"},n.map((function(e,t){return React.createElement("li",{key:t,className:"mdc-list-item",role:"menuitem",onClick:a.bind(null,t),onKeyDown:a.bind(null,t)},React.createElement("span",{className:"mdc-list-item__text"},e))}))))}}]),t}(g.Component);O.propTypes={menuOpen:N.a.bool.isRequired,menuItems:N.a.array.isRequired,id:N.a.string.isRequired};var S=O,j=n(2),L=n(0),D=function(e){function t(e){var n;return i()(this,t),(n=r()(this,d()(t).call(this,e))).state={dialogActive:!1,menuOpen:!1},n.handleMenu=n.handleMenu.bind(R()(n)),n.handleMenuClose=n.handleMenuClose.bind(R()(n)),n.handleMenuItemSelect=n.handleMenuItemSelect.bind(R()(n)),n.handleDialog=n.handleDialog.bind(R()(n)),n.handleDialogClose=n.handleDialogClose.bind(R()(n)),n.handleUnlinkConfirm=n.handleUnlinkConfirm.bind(R()(n)),n.menuButtonRef=Object(g.createRef)(),n.menuRef=Object(g.createRef)(),n}return m()(t,e),c()(t,[{key:"componentDidMount",value:function(){window.addEventListener("mouseup",this.handleMenuClose),window.addEventListener("keyup",this.handleMenuClose),window.addEventListener("keyup",this.handleDialogClose)}},{key:"componentWillUnmount",value:function(){window.removeEventListener("mouseup",this.handleMenuClose),window.removeEventListener("keyup",this.handleMenuClose),window.removeEventListener("keyup",this.handleDialogClose)}},{key:"handleMenu",value:function(){var e=this.state.menuOpen;this.setState({menuOpen:!e})}},{key:"handleMenuClose",value:function(e){("keyup"!==e.type||27!==e.keyCode)&&"mouseup"!==e.type||this.menuButtonRef.current.buttonRef.current.contains(e.target)||this.menuRef.current.menuRef.current.contains(e.target)||this.setState({menuOpen:!1})}},{key:"handleMenuItemSelect",value:function(e,t){var n=googlesitekit.admin.proxyPermissionsURL;if("keydown"===t.type&&(13===t.keyCode||32===t.keyCode)||"click"===t.type)switch(e){case 0:this.handleDialog();break;case 1:window.location.assign(n);break;default:this.handleMenu()}}},{key:"handleDialog",value:function(){this.setState((function(e){return{dialogActive:!e.dialogActive,menuOpen:!1}}))}},{key:"handleDialogClose",value:function(e){27===e.keyCode&&this.setState({dialogActive:!1,menuOpen:!1})}},{key:"handleUnlinkConfirm",value:function(){return v.a.async((function(e){for(;;)switch(e.prev=e.next){case 0:this.setState({dialogActive:!1}),Object(j.d)(),document.location=Object(j.n)("googlesitekit-splash",{googlesitekit_context:"revoked"});case 3:case"end":return e.stop()}}),null,this)}},{key:"render",value:function(){var e=googlesitekit.admin,t=e.userData,n=t.email,a=void 0===n?"":n,i=t.picture,o=void 0===i?"":i,c=e.proxyPermissionsURL,l=this.state,r=l.dialogActive,s=l.menuOpen;return React.createElement(g.Fragment,null,React.createElement("div",{className:"googlesitekit-dropdown-menu mdc-menu-surface--anchor"},React.createElement(E.a,{ref:this.menuButtonRef,className:"googlesitekit-header__dropdown mdc-button--dropdown",text:!0,onClick:this.handleMenu,icon:o?React.createElement("i",{className:"mdc-button__icon","aria-hidden":"true"},React.createElement("img",{className:"mdc-button__icon--image",src:o,alt:Object(L.__)("User Avatar","google-site-kit")})):void 0,ariaHaspopup:"menu",ariaExpanded:s,ariaControls:"user-menu"},a),React.createElement(S,{ref:this.menuRef,menuOpen:s,menuItems:[Object(L.__)("Disconnect","google-site-kit")].concat(c?[Object(L.__)("Manage sites...","google-site-kit")]:[]),onSelected:this.handleMenuItemSelect,id:"user-menu"})),React.createElement(b.a,{dialogActive:r,handleConfirm:this.handleUnlinkConfirm,handleDialog:this.handleDialog,title:Object(L.__)("Disconnect","google-site-kit"),subtitle:Object(L.__)("Disconnecting Site Kit by Google will remove your access to all services. After disconnecting, you will need to re-authorize to restore service.","google-site-kit"),confirmButton:Object(L.__)("Disconnect","google-site-kit"),provides:[]}))}}]),t}(g.Component),x=function(e){function t(){return i()(this,t),r()(this,d()(t).apply(this,arguments))}return m()(t,e),c()(t,[{key:"render",value:function(){var e=googlesitekit.setup.isAuthenticated;return React.createElement(g.Fragment,null,React.createElement("header",{className:"googlesitekit-header"},React.createElement("section",{className:"mdc-layout-grid"},React.createElement("div",{className:"mdc-layout-grid__inner"},React.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--span-3-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},React.createElement(k.a,null)),React.createElement("div",{className:" mdc-layout-grid__cell mdc-layout-grid__cell--align-middle mdc-layout-grid__cell--align-right-phone mdc-layout-grid__cell--span-1-phone mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-6-desktop "},e&&React.createElement(D,null))))),React.createElement(f,null))}}]),t}(g.Component);t.a=x},67:function(e,t,n){"use strict";var a=n(3),i=n.n(a),o=n(4),c=n.n(o),l=n(5),r=n.n(l),s=n(6),d=n.n(s),u=n(7),m=n.n(u),g=n(1),h=n(8),p=n.n(h),f=n(29),k=n(14),_=n(22),v=n(144),y=n.n(v),R=n(0),b=function(e){function t(){var e;return i()(this,t),(e=r()(this,d()(t).call(this))).state={attributes:[Object(R.__)("Audience overview","google-site-kit"),Object(R.__)("Top pages","google-site-kit"),Object(R.__)("Top acquisition sources","google-site-kit"),Object(R.__)("AdSense & Analytics metrics for top pages","google-site-kit")]},e.dialogRef=Object(g.createRef)(),e}return m()(t,e),c()(t,[{key:"componentDidMount",value:function(){new _.d(this.dialogRef.current)}},{key:"render",value:function(){var e=this.props,t=e.dialogActive,n=e.handleDialog,a=e.title,i=e.provides,o=e.handleConfirm,c=e.subtitle,l=e.confirmButton,r=e.dependentModules;return React.createElement("div",{ref:this.dialogRef,className:"mdc-dialog ".concat(t?"mdc-dialog--open":""),role:"alertdialog","aria-modal":"true","aria-labelledby":"remove-module-dialog","aria-describedby":"remove-module-dialog-description","aria-hidden":t?"false":"true",tabIndex:"-1"},React.createElement("div",{className:"mdc-dialog__scrim"}," "),React.createElement(y.a,{active:t},React.createElement("div",null,React.createElement("div",{className:"mdc-dialog__container"},React.createElement("div",{className:"mdc-dialog__surface"},a&&React.createElement("h2",{id:"remove-module-dialog",className:"mdc-dialog__title"},a),c&&React.createElement("p",{className:"mdc-dialog__lead"},c),React.createElement("section",{id:"remove-module-dialog-description",className:"mdc-dialog__content"},React.createElement("ul",{className:"mdc-list mdc-list--underlined mdc-list--non-interactive"},i&&i.map((function(e){return React.createElement("li",{className:"mdc-list-item",key:e},React.createElement("span",{className:"mdc-list-item__text"},e))})))),r&&React.createElement("p",{className:"mdc-dialog__dependecies"},React.createElement("strong",null,Object(R.__)("Note: ","google-site-kit")),r),React.createElement("footer",{className:"mdc-dialog__actions"},React.createElement(f.a,{onClick:o,danger:!0},l||Object(R.__)("Disconnect","google-site-kit")),React.createElement(k.a,{className:"mdc-dialog__cancel-button",onClick:function(){return n()},inherit:!0},Object(R.__)("Cancel","google-site-kit"))))))))}}]),t}(g.Component);b.propTypes={dialogActive:p.a.bool,handleDialog:p.a.func,handleConfirm:p.a.func.isRequired,title:p.a.string,description:p.a.string,confirmButton:p.a.string},b.defaultProps={dialogActive:!1,handleDialog:null,title:null,description:null,confirmButton:null},t.a=b}}]);