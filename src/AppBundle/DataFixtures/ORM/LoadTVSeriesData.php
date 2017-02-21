<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TVSeries;

class LoadTVSeriesData extends AbstractFixture implements OrderedFixtureInterface
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
                'The Walking Dead',
                'Frank Darabont - Robert Kirkman',
                new \DateTime('2010-10-31'),
                "Après une épidémie post-apocalyptique ayant transformé la quasi-totalité de la population américaine et mondiale en mort-vivants ou « rôdeurs », un groupe d'hommes et de femmes mené par l'adjoint du shérif du comté de Kings (en Géorgie), Rick Grimes, qui se réveille tout juste d'un coma, tente de survivre…
                    Ensemble, ils vont devoir tant bien que mal faire face à ce nouveau monde devenu méconnaissable, à travers leur périple dans le Sud profond des États-Unis.",
                'the_walking_dead.jpg'
            ],
            [
                'Vikings',
                'Michael Hirst',
                new \DateTime('2013-03-03'),
                "Les exploits d'un groupe de Vikings mené par Ragnar Lothbrok, l'un des vikings les plus populaires de tous les temps au destin semi-légendaire, sont narrés par la série. Ragnar serait d'origine norvégienne et suédoise, selon les sources. Il est supposé avoir unifié les clans vikings en un royaume aux frontières indéterminées à la fin du viiie siècle (le roi Ecbert mentionne avoir vécu à la cour du roi Charlemagne, sacré empereur en l'an 800). Mais il est surtout connu pour avoir été le promoteur des tous premiers raids vikings en terres chrétiennes, saxonnes, franques ou celtiques.
                    Simple fermier, homme lige du jarl Haraldson, il se rebelle contre les choix stratégiques de son suzerain. Au lieu d'attaquer les païens slaves et baltes de la Baltique, il décide de se lancer dans l'attaque des riches terres de l'Ouest, là où les monastères regorgent de trésors qui n'attendent que d'être pillés par des guerriers ambitieux.
                    Clandestinement, Ragnar va monter sa propre expédition et sa réussite changera le destin des Vikings comme celui des royaumes chrétiens du sud, que le simple nom de « Vikings » terrorisera pendant plus de deux siècles.",
                'vikings.jpg'
            ],
            [
                'Black Mirror',
                'Charlie Brooker',
                new \DateTime('2011-12-04'),
                "D’après Charlie Brooker, chaque épisode a un casting différent, un décor différent et une réalité différente, mais ils traitent tous de la façon dont nous vivons maintenant et de la façon dont nous pourrions vivre dans 10 minutes si nous sommes maladroits.",
                'black_mirror.jpg'
            ],
            [
                'Silicon Valley',
                'Mike Judge - John Altschuler - Dave Krinsky',
                new \DateTime('2014-04-06'),
                "La série décrit les aventures de quatre programmeurs vivant ensemble et essayant de percer dans la Silicon Valley, en Californie. Ils travaillent dans un incubateur d'entreprises, le Hacker Hostel, géré par Erlich Bachman (T. J. Miller). L'un d'eux, Richard Hendricks, va créer un algorithme de compression révolutionnaire qui sera très vite convoité par deux milliardaires : Peter Gregory (Christopher Evan Welch) et Gavin Belson (Matt Ross). Richard doit choisir, vendre sa découverte au CEO de Hooli, Gavin Belson, ou bien laisser Peter Gregory investir dans sa future société en échange d'un retour sur les futurs bénéfices. Richard va accepter l'offre de Peter Gregory et fonder sa propre société, Pied Piper. Cette décision va le plonger dans plus d'une situation délicate à gérer pour finaliser son projet.",
                'silicon_valley.jpg'
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
        $tvseries = new TVSeries();
        $tvseries->setName($params[0]);
        $tvseries->setAuthor($params[1]);
        $tvseries->setReleasedAt($params[2]);
        $tvseries->setDescription($params[3]);
        $tvseries->setImage($params[4]);

        $this->manager->persist($tvseries);

        $this->addReference('tvseries-'.$i, $tvseries);
    }

    public function getOrder()
    {
        return 1;
    }
}