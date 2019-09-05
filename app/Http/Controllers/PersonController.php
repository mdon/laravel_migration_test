<?php

namespace App\Http\Controllers;

use App\Person;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    public static function addCORSHeaders()
    {
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Content-Type: application/json; charset=UTF-8");
    }

    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource 
    {
        self::addCORSHeaders();

        return new PersonResource($person);
    } 

    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    public function store(Request $request){
        $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'phone'       => 'required',
            'email'       => 'required',
            'city'        => 'required'
        ]);

        return new PersonResource($person);
    }

    public function update(Person $person, Request $request): PersonResource
    {
        $person -> update($request->all());

        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Person $person)
    { 
        self::addCORSHeaders();

        $person->delete();
        return response()->json();
    }

    public function add(Person $person, Request $request)
    {
        self::addCORSHeaders();

        $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'phone'       => 'required',
            'email'       => 'required'
            //'city'        => 'required'
        ]);
        
        $person -> insert($request->all());

        return new PersonResource($person);
    }
}
