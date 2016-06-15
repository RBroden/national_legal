<?php
require_once 'API.class.php';

class CreditSoftAPI extends API
{
    protected $User;

    public function __construct($request, $origin) {
        parent::__construct($request);
        // Abstracted out for example
        // Use if you want to include users and apikeys
        /*
        $APIKey = new Models\APIKey();
        $User = new Models\User();

        if (!array_key_exists('apiKey', $this->request)) {
            throw new Exception('No API Key provided');
        } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
            throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
             !$User->get('token', $this->request['token'])) {

            throw new Exception('Invalid User Token');
        }

        $this->User = $User;
        */
    }

    private function cleanInput($data, $type) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function addLead() {
        $url = "http://hal.nationallegal.com/WSICCOCore.svc?wsdl";
        $client = new SoapClient($url, array("trace" => 1, "exception" => 0));
        $SoapCallParameters = new stdClass();
        $SoapCallParameters->FirstName = $_POST['FirstName'];
        $SoapCallParameters->LastName = $_POST['LastName'];
        $SoapCallParameters->MiddleInitial = $_POST['MiddleInitial'];
        $SoapCallParameters->Phone = $_POST['Phone'];
        $SoapCallParameters->Fax = $_POST['Fax'];
        $SoapCallParameters->Date = date("j/n/Y"); // generate here
        $SoapCallParameters->Email = $_POST['Email'];
        $SoapCallParameters->WorkPhone = $_POST['WorkPhone'];
        $SoapCallParameters->CellPhone = $_POST['CellPhone'];
        //$SoapCallParameters->SSN = $_POST['SSN'];
        $SoapCallParameters->Street = $_POST['Street'];
        $SoapCallParameters->City = $_POST['City'];
        $SoapCallParameters->State = $_POST['State'];
        $SoapCallParameters->Zip = $_POST['Zip'];
        $SoapCallParameters->UserDefined1 = $_POST['UserDefined1'];
        $SoapCallParameters->PreferredComunication = $_POST['PreferredComunication'];
        $SoapCallParameters->Gender = $_POST['Gender'];
        $SoapCallParameters->StartDate = $_POST['StartDate'];
        $SoapCallParameters->ProgramScheduleID = $_POST['ProgramScheduleID'];
        $SoapCallParameters->SalesForceID = $_POST['SalesForceID'];
        $SoapCallParameters->LocationID = $_POST['LocationID'];
        $SoapCallParameters->Counselor_UserID = $_POST['Counselor_UserID'];
        $SoapCallParameters->DOB = $_POST['DOB'];
        try {
            $client->AddLead($SoapCallParameters);
        }
        catch (Exception $e)
        {
            return '{status : false, error : "Call failed"}';
        }
        $response = $client->__getLastResponse();
        preg_match( '/<a:ErrorDescription>(.*?)<\/a:ErrorDescription>/', $response, $selectError);
        $error = $selectError[1]; // error message is in position 1
        preg_match( '/<a:RecordID>(.*?)<\/a:RecordID>/', $response, $selectRecord);
        $record = $selectRecord[1]; // record is in position 1
        if($error == null){
            $status = 'true';
        }
        else{
            $status = 'false';
        }
        return '{"status" : '.$status.', "error" : "'.$error.'", "record" : "'.$record.'"}';
    }

    protected function addLeadDataObject() {
        $url = "http://hal.nationallegal.com/WSICCOCore.svc?wsdl";
        $client = new SoapClient($url, array("trace" => 1, "exception" => 0));
        $SoapCallParameters = new stdClass();
        $SoapCallParameters->NewLead = new stdClass();
        $SoapCallParameters->NewLead->Address1 = $_POST['Address1'];
        $SoapCallParameters->NewLead->Address2 = $_POST['Address2'];
//        $SoapCallParameters->AdvertisingID = $_POST['AdvertisingID'];
//        $SoapCallParameters->AttorneyCL = $_POST['AttorneyCL'];
//        $SoapCallParameters->Bankruptcy = $_POST['Bankruptcy'];
//        $SoapCallParameters->BankruptcyAttorney = $_POST['BankruptcyAttorney'];
//        $SoapCallParameters->BankruptcySessionAmount = $_POST['BankruptcySessionAmount'];
//        $SoapCallParameters->BankruptcySessionPaidStatus = $_POST['BankruptcySessionPaidStatus'];
//        $SoapCallParameters->BankruptcySessionPaymentType = $_POST['BankruptcySessionPaymentType'];
        $SoapCallParameters->NewLead->CellPhone = $_POST['CellPhone'];
        $SoapCallParameters->NewLead->City = $_POST['City'];
//        $SoapCallParameters->ClientID = $_POST['ClientID']; // will overwrite existing client
//        $SoapCallParameters->CollectionCL = $_POST['CollectionCL'];
//        $SoapCallParameters->ContactMethodID = $_POST['ContactMethodID'];
//        $SoapCallParameters->Counselor_UserID = $_POST['Counselor_UserID'];
//        $SoapCallParameters->CreditorComments = $_POST['CreditorComments'];
//        $SoapCallParameters->CurrentMonthlyPayments = $_POST['CurrentMonthlyPayments'];
//        $SoapCallParameters->DMPDebtRangeID = $_POST['DMPDebtRangeID'];
//        $SoapCallParameters->DOB = $_POST['DOB'];
        $SoapCallParameters->NewLead->DateEntered = date("Y-m-d");// date("j/n/Y"); // generate here
//        $SoapCallParameters->DateStart = $_POST['DateStart'];
//        $SoapCallParameters->DebtorBillStatus = $_POST['DebtorBillStatus'];
//        $SoapCallParameters->DebtorRepaymentPlan = $_POST['DebtorRepaymentPlan'];
//        $SoapCallParameters->DriverLicense = $_POST['DriverLicense'];
//        $SoapCallParameters->DriverLicenseState = $_POST['DriverLicenseState'];
        $SoapCallParameters->NewLead->Email = $_POST['Email'];
//        $SoapCallParameters->Employeer = $_POST['Employeer'];
//        $SoapCallParameters->EnteredBy = $_POST['EnteredBy'];
        $SoapCallParameters->NewLead->EstimatedMonthlyPayment = $_POST['EstimatedMonthlyPayment'];
//        $SoapCallParameters->EthnicityID = $_POST['EthnicityID'];
        $SoapCallParameters->NewLead->Fax = $_POST['Fax'];
        $SoapCallParameters->NewLead->FirstName = $_POST['FirstName'];
//        $SoapCallParameters->Gender = $_POST['Gender'];
//        $SoapCallParameters->GrossIncome = $_POST['GrossIncome'];
//        $SoapCallParameters->HomePhoneTime = $_POST['HomePhoneTime'];
//        $SoapCallParameters->Language = $_POST['Language'];
        $SoapCallParameters->NewLead->LastName = $_POST['LastName'];
//        $SoapCallParameters->LocationID = $_POST['LocationID'];
//        $SoapCallParameters->MaidenName = $_POST['MaidenName'];
//        $SoapCallParameters->Marital = $_POST['Marital'];
        $SoapCallParameters->NewLead->MiddleInitial = $_POST['MiddleInitial'];
//        $SoapCallParameters->MilitaryStatusID = $_POST['MilitaryStatusID'];
        $SoapCallParameters->NewLead->Notes = "Test Notes";//$_POST['Notes'];
//        $SoapCallParameters->NumberofAccount = $_POST['NumberofAccount'];
//        $SoapCallParameters->NumberofChildren = $_POST['NumberofChildren'];
//        $SoapCallParameters->NumberofParents = $_POST['NumberofParents'];
//        $SoapCallParameters->OTRDetail = $_POST['OTRDetail'];
//        $SoapCallParameters->Occupation = $_POST['Occupation'];
//        $SoapCallParameters->PINNumber = $_POST['PINNumber'];
//        $SoapCallParameters->PaymentDay = $_POST['PaymentDay'];
        $SoapCallParameters->NewLead->Phone = $_POST['Phone'];
//        $SoapCallParameters->PreferredComunication = $_POST['PreferredComunication'];
        $SoapCallParameters->NewLead->ProgramScheduleID = 1;//$_POST['ProgramScheduleID'];
//        $SoapCallParameters->ProposalComments = $_POST['ProposalComments'];
//        $SoapCallParameters->RaceID = $_POST['RaceID'];
//        $SoapCallParameters->ReasonID = $_POST['ReasonID'];
//        $SoapCallParameters->Referral = $_POST['Referral'];
//        $SoapCallParameters->RentOwn = $_POST['RentOwn'];
//        $SoapCallParameters->ResponseErrorDescription = $_POST['ResponseErrorDescription'];
//        $SoapCallParameters->SSN = $_POST['SSN'];
//        $SoapCallParameters->SalesForceID = $_POST['SalesForceID'];
//        $SoapCallParameters->Salutation = $_POST['Salutation'];
        $SoapCallParameters->NewLead->State = $_POST['State'];
//        $SoapCallParameters->TaxFilingJointly = $_POST['TaxFilingJointly'];
//        $SoapCallParameters->TypeCall = $_POST['TypeCall'];
//        //$SoapCallParameters->User->Password = $_POST['User_Password'];
//        //$SoapCallParameters->User->UserName = $_POST['User_UserName'];
        $SoapCallParameters->NewLead->UserDefined1 = $_POST['UserDefined1'];
//        $SoapCallParameters->UserDefined2 = $_POST['UserDefined2'];
//        $SoapCallParameters->UserDefined3 = $_POST['UserDefined3'];
//        $SoapCallParameters->UserDefined4 = $_POST['UserDefined4'];
//        $SoapCallParameters->UserDefined5 = $_POST['UserDefined5'];
//        $SoapCallParameters->UserDefined6 = $_POST['UserDefined6'];
//        $SoapCallParameters->UserDefined7 = $_POST['UserDefined7'];
        $SoapCallParameters->NewLead->WorkPhone = $_POST['WorkPhone'];
//        $SoapCallParameters->Working = $_POST['Working'];
//        $SoapCallParameters->Year = $_POST['Year'];
//        $SoapCallParameters->YearsAtJob = $_POST['YearsAtJob'];
        $SoapCallParameters->NewLead->Zip = $_POST['Zip'];
        try {
            $client->AddLeadDataObject($SoapCallParameters);
        }
        catch (Exception $e)
        {
            return '{status : false, error : "Call failed"}';
        }
        $response = $client->__getLastResponse();
        //return $response;
        preg_match( '/<a:ErrorDescription>(.*?)<\/a:ErrorDescription>/', $response, $selectError);
        $error = $selectError[1]; // error message is in position 1
        preg_match( '/<a:RecordID>(.*?)<\/a:RecordID>/', $response, $selectRecord);
        $record = $selectRecord[1]; // record is in position 1
        if($error == null){
            $status = 'true';
        }
        else{
            $status = 'false';
        }
        return '{"status" : '.$status.', "error" : "'.$error.'", "record" : "'.$record.'"}';
    }
}

