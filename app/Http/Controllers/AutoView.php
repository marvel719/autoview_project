<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AutoView extends Controller
{
    public function data(){
        $annual_data=DB::select('SELECT  `moduleID`, `mScore` , WEEK(tta . attemptDateTime) AS Week, MONTH(tta.attemptDateTime) AS Month
        FROM
        `tbl_test_attempts` AS tta
        JOIN
        `tbl_test_modules` AS ttm
        ON
        tta.`id` = ttm.`testID`
        WHERE
        ttm . moduleID IN (SELECT moduleID FROM tbl_module_display WHERE `type`="MOCK_AI")
        -- AND
        -- YEAR(tta.attemptDateTime)=YEAR(CURDATE())-1
        AND
        mScore>-1
        ORDER BY testEndTime DESC;');
    
        $annual_array=array();
        $monthly_array=array();
        $res=array();
        $res2=array();
        $res3=array();
        $weekly_array=array();
        foreach($annual_data as $data){
            $modID = $data->moduleID;
            $mScore = $data->mScore;
            $week = $data->Week;
            $month = $data->Month;
            //echo "modID = ".$modID." mScore = ".$mScore." week = ".$week." Month = ".$month;
            
            //Below block is to calculate annual mScore of different modules
            if(array_key_exists($modID,$annual_array)){
                $annual_array[$modID][1]+=1;
                $annual_array[$modID][0]=((($annual_array[$modID][0]*($annual_array[$modID][1]-1))+$mScore)/$annual_array[$modID][1]);
                $res[$modID]=Round($annual_array[$modID][0],2);
            }
            else{
                $annual_array[$modID]=array($mScore,1);
                $res[$modID]=$annual_array[$modID][0];
            }
    
            //Below block is to calculate annual mScore of different modules
            /*if(array_key_exists($modID,$monthly_array)){
                if(array_key_exists($month,$monthly_array[$modID])){
                    $monthly_array[$modID][$month][1]+=1;
                    $monthly_array[$modID][$month][0]=((($monthly_array[$modID][$month][0]*($monthly_array[$modID][$month][1]-1))+$mScore)/$monthly_array[$modID][$month][1]);
                }
                else{
                    $monthly_array[$modID][$month]=array($mScore,1);
                }
            }
            else{
                $monthly_array[$modID][$month]=array($mScore,1);
            }*/
            if(array_key_exists($month,$monthly_array)){
                $monthly_array[$month][1]+=1;
                $monthly_array[$month][0]=((($monthly_array[$month][0]*($monthly_array[$month][1]-1))+$mScore)/$monthly_array[$month][1]);
                $res2[$month]=Round($monthly_array[$month][0],2);
            }
            else{
                $monthly_array[$month]=array($mScore,1);
                $res2[$month]=$monthly_array[$month][0];
            }
    
            //Below block is to calculate weekly mScore of different modules
            if(array_key_exists($week,$weekly_array)){
                $weekly_array[$week][1]+=1;
                $weekly_array[$week][0]=((($weekly_array[$week][0]*($weekly_array[$week][1]-1))+$mScore)/$weekly_array[$week][1]);
                $res3[$week]=Round($weekly_array[$week][0],2);
            }
            else{
                $weekly_array[$week]=array($mScore,1);
                $res3[$week]=$weekly_array[$week][0];
            }
        }
        /*echo "Annual_data <br>";
        print json_encode($annual_array);
        echo "<br>";
        echo "Monthly_data <br>";
        print json_encode($monthly_array);
        echo "<br>";
        echo "Weekly data <br>";
        print json_encode($weekly_array);
        echo "res <br>";*/
        $data=[];
        foreach($res as $row){
            $data['label'][]=key($res);
            $data['data'][]=$row;
            next($res);
        }
        $data['chart_data']=json_encode($data);


        $data2=[];
        foreach($res2 as $row){
            $data2['label'][]=key($res2);
            $data2['data'][]=$row;
            next($res2);
        }
        $data2['chart_data2']=json_encode($data2);

        $data3=[];
        foreach($res3 as $row){
            $data3['label'][]=key($res3);
            $data3['data'][]=$row;
            next($res3);
        }
        $data3['chart_data3']=json_encode($data3);

        return view('autoView')
                   ->with($data)
                   ->with($data2)
                   ->with($data3);
    }
    public function nfcandidate(){
        $res=DB::select('SELECT COUNT(candidateID),tta.`attemptDateTime` From `tbl_test_attempts`
        AS tta JOIN `tbl_module_display` WHERE `type`="MOCK_AI")AND`mScore`>-1
        GROUP BY MONTH(tta.`attemptDateTime`); ');
        return $res;
    }
    
}


