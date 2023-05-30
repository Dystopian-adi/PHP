<?php
include('class/class.phpmailer.php');
function email($subject,$name,$body){
	$mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPAuth = true;  
    $mail->Username = 'kangna.ranaut.rk@gmail.com';
    $mail->Password = 'xzrxlftvcmtgirvk';
    $mail->SMTPSecure = 'tls';
    $mail->SetFrom('kangna.ranaut.rk@gmail.com');
    $mail->FromName = $name;
    $mail->AddAddress('swetasanghani314@gmail.com');
    $mail->AddAddress('contact.riseupinfotech@gmail.com');
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    if($mail->Send())    {
        echo json_encode(array("status"=>200,"response"=>"Email sent successfully"));
    }
    else    {
        echo json_encode(array("status"=>400,"response"=>$mail->ErrorInfo));
    }
}
?>