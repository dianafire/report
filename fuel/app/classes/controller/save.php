<?php

class Controller_Save extends Controller_Rest
{
    protected $format='json';

    public function get_index()
    {

        Session::set(array(
            'id' => Input::get('id'),
            'value'=>Input::get('value')));

        $reports = Model_Reports::forge();

        if (
            (is_numeric(Session::get('id'))) &&
            (is_numeric(Session::get('value')))
        ){
            Session::set('id', intval(Session::get('id')));
            Session::set('value', floatval(Session::get('value')));

            $reports->sensorID = Session::get('id');
            $reports->value = Session::get('value');
            $reports->save();
        }




        //curl --request GET "localhost/report/public/index.php/save/index?id=3&value=8"

    }



    public function get_sensors()
    {

        Session::set(array(
            'name' => Input::get('name'),
            'unit' => Input::get('unit'),
            'lat' => Input::get('lat'),
            'lng' => Input::get('lng'),
        ));

        if (is_numeric(Session::get('lat')) && is_numeric(Session::get('lng'))
        )
        {

            $val = Validation::forge('validation');
            $val->add('lat')->add_rule('numeric_between', -90, 90);
            $val->add('lng')->add_rule('numeric_between', -180, 180);

            if ($val->run(array('lat' => Session::get('lat'),
                'lng' => Session::get('lng')))
            )
            {

                $sensors = Model_Sensors::forge();

                $sensors->name = Session::get('name');
                $sensors->unit = Session::get('unit');
                $sensors->lat = Session::get('lat');
                $sensors->lng = Session::get('lng');
                $sensors->save();

            }
        }

        /*else{
            //echo "sorry!";
        }*/

        //curl --request GET "localhost/report/public/index.php/save/sensors?name=barometer%2019&unit=Pascal&lat=42.702191&lng=23.298069"
    }



}




?>