-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.17-log - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Export de données de la table lokisalle.avis : ~0 rows (environ)
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;

-- Export de données de la table lokisalle.commande : ~0 rows (environ)
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Export de données de la table lokisalle.detail_commande : ~0 rows (environ)
/*!40000 ALTER TABLE `detail_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_commande` ENABLE KEYS */;

-- Export de données de la table lokisalle.membre : ~7 rows (environ)
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
	(9, 'yoyo', '$2y$10$qahiASjX0svyOrA2btsRXuTE4', 'Arres', 'Yoann', 'yoyo@yopmail.com', 'm', 'Paris', '75000', '10 rue de Rivoli', 0),
	(10, 'azer', '$2y$10$MN.LXNhqOWsMpz1yVYQrPe4o6', 'Arres', 'yoann', 'azer@azer.fr', 'm', 'Tazerzr', '564464', '10 rue de l&#39;ouest', 0),
	(21, 'yoannyo', '$2y$10$j5bafr9uWY7jLOi9bwEqyuWgnFsAJ8qhvawfeeKExSM54ZZG7XqI.', 'Arres', 'Yoann', 'yoyo2@yopmail.com', 'm', 'Caen', '75003', '193 bis avenu de lhotel de ville', 1),
	(23, 'yoannyo2', '$2y$10$4jtQjl3..q9xKvjjEYtv2esNBtqBaMEC.VuDeKgE7hxVCfkWKl54K', 'Arres', 'Yoann', 'yoyo3@yopmail.com', 'm', 'Caen', '75003', '193 bis avenu de lhotel de ville', 0),
	(24, 'sdfgsdfger', '$2y$10$mCuS/gdrIqZz8pNdUFSNgei3Jt9RJrK1rRQSv09Jsix7rER4p2/2m', 'Szerset', 'Tzeez', 'st@azer.fr', 'm', 'Toulouse', '75003', '10 rue de l&#39;hôtel de ville', 0),
	(25, 'dromadaire', '$2y$10$Sh4OBTB84xVeGj7bNoQ1T.8iJNOCZBtAl41s6q47h5TKSsYWJtQjG', 'Rambo', 'John', 'john@texas.us', 'm', 'Houston', '547545', '42 Bourbon street', 0),
	(27, 'dromadair', '$2y$10$MEHNt5i458fPiHaaHGCN3On9DLU6ZRo3bQDPoRfTLzu7DcJl/pJjW', 'Rambo', 'John', 'johny@texas.us', 'm', 'Houston', '547545', '42 Bourbon street', 0);
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Export de données de la table lokisalle.newsletter : ~0 rows (environ)
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;

-- Export de données de la table lokisalle.produit : ~2 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`id_produit`, `date_arrivee`, `date_depart`, `id_salle`, `id_promo`, `prix`, `etat`) VALUES
	(6, '2015-05-14 19:29:01', '2015-05-22 19:29:07', 5, 1, 500, 0),
	(7, '2015-05-13 20:13:31', '2015-05-22 20:13:33', 10, 1, 218, 0);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Export de données de la table lokisalle.promotion : ~2 rows (environ)
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` (`id_promo`, `code_promo`, `reduction`) VALUES
	(1, '21234', 10),
	(2, '32542', 12);
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;

-- Export de données de la table lokisalle.salle : ~6 rows (environ)
/*!40000 ALTER TABLE `salle` DISABLE KEYS */;
INSERT INTO `salle` (`id_salle`, `pays`, `ville`, `adresse`, `cp`, `titre`, `description`, `photo`, `capacite`, `categorie`) VALUES
	(5, 'France', 'Paris', '15 rue de la Paix', '75009', 'Une super salle', 'Une super salle à deux pas de l&#39;Opéra et accessible facilement par un bus depuis Orly.', 'rideaux.jpg', 212, 'reunion'),
	(7, 'France', 'Paris', '10 rue Auber', '75009', 'Une super salle 8', 'Une salle très confortable pour un espace dynamique.', '', 12442, 'reunion'),
	(9, 'France', 'Paris', '78 avenue des Champs Elysées', '75016', 'Une super salle 5', 'Une salle de dimension réduite pour les réunion d&#39;affaire de moins de 10 personnes.', 'rideaux.jpg', 10, 'reunion'),
	(10, 'France', 'Lyon', '33 Quai Arloing', '69009', 'Quai 33', 'Centre d&#39;affaires et de business development\r\nimplanté à Lyon Vaise', 'rideaux.jpg', 250, 'reunion'),
	(11, 'France', 'Paris', '1/13 Quai de Grenelle', '75015', 'Espace de réunion', 'L&#39;espace de réunion parfait', 'brucenauman_0.jpg', 250, 'reunion'),
	(13, 'France', 'Paris', '15 rue de Saintonge', '75003', 'Petite salle du Marais', 'Une salle pour vos réunion en petit comité', '', 12, 'reunion');
/*!40000 ALTER TABLE `salle` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
