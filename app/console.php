<?php

use App\Core\CodeMaking\CodeMaker;

require_once('core/code_making/CodeMaker.php');
require_once('core/code_making/CodeObserver.php');

function main($argv){
    switch($argv[1]){
        case 'app':
            get_app_info(cut($argv, 2));
        case 'create':
            create(cut($argv, 2));
            break;
        case 'migrate':
            migrate(cut($argv, 2));
            break;
        case 'help':
            help();
            break;
    }
}

function cut($args, $shift = 1){
    return array_slice($args, $shift);
}

function get_app_info($args){
    switch($args[0]){
        case '-v':
            echo "\nCurrent application version - 0.1\n";
            break;
    }
}

function create($args){
    switch($args[0]){
        case 'controller':
            CodeMaker::makeController(cut($args));
            break;
        case 'model':
            CodeMaker::makeModel(cut($args));
            break;
        case 'route':
            CodeMaker::makeRoute(cut($args));
            break;
        case 'migration':
            CodeMaker::makeMigration();
            break;
    }
}

function migrate($args){

}

function help(){
    echo "There are commands supporting:\n";
    echo "\t- app -v\n";
    echo "\t- create\n";
    echo "\t\t- controller\n";
    echo "\t\t\tparams: controller-name, p:<FIELD_NAME> or f:<FUNCTION_NAME>\n";
    echo "\t\t\texample: create controller home p:userName f:index\n";
    echo "\t\t- model\n";
    echo "\t\t\tparams: model-name, FIELD_1, FIELD_2, ..., FIELD_n\n";
    echo "\t\t\texample: create model user id name age\n";
    echo "\t\t- route\n";
    echo "\t\t\tparams: route, controller-name, function-name\n";
    echo "\t\t\texample: create route /home home index\n";
    echo "\t\t- migration\n";
    echo "\t\t\texample: create migration\n";
    echo "\t- migrate\n";
}

main($argv);