<?php

namespace App\DataFixtures;

use App\Entity\Actualite;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('superadmin');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'test'));
        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setUsername('admin');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'test'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $actualite = new Actualite();
        $actualite->setTitre('Ouverture de 38 vaccinodromes gérés par les sapeurs-pompiers');
        $actualite->setTexte('<div class="field-item even first last">Afin d’accompagner la montée en puissance de la campagne de vaccination, <strong>38 vaccinodromes gérés par les sapeurs-pompiers vont être ouverts dans les prochains jours</strong>, a annoncé le ministre de l\'Intérieur Gérald Darmanin.<br>
<br>
Depuis le début de <a href="https://www.gouvernement.fr/info-coronavirus" target="_blank" title="Lien vers notre dossier sur la Covid-19 (nouvelle fenêtre)" data-smarttag-click="{&quot;name&quot;: &quot;https//www.gouvernement.fr/info-coronavirus&quot;, &quot;type&quot;: &quot;navigation&quot;,&quot;chapter1&quot;:&quot;ouverture_de_38_vaccinodromes_geres_par_les_sapeurs_pompiers&quot;}" class="atClass">la crise sanitaire</a>, les sapeurs-pompiers et l\'ensemble des acteurs de la Sécurité civile sont pleinement mobilisés aux côtés du personnel soignant.<br>
<br>
Dans le prolongement des missions qu’ils réalisent au quotidien, ils prendront toute leur part au déploiement de <a href="https://www.gouvernement.fr/les-personnes-eligibles-a-la-vaccination-contre-la-covid-19" target="_blank" title="Lien vers la page vaccin (nouvelle fenêtre)" data-smarttag-click="{&quot;name&quot;: &quot;https//www.gouvernement.fr/les-personnes-eligibles-a-la-vaccination-contre-la-covid-19&quot;, &quot;type&quot;: &quot;navigation&quot;,&quot;chapter1&quot;:&quot;ouverture_de_38_vaccinodromes_geres_par_les_sapeurs_pompiers&quot;}" class="atClass">la campagne de vaccination</a>.
<h2>Ouverts 7j/7</h2>
Ainsi, dans les tous prochains jours, 38 vaccinodromes seront mis en place sur l’ensemble du territoire. <strong>Ouverts 7j/7</strong>, ces centres de grande capacité seront armés par les sapeurs-pompiers avec notamment le concours des associations agréées de sécurité civile.<br>
<br>
Plus de <strong>140 centres de vaccination modulaires et mobiles complèteront le dispositif</strong> afin de répondre à des besoins spécifiques.<br>
<br>
25 000 sapeurs-pompiers formés à la vaccination et 2 500 sapeurs-pompiers en charge de la logistique assureront l’administration et la gestion de ces vaccinodromes dans lesquels jusqu’à 530 000 vaccinations pourront être faites chaque semaine, soit une moyenne de 2 000 chaque jour par vaccinodrome. Cette capacité tiendra compte et s’adaptera aux volumes de vaccins disponibles.<br>
<br>
Les préfets de département pilotent sur leurs territoires ces dispositifs avec l’ensemble des partenaires engagés dans la campagne de vaccination. Les modalités de fonctionnement de ces structures seront définies par les préfets en fonction des besoins identifiés de chaque département.
<div class="rf-link-advanced external">
<h4 class="rf-link-advanced__title">Le point sur les vaccins</h4>

<div class="rf-link-advanced__link">
<div class="rf-link-advanced__link--title">gouvernement.fr</div>
<a class="rf-link-advanced__link--href atClass" href="https://www.gouvernement.fr/info-coronavirus/vaccins" target="_blank" data-smarttag-click="{&quot;name&quot;: &quot;https//www.gouvernement.fr/info-coronavirus/vaccins&quot;, &quot;type&quot;: &quot;navigation&quot;,&quot;chapter1&quot;:&quot;ouverture_de_38_vaccinodromes_geres_par_les_sapeurs_pompiers&quot;}"><span class="hidden">Le point sur les vaccins</span></a></div>
</div>
</div>');
        $actualite->setUrlImage('https://www.gouvernement.fr/sites/default/files/styles/rf-ministre/public/contenu/image/2021/03/pompiers2_0.png?itok=L1DrxuTo');
        $actualite->setAlt('caserne de pompiers');
        $manager->persist($actualite);
        $manager->flush();

        $actualite = new Actualite();
        $actualite->setTitre('Covid-19 : « Dedans avec les miens, dehors en citoyen »');
        $actualite->setTexte('<h2>Dedans avec les miens</h2>

<ul>
	<li style="text-align:justify">Je respecte scrupuleusement les mesures sanitaires ;</li>
	<li style="text-align:justify">Je privilégie au maximum le télétravail, sauf impossibilité ;</li>
	<li style="text-align:justify">J’aère mon logement toutes les heures ;</li>
	<li style="text-align:justify">Je ne reçois pas de personnes extérieures à mon foyer à l’exception des aides à domicile et service à la personne ;</li>
	<li style="text-align:justify">Je reste chez moi après 19h.</li>
</ul>


<h2><b>Dehors</b><b> en citoyen</b></h2>

<ul>
	<li style="text-align:justify">Je porte le masque et je respecte les distances ;</li>
	<li style="text-align:justify">Je ne me rends pas chez les autres ;</li>
	<li style="text-align:justify">Je peux sortir jusqu’à 19h pour :
	<ul style="list-style-type:circle">
		<li style="text-align:justify">accompagner mes enfants à l’école ;</li>
		<li style="text-align:justify">travailler muni d’une attestation ;</li>
		<li style="text-align:justify">me promener ;</li>
		<li style="text-align:justify">faire des courses ;</li>
		<li style="text-align:justify">sortir mon animal de compagnie ;</li>
		<li style="text-align:justify">aller chez le médecin.</li>
	</ul>
	</li>
	<li style="text-align:justify">Je peux sortir après 19h pour mon travail ou une urgence muni d’une attestation ;</li>
	<li style="text-align:justify">Je me munis d’une attestation justifiant le motif de mon déplacement, audelà de 10 kilomètres ;</li>
	<li style="text-align:justify">Je peux retrouver des amis, mais à 6 maximum et en respectant les mesures barrières ;</li>
	<li style="text-align:justify">Je déjeune seul ou avec des personnes de mon foyer ;</li>
	<li style="text-align:justify">Je ne me déplace pas en dehors de ma région ou de mon département sauf motif impérieux ou professionnel, justifié par une attestation.</li>
</ul>

');
        $actualite->setUrlImage('https://www.gouvernement.fr/sites/default/files/styles/rf-ministre/public/contenu/image/2021/03/pictos_anti-covid_copie.jpg?itok=Qcg4JU_o');
        $actualite->setAlt('plaquette d\information');
        $manager->persist($actualite);
        $manager->flush();

        $actualite = new Actualite();
        $actualite->setTitre('Les conseils d’un psychologue aux jeunes fragilisés par la Covid-19');
        $actualite->setTexte('<h2>Comment savoir si j’ai besoin d’aide ?</h2>

<p>« Il faut commencer à se poser des questions pour savoir si on a besoin d’aide <strong>à partir du moment où l’on n’arrive plus à accomplir les mêmes tâches que d’habitude</strong>. Si nos émotions commencent à trop prendre le pas. Tout ce qui va nous empêcher de vivre comme on a l’habitude de vivre, d’atteindre les objectifs que nous nous sommes fixés, en général, cela peut être un bon signe.</p>

<p>L’autre chose est de se poser la question : <strong>suis-je en train de me renfermer sur moi-même ou pas ?</strong> Pour le savoir, il est très important de discuter avec ses proches, car ils savent si on a changé quelque chose dans notre fonctionnement.&nbsp;»<br>
<br>
<u>Le psychologue Jérémie Gallen répond, en vidéo, à vos questions sur la santé mentale en période de crise Covid-19 :</u><br>
<br>
</p>
<h2>Quels sont les signes avant-coureurs qui doivent m’alerter ?</h2>

<p>« Les signes que l’on peut repérer sont :</p>

<ul>
	<li><strong>les troubles somatiques</strong> : des crises d’angoisses, des troubles du sommeil, une perte d’appétit ou au contraire un appétit qui augmente ;</li>
	<li><strong>une augmentation des addictions</strong> ;</li>
	<li><strong>des tremblements, des troubles de la mémoire.</strong></li>
</ul>

<p>Ces différents signes peuvent conduire à demander l’aide d’un médecin pour faire le point, pour savoir si c’est normal ou si c’est juste passager.&nbsp;»</p>

<h4 class="rf-link-advanced__title">Découvrir Santé Psy Étudiants</h4>


<h2>Est-ce normal de se sentir en détresse psychologique ?</h2>

<p>« Que ce soit des dépressions, des crises d’angoisse ou même des pensées obsédantes, soit toutes ces choses qui mettent les individus en difficultés sur le plan psychologique, <strong>il faut toujours se rappeler que ce n’est que passager</strong>.</p>

<p>À l’heure actuelle, il est assez normal de se sentir en détresse psychologique puisqu’on est dans <strong>une situation extraordinaire</strong>, exceptionnelle : <strong>tout ce qu’on avait mis en place, normalement, pour être stable sur le plan psychologique, aujourd’hui, cette stabilité est rompue</strong>.</p>

<p>Cela crée des stress, des <strong>difficultés d’appréhension de l’avenir</strong>, et cela, le psychisme humain n’aime pas trop.&nbsp;»</p>



');
        $actualite->setUrlImage('https://www.gouvernement.fr/sites/default/files/styles/rf-ministre/public/contenu/image/2021/03/conseils_psy_jeunes_anti_covid_19_divan.jpg?itok=34GrVRHA');
        $actualite->setAlt('jeune assise sur un canpé sur un ordinateur');
        $manager->persist($actualite);
        $manager->flush();
    }
}
