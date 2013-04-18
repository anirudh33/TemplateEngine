<?php
class TemplateField 
{
	private $templateName, $fieldType, $fieldId, $fieldLabel, $fieldValue, $fieldList, $fieldValidation;
	protected static $conn;
	
	/**
	 * @return the $fieldValidation
	 */
	public function getFieldValidation()
	{
		return $this->fieldValidation;
	}

	/**
	 * @param field_type $fieldValidation
	 */
	public function setFieldValidation($fieldValidation)
	{
		$this->fieldValidation = $fieldValidation;
	}

	/**
	 * @return the $templateName
	 */
	public function getTemplateName() {
		return $this->templateName;
	}

	/**
	 * @return the $fieldType
	 */
	public function getFieldType() {
		return $this->fieldType;
	}

	/**
	 * @return the $fieldId
	 */
	public function getFieldId() {
		return $this->fieldId;
	}

	/**
	 * @return the $fieldLabel
	 */
	public function getFieldLabel() {
		return $this->fieldLabel;
	}

	/**
	 * @return the $fieldValue
	 */
	public function getFieldValue() {
		return $this->fieldValue;
	}

	/**
	 * @return the $fieldList
	 */
	public function getFieldList() {
		return $this->fieldList;
	}

	/**
	 * @param field_type $templateName
	 */
	public function setTemplateName($templateName) {
		$this->templateName = $templateName;
	}

	/**
	 * @param field_type $fieldType
	 */
	public function setFieldType($fieldType) {
		$this->fieldType = $fieldType;
	}

	/**
	 * @param field_type $fieldId
	 */
	public function setFieldId($fieldId) {
		$this->fieldId = $fieldId;
	}

	/**
	 * @param field_type $fieldLabel
	 */
	public function setFieldLabel($fieldLabel) {
		$this->fieldLabel = $fieldLabel;
	}

	/**
	 * @param field_type $fieldValue
	 */
	public function setFieldValue($fieldValue) {
		$this->fieldValue = $fieldValue;
	}

	/**
	 * @param field_type $fieldList
	 */
	public function setFieldList($fieldList) {
		$this->fieldList = $fieldList;
	}

	public function __construct() {
		
		self::$conn=DBConnection::Connect ();
	}
	
	/**
	 * @param unknown $fieldInfoString: - seperated field information passed
	 * Usage: Sets various attributes of a TemplateField object
	 */
	public function createTemplateField($fieldInfoString)
	{
		
		$fieldInformation=explode("-", $fieldInfoString);
			
		// data
		$this->setTemplateName($fieldInformation[0]);
		$this->setFieldType($fieldInformation[1]);
		$this->setFieldId($fieldInformation[2]);
		$this->setFieldLabel($fieldInformation[3]);
		$this->setFieldValidation($fieldInformation[4]);
		$this->setFieldValue($fieldInformation[5]);		
		if(isset($fieldInformation[6])) {
			$this->setFieldList($fieldInformation[6]);
		}
		
		
	}
	
	/**
	 *Inserts fields respective to a particular template one at a time 
	 */
	public function insertField()
	{
	$sql = "INSERT INTO templateinfo 
				(template_name,field_type,field_id,field_label,field_value,field_list,field_validation) VALUES 
				(:template_name,:field_type,:field_id,:field_label,:field_value,:field_list,:field_validation)";
		$q = self::$conn->prepare($sql);
		$bool=$q->execute(array(':template_name'=>$this->getTemplateName(),
				':field_type'=>$this->getFieldType(),
				':field_id'=>$this->getFieldId(),
				':field_label'=>$this->getFieldLabel(),
				':field_value'=>$this->getFieldValue(),
				':field_list'=>$this->getFieldList(),
				':field_validation'=>$this->getFieldValidation()			
				));	
		if($bool) {
			echo 1;
		}
	}	
}
?>