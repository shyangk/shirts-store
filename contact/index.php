<?php 
require_once("../inc/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);


    if ($name == "" OR $email == "" OR $message == "") {
        $error_message = "You must specify a value for name, email address, and message.";
    }

    if (!isset($error_message)){
        foreach( $_POST as $value ){
        if( stripos($value,'Content-Type:') !== FALSE ){
            $error_message = "There was a problem with the information you entered.";    
            }
        }
    }
    
    // the field named address is used as a spam honeypot
    // it is hidden from users, and it must be left blank
    if (!isset($error_message) && $_POST["address"] != "") {
        $error_message = "Your form submission has an error.";
    }

    require_once(ROOT_PATH . "inc/phpmailer/class.phpmailer.php");
    $mail = new PHPMailer();

    /* Gmail Settings For Testing Only
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0; 
    
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;

    $mail->Username = "";
    $mail->Password = "";
    */
    

    if (!isset($error_message) && !$mail->ValidateAddress($email)){
        $error_message = "You must specify a valid email address.";
    }

    if (!isset($error_message)){
        $email_body = "";
        $email_body = $email_body . "Name: " . $name . "<br>";
        $email_body = $email_body . "Email: " . $email . "<br>";
        $email_body = $email_body . "Message: " . $message;

        $mail->SetFrom($email, $name);
        $address = "shyangk4@hotmail.com";
        $mail->AddAddress($address, "Shirts 4 Mike");
        $mail->Subject    = "Shirts 4 Mike Contact Form Submission | " . $name;
        $mail->MsgHTML($email_body);


        if($mail->Send()) {
            header("Location: " . BASE_URL . "contact/?status=thanks");
            exit;
        } else {
            $error_message = "There was a problem sending the email: " . $mail->ErrorInfo;
        }
    }
}
?><?php 
$pageTitle = "Contact Mike";
$section = "contact";
include(ROOT_PATH . 'inc/header.php'); ?>

    <div class="container">
        <div class="row">
            <h1 class="page-title">Contact</h1>
            <div class="col-md-8">

            <?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
                <p>Thanks for the email! I&rsquo;ll be in touch shortly!</p>
            <?php } else { ?>
                <?php if (isset($error_message)){
                    echo '<p class="message">' . $error_message . '</p>';
                } else {
                    echo '<p>I&rsquo;d love to hear from you! Complete the form to send me an email.</p>';
                } 

                ?>
                <form method="post" action="<?php echo BASE_URL; ?>contact/">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="<?php if (isset($name)) echo htmlspecialchars($name); ?>">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php if (isset($email)) echo htmlspecialchars($email); ?>">
                    </div>
                    <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message"><?php if(isset($message)) echo htmlspecialchars($message); ?></textarea>
                    </div>
                    <?php // the field named address is used as a spam honeypot ?>
                    <?php // it is hidden from users, and it must be left blank ?>
                    <input style="display: none" type="text" name="address" id="address">               
                    <input class="btn btn-default" type="submit" value="Send">

                </form>

            <?php } ?>
            </div>
        </div>

    </div>

<?php include(ROOT_PATH . 'inc/footer.php') ?>