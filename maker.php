<?php
function main($argv){
    switch($argv[1]){
        case 'create':
            create(array_slice($argv, 2));
            break;
        case 'migrate':
            echo __DIR__;
            break;
    }
}

function create($args){
    switch($args[0]){
        case 'controller':
            create_controller(array_slice($args, 1));
            break;
        case 'model':
            create_model(array_slice($args, 1));
    }
}

function create_controller($args){
    print_r($args);
}

function create_model($args){
    print_r($args);
}

main($argv);