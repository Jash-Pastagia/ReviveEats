<?php
require_once 'conn.php';

$response = array();
if(isset($_GET['apicall'])){
    
    switch($_GET['apicall']){

        case 'signup' :
            if(isTheseParametersAvailable(array('u_username','u_email','u_password'))){
            
                $username = $_POST['u_username'];
                $email = $_POST['u_email'];
                $password = md5($_POST['u_password']);

                $stmt = $conn->prepare("select u_id from u_login where u_username = ? OR u_email = ?");
                $stmt->bind_param("ss",$username,$email);
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows > 0){
                    $response['error'] = true;
                    $response['message'] = 'User already registered';
                    $stmt->close();
                    }else{
                        $stmt = $conn->prepare("INSERT INTO u_login (u_username, u_email, u_password) VALUES (?, ?, ?)");
                        $stmt->bind_param("ssss", $username, $email, $password);
                    if($stmt->execute()){
                        $stmt = $conn->prepare("SELECT u_id, u_username, u_email FROM u_login WHERE u_username = ?"); 
                        $stmt->bind_param("s",$username);
                        $stmt->execute();
                        $stmt->bind_result($id, $username, $email);
                        $stmt->fetch();
                
                     $user = array(
                    'u_id'=>$id, 
                    'u_username'=>$username, 
                    'u_email'=>$email
                );

                    $stmt->close();

                    $response['error'] = false; 
                    $response['message'] = 'User registered successfully'; 
                    $response[''] = $user;
                     }
                }
            }else{
                $response['error'] = true; 
                $response['message'] = 'required parameters are not available';    
            }
         
        break;

        case 'login' :

        break;

        default:
        $response['error'] = true;
        $response['message'] = 'Invalid Operation Called';
    }
}else{
    $response['error'] = true; 
    $response['message'] = 'Invalid API Call';
}

echo json_encode($response);

function isTheseParametersAvailable($params){
    foreach($params as $param){
        if(!isset($_POST[$param])){
            return false;
        }
    }
    return true;
} 
?>