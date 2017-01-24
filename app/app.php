<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/task.php";

    // The first line starts our session Then checks the session for the key 'list_of_tasks' using the EMPTY function
    session_start();                            // which returns true if there key 'list_of_tasks' using the EMPTY function
    if (empty($_SESSION['list_of_tasks'])) {    // If the key doesn't exist, we create it and set it to an empty array
        $_SESSION['list_of_tasks'] = array();   // $_SESSION is a superglobal variable like $_GET
    }                                           // superglobal means we can access it from anywhere in our code
                                                // Storing the objects in cookies on the users' browser
    $app = new Silex\Application();

    $app->get("/", function() {

        $output = "";
                      // We only want to list tasks if some exist.
        $all_tasks = Task::getAll();

        if (!empty($all_tasks)) {
          $output = $output . "
              <h1>To Do List</h1>
              <p>Here are all your tasks</p>
              ";
          foreach ($all_tasks as $task) {
            $output = $output . "<p>" . $task->getDescription() . "</p>";
        }

        }

        $output = $output . "
            <form action='/tasks' method='post'>
                <label for='description'>Task Description</label>
                <input type='text' id='description' name='description'>

                <button type='submit'>Add task</button>
            </form>
            ";

        return $output;
    });

    $app->post("/tasks", function() {
        $task = new Task($_POST['description']);
        $task->save();

        return "
            <h1>You created a new task</h1>
            <p>" . $task->getDescription() . "</p>
            <p><a href='/'>View your list of things to do.</a></p>
        ";
    });

    return $app;


?>
