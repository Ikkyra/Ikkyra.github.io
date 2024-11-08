-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 03:03 PM
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
-- Database: `easytocook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `recipe_id`, `user_id`, `comment`, `created_at`) VALUES
(47, 8, 3, 'kocak', '2024-11-08 05:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `recipe_id`, `user_id`, `rating`) VALUES
(5, 8, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `ingredients` text NOT NULL,
  `preparation` text NOT NULL,
  `time` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `category`, `ingredients`, `preparation`, `time`, `image`, `created_at`) VALUES
(8, 'Arugula Salad with Stone Fruit', 'Lunch', '2 tablespoons extra-virgin olive oil\r\n\r\n2 tablespoons red wine vinegar or rosé vinegar\r\n\r\n3/4 teaspoon salt\r\n\r\n1/2 teaspoon black pepper\r\n\r\n1 1/2 cups red cherry tomatoes, halved\r\n\r\n1 1/2 cups yellow cherry tomatoes, halved\r\n\r\n1 (5-ounce package) arugula\r\n\r\n3/4 cup fresh basil leaves\r\n\r\n2 nectarines, sliced\r\n\r\n1 large white peach, sliced\r\n\r\n1 cup Rainier or other yellow-flesh cherries, pitted and halved\r\n\r\n1/2 teaspoon flaky sea salt\r\n', 'Arrange tomatoes, arugula, basil, nectarines, and peach slices on a large platter. Drizzle with half the dressing. Top with cherries, sea salt, and remaining dressing. Serve immediately.\r\n', 15, '2024-11-08 06.47.33.jpg', '2024-11-08 05:47:33'),
(9, 'Caprese Salad with Balsamic Reduction', 'Lunch', '1 cup balsamic vinegar\r\n\r\n¼ cup honey\r\n\r\n3 large tomatoes, cut into 1/2-inch slices\r\n\r\n1 (16 ounce) package fresh mozzarella cheese, cut into 1/4-inch slices\r\n\r\n¼ teaspoon salt\r\n\r\n¼ teaspoon ground black pepper\r\n\r\n½ cup fresh basil leaves\r\n\r\n¼ cup extra-virgin olive oil', 'Gather all ingredients. Stir balsamic vinegar and honey together in a small saucepan and place over high heat.\r\n\r\nIngredients to make Caprese salad with balsamic reduction\r\nDotdash Meredith Food Studios\r\nBring to a boil, reduce heat to low, and simmer until mixture has reduced to 1/3 cup, about 10 minutes. Set aside to cool.\r\n\r\nA simmering pot of balsamic vinegar and honey\r\nDotdash Meredith Food Studios\r\nArrange alternating slices of tomato and mozzarella decoratively on a serving platter.\r\n\r\nA large round platter with alternating slices of sliced tomato and slices fresh mozzarella\r\nDotdash Meredith Food Studios\r\nSprinkle with salt and black pepper, tuck basil leaves around slices, and drizzle with olive oil and the balsamic reduction.', 15, '2024-11-08 13.59.30.jpg', '2024-11-08 12:59:30'),
(10, 'Cucumber Soup with Tomatoes', 'Lunch', '4 cucumbers - peeled, quartered, and seeded\r\n\r\n1 (14.5 ounce) can chicken broth\r\n\r\n1 cup chopped tomato\r\n\r\n¼ cup fresh lime juice\r\n\r\n⅛ teaspoon cayenne pepper\r\n', 'Place 2 cucumbers in a blender; pour in chicken stock. Blend cucumber mixture until smooth and pureed; pour cucumber puree into a large bowl.\r\n\r\nChop the remaining 2 cucumbers. Stir chopped cucumbers, tomato, lime juice, and cayenne pepper into pureed cucumber until well mixed. Refrigerate until chilled, at least 30 minutes.', 40, '2024-11-08 14.01.21.jpg', '2024-11-08 13:01:21'),
(11, 'Quick Beef Stir-Fry', 'Dinner', '2 tablespoons vegetable oil\r\n\r\n1 pound beef sirloin, cut into 2-inch strips\r\n\r\n1 ½ cups fresh broccoli florets\r\n\r\n1 red bell pepper, cut into matchsticks\r\n\r\n2 carrots, thinly sliced\r\n\r\n1 green onion, chopped\r\n\r\n1 teaspoon minced garlic\r\n\r\n2 tablespoons soy sauce\r\n\r\n2 tablespoons sesame seeds, toasted', 'Overhead of stir-fry ingredients in various bowls. \r\nDotdash Meredith Food Studios\r\nHeat vegetable oil in a large wok or skillet over medium-high heat; cook and stir beef until browned, 3 to 4 minutes.\r\n\r\nOverhead of beef being cooked in a wok. \r\nDotdash Meredith Food Studios\r\nMove beef to the side of the wok and add broccoli, bell pepper, carrots, green onion, and garlic to the center of the wok. Cook and stir vegetables for 2 minutes.\r\n\r\nStir beef into vegetables and season with soy sauce and sesame seeds. Continue to cook and stir until vegetables are tender, about 2 more minutes.\r\n\r\nOverhead of chopped vegatables, beef, and seseme seeds being cooked together in a wok. \r\nDotdash Meredith Food Studios\r\nServe hot and enjoy!', 20, '2024-11-08 14.07.42.jpg', '2024-11-08 13:07:42'),
(12, 'Chicken Parmesan', 'Dinner', '4 skinless, boneless chicken breast halves\r\n\r\nsalt and freshly ground black pepper to taste\r\n\r\n2 large eggs\r\n\r\n1 cup panko bread crumbs, or more as needed\r\n\r\n¾ cup grated Parmesan cheese, divided\r\n\r\n2 tablespoons all-purpose flour, or more if needed\r\n\r\n½ cup olive oil for frying, or as needed\r\n\r\n½ cup prepared tomato sauce\r\n\r\n¼ cup fresh mozzarella, cut into small cubes\r\n\r\n¼ cup chopped fresh basil\r\n\r\n½ cup grated provolone cheese\r\n\r\n2 teaspoons olive oil', 'Gather the ingredients. Preheat an oven to 450 degrees F (230 degrees C).\r\n\r\nChicken parmesan ingredients including raw chicken breasts, breadcrumbs, cheese, and tomato sauce.\r\nDotdash Meredith Food Studios\r\nPlace chicken breasts between two sheets of heavy plastic (resealable freezer bags work well) on a solid, level surface. Firmly pound chicken with the smooth side of a meat mallet to a thickness of 1/2-inch.\r\n\r\ntwo raw chicken breasts being pounded with a mallet\r\nDotdash Meredith Food Studios\r\nSeason chicken thoroughly with salt and pepper. Using a sifter or strainer; sprinkle flour over chicken breasts, evenly coating both sides\r\n\r\nChicken breasts pounded to 1/2 inch thickness, seasoned with salt and pepper and coated in flour\r\nDotdash Meredith Food Studios\r\nBeat eggs in a shallow bowl and set aside. Mix bread crumbs and 1/2 cup Parmesan cheese in a separate bowl, set aside. Dip a flour-coated chicken breast in beaten eggs. Transfer breast to the bread crumb mixture, pressing crumbs into both sides. Repeat for each breast. Let chicken rest for 10 to 15 minutes.\r\n\r\n chicken breast being dipped in egg mixture\r\nDotdash Meredith Food Studios\r\nHeat 1/2 inch olive oil in a large skillet on medium-high heat until it begins to shimmer. Cook chicken in the hot oil until golden, about 2 minutes per side. The chicken will finish cooking in the oven.\r\n\r\ngolden brown chicken breast frying in a skillet of oil\r\nDotdash Meredith Food Studios\r\nTransfer chicken to a baking dish. Top each breast with 2 tablespoons tomato sauce. Layer each chicken breast with equal amounts of mozzarella cheese, fresh basil, and provolone cheese. Sprinkle remaining Parmesan over top and drizzle each with 1/2 teaspoon olive oil.\r\n\r\nfried chicken breasts topped with marinara, fresh basil, mozzarella, and shredded parmesan.\r\nDotdash Meredith Food Studios\r\nBake in the preheated oven until cheese is browned and bubbly and chicken breasts are no longer pink in the center, 15 to 20 minutes. An instant-read thermometer inserted into the center should read at least 165 degrees F (74 degrees C).\r\n\r\nFresh out of the oven cGather the ingredients. Preheat an oven to 450 degrees F (230 degrees C).\r\n\r\nChicken parmesan ingredients including raw chicken breasts, breadcrumbs, cheese, and tomato sauce.\r\nDotdash Meredith Food Studios\r\nPlace chicken breasts between two sheets of heavy plastic (resealable freezer bags work well) on a solid, level surface. Firmly pound chicken with the smooth side of a meat mallet to a thickness of 1/2-inch.\r\n\r\ntwo raw chicken breasts being pounded with a mallet\r\nDotdash Meredith Food Studios\r\nSeason chicken thoroughly with salt and pepper. Using a sifter or strainer; sprinkle flour over chicken breasts, evenly coating both sides\r\n\r\nChicken breasts pounded to 1/2 inch thickness, seasoned with salt and pepper and coated in flour\r\nDotdash Meredith Food Studios\r\nBeat eggs in a shallow bowl and set aside. Mix bread crumbs and 1/2 cup Parmesan cheese in a separate bowl, set aside. Dip a flour-coated chicken breast in beaten eggs. Transfer breast to the bread crumb mixture, pressing crumbs into both sides. Repeat for each breast. Let chicken rest for 10 to 15 minutes.\r\n\r\n chicken breast being dipped in egg mixture\r\nDotdash Meredith Food Studios\r\nHeat 1/2 inch olive oil in a large skillet on medium-high heat until it begins to shimmer. Cook chicken in the hot oil until golden, about 2 minutes per side. The chicken will finish cooking in the oven.\r\n\r\ngolden brown chicken breast frying in a skillet of oil\r\nDotdash Meredith Food Studios\r\nTransfer chicken to a baking dish. Top each breast with 2 tablespoons tomato sauce. Layer each chicken breast with equal amounts of mozzarella cheese, fresh basil, and provolone cheese. Sprinkle remaining Parmesan over top and drizzle each with 1/2 teaspoon olive oil.\r\n\r\nfried chicken breasts topped with marinara, fresh basil, mozzarella, and shredded parmesan.\r\nDotdash Meredith Food Studios\r\nBake in the preheated oven until cheese is browned and bubbly and chicken breasts are no longer pink in the center, 15 to 20 minutes. An instant-read thermometer inserted into the center should read at least 165 degrees F (74 degrees C).\r\n\r\nFresh out of the oven c', 50, '2024-11-08 14.10.20.jpg', '2024-11-08 13:10:20'),
(13, 'Roasted Pork Loin', 'Dinner', '3 cloves garlic, minced\r\n\r\n1 tablespoon dried rosemary\r\n\r\nsalt and pepper to taste\r\n\r\n2 pounds boneless pork loin roast\r\n\r\n¼ cup olive oil\r\n\r\n½ cup white wine3 cloves garlic, minced\r\n\r\n1 tablespoon dried rosemary\r\n\r\nsalt and pepper to taste\r\n\r\n2 pounds boneless pork loin roast\r\n\r\n¼ cup olive oil\r\n\r\n½ cup white wine', 'Gather all ingredients. Preheat oven to 350 degrees F (175 degrees C).\r\n\r\nOverhead of pork tenderloin ingredients in various bowls and surfaces. \r\nDotdash Meredith Food Studios\r\nCrush garlic with rosemary, salt, and pepper in a mortar and pestle to make a paste.\r\n\r\nOverhead of a garlic and rosemary mixture on a cutting board. \r\nDotdash Meredith Food Studios\r\nPierce meat with a sharp knife in several places and press garlic paste into the openings. Rub pork loin with the remaining garlic mixture and olive oil. Set into an oven-safe pan.\r\n\r\nOverhead of a raw pork tenderloin covered in a rub resting on a cutting board. \r\nDotdash Meredith Food Studios\r\nPlace pork loin into the preheated oven, turning and basting with pan liquids every 30 minutes. Cook until the pork is no longer pink in the center, 90 minutes to 2 hours. An instant-read thermometer inserted into the center should read 145 degrees F (63 degrees C). Remove roast to a platter and keep warm.\r\n\r\nPlace pan onto the stove over medium-high heat and pour wine into it. Heat wine and stir to loosen browned bits from the bottom of the pan. Simmer for 3 to 5 minutes.\r\n\r\nOverhead of wine and pork tenderloin juices cooking in a skillet.\r\nDotdash Meredith Food Studios\r\nSlice pork loin and serve with pan juices.\r\n\r\na high angle view of a roasted pork loin on a cutting board partially sliced', 150, '2024-11-08 14.11.26.jpg', '2024-11-08 13:11:26'),
(14, 'Denver Omelette', 'Breakfast', '3 large eggs\r\n\r\n1 tablespoon butter\r\n\r\n¼ cup diced smoked ham\r\n\r\n2 tablespoons diced onion\r\n\r\n2 tablespoons diced green bell pepper\r\n\r\nsalt and freshly ground black pepper to taste\r\n\r\n⅓ cup shredded Cheddar cheese\r\n\r\n1 pinch cayenne pepper', 'Beat eggs in a small bowl until just combined; do not overbeat.\r\n\r\nA bowl of whisked eggs\r\nDotdash Meredith Food Studios\r\nMelt butter in a skillet over medium-high heat. Add ham, onion, and bell pepper; season with salt and pepper. Cook and stir until onions soften and ham begins to caramelize, about 5 minutes.\r\n\r\nA pan with chopped ham, onion, and bell pepper cooking in melted butter\r\nDotdash Meredith Food Studios\r\nReduce heat to medium-low and pour in eggs. Mix briefly with a spatula while shaking the pan to ensure ingredients are evenly distributed.\r\n\r\nA pan with chopped onion, ham, bell pepper, and whisked eggs\r\nDotdash Meredith Food Studios\r\nQuickly run the spatula along edges of omelet.\r\n\r\nA spatula running along the edge of a partially cooked omelet in a pan\r\nDotdash Meredith Food Studios\r\nSprinkle Cheddar cheese and cayenne pepper over omelet.\r\n\r\nA pan with a thin layer of eggs with ham, peppers, and onion, topped with shredded cheese and cayenne pepper\r\nDotdash Meredith Food Studios\r\nCook, shaking the pan occasionally, until top is still wet but not runny, about 5 minutes. Use a spatula to fold omelet in half and transfer it to a plate.', 15, '2024-11-08 14.23.55.jpg', '2024-11-08 13:23:55'),
(15, 'Chicken Mushrooms omelette', 'Breakfast', '4 butir telur kocok\r\n100 gr ayam potong dadu\r\n200 gr jamur champignon/portabelo/Shitake/kancing diiris tipis\r\n1/2 batang wortel chop halus\r\n1 batang daun bawang iris tipis tidak usah pakai putihnya\r\n2 sendok garlic chop\r\n1 buah Paprika hijau/merah potong dadu. Bisa juga pakai tomat namun jangan dipakai bijinya\r\nSecukupnya Garam,lada putih,knor(kaldu ayam)\r\n5 sendok Susu fresh milk (optional)', 'Saute the garlic chop until the aroma smell good then throw diced chicken wait until soft and mixed it with mushroom and spring onion. Cook until the mushroom turns soft. kill the fire\r\n\r\nbeat an egg and milk\r\n\r\nthrow in the saute diced chicken and mushroom into the beaten egg mixture\r\n\r\nadd paprika/tomato that had been diced \r\n\r\nadd in salt and pepper. taste to adjust\r\n\r\nThen heat up a bit of butter/cooking oil, fry the egg mixture with low heat\r\n\r\nChicken Omelette is to served!\r\n\r\n', 30, '2024-11-08 14.35.41.jpg', '2024-11-08 13:35:41'),
(16, 'Oatmeal porriadge', 'Breakfast', '1 cup of oatmeal\r\n\r\n2 cups of water\r\n\r\n7 quail eggs\r\n\r\n1 chopped spring onion\r\n\r\n1 chopped celery\r\n\r\nShredded beef and boiled egg for the topping\r\n\r\nsoy sauce\r\n\r\nsesame oil', 'Ready a pot and heat up the stove\r\n\r\npour in water and quail eggs, then mixed well\r\n\r\nIf water is started boils lower the heat, throw in the oat, soy sauce and a bit of salt and pepper\r\n\r\nIf you want it to have a more aromatic smell add in 1 tablespoon of sesame oil. Do not otherwise.\r\n\r\ntaste to adjust\r\n\r\nput in the spring onion and celery\r\n\r\nIf the mixture have a consistency of porriadge and mushy kill the fire', 15, '2024-11-08 14.50.13.jpg', '2024-11-08 13:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$73I6vyV0QSsTffgCDX3Phutg7IJpl0mqSVKZ9YfKG3ip3EXcmC7qu', 'admin'),
(2, 'rava', 'rava@gmail.com', '$2y$10$9Gr4GPhdAjgBTI/B4xhYo.hfzJzOThn.Ij51I3DT4jBVWuHcQJzmy', 'user'),
(3, 'mike', 'mike@gmail.com', '$2y$10$F8Com6zRFx01FFSzZUuiwuRCZ/YioVeQ/B4Bul7AFe26EOiXicFx2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
