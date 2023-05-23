
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="text-align:center;">
    <h1 style="color:green;">CODESTAR TECHNOLOGIES</h1>
    <H4>How to send a One Time Password (OTP)</H4>

    <form action="" method="post">
        <div id="enternum" style="display:block; margin-left:auto; margin-right: auto;">
            <input type="number" id="phonenum" placeholder="254717794150"><br>
            <input type="hidden" id="otp"><br>
        </div>
        <div id="inputotp" style="display:none; margin-left:auto; margin-right: auto;">
            <input type="number" id="user_input" placeholder="0000"><br>
        </div>
        <input type="button" id="OTPbtn" onchange="verifyotp()" value="Send OTP">
        <!-- <input type="hidden" id="VERbtn" onclick="verifyotp()" value="Verify OTP" > -->
    </form>
</body>
</html>

<script>
    let btn = document.getElementById("OTPbtn");

    btn.addEventListener("click", () => {
        let phonenum = document.getElementById("phonenum").value;
        let otp = parseInt(Math.random(1000) * 9999);
        document.getElementById("otp").value = otp;
        $.post('otp.php',{
            phonenum: phonenum,
            otp: otp
        }, (response) => {
            alert(response);
            document.getElementById("enternum").style.display = "none";
            document.getElementById("user_input").value = "";
            document.getElementById("inputotp").style.display = "block";
            // document.getElementById("OTPbtn").type = "hidden";
            // document.getElementById("VERbtn").type = "button";
        });
    });


    function verifyotp(){
        let correct_otp = document.getElementById("otp").value;
        let user_otp = document.getElementById("user_input").value;       


        if(correct_otp != user_otp){
            alert("Wrong OTP Value");
            document.getElementById("user_input").value = "";
        }
    }
</script>