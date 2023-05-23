<?php
    #New Api Code
    

    function sms ($phoneNumber, $message){
        $apiKey = "dcddc410f5b6024bbd6c291156055eeed9a19c3f07274544ca91212662f6f802";
        $senderName = "23107";
      
        $bodyRequest = array(
            "mobile" =>$phoneNumber,
            "response_type"=>"json",
            "sender_name"=>$senderName,
            "service_id"=>0,
            "message"=>$message
        );
        $payload = json_encode($bodyRequest);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>'https://api.mobitechtechnologies.com/sms/sendsms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => array(
                'h_api_key: '.$apiKey,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    if(isset($_POST['phonenum']) AND isset($_POST['otp'])){
        $phonenum = $_POST['phonenum'];
        $to = preg_replace('/^0/', '254', str_replace("+", "", $phonenum));
        $msg = "Your secret One Time Password is : ".$_POST['otp'];

        // $otpNum = $_POST['otp'];
        // $otpTime = time(); //Store the current time when OTP is generated

        $result = sms($to, $msg);
        $result = trim($result, '[]');
        $sms_res = json_decode($result);
        $status = $sms_res -> status_code;
        if($status == '1000'){
            echo "OTP sent to your phone";

            // Set the cookie to store OTP and OTP time
            // setcookie('otpNum', $otpNum, time()+300); // Set the expiry time to 5 minutes
            // setcookie('otpTime', $otpTime, time()+300);
        }else{
            echo "Failed to sent OTP";
        }
    }else{
        echo "Phone Number or OTP is invalid";
    }

    // Verify OTP
    // if(isset($_POST['verify']) && isset($_COOKIE['otpNum']) && isset($_COOKIE['otpTime'])){
    //     $otpNum = $_COOKIE['otpNum'];
    //     $otpTime = $_COOKIE['otpTime'];
    //     $currentTime = time();

    //     // Check if OTP is valid and not expired
    //     if($_POST['verify'] == $otpNum && ($currentTime - $otpTime) <= 300){ // Check if OTP is same and not older than 5 minutes
    //         echo "OTP verified successfully";
    //     }else{
    //         echo "Invalid OTP or OTP expired";
    //     }
    // }
?>    