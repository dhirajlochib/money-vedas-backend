<?php
require("build_con.php");
require("fun.php");

require("../inmo/src/Instamojo.php");
require("cred.php");

$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://www.instamojo.com/api/1.1/');


$amount = '180';
$email = $_POST["email"];
$agent_id = $_POST["agent_id"];
$purpose = $_POST["purpose"];
$agent_mob = $_POST["agent_mob"];


$_SESSION["email"] = $email;
$_SESSION["agent_id"] = $agent_id;
$_SESSION["agent_mob"] = $agent_mob;

//enter the payment details in the database
$sql = "INSERT INTO `payment_history`(`agent_id`, `tx_id`, `payment_amount`, `payment_date_time`, `payment_status`) VALUES ('$agent_id', '', '$amount', NOW(), 'Pending')";
$result = mysqli_query($conn, $sql);



try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "buyer_name" => $agent_id,
        "amount" => $amount,
        "phone" => $agent_mob,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        "redirect_url" => "http://moneyvedas.tech/res/successpay.php"
    ));
    // $pay_ulr = $response['longurl'];



    // header("Location: $pay_ulr");
    echo ("<pre>");
    print_r($response);
} catch (Exception $e) {



    if ($e->getMessage()) {
        ?>
        <html>
        <style>
        body{
          width:100vw;
          
          background-image:url("https://images.unsplash.com/photo-1616712134411-6b6ae89bc3ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1964&q=80");
          height:100vh;
          background-color:black;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          overflow:hidden;
          position:absolute;
          margin:auto;
          top:0;
          bottom:0;
          left:0;
          right:0;
          font-family:'Candal', sans-serif;
        }
        
        .wrapper{
          posision:absolute;
          
          margin:auto;
          top:0;
          bottom:0;
          left:0;
          right:0;
          
        }
        .wrapper img{
          position:absolute;
          margin:auto;
          left:0;
          right:0;
          height:100%;
          margin-top:20vh;
        }
        .wrapper h5{
         
          color:white;
          font-size:20px;
          position:absolute;
          margin:auto;
          top:5vh;
          bottom:0;
          left:0;
          right:0;
          text-align:center;
          font-weight:bold;
          font-stretch: expanded;
          font-kerning: auto;
          text-transform: uppercase;
          text-shadow: 2px 2px gray;
          overflow: hidden;
          white-space: nowrap;
          width: 30ch;
           animation: type 10s steps(30) ;
        }
        .wrapper h3{
          color : white;
          font-size:30px;
          position:absolute;
          margin:auto;
          top:17.5vh;
          bottom:0;
          left:0;
          right:0;
          text-align:center;
          font-weight:bold;
          font-stretch: expanded;
          font-kerning: auto;
          text-transform: uppercase;
          
        }
        .wrapper h1{
          color : white;
          font-size:30vw;
          etter-spacing: 0.3em;
          position:absolute;
          margin:auto;
          top:25vh;
          bottom:0;
          left:0;
          right:0;
          text-align:center;
          font-weight:900;
           
         
        
          font-stretch: expanded;
          font-kerning: auto;
          text-transform: uppercase;
          
        }
        .wrapper a{
          color : white;
          font-size:15px;
          position:absolute;
          margin:auto;
          top:30vh;
          bottom:0;
          left:0;
          right:0;
          text-align:center;
          font-weight:bold;
          text-transform: uppercase;
          text-decoration:none;
          
        }
        
        
        
         
        </style>
      
        ]
        <head>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
          <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">
        </head>
          <body>
            <div class="wrapper">
              <img src="https://wallpaperaccess.com/full/3275697.jpg" alt=""  onmousedown="return false;">
            <h5>Why Bro,<br/>Why did you do that.... </h5>
              <h3>Mobile Number Or Email Id is not valid, Please Enter Valid Email Id or Mobile Number</h3>
              <h1> 4 4</h1>
              <a href="../activate_account.php"><i class="bi bi-arrow-left-circle" style="padding-right:10px;"></i >Let's Go Back </a>
            </div>
             
          </body>
       
      </html>
        <?php
    } else {
        echo ("<pre>");
        print_r($e->getMessage());
    }
}
