<?php
/**
 * Created by PhpStorm.
 * User: artyom
 * Date: 04.09.16
 * Time: 17:55
 */

namespace Application\Controller;

use Symfony\Component\Console\Application;
use Zend\Json\Json;
use Zend\Mvc\Controller\AbstractRestfulController,
    Zend\View\Model\JsonModel;


class PostController extends AbstractRestfulController
{

    private function postService()
    {
        return $this->getServiceLocator()->get('postService');
    }

    public function getList()
    {
        switch ($_GET['order']) {
            case 'latest':
                return $this->toJson($this->postService()->getLatestPosts());
            case 'random':
                return $this->toJson($this->postService()->getRandomPosts());
        }
        return $this->toJson($this->postService()->getAllPosts());
    }

    public function get($id)
    {
        return $this->toJson($this->postService()->getPost($id));
    }

    public function create($data)
    {
        return $this->toJson($this->postService()->createPost($_POST['author'], $_POST['content']));
    }

    private function toJson($object) {
        if (is_null($object)) {
            return new JsonModel();
        }
        if (is_array($object)) {
            return new JsonModel(array_map(function ($obj) {
                return $obj->toArray();
            }, $object));
        }
        return new JsonModel($object->toArray());
    }
}
