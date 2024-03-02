<?php
include("conn.php");

class Accessmethod
{
  public $status = "";
  public $msg = "";
}

function helperror()
{
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 401 unauthorized");
  header("HTTP/1.1 201 OK");

  $e = new Accessmethod();
  $e->status = "-1";
  $e->msg = "Invalid Access Token";
  echo json_encode($e);
}
if (isset($_REQUEST['v_api']) && !empty($_REQUEST['v_api'])) {

  $v_api = $_REQUEST['v_api'];
  switch ($v_api) {

    case 'user_login':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];
        // print_r($data);
        // exit();
        user_login($data);
      } else {
        helperror();
      }
      break;
    case 'user_reg':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];

        user_reg($data);
      } else {
        helperror();
      }
      break;

    case 'user_verify':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];

        user_verify($data);
      } else {
        helperror();
      }
      break;

    case 'user_reset':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];

        user_reset($data);
      } else {
        helperror();
      }
      break;

    case 'user_doc':
      if (isset($_REQUEST['u_data'])) {

        $data = $_REQUEST['u_data'];
        // print_r($data);
        
        if(!isset($_FILES["photo"]))
        {
          $c['msg'] = "Invalid Photo Request";
          $c['status'] = "0";  
          echo json_encode($c);
          exit();
        }
        // else{
        //   $c['file'] = $_FILES["photo"];
        //   $c['status'] = "0";  
        //   echo json_encode($c);
        //   exit();
        // }
        if(!isset($_FILES["aadharcard"]))
        {
          $c['msg'] = "Invalid Aadharcard Request";
          $c['status'] = "0";  
          echo json_encode($c);
          exit();
        }
        if(!isset($_FILES["electricitybill"]))
        {
          $c['msg'] = "Invalid electricitybill Request";
          $c['status'] = "0";  
          echo json_encode($c);
          exit();
        }
        if(!isset($_FILES["signature"]))
        {
          $c['msg'] = "Invalid signature Request";
          $c['status'] = "0";  
          echo json_encode($c);
          exit();
        }
        user_doc($_FILES, $data);
      }else{
        
        $c['msg'] = "Invalid Request";
        $c['status'] = "0";  
        echo json_encode($c);
        exit();
      }
      // } else {
      //   helperror();
      // }
      break;

    case 'user_slot':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];

        user_slot($data);
      } else {
        helperror();
      }
      break;

    case 'user_display':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];

        user_display($data);
      } else {
        helperror();
      }
      break;

      case 'user_profile':
        if (isset($_REQUEST['u_data'])) {
          $data = $_REQUEST['u_data'];
  
          user_profile($data);
        } else {
          helperror();
        }
        break;

        case 'user_bonafide':
          if (isset($_REQUEST['u_data'])) {
    
            $data = $_REQUEST['u_data'];
            // print_r($data);
            // print_r($data);
            
            if(!isset($_FILES["bonafide"]))
            {
              $c['msg'] = "Invalid Bonafide Request";
              $c['status'] = "0";  
              echo json_encode($c);
              exit();
            }
            user_bonafide($_FILES, $data);
      }else{
        
        $c['msg'] = "Invalid Request";
        $c['status'] = "0";  
        echo json_encode($c);
        exit();
      }
      break;

      case 'user_disability':
        if (isset($_REQUEST['u_data'])) {
  
          $data = $_REQUEST['u_data'];
          // print_r($data);
          // print_r($data);
          
          if(!isset($_FILES["disability"]))
          {
            $c['msg'] = "Invalid Disability Request";
            $c['status'] = "0";  
            echo json_encode($c);
            exit();
          }
          user_disability($_FILES, $data);
    }else{
      
      $c['msg'] = "Invalid Request";
      $c['status'] = "0";  
      echo json_encode($c);
      exit();
    }
    break;


    case 'user_otp':
      if (isset($_REQUEST['u_data'])) {
        $data = $_REQUEST['u_data'];

        user_otp($data);
      } else {
        helperror();
      }
      break;
    //     case 'form_fill':
    //         if(isset($_REQUEST['u_data']))
    //         {
    //              $data=$_REQUEST['u_data'];

    //       form_fill($data);
    //         }
    //         else
    //         {
    //    helperror();
    //         }
    //          break;

    default:
      helperror();
      break;
  }

} else {
  helperror();
}
function user_reg($data)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";

    public $password = "";

    public $firstname = "";
    public $lastname = "";
    public $phonenumber = "";
    public $email = "";
    public $gender = "";
    public $dob = "";
    public $city = "";
    public $address = "";
    public $landmark = "";
    public $pin = "";
    public $category = "";

   


  }
  //    date_default_timezone_set('Asia/Kolkata');
// $today = date("Y-m-d");
  $c = new Common();
  // $data = json_decode($data);
  $username = $data['u_username'];
  $password = md5($data['u_password']);
  $firstname = $data['u_firstname'];
  $lastname = $data['u_lastname'];
  $phonenumber = $data['u_phonenumber'];
  $email = $data['u_email'];
  $gender = $data['u_gender'];
  $dob = $data['u_dob'];
  $city = $data['u_city'];
  $address = $data['u_address'];
  $landmark = $data['u_landmark'];
  $pin = $data['u_pin'];
  $category = $data['u_category'];
 

  $sqll1 = "select * from u_detail where u_username='$username'";

  $result = $conn->query($sqll1);


  if ($result->num_rows > 0) {

    $c->msg = "User Already Register";
    $c->status = "0";
  } else {
    $sql = "INSERT INTO u_detail(u_username,u_password,u_firstname,u_lastname,u_phonenumber,u_email,u_gender,u_dob,u_city,u_address,u_landmark,u_pin,u_category) VALUES ('$username','$password','$firstname','$lastname','$phonenumber','$email','$gender','$dob','$city','$address','$landmark','$pin','$category')";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
      $c->msg = "User Register Successfully";
      $c->status = "1";
    } else {
      $c->msg = " ";
      $c->status = "0";
    }

  }
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);

}

function user_login($data)
{


  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    //    public $u_id  = "";
    public $u_username = "";
    public $u_email = "";

    public $u_id = "";

    public $u_doc_status = "";
    public $u_doc_success = "";

    public $u_slot_success = "";
    public $eligible = "";

    public $u_create = "";

    public $u_mobileno = "";
    public $u_city = "";

    public $remark = "";
    public $v_remark = "";
    public $u_timeslotdate = "";

    public $u_timeslottime = "";


  }


  // $data = json_decode($data);


  // $u_email = $data['u_email'];
  $u_username = $data['u_username'];

  $u_pwd = md5($data['u_password']);

  // $u_doc_status = $data['u_doc_status'];

  // date_default_timezone_set('Asia/Kolkata');  
// $today = date("Y-m-d");
  $c = new Common();


  $sql = "SELECT * FROM u_detail WHERE u_username='$u_username'and u_password='$u_pwd' ";
  $result = $conn->query($sql);


  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();


    if ($row['status'] == '1') {
      // $c->u_id=$row['u_id'];
      $c->u_username = $row['u_username'];
      $c->u_email = $row['u_email'];
      // $c->u_id = $row['u_id'];
      $sql1 = "SELECT u_id FROM u_detail WHERE u_username='$u_username'and u_password='$u_pwd'";
      $result1 = $conn->query($sql1);
      $result1->num_rows;
      $row = $result1->fetch_assoc();
      $c->u_id = $row['u_id'];

      $sql2 = "SELECT u_doc_status,u_doc_success,u_slot_success,eligible,u_create,remark,v_remark,u_timeslottime,u_timeslotdate FROM u_detail WHERE u_username='$u_username'and u_password='$u_pwd'";
      $result2 = $conn->query($sql2);
      $result2->num_rows;
      $row = $result2->fetch_assoc();
      $c->u_doc_status = $row['u_doc_status'];
      $c->u_doc_success = $row['u_doc_success'];
      $c->u_slot_success = $row['u_slot_success'];
      $c->eligible = $row['eligible'];
      $c->u_create = $row['u_create'];
      $c->remark = $row['remark'];
      $c->v_remark = $row['v_remark'];
      $c->u_timeslotdate = $row['u_timeslotdate'];
      $c->u_timeslottime = $row['u_timeslottime'];





      // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
      // $result2 = $conn->query($sql2);
      // $result2->num_rows;
      // $row = $result2->fetch_assoc();
      // $c->u_doc_success = $row['u_doc_success'];

      // $c->u_mobileno=$row['u_mobileno'];
// $c->u_city=$row['u_city'];
      $c->msg = "User Login Successfully";
      $c->status = "1";
    } else {
      $c->msg = "User Not Verify By the Admin";
      $c->status = "0";
    }

  } else {
    $c->msg = "Invalid username or password";
    $c->status = "0";
  }


  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);
}

function user_verify($data)
{

  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    //    public $u_id  = "";
    public $u_phonenumber = "";
  //   public $u_mobileno = "";
  //   public $u_city = "";
  }

  $c = new Common();
  // $data = json_decode($data);
  $u_phonenumber = $data['u_phonenumber'];


  $sqll1 = "select * from u_detail where u_phonenumber='$u_phonenumber'";

  $result = $conn->query($sqll1);


  if ($result->num_rows > 0) {

    $c->msg = "User Registered";
    $c->status = "1";
  } else {

    $c->msg = "Not Valid Phone";
    $c->status = "0";
  }

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);
}

function user_reset($data)
{


  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    //    public $u_id  = "";
    public $u_username = "";
    public $u_phonenumber = "";
    public $u_email = "";
  //   public $u_mobileno = "";
  //   public $u_city = "";
  }


  $u_phonenumber = $data['u_phonenumber'];
  $u_pwd = md5($data['u_password']);

  $c = new Common();

  $sql = "UPDATE u_detail SET u_password = '$u_pwd' where u_phonenumber = '$u_phonenumber' ";
  $result = $conn->query($sql);


  $sqll1 = "select u_password from u_detail where u_phonenumber='$u_phonenumber'";

  $result = $conn->query($sqll1);

  $row = mysqli_fetch_array($result);
  $pass = $row['u_password'];

  if ($pass == $u_pwd) {
    $c->msg = "Password Updated";
    $c->status = "1";
  } else {
    $c->msg = "Password Not Updated";
    $c->status = "0";
  }

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);
}

function user_doc($data, $d)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    //    public $u_id  = "";
    public $u_username = "";
    public $u_id = "";

    public $u_doc_success = "";
  // public $aadharcard_name = "";

  // public $aadharcard_tmp_name = "";
  // public $aadharcard_error = "";

  // public $aadhar_upload_name = "";

  }

  $u_id = $d['u_id'];

  $c = new Common();
  // $u_doc_success = $d['u_doc_success'];


  $response = array();
  $upload_dir = 'uploads/';
  $server_url = 'http://127.0.0.1';
  // print_r($data);

  $max_size = 2000000;
  //photo
  $photo_name = $data["photo"]["name"];
  $photo_tmp_name = $data["photo"]["tmp_name"];
  $photo_error = $data["photo"]["error"];
  $photo_size = $data["photo"]["size"];

  $random_name = rand(1000, 1000000) . "-" . $photo_name;
  $photo_upload_name = $upload_dir . strtolower($random_name);
  $photo_upload_name = preg_replace('/\s+/', '-', $photo_upload_name);
  $photo_uploaded = move_uploaded_file($photo_tmp_name, $photo_upload_name);

  //aadhar card
  $aadharcard_name = $data["aadharcard"]["name"];
  $aadharcard_tmp_name = $data["aadharcard"]["tmp_name"];
  $aadharcard_error = $data["aadharcard"]["error"];
  $aadharcard_size = $data["aadharcard"]["size"];

  $random_name = rand(1000, 1000000) . "-" . $aadharcard_name;
  $aadhar_upload_name = $upload_dir . strtolower($random_name);
  $aadhar_upload_name = preg_replace('/\s+/', '-', $aadhar_upload_name);
  $aadhar_uploaded = move_uploaded_file($aadharcard_tmp_name, $aadhar_upload_name);

  //electricitybill
  $electricitybill_name = $data["electricitybill"]["name"];
  $electricitybill_tmp_name = $data["electricitybill"]["tmp_name"];
  $electricitybill_error = $data["electricitybill"]["error"];
  $electricitybill_size = $data["electricitybill"]["size"];


  $random_name = rand(1000, 1000000) . "-" . $electricitybill_name;
  $electricitybill_upload_name = $upload_dir . strtolower($random_name);
  $electricitybill_upload_name = preg_replace('/\s+/', '-', $electricitybill_upload_name);
  $electricitybill_uploaded = move_uploaded_file($electricitybill_tmp_name, $electricitybill_upload_name);

  //signature
  $signature_name = $data["signature"]["name"];
  $signature_tmp_name = $data["signature"]["tmp_name"];
  $signature_error = $data["signature"]["error"];
  $signature_size = $data["signature"]["size"];

  $random_name = rand(1000, 1000000) . "-" . $signature_name;
  $signature_upload_name = $upload_dir . strtolower($random_name);
  $signature_upload_name = preg_replace('/\s+/', '-', $signature_upload_name);
  $signature_uploaded = move_uploaded_file($signature_tmp_name, $signature_upload_name);


  $sqll1 = "select * from u_comman_doc where u_id='$u_id'";
  $result = $conn->query($sqll1);


  if ($result->num_rows == 0) {

    if ($photo_uploaded && $aadhar_uploaded && $electricitybill_uploaded && $signature_uploaded) {
      $sql = "INSERT INTO u_comman_doc (u_id,u_photo,u_aadharcard,u_electricitybill,u_signature) VALUES ('$u_id','$photo_upload_name', '$aadhar_upload_name', '$electricitybill_upload_name', '$signature_upload_name')";
      // $conn->query($sql);
      if($photo_size > $max_size){
        $c->msg = "Photo Size exceeded";
        $c->status = "0";
      }else if($aadharcard_size > $max_size){
        $c->msg = "Aadharcard Size exceeded";
        $c->status = "0";
      }else if($electricitybill_size > $max_size){
        $c->msg = "Electricity Bill Size exceeded";
        $c->status = "0";
      }else if($signature_size > $max_size){
        $c->msg = "Signature Size exceeded";
        $c->status = "0";
      }else{

      if($conn->query($sql) === TRUE){
        $c->msg = "File Inserted Successfully";
        $c->status = "1";

        $sql2 = "UPDATE u_detail SET u_doc_success = 1, remark = 0, v_remark = 0 where  u_id = $u_id ";
        $conn->query($sql2);

        // $sqll1 = "select u_doc_success from u_detail where u_id='$u_id'";
        // $result = $conn->query($sqll1);
        // $row = mysqli_fetch_array($result);
        // $c->u_doc_success = $row['u_doc_status'];

        // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
        // $result2 = $conn->query($sql2);
        // $result2->num_rows;
        // $row = $result2->fetch_assoc();
        // $c->u_doc_success = $row['u_doc_success'];
        // $u_doc_success = $row['u_doc_stauts'];
      }
      // $response = array(

      //   // "status" => "success",
      //   // "error" => false,
      //   // "message" => "File uploaded successfully",
      //   // "url" => $server_url . "/" . $aadhar_upload_name

      // );
     else {
      $c->msg = "Error Inserting The File";
      $c->status = "0";
      // $response = array(
      //   "status" => "error",
      //   "error" => true,
      //   "message" => "Error uploading the file!"

      // );
    }
  }
  }
  } else {

    if ($photo_uploaded && $aadhar_uploaded && $electricitybill_uploaded && $signature_uploaded) {
      // $sql = "UPDATE u_comman_doc SET u_photo = '$server_url/$photo_upload_name', u_aadharcard = '$server_url/$aadhar_upload_name' , u_electricitybill = '$server_url/$electricitybill_upload_name', u_signature = '$server_url/$signature_upload_name' WHERE u_id = $u_id";
      $sql = "UPDATE u_comman_doc SET u_photo = '$photo_upload_name', u_aadharcard = '$aadhar_upload_name' , u_electricitybill = '$electricitybill_upload_name', u_signature = '$signature_upload_name' WHERE u_id = $u_id";
      
      if($photo_size > $max_size){
        $c->msg = "Photo Size exceeded";
        $c->status = "0";
      }else if($aadharcard_size > $max_size){
        $c->msg = "Aadharcard Size exceeded";
        $c->status = "0";
      }else if($electricitybill_size > $max_size){
        $c->msg = "Electricity Bill Size exceeded";
        $c->status = "0";
      }else if($signature_size > $max_size){
        $c->msg = "Signature Size exceeded";
        $c->status = "0";
      }else{
      $sql1 = "UPDATE u_detail SET remark = 0 , v_remark = 0 WHERE u_id = $u_id";
      $conn->query($sql1);
      // $conn->query($sql);
      if($conn->query($sql) === TRUE){
        $c->msg = "File Updated Successfully";
        $c->status = "1";

        $sql2 = "UPDATE u_detail SET u_doc_success = 1 where u_id = $u_id ";
        $conn->query($sql2);

        // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
        // $result2 = $conn->query($sql2);
        // $result2->num_rows;
        // $row = $result2->fetch_assoc();
        // $c->u_doc_success = $row['u_doc_success'];
      }
    
      // $response = array(
      //   "status" => "success",
      //   "error" => false,
      //   "message" => "File updated successfully",
      // "url" => $server_url . "/" . $aadhar_upload_name
      // );
    else {

      $c->msg = "Error Updating The File";
      $c->status = "0";

      // $response = array(
      //   "status" => "error",
      //   "error" => true,
      //   "message" => "Error updating the file!"

      // );
    }
  }}
  }

  echo json_encode($c);

  exit();
}


function user_slot($data)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    public $u_username = "";
    public $u_id = "";

    public $u_timeslotdate = "";
    public $u_timeslottime = "";

    public $u_slot_success = "";

  }
  //    date_default_timezone_set('Asia/Kolkata');
// $today = date("Y-m-d");
  $c = new Common();
  // $data = json_decode($data);
  // $username = $data['u_username'];
  $u_id = $data['u_id'];
  $u_timeslotdate = $data['u_timeslotdate'];
  $u_timeslottime = $data['u_timeslottime'];
  // $u_slot_success = $data['u_slot_success'];


  $sqll1 = "select * from u_detail where u_id='$u_id'";

  $result = $conn->query($sqll1);


  if ($result->num_rows > 0) {

    $sql2 = "SELECT COUNT(u_id) AS cnt from u_detail where u_timeslottime = '$u_timeslottime' AND u_timeslotdate = '$u_timeslotdate'";
    $result = $conn->query($sql2);

    $d=mysqli_fetch_assoc($result);
    if ($d['cnt'] < 5) {


    $sql = "UPDATE u_detail SET u_timeslotdate = '$u_timeslotdate' , u_timeslottime = '$u_timeslottime' , u_slot_success = 1  where u_id='$u_id' ";

    // $sql2 = "SELECT u_slot_success FROM u_detail WHERE u_id='$u_id'";
    // $result2 = $conn->query($sql2);
    // $result2->num_rows;
    // $row = $result2->fetch_assoc();
    // $c->u_doc_status = $row['u_doc_status'];
    // $c->u_doc_success = $row['u_doc_success'];
    // $c->u_slot_success = $row['u_slot_success'];
    // $c->eligible = $row['eligible'];
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
      $c->msg = "Slot Booked Successfully";
      $c->status = "1";
    } else {
      $c->msg = "Slot Not Booked";
      $c->status = "0";
    }
  }
  else{
    $c->msg = "Slot Is Full";
    $c->status = "0";
  }
  } else {
    $c->msg = "User Not Register";
    $c->status = "0";

  }
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);

}

function user_display($data)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    public $u_username = "";
    public $u_id = "";
    public $u_firstname = "";
    public $u_lastname = "";

    public $u_doc_status = "";
    public $u_doc_success = "";

    public $u_slot_success = "";
    public $eligible = "";
    public $u_create = "";

    public $u_category = "";

    public $remark = "";
    public $v_remark = "";

    public $u_timeslotdate = "";

    public $u_timeslottime = "";

  }
  //    date_default_timezone_set('Asia/Kolkata');
// $today = date("Y-m-d");
  $c = new Common();
  // $data = json_decode($data);
  // $username = $data['u_username'];
  $u_id = $data['u_id'];
  // $u_username = $data['u_username'];

  $sqll1 = "select * from u_detail where u_id='$u_id'";

  $result = $conn->query($sqll1);


  if ($result->num_rows > 0) {

    // $sqll1 = "select u_username from u_detail where u_id='$u_id'";

    // $result = $conn->query($sqll1);

    // $row = mysqli_fetch_array($result);
    // $u_username = $row['u_username'];

    $sql2 = "SELECT u_firstname,u_lastname,u_category FROM u_detail WHERE u_id='$u_id'";
    $result2 = $conn->query($sql2);
    $result2->num_rows;
    $row = $result2->fetch_assoc();
    $c->u_firstname = $row['u_firstname'];
    $c->u_lastname = $row['u_lastname'];
    $c->u_category = $row['u_category'];


    $sql2 = "SELECT u_doc_status,u_doc_success,u_slot_success,eligible,u_create,remark,v_remark,u_timeslottime,u_timeslotdate FROM u_detail WHERE u_id='$u_id'";
    $result2 = $conn->query($sql2);
    $result2->num_rows;
    $row = $result2->fetch_assoc();
    $c->u_doc_status = $row['u_doc_status'];
    $c->u_doc_success = $row['u_doc_success'];
    $c->u_slot_success = $row['u_slot_success'];
    $c->eligible = $row['eligible'];
    $c->u_create = $row['u_create'];
    $c->remark = $row['remark'];
    $c->v_remark = $row['v_remark'];
    $c->u_timeslotdate = $row['u_timeslotdate'];
      $c->u_timeslottime = $row['u_timeslottime'];
    // echo $sql;
    // if ($conn->query($sql2) === TRUE) {
      $c->msg = "Displayed Successfully";
      $c->status = "1";
    } 
    else {
      $c->msg = "Not Displayed Successfully";
      $c->status = "0";
    }

  // } else {
  //   $c->msg = "User Not Register";
  //   $c->status = "0";

  // }
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);

}

function user_profile($data)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    public $u_username = "";
    public $u_id = "";
    public $u_firstname = "";
    public $u_lastname = "";

    public $u_phonenumber = "";

    public $u_email = "";

    public $u_gender = "";

    public $u_dob = "";

    public $u_city = "";

    public $u_address = "";

    public $u_landmark = "";

    public $u_pin = "";

    public $u_category = "";

    public $u_timeslotdate = "";

    public $u_timeslottime = "";

  }
  //    date_default_timezone_set('Asia/Kolkata');
// $today = date("Y-m-d");
  $c = new Common();
  // $data = json_decode($data);
  // $username = $data['u_username'];
  $u_id = $data['u_id'];
  // $u_username = $data['u_username'];

  $sqll1 = "select * from u_detail where u_id='$u_id'";

  $result = $conn->query($sqll1);


  if ($result->num_rows > 0) {

    // $sqll1 = "select u_username from u_detail where u_id='$u_id'";

    // $result = $conn->query($sqll1);

    // $row = mysqli_fetch_array($result);
    // $u_username = $row['u_username'];

    $sql2 = "SELECT * FROM u_detail WHERE u_id='$u_id'";
    $result2 = $conn->query($sql2);
    $result2->num_rows;
    $row = $result2->fetch_assoc();
    $c->u_username = $row['u_username'];
    $c->u_firstname = $row['u_firstname'];
    $c->u_lastname = $row['u_lastname'];
    $c->u_category = $row['u_category'];
    $c->u_phonenumber = $row['u_phonenumber'];
    $c->u_email = $row['u_email'];
    $c->u_gender = $row['u_gender'];
    $c->u_dob = $row['u_dob'];
    $c->u_city = $row['u_city'];
    $c->u_address = $row['u_address'];
    $c->u_landmark = $row['u_landmark'];
    $c->u_pin = $row['u_pin'];
    $c->u_timeslotdate = $row['u_timeslotdate'];
      $c->u_timeslottime = $row['u_timeslottime'];

    // echo $sql;
    // if ($conn->query($sql2) === TRUE) {
      $c->msg = "Displayed Successfully";
      $c->status = "1";
    } 
    else {
      $c->msg = "Not Displayed Successfully";
      $c->status = "0";
    }

  // } else {
  //   $c->msg = "User Not Register";
  //   $c->status = "0";

  // }
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);

}

function user_bonafide($data, $d)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    //    public $u_id  = "";
    public $u_username = "";
    public $u_id = "";


    // public $u_doc_success = "";
  // public $aadharcard_name = "";

  // public $aadharcard_tmp_name = "";
  // public $aadharcard_error = "";

  // public $aadhar_upload_name = "";

  }

  $u_id = $d['u_id'];

  $c = new Common();
  // $u_doc_success = $d['u_doc_success'];

  $max_size = 2000000;

  $response = array();
  $upload_dir = 'uploads/';
  $server_url = 'http://127.0.0.1';
  // print_r($data);

  //bonafide
  $bonafide_name = $data["bonafide"]["name"];
  $bonafide_tmp_name = $data["bonafide"]["tmp_name"];
  $bonafide_error = $data["bonafide"]["error"];
  $bonafide_size = $data["bonafide"]["size"];

  $random_name = rand(1000, 1000000) . "-" . $bonafide_name;
  $bonafide_upload_name = $upload_dir . strtolower($random_name);
  $bonafide_upload_name = preg_replace('/\s+/', '-', $bonafide_upload_name);
  $bonafide_uploaded = move_uploaded_file($bonafide_tmp_name, $bonafide_upload_name);


  $sqll1 = "select u_s_bonafide from u_s_doc where u_id='$u_id'";
  $result = $conn->query($sqll1);


  if ($result->num_rows == 0) {

    if ($bonafide_uploaded) {

      if($bonafide_size > $max_size){
        $c->msg = "Bonafide Size exceeded";
        $c->status = "0";
      }else{

      $sql = "INSERT INTO u_s_doc(u_id,u_s_bonafide) VALUES ('$u_id','$bonafide_upload_name')";
      // $conn->query($sql);

      if($conn->query($sql) === TRUE){
        $c->msg = "File Inserted Successfully";
        $c->status = "1";

        // $sql2 = "UPDATE u_detail SET u_doc_success = 1 where  u_id = $u_id ";
        // $conn->query($sql2);

        // $sqll1 = "select u_doc_success from u_detail where u_id='$u_id'";
        // $result = $conn->query($sqll1);
        // $row = mysqli_fetch_array($result);
        // $c->u_doc_success = $row['u_doc_status'];

        // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
        // $result2 = $conn->query($sql2);
        // $result2->num_rows;
        // $row = $result2->fetch_assoc();
        // $c->u_doc_success = $row['u_doc_success'];
        // $u_doc_success = $row['u_doc_stauts'];
      }
      // $response = array(

      //   // "status" => "success",
      //   // "error" => false,
      //   // "message" => "File uploaded successfully",
      //   // "url" => $server_url . "/" . $aadhar_upload_name

      // );
     else {
      $c->msg = "Error Inserting The File";
      $c->status = "0";
      // $response = array(
      //   "status" => "error",
      //   "error" => true,
      //   "message" => "Error uploading the file!"

      // );
    }
  }

  }
  } else {

    if ($bonafide_uploaded) {
      // $sql = "UPDATE u_comman_doc SET u_photo = '$server_url/$photo_upload_name', u_aadharcard = '$server_url/$aadhar_upload_name' , u_electricitybill = '$server_url/$electricitybill_upload_name', u_signature = '$server_url/$signature_upload_name' WHERE u_id = $u_id";
      if($bonafide_size > $max_size){
        $c->msg = "Bonafide Size exceeded";
        $c->status = "0";
      }else{

      $sql = "UPDATE u_s_doc SET u_s_bonafide = '$bonafide_upload_name' WHERE u_id = $u_id";
      
      // $conn->query($sql);
      if($conn->query($sql) === TRUE){
        $c->msg = "File Updated Successfully";
        $c->status = "1";

        // $sql2 = "UPDATE u_detail SET u_doc_success = 1 where u_id = $u_id ";
        // $conn->query($sql2);

        // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
        // $result2 = $conn->query($sql2);
        // $result2->num_rows;
        // $row = $result2->fetch_assoc();
        // $c->u_doc_success = $row['u_doc_success'];
      }
    
      // $response = array(
      //   "status" => "success",
      //   "error" => false,
      //   "message" => "File updated successfully",
      // "url" => $server_url . "/" . $aadhar_upload_name
      // );
    else {

      $c->msg = "Error Updating The File";
      $c->status = "0";

      // $response = array(
      //   "status" => "error",
      //   "error" => true,
      //   "message" => "Error updating the file!"

      // );
    }
  }

  }
  }

  echo json_encode($c);

  exit();
}


function user_disability($data, $d)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    //    public $u_id  = "";
    public $u_username = "";
    public $u_id = "";

    // public $u_doc_success = "";
  // public $aadharcard_name = "";

  // public $aadharcard_tmp_name = "";
  // public $aadharcard_error = "";

  // public $aadhar_upload_name = "";

  }

  $max_size = 2000000;

  $u_id = $d['u_id'];

  $c = new Common();
  // $u_doc_success = $d['u_doc_success'];


  $response = array();
  $upload_dir = 'uploads/';
  $server_url = 'http://127.0.0.1';
  // print_r($data);

  //bonafide
  $disability_name = $data["disability"]["name"];
  $disability_tmp_name = $data["disability"]["tmp_name"];
  $disability_error = $data["disability"]["error"];
  $disability_size = $data["disability"]["size"];


  $random_name = rand(1000, 1000000) . "-" . $disability_name;
  $disability_upload_name = $upload_dir . strtolower($random_name);
  $disability_upload_name = preg_replace('/\s+/', '-', $disability_upload_name);
  $disability_uploaded = move_uploaded_file($disability_tmp_name, $disability_upload_name);


  $sqll1 = "select u_h_disabilitycerttificate from u_h_doc where u_id='$u_id'";
  $result = $conn->query($sqll1);


  if ($result->num_rows == 0) {

    if ($disability_uploaded) {
      if($disability_size > $max_size){
        $c->msg = "Disability Size exceeded";
        $c->status = "0";
      }else{

      $sql = "INSERT INTO u_h_doc(u_id,u_h_disabilitycerttificate) VALUES ('$u_id','$disability_upload_name')";
      // $conn->query($sql);

      if($conn->query($sql) === TRUE){
        $c->msg = "File Inserted Successfully";
        $c->status = "1";

        // $sql2 = "UPDATE u_detail SET u_doc_success = 1 where  u_id = $u_id ";
        // $conn->query($sql2);

        // $sqll1 = "select u_doc_success from u_detail where u_id='$u_id'";
        // $result = $conn->query($sqll1);
        // $row = mysqli_fetch_array($result);
        // $c->u_doc_success = $row['u_doc_status'];

        // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
        // $result2 = $conn->query($sql2);
        // $result2->num_rows;
        // $row = $result2->fetch_assoc();
        // $c->u_doc_success = $row['u_doc_success'];
        // $u_doc_success = $row['u_doc_stauts'];
      }
      // $response = array(

      //   // "status" => "success",
      //   // "error" => false,
      //   // "message" => "File uploaded successfully",
      //   // "url" => $server_url . "/" . $aadhar_upload_name

      // );
     else {
      $c->msg = "Error Inserting The File";
      $c->status = "0";
      // $response = array(
      //   "status" => "error",
      //   "error" => true,
      //   "message" => "Error uploading the file!"

      // );
    }
  }

  }
  } else {

    if ($disability_uploaded) {
      // $sql = "UPDATE u_comman_doc SET u_photo = '$server_url/$photo_upload_name', u_aadharcard = '$server_url/$aadhar_upload_name' , u_electricitybill = '$server_url/$electricitybill_upload_name', u_signature = '$server_url/$signature_upload_name' WHERE u_id = $u_id";
      if($disability_size > $max_size){
        $c->msg = "Disability Size exceeded";
        $c->status = "0";
      }else{

      $sql = "UPDATE u_h_doc SET u_h_disabilitycerttificate = '$disability_upload_name' WHERE u_id = $u_id";
      
      // $conn->query($sql);
      if($conn->query($sql) === TRUE){
        $c->msg = "File Updated Successfully";
        $c->status = "1";

        // $sql2 = "UPDATE u_detail SET u_doc_success = 1 where u_id = $u_id ";
        // $conn->query($sql2);

        // $sql2 = "SELECT u_doc_success FROM u_detail WHERE u_id = $u_id";
        // $result2 = $conn->query($sql2);
        // $result2->num_rows;
        // $row = $result2->fetch_assoc();
        // $c->u_doc_success = $row['u_doc_success'];
      }
    
      // $response = array(
      //   "status" => "success",
      //   "error" => false,
      //   "message" => "File updated successfully",
      // "url" => $server_url . "/" . $aadhar_upload_name
      // );
    else {

      $c->msg = "Error Updating The File";
      $c->status = "0";

      // $response = array(
      //   "status" => "error",
      //   "error" => true,
      //   "message" => "Error updating the file!"

      // );
    }
  }
  }
  }

  echo json_encode($c);

  exit();
}

function user_otp($data)
{
  global $conn;

  class Common
  {
    public $status = "";
    public $msg = "";
    public $u_username = "";
    public $u_id = "";

    public $u_email = "";

  }

 
  //    date_default_timezone_set('Asia/Kolkata');
// $today = date("Y-m-d");
  $c = new Common();
  // $data = json_decode($data);
  // $username = $data['u_username'];
  $u_id = $data['u_id'];
  // $u_username = $data['u_username'];
  date_default_timezone_set("Asia/Kolkata");

  
  $sql = "select u_email from u_detail where u_id = '$u_id'";
 $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  $u_email = $row['u_email'];

  $otp = rand(1000, 9999);

  $subject = "Simple Email Test via PHP";
    $body = "Hi, This is test email send by PHP Script this is your otp $otp ";
    $headers = "From: brtsbuspassdeveloper@gmail.com";

    if (mail($u_email, $subject, $body, $headers)) {
      echo "Email successfully sent to $u_email...";
      $mail_status = 1;
      $sql1 = "INSERT INTO otp_data VALUES('','$otp','0','" . date("Y-m-d H:i:s") . "')";
      $data = mysqli_query($con, $sql1);

  
  // } else {
  //   $c->msg = "User Not Register";
  //   $c->status = "0";

  // }
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("HTTP/1.1 201 OK");
  echo json_encode($c);

}
}

// function form_fill($data)
// {


// global $conn;

// 	class Common {
//     public $status = "";
//     public $msg  = "";
//     public $u_id  = "";
//     public $u_firstname = "";
//     public $u_lastname = "";
//     public $u_phonenumber = "";

//     public $u_email = "";
//     public $u_gender = "";
//     public $u_dob = "";
//     public $u_city = "";
//     public $u_address = "";
//     public $u_landmark = "";
//     public $u_pin = "";
//     public $u_category = "";

//     // public $u_city = "";
//    }	


//    $data=json_decode($data);

//    $u_email=$data->u_email;
//    $u_pwd=$data->u_password;


// // date_default_timezone_set('Asia/Kolkata');  
// // $today = date("Y-m-d");
//  $c=new Common();

//   $sql="SELECT * FROM 'u_login' WHERE u_email='$u_email'and u_password='$u_pwd' ";

// $result=$conn->query($sql);

// if($result->num_rows > 0)
// {
//   $row=$result->fetch_assoc();


//  if($row['u_status']=='1')
//  {
// // $c->u_id=$row['u_id'];
// $c->u_username=$row['u_name'];
// $c->u_email=$row['u_email'];
// // $c->u_mobileno=$row['u_mobileno'];
// // $c->u_city=$row['u_city'];
// $c->msg="User Login Successfully";
//   $c->status="1";
//  }
//  else{
//   $c->msg="User Not Verify By the Admin";
//   $c->status="0";
//  } 

// }
// else
// {
// $c->msg="Invalid email or password";
// 	$c->status="0";
// }


// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("HTTP/1.1 201 OK");
// echo json_encode($c);
// }

?>