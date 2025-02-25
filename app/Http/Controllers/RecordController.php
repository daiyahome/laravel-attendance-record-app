<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();

        $events = $records->map(function ($record) {
            return [
                'title' => '出勤',
                'start' => $record->starting_time,
                'end' => $record->closing_time,
            ];
        });

        return response()->json($events);
    }
}
