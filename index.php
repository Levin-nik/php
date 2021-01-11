<?php
$name = filter_input(
    INPUT_POST,
    'name',
    FILTER_CALLBACK,
    [
        'options' => function ($value) {
            $value = strlen($value) > 2 && strlen($value) < 21 ? $value : '';
            return $value;
        }
    ]
);

$lastName = filter_input(
    INPUT_POST,
    'lastName',
    FILTER_CALLBACK,
    [
        'options' => function ($value) {
            $value = strlen($value) > 2 && strlen($value) < 21 ? $value : '';
            return $value;
        }
    ]
);

$email = filter_input(
    INPUT_POST,
    'email',
    FILTER_VALIDATE_EMAIL
);

if ($name) {
    if ($lastName) {
        if ($email) {
            require_once 'write.php';
            $write = new Write;
            $result = $write->writeInFile($name, $lastName, $email);
            if ($result) {
                echo "Вы зарегистрировались!";
            } else {
                echo "Вы уже зарегистрированы!";
            }
        } else {
            echo "не правильный email";
        }
    } else {
        echo "не правильная валидация фамилии";
    }
} else {
    echo "не правильная валидация имени";
}