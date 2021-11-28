<?php

namespace App\Controller;

use App\Repository\OperationRepository;
use App\Repository\UserRepository;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{   

    /**
    * @var UserRepository
    */
    protected UserRepository $userRepository;
    /**
     * @var OperationRepository
     */
    protected OperationRepository $opRepository;

    public function __construct(
        UserRepository $userRepository,OperationRepository $opRepository)
    {
        $this->userRepository = $userRepository;
        $this->opRepository=$opRepository;
    }
    /**
     * @Route("/home", name="home")
     */
    public function index(TransactionRepository $transripo): Response
    {
        $transactions=$transripo->countByDate();
        $transa=$transripo->countTransaction();
       

        
        $mins= [];
        $transnbr= [];
        foreach($transactions as $transaction){
            $mins[]=$transaction['min'];
            $transnbr[] =$transaction['nbr'];
        }

        /*on va rechercher le nombre de chaque type de transaction*/ 
        
       $types= [];
        $nbr= [];
        foreach($transa as $transaction){
            $types[]=$transaction['type'];
            $nbr[] =$transaction['nbr'];
        }
        return $this->render('home/index.html.twig', [
            'mins'=>json_encode($mins),
            'transnbr'=>json_encode($transnbr),
            'types'=>json_encode($types),
            'nbr'=>json_encode($nbr),
            'countUser' => $this->userRepository->countAllUser(),
            'countop' =>$this->opRepository->countAllOperation()
        ]);
    }
    /**
     * @Route("/statistic", name="statistic")
     */
    public function stat()
    {
       


        return $this->render('home/index.html.twig',[
            
        ]);
    }

}
