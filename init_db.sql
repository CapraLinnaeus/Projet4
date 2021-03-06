SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de données : `blogecrivain`
--

-- --------------------------------------------------------
-- Structure de la table `chapitres`

CREATE TABLE `chapitres` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `datepublication` date NOT NULL,
  `datemodification` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- Structure de la table `comment`

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `datepublication` date NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `idchapitre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- Structure de la table `infogener`

CREATE TABLE `infogener` (
  `info` varchar(20) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
-- Structure de la table `user`

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `user` (`id`, `identifiant`, `mdp`, `email`) VALUES
(1, 'j.forteroche', 'ecrivain123', NULL);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;