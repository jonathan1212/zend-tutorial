<?php
namespace GDI\Util;

class Navigation {
	
	
	private 
		$text 			= '',
		$url			= '',
		$title          = '',
		$highlighted 	= false,
		$visibleTo		= array();
	
	public function __construct() {}
	
	public function setTabText($text) {
		$this->text = $text;
		return $this;
	}
	
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	
	public function setHighlighted($highlighted) {
		$this->highlighted 	= $highlighted;
		return $this;
	}
	
	public function setTitle($title) {
		$this->title 	= $title;
		return $this;
	}
	
	public function getTabText() {
		return $this->text;
	}
	
	public function getUrl() {
		return $this->url;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function isHighlighted() {
		return $this->highlighted;
	}
	
	public function setVisibleTo($clients=array()){
		return $this->visibleTo = $clients;
	}
	
	public function getVisibleTo($clients=array()){
		return $this->visibleTo;
	}
}