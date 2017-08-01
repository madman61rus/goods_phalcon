<?php


class GoodsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->goods = Goods::find();
    }

    public function editAction($id)
    {
        echo $id;
    }

    public function deleteAction($id)
    {
        echo $id;
    }

    public function createAction()
    {
        if($this->request->isPost())
        {
            $good = new Goods();
            $good->title = $this->request->getPost("title",['striptags','trim']);
            $good->price = $this->request->getPost("price", 'float');
            $good->quantity = $this->request->getPost("quantity", 'int');
            $good->categoryId = $this->request->getPost("categoryid", 'int');


            if ($good->create() === false)
            {
                $messages = $good->getMessages();
                $this->view->messages = $messages;

            }else{

                $this->dispatcher->forward(
                    [
                        "controller" => "goods",
                        "action"     => "index",
                    ]);
            }

        }


        $this->view->categories = Categories::find();

    }




}

