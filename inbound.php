<?php
date_default_timezone_set('UTC');
// Create an object to store the XML elements
class Trumpia {
	private $time_stamp;
	private $push_id;
	private $inbound_id;
	private $subscription_uid;
	private $phone_number;
	private $contents;
	private $keyword;
	private $data_capture;
	private $attachment;
	private $dataset_id;
	private $dataset_name;
	// Initialize object with an xml string
	function __construct($trumpia_xml)
	{
		echo "xml string is valid<br>";
		$this->time_stamp = date("m-d-Y H:i:s");
		$this->push_id = $trumpia_xml->PUSH_ID[0];
		$this->inbound_id = $trumpia_xml->INBOUND_ID[0];
		$this->subscription_uid = $trumpia_xml->SUBSCRIPTION_UID[0];
		$this->phone_number = $trumpia_xml->PHONENUMBER[0];
		$this->keyword = $trumpia_xml->KEYWORD[0];
		$this->data_capture = $trumpia_xml->DATA_CAPTURE[0];
		$this->contents = $trumpia_xml->CONTENTS[0];
		$this->attachment = $trumpia_xml->ATTACHMENT[0];
		$this->dataset_id = $trumpia_xml->DATASET_ID[0];
		$this->dataset_name = $trumpia_xml->DATASET_NAME[0];	
	}
	// Display object data
	public function GetInfo()
	{
		return 'Time Stamp: '.$this->time_stamp.'<br>Push Id: '.$this->push_id.'<br>Inbound Id: '.$this->inbound_id.'<br>Subscription Uid: '
			   .$this->subscription_uid.'<br>Phone Number: '.$this->phone_number.'<br>Keyword'.$this->keyword.'<br>Data Capture: '
			   .$this->data_capture.'<br>Contents: '.$this->contents.'<br>Attachments: '.$this->attachments.'<br>Dataset Id: '
			   .$this->dataset_id.'<br>Dataset Name: '.$this->dataset_name;
	}
	// Getter methods for all variables
	public function GetPushId()
	{
		return $this->push_id;
	}
	public function GetInboundId()
	{
		return $this->inbound_id;
	}
	public function GetSubscriptionUID()
	{
		return $this->subscription_uid;
	}
	public function GetPhoneNumber()
	{
		return $this->phone_number;
	}
	public function GetKeyword()
	{
		return $this->keyword;
	}
	public function GetDataCapture()
	{
		return $this->data_capture;
	}
	public function GetContents()
	{
		return $this->contents;
	}
	public function GetAttachment()
	{
		return $this->attachment;
	}
	public function GetDataSetId()
	{
		return $this->dataset_id;
	}
	public function GetDataSetName()
	{
		return $this->dataset_name;
	}
}


// Check for POST method in HTTP request to trigger script
if(!$_GET[xml])
{

	return;
}
	// Store xml string in to simple XML object 
	// Allows for simple parsing 
	$xml_string = simplexml_load_string(
	(string) $_GET['xml']
	    , null
	    , LIBXML_NOCDATA
	);

	// Opening log file
	$fp = fopen('TrumpiaLog.csv', 'a');
	// Sanity check to ensure the xml object is TRUMPIA
	if($xml_string->getName() == "TRUMPIA"){
		// Initialize Trumpia Object with pushed xml elements 
		$Trumpia_data = new Trumpia($xml_string);
		// Write data to be logged, this is interchangeable
		fputcsv($fp,[$Trumpia_data->GetSubscriptionUID(),$Trumpia_data->GetPhoneNumber(),$Trumpia_data->GetKeyword(),$Trumpia_data->GetContents()]);
		fclose($fp);

	}

?>