-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2026 at 06:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'bhhbk,', 'kj@fknvl', 'gfgj', '2026-01-05 11:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `price`, `image`, `category`, `description`) VALUES
(1, 'Imperial Yakitori Glaze', 45.00, 'chicken.jpg', 'lunch', 'Premium organic chicken seared over Binchotan charcoal, finished with a 48-hour aged Teriyaki reduction, toasted sesame, and scallion pearls.'),
(2, 'Prime Ribeye & Truffle Silk Price', 120.00, 'meat-steak.jpg', 'lunch', 'A center-cut prime ribeye, pan-seared to perfection. Served over velvet potato purée, topped with caramelized Cipollini onions and a rich Bordelaise reduction.'),
(3, 'Roasted Heirloom Pomodoro', 40.00, 'soup.jpg', 'lunch', 'Slow-roasted Heirloom tomatoes blended into a silky bisque. Infused with basil-pressed oil and garnished with edible floral herbs.'),
(4, 'Atlantic Lobster & Garlic Emulsion', 95.00, 'seafood.jpg', 'lunch', 'Wild-caught lobster tails flame-grilled with herb-infused butter. Finished with roasted garlic cloves, fresh lemon, and micro-parsley.'),
(5, 'Umami Forest Rice Noodles', 65.00, 'noodles.jpg', 'lunch', 'Artisanal rice noodles in a rich charred-bone broth. Topped with grilled Shiitake, crispy tofu skin, and aromatic chili-scallion oil.'),
(6, 'Heritage Tomahawk & Chimichurri', 185.00, 'bigmeat.jpg', 'lunch', 'Dry-aged bone-in Tomahawk, flame-seared to a perfect medium-rare. Served with a vibrant house-made Chimichurri and smoked sea salt crystals.'),
(7, 'Midnight Espresso Tiramisu', 35.00, 'tiramisu.jpg', 'dessert', 'Layers of Arabica-soaked ladyfingers and whipped Mascarpone cream. Dusted with dark cocoa and topped with premium chocolate shards.'),
(8, 'Velvet Caramel & Berry Cheesecake', 42.00, 'cheesecake.jpg', 'dessert', 'Silky New York-style cheesecake on a buttery crust. Drizzled with salted caramel, topped with fresh forest berries and a crisp tuile.'),
(9, 'Artisan Nutella & Berry Stack', 38.00, 'pancake.jpg', 'dessert', 'Fluffy cocoa-infused pancakes layered with premium hazelnut praline. Crowned with wild berries, toasted nuts, and a warm ganache drizzle.\r\n'),
(10, '24K Gold Dark Chocolate Lava', 50.00, 'chocolate-cake2.jpg', 'dessert', 'Molten Valrhona chocolate cake topped with 24K edible gold flakes. Served with a tart raspberry coulis and dusting of fine snow sugar.'),
(11, 'Grand Truffle & Gold Sphere', 75.00, 'TRUFFLE-EXPLOSIA.jpg', 'dessert', 'A decadent chocolate dome filled with vanilla bean cream and brownie. Garnished with 24K gold leaves and set on a smooth ganache base.'),
(12, 'Velvet Berry Cake Spheres', 44.00, 'ballcakes.jpg', 'dessert', 'Delicate red velvet cake orbs coated in white chocolate ganache and forest berry dust. Crowned with fresh blackberries and served on a rustic oak platter.'),
(13, 'Golden Glazed Pear & Panna Cotta', 52.00, 'pear-cake.jpg', 'dessert', 'A whole poached Bosc pear with a honey-gold glaze, resting on a velvet vanilla Panna Cotta. Encrusted with toasted walnut praline and finished with autumn floral accents.'),
(14, 'Celestial Berry Galaxy', 65.00, 'dessert2.jpg', 'dessert', 'A cosmic-themed berry mousse on a glazed sable base. Featuring artisan chocolate orbits, handcrafted gold-dusted spheres, and a fresh wild strawberry peak.'),
(15, 'Spiced Walnut & Meringue Peak', 45.00, 'dessert3.jpg', 'dessert', 'Layers of crisp artisanal meringue and light maple cream. Topped with candied walnuts, cinnamon bark, and a delicate honey-tuile sail.'),
(16, 'Zen Garden Deconstructed Pear', 58.00, 'dessert4.jpg', 'dessert', 'A minimalist composition of poached pear and vanilla snow atop dark chocolate soil. Accented with salted caramel swirls and delicate botanical highlights.'),
(17, 'Mediterranean Ricotta & Sundried Tartine', 35.00, 'breakfast2.jpg', 'breakfast', 'Toasted artisanal sourdough spread with whipped herbed Ricotta. Layered with sun-drenched tomatoes, colossal green olives, capers, and fragrant sprigs of fresh mountain thyme.'),
(18, 'Nordic Salmon Benedict', 42.00, 'breakfast3.jpg', 'breakfast', 'Poached organic eggs and premium smoked salmon on toasted English muffins. Drizzled with silken lemon-dill hollandaise and finished with fresh aromatic herbs.'),
(19, 'Midnight Cocoa & Banana Acai', 32.00, 'breakfast4.jpg', 'breakfast', 'A rich antioxidant blend of organic acai and dark cocoa. Artisanally topped with fresh banana medallions, chia seeds, dark chocolate chunks, and toasted almond slivers.'),
(20, 'Imperial Caviar & Smoked Salmon Blinis', 125.00, 'breakfast6.jpg', 'breakfast', 'Delicate house-made blinis topped with velvet crème fraîche and premium smoked salmon ribbons. Crowned with a generous serving of Imperial Beluga caviar and fresh dill.'),
(21, 'Morning Artisan Pastry Suite', 28.00, 'breakfast5.jpg', 'breakfast', 'A warm, flaky butter croissant served with rich house-made salted caramel and toasted almonds. Accompanied by dark chocolate chip muffins and a smooth espresso.'),
(22, 'Wild Berry Brioche Stack', 36.00, 'breakfast1.jpg', 'breakfast', 'Thick-cut, golden brioche slices layered with a house-made forest berry compote. Topped with whipped Chantilly cream, fresh blueberries, and a delicate dusting of powdered snow.'),
(23, 'Artisan Steak & Sunny Harvest', 62.00, 'brunch1.jpg', 'brunch', 'A premium, flame-grilled steak paired with farm-fresh sunny-side-up eggs. Served with herb-roasted fingerling potatoes, creamy scrambled eggs, and a touch of garden-fresh chimichurri.'),
(24, 'Wild Honey & Redcurrant Brie', 44.00, 'brunch2.jpg', 'brunch', 'A wheel of creamy artisan Brie draped in wildflower honey and tart redcurrants. Garnished with forest berries and seasonal greenery for a perfect balance of sweet and savory.'),
(25, 'Rustic Skillet Camembert', 48.00, 'brunch3.jpg', 'brunch', 'Whole oven-baked Camembert infused with garlic cloves and fresh thyme. Topped with honey-glazed hazelnuts and served in a cast-iron skillet with toasted sourdough points.'),
(26, 'Golden Harvest Raspberry Waffles', 38.00, 'brunch5.jpg', 'brunch', 'A duo of crisp, golden-ironed waffles topped with a cloud of whipped Chantilly cream and tart forest raspberries. Finished with edible spring florals, a delicate snow-sugar dusting, and a drizzle of warm amber syrup.'),
(27, 'Thyme-Roasted Fingerling Crisps', 18.00, 'brunch4.jpg', 'brunch', 'Triple-cooked fingerling potatoes roasted to a golden crisp in herb-infused oil. Garnished with fresh garden thyme and a light dusting of coarse Atlantic sea salt.'),
(28, 'Heirloom Tomato & Egg Galette', 34.00, 'brunch6.jpg', 'brunch', 'A flaky, golden-brown puff pastry nest filled with a center-cut sunny-side-up egg. Garnished with roasted cherry tomatoes, fresh chopped parsley, and a hint of cracked black pepper.'),
(31, 'Golden Saffron & Wild Mushroom Risotto', 54.00, 'dinner1.jpg', 'dinner', 'A luxurious Arborio rice base simmered in a golden saffron-infused broth. This elegant dish is crowned with herb-basted wild mushrooms, fresh micro-greens, and a delicate drizzle of premium truffle oil to enhance the earthy aromatics.'),
(32, 'Velvet Cream Spinach & Charred Allium', 26.00, 'dinner2.jpg', 'dinner', 'Tender, farm-fresh spinach folded into a rich, nutmeg-infused garlic cream. This decadent side is finished with salt-seared onion rings, cracked black peppercorns, and a hint of fresh garden rosemary.'),
(33, 'Saffron Harvest Wild Mushroom Risotto', 54.00, 'dinner3.jpg', 'dinner', 'A decadent, slow-simmered Arborio rice base infused with a vibrant saffron broth and roasted seasonal squash. This elegant main is crowned with a selection of pan-seared wild mushrooms and fresh garden herbs, finished with a delicate drizzle of premi'),
(34, 'Thyme-Roasted Fingerling Crisps', 38.00, 'dinner4.jpg', 'dinner', 'Triple-cooked fingerling potatoes roasted to a golden crisp in herb-infused oil. This savory side is garnished with fresh garden thyme and a light dusting of coarse Atlantic sea salt.'),
(35, 'Heritage Lobster Tail Service', 78.00, 'dinner5.jpg', 'dinner', 'Butter-poached and herb-crusted cold-water lobster tails, sliced for an elegant presentation. This coastal delicacy is served with a rich, velvety lemon-butter reduction for dipping and garnished with a spray of garden-fresh parsley.'),
(36, 'Heritage Coastal Linguine', 64.00, 'dinner6.jpg', 'dinner', 'Al dente linguine tossed in a rich, sun-ripened tomato and garlic reduction. This Mediterranean-inspired masterpiece is loaded with pan-seared jumbo tiger prawns, succulent shrimp, and fresh manila clams. The dish is finished with roasted cherry toma'),
(37, 'Sunset Violet Elixir', 24.00, 'drink1.jpg', 'beverages', 'A vibrant, multi-layered craft mocktail featuring a gradient of deep violet and sun-drenched citrus hues. This refreshing elixir is served over crushed ice, finished with a sugar-dusted rim, and garnished with fresh raspberries, blueberries, and a we'),
(38, 'Midnight Sapphire Old Fashioned', 32.00, 'drink2.jpg', 'beverages', 'A sophisticated, deep-blue craft cocktail served over hand-carved ice for slow dilution. This moody, indigo-hued spirit is balanced with botanical bitters and garnished with a signature skewer of plump, fresh-picked blueberries.'),
(39, '\r\nGolden Passionfruit Mojito', 28.00, 'drink3.jpg', 'beverages', 'A bright and tropical tall-glass infusion featuring crushed ice, fresh garden mint, and the pulp of sun-ripened passionfruit. This refreshing cooler is topped with a halved passionfruit shell and a fragrant mint sprig for a vibrant, exotic finish.'),
(40, 'Blueberry & Thyme Sparkling Infusion', 24.00, 'drink4.jpg', 'beverages', 'A crisp and effervescent botanical cooler featuring a base of sparkling mineral water infused with wild blueberry essence. This elegant tall-glass service is layered with fresh whole blueberries and a sun-ripened lemon slice, finished with a fragrant'),
(41, 'Espresso Sunrise Cold Brew', 26.00, 'drink5.jpg', 'beverages', 'A stunning, hand-poured layered coffee experience featuring a bold, dark-roasted espresso base beneath a vibrant citrus-infused crown. Served over crushed ice in an artisan highball glass, this energizing tonic is finished with a fresh, aromatic mint'),
(42, 'Hibiscus & Rose Petal Spritz', 22.00, 'drink6.jpg', 'beverages', 'A delicate and botanical effervescent tonic featuring a gradient of blush and deep crimson hues. This elegant tall-glass service is infused with wild hibiscus extract and layered with floating, hand-picked rose petals and crushed ice for a floral, re');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time DEFAULT NULL,
  `guests` varchar(10) DEFAULT NULL,
  `special_requests` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `icon`) VALUES
(1, 'Dine In', 'dine_in.png', '🍽️'),
(2, 'Take Away', 'takeaway.png', '🥡'),
(3, 'Online Reservation', 'online_reservation.png', '📅');

-- --------------------------------------------------------

--
-- Table structure for table `site_content`
--

CREATE TABLE `site_content` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `content_text` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_content`
--

INSERT INTO `site_content` (`id`, `section_name`, `content_text`, `updated_at`) VALUES
(1, 'about', 'At our restaurant, food is more than just a meal — it’s an experience. We focus on quality, fresh ingredients, and authentic flavors, served in a warm and welcoming atmosphere. lll', '2026-01-05 11:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` ENUM('admin', 'user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(1, 'malak', 'emad', 'malak@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'hajer', 'fraj', 'hajer@gndjn.vjdhi', '827ccb0eea8a706c4c34a16891f84e7b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_content`
--
ALTER TABLE `site_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section_name` (`section_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_content`
--
ALTER TABLE `site_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
