<?php

namespace App\Http\Controllers;

use App\Info;
use App\Http\Requests\InfoRequest;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Info::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoRequest $request)
    {
        return Info::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        return Info::findOrFail($info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InfoRequest  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoRequest $request, $id)
    {
        $info = Info::findOrFail($id);
        $info->fill($request->except(['id']));
        $info->save();
        return response()->json($info);
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);
        if($info->delete()) return response(null, 204);
    }
}
