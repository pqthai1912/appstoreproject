<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    define('HOST','127.0.0.1');
    define('USER','thaiphan');
    define('PASS','123456');
    define('DB','database');

	function open_database() {
		$conn = new mysqli(HOST, USER, PASS, DB) ;
		mysqli_set_charset($conn, 'UTF8');
		if ($conn->connect_error){
			die('Connect error: ' . $conn->connect_error);
		}
		return $conn;
	}
	
	function login($user, $pass){
		$sql = "select * from account where username = ?";
		$conn = open_database();
		
		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$user);
		if(!$stm->execute()){
			return array('code' => 1, 'error' => 'Can not exec command');
		}

		$result = $stm->get_result();

		if($result->num_rows==0){
			return array('code' => 1, 'error' => 'User does not exists');
		}
		$data = $result->fetch_assoc();
		$hashed_password = $data['password'];
		if (!password_verify($pass,$hashed_password)){
			return array('code' => 2, 'error' => 'Invalid pass');
		}
		else if($data['activated'] == 0){
			return array('code' => 3, 'error' => 'Not yet activated');
		} else{
			return array('code' => 0, 'error' =>'', 'data'=> $data);
		}
			
	}

	function is_email_exists($email){
		$sql = 'select username from account where email = ?';
		$conn = open_database();
		
		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$email);
		if(!$stm->execute()){
			die('Query error: '. $stm->error);
		}

		$result = $stm->get_result();


		if($result->num_rows > 0){
			return true;
		}else{
			return false;
		}
	}

	function register($user,$pass,$first,$last,$email){
		if(is_email_exists($email)){
			return array('code' => 1, 'error' => 'Email exists');
		}

		$hash = password_hash($pass, PASSWORD_DEFAULT);
		$rand = random_int(0,1000);
		$token = md5($user .'+'. $rand);
		$sql = 'insert into account(username,firstname,lastname,email,password,activate_token) values(?,?,?,?,?,?)' ;
		$conn = open_database();
		
		$stm = $conn->prepare($sql);
		$stm->bind_param('ssssss',$user,$first,$last,$email,$hash,$token);

		if(!$stm->execute()){
			return array('code' => 2, 'error' => 'Can not exec command');
		}

		# kich hoat tai khoan
		sendActiveEmail($email,$token);
		return array('code' => 0, 'error'=> 'Create account successful.');
		
	}

	function sendActiveEmail($email, $token){

		$mail = new PHPMailer(true);
		try{
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'thaiphan1912@gmail.com';                     //SMTP username
			$mail->Password   = 'ctfytsprrreqftnn';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
			//Recipients
			$mail->setFrom('thaiphan1912@gmail.com', 'DTH store');
			$mail->addAddress($email, 'Nguoi nhan');     //Add a recipient
			
		
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Xac thuc tai khoan cua ban';
			$mail->Body    = "Nhấn <a href = 'http://dthdoan.epizy.com/activate.php?email=$email&token=$token'> vào đây</a> để kích hoạt tài khoản";
			
		
			$mail->send();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	function sendResetEmail($email, $token){

		$mail = new PHPMailer(true);
		try{
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'thaiphan1912@gmail.com';                     //SMTP username
			$mail->Password   = 'ctfytsprrreqftnn';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		
			//Recipients
			$mail->setFrom('thaiphan1912@gmail.com', 'DTH store');
			$mail->addAddress($email, 'Nguoi nhan');     //Add a recipient
			
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Doi mat khau cua ban';
			$mail->Body    = "Nhấn <a href = 'http://dthdoan.epizy.com/reset_password.php?email=$email&token=$token'> vào đây</a> để đổi mật khẩu";
			
		
			$mail->send();
			return true;
		} catch (Exception $e) {
			return false;
		}
	}
	function activeAccount($email, $token){
		$sql = 'select username from account where email = ? and activate_token = ? and activated = 0';
		$conn = open_database();
		
		$stm = $conn->prepare($sql);
		$stm->bind_param('ss',$email, $token);
		if(!$stm->execute()){
			return array('code' => 1, 'error' => 'Can not exec command');
		}

		$result = $stm->get_result();

		if($result->num_rows==0){
			return array('code' => 2, 'error' => 'Email address or token not found');
		}

		$sql = "update account set activated = 1, avatar = 'img/avatar/avatar.png', activate_token = '' where email = ?";
		$stm = $conn->prepare($sql);
		$stm->bind_param('s',$email);
		if(!$stm->execute()){
			return array('code' => 1, 'error' => 'Can not exec command');
		}

		return array('code' => 0, 'message' => 'Account activated');
	}

	function reset_password($email){
		if (!is_email_exists($email)){
			return array('code' => 1, 'error' => 'Email does not exist');
		}
		$token = md5($email . '+' . random_int(1000,2000));
		$sql = 'update reset_token set token =? where email = ?';

		$conn = open_database();
		$stm = $conn->prepare($sql);
		$stm->bind_param('ss',$token, $email);
		if(!$stm->execute()){
			return array('code' => 2, 'error' => 'Can not exec command');
		}
		if($stm->affected_rows == 0){
			//chua co dong nao trong mailbox
			$exp = time() + 3600 * 24; //time's up after 24h
			$sql = 'insert into reset_token values(?,?,?)';
			$stm = $conn->prepare($sql);
			$stm->bind_param('ssi', $email, $token, $exp);

			if ($stm->execute()){
				return array('code' => 1, 'error' => 'Can not exec command');
			}
		}

		// insert successfully

		$success = sendResetEmail($email,$token);
		return array('code' => 0, 'success' => $success);
	}

    function change_password($email, $pass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "update account set password = ?, activate_token = '' where email = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$hash, $email);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }

        return array('code' => 0, 'message' => 'Change password successfully');
    }

    function edit_Profile($id,$avatar,$first,$last,$birth){
	    $path = 'img/avatar/';
	    $avatar = $path.$avatar;
        $conn = open_database();
        $sql = "update account set avatar = ?, firstname = ?, lastname = ?, ngaysinh=?  where id=?";
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssi',$avatar,$first,$last,$birth,$id);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }

        return array('code' => 0, 'message' => 'Edit profile successfully');
    }


    //ham check ma the
    function check_Charge($mathe, $series,$menhgia){
        $sql = "select * from recharge_card where mathe = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$mathe);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }

        $result = $stm->get_result();

        if($result->num_rows==0){
            return array('code' => 1, 'error' => 'Card code does not exists');
        }
        $row = $result->fetch_assoc();
        if ($series != $row['series']){
            return array('code' => 2, 'error' => 'Invalid');
        }
        else if($menhgia != $row['menhgia']){
            return array('code' => 3, 'error' => 'Invalid');
        }
        else if($row['trangthai'] == 1){
            return array('code' => 4, 'error' => 'Card is used');
        } else{
			//cap nhật trạng thái thẻ
			$sql1 = "update recharge_card set trangthai = 1  where mathe =?";
			$stm = $conn->prepare($sql1);
			$stm->bind_param('s',$mathe);
			if(!$stm->execute()){
				return array('code' => 1, 'error' => 'Can not exec command');
			}
            return array('code' => 0, 'error' =>'', 'data'=> $row);
        }

    }
    //    ham nap
    function charge($username,$menhgia,$mathe){
        $sql = "update account set sodu = sodu + ?  where username=?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('is',$menhgia,$username);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }

		//them vao lịch sử nạp
		$sql = 'insert into transaction_history(username,menhgia,lichsunap,magiaodich) values(?,?,CURDATE(),?)';
		$stm = $conn->prepare($sql);
		$stm->bind_param('sis', $username,$menhgia,$mathe);

			if (!$stm->execute()){
				return array('code' => 1, 'error' => 'Can not exec command');
			}

        return array('code' => 0, 'message' => 'Recharging successfully');
    }

    function get_Sodu($user,$link){
        $sql = "select tenapp,traphiud from apps where link = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$link);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }
        $res = $stm->get_result();
        if($res->num_rows>0){
            $row = $res->fetch_assoc();
            $sql1 = "select sodu from account where username = '".$user."'";
            $res1 = $conn->query($sql1);
            if($res1->num_rows>0) {
                $row1 = $res1->fetch_assoc();
                $res2 = payment($row1['sodu'],$row['traphiud'],$user);
                if($res2['code'] =='0'){
					//cập nhật lượt tải
					$sql2 = "update apps set luottai = luottai + 1 where tenapp = ?";
					$conn = open_database();
					$stm2 = $conn->prepare($sql2);
					$stm2->bind_param('s',$row['tenapp']);

					if(!$stm2->execute()){
						return array('code' => 1, 'error' => 'Can not exec command');
					}
                    return array('code' => 0, 'success' => $res2);

                }else if($res2['code'] =='2'){
                    return array('code' => 2, 'error' => 'No enough money to pay');
                }else{
                    return array('code' => 1, 'error' => 'Can not exec command');
                }

            }


        }
        return array('code' => 1, 'error' => 'Can not exec command');
    }

//    hàm thanh toán
    function payment($sodu,$traphiud,$username){
	    if ($sodu<$traphiud){
            return array('code' => 2, 'error' => 'No enough money to pay');
        }
        $sql = "update account set sodu = sodu - ?  where username= ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('is',$traphiud,$username);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }

        return array('code' => 0, 'message' => 'Payment successfully');
    }


//    kiem tra co ung dung trong danh sach
    function check_listMyApp($user,$link){
	    $foo = True;
        $sql = "select * from apps where link = ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$link);
        if (!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }
        $res = $stm->get_result();
        if($res->num_rows>0) {
            $row = $res->fetch_assoc();
            $sql1 = "select * from down_apps where username = '" . $user . "'";
            $res1 = $conn->query($sql1);
            while ($row1 = $res1->fetch_assoc()) {
                if ($row1['tenapp'] == $row['tenapp']) {
                    $foo = False;
                    break;
                }
            }
            if ($foo) {
                //thực hiện insert
                $sql3 = "insert into down_apps(username,maapp,tenapp,hinhanh) values(?,?,?,?)";
                $stm3 = $conn->prepare($sql3);
                $stm3->bind_param('siss',$user,$row['id'],$row['tenapp'],$row['hinhanh']);

                if (!$stm3->execute()) {
                    return array('code' => 2, 'error' => 'Add fail');
                }

                return array('code' => 0, 'message' => 'Successfully');
            } else {
                return array('code' => 3, 'error' => 'Already app in list');
            }


        }
        return array('code' => 1, 'error' => 'Can not exec command');
    }

	// Hàm nâng cấp
	function upgrade($user){
        $sql = "update account set phanquyen = 1  where username= ?";
        $conn = open_database();
        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$user);
        if(!$stm->execute()){
            return array('code' => 1, 'error' => 'Can not exec command');
        }

        return array('code' => 0, 'message' => 'Upgrading successfully');
	}



    function passAppByAd($email){

        $mail = new PHPMailer(true);
        try{
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'thaiphan1912@gmail.com';                     //SMTP username
            $mail->Password   = 'ctfytsprrreqftnn';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('thaiphan1912@gmail.com', 'DTH store');
            $mail->addAddress($email, 'Nguoi nhan');     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Duyet ung dung tu DTH Store';
            $mail->Body    = "Xin chúc mừng! Ứng dụng của bạn đã được duyệt thành công.";


            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }