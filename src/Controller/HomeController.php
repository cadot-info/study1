<?php

namespace App\Controller;

use DateTime;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use Symfony\UX\Chartjs\Model\Chart;
use App\Repository\VaccinRepository;
use App\Repository\AvanceeRepository;
use App\Repository\ActualiteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ActualiteRepository $actualiteRepository, ChartBuilderInterface $chartBuilder): Response
    {
        //traitement des statistiques des cas de covid dans le monde
        foreach (get_stats() as $key => $item) {
            $jour[] = explode('T', $item->Date)[0];
            $data[] = $item->TotalDeaths;
        }
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => $jour,
            'datasets' => [
                [
                    'label' => 'Nombre de cas Covid-19 dans le monde',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $data,
                ],
            ],
        ]);



        return $this->render('home/index.html.twig', [
            'actus' => $actualiteRepository->findAll(),
            'chart' => $chart,
        ]);
    }
    /**
     * @Route("/vaccins", name="vaccins")
     */
    public function vaccin(VaccinRepository $vaccinRepository): Response
    {
        return $this->render('home/vaccin.html.twig', [
            'vaccins' => $vaccinRepository->findAll(),
        ]);
    }
    /**
     * @Route("/avancees", name="avancees")
     */
    public function avancee(AvanceeRepository $avanceeRepository): Response
    {
        return $this->render('home/avancee.html.twig', [
            'avancees' => $avanceeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/centre", name="centre")
     */
    public function centre(): Response
    {
        return $this->render('home/centre.html.twig', [
            'centres' => json_encode(centre()),
        ]);
    }
    /**
     * @Route("solidaire", name="solidaire", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $inscription = new Inscription();
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();

            return $this->redirectToRoute('solidaire');
        }

        return $this->render('home/solidaire.html.twig', [
            'inscription' => $inscription,
            'form' => $form->createView(),
        ]);
    }
}
function get_stats()
{
    $datephp = new DateTime('now');
    $date = $datephp->format('Y-m-d');  //2020-03-28
    $date_start = date('Y-m-d', strtotime($date . ' - 10 days'));
    $url = 'https://api.covid19api.com/world?from=' . $date_start . 'T00:00:00Z&to=' . $date . 'T00:00:00Z';
    $texte = file_get_contents($url);
    return (json_decode($texte));
}
function centre()
{
    $url = 'https://www.data.gouv.fr/fr/datasets/r/7c0f7980-1804-4382-a2a8-1b4af2e10d32';
    $texte = file_get_contents($url);
    $csv = new \ParseCsv\Csv();
    $csv->auto($texte);
    foreach ($csv->data as $key => $value) {
        $centre[] = ['lat' => $value['latitude'], 'lon' => $value['longitude'], 'rs' => $value['rs'], 'adresse' => $value['adresse']];
    }
    return ($centre);
}
