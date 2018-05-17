<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>REST Server Tests</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/fontawesome-all.css">
		<style>
			::selection {
				background-color: #E13300;
				color: white;
			}

			::-moz-selection {
				background-color: #E13300;
				color: white;
			}

			body {
				background-color: #FFF;
				margin: 40px;
				font: 16px/20px normal Helvetica, Arial, sans-serif;
				color: #4F5155;
				word-wrap: break-word;
			}

			a {
				color: #039;
				background-color: transparent;
				font-weight: normal;
			}

			h1 {
				color: #444;
				background-color: transparent;
				border-bottom: 1px solid #D0D0D0;
				font-size: 24px;
				font-weight: normal;
				margin: 0 0 14px 0;
				padding: 14px 15px 10px 15px;
			}

			code {
				font-family: Consolas, Monaco, Courier New, Courier, monospace;
				font-size: 16px;
				background-color: #f9f9f9;
				border: 1px solid #D0D0D0;
				color: #002166;
				display: block;
				margin: 14px 0 14px 0;
				padding: 12px 10px 12px 10px;
			}

			#body {
				margin: 0 15px 0 15px;
			}

			p.footer {
				text-align: right;
				font-size: 16px;
				border-top: 1px solid #D0D0D0;
				line-height: 32px;
				padding: 0 10px 0 10px;
				margin: 20px 0 0 0;
			}

			#container {
				margin: 10px;
				border: 1px solid #D0D0D0;
				box-shadow: 0 0 8px #D0D0D0;
			}

		</style>
	</head>

	<body>

		<div id="container">
			<h1>REST Server Tests</h1>

			<div id="body">

				<h2><a href="<?php echo site_url(); ?>">Home</a></h2>

				<p>
					See the article
					<a href="http://net.tutsplus.com/tutorials/php/working-with-restful-services-in-codeigniter-2/" target="_blank">
                http://net.tutsplus.com/tutorials/php/working-with-restful-services-in-codeigniter-2/
            </a>
				</p>

				<p>
					The master project repository is
					<a href="https://github.com/chriskacerguis/codeigniter-restserver" target="_blank">
                https://github.com/chriskacerguis/codeigniter-restserver
            </a>
				</p>

				<p>
					Click on the links to check whether the REST server is working.
				</p>

				<ol>
					<li><a href="<?php echo site_url('api/example/users'); ?>">Users</a> - defaulting to JSON</li>
					<li><a href="<?php echo site_url('api/example/users/format/csv'); ?>">Users</a> - get it in CSV</li>
					<li><a href="<?php echo site_url('api/example/users/id/1'); ?>">User #1</a> - defaulting to JSON (users/id/1)</li>
					<li><a href="<?php echo site_url('api/example/users/1'); ?>">User #1</a> - defaulting to JSON (users/1)</li>
					<li><a href="<?php echo site_url('api/example/users/id/1.xml'); ?>">User #1</a> - get it in XML (users/id/1.xml)</li>
					<li><a href="<?php echo site_url('api/example/users/id/1/format/xml'); ?>">User #1</a> - get it in XML (users/id/1/format/xml)</li>
					<li><a href="<?php echo site_url('api/example/users/id/1?format=xml'); ?>">User #1</a> - get it in XML (users/id/1?format=xml)</li>
					<li><a href="<?php echo site_url('api/example/users/1.xml'); ?>">User #1</a> - get it in XML (users/1.xml)</li>
					<li><a id="ajax" href="<?php echo site_url('api/example/users/format/json'); ?>">Users</a> - get it in JSON (AJAX request)</li>
					<li><a href="<?php echo site_url('api/example/users.html'); ?>">Users</a> - get it in HTML (users.html)</li>
					<li><a href="<?php echo site_url('api/example/users/format/html'); ?>">Users</a> - get it in HTML (users/format/html)</li>
					<li><a href="<?php echo site_url('api/example/users?format=html'); ?>">Users</a> - get it in HTML (users?format=html)</li>
				</ol>

			</div>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '' ?></p>
		</div>

		<script src="https://code.jquery.com/jquery-1.12.0.js"></script>

		<script>
			// Create an 'App' namespace
			var App = App || {};

			// Basic rest module using an IIFE as a way of enclosing private variables
			App.rest = (function restModule(window) {
				// Fields
				var _alert = window.alert;
				var _JSON = window.JSON;

				// Cache the jQuery selector
				var _$ajax = null;

				// Cache the jQuery object
				var $ = null;

				// Methods (private)

				/**
				 * Called on Ajax done
				 *
				 * @return {undefined}
				 */
				function _ajaxDone(data) {
					// The 'data' parameter is an array of objects that can be iterated over
					_alert(_JSON.stringify(data, null, 2));
				}

				/**
				 * Called on Ajax fail
				 *
				 * @return {undefined}
				 */
				function _ajaxFail() {
					_alert('Oh no! A problem with the Ajax request!');
				}

				/**
				 * On Ajax request
				 *
				 * @param {jQuery} $element Current element selected
				 * @return {undefined}
				 */
				function _ajaxEvent($element) {
					$.ajax({
							// URL from the link that was 'clicked' on
							url: $element.attr('href')
						})
						.done(_ajaxDone)
						.fail(_ajaxFail);
				}

				/**
				 * Bind events
				 *
				 * @return {undefined}
				 */
				function _bindEvents() {
					// Namespace the 'click' event
					_$ajax.on('click.app.rest.module', function(event) {
						event.preventDefault();

						// Pass this to the Ajax event function
						_ajaxEvent($(this));
					});
				}

				/**
				 * Cache the DOM node(s)
				 *
				 * @return {undefined}
				 */
				function _cacheDom() {
					_$ajax = $('#ajax');
				}

				// Public API
				return {
					/**
					 * Initialise the following module
					 *
					 * @param {object} jQuery Reference to jQuery
					 * @return {undefined}
					 */
					init: function init(jQuery) {
						$ = jQuery;

						// Cache the DOM and bind event(s)
						_cacheDom();
						_bindEvents();
					}
				};
			}(window));

			// DOM ready event
			$(function domReady($) {
				// Initialise the App module
				App.rest.init($);
			});

		</script>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>

	</html>
