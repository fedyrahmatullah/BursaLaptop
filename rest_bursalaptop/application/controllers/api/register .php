<?php   
  require_once 'connection.php';  
  $response = array();  
  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){  
  case 'signup':  
    if(isTheseParametersAvailable(array('nama_pelanggan','alamat','email','no_hp','password'))){  
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
   
    $stmt = $conn->prepare("SELECT id_pelanggan FROM tbl_pelanggan WHERE email = $email");  
    $stmt->bind_param("ss", $email);  
    $stmt->execute();  
    $stmt->store_result();  
   
    if($stmt->num_rows > 0){  
        $response['error'] = true;  
        $response['message'] = 'Pelanggan sudah terdaftar';  
        $stmt->close();  
    }  
    else{  
        $stmt = $conn->prepare("INSERT INTO tbl_pelanggan (nama_pelanggan, alamat, email, no_hp, password) VALUES ($nama_pelanggan,$alamat,$email,$no_hp,$password)";  
        $stmt->bind_param("ssss", $nama_pelanggan,$alamat,$email,$no_hp,$password);  
   
        if($stmt->execute()){  
            $stmt = $conn->prepare("SELECT id_pelanggan, nama_pelanggan, alamat, no_hp, email FROM tbl_pelanggan WHERE nama_pelanggan = $nama_pelanggan");   
            $stmt->bind_param("s",$nama_pelanggan);  
            $stmt->execute();  
            $stmt->bind_result($nama_pelanggan, $id_pelanggan, $alamat,$no_hp, $email);  
            $stmt->fetch();  
   
            $user = array(  
            'id_pelanggan'=>$id_pelanggan,   
            'nama_pelanggan'=>$nama_pelanggan,  
            'alamat'=>$alamat,  
            'no_hp'=>$no_hp,   
            'email'=>$email   
            );  
   
            $stmt->close();  
   
            $response['error'] = false;   
            $response['message'] = 'Pendaftaran pelanggan berhasil !';   
            $response['user'] = $user;   
        }  
    }  
   
}  
else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available';   
}  
break;   
case 'login':  
  if(isTheseParametersAvailable(array('username', 'password'))){  
    $username = $_POST['username'];  
    $password = md5($_POST['password']);   
   
    $stmt = $conn->prepare("SELECT id_pelanggan, nama_pelanggan, alamat, no_hp, email FROM tbl_pelanggan WHERE email = $email AND password = $password");  
    $stmt->bind_param("ss",$email, $password);  
    $stmt->execute();  
    $stmt->store_result();  
    if($stmt->num_rows > 0){  
    $stmt->bind_result($nama_pelanggan, $id_pelanggan, $alamat,$no_hp, $email);  
    $stmt->fetch();  
    $user = array(  
        'id_pelanggan'=>$id_pelanggan,   
        'nama_pelanggan'=>$nama_pelanggan,  
        'alamat'=>$alamat,  
        'no_hp'=>$no_hp,   
        'email'=>$email
    );  
   
    $response['error'] = false;   
    $response['message'] = 'Login Berhasil';   
    $response['user'] = $user;   
 }  
 else{  
    $response['error'] = false;   
    $response['message'] = 'Email atau password salah';  
 }  
}  
break;   
default:   
 $response['error'] = true;   
 $response['message'] = 'Invalid Operation Called';  
}  
}  
else{  
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