<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   // Display  listing of the contact.
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('contacts.index', compact('contacts'));
    }

   //Show the form for creating a new contact.
    public function create()
    {
        return view('contacts.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        Contact::create($request->only(['name', 'phone']));

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $contact->update($request->only(['name', 'phone']));

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

   
    public function importForm()
    {
        return view('contacts.import');
    }

    //Import contacts from XML file.
    public function import(Request $request)
    {
		//dd($request->file('xml_file')->getMimeType());

        $request->validate([
                'xml_file' => 'required|file|mimes:xml,txt|max:2048',

        ]);

        $xmlFile = $request->file('xml_file');
        $xmlContent = file_get_contents($xmlFile->getPathname());
        
        $xml = simplexml_load_string($xmlContent);
        
        if ($xml === false) {
            return redirect()->back()->with('error', 'Invalid XML file.');
        }

        $importedCount = 0;
        
        foreach ($xml->contact as $contactData) {
            $name = (string) $contactData->name;
            $phone = (string) $contactData->phone;
            
            if (!empty($name) && !empty($phone)) {
                Contact::create([
                    'name' => $name,
                    'phone' => $phone,
                ]);
                $importedCount++;
            }
        }

        return redirect()->route('contacts.index')->with('success', "Successfully imported {$importedCount} contacts.");
    }
}

