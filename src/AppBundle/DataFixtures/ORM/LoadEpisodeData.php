<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TVSeries;
use AppBundle\Entity\Episode;

class LoadEpisodeData extends AbstractFixture implements OrderedFixtureInterface
{

    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->generateEntities();

        $this->manager->flush();
    }

    private function generateEntities()
    {
        $vars = [
            [
                [
                    'Days Gone Bye', 1, new \DateTime('2010-10-31'),
                    "Rick Grimes, shérif, est blessé à la suite d'une course-poursuite. Il se retrouve dans le coma. Cependant, lorsqu'il se réveille dans l'hôpital, il ne découvre que désolation et cadavres. Se rendant vite compte qu'il est seul, il décide d'essayer de retrouver sa femme Lori et son fils Carl. Lorsqu'il arrive chez lui, il s'aperçoit que sa maison est vide et que sa famille a disparu. Puis en ressortant de chez lui, il reçoit un coup sur la tête et tombe inconscient. Rick a en fait été assommé par Duane, le fils de Morgan, un médecin qui l'avait pris pour un zombi. Rick est désorienté lorsque Morgan lui apprend que l'humanité a été décimée par un phénomène étrange qui transforme les humains en errants. Il apprend comment le père et son fils font pour survivre (éviter la lumière et le bruit qui attirent les zombis). Le lendemain, Rick accompagne Morgan et Duane au commissariat pour leur donner des armes afin de se défendre, en prendre pour lui, et les munir, lui et Morgan, de talkie-walkie dans le but de rester en contact. Rick décide de partir pour Atlanta où il est persuadé que son fils et sa femme sont, car Morgan a entendu une rumeur selon laquelle il y aurait un camp de réfugiés. Les trois survivants promettent de se retrouver plus tard. Lorsque Rick se dirige vers la ville, il découvre que les rues sont jonchées de cadavres, mais aussi remplies de rôdeurs. Rick est dépassé, il laisse tomber son sac d'armes au milieu de la rue, et se réfugie dans un tank. C'est alors qu'une voix retentit dans la radio du char.",
                    'the_walking_dead.jpg'
                ],
                [
                    'Guts', 2, new \DateTime('2010-11-07'),
                    "Rick parvient à s'échapper du tank grâce à l'aide de Glenn, dont il avait entendu la voix à la radio. Rick et Glenn se réunissent avec les compagnons de Glenn, un autre groupe de survivants venus pour se ravitailler au supermarché. Cependant, l'arrivée mouvementée de Rick les met tous en péril, l'attention des zombies ayant été attirée sur leur cachette. Assiégé par les zombies, le groupe parvient brièvement à communiquer par radio avec le groupe de Shane et Lori, mais ceux-ci décident qu'ils ne peuvent aider, la présence de Rick ne leur ayant pas encore été communiquée. Dans le petit groupe cloîtré à l'intérieur du supermarché, les tensions s'exacerbent, particulièrement entre T-Dog, un noir et Merle Dixon, un blanc raciste, ce qui conduit Rick à intervenir en menottant Merle à un tuyau sur le toit du magasin. Rick et Glenn planifient leur évasion du magasin toujours assiégé, l'idée est de se couvrir des lambeaux de chair et des boyaux des cadavres pour masquer leur odeur trop reconnaissable afin de pouvoir circuler parmi les zombies et atteindre des camions. Malgré la pluie qui a failli contrarier ce plan, le groupe parvient à s'échapper, dans un fourgon Dodge pour Andrea, Jacquie, T-Dog, Morales et Rick et une voiture pour Glenn. Seul Merle manque à l'appel après que T-Dog a accidentellement perdu la clé dans une canalisation, laissant Merle attaché au tuyau. Seule précaution : la porte d'accès au toit a été cadenassée pour préserver autant que possible Merle des zombies…",
                    'the_walking_dead.jpg'
                ],
                [
                    'Tell It to the Frogs', 3, new \DateTime('2010-11-14'),
                    "De retour au camp avec le groupe de survivants du supermarché, Rick retrouve enfin et avec beaucoup d'émotion sa femme Lori et son fils Carl. Andrea quant à elle, rejoint sa jeune sœur Amy. Mais très vite, malgré l'intrusion d'un zombie près du camp, Rick décide, contre l'avis de Shane, de retourner à Atlanta chercher Merle Dixon ainsi que son sac d'armes abandonné en route et récupérer au passage le talkie-walkie laissé dans le sac et ainsi prévenir Morgan de ne pas se rendre dans le piège d'Atlanta. Il est accompagné de Daryl Dixon, le frère de Merle, plus jeune mais tout aussi violent, ainsi que Glenn qui connaît bien les lieux et T-Dog qui se sent redevable. Lori prévient Shane de rester à distance de sa famille maintenant que Rick est de retour, car Shane lui avait dit que Rick était mort à l'hôpital. Les tensions s'exacerbent au camp entre une femme, Carol et son mari violent, Ed. Andrea intervient pour prendre la défense de Carol avant qu'une bagarre éclate, au cours de laquelle Shane donne libre cours à sa colère. Il frappe Ed jusqu'à presque le tuer, ce qui effraie plusieurs témoins de la scène. L'équipe de rescousse parvient à Atlanta mais une fois arrivée sur le toit, elle découvre que Merle a utilisé une scie pour se couper la main et se libérer des menottes. Il a visiblement perdu beaucoup de sang mais reste introuvable…",
                    'the_walking_dead.jpg'
                ],
                [
                    'Vatos', 4, new \DateTime('2010-11-21'),
                    "En cherchant Merle, le groupe essaie aussi, par la même occasion, de retrouver le sac d'armes mais un autre groupe de survivants, également en quête des armes, les attaque. Le groupe parvient à capturer un attaquant blessé, Miguelito, mais les autres assaillants s'enfuient en voiture en emmenant Glenn comme otage. Après l'interrogatoire de leur otage, Rick et ses camarades apprennent le lieu de la cachette de leurs opposants et espèrent procéder à un échange de prisonniers. Le deuxième groupe dirigé par leur chef Guillermo, alias « G », refuse, exigeant le sac d'armes en plus du prisonnier. Le bain de sang est évité grâce à l'arrivée d'une personne âgée (la grand-mère d'un des hispaniques) qui met fin à la confrontation. Rick Grimes et ses compagnons se rendent compte que l'image belliqueuse que leurs hôtes se donnent n'est qu'une façade : ce « gang » est en fait constitué d'anciens employés d'un pensionnat reculé de personnes âgées encore occupé par les pensionnaires, ainsi que de membres de leurs familles, qui se cachent et tentent de se protéger des attaques de rôdeurs. Rick leur laisse quelques armes pour leur défense et chaque groupe repart de son côté, au complet. Au moment de reprendre le fourgon, ils découvrent que Merle l'a volé et est sans doute parti dans l'idée de se venger des survivants encore restés au camp. Pendant ce temps, le camp est attaqué par surprise par un groupe, nombreux, de rôdeurs. Plusieurs membres sont tués, dont Amy, la jeune sœur d'Andrea et Ed, le mari de Carol. Le groupe de Rick arrive au camp juste à temps pour éliminer les derniers rôdeurs et sauver le reste du groupe. Avant ça, un des membres du groupe, Jim, avait fait un rêve où il creusait des trous dans la terre mais à son réveil il ne se souvient plus pourquoi il creusait. Au moment de l'attaque, il s'en est souvenu : c'était pour enterrer les morts du groupe.",
                    'the_walking_dead.jpg'
                ],
                [
                    'Wildfire', 5, new \DateTime('2010-11-28'),
                    "Les cadavres sont enterrés, ceux des rôdeurs brûlés, mais Andrea protège le corps d'Amy jusqu'à son réveil en rôdeur , pour finir par l'achever. Dale, la voyant totalement bouleversée, tente en vain de la réconforter. Jim, un des survivants, révèle qu'il a été mordu par un rôdeur durant l'attaque et les membres du groupe décident de l'amener au Centre pour le contrôle et la prévention des maladies, dans l'espoir d'y trouver un vaccin. Mais ce projet est une source de conflit entre Shane et Rick, Shane étant persuadé que le CDC sera une impasse. Une seule famille, les Morales, se sépare du groupe, décidant de retourner dans leur famille à Birmingham, Alabama et les membres restants partent pour le CDC. Mais durant le trajet, l'état de Jim empire et celui-ci demande aux autres de le laisser mourir seul dans la forêt. Le groupe arrive ensuite à l'immeuble du CDC, dans lequel un scientifique, Edwin Jenner, s'est enfermé pour poursuivre des tests sur le virus des zombis. Il vient juste de perdre son seul échantillon de test du virus et annonce à la caméra qui le surveille (mais y a-t-il encore quelqu'un de l'autre côté ?) qu'il envisage de se suicider. Au moment où le groupe se prépare à partir, croyant l'immeuble vide, Rick remarque qu'une caméra bouge et il supplie qu'on le laisse entrer avec son groupe. Les portes s'ouvrent alors à la stupéfaction du groupe de survivants.",
                    'the_walking_dead.jpg'
                ],
                [
                    'TS-19', 6, new \DateTime('2010-12-05'),
                    "Edwin Jenner accueille les survivants au CDC. Le petit groupe profite d'un repos provisoire. Andrea reste dans un état dépressif et Dale tente vainement de la réconforter. Après un repas et une nuit de repos, Jenner leur explique ce qu'il sait de la situation en leur montrant la vidéo de l'évolution du Sujet-Test 19. À la fin de la video, les survivants remarquent un compte à rebours, Jenner leur explique que c'est le temps restant avant l'extinction du groupe électrogène. Les survivants apprennent qu'à la fin de ce délai, tout le CDC sera détruit. La tension monte alors entre ceux qui veulent rester pour mourir et ceux qui veulent tenter leur chance dans le monde extérieur, infesté de morts-vivants. Finalement Jacquie reste avec Jenner, le reste du groupe parvenant, de justesse, à sortir du bâtiment, afin de se mettre en route vers une destination inconnue.",
                    'the_walking_dead.jpg'
                ]
            ],
            [
                [
                    'Rites of Passage', 1, new \DateTime('2013-03-03'),
                    "Ragnar Lothbrok et son frère Rollo participent à une bataille contre les peuples Baltes. Après le massacre, Ragnar a des visions du dieu Odin et ses Valkyries. De retour dans son village, Ragnar se rend, en compagnie de son fils Bjorn, à Kattegat pour assister au Thing et afin que ce dernier subisse son rite de passage vers l'âge adulte. Restée à la ferme familiale, la femme de Ragnar, Lagertha, met en fuite deux vagabonds qui tentent de la violer. A Kattegat, Ragnar convainc Rollo que les raids vers l'ouest sont plus prometteurs en termes de butin que les attaques traditionnelles contre les populations Baltes. Il affirme qu'il est capable de trouver son cap en pleine mer grâce à un instrument qu'il s'est procuré auprès d'un voyageur, un compas de navigation. Il est cependant réprimandé et menacé par son chef de clan, le Jarl Haraldson, qui ne croit pas à la présence de terres à l'ouest et souhaite poursuivre ses raids vers l'est. Bjorn et Ragnar rendent visite à Floki, un charpentier de marine visionnaire, qui, grâce au soutien financier de son ami Ragnar, a secrètement entrepris la construction d'un nouveau type de navire, plus adapté à la navigation en haute mer : un drakkar. Les premiers tests en mer sont très prometteurs. Tandis que Ragnar recrute des hommes, son frère Rollo fait des avances importunes à Lagertha. Le navire étant fin près, Ragnar met le cap à l'ouest, vers l'inconnu, tandis que le Jarl Haraldson, mis au courant par un traître, commence à tirer vengeance de ceux qui ont aidé Ragnar à monter son expédition.",
                    'vikings.jpg'
                ],
                [
                    'Wrath of the Northmen', 2, new \DateTime('2013-03-10'),
                    "A bord de leur drakkar, Ragnar, Rollo, Floki et les guerriers vikings qui les accompagnent affrontent les eaux déchainées de la mer de Nord, cap à l'ouest. Ragnar est obligé de tuer l'un de ses hommes, qui remettait en cause son autorité en doutant de l'existence d'une terre au bout de l'horizon. Mais des mouettes signalent finalement la proximité d'une côte : c'est le nord-est de l'Angleterre, qui porte à cette époque le nom de royaume de Northumbrie. Les vikings abordent à proximité du monastère de Lindisfarne, qui abrite une petite communauté de moines chrétiens. Ils pillent les lieux et massacrent les moines, n'en conservant qu'une poignée en vie, qui seront emmenés comme esclaves. Rollo et Ragnar s'affrontent à propos d'un des moines, le frère Athelstan, qui parle la langue des vikings et que Ragnar souhaite conserver en vie. Chargé d'esclaves et de butin, le drakkar prend le chemin du retour vers Kattegat.",
                    'vikings.jpg'
                ],
                [
                    'Dispossessed', 3, new \DateTime('2013-03-17'),
                    "De retour à Kattegat après leur raid triomphal, Ragnar et ses hommes se voient confisquer leur butin par le Jarl Haraldson. Chaque homme conserve le droit de choisir une pièce de butin, et une seule : Ragnar choisit de prendre Athelstan, le jeune moine qu'il a ramené de Lindisfarne. La foi chrétienne et le vœu de chasteté de son nouvel esclave rendent Ragnar perplexe, mais Athelstan lui fournit de précieux renseignements sur le royaume de Northumbrie, grâce auxquels le Jarl Haraldson autorise un nouveau raid sur l'Angleterre. Maintenant accompagné par son épouse-guerrière, Lagertha, et d'un émissaire du Jarl du nom de Knut, Ragnar rembarque en toute hâte, laissant à Athelstan la responsabilité de sa ferme et de ses enfants. Quand les Vikings mettent à nouveau le pied sur le sol anglais, ils sont accueillis par le shérif local et une poignée d'hommes d'armes, qui invitent les étrangers nouvellement arrivés à la rencontre du roi Aelle. Ragnar est d'accord, mais la méfiance de ses autres guerriers incite à une bataille, dans laquelle les Northumbriens sont battus...",
                    'vikings.jpg'
                ],
                [
                    'Trial', 4, new \DateTime('2013-03-24'),
                    "Les Vikings pillent un village nommé Northumbrian pendant que les villageois sont rassemblés pour la messe. Il n'y a que peu de morts parmi les anglais, mais Lagertha tue Knut alors qu'il tentait de la violer. De retour sur la plage, les pillards sont contraints à se battre contre une force supérieure en nombre, envoyé par le roi Aelle, pour les empêcher de remonter sur le bateau. Ils parviennent à les défaire et reviennent à Kattegat. Là, le Jarl Haraldson accueille Ragnar, qui affirme avoir tué Knut à la place de sa femme. Il est alors arrêté et jugé à la \"Thing\". Le stratagème du comte de soudoyer Rollo et de témoigner contre Ragnar échoue, et ce dernier est finalement acquitté. Les Raideurs célèbrent alors leur victoire à la ferme avec Athelstan et les enfants de Ragnar, quand ils sont soudainement agressés par des hommes armés. Bien que les partisans de Ragnar les repoussent, son compagnon Erik est tué...",
                    'vikings.jpg'
                ],
                [
                    'Raid', 5, new \DateTime('2013-03-31'),
                    "Le Jarl Haraldson lance un assaut contre Ragnar et ses partisans, tuant tous ceux qu'ils croisent. Ragnar, Lagertha, Athelstan et les enfants échappent de justesse avec un bateau, mais Ragnar est grièvement blessé. Il est sauvé de la noyade par Athelstan. La famille se réfugie dans la maison de Floki, où le charpentier et sa femme Helga soignent Ragnar qui recouvre alors progressivement ses forces. Pendant ce temps, le Jarl Haraldson marie sa fille Thyri à un riche et vieux seigneur venant de Suède, ceci contre la volonté de sa femme Siggy. Rollo offre ses services à Haraldson, afin de l'aider à retrouver les fugitifs. Le Comte feint d'accepter. Siggy, qui a eu connaissance du complot du Jarl contre Rollo, tente de prévenir ce dernier mais arrive trop tard : Haraldson a déjà capturé Rollo et le torture dans une tentative infructueuse de découvrir le sort de Ragnar. Torstein, un vieil ami de Ragnar, apprend à celui-ci ce qui arrive a son frère. Ragnar envoie alors Floki en audience devant le Comte. Il obtient audience et propose un combat à mort entre Ragnar et le Jarl, que le Jarl accepte...",
                    'vikings.jpg'
                ],
                [
                    'Burial of the Dead', 6, new \DateTime('2013-04-07'),
                    "Le Jarl Haraldson accepte le défi de Ragnar, et les deux se rencontrent dans un combat singulier. Ragnar finit par tuer Haraldson, Rollo tue alors Svein, et Siggy tue alors son beau-fils. Après que Ragnar est acclamé comme jarl, il accorde à son ancien ennemi des funérailles dignes. Athelstan est révolté de voir un esclave accepter de suivre son maître dans la mort. L'hiver suivant, Lagertha est de nouveau enceinte, Athelstan apprend l'histoire viking de Ragnarök, et Siggy accepte la protection de Rollo et sa proposition d'épouser un comte (lui-même). Alors que le printemps approche, trois navires de Ragnar remontent la rivière Tyne. Après avoir jeté Wigea dans une fosse aux serpents, le roi Aelle se prépare à affronter les Raideurs dans une bataille...",
                    'vikings.jpg'
                ],
                [
                    'A King\'s Ransom', 7, new \DateTime('2013-04-14'),
                    "Constatant le retour de Ragnar en Northumbrie, le roi Ælle décide de l'attaquer en mettant son frère aux commandes de son armée. Attaquant de nuit et par surprise, Ragnar parvient à capturer le frère du roi Aelle et le monnaye, ainsi que son départ contre une rançon de 2.000 livres d'or et d'argent. Il prouve sa bonne volonté en faisant baptiser son frère Rollo au Christianisme. Ragnar est trompé par le roi Aelle qui l'attaque au moment de la remise de la rançon. Ragnar Lothbrock tue alors son otage et envoie sa dépouille au roi Aelle, qui décide finalement de payer la rançon... mais une fois les drakkars repartis il jure de se venger de Ragnar. Lagertha fait une fausse couche, et perd donc le bébé.",
                    'vikings.jpg'
                ],
                [
                    'Sacrifice', 8, new \DateTime('2013-04-21'),
                    "Le pèlerinage traditionnel d'Uppsalla pour remercier les dieux apporte un torrent d'émotions pour Ragnar, Lagertha et Athelstan. Ragnar, poussant plus loin son amour pour sa femme, s'y rend pour faire la paix avec la mort de son fils à naître. Lagertha, qui n'est toujours pas remise de sa fausse couche, veut savoir si les Dieux lui accorderont d'autres fils dans le futur. Alors que les Vikings viennent ensemble pour donner un sacrifice et remercier leurs dieux, Athelstan découvre à quel point sa croyance chrétienne est encore présente en lui...",
                    'vikings.jpg'
                ],
                [
                    'All Change', 9, new \DateTime('2013-04-28'),
                    "Sur l'ordre du roi Horik, Ragnar rassemble une petite troupe pour se rendre à Gotaland (actuelle Suède) pour résoudre un conflit sur les terres avec le chef de cette zone, le Jarl Borg. La renommée de Ragnar le précède et le Jarl Borg est intrigué : a-t-il trouvé un nouvel allié ou Ragnar est-il juste une marionnette du roi Horik. Pendant ce temps à Kattegat, la peste frappe le village. Les habitants s'en remettent alors à Lagertha pour aider à apaiser les dieux…",
                    'vikings.jpg'
                ]
            ],
            [
                [
                    'The National Anthem', 1, new \DateTime('2011-12-04'),
                    "Le Premier ministre du Royaume-Uni, Michael Callow, est confronté à un énorme et choquant dilemme lorsque la princesse Susannah, un membre bien-aimé de la famille royale britannique, est kidnappée : la jeune fille ne s'en sortira indemne que si le Premier ministre a des rapports sexuels avec un porc et que leur relation passe en direct et sans trucages, avant 16 h, sur tous les médias nationaux.",
                    'black_mirror.jpg'
                ],
                [
                    '15 Million Merits', 2, new \DateTime('2011-12-11'),
                    "Bing Madsen vit dans un monde où les écrans sont omniprésents. Comme tous ses congénères, il passe ses journées à pédaler sur un vélo d'appartement pour accumuler de l'argent (des Merits en version originale). Un jour, il rencontre Abi Carner, une jeune chanteuse au talent bien réel. Mais tous deux sont confrontés aux règles implacables de cet univers confiné lorsqu'ils tentent de concrétiser leurs rêves en participant à Hot Shot, une émission censée dénicher les talents de demain (à l'instar de The X Factor ou de la Nouvelle Star).",
                    'black_mirror.jpg'
                ],
                [
                    '15 Million Merits', 3, new \DateTime('2011-12-18'),
                    "Liam Foxwell, un jeune avocat à la recherche d'un emploi, se prend à douter de la fidélité de sa femme. Comme presque tout le monde, il a une puce implantée derrière l'oreille qui lui permet de stocker ses souvenirs et de les rediffuser quand bon lui semble. Il utilise donc les images en sa possession pour enquêter sur ce supposé adultère et confronter les deux amants.",
                    'black_mirror.jpg'
                ],
            ],
            [
                [
                    'Minimum Viable Product', 1, new \DateTime('2014-04-06'),
                    "Richard Hendricks is a low-level programmer with futuristic internet giant Hooli. He is often taunted by his more successful work colleagues, and his ideas are dismissed by egotistical entrepreneur Erlich Bachman, who owns the technology development incubator where Richard lives with fellow programmers Nelson \"Big Head\", Gilfoyle and Dinesh. However when Hooli stumbles upon the music copyright service that Richard is working on, entitled Pied Piper, they discover that hidden within the useless application is the best file compression algorithm in the world, and news spreads quickly. Eventually Richard is caught between a $10 million buyout by Hooli CEO Gavin Belson, and a $200,000 investment from eccentric billionaire Peter Gregory, and must decide whether to give up his program to the highest bidder or to take the investment and create a business out of it himself. After having a panic attack and vomiting on the street, Richard runs into Peter's assistant Monica, who tells him that she believes in him and his idea, and he decides to take the investment and run the business himself.",
                    'silicon_valley.jpg'
                ],
                [
                    'The Cap Table', 2, new \DateTime('2014-04-13'),
                    "After rejecting Belson's offer and siding with Peter Gregory, Richard is overwhelmed by the amount of work that needs to be done in establishing the business to Gregory's satisfaction. Luckily, Belson's former PA, Jared Dunn, arrives at the incubator, begging Richard to hire him, as he sees huge potential in the Pied Piper idea, and is hired due to his business expertise. However, in evaluating the Pied Piper team, Jared discovers that while Gilfoyle and Dinesh are brilliant coders, Big Head is comparatively mediocre, and Richard is pressured by everyone to fire him as he brings nothing to the table. Richard refuses to do so, but Big Head decides to take a huge raise and promotion at Hooli instead, where work begins on reverse-engineering Pied Piper to create the same product, branded under a different name.",
                    'silicon_valley.jpg'
                ],
                [
                    'The Cap Table', 3, new \DateTime('2014-04-20'),
                    "Richard and Jared discover that the Pied Piper business name is already in use by an irrigation enterprise in Gilroy, California. While Jared, Dinesh, Gilfoyle and Erlich begin brainstorming new names for the application, Richard attempts to prove that he is a good negotiator by convincing the irrigation company to give up the name Pied Piper. Meanwhile, Peter Gregory becomes obsessed with Burger King products, leaving his assistant Monica in a difficult position with some of their clients.",
                    'silicon_valley.jpg'
                ],
            ]
        ];

        $i = 0;
        foreach($vars as $v) {
            $this->newEntity($v, $i);
            $i++;
        }
    }

    private function newEntity($params, $i)
    {
        foreach($params as $p) {
            $episode = new Episode();
            $episode->setName($p[0]);
            $episode->setEpisodeNumber($p[1]);
            $episode->setDatePublished($p[2]);
            $episode->setDescription($p[3]);
            $episode->setImage($p[4]);
            $episode->setTVSeries($this->getReference('tvseries-'.$i));

            $this->manager->persist($episode);
        }
    }

    public function getOrder()
    {
        return 2;
    }
}