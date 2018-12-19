<?php
App::uses('Model', 'Model');

class Product extends AppModel
    {
            public $validate = array(
                'name' => array(
                    'rule' => 'notBlank'
                ),
                'description' => array(
                    'rule' => 'notBlank'
                )
            );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
    }
