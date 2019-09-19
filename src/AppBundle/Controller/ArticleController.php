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
     * @Route("/articles", methods={"GET"}, name="get_articles")
     */
    public function getArticleList()
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class);

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found for id '.$articleId
            );
        }

        return $this->json([
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'author' => $article->getAuthor(),
            'posted_at' => $article->getPostedAt()->format(\DateTime::ATOM),
            'updated_at' => $article->getUpdatedAt()->format(\DateTime::ATOM)
        ]);
    }

    /**
     * @Route("/articles", methods={"POST"}, name="post_article")
     */
    public function postArticle(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setTitle($request->request->title);
        $article->setAuthor($request->request->author);
        $date = new \DateTime();
        $article->setPostedAt($date);
        $article->setUpdatedAt($date);
        $article->setBody($request->request->body);

        $entityManager->persist($article);
        $entityManager->flush();

        return new Response('Saved new article with id '.$article->get());
    }

    /**
     * @Route("/articles/{articleId}", methods={"GET"}, name="get_article")
     */
    public function getArticle(int $articleId)
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
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'author' => $article->getAuthor(),
            'posted_at' => $article->getPostedAt()->format(\DateTime::ATOM),
            'updated_at' => $article->getUpdatedAt()->format(\DateTime::ATOM),
            'body' => $article->getBody()
        ]);
    }

    /**
     * @Route("/articles/{articleId}", methods={"PUT"}, name="update_article")
     */
    public function updateArticle(int $articleId, Request $request)
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($articleId);
        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }

        $article->setTitle($request->request->title);
        $article->setAuthor($request->request->author);
        $date = new \DateTime();
        $article->setUpdatedAt($date);
        $article->setBody($request->request->body);

        $entityManager->flush();
        return new Response('Updated article with id '.$article->get());
    }

    /**
     * @Route("/articles/{articleId}", methods={"DELETE"}, name="delete_article")
     */
    public function deleteArticle(int $articleId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $article = $entityManager->getRepository(Article::class)->find($articleId);

        if ($article) {
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return new Response('Deleted article');
    }
}
