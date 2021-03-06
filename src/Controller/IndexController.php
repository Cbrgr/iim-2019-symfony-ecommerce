<?php

namespace App\Controller;

use App\Entity\Collection;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $repositoryCollection  = $this->getDoctrine()->getRepository(Collection::class);
        $collections = $repositoryCollection->findAll();

        $repositoryProduct = $this->getDoctrine()->getRepository(Product::class);
        $products = $repositoryProduct->findBy([], [
            'dateAdd' => 'DESC'
        ], 8);

        return $this->render('index/index.html.twig', [
            'collections' => $collections,
            'products' => $products
        ]);
    }

    /**
     * @Route("/empty", name="empty")
     */
    public function empty()
    {
        return $this->render('empty.html.twig');
    }
}
