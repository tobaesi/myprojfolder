<?php

require_once 'framework/Model.php';

/**
 * Modélise dummy
 *
 */
class Dummy extends Model {

    public function getFirst() {
        return "first info";
    }

    public function getSecond() {
        return "second info";
    }

}
