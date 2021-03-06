<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Region;
use App\County;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Nathanmac\Utilities\Parser\Parser;
use Nathanmac\Utilities\Parser\Exceptions\ParserException;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('poi.region.index')->with('regions', $regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $region = Region::raw()->findOne(['_id' => intval($id)]);

        $items = County::where('region_id', intval($id))->get();

        return view('poi.region.show')->with('region', $region)->with('items', $items);
    }

    public function geo($id)
    {
        $region = Region::find(intval($id));
        $parser = new Parser();
        return response()->json($parser->json($region['geo']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
