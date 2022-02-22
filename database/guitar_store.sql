-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 02:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guitar_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Gibson'),
(2, 'Fender'),
(3, 'Martin');

-- --------------------------------------------------------

--
-- Table structure for table `guitarbodys`
--

CREATE TABLE `guitarbodys` (
  `id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guitarbodys`
--

INSERT INTO `guitarbodys` (`id`, `body`) VALUES
(1, 'Les Paul'),
(2, 'SG Models'),
(3, 'ES-Style Models'),
(4, 'Designer Models'),
(5, 'Artist Models'),
(6, 'Acoustic'),
(7, 'Stratocaster Models'),
(8, 'Telecaster Models'),
(9, 'Custom Models'),
(10, 'Firebird');

-- --------------------------------------------------------

--
-- Table structure for table `guitars`
--

CREATE TABLE `guitars` (
  `id` int(11) NOT NULL,
  `guitar_name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `handedness` int(11) NOT NULL,
  `guitar_quote` varchar(125) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` int(11) NOT NULL,
  `guitar_body` int(11) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `material_type` varchar(150) NOT NULL,
  `num_frets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guitars`
--

INSERT INTO `guitars` (`id`, `guitar_name`, `price`, `handedness`, `guitar_quote`, `description`, `image`, `brand`, `guitar_body`, `colour`, `material_type`, `num_frets`) VALUES
(1, '1968 Les Paul Custom Reissue', 5800, 1, 'Beauty...and a Beast!', 'The 1968 Les Paul Custom stood apart from its 1950s predecessors in a few significant ways. Instead of a solid mahogany body, it now had a solid maple top on a mahogany back - adding the clarity and bite that many rock guitarists sought. It also came standard with two humbuckers as opposed to three, providing additional picking clearance. And lastly it had a 14-degree peghead angle for reduced string tension.\r\n\r\nThis set of features instantly became the new standard for the Les Paul Custom model, which has been produced continuously by Gibson ever since. This 1968 Les Paul Custom Reissue was designed to be the final say in historical accuracy, tone and feel. Every detail and spec was meticulously revived by the skilled artisans at Gibson Custom Shop to provide an amazing, life-long vintage ownership experience.', 'uploads/1968-Les-Paul-Custom--Reissue.png', 1, 1, 'Gold', 'Solid Mahogany', 22),
(2, 'Firebird', 2000, 1, 'Fly With The Firebird', 'The Gibson Firebird rocks a reverse body and headstock design as originally introduced in 1963 and was Gibson&#39;s first neck-through-body design. The traditional 9-ply mahogany/walnut neck through body construction provides rich, warm tonality and incredible sustain. A slim taper neck with a bound, rosewood fingerboard and acrylic trapezoid fingerboard inlays offers fast and effortless playability. The newly refreshed Firebird is outfitted with the redeveloped Alnico V Firebird pickup to recapture the scorching output and searing tones of the original voice for which the Firebird is known. Available in 2 classic finishes: Tobacco Sunburst and Cherry.', 'uploads/firebird.png', 1, 10, 'Tobacco Burst', 'Mahogany', 22),
(6, 'Tom Morello Stratocaster', 1500, 1, 'Soul Power', 'Tom Morello&#39;s unique, powerful sounds - from gentle rhythms to screaming feedback, chaotic stutters, and more - require a very special Stratocaster. The Tom Morello â€œSoul Powerâ€ Stratocaster â€“ based on the modified Designer Series Strat used during his time in Audioslave â€“ features an alder slab body with binding and a &#34;Modern C&#34;-shape maple neck with 9.5&#34;-14&#34; compound radius rosewood fingerboard and 22 medium-jumbo frets. Other features include a recessed Floyd Rose locking tremolo system, Seymour Duncan Hot Rails bridge humbucker, two Fender Noiseless pickups in the neck and middle positions, chrome pickguard, kill-switch toggle, locking tuners, matching painted headcap and iconic &#34;Soul Power&#34; body decal in the black Fender case.', 'uploads/Tom-Morello-Stractocaster.png', 2, 5, 'Black', 'Alder', 22),
(7, 'Southern Jumbo Original', 3000, 1, 'A Gibson reflecting the charm and style of the South', 'The Southern Jumbo is renowned for its proficiency to belt out country rhythms or acoustic blues leads. Original examples are among the most prized war-era flat-tops in todayâ€™s vintage market. This new Southern Jumbo Original picks up where those classic models left off. Classic Southern Jumbo detailing includes parallelogram inlays, double antiqued multi-ply top and back binding, and nickel open back tuners.', 'uploads/Souther-Jumbo-Original.png', 1, 6, 'Vintage Sunburst', 'Mahogany', 20),
(8, '70s Flying V', 2000, 1, '70s Rockers', 'The iconic â€˜70s classic is ready to take flight again. With its bound rosewood fingerboard, slim taper neck, and a pair of uncovered â€˜70s tribute humbuckers all hand wired with Orange Drop capacitors, this V is set to nail all of the classic tones of the era. Available in classic white finish with matching headstock, silver reflector knobs and chrome hardware make this guitar ready to rock any arena stage.', 'uploads/70\'s-Flying-V.png', 1, 4, 'Classic White', 'Mahogany', 22),
(9, 'American Ultra Stratocaster', 2200, 1, 'Above. Beyond. Ultra.', 'American Ultra is our most advanced series of guitars and basses for discerning players who demand the ultimate in precision, performance and tone. The American Ultra Stratocaster features a unique â€œModern Dâ€ neck profile with Ultra rolled fingerboard edges for hours of playing comfort, and the tapered neck heel allows easy access to the highest register. A speedy 10â€-14â€ compound-radius fingerboard with 22 medium-jumbo frets means effortless and accurate soloing, while the Ultra Noiselessâ„¢ Vintage pickups and advanced wiring options provide endless tonal possibilities â€“ without hum. The sculpted rear body contours are as beautiful as they are functional and the S-1 switch adds the neck pickup in to any switch position. This versatile, state-of-the-art instrument will inspire you to push your playing to new heights.', 'uploads/American-Ultra-Stractocaster.png', 2, 7, 'Sunburst Red', 'Alder', 22),
(10, 'Jimi Hendrix Stratocaster', 1009, 2, 'Stand Up Next To A Mountain', 'Honoring the electrifying &#34;Voodoo Chile&#34; who popularized the Stratocaster guitar and its tremendous sonic flexibility, the Jimi Hendrix Stratocaster gives you the same fiery tone and playing feel to wield as your own. Full of incendiary vintage tone and classic style, this extraordinary instrument features signature touches and unique appointments based on his distinctive &#34;flipped-over&#34; guitars.', 'uploads/Jimi-Hendrix-Stractocaster.png', 2, 7, '3-Color Sunburst', 'Alder', 21),
(11, 'Parallel Universe Vol II Troublemaker Tele Deluxe', 2600, 1, 'The Deluxe Parallel Universe', 'It takes a big personality to show up in a white tux â€“ and the Troublemaker TeleÂ® has the swagger to pull it off. The bold Olympic White lacquer finish and swanky gold hardware belies this guitarâ€™s true purpose â€“ to cause an uproar and make a racket. But itâ€™s not all style-over-substance â€“ this Tele has class. The body is a solid chunk of mahogany, known for its mid-range growl and sustain. The 12â€ radius neck and 22 medium-jumbo frets promise smooth action even with the most aggressive playing and its custom Double Tapâ„¢ humbucking pickups give the Troublemaker its rowdy-yet-refined voice. Itâ€™s been said that the well-behaved rarely make history. With a martini in one hand and brass knuckles in the other, the Troublemaker Tele Custom is ready to make some beautiful noise.', 'uploads/Parallel-Universe-Vol-II-Troublemaker-Tele-Deluxe.png', 2, 8, 'Cream', 'Mahogany', 22),
(12, 'SG Modern', 2000, 2, 'A New SG For Modern Times', 'The newly refreshed Gibson SG Modern incorporates many contemporary updates that players have embraced and itâ€™s much more than a classic â€œsolid guitarâ€; itâ€™s a hybrid between an SG and a Les Paul. Shaped and scarfed like a classic SG, the body is crafted with a AA maple top and mahogany back, characteristic of a Les Paul. This combination is renowned for its resonance and sustain. The genuine ebony, 24 fret compound radius fingerboard and asymmetrical, slim taper neck allow fast and silky access to the highest frets. A pair of calibrated BurstBucker Pro Alnico V humbuckers deliver fire power and the push-pull controls allows you to switch between the Gibson humbucker and the single coil P90 sounds, both of which have defined so many genres of music across multiple generations since we invented them. Upscale appointments include genuine mother of pearl inlays, Grover Rotomatic tuners, and clear top hat knobs.', 'uploads/sg-modern.png', 1, 2, 'Blueberry Fade', 'Mahogany', 24),
(13, 'EDS-1275 Doubleneck', 6500, 1, 'The Iconic Gibson EDS-1275 &#34;Doubleneck&#34;', 'The Gibson EDS-1275 is an iconic design that has captured the imagination of fans and players for generations. From Gibson Custom with two necks with a total of 18 strings. Light and beautiful sound for all purpose. Impress people with this beauty! The ABR-1 Tune-o-matic bridge was the brainchild of legendary Gibson president Ted McCarty in 1954, setting a standard for simplicity and functionality that has never been bettered. The ABR-1 is slotted directly into the body of the guitar using a separate stud and thumbwheel, providing a firm seating for the strings and allowing players the ability to adjust and fine tune intonation and string height in a matter of minutes. It also yields a great union between the strings and body, which results in excellent vintage tone and sustain. The cherry solid mahogany finish is smooth with a Slim C-Shape neck.', 'uploads/EDS-1275-Doublenec.png', 1, 3, 'Cherry Red', 'Solid Mahogany', 20),
(14, 'ES-335 Figured', 3700, 2, 'The Light And Loaded ES-335', 'The Gibson ES-335 Figured is the perfect blend of form and function. Crafted with a thermally engineered maple centerblock, and thermally engineered quarter-sawn Adirondack spruce bracing, players will be impressed by the lightweight feel and expanded range of tonal capabilities. Equipped with high-end appointments like our hand-wired control assembly with orange drop capacitors, Gibson&#39;s new Calibrated T-Type humbucking pickups, Vintage Deluxe style tuners and light weight Aluminum ABR-1 bridge and stop bar tailpiece anchored with steel thumb-wheels and studs. The AAA figured maple is set off by staggering gloss finishes including Sixties Cherry, Antique Natural, and Iced Tea.', 'uploads/ES-335-Figured.png', 1, 3, 'Sixties Cherry', 'Mahogany', 22),
(15, 'Les Paul Standard &#39;60s', 2500, 2, 'A Whole Lotta Les!', 'The new Les Paul Standard returns to the classic design that made it relevant, played and loved -- shaping sound across generations and genres of music. It pays tribute to Gibson&#39;s Golden Era of innovation and brings authenticity back to life. The Les Paul Standard 60&#39;s has a solid mahogany body with an AA figured maple top, and a slim taper 60&#39;s-style mahogany neck with a rosewood fingerboard and trapezoid inlays. It&#39;s equipped with a classic-style Tune-O-Matic bridge, aluminum stop bar tailpiece, Grover Rotomatic &#34;Kidney&#34; tuners, and gold top hat knobs with silver reflectors. The Burstbucker 61R (neck) Burstbucker 61T (bridge) pickups are loaded with AlNiCo V magnets, audio taper potentiometers and orange drop capacitors.', 'uploads/Les-Paul-Standard-\'60s.png', 1, 1, 'Iced Tea', 'Mahogany', 22),
(16, 'Les Paul Standard &#39;50s', 2500, 1, 'A Classic, Reborn!', 'The new Les Paul Standard returns to the classic design that made it relevant, played and loved -- shaping sound across generations and genres of music. It pays tribute to Gibson&#39;s Golden Era of innovation and brings authenticity back to life. The Les Paul Standard 50&#39;s has a solid mahogany body with a maple top, a rounded 50&#39;s-style mahogany neck with a rosewood fingerboard and trapezoid inlays. It&#39;s equipped with an ABR-1, the classic-style Tune-O-Matic bridge, aluminum stop bar tailpiece, vintage deluxe tuners with keystone buttons, and aged gold tophat knobs. The calibrated Burstbucker 1 (neck) and Burstbucker 2 (bridge) pickups are loaded with AlNiCo II magnets, audio taper potentiometers and orange drop capacitors.', 'uploads/Les-Paul-Standard-\'50s.png', 1, 1, 'Gold Top', 'Mahogany', 22),
(17, '50s J-45 Original', 2700, 1, 'Ebony  A 1950s-inspired J-45', 'The new 50s J-45 Original model flaunts vintage-inspired detailing from the golden era of Gibson. Classic â€œWorkhorseâ€ materials include a Sitka Spruce top and Select Mahogany back and sides. The multi-ply top and single-ply back binding are subtly antiqued making each instrument look just like a seasoned Gibson acoustic. Appointed with cream button tuners, a 50s-era tortoise pick guard, and upgraded with an LR BaggsÂ® VTC pickup for the best and most natural-sounding tone when amplified.', 'uploads/50s-J-45-Original.png', 1, 6, 'Ebony', 'Mahogany', 20),
(18, 'Player Telecaster Left-Handed', 680, 2, 'Real Deal Sound', 'Bold, innovative and rugged, the Player Telecaster LH is pure Fender, through and through. The feel, the style and, most importantly, the soundâ€”theyâ€™re all there, waiting for you to make them whisper or wail for your music. Versatile enough to handle almost anything you can create and durable enough to survive any gig, this workhorse is a trusty sidekick for your musical vision. Alder body with gloss finish, two Player Series single-coil Telecaster pickups, â€œModern C&#34;-shaped neck profile, 9.5&#34;-radius fingerboard and String-through-body bridge with bent-steel saddles. Adding another fret lets you bend the highest D up to an E, giving you access to four octaves of musical possibilities. Designed for authentic Fender toneâ€”with a bit of an edgeâ€”our Player Series pickups keep a foot in the past while looking to the future. This strings-thru-body Telecaster bridge features bent-steel saddles to add a bit of zing to your tone.', 'uploads/PLAYER-TELECASTER-LEFT-HANDED.png', 2, 8, '3-Color Sunburst', 'Alder', 22),
(19, 'Martin 00042EC-Z Eric Clapton Crossroads Guitar', 15700, 1, 'Down To The Crossroads', 'In honor of the Crossroads Guitar Festival, Guitar Center has commissioned a limited run of 50 superbly crafted custom guitars designed by Eric Clapton to benefit the Crossroads Centre in Antigua. This auditorium-sized modelâ€™s back and sides are constructed from truly stunning Ziricote that produces a deep, booming sound with a crisp treble response. A Vintage Tone System (VTS) Sitka spruce top captures the unmistakable tone of a vintage Martin.\r\nThe body, fingerboard and headplate are bound in European flamed maple. The guitar also features herringbone pearl inlay throughout, with Claptonâ€™s signature and Style 42 snowflakes on the fingerboard, the Crossroads Guitar Festival symbol on the bridge, and Martinâ€™s ornate alternate torch design on the headstock. Clapton drew upon the premium features of Martinâ€™s Modern Deluxe series for this model, including stylish gold frets, gold open-gear tuners, a titanium truss rod, LiquidmetalÂ® bridge pins and a composite carbon fiber bridgeplate.', 'uploads/Martin-00042EC-Z-Eric-Clapton-Crossroads-Guitar.png', 3, 5, 'Antique Natural', 'Ziricote', 22),
(20, 'Vintera &#39;60s Telecaster Bigsby', 1009, 1, 'Vintage Style For The Modern Era', 'For players who want the style and sound of Fenderâ€™s classic years, we created the VinteraÂ® â€˜60s TelecasterÂ® Bigsby. Equipped with the coveted features that defined the decadeâ€”including period-accurate neck profile, re-voiced pickups and cool-looking Bigsby tremoloâ€”this guitar has all of the growl and twang that made the Telecaster a legend. We recreated the pair of â€˜60s single-coil Telecaster pickups to sound more like the originals. Twangy and articulate, they have the crisp, snarling tone that put Fender on the map. The thick, fat-shouldered â€œEarly â€˜60s Câ€-shaped neck has a 7.25â€-radius fingerboard with 21 vintage-style frets for classic playing feel. A Bigsby vibrato allows for expressive vibrato effects without compromising the characteristic TeleÂ® twang, while vintage-style tuning machines provide original-era aesthetics, rock-solid performance and tuning stability. Other features include four-bolt neck plate , chrome hardware and vintage-style strap buttons. Includes deluxe gig bag.', 'uploads/VINTERA-\'60S-TELECASTER-BIGSBY.png', 2, 8, '3-Color Sunburst', 'Alder', 21),
(21, 'Chris Shiflett Telecaster Deluxe', 1009, 1, 'Foo-Fighting Tele Deluxe Style', 'Chris Shiflett has his feet firmly planted in two worlds, with impeccable punk/hard rock credentials as longtime guitarist in the Foo Fighters and with an authentic love for country, as heard in Chris Shiflett & the Dead Peasants. His abiding love for the Telecaster guitar and for huge humbucking sound comes together in one kickass instrument with his name on itâ€”the Chris Shiflett Telecaster Deluxe. Modeled on his favorite &#39;72 Tele Deluxe, it&#39;s an especially affordable beauty that rocks hard with authentic Fender tone. This instrument features a fingerboard radius (the amount of curvature across the width of the fingerboard) that, at 12&#34;, is substantially more flattened than both a vintage-style 7.25&#34; radius and a modern 9.5&#34; radius. Feels notably flat even though thereâ€™s still slight curvature, and is great for bending notes without fretting out. Chris Shiflettâ€™s Telecaster Deluxe model features the nicely authentic touch of sealed tuners stamped with the stylized capital &#34;F&#34; from the classic Fender script logo. Chris Shiflettâ€™s signature Tele Deluxe is armed with a powerful pair of specially voiced Chris Shiflett &#34;CS&#34; humbucking pickups with nickel covers.', 'uploads/CHRIS-SHIFLETT-TELECASTER--DELUXE.png', 2, 8, 'Shoreline Gold', 'Alder', 21);

-- --------------------------------------------------------

--
-- Table structure for table `handedness`
--

CREATE TABLE `handedness` (
  `id` int(11) NOT NULL,
  `hand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `handedness`
--

INSERT INTO `handedness` (`id`, `hand`) VALUES
(1, 'Right'),
(2, 'Left');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `role_id`) VALUES
(3, 'Dave', 'Grohl', 'DGrohl@gmail.com', '045653434345', '$2y$10$ZIT1TRR7BzfMiEGppFqHCODFf8KhvbJAk2D8pJNG6llOEMt7e0mue', 2),
(4, 'Noel', 'Gallagher', 'NGallagher@gmail.com', '075353454382', '$2y$10$vt3jw1m1y3KrmbJQGgYCcOjOtZ9y9E2pI3BMfaRCZ2j6S7Lruzeei', 1),
(5, 'Eric', 'Clapton', 'EClapton@gmail.com', '064565445482', '$2y$10$YfDdaIPKfsIfeHog/I97zusclj6WdUKK.eTrJh7vcku4Vwa0TzfcC', 2),
(6, 'Jimi', 'Hendrix', 'JHendrix@gmail.com', '537437345686', '$2y$10$vv8hYlMI29PiUiEl0WE5VeFmK0e4weJBFY5lBO1Ch.CvVOMKmucnK', 1),
(7, 'John', 'Lennon', 'JLennon@gmail.com', '345433453453', '$2y$10$q6rbUpHY3..eQ2LhkSW24u878wADSTNCua3Er1.kGewouz/vWMxq2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guitarbodys`
--
ALTER TABLE `guitarbodys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guitars`
--
ALTER TABLE `guitars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `handedness1` (`handedness`),
  ADD KEY `brand` (`brand`),
  ADD KEY `guitar_body` (`guitar_body`);

--
-- Indexes for table `handedness`
--
ALTER TABLE `handedness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guitarbodys`
--
ALTER TABLE `guitarbodys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guitars`
--
ALTER TABLE `guitars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `handedness`
--
ALTER TABLE `handedness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guitars`
--
ALTER TABLE `guitars`
  ADD CONSTRAINT `guitars_ibfk_1` FOREIGN KEY (`handedness`) REFERENCES `handedness` (`id`),
  ADD CONSTRAINT `guitars_ibfk_2` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `guitars_ibfk_3` FOREIGN KEY (`guitar_body`) REFERENCES `guitarbodys` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
