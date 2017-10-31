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
}




?>