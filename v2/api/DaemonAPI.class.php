<?php
require_once 'API.class.php';
require_once 'Daemon.class.php';
require_once 'DaemonContainer.class.php';
require_once 'Database.class.php';
require_once 'Config.class.php';

class DaemonAPI extends API
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

    private function responseString($string) {
        // Initialize Sanitization
        $cleanString = $string;
        // Add slash to double quotes - used for JSON format
        // Doesn't need addslashes for single quotes
        //$cleanString = preg_replace('/"/', '\"',$cleanString);
        // Replace line breaks with <br>
        $cleanString = preg_replace( "/\r|\n/", "<br>", $cleanString);
        // Prevent double breaks
        $cleanString = preg_replace( "/<br><br>/", "<br>", $cleanString);
        // Return sanitized string in JSON format
        //return '{"response":"'.$cleanString.'"}';
        return $cleanString;
    }

    private function responseTextarea($string) {
        // Initialize Sanitization
        $cleanString = addslashes($string);
        // Add slash to double quotes - used for JSON format
        // Doesn't need addslashes for single quotes
        //$cleanString = preg_replace('/"/', '\"',$cleanString);
        // Replace backslashses
        //$cleanString = preg_replace('/\\\\/', '\\',$cleanString);
        // Replace line breaks with <br>
        $cleanString = preg_replace( "/\r|\n/", '/&#013;&#010;/', $cleanString);
        // Prevent double breaks
        $cleanString = preg_replace( "/<br><br>/", "<br>", $cleanString);
        // Return sanitized string in JSON format
        return '{"response":"'.$cleanString.'"}';
    }

    protected function listDaemons() {
		$DaemonContainer = new DaemonContainer();
        return $DaemonContainer->getInfoJSON();
    }

	protected function addDaemon() {
				$this->dbcon = new DB();
				$sql = "SELECT SERVERID FROM SERVER WHERE SERVER.NAME='".$_POST['Host']."';";
				$result1 = $this->dbcon->do_num_rows($this->dbcon->query($sql));
				if ($result1 == 0){
					$sql = "INSERT IGNORE INTO SERVER (NAME,ADMIN) values ('".$_POST['Host']."',0);";
					$this->dbcon->query($sql);
				}
				$sql = "SELECT VENDORID FROM VENDOR WHERE VENDOR.NAME='".$_POST['Vendor']."';";
				$result2 = $this->dbcon->do_num_rows($this->dbcon->query($sql));
				if ($result2 == 0){
					$sql = "INSERT INTO ADDRESS (LOCATION,ADDRESS) values (NULL,NULL);";
					$this->dbcon->query($sql);
					$sql = "INSERT IGNORE INTO VENDOR (NAME,ADDRESSID,TYPE) values ('".$_POST['Vendor']."',(SELECT MAX(ADDRESSID) FROM ADDRESS),0);";
					$this->dbcon->query($sql);
				}
				$daemonlocation = str_replace("\\","/",$_POST['DaemonLocation']);
				$lmgrdLocation = str_replace("\\","/",$_POST['LmgrdLocation']);
				$flexlogLocation = str_replace("\\","/",$_POST['FlexlogLocation']);
				$optionsLocation = str_replace("\\","/",$_POST['OptionsLocation']);
				
				
				//$tag = "<NODAEMON>".$_POST['Vendor'];
				$sql = "INSERT IGNORE INTO DAEMON (SERVERID,MASTERID,DORDER,NAME,PORT,VENDORID,OWNER,DAEMONLOC,LMGRDLOC,FLEXLOGLOC,OPTIONSLOC) values
				   ((SELECT SERVERID from SERVER where NAME = '".$_POST['Host']."'),0,0,
				   '".$_POST['Daemon']."','".$_POST['Port']."',
				   (SELECT VENDORID from VENDOR where NAME = '".$_POST['Vendor']."'),'".$_POST['Owner']."','".$daemonlocation."','".$lmgrdLocation."',
				   '".$flexlogLocation."','".$optionsLocation."');";
				//return ($sql);
				$this->dbcon->query($sql);

		$DaemonContainer = new DaemonContainer();
        return $DaemonContainer->getInfoJSON();

    }
	protected function editDaemon() {
				$this->dbcon = new DB();

				// update server if does not exist
				$sql = "SELECT SERVERID FROM SERVER WHERE SERVER.NAME='".$_POST['Host']."';";
				$result1 = $this->dbcon->do_num_rows($this->dbcon->query($sql));
				if ($result1 == 0){
					$sql = "INSERT IGNORE INTO SERVER (NAME,ADMIN) values ('".$_POST['Host']."',0);";
					$this->dbcon->query($sql);

				} /*else {
					$sql = "UPDATE SERVER SET LOCATION = '".$_POST['Location']."' WHERE SERVER.NAME='".$_POST['Host']."';";
					$this->dbcon->query($sql);
				}*/
				$sql = "SELECT VENDORID FROM VENDOR WHERE VENDOR.NAME='".$_POST['Vendor']."';";
				$result2 = $this->dbcon->do_num_rows($this->dbcon->query($sql));
				if ($result2 == 0){
					$sql = "INSERT INTO ADDRESS (LOCATION,ADDRESS) values (NULL,NULL);";
					$this->dbcon->query($sql);
					$sql = "INSERT IGNORE INTO VENDOR (NAME,ADDRESSID,TYPE) values ('".$_POST['Vendor']."',(SELECT MAX(ADDRESSID) FROM ADDRESS),0);";
					$this->dbcon->query($sql);
				}
				$daemonlocation = str_replace("\\","/",$_POST['DaemonLocation']);
				$lmgrdLocation = str_replace("\\","/",$_POST['LmgrdLocation']);
				$flexlogLocation = str_replace("\\","/",$_POST['FlexlogLocation']);
				$optionsLocation = str_replace("\\","/",$_POST['OptionsLocation']);
				
				$sql = "UPDATE DAEMON SET SERVERID=(SELECT SERVERID from SERVER where NAME = '".$_POST['Host']."'),
								VENDORID=(SELECT VENDORID from VENDOR where NAME = '".$_POST['Vendor']."'),
								DAEMON.PORT='".$_POST['Port']."',
								DAEMON.OWNER='".$_POST['Owner']."',
								DAEMON.NAME='".$_POST['Daemon']."',
								DAEMON.DAEMONLOC='".$daemonlocation."',
								DAEMON.LMGRDLOC='".$lmgrdLocation."',
								DAEMON.OPTIONSLOC='".$optionsLocation."',
								DAEMON.FLEXLOGLOC='".$flexlogLocation."'
								WHERE DAEMON.DAEMONID = '".$_POST['ID']."';";
				//return ($sql);
				$this->dbcon->query($sql);


		$DaemonContainer = new DaemonContainer();
        return $DaemonContainer->getInfoJSON();

    }

    protected function infoDaemon() {
        $Daemon = new Daemon($this->args[0]);
        return $Daemon->getInfoJSON();
    }
	
	protected function toggleDaemon() {
        $command = $this->verb;
        $Daemon = new Daemon($this->args[0]);
		
       if($command =='start'){
		  
			$this->daemonLmgrdStart($Daemon->getID());
			if($this->checkDaemonStatus($Daemon->getID()) == 'true'){
				$Daemon->setStatusUp();
			} else {
				$Daemon->setStatusDown();
			}     
        }
        if($command =='stop'){
            if ($this->daemonLmDown($Daemon->getID()) == 'true'){
				if($this->checkDaemonStatus($Daemon->getID()) == 'false'){
					$Daemon->setStatusDown();
				} else {
					$Daemon->setStatusUp();
				}
			}	
        }
        return $Daemon->getStatusJSON();
    }
	
    protected function restartDaemon() {

        $Daemon = new Daemon($this->args[0]);

		if($this->daemonLmDown($Daemon->getID()) == 'true'){
			//return (boo);
            $Daemon->setStatusDown();
        }
		$this->daemonLmgrdStart($Daemon->getID());

		if ($this->checkDaemonStatus($Daemon->getID())){
            $Daemon->setStatusUp();
        }
        return $Daemon->getStatusJSON();
    }

     protected function searchFile() {
         $path = $_GET['path'];
         if(substr($path, -1) != '/') $path .= '/';
         $file = $_GET['file'];
         $searchTerm = '';
         $message = '';
         $max = 50;
         $i = 0;
         $handle = fopen($path . $file, "r");
         if(isset($_GET['search'])){
             $searchTerm = $_GET['search'];
         }
         if(isset($_GET['amount'])){
            $max = $_GET['amount'];
         }
         if ($handle) {
             while (($line = fgets($handle)) !== false) {
                 if($searchTerm == '' || strpos(strtolower($line), $searchTerm) != false){
                     $message .= $line;
                     if(++$i == $max) break;
                 }
             }
             return $this->responseString($message);
         } else {
             return 'error with file read';
         }
         fclose($handle);
     }

	 protected function addLicense(){
		 return ('boo');
	 }

	  public function checkDaemonStatus($DaemonID){

	   $this->dbcon = new DB();
	   $this->config = new Config();

		$sql = "select daemon.name as 'daemonname',daemon.daemonloc as 'daemonloc',
		daemon.licensefile as 'licensefile'from daemon where daemon.daemonid = '".$DaemonID."';";
		$result = $this->dbcon->fetch_array($this->dbcon->query($sql));

		$lmutil = $this->config->getLmutil();
		$command = "$lmutil lmstat -a -S ".$result[0][daemonname]." -c ".'"'.$result[0][daemonloc]."/".$result[0][licensefile].'"' ;
        $command2 = str_replace("/", "\\",$command);
		//return ($command2);

        exec($command2, $commandOutput);
		//return ($commandOutput[7]);
        //Parse the Array to grab the service information
		if (preg_match('/^(?=.*UP)(?=.*MASTER)/s', $commandOutput[7], $serviceStatus)==1) {
			 return 'true';
		} else {
			return 'false';

		}

     }
	 public function daemonLmDown($DaemonID){

	   $this->dbcon = new DB();
	   $this->config = new Config();

		$sql = "select daemon.name as 'daemonname',daemon.daemonloc as 'daemonloc',
		daemon.licensefile as 'licensefile'from daemon where daemon.daemonid = '".$DaemonID."';";
		$result = $this->dbcon->fetch_array($this->dbcon->query($sql));

		$lmutil = $this->config->getLmutil();
		$command = "$lmutil lmdown -q -c ".'"'.$result[0][daemonloc]."/".$result[0][licensefile].'"' ;
        $command2 = str_replace("/", "\\",$command);
		//return ($command2);
		exec($command2, $commandOutput);
		//return ($commandOutput[5]);
		//Parse the Array to grab the service information
		if (preg_match('/^(?=.*License)(?=.*Server)(?=.*shut)(?=.*down)/s', $commandOutput[5])==1) {
			 return 'true';
		} else {
			return 'false';
		}

     }

	 public function daemonLmgrdStart($DaemonID){

	   $this->dbcon = new DB();
	   $this->config = new Config();
		$sql = "select daemon.name as 'daemonname',daemon.licensefile as 'licensefile',
		daemon.daemonloc as 'daemonloc', daemon.lmgrdloc as 'lmgrdloc',daemon.lmgrdfile as 'lmgrdfile',
		daemon.lmgrdloc as 'lmgrdloc',daemon.lmgrdfile as 'lmgrdfile',daemon.flexlogloc as 'flexlogloc',
		daemon.flexlogfile as 'flexlogfile' from daemon where daemon.daemonid = '".$DaemonID."';";
		$result = $this->dbcon->fetch_array($this->dbcon->query($sql));
		//$lmgrd = $this->config->getLmgrd();
		$command = '"'.$result[0][lmgrdloc]."/".$result[0][lmgrdfile].'"'." -c ".'"'.$result[0][daemonloc]."/".$result[0][licensefile].'"'." -l ".'"'.$result[0][flexlogloc]."/".$result[0][flexlogfile].'"' ;

		$command2 = str_replace("/", "\\",$command);
		//return ($command2);
		exec($command2);
		sleep(1);		
     }

	 public function daemonGetVersion($DaemonID){
		$this->dbcon = new DB();
		$this->config = new Config();

		$sql = "select daemon.name as 'daemonname',daemon.daemonloc as 'daemonloc',
		daemon.licensefile as 'licensefile'from daemon where daemon.daemonid = '".$DaemonID."';";
		$result = $this->dbcon->fetch_array($this->dbcon->query($sql));

		$lmutil = $this->config->getLmutil();
		$command = "$lmutil lmstat -a -S ".$result[0][daemonname]." -c ".'"'.$result[0][daemonloc]."/".$result[0][licensefile].'"' ;
        $command2 = str_replace("/", "\\",$command);
		//return ($command2);

        exec($command2, $commandOutput);
		$result = explode(" ",$commandOutput[7]);
		return array_pop($result);

	 }

     protected function viewLicense(){
		 //return $_GET['path']." ".$_GET['file'];
         $path = $_GET['path'];
         if(substr($path, -1) != '/') $path .= '/';
         $file = $_GET['file'];
         $message = '';
         $handle = fopen($path . $file, "r");
         if ($handle) {
             while (($line = fgets($handle)) !== false) {
                 $message .= $line;
             }
             fclose($handle);
             return $message;
         } else {
             return 'error with file read: ' . $path . $file;
         }
     }

	 protected function editLicense(){
        $path = $_POST['path'];
        // if path doesn't have "/" at the end
        if(substr($path, -1) != '/') $path .= '/';
        $file = $_POST['file'];
        // break apart file for name and extenstion
        $fileParts = explode('.', $file);
        $fileExt = $fileParts[count($fileParts) - 1];
        // pop last element of fileParts array and implode on delimeter
        // this is for names like daemon.class.php
        array_pop($fileParts); // take out extension
        $fileName = implode('.', $fileParts);
        // get content
        $content = $_POST['fileContents'];
        $newName =  $_POST['newName'];
        $newFile =  $_POST['newFile'];
        if($newFile){
            $backupFile = $path . $fileName . '_backup.' . $fileExt;
            copy($path . $file, $backupFile);
        }
        if(trim($newName) != ''){
            $handle = fopen($path . $newName . "." . $fileExt, "w");
        }
        else{
            $handle = fopen($path . $file, "w") or die("Unable to open file!");
        }
        fwrite($handle, $content);
        fclose($handle);
     }

	protected function viewOptions(){
		 //return $_GET['path']." ".$_GET['file'];
         $path = $_GET['path'];
         if(substr($path, -1) != '/') $path .= '/';
         $file = $_GET['file'];
         $message = '';
         //$handle = fopen("../logs/license.txt", "r");
         //$handle = fopen("../logs/license.txt", "r");
         $handle = fopen($path . $file, "r");
         if ($handle) {
             while (($line = fgets($handle)) !== false) {
                 $message .= $line;
             }
             fclose($handle);
             return $message;
         } else {
             return 'error with file read: ' . $path . $file;
         }
     }

	 protected function viewLmgrd(){
		 //return $_GET['path']." ".$_GET['file'];
         $path = $_GET['path'];
         if(substr($path, -1) != '/') $path .= '/';
         $file = $_GET['file'];
         $message = '';
         //$handle = fopen("../logs/license.txt", "r");
         //$handle = fopen("../logs/license.txt", "r");
         $handle = fopen($path . $file, "r");
         if ($handle) {
             while (($line = fgets($handle)) !== false) {
                 $message .= $line;
             }
             fclose($handle);
             return $message;
         } else {
             return 'error with file read: ' . $path . $file;
         }
     }

	 protected function editOptions(){
        $path = $_POST['path'];
        if(substr($path, -1) != '/') $path .= '/';
        $file = $_POST['file'];
        $content = $_POST['fileContents'];
        $newfile = $path . $file . ".backup";
        copy($path . $file, $newfile);
        $handle = fopen($path . $file, "w") or die("Unable to open file!");
        fwrite($handle, $content);
        fclose($handle);
     }

     public function recoverLicense(){
         return 'recover license response text';
     }

     public function rereadLicense(){

	    $this->config = new Config();

		$licensePath = $_GET['DaemonLocation']."/".$_GET['LicenseFile'];

		$lmutil = $this->config->getLmutil();
		$command = "$lmutil lmreread -c ".'"'.$licensePath.'"';

		$command2 = str_replace("/", "\\",$command);
		//return ($command2);
		exec($command2, $commandOutput);
		//Parse the Array to grab the service information
		if (preg_match('/^(?=.*lmreread)(?=.*successful)/s', $commandOutput[2])==1) {
			 return 'true';
		} else {
			return 'false';
		}

	 }

     public function testPath(){
         $path = $_GET['testPath'];
         $exists = 'false';
         if(file_exists($path)) $exists = 'true';
         return '{"response":'.$exists.'}';
     }

     public function updateLicenses(){
         $dir = $_GET['path'];
         $files = scandir($dir);
         $filteredFiles = array();
         $response = '{"response": [';
         $arrSize = count($files);
         for($i=0; $i<$arrSize;$i++){

             if(preg_match('/^([a-zA-Z -_]+)\.([a-zA-Z -_\.]+)$/',$files[$i])){
                 $filteredFiles[] = $files[$i];
             }

             //$filteredFiles[] = $files[$i];
         }
         $newArrSize = count($filteredFiles);
         for($i=0; $i<$newArrSize; $i++){
             $response .= '"' . $filteredFiles[$i] . '"';
             if($i!=$newArrSize-1) $response .= ",";
         }
         $response .= ']}';
         return $response;
     }
	public function updateLicenseFile(){
		//return $_POST['licenseFile']." ".$_POST['DaemonID'];
		 $this->dbcon = new DB();
		 $sql = "UPDATE DAEMON SET LICENSEFILE = '".$_POST['licenseFile']."' WHERE DAEMON.DAEMONID ='".$_POST['DaemonID']."';";
		 //return ($sql);
		 $this->dbcon->query($sql);

         //return $_POST['licenseFile']." ".$_POST['DaemonID'];
     }

     public function updateOptionsFile(){
		 //return $_POST['OptionsFile']." ".$_POST['DaemonID'];
		 $this->dbcon = new DB();
		 $sql = "UPDATE DAEMON SET OPTIONSFILE = '".$_POST['OptionsFile']."' WHERE DAEMON.DAEMONID ='".$_POST['DaemonID']."';";
		 //return ($sql);
		 $this->dbcon->query($sql);

     }

	 public function updateLmgrdFile(){
		 //return $_POST['LmgrdFile']." ".$_POST['DaemonID'];
		 $this->dbcon = new DB();
		 $sql = "UPDATE DAEMON SET LMGRDFILE = '".$_POST['LmgrdFile']."' WHERE DAEMON.DAEMONID ='".$_POST['DaemonID']."';";
		 //return ($sql);
		 $this->dbcon->query($sql);

     }

	 public function updateFlexlogFile(){
		 //return $_POST['LmgrdFile']." ".$_POST['DaemonID'];
		 $this->dbcon = new DB();
		 $sql = "UPDATE DAEMON SET FLEXLOGFILE = '".$_POST['FlexlogFile']."' WHERE DAEMON.DAEMONID ='".$_POST['DaemonID']."';";
		 //return ($sql);
		 $this->dbcon->query($sql);

     }
}
?>
