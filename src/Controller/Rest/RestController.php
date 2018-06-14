<?php

namespace App\Controller\Rest;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Repo;
use App\Utils\RepoHelper;

/**
 * Rest controller.
 *
 * @Route("/")
 */
class RestController extends Controller {

    /**
     * Return comparsion of two repos.
     * @FOSRest\Get("/")
     *
     * @return array
     */
    public function index(Request $request) {

        $repo1 = new Repo();
        $repo2 = new Repo();

        if ($request->get('r1') && $request->get('r2')) {
            RepoHelper::callApi($request->get('r1'), $repo1);
            RepoHelper::callApi($request->get('r2'), $repo2);
            if ($repo1->getName() && $repo2->getName()) {
                return View::create(array($repo1, $repo2), Response::HTTP_OK, []);
            } else {
                return View::create(array("message" => "Not Found", 'documentation_url'=>'https://github.com/tkaniowski/repo_comparator'), Response::HTTP_NOT_FOUND, []);
            }
        } else {
            return View::create(array("message" => "Not Found", 'documentation_url'=>'https://github.com/tkaniowski/repo_comparator'), Response::HTTP_NOT_FOUND, []);
        }
    }

}
