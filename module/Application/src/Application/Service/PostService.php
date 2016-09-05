<?php

namespace Application\Service;

use Application\Entity\Post;
use Doctrine\ORM\EntityManager;

class PostService
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getLatestPosts()
    {
        return $this->entityManager->getRepository('Application\Entity\Post')->findAll();
    }

    public function getRandomPosts()
    {

    }

    public function getAllPosts()
    {

    }

    public function getPost($id)
    {

    }

    public function createPost($author, $content)
    {
        $post = new Post();
        $post->setAuthor($author);
        $post->setContent($content);
        $this->entityManager->persist($post);
        $this->entityManager->flush();
        return $post;
    }
}