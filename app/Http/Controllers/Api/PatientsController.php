<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Resources\PatientResource;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();

        return PatientResource::collection($patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'file_number' =>'required',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'gender' =>'required|string',
            'dob' => 'required|date',
            'phone_number' => 'required|integer',
            'next_of_kin' => 'requied|string',
            'next_of_kin_phone' => 'required|integer'

        ]);

        $patient = Patient::create([
            'file_number' => $request->file_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone_number' => $request->phone_number,
            'next_of_kin' => $request->next_of_kin,
            'next_of_kin_phone' => $request->next_of_kin_phone,

          ]);
    
          return new PatientResource($patient);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        return new PatientResource($patient);
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
        $patient = Patient::findOrFail($id);
        $patient->update($request->only([
            'first_name',
            'last_name',
            'gender',
            'dob',
            'phone_number',
            'next_of_kin',
            'next_of_kin_phone'
        ]));
        return new PatientResource($patient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);
      $patient->delete();
       return response()->json(null, 204);
    }
}
