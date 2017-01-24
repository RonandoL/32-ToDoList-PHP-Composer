<?php
    class Task
    {
        private $description;

        function __construct($task_description)
        {
            $this->description = $task_description;
        }


        function setDescription($new_description)
        {
            $this->description = $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

    }
?>
