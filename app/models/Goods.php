<?php

use \Phalcon\Mvc\Model;

class Goods extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    public $title;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $categoryId;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    public $price;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $quantity;


    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon_test");
        $this->setSource("goods");
        $this->belongsTo('categoryId', '\Categories', 'id', ['alias' => 'Categories']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'goods';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Goods[]|Goods|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Goods|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function beforeCreate() {

        $validation = new \Phalcon\Validation();

        $validation->add(
            'title',
            new \Phalcon\Validation\Validator\PresenceOf(
                [
                    'message' => 'Поле наименование должно быть заполнено',
                ]
            )
        );

        $validation->add(
            [
                "price",
                "quantity",
            ],
            new \Phalcon\Validation\Validator\Numericality(
                [
                    "message" => [
                        "price"  => "Цена должна быть числом",
                        "quantity" => "Количество должно быть числом",
                    ]
                ]
            )
        );

        $messages = $validation->validate($_POST);


        foreach ($messages as $message)
        {

            $this->appendMessage(new Model\Message($message->getMessage()));
        }

        return count($messages) == 0;
    }



}
