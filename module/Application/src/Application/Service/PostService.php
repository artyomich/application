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
        return $this->entityManager->getRepository('Application\Entity\Post')->findBy(array(), array('postedAt' => 'DESC'));
    }

    public function getRandomPosts()
    {
        return $this->entityManager->getRepository('Application\Entity\Post')->findBy(array(), array('random()'));
    }

    public function getAllPosts()
    {
        return $this->entityManager->getRepository('Application\Entity\Post')->findBy(array(), array('id' => 'ASC'));
    }

    public function getPost($id)
    {
        return $this->entityManager->getRepository('Application\Entity\Post')->find($id);
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