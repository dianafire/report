<?php

    class Model_Reports extends \Model_Crud
    {
        protected static $_table_name = 'reports';

        protected static $_properties = array(
            'id',
            'sensorID',
            'value',
            'time'

        );

    }
