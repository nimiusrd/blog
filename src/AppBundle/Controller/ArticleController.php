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
    public function getArticleList(EntityManagerInterface $entityManager)
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();

        if (!$articles) {
            return $this->json([]);
        }
        $toJSON = function ($article) {
            return [
                'id' => $article->getId(),
                'title' => $article->getTitle(),
                'author' => $article->getAuthor(),
                'postedAt' => $article->getPostedAt()->format(\DateTime::ATOM),
                'updatedAt' => $article->getUpdatedAt()->format(\DateTime::ATOM)
            ];
        };

        return $this->json(array_map($toJSON, $articles));
    }

    /**
     * @Route("/api/articles", methods={"POST"}, name="post_article")
     */
    public function postArticle(EntityManagerInterface $entityManager, Request $request)
    {
        $data = json_decode($request->getContent());

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
    public function getArticle(EntityManagerInterface $entityManager, int $articleId)
    {
        $article = $entityManager
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
            'postedAt' => $article->getPostedAt()->format(\DateTime::ATOM),
            'updatedAt' => $article->getUpdatedAt()->format(\DateTime::ATOM),
            'content' => $article->getContent()
        ]);
    }

    /**
     * @Route("/api/articles/{articleId}", methods={"PUT"}, name="update_article")
     */
    public function updateArticle(EntityManagerInterface $entityManager, int $articleId, Request $request)
    {
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
    public function deleteArticle(EntityManagerInterface $entityManager, int $articleId)
    {
        $article = $entityManager->getRepository(Article::class)->find($articleId);

        if ($article) {
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return new Response('Deleted article');
    }
}
