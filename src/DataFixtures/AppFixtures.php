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
    }
}
