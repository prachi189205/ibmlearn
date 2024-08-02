<?php

include '../components/connect.php';

$message = ''; // Initialize $message as a string

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO addsch (name, addr, email, phone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);  // Use PDO prepare

    if ($stmt) {
        // Bind parameters
        $stmt->bindParam(1, $_POST['name']);
        $stmt->bindParam(2, $_POST['add']);
        $stmt->bindParam(3, $_POST['email']);
        $stmt->bindParam(4, $_POST['num']);

        // Try to execute the query
        if ($stmt->execute()) {
            $message = 'Scholarship successfully added!';
            echo "<script type='text/javascript'>showPopup('$message');</script>";
        } else {
            $message = "Something went wrong... cannot redirect!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Scholarship</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

   <style>
   /* Custom popup styling */
   .popup {
       position: fixed;
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
       background-color: white;
       border: 1px solid #ccc;
       padding: 20px;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       z-index: 1000;
       display: none;
   }

   .popup .close {
       cursor: pointer;
       float: right;
       font-size: 20px;
       font-weight: bold;
   }
   </style>

</head>
<body style="padding-left: 0;">

<div id="popup" class="popup">
    <span class="close" onclick="closePopup()">&times;</span>
    <span id="popupMessage"></span>
</div>

<?php
if ($message !== '') {  // Check if $message is not empty
    echo '
    <div class="message form">
       <span>' . $message . '</span>
       <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
    ';
}
?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>Add scholarship</h3>
      <p>NGO's name <span>*</span></p>
      <input type="text" name="name" placeholder="enter NGO's name" maxlength="50" required class="box">
      <p>NGO's address <span>*</span></p>
      <input type="text" name="add" placeholder="enter NGO's address" maxlength="200" required class="box">
      <p>NGO's email <span>*</span></p>
      <input type="email" name="email" placeholder="enter NGO's email" maxlength="20" required class="box">
      <p>NGO's phone no<span>*</span></p>
      <input type="text" name="num" placeholder="enter NGO's phone number" maxlength="10" required class="box">
      <input type="submit" name="submit" value="Add now" class="btn">
   </form>

</section>

<!-- register section ends -->

<script>
let darkMode = localStorage.getItem('dark-mode');
let body = document.body;

const enableDarkMode = () => {
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () => {
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if (darkMode === 'enabled') {
   enableDarkMode();
} else {
   disableDarkMode();
}

function showPopup(message) {
    var popup = document.getElementById('popup');
    var popupMessage = document.getElementById('popupMessage');
    popupMessage.textContent = message;
    popup.style.display = 'block';
    setTimeout(function() {
        window.location.href = 'dashboard.php';
    }, 2000); // Redirect after 2 seconds
}

function closePopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
    window.location.href = 'dashboard.php'; // Redirect when popup is closed
}
</script>
   
</body>
</html>
