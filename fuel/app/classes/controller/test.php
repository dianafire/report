<?php


class Controller_Test extends Controller_Rest
{
    protected $format='json';
public function get_list()
{

    $input = (array(
        'id' => Input::get('id'),
        'value'=>Input::get('value')));

    $reports = Model_Reports::forge();

    $reports->sensorID = $input['id'];
    $reports->value = $input['value'];
    $reports->save();


    //curl --request GET "localhost/report/public/index.php/test/list?id=3&value=8"


}
}