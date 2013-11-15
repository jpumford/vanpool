<?php
require_once './config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vanpool Sign-Up</title>
		<link href="css/cui.css" rel="stylesheet">

		<style>
			.required {
				color: red;
			}
			.form-horizontal .control-group {
				margin-bottom: 20px;
			}
			.form-horizontal .control-group:before, .form-horizontal .control-group:after {
				display: table;
				line-height: 0;
				content: "";
			}
			.form-horizontal .control-group:after {
				clear: both;
			}
			.form-horizontal .control-group:before, .form-horizontal .control-group:after {
				display: table;
				line-height: 0;
				content: "";
			}
			.form-horizontal .control-label {
				float: left;
				width: 160px;
				padding-top: 5px;
				text-align: right;
				display: block;
				margin-bottom: 5px;
				line-height: 20px;
				font-size: 14px;
				cursor: pointer;
			}
			.form-horizontal .controls {
				margin-left: 180px;
				text-align: left;
			}
			.form-search input, .form-inline input, .form-horizontal input, .form-search textarea, .form-inline textarea, .form-horizontal textarea, .form-search select, .form-inline select, .form-horizontal select, .form-search .help-inline, .form-inline .help-inline, .form-horizontal .help-inline, .form-search .uneditable-input, .form-inline .uneditable-input, .form-horizontal .uneditable-input, .form-search .input-prepend, .form-inline .input-prepend, .form-horizontal .input-prepend, .form-search .input-append, .form-inline .input-append, .form-horizontal .input-append {
				display: inline-block;
				margin-bottom: 0;
				vertical-align: middle;
			}
		</style>
    </head>
    <body>
		<header class="top">
			<div class="logo"><i class="icon-adjust medium">Vanpool</i></div>
			<nav class="main">
				<a href="/"<?php if ($page == 'index') { ?> class="selected" <?php } ?>>Vanpool Sign-Up</a>
				<a href="/map.php"<?php if ($page == 'map') { ?> class="selected" <?php } ?>>Map</a>
			</nav>
		</header>
		<div class="page shadowBox" role="main">
			<div class="content">
