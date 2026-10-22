<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
#[AllowDynamicProperties]
class Model extends Database {

    // this is the main model,, all others are sub
    // main function is to pass the database connection

    function __construct()
    {
        // $this->connection = new Database();
        // $this->db = new Database();

    }
   
    
 
    /**
	 * @return string - cl could give last return ids when needed
	 */
    protected function _ms($error = false, string $ms = '', string $third = '', int $http_response = 200 ) {
		$newms = $error == false ? "Success" : "An errorr occurred";

		 
		http_response_code($http_response);
		 
		return json_encode(array(
			"error"=> $error == false ? false : true,
			"msg"=> empty($ms) ? $newms : $ms,
			"cl"=> $third
		));
		
	}  
	/**
	 * @return array 0=rowcount, 1=data
	 */ 
	protected function _get(string $table, string $where = '', array $values = [], bool $fetchall = true, string $orderby = '', string $del_rule = '' ): array {
		$substr = substr($where, 0, 1);
		if ($substr == '(') { // the first char is a (
			$where = $where;
		} else $where = $this->_where($where, 'and', '', $del_rule);

		$selectTable = "SELECT ";
		if (substr(trim($table), 0, 1) == '*') {
			$selectTable .= ltrim($table, '*');
		} else $selectTable = "SELECT * FROM $table "; 

		$countvalues = count($values);
		$sql = $countvalues == 0 ? "$selectTable $orderby" : "$selectTable WHERE $where $orderby";		
		//echo $sql; echo '<br>'; //die;
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute( $values );
        return $fetchall ? [$stmt->rowCount(), $stmt->fetchAll()] : [$stmt->rowCount(), $stmt->fetch()];
	}
	/**
	 * general query function, not used in the current version but can be used for complex queries that do not fit the other functions
	 */
	protected function _query() {
		$args = func_get_args();
		$sql = array_shift($args); 
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute( $args[0] ?? [] );
		return [$stmt->rowCount(), $stmt->fetchAll()];
	}
    /**
     * @return string value of action ie sum of columns
     */
	protected function _getmore(string $table, string $action, string $where = '', array $values = [] ):string {
		
		$sql = empty($where) ? "SELECT $action as x1 FROM $table" : "SELECT $action as x1 FROM $table WHERE {$this->_where($where)} ";		
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute( $values );
		return $stmt->fetch()['x1'] ?? '0';
	}
	
	/**
	 * @return string json_encoded string
	 */
	protected function _insert(string $table, string $columns = '', array $values = [] ):string {
		$ignore = '';
	    $exp = explode(':', $table);
	    if (isset($exp[1])) $ignore = $exp[1];
	    $table = $exp[0]; 
	    
		$pdo = $this->connection();
		$sql = "INSERT $ignore INTO $table ($columns) VALUES ({$this->_where($columns, ',', '?')}) ";		
		//echo $sql;die;
		$stmt = $pdo->prepare($sql);
		$eq = ($stmt->execute( $values ));
		$lastId = $pdo->lastInsertId();
		return $this->_ms($eq ? false : true, '', $lastId);	
	}
    
    /**
     * @return string js-encoded feedback message
     */
	protected function _update(string $table, string $columns = '', string $where = '', array $values = [] ):string {
		
		$sql = "UPDATE $table SET {$this->_where($columns, ',')} WHERE {$this->_where($where)}";	
		$stmt = $this->connection()->prepare($sql);
		$eq = ($stmt->execute( $values ));
		return $this->_ms($eq ? false : true);	
	}

    /**
     * @return string js-encoded feedback message
     */
	protected function _delete(string $table, string $where, $values = []):string {
	
		$sql = "DELETE FROM $table WHERE {$this->_where($where)}";
		$stmt = $this->connection()->prepare($sql);
		$eq = ($stmt->execute($values ));
		return $this->_ms($eq ? false : true);
	}
	/**
	 * @param string $action  either create, delete or drop
     * 
     * @return mixed js-encoded feedback message or bool   
	 */
	protected function _tables($tablename, $action = 'create') {
		if ($action == 'delete') {
			$sql = "DELETE FROM $tablename";
			$stmt = $this->connection()->prepare($sql);
			$eq = ($stmt->execute([ ]));
			return $this->_ms($eq);
		} else if ($action == 'drop') {			
			$sql = "DROP TABLE IF EXISTS $tablename";
			$stmt = $this->connection()->prepare($sql);
			$eq = ($stmt->execute([ ]));
			return $this->_ms($eq);
		} else if ($action == 'create') {
			$sql = "CREATE TABLE $tablename (id int primary key auto_increment, val1 int, val2 varchar(20), val3 varchar(20), val4 varchar(20), val5 varchar(20) ) ";
			$stmt = $this->connection()->prepare($sql);
			if ($stmt->execute([ ])) return true;
			else return false;
			
		} else if ($action == 'complete_sql') {
			$sql = "$tablename";
			$stmt = $this->connection()->prepare($sql);
			if ($stmt->execute([ ])) return true;
			else return false;
		}
		return false;
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
	
	/**
	 * @return int user_ID
	 * @param string user_url
	 */
	protected function _getId(string $url) {		
		return $this->_get('users', 'user_url',[$url], false  )[1]['id'];
	}
    
	protected function _uniq_url($table, $columnurl) {

		for ($i = 0; $i < 10000000000; $i++) {
			$url = rand(101, 1009) . time();
			if ($this->_get($table, $columnurl, [$url], true )[0] == 0) {
				return $url;
				break;
			}
		}
	}
	protected function _uniq_p_url($names) {
		$url = $names;
		for ($i = 0; $i < 10000000000; $i++) {
			if ($i > 0) $url .= '-' . rand();
			$url = rand(101, 100009) . time(); 
			if ($this->_get('users', 'user_url', [$url], true )[0] == 0) {
				return $url;
				break;
			}
		}
	}

    protected function _gettables() {
		$sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='{$this->dbName}'  ";
		$stmt = $this->connection()->prepare($sql);
		$stmt->execute([]);
		return $stmt->fetchAll();
	}
	protected function _columns($table) {
		return $this->_get($table)[1];
	}
	public function _settings() { 
		$settings = $this->_get('settings')[1];
		$output = [ ];

		foreach($settings as $setting) {
			$output[$setting['name']] = $setting['value'];
		} 

		return $output; 
	}
	public function me($id_email = '') { 
	    
	    if (empty($id_email)) {
	        if( Session::get('userid') == null ) return [];
		    return $this->_get('users  ', 'id', [ Session::get('userid') ], false )[1];
	    }
		return $this->_get('users  ', 'id, user_email', [ $id_email, $id_email ], false, '', 'or' )[1];
	} 
    /**
     * @param string message required
     * @return void
     */
    protected function log(String $message, String $type = 'Other') {  
        $this->_insert('logs', 'l_message, l_by, l_type, l_date', [$message, Session::get('userid'), $type, time() ]);
    }
    public function categs() {
       return $this->_get('blog_categories', '',[])[1]; 
    }
  
    public function _content() {
        $content = $this->_get('contents ', '',[], true )[1];
        $output = [];
        foreach ($content as $row) {
            $body = str_replace('[site_name]', $this->_settings()['site_name'], $row['cont_body']);
           $output[$row['cont_given_id']] = ['body'=> $body, 'edit'=>$row['cont_body'], 
           'title'=>$row['cont_title'], 'image_name'=>$row['cont_img']  
           ];
        } 
        return $output;
    }
    protected function slug_unique() {
        $ur = CustomFunctions::randchars(3);
        for($i = 3;  $i < 500; $i++) {
            $ur = CustomFunctions::randchars($i);
            if ( $this->_get('blog', 'blog_slug ', [$ur])[0] == 0 ) break; 
        }
        
        return $ur;
    }
	
    protected function _unique_url($table, $col) {
        $ur = '';
        for($i = 2;  $i < 100; $i++) {
            $ur = CustomFunctions::randchars($i);
            if ( $this->_get($table, $col, [$ur])[0] == 0 ) break; 
        }
        
        return $ur;
    }
	
   private function checks_for_blog_url($slug, $table = 'blog', $col = 'blog_slug' ) {
	return ( $this->_get($table, $col, [$slug] )[0] > 0) ? true : false ;
   }
    protected function generate_clean_slug($title, $table = 'blog', $col = 'blog_slug') {
        // Step 1: Convert title to a basic slug
        $slug = strtolower($title);
        $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug); // Remove special chars
        $slug = preg_replace('/[\s-]+/', '-', $slug);       // Replace spaces and multiple hyphens with single hyphen
        $slug = trim($slug, '-');                           // Trim trailing hyphens
    
        // Step 2: Limit to 40 characters max (cleanly)
        $slug = substr($slug, 0, 45);
        $slug = rtrim($slug, '-'); // Avoid trailing hyphen after cutting
    
        // Step 3: Ensure uniqueness
        $original_slug = $slug;
        $i = 1;
        while ($this->checks_for_blog_url($slug, $table, $col )) {
            // Append a number until unique; re-trim if needed
            $suffix = '-' . $i;
            $slug = substr($original_slug, 0, 45 - strlen($suffix)) . $suffix;
            $i++;
        }
    
        return $slug;
    }
    protected function manage_tags($postid = 0 ) {
        $tags = explode(',',$_POST['tags']);  
        
        foreach($tags as $tag) { 
            $tag_data = $this->_get('tags', 'name', [$tag], 0);
            
            if ($tag_data[0] == 0 ) $this->_insert('tags', 'name', [$tag] );  
            
            $tag_data = $this->_get('tags', 'name', [$tag], 0)[1]; 
            
            $this->_insert('post_tags', 'post_id, tag_id', [$postid, $tag_data['tag_id']]);
        }
    }
    
    protected function pagination() {
        $number = (isset($_GET['pg']) && is_numeric($_GET['pg'])) ? $_GET['pg'] : 1; 
		$thisPageFirstResult = ($number - 1) * $this->_settings()['user_loop_sequence'];
		
		return " limit $thisPageFirstResult,{$this->_settings()['user_loop_sequence']} ";
    }
	public function fetch_currencies() {
		return $this->_get('currencies')[1];
	}
  

    


	
	/*********************************************
	 * 
	 * EMAIL SENDER FUNCTIONS
	 * 
	 ********************************************/
	
	protected function sendTheEmail(string $title, string $recipient, string $body, string $orignalMsgId = '', $admin = false) {
		// 
		
		file_put_contents("logs/Model.EmailByResend.log", "string $title, string $recipient, string $body, string $orignalMsgId". "\n", FILE_APPEND);

		if (!CustomFunctions::validEmail($recipient )) { return; }
		$search = ['{{title}}', '{{body}}', '{{year}}', '{{sitename}}'];
		$replace = [$title, $body, date('Y'), "<a href='#//{$_SERVER['SERVER_NAME']}'>{$this->_settings()['site_name']}</a>" ];
		$finalBody = str_replace($search, $replace, CustomFunctions::mainTemplate());

		if ($admin) {
			$this->PhpMailerConstruct($recipient, $title, $finalBody, $orignalMsgId );
			return;
		}

		try { 
			 
			if (!$this->EmailByResend( $recipient, $title, $finalBody, $orignalMsgId ) ) {
				//use sendmail if resend did not work...
				$this->PhpMailerConstruct($recipient, $title, $finalBody, $orignalMsgId );
			}
			 
		} catch(Exception $e) {
			//try again
			file_put_contents("logs/Model.sendthemail.log", "$e \n", FILE_APPEND);
			try {$this->PhpMailerConstruct($recipient, $title, $finalBody, $orignalMsgId );} catch(Exception $d){}
		}

		//the rest

	}

	
	public function PhpMailerConstruct(mixed $email, string $subject, mixed $body, string $orignalMsgId = '', $filename = '') {
		    
        $body1 = [];
        if (!is_array($email)) $email = [$email];
        
        if (!is_array($body)) { 
            for ($j = 0; $j < count($email); $j++)  $body1[] = $body;
        } else $body1 = $body;
            
        $messages = []; 
        $i = 0;
        foreach ($email as $rowemail) {     
    	    $messages[] = $body1[$i];
    	    $i++;
        } 

		$this->ActualSendPHPMailer($email, $subject, $messages, $orignalMsgId, $filename);
	}

	
protected function EmailByResend(
    string $recipient,
    string $title,
    string $finalBody,
    string $orignalMsgId = ''
) {
    try {
        $resend  = Resend::client(RESEND_API_KEY);
        $settings = $this->_settings();
 

		$emails = explode(',', $recipient);
		$to = array_shift($emails); // First email is the main recipient

        $payload = [
            'from'    => "{$settings['short_name']} <{$settings['send_from']}>",
            'to'      => $to,
			'bcc'     => $emails,
            'subject' => $title,
            'text'    => strip_tags($finalBody),
            'html'    => $finalBody,
        ]; 

        if (!empty($orignalMsgId)) {
            $payload['headers'] = [
                'In-Reply-To' => $orignalMsgId,
                'References'  => $orignalMsgId,
            ];
        }
		
        $rawFeed = $resend->emails->send($payload);

        file_put_contents(
            "logs/Model.EmailByResend.log",
            "RESPONSE CLASS: " . get_class($rawFeed) . "\n" .
            "RESPONSE:\n" . print_r($rawFeed, true) . "\n",
            FILE_APPEND
        );

        /*
         * Resend successfully accepted the email.
         */

        // SDK response exposes id directly
        if (is_object($rawFeed) && !empty($rawFeed->id)) {
            return true;
        }

        // Some SDK versions expose the response through toArray()
        if (is_object($rawFeed) && method_exists($rawFeed, 'toArray')) {
            $data = $rawFeed->toArray();

            if (!empty($data['id'])) {
                return true;
            }

            // Some response wrappers may contain data
            if (!empty($data['data']['id'])) {
                return true;
            }
        }

        // Array response
        if (is_array($rawFeed)) {
            if (!empty($rawFeed['id'])) {
                return true;
            }

            if (!empty($rawFeed['data']['id'])) {
                return true;
            }
        }

        file_put_contents(
            "logs/Model.EmailByResend.log",
            "RESEND RESPONSE DID NOT CONTAIN A RECOGNIZED ID\n",
            FILE_APPEND
        );

        return false;

    } catch (Throwable $e) {

        file_put_contents(
            "logs/Model.EmailByResend.log",
            "RESEND ERROR: " .
            $e->getMessage() . "\n" .
            $e->getTraceAsString() . "\n",
            FILE_APPEND
        );

        return false;
    }
}

	 
	 
	
	/***
	 * @actual mail send using @PHPMAILER
	 *  */	  
	protected function ActualSendPHPMailer(array $email, string $subject, array $message, $orignalMsgId = '', $filename = '') {
		$settings = $this->_settings();
        $mail = new PHPMailer(true);   
  
        try {  
            /*******************************************************/ 
            $mail->isSMTP();
            //$mail->SMTPDebug = 2; 
            $mail->Host = $settings['smtp_server'];  
            $mail->SMTPAuth = true;
            $mail->Username = $settings['send_from'];  
            $mail->Password = $settings['send_from_password'];  
            $mail->Port = $settings['smtp_port']??25;
            /***************************************************************/
             
            //$mail->SMTPKeepAlive = true;
         
            $mail->setFrom($settings['send_from'] , $settings['short_name']);  
            $i = 0;
            $sentemails = [];
            foreach ($email as $email_row) { 
                if (in_array($email_row, $sentemails)) continue;
                $sentemails[] = $email_row; 
                $mail->addBCC($email_row); 

				if (!empty($orignalMsgId) ) {
					$mail->addCustomHeader('In-Reply-To', $orignalMsgId);
        			$mail->addCustomHeader('References', $orignalMsgId);
				}
                  
                $mail->isHTML(true);                                 
                $mail->Subject = $subject ?? 'Test from mail auto';
                $mail->Body    = $message[$i] ?? "<div> Just a test message if working fine </div>";
                $altbody = $message[$i] ?? 'Alt body';
                $mail->AltBody = strip_tags($altbody) ;

				if (!empty($filename)) {
					$mail->AddAttachment("{$_SERVER['DOCUMENT_ROOT']}/public/assets/uploads/{$filename}", $filename); 
				}
				
                if ( !empty($_FILES['file']['name'][0]) ) { 
                	for ( $j = 0; $j < count($_FILES['file']['name']); $j++ ) { 
                        $file_tmp  = $_FILES['file']['tmp_name'][$j];
                        $file_name = $_FILES['file']['name'][$j]; 
                        $mail->AddAttachment($file_tmp, $file_name);
                	} 
                }
                
                $status = $mail->send() ? 'success' : 'fail'; 
               // $this->_insert("email_logs", "recipient, status, message", [$email_row, $status, $mail->ErrorInfo] );
                $i++;
				$mail->clearAllRecipients();
				$mail->clearAttachments();
            }
            $mail->SmtpClose();
             
        } catch (Exception $e) {
            file_put_contents('logs/Libraries.SendEmail.php.log', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}",FILE_APPEND);
           
        }
         
    }


	/*********************************************
	 * X
	 * EMAIL SENDER FUNCTIONS
	 * X
	 ********************************************/

	/////////////////////
}
