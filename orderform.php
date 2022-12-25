<!--  -->
<?php
require('config.php');
require('db.php');

// check for submit
if(filter_has_var(INPUT_POST, 'submit')){
  // get form data
  $name = mysqli_real_escape_string($conn, $_POST['name'])  ;
  $email = mysqli_real_escape_string($conn, $_POST['email'])  ;
  $phone = mysqli_real_escape_string($conn, $_POST['phone'])  ;
  $start = mysqli_real_escape_string($conn, $_POST['start'])  ;
  $end = mysqli_real_escape_string($conn, $_POST['end'])  ;
  $budget = mysqli_real_escape_string($conn, $_POST['budget'])  ;
  $message = mysqli_real_escape_string($conn, $_POST['message'])  ;

  // Check Req Fields
  if(!empty($email) && !empty($name)  && !empty($phone) && !empty($start) && !empty($end) && !empty($budget) && !empty($message)){
    // passed
    // check email 
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      // failed
      $msg = 'Please use valid email!';
    }else{
      // passed
      $query = "INSERT INTO orders (client_name, client_email, client_phone, start_date, end_date, budget, message) VALUES('$name', '$email', '$phone', '$start', '$end', '$budget', '$message')" ;

      if(mysqli_query($conn, $query)){
        header('Location: '.RECEIVED_URL. '');
      } else{
        echo 'ERROR: '. mysqli_error($conn);
      }
    }     
  }
}else{
  // failed
  $msg = 'Please fill in all fields!';

  $msg = "<p class='red'>$msg</p>";

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form I Codepark</title>
    <!-- favicon -->
    <link rel="icon" href="favicon.jpg">
    <!-- fontawesome-icon-links -->
    <script src="https://kit.fontawesome.com/f2b674ca10.js" crossorigin="anonymous"></script>
    <!-- google-fonts-link -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@300&family=Roboto&display=swap" rel="stylesheet">  
    <!-- main-stylesheet-css -->
    <link rel="stylesheet" href="style.css">
    <!-- home-page-stylesheet-css -->
    <link rel="stylesheet" href="home.css">
    <!-- order-form-stylesheet -->
    <link rel="stylesheet" href="orderform.css">
    <!-- php style -->
    <link rel='stylesheet' type='text/css' href='style.php' />
    <!-- moble-tablets-stylesheet -->
    <link rel="stylesheet" media="screen and (max-width:768px)" href="mobile.css">
    <link rel="stylesheet" href="cont-style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="cont-mobile.css">
    <link rel="stylesheet" media="screen and (min-width: 1100px)" href="cont-widescreen.css">
</head>
<body>
    <!-- order-navbar -->
    <div id="order-nav">
        <div class="order-nav-container">
            <div class="order-logo flex-row-center">
                <a href="index.html"><img src="code-park-full-web1.png" alt="codepark logo" class="logo" /></a> <span style="padding-left: 1rem;"><h2>Order Form</h2></span>
            </div>
            <div class="order-menu">
                <ul class="flex-row-center">
                    <li title="home"><a href="index.html"><i class="fas fa-home"></i></a></li>
                    <li title="contact-us"><a href="contact.html"><i class="fas fa-mobile-alt"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- order-form -->
    <div id="order-box">
        <div class="order-box-container">
            <div class="order-box-image">
                <img src="reg.png" alt="">
            </div>
            <div class="order-box-form">
                <!-- order-heading -->
                <div class="order-heading">
                    <h1>Order Submission</h1>
                    <h3>Package Form</h3>
                </div>
                
                <!-- order-description -->
                <div class="order-description">
                    <p>KINDLY FILL IN THE SHORT FORM BELOW AND ONE OF OUR TEAM MEMBERS WILL BE IN TOUCH WITH YOU.</p>
                </div>
                <!-- order-form -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="order-form" method='post'>
                    <div class="order-form-columns">
                        <div class="order-form-col">
                            <div class="form-content">
                                <label for="name">Name:</label>
                                <input id="name" type="text" name="name" placeholder="John Doe" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" required>
                            </div>             
                            <div class="form-content">
                                <label for="email">Email:</label>
                                <input id="email" type="text" name="email" placeholder="john@doe.com" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" required>
                            </div>  
                            <div class="form-content">
                                <label for="phone">Phone:</label>
                                <input id="phone" type="number" name="phone" placeholder="(+254)795 717 545" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>" required>
                            </div>            
        
                        </div>
                        <div class="order-form-col">
                            <div class="form-content">
                                <label for="start">Preferred Start Date:</label>
                                <input id="start" type="date" name="start" placeholder="dd/mm/yyyy" value="<?php echo isset($_POST['start']) ? $start : ''; ?>" required>
                            </div>            
                            <div class="form-content">
                                <label for="end">Preferred End Date:</label>
                                <input id="end" type="date" name="end" placeholder="dd/mm/yyyy" value="<?php echo isset($_POST['end']) ? $end : ''; ?>" required>
                            </div>            
                            <div class="form-content">
                                <label for="budget">Your Budget Range:</label>
                                <input id="budget" type="text" name="budget" placeholder="Ksh. xx to Ksh. yyy" value="<?php echo isset($_POST['budget']) ? $budget : ''; ?>" required>
                            </div>            
        
                        </div>
                    </div>
                    <div class="form-content">
                        <label for="message">How can we help?</label>
                        <textarea name="message" id="" cols="10" rows="5" placeholder="Type your message..." required><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                    </div>  
                    <div class="form-content">
                        <input type="submit" name="submit" id="submit" value="SUBMIT">
                    </div>          
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div id="footer">
    <div class="footer-content">
        <div class="foot-one">
        <p>A creative agency in Nairobi</p>
        <div class="foot-contact">
            <a href="info@codepark.co.ke">info@codepark.co.ke</a>
            <a href="tel:0795717545">(+254) 795 717545</a>
        </div>
        <p>Nairobi, Kenya</p>
        <p class="copyright">Copyright <script>document.write(new Date().getFullYear());</script> Code Park</p>
        <p style="color: grey;">All rights reserved.</p>
        </div>
        <div class="foot-two">
        <a href="index.html"><img src="code-park-full-web1-grey.png" alt="codepark logo" /></a>
        </div>

    </div>
    </div>
    <script src="package.js"></script> 
</body>
</html>