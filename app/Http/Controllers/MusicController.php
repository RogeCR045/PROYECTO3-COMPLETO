<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Music::all(); 
        return view('musics.index', compact('musicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $music = request()->except('_token');
        Music::insert($music);
        return redirect()->to(url('/musics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        return view('musics.show', compact('music'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        return view('musics.edit', compact('music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        $dataMusic = request()->except('_toke');
        $music->update($dataMusic);
        return redirect()->to(url('/musics'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        $music->delete();
        return redirect()->to(url('/musics'));
    }
    public function exportMusicsToCSV(Request $request){
        $fileName= 'musics.csv';
        $musics = Music::all();

        $headers = array(
            "Content-type"              => "text/csv",
            "Content-Disposition"       => "attachment; fileName=$fileName",
            "Pragma"                    => "no-cache",
            "Cache-Control"             => "must-revalidate, post-check=0, pre-check=0",
            "Expires"                   => "0"
        );

        $columns = array('Nombre de la cancion', 'Artista', 'Genéro', 'Año de lanzamineto',
         'Album', 'Redes sociales', 'Tiempo escuchandolo', 'Letra', 'Comentario');

         $callback = function() use($musics, $columns){
             $file = fopen('php://output', 'w');
             fputcsv($file, $columns);

             foreach($musics as $music){
                 $row['songname']        = $music->songname;
                 $row['artist']          = $music->artist;
                 $row['gender']          = $music->gender;
                 $row['yearlaunch']      = $music->yearlaunch;
                 $row['album']           = $music->album;
                 $row['socialmedia']     = $music->socialmedia;
                 $row['timelistening']   = $music->timelistening;
                 $row['letter']          = $music->letter;
                 $row['comment']         = $music->comment;

                 fputcsv($file, array($row['songname'],  $row['artist'], $row['gender'],  $row['yearlaunch'],
                 $row['album'], $row['socialmedia'], $row['socialmedia'], $row['timelistening'], $row['letter'],
                 $row['comment']));
             }
             fclose($file);
         };
         return response()->stream($callback, 200, $headers);
    }
}
