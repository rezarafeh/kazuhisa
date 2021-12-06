<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Lecturer::all();
        
        // SQL equivalent: SELECT * FROM institutions;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return Lecturer::create($request->all());
        
        // SQL equivalent: 
        // INSERT INTO institutions 
        // VALUES ($request->name, $request->region, $request->country);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Lecturer::find($id);
    
        // SQL equivalent: SELECT * FROM institutions WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
    $lecturer = Lecturer::find($id);
    $lecturer->update($request->all());
    return $lecturer;

    // SQL equivalent:
    // UPDATE institutions
    // SET name = $request->name, region = $request->region, country = $request->country
    // WHERE id = $id;
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Lecturer::destroy($id);
        
        // SQL equivalent:
        // DELETE FROM institutions 
        // WHERE id = $id;
    }
}
