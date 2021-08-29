<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends Controller
{	
    /**
     * ContactService Implementation.
     * 
     * @var ContactService
     */
	private $contactService;

    /**
     * Constructor of the controller.
     * 
     * @param \App\Services\ContactService $contactService
     * @return void
     */
	public function __construct(ContactService $contactService)
	{
		$this->contactService = $contactService;
	}

    public function index()
    {
    	$contacts = $this->contactService->getPaginateData(10);

        return view('contacts.index', ['contacts' => $contacts]);
    }

    public function create()
    {
    	return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
    	$this->contactService->createData($request->only([
            'name',
            'number',
            'active',
        ]));

        return redirect()->route('contact.index');
    }

    public function show($id)
    {
    	$contact = $this->contactService->getByIdData($id);

        return view('contacts.show', ['contact' => $contact]);
    }

    public function edit($id)
    {
    	$contact = $this->contactService->getByIdData($id);

        return view('contacts.edit', ['contact' => $contact]);
    }

    public function update(ContactRequest $request, $id)
    {
        $contact = $this->contactService->updateData($id, $request->only([
            'name',
            'number',
            'active',
        ]));

        return redirect()->route('contact.index');
    }

    public function destroy($id)
    {
    	$this->contactService->deleteData($id);

        return redirect()->route('contact.index');
    }
}
