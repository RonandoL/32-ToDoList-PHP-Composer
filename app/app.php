<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/task.php";
                                                // The first line starts our session Then checks the session for the
    // session_start();                            // key 'list_of_tasks' using the EMPTY function, which returns true if there
    // if (empty($_SESSION['list_of_tasks'])) {    // is no value stored in the variable
    //     $_SESSION['list_of_tasks'] = array();   // If the key doesn't exist, we create it and set it to an empty array
    // }                                           // $_SESSION is a superglobal variable like $_GET
                                                // superglobal means we can access it from anywhere in our code.
    $app = new Silex\Application();

    $app->get("/", function() {
        $task1 = new Task("Learn PHP");
        $task2 = new Task("Learn WordPress");
        $task3 = new Task("Learn Python");

        $tasks = [$task1, $task2, $task3];
        $output = "";

        foreach ($tasks as $task) {
          $output = $output . "<p>" . $task->getDescription() . "</p>";
        }

        return $output;
    });

    return $app;
?>
