<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(5);
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request)
    {
        $inputs = $request->validated();
        $c = Contact::create($inputs);

        return redirect()->route('contact.show', ['contact' => $c->id])->with('success', 'Contact successfully registered!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest $request, Contact $contact)
    {
        $inputs = $request->validated();
        $contact->update($inputs);

        return redirect()->route('contact.show', ['contact' => $contact->id])->with('success', 'Contact successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('contact.index')->with('success', 'Contact successfully deleted!');
    }
}
