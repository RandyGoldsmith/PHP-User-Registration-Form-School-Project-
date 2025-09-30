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
</style>
</head>

<body>
    
<div class="form-wrapper">
    <h2 class="form-header">User Registration</h2>
    <form action="" method="POST" class="form-container">
        <div class="form-field">
            <label class="form-label" for="username">Username</label>
            <input type="text" class="form-input" id="username" name="username"/>
        </div>
        <div class="form-field">
            <label class="form-label" for="email">Email Address</label>
            <input type="text" class="form-input" id="email" name="email"/>
        </div>
        <div class="form-field">
            <label class="form-label" for="password">Password</label>
            <input type="password" class="form-input" id="password" name="password"/>
        </div>
        <div class="form-field">
            <label class="form-label" for="confirm_password">Confirm Password</label>
            <input type="password" class="form-input" id="confirm_password" name="confirm_password"/>
        </div>
        <button type="submit" class="form-button">Submit</button>
    </form>
</div>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm_password"]);

    echo "<div class='output'>";
    echo "<h3>Form Data</h3>";
    echo "$username <br>";
    echo "$email <br>";
    echo "$password <br>";
    echo "$confirm_password <br>";
    echo "</div>";
    }

    ?>
</body>
</html>

