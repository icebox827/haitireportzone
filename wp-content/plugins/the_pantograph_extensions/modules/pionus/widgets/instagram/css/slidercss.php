<?php 

echo '
<style>
.simply-scroll-clip { /* Clip DIV - automatically generated */
overflow: hidden;
}

.simply-scroll-list { /* UL/OL/DIV - the element that simplyScroll is inited on */
overflow: hidden;
margin: 0;
padding: 0;
list-style: none;
}

.simply-scroll-list li {
	padding: 0;
	margin: 0;
	list-style: none;
}

.simply-scroll-list li img {
	border: none;
	display: block;
}


.vert { /* wider than clip to position buttons to side */
	width: 340px;
	height: 400px;
	margin-bottom: 1.5em;
}

.vert .simply-scroll-clip {
	width: 290px;
	height: 400px;
}

.vert .simply-scroll-list {}

.vert .simply-scroll-list li {
	width: 290px;
	height: 200px;
}
.vert .simply-scroll-list li img {}

.vert .simply-scroll-btn {}

.vert .simply-scroll-btn-up { /* modified btn pos */
	right: 0;
	top: 0;
}
.vert .simply-scroll-btn-up.disabled {}
.vert .simply-scroll-btn-up:hover {}

.vert .simply-scroll-btn-down { /* modified btn pos */
	right: 0;
	top: 52px;
}
.vert .simply-scroll-btn-down.disabled {}
.vert .simply-scroll-btn-down:hover {}
</style>
';