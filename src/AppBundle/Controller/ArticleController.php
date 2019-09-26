<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;

use Psr\Log\LoggerInterface;

class ArticleController extends FOSRestController
{
    /**
     * @Route("/api/articles", methods={"GET"}, name="get_articles")
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
     * @Route("/api/articles", methods={"POST"}, name="post_article")
     */
    public function postArticle(Request $request)
    {
        $data = json_decode($request->getContent());

        $entityManager = $this->getDoctrine()->getManager();

        $article = new Article();
        $article->setTitle($data->title);
        $article->setAuthor($data->author);
        $date = new \DateTime();
        $article->setPostedAt($date);
        $article->setUpdatedAt($date);
        $article->setContent($data->content);

        $entityManager->persist($article);
        $entityManager->flush();

        return new Response('Saved new article with id '.$article->getId());
    }

    /**
     * @Route("/api/articles/{articleId}", methods={"GET"}, name="get_article")
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
            'content' => $article->getContent()
        ]);
    }

    /**
     * @Route("/api/articles/{articleId}", methods={"PUT"}, name="update_article")
     */
    public function updateArticle(int $articleId, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $article = $entityManager->getRepository(Article::class)->find($articleId);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }

        $data = json_decode($request->getContent());

        $article->setTitle($data->title);
        $article->setAuthor($data->author);
        $date = new \DateTime();
        $article->setUpdatedAt($date);
        $article->setContent($data->content);

        $entityManager->flush();

        return new Response('Updated article with id '.$article->getId());
    }

    /**
     * @Route("/api/articles/{articleId}", methods={"DELETE"}, name="delete_article")
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
