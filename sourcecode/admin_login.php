<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="style.css"> <!-- Link to your external CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('/library_Project/images/library.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }
        
        .container {
            max-width: 500px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }
        
        .login-heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #007BFF; /* Change the color to your preference */
            text-transform: uppercase;
        }
        
        .login-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .btn-submit {
            font-weight: 600;
            color: #fff;
            background-color: #007BFF;
            border: none;
        }
        
        .btn-submit:hover {
            background-color: #0056b3;
        }
        
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    $msg = "";
    $ademailmsg = "";
    $adpasdmsg = "";
    $emailmsg = "";
    $pasdmsg = "";

    if (!empty($_REQUEST['ademailmsg'])) {
        $ademailmsg = $_REQUEST['ademailmsg'];
    }

    if (!empty($_REQUEST['adpasdmsg'])) {
        $adpasdmsg = $_REQUEST['adpasdmsg'];
    }

    if (!empty($_REQUEST['emailmsg'])) {
        $emailmsg = $_REQUEST['emailmsg'];
    }

    if (!empty($_REQUEST['pasdmsg'])) {
        $pasdmsg = $_REQUEST['pasdmsg'];
    }

    if (!empty($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
    }
    ?>

    <div class="container">
        <div class="row">
            <h4><?php echo $msg ?></h4>
        </div>
        <div class="row justify-content-center"> <!-- Center the login form -->
            <div class="col-md-6 login-form">
                <h3 class="login-heading">Admin Login</h3>
                <form action="loginadmin_server_page.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                        <label class="error-message"><?php echo $ademailmsg ?></label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                        <label class="error-message"><?php echo $adpasdmsg ?></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-submit" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
