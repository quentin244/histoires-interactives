DROP TABLE IF EXISTS `histoire`;
CREATE TABLE `histoire` (
  `Id` int(11) AUTO_INCREMENT,
  `Titre` varchar(255),
  PRIMARY KEY (`Id`)
);

DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `Id` int(11),
  `Histoire` int(11),
  `Image` varchar(255),
  `Texte` Text,
  `Fin` tinyint(1),
  PRIMARY KEY (`Id`,`Histoire`),
  FOREIGN KEY (`Histoire`) REFERENCES `histoire` (`Id`)
);

DROP TABLE IF EXISTS `choix`;
CREATE TABLE `choix` (
  `Id_Choix` int(11) NOT NULL,
  `IdPageProposition` int(11) NOT NULL,
  `IdPagePropose` int(11) NOT NULL,
  `TextProposition` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id_Choix`),
  FOREIGN KEY (`IdPageProposition`) REFERENCES `page` (`Id`),
  FOREIGN KEY (`IdPagePropose`) REFERENCES `page` (`Id`)
);

CREATE TABLE `utilisateurs` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  PRIMARY KEY (`Email`)
);

CREATE TABLE `avancement` (
  `EmailUtilisateur` varchar(255) NOT NULL REFERENCES `utilisateurs` (`Email`),
  `IdHistoire` int(11) NOT NULL REFERENCES `histoire` (`Id`),
  `IdPage` int(11) DEFAULT NULL REFERENCES `page` (`Id`),
  PRIMARY KEY (`EmailUtilisateur`,`IdHistoire`)
) 

INSERT INTO `histoire` (`Id`, `Titre`) VALUES
(1, 'Mad_Maxi-Jack'),
(2, 'Histoire2');

INSERT INTO `page` (`Id`, `Histoire`, `Image`, `Texte`, `Fin`) VALUES
(0, 1, 'img/0.png', 'Maxi-Jack coule des jours heureux une fois de plus, mais une soudaine intuition le pousse à penser qu\'il ne profitera pas de ces moments bénis trop longtemps.', 0),
(1, 1, 'img/1.png', 'Car, suite à une négligence humaine, la planète subit des dommages irréversibles au niveau écologique et en terme d\'organisation de la société également.', 0),
(2, 1, 'img/2.png', 'Bref go Mad Maxi-Jack ! Bats-toi pour ta survie !', 0),
(3, 1, 'img/3.png', 'Bon, vous vous doutez du topo... Grands espaces dévastés, bandes de psychopathes lourdement armés tyrannisant de pauvres villageois, créatures mutantes et tout le tintouin. Tout cela associé à une toute nouvelle charte graphique.', 0),
(4, 1, 'img/4.png', 'Il est à noter que la peau de Maxi-Jack s\'est légèrement teintée de rose. Cela est dû à l\'explosion nucléaire dont l\'épicentre était située à 500 mètres de lui.\r\n', 0),
(5, 1, 'img/5.png', 'Bon, Mad Maxi-Jack a la dalle, il n\'a rien bouffé depuis trois semaines. Que faire ?', 0),
(6, 1, 'img/6.png', 'Cette boue semble succulente. Mad Maxi la consomme et est immédiatement rassasié.', 0),
(7, 1, 'img/7.png', 'Quelle aubaine ! Il y en a pour des semaines de provisions !', 0),
(8, 1, 'img/8.png', 'Que faire de ce trésor ?', 0),
(9, 1, 'img/9.png', 'Qui renierait à rogner l\'écorce d\'un arbre radioactif après un jeûne forcé de trois semaines ? Certainement pas notre héros pour qui la survie est désormais élevée au rang d\'art de vivre.', 0),
(10, 1, 'img/10.png', 'En ces temps troublés rien ne se perd... Après avoir rogné l\'arbre Mad Maxi-Jack se rend compte qu\'il pourrait tirer avantage de la situation en se taillant un arc et des flèches avec les restes de l\'arbre.', 0),
(11, 1, 'img/11.png', 'Ceci fait, il part en quête d\'un gibier...', 0),
(12, 1, 'img/12.png', 'Mouais... Mad Maxi fouille ses poches, mais bon évidemment y\'a que dalle.', 0),
(13, 1, 'img/13.png', 'Là c\'est chaud, il a vraiment la dalle... Quatre semaines sans bouffer.', 0),
(14, 1, 'img/14.png', 'Au bout de cinq semaines, c\'est un vrai squelette sur pattes, il a abandonné son équipement qu\'il n\'avait plus la force de porter. C\'est alors qu\'il perçoit un campement. Que faire ?', 0),
(15, 1, 'img/15.png', 'A quoi bon se faire chier à trimballer de la bouffe quand on a déjà tout sur place ? En ces temps troublés la logique et la survie se sont fondues en un seul et même concept.', 0),
(16, 1, 'img/16.png', 'Mad Maxi installe donc son campement à côté de cette source de nourriture.', 0),
(17, 1, 'img/17.png', 'Mais un groupe de Punks désoeuvrés le repère et lui fait la peau. Dans un monde post-apocalyptique les sédentaires sont des proies faciles Mad Maxi-Jack, tu l\'a appris à tes dépends. Mais tu es mort, tu ne pourras donc pas mettre en pratique le fruit de cet apprentissage.', 1),
(18, 1, 'img/18.png', 'Mad Maxi-Jack dispose d\'un petit sac en peau de rat qu\'il rempli de cette boue nutritive, puis il avance dièrement vers sa destinée.', 0),
(19, 1, 'img/19.png', 'Il se trouve rapidement face à un trou de ver des sables géant. Plusieurs possibilités s\'offrent à lui.', 0),
(20, 1, 'img/20.png', NULL, 0),
(21, 1, 'img/21.png', 'Cette boue évoque à Mad Maxi-Jack de lointains souvenirs liés à sa mère et aux premiers instants des cellules aquatiques dont il est issu.', 0),
(22, 1, 'img/22.png', 'Il se l\'étale donc sur le corps en émettant un râle bovin.', 0),
(23, 1, 'img/23.png', 'Une meute de scorpion apparaît mais Max Maxi-Jack est camouflé par la boue. Il va attendre que ces dangereuses bestioles passent leur chemin. Mais que fera-t-il ensuite ?', 0),
(24, 1, 'img/24.png', 'L\'arc bandé au maximum de ses possibilités, les muscles saillants, l’œil aux aguets, Mad Maxi-Jack ajuste sa cible... Les chances de survie du mustélidé sont à cet instant évaluées à 0,7%.', 0),
(25, 1, 'img/25.png', 'Mais la flèche rate sa cible. Le rat est allé chercher de l\'aide auprès de son supérieur hiérarchique... Les choses se compliquent.', 0),
(26, 1, 'img/26.png', 'Un combat s\'enage...', 0),
(27, 1, 'img/27.png', 'Un vieillard en difficulté se tient au milieu du chemin. Une proie facile qui transporte peut-être quelques objets de valeur, se dit Mad Maxi-Jack.', 0),
(28, 1, 'img/28.png', 'En s\'approchant, Mad Maxi s\'étonne de la posture statique du vieil homme. Arrivé auprès de lui, il découvre avec stupeur qu\'il s\'agit d\'un simple leurre en carton.', 0),
(29, 1, 'img/29.png', 'Une lourde pierre l\'atteint au crâne... Il s\'écroule. Il est ensuite emasculé et enterré jusqu\'au cou dans une carrière de sel par des mutants. Que faire ?', 0),
(30, 1, 'img/30.png', 'Mad Maxi-Jack suit les traces du véhicule. Mais au bout d\'un moment, il se rend compte qu\'il s\'enfonce dans des sables mouvants.', 0),
(31, 1, 'img/31.png', 'Au prix d\'efforts surhumains, il s\'extirpe du bourbier, mais il a perdu son arc et ses flèches et avalé du sable. Il s\'aperçoit bien vite que cette boue stagnante lui a refourgué lui a refourgué la dysenterie.', 0),
(32, 1, 'img/32.png', 'Mad Maxi-Jack en chie, c\'est le cas de le dire... Affaibli et démoralisé, il aperçoit un campement vers lequel mènent les traces de véhicule.', 0),
(33, 1, 'img/33.png', 'Mad Maxi-Jack n\'est plus que l\'ombre de lui-même, notre héros intrépide doit maintenant pour assurer sa survie, fureter autour d\'un campement de gros nazes pour trouver quelques hypothétiques aliments et médocs, tout en évitant soigneusement les punks en meilleur condition physique que lui.', 0),
(34, 1, 'img/34.png', 'La nuit, il se cache à l\'écart, mais ne pouvant allumer de feu sous peine d\'être découvert, et les nuits étant particulièrement glaciales, il tombe malade gravement et meurt comme une merde sans combattre.', 0),
(35, 1, 'img/35.png', 'Les punks découvrent sa dépouille qui leur sert de trophée de guerre. Triste fin.', 1),
(36, 1, 'img/36.png', 'Mettant ses angoisses et son ego de côté, notre héros se dirige vers un garde du campement afin d\'expliquer sa situation et de plaider sa cause.', 0),
(37, 1, 'img/37.png', 'Il est immédiatement jeté dans un cachot... En fait un trou dans la sol, couvert d\'une tôle. L\'après-midi risque d\'être chaud si il reste là-dedans.', 0),
(38, 1, 'img/38.png', 'Du bruit, on arrive ! Le garde à sans doute prévenu son supérieur... Qu\'allez-vous lui proposer ?', 0),
(39, 1, '', 'The End', 1),
(0, 2, '', 'Bonjour Bienvenu dans l\'histoire', 1);


INSERT INTO `choix` (`Id_Choix`, `IdPageProposition`, `IdPagePropose`, `TextProposition`) VALUES
(1, 5, 6, 'Manger l\'espèce de boue jaune devant'),
(2, 5, 9, 'Rogner l\'écorce de l\'arbre'),
(3, 5, 12, 'Fouiller ses poches'),
(4, 8, 15, 'Installer son campement à proximité'),
(5, 8, 18, 'Remplir son sac avec et tracer sa route'),
(6, 8, 21, 'Se l\'étaler sur le corps dans un spasme régressif'),
(7, 11, 24, 'Ho ! Un rat !'),
(8, 11, 27, 'Ho ! Un être humain plus affaibli que lui !'),
(9, 11, 30, 'Hé ! Des traces de véhicules !'),
(10, 14, 33, 'Rester éloigné, il n\'a plus la force de se défendre, autant chercher quelques restes autour du campement'),
(11, 14, 36, 'Il n\'a plus rien à perdre, il y va !'),
(12, 20, 39, 'Fuir ! On ne badine pas avec ces créatures !'),
(13, 20, 39, 'Appâter l\'animal avec de la boue'),
(14, 23, 39, 'Il attaque une bestiole affaiblie du troupeau'),
(15, 23, 39, 'Il creuse un trou et fait un somme'),
(16, 23, 39, 'Il trace sa route'),
(17, 26, 39, 'Flèche à bout portant'),
(18, 26, 39, 'Châtrer avec les dents'),
(19, 26, 39, 'Sable dans les yeux'),
(20, 29, 39, 'Attendre'),
(21, 29, 39, 'Attenre un peu moins et faire un truc de fou !'),
(22, 32, 33, 'Notre héros n\'a pas perdu ses réflexes de survie élémentaire, il reste éloigné et cherche des restes de riz et de smecta à proximité'),
(23, 32, 36, 'Rien à perdre, il rentre dans le camp'),
(24, 38, 39, 'Entretenir les véhicules et les armes contre un peu de nourriture et d\'eau');

INSERT INTO `utilisateurs` (`Nom`, `Prenom`, `Email`, `Mdp`, `Telephone`) VALUES
('Joubert', 'Quentin', 'quentin.joubert28@gmail.com', 'QUENTIN123', 695047346);

INSERT INTO `avancement` (`EmailUtilisateur`, `IdHistoire`, `IdPage`) VALUES
('quentin.joubert28@gmail.com', 1, 1);