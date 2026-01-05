const categories = document.querySelectorAll('.categories li');
const cards = document.querySelectorAll('.card');


const categoryData = {
    'all': {
        title: "Global Chefs Unforgettable Flavors",
        desc: "Our menu is crafted by renowned chefs from around the globe, each bringing their unique culinary heritage.",
        imgLeft: "images/chef-left.jpg",
        imgRight: "images/chef-right.jpg"
    },
    'breakfast': {
        title: "Morning Essentials",
        desc:" Our chefs specialize in the art of the perfect start, using fresh, wholesome ingredients to create a menu that is both energizing and refined.",
        imgLeft: "images/breakfast_chef.jpg", 
        imgRight: "images/breakfast_intro.jpg"
    },
    'brunch': {
        title: "The Social Feast",
        desc: "Merging breakfast tradition with lunch innovation, our culinary team crafts creative, indulgent plates designed for a relaxed and flavorful mid-day experience.",
        imgLeft: "images/brunch_intro.jpg",
        imgRight: "images/brunch_intro2.jpg"
    },
    'dinner': {
        title: "Culinary Excellence",
        desc: "Experience technical mastery and premium flavors. Our executive team prepares sophisticated, hand-crafted entrees that celebrate fine ingredients and global inspiration.",
        imgLeft: "images/dinner_intro2.jpg",
        imgRight: "images/dinner_intro1.jpg"
    },
    'lunch': {
        title: "Vibrant & Refined",
        desc: "Focusing on seasonal brightness and balance, our chefs deliver a menu of light, artisan dishes designed to satisfy and inspire during your busy day.",
        imgLeft: "images/lunch_intro1.jpg",
        imgRight: "images/lunch_intro2.jpg"
    },
    'dessert': {
        title: "Artisan Finales",
        desc: "Our pastry specialists blend precision with creativity, offering a curated selection of handcrafted sweets designed to provide the perfect conclusion to your meal.",
        imgLeft: "images/dessert_intro1.jpg",
        imgRight: "images/dessert_intro2.jpg"
    },
     'beverages': {
        title: "The Master Blend",
        desc: "From specialty roasts to botanical infusions, our beverage experts curate a drink menu designed to harmonize perfectly with our culinary offerings.",
        imgLeft: "images/drink_intro1.jpg",
        imgRight: "images/drink_intro2.jpg"
    }


};

categories.forEach(cat => {
    cat.addEventListener('click', () => {
        const category = cat.dataset.category;

        categories.forEach(c => c.classList.remove('active'));
        cat.classList.add('active');

        if (categoryData[category]) {
            document.getElementById('hero-title').textContent = categoryData[category].title;
            document.getElementById('hero-desc').textContent = categoryData[category].desc;
            document.getElementById('img-left').src = categoryData[category].imgLeft;
            document.getElementById('img-right').src = categoryData[category].imgRight;
            
         
            document.getElementById('hero-section').style.display = 'flex';
        } else {
            document.getElementById('hero-section').style.display = 'none';
        }

        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
// ADD TO CART 
const buttons = document.querySelectorAll('.add-to-cart');
const cartCount = document.getElementById('cart-count');

buttons.forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + id
        })
        .then(res => res.text())
        .then(count => {
            cartCount.textContent = count;
        });
    });
});

// LOAD CART COUNT ON PAGE LOAD
fetch('cart_count.php')
    .then(res => res.text())
    .then(count => {
        cartCount.textContent = count;
    });

////
fetch('cart_count.php')
.then(res => res.text())
.then(count => {
    document.getElementById('cart-count').textContent = count;
});

const qtyButtons = document.querySelectorAll('.qty-btn');

qtyButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        const action = btn.dataset.action;

        fetch('update_cart.php', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: `id=${id}&action=${action}`
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('qty-' + id).textContent = data.qty;
            document.getElementById('subtotal-' + id).textContent = data.subtotal;
            document.getElementById('total').textContent = data.total;
            document.getElementById('cart-count').textContent = data.totalItems;
             });
    });
});
const readBtns = document.querySelectorAll('.read-more');

readBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const desc = btn.previousElementSibling; 
    if(desc.style.webkitLineClamp === "unset"){
      desc.style.webkitLineClamp = "3"; 
      btn.textContent = "Read More";
    } else {
      desc.style.webkitLineClamp = "unset"; 
      btn.textContent = "Read Less";
    }
  });
});



function searchMenu() {
    const input = document.getElementById("searchBox").value.toLowerCase();
    const cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        const name = card.querySelector("h4").innerText.toLowerCase();
        if (name.includes(input)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

// 
function toggleSearch() {
    const searchBox = document.getElementById("searchBox");
    searchBox.style.display =
        searchBox.style.display === "block" ? "none" : "block";
    searchBox.focus();
}

// تعديل إغلاق الصندوق عند ضغط Enter
document.getElementById("searchBox").addEventListener("keydown", function(e){
    if(e.key === "Enter"){
        e.preventDefault();
        document.getElementById("searchWrapper").style.display = "none";
    }
});

document.getElementById("searchBox").addEventListener("keydown", function(e){
    if(e.key === "Enter"){
        e.preventDefault();
        this.style.display = "none";
    }
});


