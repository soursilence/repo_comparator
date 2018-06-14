<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\{Comparison, Repo};
use App\Form\ComparisonType;
use App\Utils\RepoHelper;

class ComparatorController extends Controller {

    /**
     * @Route("/", name="comparator")
     */
    public function index(Request $request) {

        $comparison = new Comparison();
        $repo1 = new Repo();
        $repo2 = new Repo();
        
        $form = $this->createForm(ComparisonType::class, $comparison);
        $form->handleRequest($request);
        
         if($form->isSubmitted() && $form->isValid()){
              RepoHelper::callApi($comparison->getUrl1(), $repo1);
              RepoHelper::callApi($comparison->getUrl2(), $repo2);
         }

        return $this->render('comparator/index.html.twig', [
            'form' => $form->createView(),
                    'repo1' => $repo1,
                    'repo2' => $repo2,
        ]);
    }

}
