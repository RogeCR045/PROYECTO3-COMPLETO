<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $animal = request()->except('_token');
        Animal::insert($animal);
        return redirect()->to(url('/animals'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $dataAnimal = request()->except('_toke');
        $animal->update($dataAnimal);
        return redirect()->to(url('/animals'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->to(url('/animals'));
    }
    public function exportAnimalsToCSV(Request $request){
        $fileName= 'animals.csv';
        $animals = Animal::all();

        $headers = array(
            "Content-type"              => "text/csv",
            "Content-Disposition"       => "attachment; fileName=$fileName",
            "Pragma"                    => "no-cache",
            "Cache-Control"             => "must-revalidate, post-check=0, pre-check=0",
            "Expires"                   => "0"
        );

        $columns = array('Animal', 'Edad', 'Lugar de origen', 'clima',
         'Color', 'Pejale', 'Comida', 'Comentario');

         $callback = function() use($animals, $columns){
             $file = fopen('php://output', 'w');
             fputcsv($file, $columns);

             foreach($animals as $animal){
                 $row['animal']                    = $animal->animal;
                 $row['age']                       = $animal->age;
                 $row['birthplace']                = $animal->birthplace;
                 $row['climate']                   = $animal->climate;
                 $row['color']                     = $animal->color;
                 $row['fur']                       = $animal->fur;
                 $row['food']                      = $animal->food;
                 $row['comemmtanim']               = $animal->comemmtanim;
                 
                 fputcsv($file, array($row['animal'],  $row['age'], $row['birthplace'],  $row['climate'],
                 $row['color'], $row['fur'], $row['food'], $row['comemmtanim']));
             }
             fclose($file);
         };
         return response()->stream($callback, 200, $headers);
    }
}
