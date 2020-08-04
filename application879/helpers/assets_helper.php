<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// 
// Permet de récupérer plus rapidement les URL des fichiers contenus dans le dossier "assets".
// Le helper natif "url" est nécéssaire
//

if ( ! function_exists('css_url')) {
	function css_url($nom, $version = '')
	{
		return base_url() . 'assets/css/'. $nom .'.css?'. $version;
	}
}

if ( ! function_exists('js_url')) {
	function js_url($nom, $version = '')
	{
		return base_url() . 'assets/javascript/'. $nom .'.js?'. $version;
	}
}

if ( ! function_exists('img_url')) {
	function img_url($nom)
	{
		return base_url() . 'assets/images/'. $nom;
	}
}

if ( ! function_exists('img')) {
	function img($nom, $alt = '')
	{
		return '<img src="'. img_url($nom) .'" alt="'. $alt .'" />';
	}
}
