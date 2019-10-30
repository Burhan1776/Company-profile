<?php
 //koneksi
$conn = mysqli_connect("localhost","root","","cintacoding"); 
 ?>
<?php
//proses
    if(isset($_POST['simpan'])){
    $judul=$_POST['judul'];
    $universitas=$_POST['universitas'];
    $nama=$_POST['nama'];
    $email=$_POST['email'];
	$no_telepon_wa=$_POST['no_telepon_wa'];
	$message=$_POST['message'];
	$cintacoding=$_POST['cintacoding'];
   

 
      $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM contact WHERE email='$email' "));
			if ($cek > 0){
			echo "<script>window.alert('email yang anda masukan sudah ada')
			window.location='./contact.php'</script>";
    }else {
 
 
    mysqli_query($conn,"INSERT INTO contact(judul,universitas,nama,email,no_telepon_wa,message,cintacoding)
    VALUES ('$judul','$universitas','$nama','$email','$no_telepon_wa','$message','$cintacoding')");
    
	//script validasi data
 include "classes/class.phpmailer.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
// OR use TLS
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;  
$mail->Username = "cintacoding@gmail.com";
$mail->Password = "cintacoding123";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("$email", "$nama");
$mail->AddReplyTo("cintacoding@gmail.com", "Infokoding");
$mail->AddAddress("cintacoding@gmail.com");
$mail->Subject = "$cintacoding";
$mail->WordWrap   = 80;
$content = "<b>
Nama:$nama
<br>
Nama Universitas:$universitas
<br>
Judul:$judul
</b>"; $mail->MsgHTML($content);
$mail->IsHTML(true);
if(!$mail->Send()) 
echo "Problem sending email.";
else 
echo "email sent.";
	
  //header("Location:./contact.php");
    echo "<script>alert('Data Sudah Tersimpan');window.location='./contact.php'</script>";
    }
	}
    
    ?>