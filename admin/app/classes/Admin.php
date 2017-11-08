<?php
class Admin
{
    private $db;
 
    function __construct($db_conn)
    {
      $this->db = $db_conn;
    }
 

     public function login($uname,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM admin_login WHERE username=:username LIMIT 1");
          $stmt->execute(array(':username'=>$uname));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['password']))
             {

                $_SESSION['privilege'] = $userRow['privilege'];
                $_SESSION['admin_session'] = $userRow['user_id'];
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
 
   public function is_loggedin()
   {
      if(isset($_SESSION['admin_session']))
      {
         return true;
      }
   }

   public function logged_in_user() {
      if(isset($_SESSION['admin_session']))
      {
        return $_SESSION['admin_session'];
      }
   }

//Update existing records
    public function updateSettings($array) {


           try
           {

                 $fields=array_keys($array);
                    $values=array_values($array);
                    $fieldlist=implode(',', $fields); 
                    $qs=str_repeat("?,",count($fields)-1);
                    $firstfield = true;

                    if($this->checkSettingsExist()) {
                      $sql = "UPDATE `system_settings` SET";
                    }
                    else {
                      $sql = "INSERT INTO `system_settings` SET";
                    }

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



 
    public function getSettings($data)
    {
       try
       {
          $selections = implode(', ', $data);

          $stmt = $this->db->prepare("SELECT {$selections} FROM system_settings LIMIT 1");
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

    public function checkSettingsExist()
    {
       try
       {

          $stmt = $this->db->prepare("SELECT * FROM system_settings");
          $stmt->execute();
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

   public function waiveUser($user_id) {
       try
       {

          $stmt = $this->db->prepare("UPDATE users_details SET is_paid = 1, is_waived = 1 WHERE user_id = :uid");
          $stmt->execute(array(':uid' => $user_id));
          return true;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }

   }
 
}
?>