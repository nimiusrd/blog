<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;

class ArticleController extends FOSRestController
{
    /**
     * @Route("/articles/{articleId}", methods={"POST"}, name="post_article")
     */
    public function postAction()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setTitle('title');
        $article->setAuthor('author');
        $article->setPostedAt(new \DateTime());
        $article->setBody('something');

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($article);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new article with id '.$article->getId());
    }

    /**
     * @Route("/articles/{articleId}", methods={"GET"}, name="show_article")
     */
    public function showAction(int $articleId)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($articleId);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$articleId
            );
        }

        return $this->json([
            'title' => $article->getTitle(),
            'author' => $article->getAuthor(),
            'posted_at' => $article->getPostedAt()->format(\DateTime::ATOM),
            'body' => $article->getBody()
        ]);
    }

    /**
     * @Route("/delete/{articleId}", methods={"DELETE"}, name="delete_article")
     */
    public function deleteAction(int $articleId)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($articleId);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$articleId
            );
        }

        return $this->json([
            'title' => $article->getTitle(),
            'author' => $article->getAuthor(),
            'posted_at' => $article->getPostedAt()->format(\DateTime::ATOM),
            'body' => $article->getBody()
        ]);
    }
}
