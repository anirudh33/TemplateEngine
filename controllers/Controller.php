<?php
class Controller 
{
	
	public function showView() 
	{
		require_once SITE_PATH . '/views/EngineView.php';
	}
	
	public function showTemplateView($templateNames) 
	{
		require_once SITE_PATH . '/views/Container.php';
		die;
	}
	
	public function showTemplateViewFilled($templateFields,$templateNames)
	{
		require_once SITE_PATH . '/views/TemplateView.php';
		die;
	}
	
	public function saveField()
	{
		$fieldInfoString=$_POST["fieldInfoString"];
		$obj= new TemplateField();
		$obj->createTemplateField($fieldInfoString);
		$obj->insertField();
	}
	
	public function onViewTemplateClick() 
	{
		$obj= new Template();
		$templateNames=$obj->selectDistinct();
		
		$this->showTemplateView ($templateNames);
	}
	
	public function onShowTemplateClick()
	{
		$templateName=$_POST["templateName"];
		$obj= new Template();
		$templateNames=$obj->selectDistinct();
		$templateFields=$obj->getTemplateInfo($templateName);
		$this->showTemplateViewFilled($templateFields,$templateNames);
		
	}
	
	public function onSubmitTemplate()
	{
		$obj= new Template();
		$obj->insertTemplateData($_POST);
		$this->onViewTemplateClick();
	}
}