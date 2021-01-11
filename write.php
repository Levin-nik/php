<?php
class Write
{
    public function writeInFile ($name, $lastName, $email) {
        $file = file_get_contents('users.txt');
        if (strpos($file, $email) === false) {
            file_put_contents('users.txt', "$file $name $lastName $email");
            return true;
        } else {
            return false;
        }
    }
}