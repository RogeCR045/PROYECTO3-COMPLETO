<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = request()->except('_token');
        Contact::insert($contact);
        return redirect()->to(url('/contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $dataContact = request()->except('_toke');
        $contact->update($dataContact);
        return redirect()->to(url('/contacts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->to(url('/contacts'));
    }
    public function exportContactsToCSV(Request $request){
        $fileName= 'contacts.csv';
        $contacts = Contact::all();

        $headers = array(
            "Content-type"              => "text/csv",
            "Content-Disposition"       => "attachment; fileName=$fileName",
            "Pragma"                    => "no-cache",
            "Cache-Control"             => "must-revalidate, post-check=0, pre-check=0",
            "Expires"                   => "0"
        );

        $columns = array('Nombre completo', 'Edad en años', 'Dirección de correo', 'Contraseña',
         'Calle y codigo postal', 'Localidad', 'Ciudad', 'Estado', 'Sitio web');

         $callback = function() use($contacts, $columns){
             $file = fopen('php://output', 'w');
             fputcsv($file, $columns);

             foreach($contacts as $contact){
                 $row['fullname']                   = $contact->fullname;
                 $row['years']                      = $contact->years;
                 $row['mailaddress']                = $contact->mailaddress;
                 $row['password']                   = $contact->password;
                 $row['Street']                     = $contact->Street;
                 $row['location']                   = $contact->location;
                 $row['city']                       = $contact->city;
                 $row['condition']                  = $contact->condition;
                 $row['website']                    = $contact->website;

                 fputcsv($file, array($row['fullname'],  $row['years'], $row['mailaddress'],  $row['password'],
                 $row['Street'], $row['location'], $row['city'], $row['condition'], $row['website']));
             }
             fclose($file);
         };
         return response()->stream($callback, 200, $headers);
    

    
    }
}
