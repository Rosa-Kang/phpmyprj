<?php
namespace Ijdb\Controllers;
use \Hanbit\DatabaseTable;

class Register {
    private $authorsTable;

    public function __construct(DatabaseTable $authorsTable) {
        $this -> authorsTable = $authorsTable;
    }

    public function registrationForm() {
        return ['template' => 'register.html.php', 
                'title' => 'User Registration'];
    }

    public function success() {
        return ['template' => 'registersuccess.html.php', 
                'title' => 'Successfully registered!'];
    }

    public function registerUser() {
        $author = $_POST['author'];

        //suppose the initial data is correct
        $valid = true;
        $errors = [];

        //in case it is empty, valid variable should be false.
        if(empty($author['name'])) {
            $valid = false;
            $errors[] = 'Please enter your name.';
        }
        if(empty($author['email'])) {
            $valid = false;
            $errors[] = 'Please enter your email.';
        }
        if(empty($author['password'])) {
            $valid = false;
            $errors[] = 'Please enter your password.';
        }

        if($valid == true) {
            $this -> authorsTable->save($author);
            header('Location: /author/success');
        } else {
            return['template' => 'register.html.php',
                    'title' => 'User Registration',
                    'variables' => [
                        'errors' => $errors,
                        'author' => $author
                    ]
                ];
        }
    } 
}

