<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Menu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <a href="javascript:history.back()" class=" back-btn back-btn-fixed">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#c79a5b"><path d="M400-80 0-480l400-400 71 71-329 329 329 329-71 71Z"/></svg>
    </a>

    
    <div class="top-right-controls">
    
    <button class="search-icon" onclick="toggleSearch()"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg></button>

    <input 
         type="text"
         id="searchBox"
         placeholder="Search dishes..."
         onkeyup="searchMenu()"
    >
    <a href="cart.php" class="cart-icon"> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/></svg> <span id="cart-count">0</span> </a>

    </div>

    </div>
    
</div>



<!-- CATEGORY BAR -->
<ul class="categories">
    <li class="active" data-category="all">All</li>
    <li data-category="breakfast">Breakfast</li>
    <li data-category="brunch">Brunch</li>
    <li data-category="lunch">Lunch</li>
    <li data-category="dinner">Dinner</li>
    <li data-category="dessert">Dessert</li>
    <li data-category="beverages">Beverages</li>
    
    
</ul>
<div class="menu-wrapper">


 <div class="images-row" id="hero-section">
  <img src="images/chef-left.jpg" id="img-left">
  <div class="center-box">
    <h2 class="chef-head" id="hero-title">Global Chefs Unforgettable Flavors</h2>
    <p class="chef-intro" id="hero-desc">
Our menu is crafted by renowned chefs from around the globe, each bringing their unique culinary heritage and expertise. Experience a symphony of flavors, from classic favorites to bold, innovative creations, all prepared with passion and excellence.</p>
  </div>
  <img src="images/chef-right.jpg" id="img-right">
</div>



<h2 class="section-title">Our International Selection</h2>

<!-- MENU GRID -->
<div class="menu">
<?php
$stmt = $conn->prepare("SELECT * FROM dishes");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
?>
    <div class="card" data-category="<?php echo $row['category']; ?>">
        <img src="images/<?php echo $row['image']; ?>">
        <h4><?php echo $row['name']; ?></h4>
        <p class="description"><?php echo $row['description']; ?></p>
        <span>$<?php echo $row['price']; ?></span>

        <button class="add-to-cart" data-id="<?php echo $row['id']; ?>">
        Add to Cart
        </button>
    </div>
<?php
}
$stmt->close();
?>

</div>
</div>


<script src="script.js"></script>
</body>
</html>