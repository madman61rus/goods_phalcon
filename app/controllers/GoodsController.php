<?php


class GoodsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->goods = Goods::find();
    }

    public function editAction($id)
    {

        $good = Goods::findFirst($id);

        if($this->request->isPost())
        {

            $good->title = $this->request->getPost("title",['striptags','trim']);
            $good->price = $this->request->getPost("price", 'float');
            $good->quantity = $this->request->getPost("quantity", 'int');
            $good->categoryId = $this->request->getPost("categoryid", 'int');

            if ($good->save() === true)
            {
                return $this->dispatcher->forward(
                    [
                        "controller" => "goods",
                        "action"     => "index",
                    ]);
            } else {
                $good->appendMessage(new \Phalcon\Mvc\Model\Message("Не получилось отредактировать товар "));

            }

        }

        $messages = $good->getMessages();
        $this->view->messages = $messages;

        $this->view->categories = Categories::find();
        $this->view->good = $good;

    }

    public function deleteAction($id)
    {
            if($this->request->isPost())
        {

            if($this->db->delete('goods', "id={$id}")){
                return $this->dispatcher->forward(
                    [
                        "controller" => "goods",
                        "action"     => "index",
                    ]);
            } else {

                $this->view->messages = "Товар не удален ";
            }
        }
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

                return $this->dispatcher->forward(
                    [
                        "controller" => "goods",
                        "action"     => "index",
                    ]);
            }

        }


        $this->view->categories = Categories::find();

    }




}

