<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Diagram;

class DiagramController extends Controller
{
   public function today()
    {
        //$today = Carbon::today();
        //$today = $today->year . '_' . $today->month . '_' . $today->day;
        $today = Diagram::DEFAULT_DATE;
        $latlngs = Diagram::select('latitude', 'longitude', 'filename')
            ->where('date', $today)
            ->get();

        return view('today')->with([
            'latlngs' => $latlngs,
            'amount' => count($latlngs),
        ]);

        /*
         * Cornford:googlmapper initial code
         */
        //Mapper::map(30, -30, ['marker' => false, 'zoom' => 2]);

        /*foreach ($latlngs as $latlng){
            $diagramPath = "<img src='storage/$latlng->filename'>";
            Mapper::informationWindow($latlng->latitude,
                $latlng->longitude,
                $diagramPath,
                ['open' => false, 'maxWidth'=> 300, 'markers' => ['title' => 'Title']]);
        }*/
    }

    public function store(Request $request)
    {
        $num = 0;
        foreach ($request->file('diagrams') as $diagram) {
            $filename = basename($diagram->getClientOriginalName(), ".jpg");
            list($lat, $long, $day, $month, $year) = explode('_', $filename);
            $date = $year . '_' . $month . '_' . $day;
            $filename = $lat . '_' . $long . '_' . $date . ".jpg";
            $insert = Diagram::updateOrcreate([
                'latitude' => $lat,
                'longitude' => $long,
                'date' => $date,
                'filename' => $filename
            ]);
            $insert->save();

            $diagram->storeAs('public', $filename);
            $num++;
        }
        return view('admin.img-upload-result', compact('num'));
    }

}
