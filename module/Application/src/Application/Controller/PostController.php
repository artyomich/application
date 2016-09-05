<?php
/**
 * Created by PhpStorm.
 * User: artyom
 * Date: 04.09.16
 * Time: 17:55
 */

namespace Application\Controller;

use Symfony\Component\Console\Application;
use Zend\Mvc\Controller\AbstractRestfulController,
    Zend\View\Model\JsonModel;


class PostController extends AbstractRestfulController
{

    private function postService() {
        return $this->getServiceLocator()->get('postService');
    }

    public function getList()
    {
        switch($_GET['order']) {
            case 'latest':
                return new JsonModel($this->postService()->getLatestPosts());
            case 'random':
                return new JsonModel($this->postService()->getRandomPosts());
        }
        return new JsonModel($this->postService()->getAllPosts());
    }

    public function get($id) {
        return new JsonModel($this->postService()->getPost($id));
    }

    public function create($data) {
        return new JsonModel($this->postService()->createPost($_POST['author'], $_POST['content']));
    }
}
