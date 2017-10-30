<?php

class Model_Sensors extends \Model_Crud
{
    protected static $_table_name = 'sensors';

    protected static $_properties = array(
        'id',
        'name',
        'unit'

    );

}