<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Gender;
use App\Traits\ApiResponser;

class GenderController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of genders
     * @return \Illuminate\Http\Response
     * 
     */

     public function index(){
        $genders = Gender::all();

        return $this->successResponse($genders);
     }


    /**
     * Store a newly created gender in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         //rules for creating a Gender
         $rules = [
            'name'=> 'required|max:255',
            'description' => 'required|max:255'
         ];

         //validate the request
         $this->validate($request,$rules);

         //Create a new gender
         $gender = Gender::create($request->all());

         //return the new gender
         return $this->successResponse($gender);
    }

    /**
     * Return a specific Gender
     * @param \App\Models\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function show($gender){
        //find a specific gender
        $gender = Gender::findOrFail($gender);

        //return a specific gender
        return $this->successResponse($gender);

    }

    /**
     * Update a specific Gender
     * @param \App\Models\Gender $gender
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gender){
        //rules for updating a gender
        $rules = [
            'name' => 'max:255',
            'description' => 'max:255'
        ];

        //validate the request
        $this->validate($request,$rules);

        //Find a specific gender
        $gender = Gender::findOrFail($gender);

        //Update the gender
        $gender->fill($request->all());

        //Check if the gender has changed
        if($gender->isClean()){
            return $this->errorResponse('At least one value must be change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //save the gender
        $gender->save();

        //return the changed gender
        return $this->successResponse($gender);

    }

    /**
     * Delete a specific Gender
     * @param \App\Models\Gender $gender
     * @return \Illuminate\Http\Response
     */

     public function destroy($gender){
        //find a specific gender
        $gender = Gender::FindOrFail($gender);

        //Delete the specific gender
        $gender->delete();

        //Return the deleted gender
        return $this->successResponse($gender);
     }


}
