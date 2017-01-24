<?php
    class Task
    {
        private $description;

        function __construct($task_description)
        {
            $this->description = $task_description;
        }

        // Setter and Getter
        function setDescription($new_description)
        {
            $this->description = $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

        // We store a Task by calling a save method on it
        function save()
        {                                      // 'list_of_tasks' is a key for k/v pair
            array_push($_SESSION['list_of_tasks'], $this);
        }                                      // we're pushing whatever we call the save() method on into the array 'list_of_tasks'

// 'Static Method'is a getter, but works on the whole class: it returns the list of all our tasks.
        static function getAll()
        {
            return $_SESSION["list_of_tasks"];  // Returns a list of all the tasks
        }


    }
?>
