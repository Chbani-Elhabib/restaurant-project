<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verification</title>
    <!-- start font awesome -->
    <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
              crossorigin="anonymous" 
              referrerpolicy="no-referrer" />
    <!-- end font awesome -->
    <!-- start css  -->
    <link rel="stylesheet" href="{{ url('normalize/normalize.css') }}">
    <link href="{{ url('css/Bootstrap.min.css') }}" rel="stylesheet">
    @vite(['resources/css/Verification.css'])
    <!-- end css  -->
</head>
<body>
    <div class="verification">
        <div class='verifi'>
            <div class="image">
                <i class="fa-solid fa-envelope-open-text"></i>
                <img src="image/background_email.png" alt="background-email">
            </div>
            <div class='Verify'>
                <h1>Verify your email address</h1>
            </div>
            <div class="message">
                <p>We sent verification code to
                    <span>email@gmail.com</span>
                </p>
                <p> Please check your inbox and enter the code below</p>
            </div>
            <form action="">
                <div class="input">
                    <input type="text">
                    <input type="text">
                    <input type="text">
                    <input type="text">
                </div>
                <div>
                    <button type="button" class="btn btn-success" >&#10003; Verify account</button>
                </div>
            </form>

        </div>
    </div>
    <!-- start js  -->
    <script src="js/jquery/jquery.js"></script>
    @vite(['resources/js/Verification.js'])
    <!-- end js  -->
</body>
</html>