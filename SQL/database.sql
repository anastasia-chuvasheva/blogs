/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - recranet_task
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`recranet_task` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `recranet_task`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `text` varchar(500) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` varchar(255) DEFAULT NULL,
  `img_extra` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

/*Data for the table `blog` */

insert  into `blog`(`id`,`title`,`subtitle`,`text`,`publish_date`,`img`,`img_extra`,`active`) values 
(1,'Start','We\'re beginning','Kitties frolic in the yard with toy mice and catnip and tuna','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(2,'Second','We\'re continuing','Kitties destroy the curtains in the living room','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(3,'Jump around on couch, meow constantly until given food','Scratch leg; meow for can opener to feed me scream at teh bath','Knock over christmas tree. Furball roll roll roll cat slap dog in face so see brother cat receive pets, attack out of jealousy. Scratch my tummy actually i hate you now fight me meowwww, and pushed the mug off the table sleeps on my head so dream about hunting birds walk on keyboard, but plan steps for world domination. If human is on laptop sit on the keyboard sleep on my human\'s head destroy dog play time intrigued by the shower, and thug cat , kitty run to human with blood on mouth from frenz','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(46,'Touch water with paw','I love cuddles','Jump on counter removed by human jump on counter again removed by human meow before jumping on counter this time to let the human know am coming back howl uncontrollably for no reason so shake treat bag.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(47,'Touch water with paw','I love cuddles','Jump on counter removed by human jump on counter again removed by human meow before jumping on counter this time to let the human know am coming back howl uncontrollably for no reason so shake treat bag.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(48,'Open the door, let me out','Open the door, let me out, let me out','LET ME OUT','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(49,'Lick yarn coming out own butt','Haha you hold me hooman i scratch yowling nonstop','Hiiiiiiiiii feed me now i\'m bored inside, let me out i\'m lonely outside, let me in i can\'t make up my mind whether to go in or out, guess i\'ll just stand partway in and partway out, contemplating the universe for half an hour how dare you nudge me with your foot?!?!','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(50,'Cattt catt cattty cat being a cat relentlessly pursues moth','Scratch leg; meow for can opener to feed me scream at teh bath eat a plant','Meowing non stop for food. Attack the dog then pretend like nothing happened nap all day. Sniff catnip and act crazy be superior love and meowing non stop for food. Meow loudly just to annoy owners spot something, big eyes, big eyes, crouch, shake butt, prepare to pounce cat not kitten around yet cat gets stuck in tree firefighters try to get cat down firefighters get stuck in tree cat eats firefighters\' slippers.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(51,'I love cuddles','Meow in empty rooms making sure that fluff gets into the owner\'s eyes hack up furballs','Sleep pelt around the house and up and down stairs chasing phantoms climb leg. Eat a rug and furry furry hairs everywhere oh no human coming lie on counter don\'t get off counter cough furball, or milk the cow yet when in doubt, wash yet eat my own ears. Brown cats with pink ears fish i must find my red catnip fishy fish.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(52,'Swipe at owner\'s legs','I have secret plans white cat sleeps on a black shirt do i like','Eats owners hair then claws head munch, munch, chomp, chomp but just going to dip my paw in your coffee and do a taste test - oh never mind i forgot i don\'t like coffee - you can have that back now and hack, yet attack feet under the bed. Why can\'t i catch that stupid red dot. With tail in the air love me!','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(53,'Touch my tail, i shred your hand purrrr','Find box a little too small and curl up with fur hanging out purr intently stare at the same spot','Favor packaging over toy. Pee in human\'s bed until he cleans the litter box disappear for four days and return home with an expensive injury; bite the vet cats secretly make all the worlds muffins. Meow for food, then when human fills food dish, take a few bites of food and continue meowing spill litter box, scratch at owner, destroy all furniture, especially couch i is not fat, i is fluffy','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(54,'Sit and stare lick butt and make a weird face','Ccccccccccccaaaaaaaaaaaaaaatttttttttttttttttssssssssssssssss catasstrophe lick human with sandpaper tongue',' Litter box is life munch, munch, chomp, chomp. Mew mew bite plants but in the middle of the night i crawl onto your chest and purr gently to help you sleep for climb a tree, wait for a fireman jump to fireman then scratch his face. Spend six hours per day washing, but still have a crusty butthole just going to dip my paw in your coffee and do a taste test - oh never mind i forgot i don\'t like coffee - you can have that back now yet step on your keyboard while you\'re gaming and then turn in a ci','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(55,'Slap owner\'s face at 5am until human fills food dish','Demand to be let outside at once, and expect owner to wait for me','I see a bird i stare at it i meow at it i do a wiggle come here birdy curl up and sleep on the freshly laundered towels, so slap the dog because cats rule and kitty time am in trouble, roll over, too cute for human to get mad so dead stare with ears cocked but eat the fat cats food. Ignore the human until she needs to get up, then climb on her lap and sprawl friends','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(56,'Refuse to leave cardboard box','Refuse to leave cardboard box suddenly go on wild-eyed crazy rampage','Cuddle no cuddle cuddle love scratch scratch kitty poochy who\'s the baby rub whiskers on bare skin act innocent love blinks and purr purr purr purr yawn but love hiiiiiiiiii feed me now. Damn that dog howl on top of tall thing for meow for food, then when human fills food dish, take a few bites of food and continue meowing and lounge in doorway. Kitty ipsum dolor sit amet, shed everywhere shed everywhere stretching attack your ankles chase the red dot.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(57,'Go crazy with excitement when plates are clanked together','Cat is life give me attention or face the wrath of my claws destroy the blinds','Sit in a box for hours cats are the world hey! you there, with the hands yet nya nya nyan. Claw at curtains stretch and yawn nibble on tuna ignore human bite human hand i will ruin the couch with my claws roll on the floor purring your whiskers off plays league of legends and cat cat moo moo lick ears lick paws yet eat a rug and furry furry hairs everywhere oh no human coming lie on counter don\'t get off counter russian blue. Meeeeouw. I','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(58,'Scoot butt on the rug climb leg','Jump on human and sleep on her all night long','Purr for no reason find empty spot in cupboard and sleep all day scratch leg; meow for can opener to feed me, hide when guests come over russian blue yet trip owner up in kitchen i want food and meow. Pretend not to be evil. Allways wanting food plop down in the middle where everybody walks so i cry and cry and cry unless you pet me, and then maybe i cry just for fun','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(59,'Meow to be let in','I dreamt about fish yum! growl at dogs in my sleep while happily ignoring when being called','Stretch meowzer love and coo around boyfriend who purrs and makes the perfect moonlight eyes so i can purr and swat the glittery gleaming yarn to him (the yarn is from a $125 sweater) chase dog then run away. Chew foot unwrap toilet paper yet run outside as soon as door open if it fits, i sits.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(60,'Has closed eyes but still sees you','Shred all toilet paper and spread around the house adventure always','Claw drapes get scared by doggo also cucumerro . Eat an easter feather as if it were a bird then burp victoriously, but tender meow go back to sleep owner brings food and water tries to pet on head, so scratch get sprayed by water because bad cat cry louder at reflection so proudly present butt to human meow meow mama yet love you, then bite you. Murr i hate humans they are so annoying i want to go outside.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(61,'Eat a feather as if it were a bird then burp victoriously','My slave human didn\'t give me any food so i pooped on the floor','Cough pose purrfectly to show my beauty but white cat sleeps on a black shirt. Kitten is playing with dead mouse meow meow, for where is my slave? I\'m getting hungry allways wanting food or nap all day, for eats owners hair then claws head burrow under covers.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(62,'More napping, more napping all the napping','Refuse to leave cardboard box attempt to leap between furniture','Bring your owner a dead bird floof tum, tickle bum, jellybean footies curly toes for knock dish off table head butt cant eat out of my own dish but do i like standing on litter cuz i sits when i have spaces, my cat buddies have no litter i live in luxury cat life. Bleghbleghvomit my furball really tie the room together jump five feet high and sideways when a shadow moves.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(63,'Chew on cable','Nyaa nyaa rub butt on table bird bird bird bird bird bird human why take bird','Paw your face to wake you up in the morning man running from cops stops to pet cats, goes to jail scratch me now! stop scratching me! and ignore the human until she needs to get up, then climb on her lap and sprawl side-eyes your \"jerk\" other hand while being petted or flop over, so play riveting piece on synthesizer keyboard.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(64,'Lick plastic bags i am the best','Chase laser plop down in the middle where everybody walks','Spend six hours per day washing, but still have a crusty butthole lick butt, and chase laser and the door is opening! how exciting oh, it\'s you, meh. Push your water glass on the floor step on your keyboard while you\'re gaming and then turn in a circle . Cough hairball, eat toilet paper. Get scared by doggo also cucumerro check cat door for ambush 10 times before coming in.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(65,'Throw down all the stuff in the living room','I vomit in the bed in the middle of the night fish i must find my red catnip','Dont wait for the storm to pass, dance in the rain experiences short bursts of poo-phoria after going to the loo for refuse to leave cardboard box but russian blue find a way to fit in tiny box yet demand to have some of whatever the human is cooking, then sniff the offering and walk away what a cat-ass-trophy!','2022-08-14 16:53:39','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(66,'Love blinks and purr purr purr purr yawn hiss','Meow to be let out terrorize the hundred-and-twenty-pound rottweiler and steal his bed','Going to catch the red dot today going to catch the red dot today if human is on laptop sit on the keyboard or find a way to fit in tiny box so drink from the toilet kitten is playing with dead mouse or i rule on my back you rub my tummy i bite you hard attack like a vicious monster. Milk the cow plop down in the middle where everybody walks and shred all toilet paper and spread around the house scratch the furniture so dismember a mouse and then regurgitate parts of it.','2022-08-14 16:41:52','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',0),
(67,'Jump on fridge hide head under blanket so no one can see','If it fits, i sits cereal boxes make for five star accommodation','X. Cough furball into food bowl then scratch owner for a new one mouse i vomit in the bed in the middle of the night yet stuff and things shed everywhere shed everywhere stretching attack your ankles chase the red dot, hairball run catnip eat the grass sniff hiss at vacuum cleaner and meow meow mama.','2022-08-14 16:59:16','cat-avatar-62f8f94f8420e.jpg','Pictures-of-Cute-Cats-1-amolife-62f8f94f84697.jpg',1),
(70,'ddd','eee','kkk','2022-08-14 16:59:08','Pictures-of-Cute-Cats-1-amolife-62f90cc05ee04.jpg','cat-avatar-62f90cc05f2ea.jpg',0);

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_user_FK` (`user_id`),
  KEY `comment_blog_FK` (`blog_id`),
  CONSTRAINT `comment_blog_FK` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`),
  CONSTRAINT `comment_user_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comment` */

insert  into `comment`(`id`,`text`,`user_id`,`blog_id`) values 
(1,'Comment',1,1),
(2,'Comment',2,2),
(3,'Another one',2,1),
(4,'Test',2,1),
(8,'Yass, kitties',1,3),
(9,'Who doesn\'t love kitties?',2,3);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`id`,`name`) values 
(1,'ROLE_ADMIN'),
(2,'ROLE_USER');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `KEY` (`role_id`),
  CONSTRAINT `user_role_FK` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`role_id`,`email`) values 
(1,'User','12345',2,'user_blogs_project@tutanota.com'),
(2,'Admin','98765',1,'info.blog.post.project@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
