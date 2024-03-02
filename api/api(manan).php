<?php
	include("conn.php");

class Accessmethod {
      public $status = "";
      public $msg  = "";  
   }
function helperror()
{
	 header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("HTTP/1.1 401 unauthorized");
    // header("HTTP/1.1 201 OK");

   $e = new Accessmethod();
   $e->status = "-1";
   $e->msg  = "Invalid Access Token";
   echo json_encode($e);
}

if(isset($_REQUEST['v_api']) && !empty($_REQUEST['v_api']))
{

$v_api=$_REQUEST['v_api'];
switch ($v_api) {
		case 'user_login':
		if(isset($_REQUEST['u_data']))
		{
		$data=$_REQUEST['u_data'];
		user_login($data);	
		}
		else
		{
			helperror();
		}	
		break;
    

      case 'user_reg':
     if(isset($_REQUEST['u_data']))
     {
          $data=$_REQUEST['u_data'];

   user_reg($data);
     }
     else
     {
helperror();
     }
      break;

		case 'add_vehicle':
    if(isset($_REQUEST['v_data']))
     {
                $v_data=$_REQUEST['v_data'];
          $v_pic=$_REQUEST['v_pic'];

      add_vehicle($v_data,$v_pic);

     }
      break;

      case 'add_booking_service':
        if(isset($_REQUEST['v_data']))
     {
                $v_data=$_REQUEST['v_data'];

      add_booking_service($v_data);

     }
        break;

      case 'vehicle_list':
       if(isset($_REQUEST['u_data']))
      {
      $u_data=$_REQUEST['u_data'];
      vehicle_list($u_data);
     }
      break;

       case 'dealer_list':
      dealer_list();
      break;

      case 'service_list_by_dealer':
      if(isset($_REQUEST['d_data']))
     {
      $d_data=$_REQUEST['d_data'];
      service_list_by_dealer($d_data);
     }
        break;

       case 'service_book_by_user':
         if(isset($_REQUEST['u_data']))
         {
          $u_data=$_REQUEST['u_data'];
          service_book_by_user($u_data);
          }
          break; 

          case 'service_book_by_user_pending':
         if(isset($_REQUEST['u_data']))
         {
          $u_data=$_REQUEST['u_data'];
          service_book_by_user_pending($u_data);
          }
          break; 
          case 'service_book_by_user_complete':
         if(isset($_REQUEST['u_data']))
         {
          $u_data=$_REQUEST['u_data'];
          service_book_by_user_complete($u_data);
          }
          break; 
          case 'service_book_by_user_cancelled':
         if(isset($_REQUEST['u_data']))
         {
          $u_data=$_REQUEST['u_data'];
          service_book_by_user_cancelled($u_data);
          }
          break; 
          case 'delete_vehicle':
         if(isset($_REQUEST['u_data']))
         {
          $u_data=$_REQUEST['u_data'];
          delete_vehicle($u_data);
          }
          break;
          case 'delete_booking':
         if(isset($_REQUEST['u_data']))
         {
          $u_data=$_REQUEST['u_data'];
          delete_booking($u_data);
          }
          break; 
		default:
		helperror();
		break;	
		}


}
else
{
	helperror();
}

function delete_vehicle($data)
{
  global $conn;

  class Common {
      public $status = "";
      public $msg  = "";
   }  
   date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d");
        $c=new Common();
        $data=json_decode($data);

    $u_id=$data->u_id;
    $v_id=$data->v_id;


    $sql="DELETE FROM `user_v_reg` WHERE u_id='$u_id' and u_r_v_id='$v_id'";

    if($conn->query($sql)===TRUE)
    {

     $c->msg="Vehicle Deleted Successfully";
    $c->status="1";
    }
    else
    {
    $c->msg="Error In Vehicle Deleted";
    $c->status="0";
    }

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($c);

}
function delete_booking($data)
{
  global $conn;

  class Common {
      public $status = "";
      public $msg  = "";
   }  
   date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d");
        $c=new Common();
        $data=json_decode($data);

    $u_id=$data->u_id;
    $b_s_id=$data->b_s_id;


    $sql="DELETE FROM `book_service` WHERE u_id='$u_id' and b_s_id='$b_s_id'";

    if($conn->query($sql)===TRUE)
    {

     $c->msg="Booking Service Deleted Successfully";
    $c->status="1";
    }
    else
    {
    $c->msg="Error In Booking Service Deleted";
    $c->status="0";
    }

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($c);

}

function service_book_by_user_pending($u_id)
{
  class service_list {
      public $status = "";
      public $msg  = "";
      public $service_list="";
   } 
  global $conn;
$service_list=new service_list();

$sql="SELECT * FROM  book_service,user_v_reg,service_package,dealer where dealer.d_id=book_service.d_id and service_package.s_p_id=book_service.s_p_id  and  user_v_reg.u_r_v_id=book_service.u_v_r_id and b_s_staus='0' and  book_service.u_id='$u_id' LIMIT 5";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
  
while ($row=$result->fetch_assoc()) {
$service_data[]= array(  
                'd_workshopname'               =>     $row["d_workshopname"],
                'd_w_address'          =>     $row["d_w_address"],  
                'd_w_contact'     =>     $row["d_w_contact"],
                'd_pic'     =>     $row["d_pic"],
                'd_city'          =>     $row["d_city"],
                'd_state'               =>     $row["d_state"],
                 'd_pincode'               =>     $row["d_pincode"],
                 'd_w_time'               =>     $row["d_w_time"],
                 's_p_name'               =>     $row["s_p_name"],
                's_p_amount'          =>     $row["s_p_amount"],  
                's_p_desc'     =>     $row["s_p_desc"],
                's_p_status'          =>     $row["s_p_status"],
                's_p_date'               =>     $row["s_p_date"],
                'v_name'          =>     $row["v_name"],  
                'v_model'     =>     $row["v_model"],
                'v_pic'          =>     $row["v_pic"],
                'v_year'               =>     $row["v_year"],
                'v_companyname'          =>     $row["v_companyname"], 
                'v_number'          =>     $row["v_number"], 
                'v_status'          =>     $row["v_status"],  
                'v_c_date'     =>     $row["v_c_date"],
                'b_note'          =>     $row["b_note"],  
                'b_time'     =>     $row["b_time"],
                'b_date'          =>     $row["b_date"],
                'd_timedate'               =>     $row["d_timedate"],
                'b_s_staus'          =>     $row["b_s_staus"] 

           
           );  
  
  }

$service_list->status="1";
$service_list->msg="Service Book List fetch Successfully";
$service_list->service_list=$service_data;
}
else
{
$service_list->status="0";
$service_list->msg="No Service Book Found";
$service_list->service_list=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($service_list); 
}

function service_book_by_user_complete($u_id)
{
  class service_list {
      public $status = "";
      public $msg  = "";
      public $service_list="";
   } 
  global $conn;
$service_list=new service_list();

$sql="SELECT * FROM  book_service,user_v_reg,service_package,dealer where dealer.d_id=book_service.d_id and service_package.s_p_id=book_service.s_p_id  and  user_v_reg.u_r_v_id=book_service.u_v_r_id and b_s_staus='2' and  book_service.u_id='$u_id' LIMIT 5 ";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
  
while ($row=$result->fetch_assoc()) {
$service_data[]= array(  
                'd_workshopname'               =>     $row["d_workshopname"],
                'd_w_address'          =>     $row["d_w_address"],  
                'd_w_contact'     =>     $row["d_w_contact"],
                'd_pic'     =>     $row["d_pic"],
                'd_city'          =>     $row["d_city"],
                'd_state'               =>     $row["d_state"],
                 'd_pincode'               =>     $row["d_pincode"],
                 'd_w_time'               =>     $row["d_w_time"],
                 's_p_name'               =>     $row["s_p_name"],
                's_p_amount'          =>     $row["s_p_amount"],  
                's_p_desc'     =>     $row["s_p_desc"],
                's_p_status'          =>     $row["s_p_status"],
                's_p_date'               =>     $row["s_p_date"],
                'v_name'          =>     $row["v_name"],  
                'v_model'     =>     $row["v_model"],
                'v_pic'          =>     $row["v_pic"],
                'v_year'               =>     $row["v_year"],
                'v_companyname'          =>     $row["v_companyname"], 
                'v_number'          =>     $row["v_number"], 
                'v_status'          =>     $row["v_status"],  
                'v_c_date'     =>     $row["v_c_date"],
                'b_note'          =>     $row["b_note"],  
                'b_time'     =>     $row["b_time"],
                'b_date'          =>     $row["b_date"],
                'd_timedate'               =>     $row["d_timedate"],
                'b_s_staus'          =>     $row["b_s_staus"] 

           
           );  
  
  }

$service_list->status="1";
$service_list->msg="Service Book List fetch Successfully";
$service_list->service_list=$service_data;
}
else
{
$service_list->status="0";
$service_list->msg="No Service Book Found";
$service_list->service_list=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($service_list); 
}

function service_book_by_user_cancelled($u_id)
{
  class service_list {
      public $status = "";
      public $msg  = "";
      public $service_list="";
   } 
  global $conn;
$service_list=new service_list();

$sql="SELECT * FROM  book_service,user_v_reg,service_package,dealer where dealer.d_id=book_service.d_id and service_package.s_p_id=book_service.s_p_id  and  user_v_reg.u_r_v_id=book_service.u_v_r_id and book_service.b_s_staus='3' and  book_service.u_id='$u_id'  LIMIT 5";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
  
while ($row=$result->fetch_assoc()) {
$service_data[]= array(  
                'd_workshopname'               =>     $row["d_workshopname"],
                'd_w_address'          =>     $row["d_w_address"],  
                'd_w_contact'     =>     $row["d_w_contact"],
                'd_pic'     =>     $row["d_pic"],
                'd_city'          =>     $row["d_city"],
                'd_state'               =>     $row["d_state"],
                 'd_pincode'               =>     $row["d_pincode"],
                 'd_w_time'               =>     $row["d_w_time"],
                 's_p_name'               =>     $row["s_p_name"],
                's_p_amount'          =>     $row["s_p_amount"],  
                's_p_desc'     =>     $row["s_p_desc"],
                's_p_status'          =>     $row["s_p_status"],
                's_p_date'               =>     $row["s_p_date"],
                'v_name'          =>     $row["v_name"],  
                'v_model'     =>     $row["v_model"],
                'v_pic'          =>     $row["v_pic"],
                'v_year'               =>     $row["v_year"],
                'v_companyname'          =>     $row["v_companyname"], 
                'v_number'          =>     $row["v_number"], 
                'v_status'          =>     $row["v_status"],  
                'v_c_date'     =>     $row["v_c_date"],
                'b_note'          =>     $row["b_note"],  
                'b_time'     =>     $row["b_time"],
                'b_date'          =>     $row["b_date"],
                'd_timedate'               =>     $row["d_timedate"],
                'b_s_staus'          =>     $row["b_s_staus"] 

           
           );  
  
  }

$service_list->status="1";
$service_list->msg="Service Book List fetch Successfully";
$service_list->service_list=$service_data;
}
else
{
$service_list->status="0";
$service_list->msg="No Service Book Found";
$service_list->service_list=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($service_list); 
}




function service_book_by_user($u_id)
{
  class service_list {
      public $status = "";
      public $msg  = "";
      public $service_list="";
   } 
  global $conn;
$service_list=new service_list();

$sql="SELECT * FROM  book_service,user_v_reg,service_package,dealer where dealer.d_id=book_service.d_id and service_package.s_p_id=book_service.s_p_id  and  user_v_reg.u_r_v_id=book_service.u_v_r_id and  book_service.u_id='$u_id'";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
  
while ($row=$result->fetch_assoc()) {
$service_data[]= array(  
                'd_workshopname'               =>     $row["d_workshopname"],
                'd_w_address'          =>     $row["d_w_address"],  
                'd_w_contact'     =>     $row["d_w_contact"],
                'd_pic'     =>     $row["d_pic"],
                'd_city'          =>     $row["d_city"],
                'd_state'               =>     $row["d_state"],
                 'd_pincode'               =>     $row["d_pincode"],
                 'd_w_time'               =>     $row["d_w_time"],
                 's_p_name'               =>     $row["s_p_name"],
                's_p_amount'          =>     $row["s_p_amount"],  
                's_p_desc'     =>     $row["s_p_desc"],
                's_p_status'          =>     $row["s_p_status"],
                's_p_date'               =>     $row["s_p_date"],
                'v_name'          =>     $row["v_name"],  
                'v_model'     =>     $row["v_model"],
                'v_pic'          =>     $row["v_pic"],
                'v_year'               =>     $row["v_year"],
                'v_companyname'          =>     $row["v_companyname"], 
                'v_number'          =>     $row["v_number"], 
                'v_status'          =>     $row["v_status"],  
                'v_c_date'     =>     $row["v_c_date"],
                'b_note'          =>     $row["b_note"],  
                'b_time'     =>     $row["b_time"],
                'b_date'          =>     $row["b_date"],
                'd_timedate'               =>     $row["d_timedate"],
                'b_s_staus'          =>     $row["b_s_staus"] 

           
           );  
  
  }

$service_list->status="1";
$service_list->msg="Service Book List fetch Successfully";
$service_list->service_list=$service_data;
}
else
{
$service_list->status="0";
$service_list->msg="No Service Book Found";
$service_list->service_list=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($service_list); 
}


function dealer_list()
{
	class dealer_list {
      public $status = "";
      public $msg  = "";
      public $dealer_list="";
   }  

  global $conn;
$dealer_list=new dealer_list();

  $sql="SELECT * FROM dealer where d_status='1'";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
	
while ($row=$result->fetch_assoc()) {
$dealer_data[]= array(  
                'd_id'               =>     $row["d_id"],  
                'd_workshopname'               =>     $row["d_workshopname"],
                'd_w_address'          =>     $row["d_w_address"],  
                'd_w_contact'     =>     $row["d_w_contact"],
                'd_pic'     =>     $row["d_pic"],
                'd_city'          =>     $row["d_city"],
                'd_state'               =>     $row["d_state"],
                 'd_pincode'               =>     $row["d_pincode"],
                 'd_w_time'               =>     $row["d_w_time"]

           
           );  
  
  }

$dealer_list->status="1";
$dealer_list->msg="Dealer List fetch Successfully";
$dealer_list->dealer_list=$dealer_data;
}
else
{
$dealer_list->status="0";
$dealer_list->msg="No Dealer Found";
$dealer_list->dealer_list=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($dealer_list); 


}

function service_list_by_dealer($d_id)
{
class service_list_by_dealer {
      public $status = "";
      public $msg  = "";
      public $service_list_by_dealer="";
   }  

  global $conn;
$service_list_by_dealer=new service_list_by_dealer();

  $sql="SELECT * FROM service_package where d_id='$d_id' and s_p_status='1'";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
while ($row=$result->fetch_assoc()) {
$service_data[]= array(  
                's_p_id'               =>     $row["s_p_id"],  
                's_p_name'               =>     $row["s_p_name"],
                's_p_amount'          =>     $row["s_p_amount"],  
                's_p_desc'     =>     $row["s_p_desc"],
                's_p_status'          =>     $row["s_p_status"],
                's_p_date'               =>     $row["s_p_date"]
         
           );  
  }

$service_list_by_dealer->status="1";
$service_list_by_dealer->msg="Service List fetch Successfully";
$service_list_by_dealer->service_list_by_dealer=$service_data;
}
else
{
$service_list_by_dealer->status="0";
$service_list_by_dealer->msg="No Service Found";
$service_list_by_dealer->service_list_by_dealer=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($service_list_by_dealer);  
}



function vehicle_list($u_id)
{
class vehicle_list {
      public $status = "";
      public $msg  = "";
      public $vehicle_list="";
   }  

  global $conn;
$vehicle_list=new vehicle_list();

  $sql="SELECT * FROM user_v_reg where u_id='$u_id'";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
{
while ($row=$result->fetch_assoc()) {
$vehicle_data[]= array(  
                'u_r_v_id'               =>     $row["u_r_v_id"],  
                'u_id'               =>     $row["u_id"],
                'v_name'          =>     $row["v_name"],  
                'v_model'     =>     $row["v_model"],
                'v_pic'          =>     $row["v_pic"],
                'v_year'               =>     $row["v_year"],
                'v_companyname'          =>     $row["v_companyname"], 
                'v_number'          =>     $row["v_number"], 
                'v_status'          =>     $row["v_status"],  
                'v_c_date'     =>     $row["v_c_date"]
         
           );  
  
  }

$vehicle_list->status="1";
$vehicle_list->msg="Vehicle List fetch Successfully";
$vehicle_list->vehicle_list=$vehicle_data;
}
else
{
$vehicle_list->status="0";
$vehicle_list->msg="No Vehicle Found";
$vehicle_list->vehicle_list=array();
}
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($vehicle_list); 	
}

function add_booking_service($data)
{
  global $conn;

  class Common {
      public $status = "";
      public $msg  = "";
   }  
   date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d");
        $c=new Common();
        $data=json_decode($data);

    $b_date=$data->b_date;
    $b_time=$data->b_time;
    $b_note=$data->b_note;
    $user_id=$data->user_id;
    $s_p_id=$data->s_p_id;
    $v_r_id=$data->v_r_id;


    $sql="SELECT * FROM `service_package` WHERE s_p_id='$s_p_id'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $d_id=$row['d_id'];

$sql1="INSERT INTO `book_service`(`u_id`, `d_id`, `u_v_r_id`, `s_p_id`, `b_note`, `b_time`, `b_date`,  `b_s_staus`, `b_c_date`) VALUES ('$user_id','$d_id','$v_r_id','$s_p_id','$b_note','$b_time','$b_date','0','$today')";


if($conn->query($sql1)=== TRUE)
{
$c->msg="Vehicle Service Book Successfully";
  $c->status="1";
}
else
{
   $c->msg="Error In Vehicle Service Book";
  $c->status="0";
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($c);

}

function add_vehicle($data,$pic)
{
   global $conn;

  class Common {
      public $status = "";
      public $msg  = "";
   }  
   date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");
  $c=new Common();
   $data=json_decode($data);
   
   $uniquesavename=time().uniqid(rand());

   $u_id=$data->u_id;
   $v_name=$data->v_name;
   $v_model=$data->v_model;
    $v_year=$data->v_year;
    $v_companyname=$data->v_cname;
    $v_number=$data->v_number;

 $path="uploads/veh".$uniquesavename.".jpg";
file_put_contents($path,base64_decode($pic));


   $sql="INSERT INTO `user_v_reg`(`u_id`, `v_name`, `v_model`, `v_pic`, `v_year`, `v_companyname`, `v_number`, `v_status`, `v_c_date`) VALUES ('$u_id','$v_name','$v_model','$path','$v_year','$v_companyname','$v_number','1','$today')";
if($conn->query($sql)===TRUE)
{
$c->msg="Vehicle Register Successfully";
  $c->status="1";
}
else
{
  $c->msg="Error In Vehicle User";
  $c->status="0";
}
 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($c);

}




function user_reg($data)
{
   global $conn;

  class Common {
      public $status = "";
      public $msg  = "";
   }  
   date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");
  $c=new Common();
   $data=json_decode($data);
   $email=$data->email;
   $password=$data->password;
   $name=$data->name;
   $mobileno=$data->mobileno;
    $address=$data->address;
    $city=$data->city;
    $state=$data->state;
    $pincode=$data->pincode;
$gender=$data->gender;
     

$sqll1="select * from e_user WHERE u_email='$email'";

$result=$conn->query($sqll1);


if($result->num_rows > 0)
{

 $c->msg="User Already Register";
  $c->status="0";
}
else
{
   $sql="INSERT INTO `e_user`(`u_name`, `u_email`, `u_password`, `u_mobileno`,`u_gender`, `u_address`, `u_pincode`, `u_city`, `u_state`, `u_status`, `u_regdate`) VALUES ('$name','$email','$password','$mobileno','$gender','$address','$pincode','$city','$state','1','$today')";
if($conn->query($sql)===TRUE)
{
$c->msg="User Register Successfully";
  $c->status="1";
}
else
{
  $c->msg="Error In Register User";
  $c->status="0";
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

	class Common {
      public $status = "";
      public $msg  = "";
       public $u_id  = "";
      public $u_name = "";
      public $u_email = "";
      public $u_mobileno = "";
      public $u_city = "";
   }	
   
 
   $data=json_decode($data);

   $u_email=$data->u_email;
   $u_pwd=$data->u_pwd;


date_default_timezone_set('Asia/Kolkata');  
$today = date("Y-m-d");
 $c=new Common();

  $sql="SELECT * FROM `e_user` WHERE u_email='$u_email'and u_password='$u_pwd' ";
 
$result=$conn->query($sql);

if($result->num_rows > 0)
{
  $row=$result->fetch_assoc();


 if($row['u_status']=='1')
 {
$c->u_id=$row['u_id'];
$c->u_name=$row['u_name'];
$c->u_email=$row['u_email'];
$c->u_mobileno=$row['u_mobileno'];
$c->u_city=$row['u_city'];
$c->msg="User Login Successfully";
  $c->status="1";
 }
 else{
  $c->msg="User Not Verify By the Admin";
  $c->status="0";
 } 

}
else
{
$c->msg="Invalid email or password";
	$c->status="0";
}


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("HTTP/1.1 201 OK");
echo json_encode($c);
}


?>