<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require 'vendor/autoload.php';
 
$object = new Mailer_Self();
$object->actualSend($email, $from, $subject, $messages, $company, $filename );
 
class Mailer_Self  {
    
    private $server = SERVER;
    private $username= USERNAME;
    private $password = PASSWORD;
    protected $dbName = DBNAME;
    
    
    
    public function actualSend($email, $from, $subject, $message, $company, $filename = '') {
        $mail = new PHPMailer(true);   
  
        try { 
            
            /*******************************************************/ 
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;
            //$host = preg_replace('/^www\./', '', $_SERVER['SERVER_NAME']);   
            $mail->Host = $company['c_smtp_server']; // 'mail.'.$host; //  webmail provider's SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = $from; //   webmail email address
            $mail->Password = $company['c_send_from_password']; //emai password
            $mail->Port = 26;
            /***************************************************************/
            
            
            
            //$mail->SMTPKeepAlive = true;
         
            $mail->setFrom($from , $company['c_name']);  
            $i = 0;
            $sentemails = [];
            foreach ($email as $email_row) { 
                if (in_array($email_row, $sentemails)) continue;
                $sentemails[] = $email_row; 
                $mail->addBCC($email_row); 
                  
                $mail->isHTML(true);                                 
                $mail->Subject = $subject ?? 'Test from mail auto';
                $mail->Body    = $message[$i] ?? "<div> Just a test message if working fine </div>";
                $altbody = $message[$i] ?? 'Alt body';
                $mail->AltBody = strip_tags($altbody) ;

				if (!empty($filename)) {
					$mail->AddAttachment("{$_SERVER['DOCUMENT_ROOT']}/public/assets/uploads/{$filename}", $filename);
					//$pdfData = base64_encode(file_get_contents('/path/to/file.pdf'));
					//$pdfDecoded = base64_decode($pdfData); 
					//$mail->addStringAttachment($pdfDecoded, 'manual.pdf', 'base64', 'application/pdf');
				}
				
                if ( !empty($_FILES['file']['name'][0]) ) {
                    
                	for ( $j = 0; $j < count($_FILES['file']['name']); $j++ ) { 
                        $file_tmp  = $_FILES['file']['tmp_name'][$j];
                        $file_name = $_FILES['file']['name'][$j];
                
                        $mail->AddAttachment($file_tmp, $file_name);
                	}
        	
                }
                
                $status = $mail->send() ? 'success' : 'fail'; 
                $this->_insert("email_logs", "recipient, status, message", [$email_row, $status, $mail->ErrorInfo] );
                $i++;
				$mail->clearAllRecipients();
				//$mail->clearAttachments();
            }
            $mail->SmtpClose();
            
            if (isset($subject))   return 'Success';
            else echo "Success";
        } catch (Exception $e) {
            file_put_contents('ab.txt', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            if (!isset($subject))  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
         
    }
    
    public function connection() {
          
        try {
            $dsn = 'mysql:host=' . $this->server . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
           //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("<div style='padding:20px;margin-top:10%; background:lightgrey' class='shadow'> <h1 style='background:grey;margin:10px;' >Connection failed...</h1> 
            <p> There are too many users online. Please refresh the page or try again after a few seconds.</p></div>");
            echo "Connection failed:\r\n" . $e->getMessage();
        }
       
    }
    
    /**
	 * @return string json_encoded string
	 */
	protected function _insert(string $table, string $columns = '', array $values = [] )  {
	
		$sql = "INSERT INTO $table ($columns) VALUES ({$this->_where($columns, ',', '?')}) ";		
		//echo $sql;die;
		$stmt = $this->connection()->prepare($sql);
		$eq = ($stmt->execute( $values ));
	 	
	}
	
	private function _where($where, $del = 'and', $placeholders = '', $delrule = '') {
		$exp = explode(',', $where);

		
		if (!empty($delrule)) {
			$delall = explode(',', $delrule);
		}
		$where1 = '';
		$i = 0;
		$j = count($exp);
		foreach ($exp as $ex ) {

			if ( ($j - 1) != $i )
				if (!empty($delrule)) {
					$del = $delall[$i];
				}
			$_e1 = explode(' ', trim($ex));
			if (isset($_e1[1]) && (!empty($_e1[1])) ) {
				$ex = $_e1[0];
				$s = $_e1[1];
			} else $s = '=';

			if (!empty( $placeholders)) {
				if ( ($j - 1) == $i ) $where1 .= '? ';
				else $where1 .= "?, ";
			} else {
				if ( ($j - 1) == $i ) $where1 .= $ex . " $s ? ";
				else $where1 .= $ex . " $s ? $del ";
			}
			$i++;
		}
		return $where1;
	}
	
	
}


