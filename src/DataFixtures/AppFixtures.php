<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Vaccin;
use App\Entity\Actualite;
use App\Entity\Avancee;
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
                $user->setNomprenom('Dany durand');
                $manager->persist($user);
                $manager->flush();

                $user = new User();
                $user->setUsername('admin');
                $user->setPassword($this->passwordEncoder->encodePassword($user, 'test'));
                $user->setNomprenom('Dupond durand');
                $user->setRoles(['ROLE_ADMIN']);
                $manager->persist($user);
                $manager->flush();

                $actualite = new Actualite();
                $actualite->setTitre('Ouverture de 38 vaccinodromes gérés par les sapeurs-pompiers');
                $actualite->setAccroche('Afin d\’accompagner la montée en puissance de la campagne de vaccination, <strong>38 vaccinodromes gérés par les sapeurs-pompiers vont être ouverts dans les prochains jours</strong>, a annoncé le ministre de l\'Intérieur Gérald Darmanin.<br>
<br>
Depuis le début de <a href="https://www.gouvernement.fr/info-coronavirus" target="_blank" title="Lien vers notre dossier sur la Covid-19 (nouvelle fenêtre)" data-smarttag-click="{&quot;name&quot;: &quot;https//www.gouvernement.fr/info-coronavirus&quot;, &quot;type&quot;: &quot;navigation&quot;,&quot;chapter1&quot;:&quot;ouverture_de_38_vaccinodromes_geres_par_les_sapeurs_pompiers&quot;}" class="atClass">la crise sanitaire</a>, les sapeurs-pompiers et l\'ensemble des acteurs de la Sécurité civile sont pleinement mobilisés aux côtés du personnel soignant.<br>
');
                $actualite->setTexte('Dans le prolongement des missions qu’ils réalisent au quotidien, ils prendront toute leur part au déploiement de <a href="https://www.gouvernement.fr/les-personnes-eligibles-a-la-vaccination-contre-la-covid-19" target="_blank" title="Lien vers la page vaccin (nouvelle fenêtre)" data-smarttag-click="{&quot;name&quot;: &quot;https//www.gouvernement.fr/les-personnes-eligibles-a-la-vaccination-contre-la-covid-19&quot;, &quot;type&quot;: &quot;navigation&quot;,&quot;chapter1&quot;:&quot;ouverture_de_38_vaccinodromes_geres_par_les_sapeurs_pompiers&quot;}" class="atClass">la campagne de vaccination</a>.
<h2>Ouverts 7j/7</h2>
Ainsi, dans les tous prochains jours, 38 vaccinodromes seront mis en place sur l’ensemble du territoire. <strong>Ouverts 7j/7</strong>, ces centres de grande capacité seront armés par les sapeurs-pompiers avec notamment le concours des associations agréées de sécurité civile.<br>
<br>
Plus de <strong>140 centres de vaccination modulaires et mobiles complèteront le dispositif</strong> afin de répondre à des besoins spécifiques.<br>
<br>
25 000 sapeurs-pompiers formés à la vaccination et 2 500 sapeurs-pompiers en charge de la logistique assureront l’administration et la gestion de ces vaccinodromes dans lesquels jusqu’à 530 000 vaccinations pourront être faites chaque semaine, soit une moyenne de 2 000 chaque jour par vaccinodrome. Cette capacité tiendra compte et s’adaptera aux volumes de vaccins disponibles.<br>
<br>
Les préfets de département pilotent sur leurs territoires ces dispositifs avec l’ensemble des partenaires engagés dans la campagne de vaccination. Les modalités de fonctionnement de ces structures seront définies par les préfets en fonction des besoins identifiés de chaque département.');

                $actualite->setUrlImage('https://www.gouvernement.fr/sites/default/files/styles/rf-ministre/public/contenu/image/2021/03/pompiers2_0.png?itok=L1DrxuTo');
                $actualite->setAlt('caserne de pompiers');
                $manager->persist($actualite);
                $manager->flush();

                $actualite = new Actualite();
                $actualite->setTitre('Covid-19 : « Dedans avec les miens, dehors en citoyen »');
                $actualite->setAccroche('<h2>Dedans avec les miens</h2>

<ul>
	<li style="text-align:justify">Je respecte scrupuleusement les mesures sanitaires ;</li>
	<li style="text-align:justify">Je privilégie au maximum le télétravail, sauf impossibilité ;</li>
	<li style="text-align:justify">J’aère mon logement toutes les heures ;</li>
	<li style="text-align:justify">Je ne reçois pas de personnes extérieures à mon foyer à l’exception des aides à domicile et service à la personne ;</li>
	<li style="text-align:justify">Je reste chez moi après 19h.</li>
</ul>
');
                $actualite->setTexte('
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
                $actualite->setAccroche('<h2>Comment savoir si j’ai besoin d’aide ?</h2>

<p>« Il faut commencer à se poser des questions pour savoir si on a besoin d’aide <strong>à partir du moment où l’on n’arrive plus à accomplir les mêmes tâches que d’habitude</strong>. Si nos émotions commencent à trop prendre le pas. Tout ce qui va nous empêcher de vivre comme on a l’habitude de vivre, d’atteindre les objectifs que nous nous sommes fixés, en général, cela peut être un bon signe.</p>

');
                $actualite->setTexte('
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


                $vaccin = new Vaccin();
                $vaccin->setTitre('Supports d’information pour les publics et les professionnels concernés par la vaccination');
                $vaccin->setTexte('
                <img alt="image homme qui vis" src="https://solidarites-sante.gouv.fr/local/adapt-img/1024/10x/IMG/png/home_page_vis_pro.png?1609442841" class="img-fluid">
   <p>Premier site institutionnel sur la vaccination destiné au grand public, <a href="http://vaccination-info-service.fr/" class="spip_out external" rel="external noopener noreferrer" target="_blank" title="Vaccination-info-service (nouvelle fenêtre)">Vaccination-info-service</a> apporte des informations factuelles, pratiques et actualisées sur la vaccination et les maladies infectieuses concernées. <a href="http://vaccination-info-service.fr/" class="spip_out external" rel="external noopener noreferrer" target="_blank" title="Vaccination-info-service (nouvelle fenêtre)">Vaccination-info-service</a> répond aux questions les plus courantes sur la vaccination et les vaccins en France.</p>
<p>Entre autres thèmes abordés&nbsp;:</p>
<ul class="spip"><li> A quoi servent les vaccins&nbsp;?</li><li> Contrôle de qualité et de sécurité des vaccins</li><li> Quels vaccins dois-je faire&nbsp;?</li><li> Questions pratiques&nbsp;:
<ul class="spip"><li> Qui peut vacciner&nbsp;?</li><li> Où se faire vacciner&nbsp;?</li><li> Que faire si mon bébé est vacciner le jour de la vaccination&nbsp;?</li><li> Comment se déroule l’administration d’un vaccin&nbsp;? etc.</li></ul></li></ul>
<p>En 2018, il s’est enrichi d’un espace spécialement conçu pour les professionnels de santé, acteurs de la vaccination (médecins, pharmaciens, sages-femmes, infirmiers). Cet <a href="https://professionnels.vaccination-info-service.fr/" class="spip_out external" rel="external noopener noreferrer" target="_blank" title="«&nbsp;Espace Pro&nbsp;» (nouvelle fenêtre)">«&nbsp;Espace Pro&nbsp;»</a>, réalisé avec des experts indépendants, a pour objectifs d’informer et d’accompagner les professionnels dans leur pratique à travers 7 rubriques&nbsp;: les aspects scientifiques, pratiques, sociologiques, réglementaires et juridiques de la vaccination ainsi que les informations sur les vaccins et les recommandations vaccinales générales et spécifiques. L’Espace Pro de vaccination-info-service fournit également aux professionnels des ressources pour les aider à répondre aux questions de leurs patients.</p>
<dl class="spip_document_362848 spip_documents spip_documents_center">
<dt>

');
                $manager->persist($vaccin);
                $manager->flush();

                $vaccin = new Vaccin();
                $vaccin->setTitre('Vaccination');
                $vaccin->setTexte('
<div>
<p><img alt="image de vaccination" src=\'https://solidarites-sante.gouv.fr/IMG/jpg/vaccinationpt.jpg?1450344690\' class="img-fluid"</p>

<p><strong>La vaccination est un moyen de pr&eacute;vention efficace pour lutter contre de nombreuses maladies infectieuses. Se vacciner, c&rsquo;est se prot&eacute;ger. En provoquant une r&eacute;ponse immunitaire sp&eacute;cifique, le vaccin &eacute;vite une &eacute;ventuelle contamination future. Se vacciner, c&rsquo;est aussi prot&eacute;ger les autres et en particulier les plus fragiles. La vaccination permet de combattre et d&rsquo;&eacute;liminer des maladies infectieuses potentiellement mortelles&nbsp;: on estime que plus de 2 &agrave; 3 millions de d&eacute;c&egrave;s par an dans le monde sont &eacute;vit&eacute;s gr&acirc;ce &agrave; elle</strong>.</p>

<h3>La politique vaccinale</h3>

<p>La politique vaccinale men&eacute;e par le Minist&egrave;re des Solidarit&eacute;s et de la Sant&eacute; a pour objet de d&eacute;finir la meilleure utilisation possible des vaccins pour prot&eacute;ger une population et les moyens &agrave; mettre en oeuvre pour y parvenir. Cette politique s&rsquo;int&egrave;gre dans la lutte contre les maladies infectieuses et doit s&rsquo;adapter &agrave; l&rsquo;&eacute;volution de leur &eacute;pid&eacute;miologie&nbsp;; elle doit aussi tenir compte des connaissances m&eacute;dicales et scientifiques, des recommandations internationales (notamment de l&rsquo;Organisation mondiale de la sant&eacute; &ndash; OMS), des progr&egrave;s technologiques en mati&egrave;re de vaccins ainsi que de l&rsquo;&eacute;volution sociale qui conduit &agrave; des exigences croissantes d&rsquo;information sur les vaccins et sur leur s&eacute;curit&eacute;, tant de la part du public que des professionnels de sant&eacute;.</p>

<h3>L&rsquo;extension de l&rsquo;obligation vaccinale</h3>

<p>Aujourd&rsquo;hui, si la France a des taux de couverture vaccinale meilleurs que les autres pays pour les vaccins obligatoires, ils sont en revanche tr&egrave;s insuffisants pour la plupart des vaccins recommand&eacute;s.<br />
Cette couverture vaccinale insuffisante, &agrave; l&rsquo;origine d&rsquo;&eacute;pid&eacute;mies, a conduit &agrave; la r&eacute;&eacute;mergence de certaines maladies et engendr&eacute; des hospitalisations et des d&eacute;c&egrave;s &eacute;vitables. Ces maladies transmissibles sont, en outre, particuli&egrave;rement dangereuses pour les enfants et les personnes plus les fragiles.<br />
Pour endiguer ce ph&eacute;nom&egrave;ne, Agn&egrave;s Buzyn, ministre des solidarit&eacute;s et de la sant&eacute; va proposer au Parlement de rendre obligatoires 8 vaccins suppl&eacute;mentaires jusqu&rsquo;alors recommand&eacute;s pour la petite enfance, en compl&eacute;ment des 3 vaccins actuellement obligatoires.</p>

<ul>
	<li><a class="spip_in" href="prevention-en-sante/preserver-sa-sante/vaccination/vaccins-obligatoires/">En savoir plus</a></li>
</ul>



');
                $manager->persist($vaccin);
                $manager->flush();

                $avancee = new Avancee();
                $avancee->settitre('Stratégie vaccinale');
                $avancee->setTexte('
                <img alt="image du vaccin" src="https://cdn-europe1.lanmedia.fr/var/europe1/storage/images/europe1/sante/coronavirus-quel-calendrier-pour-la-vaccination-en-france-4007115/56331453-1-fre-FR/Coronavirus-quel-calendrier-pour-la-vaccination-en-France.jpg" class="img-fluid" style="height:100px;">
		<p>La stratégie vaccinale mise en place doit nous permettre de remplir <strong>trois objectifs de santé publique</strong>&nbsp;:</p>
<ol class="spip"><li> <strong>Faire baisser la mortalité et les formes graves</strong> de la maladie</li><li> <strong>Protéger les soignants et le système de soins</strong></li><li> <strong>Garantir la sécurité des vaccins</strong> et de la vaccination</li></ol>
<p>Elle repose sur trois principes&nbsp;:
<ul>
<li>Non obligatoire</strong>
<li>Gratuité</strong>
<li>Haute sécurité</strong></p>
</ul>


');
                $manager->persist($avancee);
                $manager->flush();


                $avancee = new Avancee();
                $avancee->settitre('Une priorisation des publics');
                $avancee->setTexte('  <img alt="image de vaccination "src="https://static.actu.fr/uploads/2020/12/vaccin-anti-covid-stockage-hopitaux-hauts-france-lille-arras.jpg" class="img-fluid" style="height:100px;">
<p><strong>L’âge de la personne est le facteur de risque de développer une forme grave de Covid-19 le plus important</strong>, la Haute autorité de santé a donc recommandé de prioriser les populations cibles vaccinales en fonction de différentes classes d’âge et selon les facteurs d’exposition au virus (ex&nbsp;: vie en collectivité, professionnels du secteur de la santé…). <br class="autobr">
Par ailleurs, <strong>à tranche d’âge égale</strong>, les personnes souffrant de comorbidités associées à un risque de développer une forme grave de Covid-19 doivent être vaccinées en premier.</p>
<p><strong>Pour rappel</strong>, les vaccins disponibles à cette date n’ont pas d’autorisation de mise sur le marché (AMM) pour les personnes de moins de 18 ans (Moderna et AstraZeneca) ou pour les personnes de moins de 16 ans (Pfizer-BioNtech).</p>
<p><strong class="caractencadre2-spip spip">Les personnes concernées par la vaccination sont les suivantes&nbsp;:</strong></p>
<p><li>L’ensemble des <strong>personnes de 70 ans et plus</strong> quel que soit leur lieu de vie&nbsp;;</p>
<p><li>Les <strong>résidents en établissements d’hébergement pour personnes âgées</strong> dépendantes et unités de soins de longue durée ou hébergées en résidences autonomie et résidences services&nbsp;;</p>
');
                $manager->persist($avancee);
                $manager->flush();


                $avancee = new Avancee();
                $avancee->settitre('Les personnes vulnérables à très haut risque');

                $avancee->setTexte('
                <img alt="vaccin en bouteille" src="https://cdn.radiofrance.fr/s3/cruiser-production/2021/01/f7bfe6fb-0d83-48f5-a290-6b107f3f1dcc/838_vaccine.jpg" class="img-fluid" style="height:100px;">
                <p> Il s’agit des personnes adultes&nbsp;:</p>
<ul class="spip"><li> atteintes de cancers et de maladies hématologiques malignes en cours de traitement par chimiothérapie,</li><li> atteintes de maladies rénales chroniques sévères, dont les patients dialysés,</li><li> transplantées d’organes solides,</li><li> transplantées par allogreffe de cellules souches hématopoïétiques,</li><li> atteintes de poly-pathologies chroniques et présentant au moins deux insuffisances d’organes,</li><li> atteintes de certaines maladies rares et particulièrement à risque en cas d’infection (<a href="IMG/pdf/liste_maladies_rares_cosv_fmr-2.pdf" class="spip_in blank spip_doc pdf" type="application/pdf" target="_blank" rel="blank" title="voir la liste (nouvelle fenêtre)"><u>voir la liste</u></a>),</li><li> atteintes de trisomie 21.</li></ul>
<p><li>Les <strong>personnes en situation de handicap</strong>, quel que soit leur âge, <strong>hébergées</strong> en maisons d’accueil spécialisées (MAS) et foyers d’accueil médicalisés (FAM)&nbsp;;</p>
<p><li>Les <strong>personnes de 50 à 69 ans inclus souffrant d’une ou plusieurs des comorbidités</strong> <a href="grands-dossiers/vaccin-covid-19/article/la-strategie-vaccinale-et-la-liste-des-publics-prioritaires#liste-comor" class="spip_in"><u>voir liste plus bas</u></a>&nbsp;;</p>
<p><li>Les <strong>résidents de 60 ans et plus dans les foyers de travailleurs migrants</strong> (FTM)&nbsp;;</p>
<p><li>Les <strong>professionnels du secteur de la santé et du secteur médico-social</strong> appartenant aux catégories suivantes&nbsp;:</p>
');
                $manager->persist($avancee);
                $manager->flush();
        }
}
