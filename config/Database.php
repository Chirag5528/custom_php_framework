<?php

namespace Config;

use Exception;

require_once("Configuration.php");
class Database extends Configuration
{
    /* Database Connection Object */
    private $link;

    /* Connection Properties */
    private $con_properties;

    public function __construct($test = false)
    {
        /* If Testing Environment is set */
        if ($test) {
            $this->con_properties = $this->test();
        } else {
            $this->con_properties = $this->default();
        }
    }

    public function connection(): object
    {
        $this->link = mysqli_connect($this->con_properties['host'], $this->con_properties['user'], $this->con_properties['password'], $this->con_properties['database']);

        if (!$this->link) {
            throw new \Exception("No connection could be made");
        }

        return $this->link;
    }

    public function __destruct()
    {
        mysqli_close($this->link);
    }
}
