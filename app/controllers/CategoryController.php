<?php

class CategoryController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->categories = Categories::find();

    }

    public function editAction($id)
    {
        $this->view->category = Categories::findFirst($id);
    }

    public function deleteAction($id)
    {
        echo $id;
    }

    public function createAction()
    {
        if (!$this->request->isPost()){
            return $this->dispatcher->forward(
                [
                    "controller" => "goods",
                    "action"     => "index",
                ]
            );
        }



        $good = new Goods();

        $good->Title = $this->request->getPost("title","striptags");
        $good->Categoryid = $this->request->getPost("categoryId","int");
        $good->Price = $this->request->getPost("price","double");
        $good->Quantity = $this->request->getPost("quantity","int");
    }

}

