<?php
session_start();
include("db.php");

if (!isset($_SESSION['email'])) {
    header("Location: index2.php");
    exit();
}

$email = $_SESSION['email'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
$user = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Homepage</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<style>
:root {
  --primary-color: #D7CBBE;
  --bg-dark: #00000010;
  --accent-color: #645A4E;
  --glass-bg: rgba(0, 0, 0, 0.12);
}

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family: 'Inter', sans-serif;
}

html{
  scroll-behavior:smooth;
}

body{
  
  color:white;
  margin: 0;
  background-image: url("images/background.jpg");
}

h1, h2, h3 {
  font-family: Bebas Neue !important;
  word-spacing: 0.5px;
  letter-spacing :1px;
  font-weight: 3;
  color: #c79a5b !important;
}

/* ================= NAVBAR ================= */
.navbar{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:20px 60px;
  background: rgba(0, 0, 0, 0.08);
  backdrop-filter: blur(15px);
  border-bottom: 1px solid rgba(215, 203, 190, 0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.logo img{
  height:80px;
}

.menu-toggle{
  font-size:28px;
  cursor:pointer;
  display:none;
  color: var(--primary-color);
}

.nav-links{
  display:flex;
  gap:30px;
}

.nav-links a{
  color: var(--primary-color);
  text-decoration:none;
  font-weight: 500;
  padding:8px 15px;
  transition:all 0.4s ease;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 14px;
}

.nav-links a:hover{
  color: #c79a5b ;
}

.logout{
  color: var(--primary-color);
  border: 1px solid var(--primary-color);
  padding: 8px 20px !important;
  border-radius: 10px;
}

.logout:hover{
  background:  #00000048;
  color:#c79a5b;
}

/* ================= HERO ================= */

.hero{
  min-height:95vh;
  position: relative;          /* مهم جداً */
  background-image: url("images/intro4.jpg");
  background-repeat: no-repeat;   
  background-size: cover;         
  background-position: center;  
}

.hero-content{
  position: absolute;
  inset: 0;                    
  
  display: flex;
  align-items: center;
  justify-content: center;

  text-align: center;
  background: rgba(10, 9, 9, 0.7);
}
.hero_intro{

  width: 100%;         
  height: 70%;        
  padding: 40px;  
  text-align:center;
 
}






.hero-content h1{
  font-size:64px;
  color: var(--primary-color);
  margin-bottom:25px;
  line-height: 1.2;
}

.hero-content p{
  font-size:20px;
  margin-bottom:40px;
  color: rgba(255, 255, 255, 0.77);
  font-weight: 300;
  font-family:Montserrat;
}

.hero-buttons{
  display:flex;
  gap:20px;
  justify-content: center;
  flex-wrap:wrap;
}

.btn{
  padding:16px 40px;
  border-radius:50px;
  text-decoration:none;
  font-weight: 600;
  transition:all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 13px;
}

.primary{
  background-color: #c79a5b;
  color: black;
}

.primary:hover{
  background-color: #71562fff ;
  transform: translateY(-3px);
  color:black;
}

.secondary{
  border:1px solid var(--primary-color);
  color: var(--primary-color);
  background:transparent;
}

.secondary:hover{
  background: rgba(0, 0, 0, 0.2);
  transform: translateY(-3px);
}

/* ================= SECTIONS ================= */
.section{
  padding:100px 30px;
  text-align:center;
}

.section h2{
  font-size:48px;
  margin-bottom:30px;
  color: var(--primary-color);
}

/* ===== ABOUT ===== */
.about{
  background: rgba(0, 0, 0, 0.19);
}

.about-content{
  display:flex;
  align-items:center;
  gap:60px;
  max-width:1200px;
  margin:0 auto;
  flex-wrap:wrap;
}

.about-image{
  flex:1;
  min-width:400px;
}

.about-image img{
  width:100%;
  border-radius:10px;
  border:1px solid rgba(0, 0, 0, 0.2);
}

.about-info{
  flex:1;
  min-width:400px;
  text-align: left;
}

.about-text{
  font-size:20px;
  line-height:1.8;
  color: rgba(255, 255, 255, 0.77);
  margin-bottom: 40px;
  font-family:Montserrat;
}

.about-features{
  display:flex;
  gap:15px;
  flex-wrap:wrap;
  }

.about-features div{
  border:1px solid rgba(255, 255, 255, 0.77);
  padding:12px 25px;
  border-radius:10px;
  font-size: 14px;
  font-family:Montserrat;
  color: rgba(255, 255, 255, 0.77);
  background: rgba(0, 0, 0, 0.05);
  transition:all 0.3s ease;

}

.about-features div:hover{
  background: rgba(255, 255, 255, 0.77);
  color: black;
}

/* ===== SERVICES ===== */
.services-grid{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:30px;
  margin-top:50px;
}

.service-card{
  background: rgba(0, 0, 0, 0.25);
  padding:40px 30px;
  border-radius:10px;
  border: 1px solid rgba(215, 203, 190, 0.1);
  transition: all 0.5s ease;
  font-family:Bebas Neue;
}

.service-card img{
  width:100%;
  height:250px;
  object-fit:cover;
  border-radius:10px;
  margin-bottom:25px;
}

.service-card:hover{
  transform:translateY(-15px);
  border-color: var(--primary-color);
  background: rgba(0, 0, 0, 0.27);
}

/* ================= MOBILE ================= */
@media (max-width:992px){
  .navbar{
    padding: 15px 30px;
  }
}

@media (max-width:768px){
  .menu-toggle{
    display:block;
  }

  .nav-links{
    display:none;
    flex-direction:column;
    position:absolute;
    top:100%;
    right:0;
    background: rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(5px);
    width:100%;
    padding: 20px 0;
  }

  .nav-links.active {
    display: flex;
  }

  .nav-links a{
    padding:15px;
    font-family:Montserrat;

  }

  .hero-content h1{
    font-size: 40px;
  }
  .hero_conte

  .about-image, .about-info{
    min-width: 100%;
  }

  .services-grid{
    grid-template-columns:1fr;
  }
}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<header class="navbar">


  <div class="menu-toggle" id="menu-toggle">&#9776;</div>

  <nav class="nav-links" id="nav-links">
    <a href="homepage.php#home">Home</a>
    <a href="homepage.php#about">About</a>
    <a href="homepage.php#services">Services</a>
    <a href="homepage.php#contact">Contact</a>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <a href="admin_dashboard.php" style="background: #c79a5b; color: #130F08;border-radius: 8px;">Dashboard</a>
    <?php endif; ?>
    <a href="logout.php" class="logout">Logout</a>
  </nav>
</header>

<!-- ================= HERO ================= -->

<section class="hero" id="home">
  <div class="hero-content">
    <div class="hero_intro">
    <h1>Hello <?php echo $user['firstName']." ".$user['lastName']; ?> </h1>
    <p>Welcome back! Experience delicious food and unforgettable moments.</p>

    <div class="hero-buttons">
      <a href="reservation.php" class="btn primary" style=border-radius:8px;>Reservation</a>
      <a href="index.php" class="btn secondary" style=border-radius:8px;>View Menu</a>
    </div>
    </div>

  </div>
</section>

<!-- ================= ABOUT ================= -->
<?php
// Create content table if not exists and seed it
$conn->query("CREATE TABLE IF NOT EXISTS site_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(50) UNIQUE,
    content_text TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

$about_result = $conn->query("SELECT content_text FROM site_content WHERE section_name='about'");
if($about_result->num_rows == 0) {
    $default_about = "At our restaurant, food is more than just a meal — it’s an experience. We focus on quality, fresh ingredients, and authentic flavors, served in a warm and welcoming atmosphere.";
    $conn->query("INSERT INTO site_content (section_name, content_text) VALUES ('about', '$default_about')");
    $about_text = $default_about;
} else {
    $about_text = $about_result->fetch_assoc()['content_text'];
}
?>
<section class="section about" id="about">
  <h2>About Us</h2>
  
  <div class="about-content">
    <div class="about-image">
      <img src="images\Dream Home of Many.jpg" alt="Our Restaurant">
    </div>
    
    <div class="about-info">
      <p class="about-text">
        <?php echo $about_text; ?>
      </p>

      <div class="about-features">
        <div>Fresh Ingredients</div>
        <div>Authentic Taste</div>
        <div>Cozy Atmosphere</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SERVICES ================= -->
<?php
// Create services table if not exists and seed it
$conn->query("CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    image VARCHAR(255),
    icon VARCHAR(50)
)");

$services_result = $conn->query("SELECT * FROM services");
if($services_result->num_rows == 0) {
    $conn->query("INSERT INTO services (name, image, icon) VALUES 
        ('Dine In', 'dine_in.png', '🍽️'),
        ('Take Away', 'takeaway.png', '🥡'),
        ('Online Reservation', 'online_reservation.png', '📅')");
    $services_result = $conn->query("SELECT * FROM services");
}
?>
<section class="section" id="services">
  <h2>Our Services</h2>
  <div class="services-grid">
    <?php while($service = $services_result->fetch_assoc()): ?>
    <div class="service-card">
      <img src="images/<?php echo $service['image']; ?>" alt="<?php echo $service['name']; ?>">
      <div><?php echo $service['icon'] . " " . $service['name']; ?></div>
    </div>
    <?php endwhile; ?>
  </div>
</section>

<!-- ================= CONTACT ================= -->
<section class="section" id="contact">
  <h2>Contact Us</h2>
  
  <?php if(isset($_GET['contact_success'])): ?>
    <div style="background: rgba(76, 175, 80, 0.2); border: 1px solid #4CAF50; padding: 15px; border-radius: 8px; margin-bottom: 20px; color: #4CAF50;">
      Message sent successfully! We will get back to you soon.
    </div>
  <?php endif; ?>

  <div style="max-width: 600px; margin: 0 auto; background: rgba(0, 0, 0, 0.15); padding: 30px; border-radius: 15px; border: 1px solid #D7CBBE;">
    <form action="send_message.php" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
      <div style="text-align: left;">
        <label style="color: rgba(255, 255, 255, 0.77); display: block; margin-bottom: 5px;">Name</label>
        <input type="text" name="name" required style="width: 100%; padding: 10px; background: rgba(0,0,0,0.3); border: 1px solid #D7CBBE; color: white; border-radius: 5px;">
      </div>
      <div style="text-align: left;">
        <label style="color: rgba(255, 255, 255, 0.77); display: block; margin-bottom: 5px;">Email</label>
        <input type="email" name="email" required style="width: 100%; padding: 10px; background: rgba(0,0,0,0.3); border: 1px solid #D7CBBE; color: white; border-radius: 5px;">
      </div>
      <div style="text-align: left;">
        <label style="color:rgba(255, 255, 255, 0.77); display: block; margin-bottom: 5px;">Message</label>
        <textarea name="message" required rows="4" style="width: 100%; padding: 10px; background: rgba(0,0,0,0.3); border: 1px solid #D7CBBE; color: white; border-radius: 5px; resize: none;"></textarea>
      </div>
      <button type="submit" class="btn primary" style="cursor: pointer; border: none; font-size: 16px;">Send Message</button>
    </form>
  </div>
  
  <div style="margin-top: 30px;">
    <p>Email: info@restaurant.com</p>
    <p>Phone: +218 91 000 0000</p>
  </div>
</section>

<footer style="padding:20px; text-align:center; color:#D7CBBE;">
  Developed by Rodina Salih Elbargathy and Malak Emad Alenaizi
</footer>

<!-- ================= JS ================= -->
<script>
// Mobile menu toggle
const toggle = document.getElementById("menu-toggle");
const navLinks = document.getElementById("nav-links");

toggle.addEventListener("click", () => {
  if (navLinks.style.display === "flex") {
    navLinks.style.display = "none";
  } else {
    navLinks.style.display = "flex";
  }
});

// Smooth scroll for navigation links
document.querySelectorAll('.nav-links a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});
</script>

</body>
</html>