<?php
class User
{
    private $db;
 
   
/* 
    public function register($first_name,$last_name,$username,$email,$password, $sponsor)
    {
        if($this->insert_user_details($first_name,$last_name, $phone, $sponsor)) {// && $this->insert_user_login($username,$email,$password)) {
          return true;
        }
        else {
          return false;
        }

    }
*/
    public function insert_user_details($first_name,$last_name, $phone, $sponsor, $referrer, $level)
    {
       try
       {
           $stmt = $this->db->prepare("INSERT INTO users_details(user_id,first_name,last_name, phone, sponsor_id, referrer_id, level) 
                                                       VALUES(:uid, :fname, :lname, :phone, :sponsor, :referrer, :level)");
           $stmt->bindparam(":uid", $this->db->lastinsertid());
           $stmt->bindparam(":fname", $first_name);
           $stmt->bindparam(":lname", $last_name);
           $stmt->bindparam(":phone", $phone);
           $stmt->bindparam(":sponsor", $sponsor);
           $stmt->bindparam(":referrer", $referrer);
           $stmt->bindparam(":level", $level);
           $_SESSION['new_user_session'] = $this->db->lastinsertid();
           $stmt->execute(); 
              
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }

    public function insert_user_login($username,$email,$password)
    {
       try
       {
           $new_password = password_hash($password, PASSWORD_DEFAULT);   
           $stmt = $this->db->prepare("INSERT INTO users_login(username,email,password, created_at) 
                                                       VALUES(:uname, :umail, :upass, :created_at)");
              
           $stmt->bindparam(":uname", $username);
           $stmt->bindparam(":umail", $email);
           $stmt->bindparam(":upass", $new_password);            
           $stmt->bindparam(":created_at", time());            
           $stmt->execute(); 

           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function getLastInsertID() {
      return $_SESSION['new_user_session'];
    }
    public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users_login WHERE username=:username LIMIT 1");
          $stmt->execute(array(':username'=>$uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['password']))
             {

                $_SESSION['privilege'] = $userRow['privilege'];
                $_SESSION['user_session'] = $userRow['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function get_user_id($username)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT user_id FROM users_login WHERE username=:uid");
           $stmt->execute(array(':uid'=>$username));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['user_id']; 
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getLevelMembers($level)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT user_id FROM users_details WHERE level=:level");
           $stmt->execute(array(':level'=>$level));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

                return $stmt->rowCount(); 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }


   public function get_last_user()
    {
       try
       {
           $stmt = $this->db->prepare("SELECT user_id FROM users_login LIMIT 1");
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['user_id']; 
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getLastUserID()
    {
       try
       {
          $stmt = $this->db->query("SELECT user_id FROM users_login ORDER BY user_id DESC LIMIT 1");
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['user_id']; 
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getAllMembers()
    {
       try
       {
          $stmt = $this->db->query("SELECT * FROM users_details ORDER BY user_id ASC ");
           $stmt->execute();
           $row=$stmt->fetchAll(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row; 
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getFirstUserID()
    {
       try
       {
          $stmt = $this->db->query("SELECT user_id FROM users_login ORDER BY user_id ASC LIMIT 1");
           $stmt->execute();
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['user_id']; 
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   public function getEmptyleg($user_id)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT left_leg, right_leg FROM users_details WHERE user_id=:uid");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                if($row['left_leg'] < 1) {
                  return "left_leg";
                } 
                elseif ($row['right_leg'] < 1) {
                  return "right_leg";
                }
                else {
                  return false;
                }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
   public function getUserDetails($user_id)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT * FROM users_details WHERE user_id=:uid LIMIT 1");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                  return $row;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getUserLevel($user_id)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT 'level' FROM users_details WHERE user_id=:uid LIMIT 1");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                  return $row['level'];
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getUserSponsor($user_id)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT 'sponsor_id' FROM users_details WHERE user_id=:uid LIMIT 1");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                  return $row['sponsor_id'];
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function check_details($username,$email)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT username, email FROM users_login WHERE username=:uname OR email=:email");
           $stmt->execute(array(':uname'=>$username, ':email'=>$email));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
              $data =  array(
                        'username' => $row['username'],
                        'email' => $row['email']
                      );
                return $data;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function check_user($username)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT username FROM users_login WHERE username=:uname");
           $stmt->execute(array(':uname'=>$username));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getUserEpin($user_id,$number = 1)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT epin FROM users_epins WHERE user_id=:uid AND is_used = 0 LIMIT $number");
           $stmt->execute(array(':uid'=>$user_id));
           if($number == 1){
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

                if($stmt->rowCount() > 0)
                {
                        return $row['epin'];
                }
                else {
                    return false;
                }
         }else{
                 $i = 0;
                  $row_count =  $stmt->rowCount();
                  $epin_row = array(); 
                  while($i < $row_count){
                         $row=$stmt->fetch(PDO::FETCH_ASSOC);
                         array_push($epin_row,$row['epin']);
                         ++$i;
                  }
                return $epin_row;  
           }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function transferEpin($epin, $user_id)
    {
       try
       {
           $stmt = $this->db->prepare("UPDATE users_epins SET user_id = :uid WHERE epin=:epin");
           $stmt->execute(array(':uid'=>$user_id, ':epin'=>$epin));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function isValidEpin($epin)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT `epin`, `is_used` FROM users_epins WHERE epin=:epin");
           $stmt->execute(array(':epin'=>$epin));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if(($stmt->rowCount() > 0) && ($row['is_used'] == 0))
          {
                return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function get_username($uid)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT username FROM users_login WHERE user_id=:uid");
           $stmt->execute(array(':uid'=>$uid));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['username'];
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function getUserPhone($uid)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT phone FROM users_details WHERE user_id=:uid");
           $stmt->execute(array(':uid'=>$uid));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['phone'];
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
     public function itExistUserPhone($phone){
          try
       {
           $stmt = $this->db->prepare("SELECT phone FROM users_details WHERE phone =:phone");
           $stmt->execute(array(':phone'=>$phone));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
     }
      public function itExistUsername($username){
          try
       {
           $stmt = $this->db->prepare("SELECT username FROM users_login WHERE username =:username");
           $stmt->execute(array(':username'=>$username));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
     }
   public function get_user_email($uid)
    {
       try
       {
           $stmt = $this->db->prepare("SELECT email FROM users_login WHERE user_id=:uid");
           $stmt->execute(array(':uid'=>$uid));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
                return $row['email'];
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
   public function is_admin()
   {
      if(isset($_SESSION['type'] ) && $_SESSION['type'] == "admin")
      {
         return true;
      }else{
          return false;
      }
   }

   public function logged_in_user() {
      if(isset($_SESSION['user_session']))
      {
        return $_SESSION['user_session'];
      }
   }
  
   
 
   public function redirect($url)
   {
      header("Location: ".site_url($url));
   }
 
   public function logout()
   {
        session_destroy();
        if($_SESSION['user_session']) {
          unset($_SESSION['user_session']);
          
        }else
        if($_SESSION['admin_session']) {
           unset($_SESSION['admin_session']);
          
        }
        return true;
   }

 

    public function updateData($array, $table, $where = '') {
      
           try
           {

                 $fields=array_keys($array);
                    $values=array_values($array);
                    $fieldlist=implode(',', $fields); 
                    $qs=str_repeat("?, ",count($fields)-1);
                    $firstfield = true;

                      $sql = "UPDATE `$table` SET";

                    for ($i = 0; $i < count($fields); $i++) {
                        if(!$firstfield) {
                        $sql .= ", ";   
                        }
                        $sql .= " ".$fields[$i]."= ? ";
                        $firstfield = false;
                    }
                    if(!empty($where)) {
                      $sql .= $where;
                    }
                   $sth = $this->db->prepare($sql);
                    return $sth->execute($values);

                return $sth;
           }
           catch(PDOException $e)
           {
               echo $e->getMessage();
           }    
        }

    public function insertData($array, $table) {

           try
           {

                 $fields=array_keys($array);
                    $values=array_values($array);
                    $fieldlist=implode(',', $fields); 
                    $qs=str_repeat("?,",count($fields)-1);
                    $firstfield = true;

                      $sql = "INSERT INTO `$table` SET";

                    for ($i = 0; $i < count($fields); $i++) {
                        if(!$firstfield) {
                        $sql .= ", ";   
                        }
                        $sql .= " ".$fields[$i]."=?";
                        $firstfield = false;
                    }

                   $sth = $this->db->prepare($sql);
                    return $sth->execute($values);

                return $sth;
           }
           catch(PDOException $e)
           {
               echo $e->getMessage();
           }    
        }

    public function getData($data, $table, $where = '')
    {
       try
       {
          if($data != '*') {
            $selections = implode(', ', $data);
          } else {
            $selections = '*';            
          }

          $stmt = $this->db->prepare("SELECT {$selections} FROM `$table` ".$where." LIMIT 1");
          $stmt->execute();
          $settings_data = $stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
                return $settings_data;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

    public function getAllData($data, $table, $where = '')
    {
       try
       {
          if($data != '*') {
            $selections = implode(', ', $data);
          } else {
            $selections = '*';            
          }


          $stmt = $this->db->prepare("SELECT {$selections} FROM `$table` ".$where."");
          $stmt->execute();
          $settings_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
                return $settings_data;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }


   public function registerUser($first_name, $last_name, $username, $email, $phone, $password, $epin, $sponsor_details, $referrer, $system) {

            $error = '';
      if(empty($system) || empty($system['no_of_levels']) || ($system['no_of_levels'] < 1)) {
        $error .= "Sorry, registration cannot be processed at this moment. Please try later.";
      } else {
        /*
            if(empty($sponsor_id)) {
                $sponsor_id = $this->getLastUserID();
            }

        */
            $check_data = $this->check_details($username, $email);
            $system_wallet = $this->getData('*', 'system_wallet');


             if($check_data['username']==$username) {
                $error .= "Sorry, username already taken !";
             }else
             if($check_data['email']==$email) {
                $error .= "Sorry, email id already taken !";
             }else
           if(!empty($epin) && !$this->isValidEpin($epin)){
              $error .= "Invalid ePIN"; 
           }

           if(empty($error)) {


           $sponsor_id = $sponsor_details['user_id'];
           $level = $sponsor_details['level'] + 1;
//user login data
          $this->insert_user_login($username,$email,$password);
//User details data
          $this->insert_user_details($first_name,$last_name, $phone, $sponsor_id, $referrer, $level);

          $new_user_id = $this->getLastInsertID();


//update sponsor wallet with frontline_downline_payment
              $referrer_details = $this->getUserDetails($referrer);

              $data = array(
                'wallet' => $system['frontline_downline_payment'] + $referrer_details['wallet'],
              //                            'level' => $sponsor_new_level,
              //                            'wallet' => $sponsor_new_wallet
              );      

              $where = "WHERE `user_id` = ". $referrer;
              $this->updateData($data, 'users_details', $where);

            

          //Send Mail to sponsor
          if($sponsor_id) {

            $email_data = json_decode($system['email_new_member_downline']);

            $search = array("{uname}", "{username}", "{firstname}", "{lastname}");
            $replace = array($this->get_username($sponsor_id), $username, $firstname, $lastname);

            $message = str_replace($search, $replace, $email_data->email_body);
            mail($this->get_user_email($sponsor_id), $email_data->email_subject, $message);
          }

//Update wallets if a valid pin is used for registration
            if($this->isValidEpin($epin)) {

                      //if ePIN entered is valid, set user as paid
                                $data = array(
                                      'is_paid' => 1,
                                      );    
                                  $where = "WHERE `user_id` = ". $new_user_id;
                                  $this->updateData($data, 'users_details', $where);                

          //set ePIN as used
                                $epin_data = array(
                                  'is_used' => 1,
                                  'used_by' => $new_user_id
                                );      
                                $epin_where = "WHERE `epin` = '$epin'";
                                $this->updateData($epin_data, 'users_epins', $epin_where);

          //Populate system wallet
                                $system_wallet_data = array(
                                  'product_balance' => ($system['product_cost'] + $system_wallet['product_balance']),
                                  'company_balance' => ($system['company_fee'] + $system_wallet['company_balance']),
                                  'admin_balance' => ($system['admin_fee'] + $system_wallet['admin_balance']),
                                  'mlm_balance' => ($system['mlm_fee'] + $system_wallet['mlm_balance']),
                                );      
                                $this->updateData($system_wallet_data, 'system_wallet');
                                
                //Populate system reports table
                           // 1. Product Balance
                                  //create the json data for the report details
                                  $report_details = 'A New Product Fee of <b>'.$system['product_cost'].'</b> was processed for  user registration';  
                                  //populate data
                                        $data = array(
                                                    'report_type' => 'product_fee',
                                                    'report_details' => $report_details,
                                                    'user_id' => $this->getLastInsertID(),
                                                    'created_at' => time()
                                                );    
                                        $this->insertData($data, 'system_reports');                      

                           // 2. Company Balance
                                  //create the json data for the report details
                                  $report_details = 'A New Company Fee of <b>'.$system['company_fee'].'</b> was processed for user registration';  
                                  //populate data
                                        $data = array(
                                                    'report_type' => 'company_fee',
                                                    'report_details' => $report_details,
                                                    'user_id' => $this->getLastInsertID(),
                                                    'created_at' => time()
                                                );    
                                        $this->insertData($data, 'system_reports');                      

                           // 3. Admin Balance
                                  //create the json data for the report details
                                  $report_details = 'A New Company Fee of <b>'.$system['company_fee'].'</b> was processed for user registration';  
                                  //populate data
                                        $data = array(
                                                    'report_type' => 'admin_fee',
                                                    'report_details' => $report_details,
                                                    'user_id' => $this->getLastInsertID(),
                                                    'created_at' => time()
                                                );    
                                        $this->insertData($data, 'system_reports');                      

                           // 3. MLM Balance
                                  //create the json data for the report details
                                  $report_details = 'A New MLM Fee of <b>'.$system['mlm_fee'].'</b> was processed for user registration';  
                                  //populate data
                                        $data = array(
                                                    'report_type' => 'mlm_fee',
                                                    'report_details' => $report_details,
                                                    'user_id' => $this->getLastInsertID(),
                                                    'created_at' => time()
                                                );    
                                        $this->insertData($data, 'system_reports');                      

                      
            }


//Assign new user to a downline


//get empty leg for this sponsor
              $empty_leg = $this->getEmptyLeg($sponsor_id);
//              $empty_leg = $this->getEmptyLeg($sponsor_id);
            // if left leg, enter left leg
            if($empty_leg) {
              
              if($empty_leg == 'left_leg') {
                      $data = array(
                    'left_leg' => $new_user_id,
                  );      
              }
            //else if rightleg, enter right leg
              elseif($empty_leg == 'right_leg') {               
                       $data = array(
                        'right_leg' => $new_user_id,
//                        'level' => $sponsor_new_level,
 //                       'wallet' => $sponsor_new_wallet
                        );    
                       $this->updateSponsorWallet($new_user_id, $sponsor_id, $system);
              }
              else {                
//GET AVAILABLE LEG ON USER's DOWNLINE
                      $leg = $system->getUserOnLeg($sponsor_id);
                      if($leg['left_leg'] == 'left_leg') {
                          $sponsor_id = $leg['user_id'];
                          $data = array(
                            'left_leg' => $new_user_id,
                          );      
                      } elseif($leg == 'right_leg') {
                          $sponsor_id = $leg['user_id'];
                          $data = array(
                            'right_leg' => $new_user_id,
//                            'level' => $sponsor_new_level,
//                            'wallet' => $sponsor_new_wallet
                          );      
                       $this->updateSponsorWallet($new_user_id, $sponsor_id, $system);
                     }
               //else, get empty leg on downline of user
//                    $new
              }
            //insert record

            $where = "WHERE `user_id` = ". $sponsor_id;
            $this->updateData($data, 'users_details', $where);
            }



          
          if($this->completedMandatoryReferral($referrer, $system)) {
                          $referrer_details = $this->getUserDetails($referrer);

                          $data = array(
                            'wallet' => $system['direct_referrer_commission_amount'] + $referrer_details['wallet'],
//                            'level' => $sponsor_new_level,
//                            'wallet' => $sponsor_new_wallet
                          );      

            $where = "WHERE `user_id` = ". $referrer;
            $this->updateData($data, 'users_details', $where);
          }



//FOR SPONSOR
///if has completed mandatory referal, give referal bonus for this user
            //$system->completedMandatoryReferral($member['user_id'], $system_settings);
//if has competed level 
            // update user level and step
            //give user level bonus
//if has completed level, and level is circleout, give circleout bonus



        }
      }        

            if(empty($error)) {
              return true;
            }
            else {
              return $error;
            }

   }



  public function completedMandatoryReferral($user_id, $system_settings) {
       try
       {
           $stmt = $this->db->prepare("SELECT user_id FROM users_details WHERE referrer_id=:uid");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

            //check if user has paid
           if($this->checkIsPaid($user_id) == false) {
              $target = $system_settings['no_of_direct_referrers_unpaid'];
           } elseif($this->checkIsPaid($user_id) == true) {           
              $target = $system_settings['no_of_direct_referrers_paid'];
           }

          if($stmt->rowCount() >= $target)
          {
              return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }          
   }

  public function getLevelBonus($user_level, $system_settings) {

      $levels = json_decode($system_settings['level_bonus_commision']);
      $i = 1;

//return $levels;
      if($levels) {       
        foreach ($levels as $level => $value) {
          $level_bonus = "level_bonus_".$i;
          if($i == $user_level) {
            return ($value->$level_bonus);
          }
          $i++;
        }
      }
      else {
        return false;
      }
  }

  public function getCircleOutBonus($user_level, $system_settings) {

      $circleouts = json_decode($system_settings['circle_out_bonus_commision']);
      $i = 1;

//return $levels;
      if($circleouts) {       
      foreach ($circleouts as $circleout => $value) {
        $circleout = "payout_for_circleout_".$i;
        if($i == $user_level) {
          return ($value->$circleout);
        }
        $i++;
      }
  }
}


  public function getDirectDownlines($user_id) {
       try
       {
           $stmt = $this->db->prepare("SELECT user_id FROM users_details WHERE sponsor_id=:uid");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

           return $stmt->rowCount();

       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
   }



  public function checkIsPaid($user_id) {
       try
       {
           $stmt = $this->db->prepare("SELECT * FROM users_details WHERE user_id=:uid AND is_paid = 1");
           $stmt->execute(array(':uid'=>$user_id));
           $row=$stmt->fetch(PDO::FETCH_ASSOC);

          if($stmt->rowCount() > 0)
          {
              return true;
          }
          else {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
   }
  
/*
  public function updateSponsorWallet($user_id, $user_sponsor, $system_settings)   {
//      $user_sponsor = $this->getUserSponsor($user_id);
      $sponsor_details = $this->getUserDetails($user_sponsor);
      $bonuses = 0;
      $sponsor_new_level = $sponsor_details['level'] + 1;

      if($this->getLevelBonus($sponsor_new_level, $system_settings) > 0) {
        $bonuses += $this->getLevelBonus($sponsor_new_level, $system_settings);
      }
      if($this->getCircleOutBonus($sponsor_new_level, $system_settings) > 0) {
        $bonuses += $this->getCircleOutBonus($sponsor_new_level, $system_settings);
      }

      $sponsor_new_wallet =  $sponsor_details['wallet'] + $bonuses;

      if(!empty($sponsor_details['sponsor_id'])) {
          $data = array(
                'level' => $sponsor_new_level,
                'wallet' => $bonuses
                );    
          $where = "WHERE `user_id` = ". $sponsor_details['sponsor_id'] ." AND `right_leg` = ".$user_id;      
          $this->updateData($data, 'users_details', $where);                        
      }
      if($sponsor_details['sponsor_id'] != 0) {

          $this->updateSponsorWallet($sponsor_details['user_id'], $sponsor_details['sponsor_id']);
      }
      return $user_sponsor;
   }
*/
   public function updateSponsorWallet($user_id, $user_sponsor, $system_settings)   {
//      $user_sponsor = $this->getUserSponsor($user_id);
      $sponsor_details = $this->getUserDetails($user_sponsor);
      $sponsor_new_level = $sponsor_details['level'] + 1;
      $bonuses = 0;

      $sponsor_new_wallet =  $sponsor_details['wallet'] + $bonuses;
      $sponsor_downlines = $this->getDirectDownlines($sponsor_details['user_id']);
      $power = pow(2, $sponsor_new_level);

//      print_r(($sponsor_downlines) . $power);
//exit();
          if($this->getLevelBonus($sponsor_new_level, $system_settings) > 0) {
            $bonuses += $this->getLevelBonus($sponsor_new_level, $system_settings);
          }

    //      print_r($this->getLevelBonus($sponsor_new_level, $system_settings));
    //      exit();
          if($this->getCircleOutBonus($sponsor_new_level, $system_settings) > 0) {
//            $bonuses += $this->getCircleOutBonus($sponsor_new_level, $system_settings);

            //Circleout bonus * factorial of members in that level
            $bonuses += $this->getCircleOutBonus($sponsor_new_level, $system_settings) * gmp_fact($this->getLevelMembers($$sponsor_details['level']));

            //send sponsor mail

                $email_data = json_decode($system['circleout_email']);

                $search = array("{uname}", "{amount}");
                $replace = array($this->get_username($sponsor_id), $this->getCircleOutBonus($sponsor_new_level, $system_settings));

                $message = str_replace($search, $replace, $email_data->email_body);
                mail($this->get_user_email($sponsor_id), $email_data->email_subject, $message);
          }


//if all downlines are in sponsor's previous level, update his level

      if(!empty($sponsor_details['user_id']) && (($sponsor_downlines) == $power)) {
          $data = array(
//                'level' => $sponsor_new_level,
                'wallet' => $sponsor_details['wallet'] + $bonuses
                );    
          $where = "WHERE `user_id` = ". $sponsor_details['user_id'];      
//          $where = "WHERE `user_id` = ". $sponsor_details['user_id'] ." AND `right_leg` = ".$user_id;      
          $this->updateData($data, 'users_details', $where);                

      }
      if($sponsor_details['sponsor_id'] != 0) {

          $this->updateSponsorWallet($sponsor_details['user_id'], $sponsor_details['sponsor_id'], $system_settings);
      }
      return true;
   }

}
?>