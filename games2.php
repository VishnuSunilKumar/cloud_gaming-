<?php 
include("php/config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Changed from if(isset($_POST['submit']))
    // Retrieve form input values
    $ga_user = mysqli_real_escape_string($con, $_POST['username']);
    $game1 = mysqli_real_escape_string($con, $_POST['Game1']);
    $game2 = mysqli_real_escape_string($con, $_POST['Game2']);
    $game3 = mysqli_real_escape_string($con, $_POST['Game3']);
    $hours = mysqli_real_escape_string($con, $_POST['Hours']);
    $platform = mysqli_real_escape_string($con, $_POST['platform']);

    // Check if the username already exists in the database
    $verify_query = mysqli_query($con, "SELECT ga_user FROM games WHERE ga_user='$ga_user'");

    if(mysqli_num_rows($verify_query) != 0) {
        echo "<div class='message'>
            <p>This username has already submitted games </p>
            </div><br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
    } else {
        $insert_query = "INSERT INTO games (ga_user, game1, game2, game3,hours,platform) 
                        VALUES ('$ga_user', '$game1', '$game2', '$game3','$hours','$platform')";

        if(mysqli_query($con, $insert_query)) {
            header("Location: premiumpayment.html");
            exit();
        } else {
            echo "<div class='message'>
                <p>Error: Could not save game details . Please try again.</p>
                </div><br>";
        }
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Gaming Games details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('31.jpg') center/cover no-repeat;
        }

        .container {
    display: flex;
    padding: 1rem 3rem;
    justify-content: flex-end; /* Change this line to align the container to the right */
    align-items: center;
    min-height: 100vh;
}

        .form-container {
            background: rgb(255, 255, 255);
            padding: 2.5rem;
            margin-right: 2rem;
            border-radius: 8px;
            width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 5rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .logo-text {
            color: #333;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo-icon {
            width: 24px;
            height: 24px;
            background-color: #4CAF50;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        }

        h1 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }

        button {
            background-color: #2196F3;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #1976D2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="logo">
                <img src="logo.png" width="220" height="30" alt="Cloud Gaming">
            </div>
            
            <h1>GAME DETAILS</h1>
            <!-- Replace the nested forms with a single form -->
<form action="games.php" method="POST">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
    </div>

    <div class="form-group">
        <label for="Game1">Game1</label>
        <input type="text" id="Game1" name="Game1" required>
    </div>

    <div class="form-group">
        <label for="Game2">Game2</label>
        <input type="text" id="Game2" name="Game2" required>
    </div>

    <div class="form-group">
        <label for="Game3">Game3</label>
        <input type="text" id="Game3" name="Game3" required>
    </div>

    
    <div class="form-group">
        <label for="Hours">Hours</label>
        <input type="Hours" id="Hours" name="Hours" required>
    </div>
    
    <label for="platform">platform:</label>
    <select id="platform" name="platform" required>
      <option value="">Select platform</option>
      <option value="steam">Steam</option>
      <option value="epic">Epic Games</option>
    </select>
    <p>         


    </p>
    <p>         

        
    </p>

    <button type="submit">Ready</button>
</form>
        </div>
    </div>
</body>
</html>