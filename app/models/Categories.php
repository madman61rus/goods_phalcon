<?php

use \Phalcon\Mvc\Model;

class Categories extends \Phalcon\Mvc\Model
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("phalcon_test");
        $this->setSource("categories");
        $this->hasMany('id', 'Goods', 'categoryId', ['alias' => 'Goods']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'categories';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Categories[]|Categories|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Categories|\Phalcon\Mvc\Model\ResultInterface
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


        $messages = $validation->validate($_POST);


        foreach ($messages as $message)
        {

            $this->appendMessage(new Model\Message($message->getMessage()));
        }

        return count($messages) == 0;
    }

}
