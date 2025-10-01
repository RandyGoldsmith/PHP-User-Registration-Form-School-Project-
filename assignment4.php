<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 4</title>
    <style>
        /* FIX: Universal Box-Sizing Reset for precise alignment */
        *, *::before, *::after {
            box-sizing: border-box;
        }
        /* BASE STYLES & LAYOUT */
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column; /* Allows form data to stack below the form */
            align-items: center; 
            justify-content: center; 
            padding: 1rem;
            margin: 0;
        }
        /* FORM WRAPPER STYLES */
        .form-wrapper {
            width: 100%;
            max-width: 24rem;
            background-color: white;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        /* HEADER STYLES */
        .form-header {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #4f46e5;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        /* FORM FIELD CONTAINER (<div> around label/input) */
        .form-field {
            display: flex;
            flex-direction: column;
        }
        
        /* LABEL STYLES */
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }

        /* INPUT STYLES */
        .form-input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            outline: none;
        }

        /* BUTTON STYLES */
        .form-button {
            max-width: 100%;
            margin: 0.5rem auto 0;
            padding: 0.75rem 1rem;
            background-color: #4f46e5;
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: background-color 0.2s;
        }
        .form-button:hover {
            background-color: #4338ca;
        }
        /* PHP Output Styles */
        .output {
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 24rem;
            width: 100%;
        }
        .output h3 {
            color: #10b981;
            margin-top: 0;
        }

        .error {
            color: red;
        }
</style>
</head>

<body>
    
<?php

    $userErr = $emailErr = $passwordErr = $confirm_passwordErr = "";
    $username = $email = $password = $confirm_password = "";
    $output_message = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input(string $data) {
        $data = htmlspecialchars($data);
        $data = trim($data);
        return $data;
    }

    function validatePassword(string $password): ?string {
        if(strlen($password) < 8) {
            return "Password must be at least 8 characters long.";
        }

        if(!preg_match("/[0-9]/", $password)) {
            return "Password must contain at least one number.";
        }

        if(!preg_match("/[^a-zA-Z0-9\s]/", $password)) {
            return "Password must contain at least one special character (e.g., @, #, $).";
        }
        return null;
    }
    
    $username = test_input( $_POST["username"]);
    $email = test_input( $_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);

    if(empty($username)) {
        $userErr = "Please enter a username";
        
    } elseif(!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        $userErr = "Only letters and white spaces allowed";
    }

    if(empty($email)) {
        $emailErr = "Please enter an email address";
      
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Pleae enter a valid email address in form 'example@gmail.com'";
       
    }

    if(empty($password)) {
            $passwordErr = "Please enter a password";
     } else {
            $passwordErr = validatePassword($password);
        }
    

    if(empty($confirm_password)) {
        $confirm_passwordErr = "Please confirm your password";
    } elseif($password !== $confirm_password) {
        $passwordErr = "Passwords do not match";
        $confirm_password = "Passwords do not match";
    }

    $form_is_valid = empty($userErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_password);

    if($form_is_valid) {
        $output_message = "<div class='output'>
    <h3>Registration Successful!</h3>
    <p>$username</p>
    <p>$email</p>
    <p>$password</p>
    <p>$confirm_password</p>
    </div>";

    $username = $email = $password = $confirm_password = "";
    
    }

}
    ?>

<div class="form-wrapper">
    <h2 class="form-header">User Registration</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?></form>)" method="POST" class="form-container">
        <div class="form-field">
            <label class="form-label" for="username">Username</label>
            <input type="text" class="form-input" id="username" name="username"/>
            <?php if(!empty($userErr)): ?>
            <span class="error"><?php echo $userErr; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-field">
            <label class="form-label" for="email">Email Address</label>
            <input type="text" class="form-input" id="email" name="email"/>
            <?php if(!empty($emailErr)): ?>
            <span class="error"><?php echo $emailErr; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-field">
            <label class="form-label" for="password">Password</label>
            <input type="password" class="form-input" id="password" name="password"/>
            <?php if(!empty($passwordErr)): ?>
            <span class="error"><?php echo $passwordErr; ?></span>
            <?php endif; ?>
        </div>
        <div class="form-field">
            <label class="form-label" for="confirm_password">Confirm Password</label>
            <input type="password" class="form-input" id="confirm_password" name="confirm_password"/>
            <?php if(!empty($confirm_passwordErr)): ?>
            <span class="error"><?php echo $confirm_passwordErr; ?></span>
            <?php endif; ?>
        </div>
        <button type="submit" class="form-button">Submit</button>
    </form>
</div>

    
<?php echo $output_message; ?>
    

    
</body>
</html>

