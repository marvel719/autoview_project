<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MockAi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function indexs()
    {

        $job_com = DB::table('tlb_module_display')
            ->select('tbl_module_display.type')
            ->where('type','=','MOCK_AI')
        
            ->get();
        return $job_com;    
    }
    
        
   
    
    public function nfcandidate(){
        $res=DB::select('SELECT COUNT(candidateID) FROM 
        `tbl_test_attempts` AS tta
        JOIN
        `tbl_test_modules` AS ttm
        ON tta.`id`=ttm.`testID` 
        WHERE ttm.moduleID IN(SELECT `moduleID` FROM tbl_module_display 
        WHERE `type`="MOCK_AI")AND `mScore`>-1
        GROUP BY `moduleID`
        
         ');
        return $res;
    }
    public function avgscore(){
        $res=DB::select('SELECT AVG(mScore) FROM 
        `tbl_test_attempts` AS tta 
        JOIN 
        `tbl_test_modules` AS ttm
        ON tta.`id`=ttm.`testID`
        WHERE ttm.moduleID IN(SELECT `moduleID` FROM tbl_module_display
        WHERE `type`="MOCK_AI")AND `mScore`>-1
        GROUP BY `moduleID`  ');
        return $res;
        
    }
    public function f(){
        return view('Stocks');
    }
    public function bar_chart(){
        
        $res=DB::select('SELECT AVG(mScore) as avg,COUNT(candidateID) as cnt
         FROM `tbl_test_attempts` AS tta 
         JOIN
         `tbl_test_modules` AS ttm 
          ON tta.`id`=ttm.`testID` WHERE 
          ttm.moduleID IN (SELECT `moduleID` FROM tbl_module_display WHERE `type`="MOCK_AI" )
          AND `mScore`>-1
          GROUP BY MONTH(tta.`attemptDateTime`)
        
         ');

         /*
         $res=DB::table('tbl_test_attempts')
              ->join('tbl_test_modules','tbl_test_attempts.id','=','tbl_test_modules.testID');
              ->where('ttm.moduleID')-
         return Carbon::parse($res->avg)->format('M');*/
        return $res;
    }
    public function view_call(){
        $res=DB::select('select `moduleID`,`type` from tbl_module_display where `type`="MOCK_AI"');
        //return view('Stocks',['data'=>$res]);
        return view('Stocks',compact('res'));
    }
    public function getData(Request $request){
        return $request->all();
        
    }
    public function view_trial(){
        return view('new');
    }
    public function graph(){
        return view('home');
    }
    public function chrt(){
        return view('home1');
        
    }
    
    public function fetch_json(){
        $r1=array();
        $r2=array();
        $r3=array();
        $res = json_decode(file_get_contents(storage_path() . "\json\data_set.json"), true);
        
        
    
       // return sizeof($res);
       //return $res->avg;
       foreach($res as $a)  
       {
           array_push($r1,ROUND( $a['avg']));
           

       }
       foreach($res as $b){
           array_push($r2,$b['attemptDateTime']);

       }
       foreach($res as $c){
        array_push($r3,$c['cnt']);
        
    } 
    
    
    $data1=json_encode($r3);
    //echo $data1;
   // echo "<br>";
   // echo "<br>";


    $data2=json_encode($r2);
  //  echo $data2;
   // echo "<br>";
   // echo "<br>";
    $data3=json_encode($r1);
    //echo $data3;
   // $r_new=array();
  // return view('chart',compact('data3'));
   // return view('chart')->with($data1)
                      //  ->with($data2); 

     return view('sw',['data'=>$data1,'months'=>$data2,'monthCount'=>$data3]);


 }
     //return $res;
     /*
     $monthly_array=array(); 
     foreach($res as $data){
         $average=$data['avg'];
         $mScore=$data['count(candidateID)'];
        // $count=$data['count_of_candidates'];
         $month=$data['attemptDateTime'];
         if(array_key_exists($month,$monthly_array)){
             $monthly_array[$month][1]+=1;
             $monthly_array[$month][0]=((($monthly_array[$month][0]*($monthly_array[$monthid]))));
             $res2[$month]=Round($monthly_array[$month][0],2);

         }
         else{
             $monthly_array[$month]=array($mScore,1);
             $res2[$month]=$monthly_array[$month][0];

         }
         $data2=[];
         foreach($res2 as $row){
             $data2['label'][]=key($res);
             $data2['data'][]=$row;
             
             next($res2);
         }
         return $data2;
         


         
     } 
     */
 


 
 
 

 }


