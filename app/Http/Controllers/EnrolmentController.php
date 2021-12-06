<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrolment;
use DB;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return Enrolment::join('students', 'enrolments.stid', '=', 'students.id')
            ->join('modules', 'enrolments.mid', '=', 'modules.id')
            ->join('lecturers', 'enrolments.lid', '=', 'lecturers.id')
            //->select('enrolments.stid','students.firstname as st_firstname','students.lastname as st_lastname','lecturers.firstname as lec_firstname','lecturers.lastname as lec_lastname')
            ->get([
                'enrolments.stid',
                'students.firstname as st_firstname', 
                'students.lastname as st_lastname',
                'enrolments.mid',
                'modules.name', 
                'enrolments.lid',
                'lecturers.firstname as lec_firstname',
                'lecturers.lastname as lec_lastname',
                'enrolments.semester',
                'enrolments.mark']);
            
            /*
            $data = DB::table('enrolments')
                ->Join('students as t1', 'enrolments.stid', '=', 'students.id')
                ->Join('modules', 'enrolments.mid', '=', 'modules.id')
                ->Join('lecturers as t2', 'enrolments.lid', '=', 'lecturers.id')
                    ->select( 'enrolments.stid',
                    'students.firstname', 
                    'students.lastname',
                    'enrolments.mid',
                    'modules.name', 
                    'enrolments.lid',
                    'lecturers.firstname',
                    'lecturers.lastname',
                    'lecturers.email',
                    'enrolments.semester',
                    'enrolments.mark')
                 ->get();
                 //return view('join_table', compact('data'));
                 return $data;
                 */
            /*
                 $data = DB::table('enrolments')
                ->Join('students as t1', 'enrolments.stid', '=', 't1.id')
                ->Join('modules', 'enrolments.mid', '=', 'modules.id')
                ->Join('lecturers as t2', 'enrolments.lid', '=', 't2.id')
                    ->select( 'enrolments.stid',
                    't1.firstname', 
                    't1.lastname',
                    'enrolments.mid',
                    'modules.name', 
                    'enrolments.lid',
                    't2.firstname',
                    't2.lastname',
                    't2.email',
                    'enrolments.semester',
                    'enrolments.mark')
                 ->get();
                 //return view('join_table', compact('data'));
                 return $data;
                    */
        
        
                 // SQL equivalent:
        // SELECT students.first_name, students.last_name, institutions.name, institutions.region, institutions.country
        // FROM students
        // JOIN institutions on students.institution_id = institutions.id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        return Enrolment::create($request->all());
        
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
    public function show($stid) {
        //return Enrolment::find($stid);
        return Enrolment::join('students', 'enrolments.stid', '=', 'students.id')
        ->join('modules', 'enrolments.mid', '=', 'modules.id')
        ->join('lecturers', 'enrolments.lid', '=', 'lecturers.id')
        ->where('stid', $stid)
        ->get(['enrolments.stid',
        'students.firstname as st_firstname', 
        'students.lastname as st_lastname',
        'enrolments.mid',
        'modules.name',
        'semester',
        'mark' ]);
        //App\Hoge::where('other_id', 1)->firstOrFail();
        // SQL equivalent: SELECT * FROM institutions WHERE id = $id;
    }
    

    public function showModule($mid) {
        //return Enrolment::find($stid);
        return Enrolment::join('students', 'enrolments.stid', '=', 'students.id')
        ->join('modules', 'enrolments.mid', '=', 'modules.id')
        ->join('lecturers', 'enrolments.lid', '=', 'lecturers.id')
        ->where('mid', $mid)
        ->get([
            'enrolments.mid',
            'modules.name',
            'semester',
            'enrolments.stid',
            'students.firstname as st_firstname', 
            'students.lastname as st_lastname',
            'mark' ]);
        //App\Hoge::where('other_id', 1)->firstOrFail();
        // SQL equivalent: SELECT * FROM institutions WHERE id = $id;
    }

    public function showOneModule($stid,$mid,$semester) {
        //return Enrolment::find($stid);
        echo $stid,$mid;
        return Enrolment::join('students', 'enrolments.stid', '=', 'students.id')
        ->join('modules', 'enrolments.mid', '=', 'modules.id')
        ->join('lecturers', 'enrolments.lid', '=', 'lecturers.id')
        ->where('mid', $mid)
        ->where('stid',$stid)
        ->where('semester',$semester)
        ->get([
            'enrolments.mid',
            'modules.name',
            'semester',
            'enrolments.stid',
            'students.firstname as st_firstname', 
            'students.lastname as st_lastname',
            'mark' ]);
        //App\Hoge::where('other_id', 1)->firstOrFail();
        // SQL equivalent: SELECT * FROM institutions WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stid,$mid,$semester) {
    //echo $stid,$mid,$semester;
        return Enrolment::where('mid', $mid)
        ->where('stid',$stid)
        ->where('semester',$semester)
        ->update($request->all());
    

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
    public function destroy($stid,$mid,$semester) {
        return Enrolment::where('mid', $mid)
        ->where('stid',$stid)
        ->where('semester',$semester)
        ->delete();
        
        // SQL equivalent:
        // DELETE FROM institutions 
        // WHERE id = $id;
    }
}
