<?php

function test () {
    $csv = array_map('str_getcsv', file('file.csv'));
    
    foreach ($csv as $key => $value) {
        $arr = array(
            'role' => 0,
            'username' => '',
            'password' => '',
            'first_name' => '',
            'last_name' => '',
            'work' => '',
            'email' => ''
            );
        if ($key != 0) { //exclude the csv header
            foreach ($value as $new_key => $new_value) {

                switch ($new_key) {
                    case 0:
                        $arr['role'] = (int)$new_value;
                        break;
                    case 1:
                        $arr['username'] = $new_value;
                        break;
                    case 2:                    
                        $arr['password'] = random_password(12);
                        $arr['first_name'] = $new_value;
                        break;
                    case 3:
                        $arr['last_name'] = $new_value;
                        break;
                    case 4:
                        $arr['work'] = $new_value;
                        break;
                    case 5:
                        $arr['email'] = $new_value;
                        break;                    
                    default:
                        # code...
                        break;
                }
            }
            
            var_dump($arr);
            echo  PHP_EOL;      
        }        
    }  
}

function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;    
}

test();

?>