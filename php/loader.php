<?php

// Todo: implement autoloader instead
$controller = Routes::ROUTES[$url]['controllerClass'];
$method = Routes::ROUTES[$url]['method'];

function sortBaseToComeFirst(array &$files)
{
    $result = [];
    foreach ($files as $file) {
        if (str_starts_with($file, 'Base')) {
            array_unshift($result, $file);
        } else {
            $result[] = $file;
        }
    }

    $files = $result;
}

$libraryFiles = array_diff(scandir('library'), array('.', '..'));
sortBaseToComeFirst($libraryFiles);
foreach ($libraryFiles as $libraryFile) {
    require_once 'library/' . $libraryFile;
}

$modelFiles = array_diff(scandir('models'), array('.', '..'));
sortBaseToComeFirst($modelFiles);
foreach ($modelFiles as $modelFile) {
    require_once 'models/' . $modelFile;
}

$controllerFiles = array_diff(scandir('controllers'), array('.', '..'));
sortBaseToComeFirst($controllerFiles);
foreach ($controllerFiles as $controllerFile) {
    require_once 'controllers/' . $controllerFile;
}

$servicesFiles = array_diff(scandir('services'), array('.', '..'));
sortBaseToComeFirst($servicesFiles);
foreach ($servicesFiles as $servicesFile) {
    require_once 'services/' . $servicesFile;
}

$process = new $controller();
$process->$method();
