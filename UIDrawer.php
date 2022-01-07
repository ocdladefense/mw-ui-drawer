<?php

if(!defined("MEDIAWIKI" )) die();


$dir = dirname( __FILE__ );

class UIDrawer {

	const DRAWER_TEMPLATE = "drawer.php";

	public static function SetupUIDrawer(){
		global $wgHooks, $wgResourceModules, $wgOcdlaShowBooksOnlineDrawer, $wgScriptPath;
		
		
		$wgHooks["BeforePageDisplay"][] = "UIDrawer::onBeforePageDisplay";

		
		$wgResourceModules["ext.uiDrawer"] = array(
			"styles" => array(
				"css/drawer.css",
				"css/accordion.css"
			),
			"position" => "top",
			"remoteBasePath" => "/extensions/UIDrawer",
			"localBasePath" => "extensions/UIDrawer"
		);
	}
	
	
	public static function onBeforePageDisplay(OutputPage &$out, Skin &$skin ) {
		global $wgOcdlaShowBooksOnlineDrawer, $wgOcdlaShowBooksOnlineNs;
	
		$out->addModules("ext.uiDrawer");

		$skin->customElements += array(
			"drawer" => file_get_contents(__DIR__."/templates/".self::DRAWER_TEMPLATE)
		);

		return true;
	}

}