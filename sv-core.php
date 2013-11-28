<?php

class svcore {

	var $mainDir = '';
	var $errors = array();
	var $corePluginDirs = '';
	var $sverrors = true;

	public function __construct() {
		$this->mainDir = dirname(__FILE__);
		$this->loadExtensions();
		if($this->sverrors) $this->renderErrors();
	}

	private function loadExtensions() {
		$this->corePluginDirs = $this->extensionTree($this->mainDir.'/core/system/extend');
		foreach($this->corePluginDirs as $name => $data) {
			$this->initializePlugin($data);
		}
	}

	private function extensionTree($dir) {
		$result = array();
	    $root = preg_grep('/^([^.])/', scandir($dir));
	    foreach($root as $value){
	        if($value === '.' || $value === '..') continue;
	        if(is_file("$dir/$value")) {
	        	$result[]="$dir/$value";
	        	continue;
	        }
	        foreach($this->extensionTree("$dir/$value") as $value){
	        	$pluginName = pathinfo($value,PATHINFO_FILENAME);
	        	if(empty($result[$pluginName])) $result[$pluginName] = array('path'=>dirname($value), 'name'=>$pluginName); 
	        }
	    }
	    return $result;
	} 

	private function initializePlugin($pluginData) {
		if(empty($pluginData)) {
			$this->errors['fatal']['Plugin_Intialize_Error'] = "There has been an error trying to load the plugins. CAUSE: Not data passed to Initializer";
			return true;
		}
		require_once($pluginData['path'].'/'.$pluginData['name'].'.php');
		$$pluginData['name'] = new $pluginData['name']();
	}

	private function renderErrors(){
		$fatal = false;
		if(!empty($this->errors)){
			foreach($this->errors as $state => $errors){
				if($state == 'fatal') $fatal = true;
				foreach((array)$errors as $code => $error){
					echo '<strong>'.strtoupper($state).' SAVANT ERROR:</strong> '.$code.' - <em>'.$error.'</em>';
				}
			}
			if($fatal) die();
		}
	}

}