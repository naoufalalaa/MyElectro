<!DOCTYPE html>
<html lang="en" style="scroll-behavior:smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.4.2/css/uikit.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>MyElectro • <?=$page?></title>
</head>
<body>
 <style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);
    

    .wrap {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    }

    .text {
    color: #A12A15;
    display: inline-block;
    margin-left: 5px;
    }

    .bounceball {
    position: relative;
    display: inline-block;
    height: 37px;
    width: 15px;
    }
    .bounceball:before {
    position: absolute;
    content: '';
    display: block;
    top: 0;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: #A12A15;
    -webkit-transform-origin: 50%;
            transform-origin: 50%;
    -webkit-animation: bounce 500ms alternate infinite ease;
            animation: bounce 500ms alternate infinite ease;
    }

    @-webkit-keyframes bounce {
    0% {
        top: 30px;
        height: 5px;
        border-radius: 60px 60px 20px 20px;
        -webkit-transform: scaleX(2);
                transform: scaleX(2);
    }
    35% {
        height: 15px;
        border-radius: 50%;
        -webkit-transform: scaleX(1);
                transform: scaleX(1);
    }
    100% {
        top: 0;
    }
    }

    @keyframes bounce {
    0% {
        top: 30px;
        height: 5px;
        border-radius: 60px 60px 20px 20px;
        -webkit-transform: scaleX(2);
                transform: scaleX(2);
    }
    35% {
        height: 15px;
        border-radius: 50%;
        -webkit-transform: scaleX(1);
                transform: scaleX(1);
    }
    100% {
        top: 0;
    }
    }

 </style>
 <div id="loader" class="wrap">
  <div class="loading">
    <div class="bounceball"></div>
    <div class="text">NOW LOADING</div>
  </div>
</div>
<script> 
        document.onreadystatechange = function() { 
            if (document.readyState !== "complete") { 
                document.querySelector( 
                  "body").style.visibility = "hidden"; 
                document.querySelector( 
                  "#loader").style.visibility = "visible"; 
            } else { 
                document.querySelector( 
                  "#loader").style.display = "none"; 
                document.querySelector( 
                  "body").style.visibility = "visible"; 
            } 
        }; 
</script> 