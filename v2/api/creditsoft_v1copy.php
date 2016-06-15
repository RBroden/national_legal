<?php
/**
 * Created by IntelliJ IDEA.
 * User: rbroden
 * Date: 6/2/2016
 * Time: 10:33 PM
 */

function br(){
    echo "<br><br>";
}

error_reporting(E_ALL);
ini_set('display_errors', '1');
$url = "http://hal.nationallegal.com/WSICCOCore.svc?wsdl";

$client = new SoapClient($url, array("trace" => 1, "exception" => 0));

//var_dump($client->__getFunctions());
//br();

$date = date("d/m/Y");
$date2 = date("m/d/Y h:i:s");
$date3 = date("Y-m-d h:i:s");
$date4 = date("Y-m-d h:i:s");
$date5 = "2009-06-15 20:45:30";

$SOAPCall = "AddLead";
$SoapCallParameters = new stdClass();
$SoapCallParameters->FirstName = "Robby";
$SoapCallParameters->LastName = "Broden";
$SoapCallParameters->MiddleInitial = "P";
$SoapCallParameters->Phone = "954-255-2622";
$SoapCallParameters->Fax = "";
$SoapCallParameters->Date = "05/05/2015";
$SoapCallParameters->Email = "todd.williams@icco.com";
$SoapCallParameters->WorkPhone = "";
$SoapCallParameters->CellPhone = "954-255-2623";
//$SoapCallParameters->SSN = "";
$SoapCallParameters->Street = "123 Main Street";
$SoapCallParameters->City = "Coral Springs";
$SoapCallParameters->State = "FL";
$SoapCallParameters->Zip = "33065";
$SoapCallParameters->UserDefined1 = "TEST!";
//$SoapCallParameters->PreferredCommunication = "";
//$SoapCallParameters->Gender = "";
//$SoapCallParameters->StartDate = "";
//$SoapCallParameters->ProgramScheduleID = "";
//$SoapCallParameters->SalesForceID = "";
//$SoapCallParameters->LocationID = "";
//$SoapCallParameters->Counselor_UserID = "";
//$SoapCallParameters->DOB = "";

try {
    $obj = $client->AddLead($SoapCallParameters);
}
catch (Exception $e)
{

    echo '<p style="color: #900;">Error! ';
    //echo $e -> getMessage ();
    echo 'Last response: '. $client->__getLastResponse();

}
if(isset($obj)) var_dump($obj);
else{
    echo "<p>obj not set</p>";
}
//br();
echo "<p>version 2 - " . $date2 . "</p>";

/*
$wsdl = 'http://hal.nationallegal.com/WSICCOCore.svc?wsdl';

$trace = true;
$exceptions = false;

$xml_array['FirstName'] = 'Pomona';
$xml_array['LastName'] = 'Test';
$xml_array['MiddleName'] = "D";
$xml_array['HomePhone'] = "954-255-2622";
$xml_array['Fax'] = "";
$xml_array['DateEntered'] = "7/4/2008";
$xml_array['Email'] = "todd.williams@icco.com";
$xml_array['WorkPhone'] = "";
$xml_array['Mobile'] = "954-255-2623";
$xml_array['SSN'] = NULL;
$xml_array['Address1'] = "123 Main Street";
$xml_array['City'] = "Coral Springs";
$xml_array['State'] = "FL";
$xml_array['Zip'] = "33065";
$xml_array['UserDefined1'] = "TEST!";
//$xml_array['PreferredCommunication'] = null;
//$xml_array['Gender'] = null;
//$xml_array['StartDate'] = date("Y-m-d H:i:s");
//$xml_array['ProgramScheduleID'] = null;
//$xml_array['SalesForceID'] = null;
//$xml_array['LocationID'] = null;
//$xml_array['Counselor_UserID'] = null;
//$xml_array['DOB'] = date("Y-m-d H:i:s");

function br(){
    echo "<br><br>";
}

try
{
    //$client = new SoapClient($wsdl, array("trace" => 1, "exception" => 0));
    //$result = $client->AddLead("Todd", "Williams", "D", "954-255-2622", "", "7/4/2008", "todd.williams@icco.com", "", "954-255-2623", "123456789", "123 Main Street", "Coral Springs", "FL", "33065", "TEST!");
    /*
    if (is_soap_fault($result)) {
        trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);
    }

    //echo '<br> ----------------<br>';
    //$response = $client->__soapCall("AddLead",$xml_array);
    //$response = $client->__getFunctions();
    $client = new SoapClient('http://hal.nationallegal.com/WSICCOCore.svc?wsdl', array("trace" => 1, "exception" => 0));
    /*
    $apiCalls = array($client->__getFunctions());
    foreach($apiCalls as $key => $value){
        echo $key . ": " . $value . "<br>";
    }

    var_dump($client->__getFunctions());
    br();
    var_dump($client->__getTypes());
    br();
    //$result = $client->AddLead("Todd", "Williams", "D", "954-255-2622", "", "7/4/2008", "todd.williams@icco.com", "", "954-255-2623", Null, "123 Main Street", "Coral Springs", "FL", "33065", "TEST!");
    $result = $client->__soapCall("AddLead",$xml_array);
    //$result = $client->__soapCall("AddLead", array("Todd", "Williams", "D", "954-255-2622", "", "7/4/2008", "todd.williams@icco.com", "", "954-255-2623", Nothing, "123 Main Street", "Coral Springs", "FL", "33065", "TEST!"));
    // check ACH
    //$result = $client->__soapCall("AddLeadBankAccount", array("LeadID" => 1001, AccType => "Checking", BankName => "BankName", ABA => "ABAsdfefe",  BankAccountNumber => "sssssfffffjjjjjggggg"));
    //var_dump($client->__getFunctions());
    //$result = $client->__soapCall("AddLead", array("FirstName" => "Todd"));
}

catch (Exception $e)
{

    echo "Error!";
    echo $e -> getMessage ();
    echo 'Last response: '. $client->__getLastResponse();

    //trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring})", E_USER_ERROR);
}

//var_dump($response.ErrorDescription);
if(isset($result)) var_dump($result);
br();
echo 'version 2 - ' . date("Y-m-d H:i:s");

*/
