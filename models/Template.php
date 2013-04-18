<?php
class Template {
	protected static $conn;
	
	function __construct() 
	{
		self::$conn=DBConnection::Connect ();
	}
	
	public function selectDistinct()
	{
		
		$sql="select distinct template_name from templateinfo";
		$q=self::$conn->prepare($sql);
		$q->execute();
		$templateNames=$q->fetchAll(PDO::FETCH_ASSOC);
		return $templateNames;
	}
	
	public function getTemplateInfo($templateName)
	{		
		$sql="select * from templateinfo where template_name='".$templateName."'";
		$q=self::$conn->prepare($sql);
		$q->execute();
		$templateFields=$q->fetchAll(PDO::FETCH_ASSOC);	
		return $templateFields;
	}
	
	public function insertTemplateData($fields)
	{
		$tableName=end($fields);
		unset($fields[key($fields)]);		
		$fieldNames=array_keys($fields);
		$fieldValues=array_values($fields);
		
		if(!$this->tableExists($tableName))
		{
			$bool=$this->createTable($tableName,$fieldNames);
			if($bool) {
				$this->insertValues($tableName,$fieldNames, $fieldValues);
			} else {
				echo "Table could not be created";
			}
		} else {
			$bool=$this->insertValues($tableName,$fieldNames, $fieldValues);
		}
		if($bool){
			echo "Values inserted Successfully";
		} else {
			echo "Problem in insertion";
		}
		
		
	}
	public function tableExists($tableName)
	{
		$sql="select 1 from $tableName";
		$q=self::$conn->prepare($sql);		
		$r=$q->execute();
		return $r;
	}
	
	public function createTable($tableName,$fieldNames){
	
		// Create the table
		$sql = "CREATE TABLE $tableName (`id` int(11) auto_increment PRIMARY KEY,";		
		foreach ($fieldNames as $key=>$value) {
			if(!isset($fieldNames[$key+1])){
				$sql.="`$value` varchar(100)) CHARACTER SET utf8 COLLATE utf8_general_ci";
			} else {
				$sql.="`$value` varchar(100),";
			}
		}
		$bool=self::$conn->exec($sql);		
		if($bool==0) {
			return true;
		} else {
			return false;
		} 
	}
	
	public function insertValues($tableName,$fieldNames,$fieldValues)
	{
		$sql = "INSERT INTO $tableName(";
		foreach ($fieldNames as $key=>$value) {
			if(!isset($fieldNames[$key+1])){
				$sql.="$value) VALUES (";
			}else {
				$sql.="$value,";
			}			
		}
		foreach ($fieldNames as $key=>$value) {
			if(!isset($fieldNames[$key+1])){
				$sql.=":$value)";
			}else {
				$sql.=":$value,";
			}
		}
		$q = self::$conn->prepare($sql);
		
		$array=array_combine($fieldNames, $fieldValues);
		
		foreach ($array as $k => $v) {
    	$array[':'.$k] = $v;
   		unset($array[$k]);
		}
		
 		$bool=$q->execute($array);
 		return $bool;
	}
	
}

?>