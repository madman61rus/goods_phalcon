<?php

class CategoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->categories = Categories::find();

    }

    public function editAction($id)
    {
        $category = Categories::findFirst($id);

        if($this->request->isPost())
        {

            $category->title = $this->request->getPost("title",['striptags','trim']);

            if ($category->save() === true)
            {
                return $this->dispatcher->forward(
                    [
                        "controller" => "Category",
                        "action"     => "index",
                    ]);
            } else {
                $category->appendMessage(new \Phalcon\Mvc\Model\Message("Не получилось отредактировать категорию "));

            }

        }

        $messages = $category->getMessages();
        $this->view->messages = $messages;

        $this->view->category = $category;
    }

    public function deleteAction($id)
    {
        if($this->request->isPost())
        {

            if($this->db->delete('categories', "id={$id}")){
                return $this->dispatcher->forward(
                    [
                        "controller" => "category",
                        "action"     => "index",
                    ]);
            } else {

                $this->view->messages = "Ошибка при удалении категории ";
            }
        }
    }

    public function createAction()
    {
        if($this->request->isPost())
        {
            $category = new Categories();

            $category->title =  $this->request->getPost("title",['striptags','trim']);

            if ($category->create() === false)
            {
                $messages = $category->getMessages();
                $this->view->messages = $messages;

            }else{

                return $this->dispatcher->forward(
                    [
                        "controller" => "category",
                        "action"     => "index",
                    ]);
            }
        }

    }

}

