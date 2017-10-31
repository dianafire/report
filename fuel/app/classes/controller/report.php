<?php


class Controller_Report extends Controller
{

    public function action_index() // VIEW ALL
    {
        $sensors = Model_Sensors::find_all();
        $data = array('sensors'=>$sensors);

        if ($sensors){
            return Response::forge(View::forge('all',$data));
        }

    }

    public function action_one($id) // VIEW SPECIFIC
    {
        Session::set('id', $id);

        $sensor = Model_Sensors::find_by_pk(Session::get('id'));
        $data = array('sensor'=>$sensor);

        if ($sensor){
            return Response::forge(View::forge('one',$data));
        }



    }

    public function action_edit($id) // EDIT NAME/ UNIT
    {

        if (Input::post('update'))
        {

            $sensor = Model_Sensors::find_by_pk(Input::post('sensor_id'));
            $filters = array('strip_tags', 'htmlentities');
            $sensor->name = Security::clean(Input::post('name'), $filters);
            $sensor->unit = Security::clean(Input::post('unit'), $filters);
            $sensor->save();

            Session::set_flash('success', 'Name/ unit successfully updated!');
            Response::redirect('/index.php/report/');

        }

        else
        {
            Session::set('id', $id);
            $sensor = Model_Sensors::find_by_pk(Session::get('id'));
            $data = array('sensor'=>$sensor);

            return Response::forge(View::forge('edit',$data));
        }


    }


    public function action_delete($id) // DELETE SENSOR AND ITS REPORTS
    {
        Session::set('id', $id);

        $sensor = Model_Sensors::find_by_pk(Session::get('id'));

        if ($sensor){
            $sensor->delete();


            $reports = Model_Reports::find_by('sensorID', Session::get('id'), '=');

            foreach ($reports as $report){
                $report->delete();
            }

             Session::set_flash('success', 'Sensor successfully deleted!');
             Response::redirect('/index.php/report/');

        }


    }


    public function action_history($id) // SHOW SENSOR REPORT AND CHART
    {
        Session::set('id', $id);

        $sensor = Model_Sensors::find_by_pk(Session::get('id'));


        $reports= Model_Reports::find(array(
            'select' => array('sensorID', 'value', 'time'),
            'where' => array(

                'sensorID' => Session::get('id'),

            ),
            'order_by' => array(
                'time' => 'desc',

            ),

        ));

        $data = array('reports'=>$reports,
                'sensor'=>$sensor);

        return Response::forge(View::forge('report',$data));



    }



}

