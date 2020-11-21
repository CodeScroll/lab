<?php

class Validator{

    private $data;
    private $rules;
    private $rulesMessages;
    private $ruleExist = false;
    private $responseRulesMessages = [];

    function __construct(){}

    function validate($data, $rules = [], $rulesMessages = []){
        foreach($rules as $key => $rule){
            $this->ruleExist = false;
            foreach($data as $itemKey => $item){
                if($itemKey == $key){
                    $this->ruleExist = true;
                }
            }

            if($this->ruleExist == false){
                array_push($this->responseRulesMessages, $key);
            }
        }

        if(count($this->responseRulesMessages)){
            return [
                'status' => false,
                'errors' => $this->responseRulesMessages,
            ];
        }

        return [
            'status' => true
        ];
    }
}


$test1 = new Validator();

$data = [
    'name' => 'Alfa'
];

$rules = [
    'name' => [
        'name' => 'name',
        'required' => 1
    ],
    'email' => [
        'name' => 'email',
        'required' => 1
    ],
    'phone' => [
        'name' => 'phone',
        'required' => 1
    ]
];

$messages = [
    'name' => 'Name required',
    'email' => 'Email required',
];

$validate = $test1->validate($data, $rules, $messages);

if(!$validate['status']){
    echo 'Fields Missing';
    echo '<br>';
    foreach($validate['errors'] as $error){
        print_r($error);
        echo '<br>';
    }
}