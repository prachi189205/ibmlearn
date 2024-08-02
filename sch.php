<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

// Fetch scholarship data
$scholarships = [];
try {
    $stmt = $conn->prepare("SELECT name, addr, email, phone FROM addsch");
    $stmt->execute();
    $scholarships = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Scholarship</title>
   <style>
      /* Container for the scholarship cards */
      .scholarship-container {
         display: flex;
         flex-wrap: wrap;
         justify-content: 20px;
         margin: 20px 0;
      }

      /* Individual scholarship card */
      .scholarship-card {
         background-color: #f1f5f8;
         border: 1px solid #ccc;
         border-radius: 8px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         margin: 15px;
         padding: 20px;
         width: 300px;
         transition: transform 0.3s;
      }

      .scholarship-card:hover {
         transform: translateY(-10px);
         box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      }

      /* Card content */
      .scholarship-card h3 {
         font-size: 1.5em;
         color: orange; /* Color for the label */
         margin-bottom: 10px;
         font-size:20px;
      }

      .scholarship-card p {
         font-size: 1em;
         color: #555;
         line-height: 1.6;
         margin-bottom: 8px;
      }

      .scholarship-card p strong {
         color: orange; /* Color for the label */
         font-size: 20px;
      }

      .scholarship-card .value {
         color: purple; /* Color for the values */
         font-size:15px;
      }

      .scholarship-card .contact {
         font-size: 0.9em;
         color: #888;
         margin-top: 15px;
         border-top: 1px solid #eee;
         padding-top: 10px;
      }

      .scholarship-card .contact span {
         display: block;
         margin-bottom: 5px;
         font-weight: bold;
      }
   </style>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">
   <div class="row">
      <div class="image">
         <img src="images/scholarship.jpg" alt="">
      </div>
      <div class="content">
         <h3>Scholarship Opportunities</h3>
         <p>We don't just provide free courses but also free scholarships with the help of various NGOs, which will help students with their studies. We provide all the contacts of those NGOs who are providing scholarships. You can check here... LEARN FOR FREE</p>
      </div>
   </div>
</section>

<!-- about section ends -->

<!-- scholarships section starts -->

<section class="reviews">
   <h1 class="heading">Available Scholarships Through Various NGOs</h1>

   <div class="scholarship-container">
      <?php foreach($scholarships as $scholarship): ?>
      <div class="scholarship-card">
         <h3>NGO Name: &nbsp;&nbsp;<span class="value"><?php echo htmlspecialchars($scholarship['name']); ?></span></h3>
         <p><strong>Address:&nbsp;&nbsp;</strong> <span class="value"><?php echo htmlspecialchars($scholarship['addr']); ?></span></p>
         <p><strong>Email:&nbsp;&nbsp;</strong> <span class="value"><?php echo htmlspecialchars($scholarship['email']); ?></span></p>
         <p><strong>Phone:&nbsp;&nbsp;</strong> <span class="value"><?php echo htmlspecialchars($scholarship['phone']); ?></span></p>
      </div>
      <?php endforeach; ?>
   </div>
</section>

<!-- scholarships section ends -->

<!-- reviews section starts -->

<section class="reviews">
   <h1 class="heading">students who got schloarship through our website</h1>

   <div class="box-container">
      <div class="box">
         <p>I'm glad that I found this website.</p>
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>Trisha</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Learn For Free really helped me to get a scholarship.</p>
         <div class="user">
            <img src="images/pic-3.jpg" alt="">
            <div>
               <h3>Jay Mendes</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>I am studying in my dream university due to the scholarship provided by Learn For Free.</p>
         <div class="user">
            <img src="images/pic-4.jpg" alt="">
            <div>
               <h3>Sankalp</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>I want to say thank you to this website. I was able to continue my studies.</p>
         <div class="user">
            <img src="images/pic-5.jpg" alt="">
            <div>
               <h3>Mahima Jain</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Scholarship opportunities through NGOs who really want to help.</p>
         <div class="user">
            <img src="images/pic-6.jpg" alt="">
            <div>
               <h3>Rohit Sharma</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>Free courses and scholarships are the best part of this website.</p>
         <div class="user">
            <img src="images/pic-7.jpg" alt="">
            <div>
               <h3>Monika</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

   </div>
</section>

<!-- reviews section ends -->

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
