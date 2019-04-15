<?php
$post_title = get_the_title();
if(($post_title == 'Markup: HTML Tags and Formatting') || ($post_title == 'Template: Comments')){
?>
<style>
h1, h2, h3, h4, h5, h6 {
    margin: 20px 0!important;
}

.blog-single blockquote {
	max-width: 100%;
}
blockquote {
background: url(<?php echo esc_url( get_template_directory_uri() ).'/template-parts/pionus/img/openquote1.gif'; ?>) no-repeat;
color: #a5a4a4;
font-style: italic;
padding: 0 0 0 30px!important;
}
.blog-single table {
	color:#333333;
	border: 1px solid #ddd;
	border-collapse: collapse;
}
.blog-single table th {
	padding: 8px;
	border: 1px solid #ddd;
}
.blog-single table td {
	border: 1px solid #ddd;
	padding: 8px;
}
.blog-single ul {
	margin: 0 0 0 30px;
}
.blog-single ul li {
	list-style: disc;
}

.comments table {
	color:#333333;
	border: 1px solid #ddd;
	border-collapse: collapse;
}
.comments table th {
	padding: 8px;
	border: 1px solid #ddd;
}
.comments table td {
	border: 1px solid #ddd;
	padding: 8px;
}
.comments ul li ul {
	margin: 0 0 0 30px;
}
.comments ul li ul li {
	list-style: disc;
}
.comments ol {
	margin: 0 0 0 30px;
}
.comments ol li {
	list-style: disc;
}
dt, kbd kbd {
    font-weight: 700;
    padding: 10px 0;
}
</style>

<?php }
if($post_title == 'Template: Sticky'){
?>
<style>
.tags {
    margin-top: 20px;
}
</style>
<?php } ?>