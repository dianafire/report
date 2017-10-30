<?php

class Controller_Save extends Controller_Rest
{
    protected $format='json';

    public function get_index()
    {

        $input = (array(
            'id' => Input::get('id'),
            'value'=>Input::get('value')));

        $reports = Model_Reports::forge();



        if ((is_numeric($input['id'])) && (is_numeric($input['value'])) ){
            $input['id'] = intval($input['id']);
            $input['value'] = floatval($input['value']);

            $reports->sensorID = $input['id'];
            $reports->value = $input['value'];
            $reports->save();
        }




        //curl --request GET "localhost/report/public/index.php/save/index?id=3&value=8"


    }
}




?>