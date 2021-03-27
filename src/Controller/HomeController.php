<?php

namespace App\Controller;

use DateTime;
use Symfony\UX\Chartjs\Model\Chart;
use App\Repository\ActualiteRepository;
use App\Repository\AvanceeRepository;
use App\Repository\VaccinRepository;
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
            'menu' => 'index'
        ]);
    }
    /**
     * @Route("/vaccins", name="vaccins")
     */
    public function vaccin(VaccinRepository $vaccinRepository): Response
    {
        return $this->render('home/vaccin.html.twig', [
            'vaccins' => $vaccinRepository->findAll(),
            'menu' => 'vaccin'
        ]);
    }
    /**
     * @Route("/avancees", name="avancees")
     */
    public function avancee(AvanceeRepository $avanceeRepository): Response
    {
        return $this->render('home/avancee.html.twig', [
            'avancees' => $avanceeRepository->findAll(),
            'menu' => 'avancee'
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
