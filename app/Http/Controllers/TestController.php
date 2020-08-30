<?php

namespace App\Http\Controllers;
use Storage;
use App\Standard;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getJson(){
    	$file = Storage::disk('local')->get('standard.json');
    	$records = json_decode($file);

    	foreach($records as $record){
    		$s_record = (array) $record;
    		$f_item =(array)$s_record['_id'];
    		$oid= $f_item['$oid'];

    		$singleRecord= new Standard();
    		$singleRecord->oid= $oid;
    		$singleRecord->product_name= $s_record['product_name'];
    		$singleRecord->supplier= $s_record['supplier'];
    		$singleRecord->quantity= $s_record['quantity'];
    		$singleRecord->unit_cost= $s_record['unit_cost'];

    		$singleRecord->save();


    	}
    	 echo "Data saved successfully";
    }
}
