<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use Torann\GeoIP\Facades\GeoIP;
use App\Services\TimezoneService;
use Auth;
use Carbon\Carbon;

class RecordController extends Controller
{
    protected $timezoneService;

     public function __construct(TimezoneService $timezoneService)
    {
        $this->timezoneService = $timezoneService;
    }

    public function addRecord()
    {
       return view('addRecord');
    }

    public function store(Request $request)
{
    $request->validate([
        'task_name' => 'required|max:255',
        'task_description' => 'required|max:1024',
    ]);

    auth()->user()->records()->create([
        'task_name' => $request->task_name,
        'task_description' => $request->task_description,
    ]);

    return redirect()->route('records.show')->with('success', 'Record added successfully!');
}

public function showRecords(){

    return view('allRecords');
}


public function loadRecords(Request $request){

    $records = Auth::user()->records;

    $records = $this->timezoneService->processRecordsWithTimezone($request, $records);

    return response()->json($records);
}




public function deleteRecord($id){
     $record = Record::findOrFail($id);
     $record->delete();


    return response()->json(['status' => 'success', 'message' => 'Record deleted successfully']);
}
}