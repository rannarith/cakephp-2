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
    }
