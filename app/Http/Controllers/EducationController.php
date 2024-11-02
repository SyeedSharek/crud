<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $educations = Education::all();           
            return view('information.index', compact('educations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' =>'required|email', 
            'program' => 'required|string|max:255',
        ]);
    
        $education = Education::create($validatedData);
        
    
        
        return response()->json(['message' => 'Successfully added education record', 'education' => $education], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $education = Education::findOrFail($id); 
        return view('information.edit', compact('education')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'program' => 'required|string|max:255',
        ]);

        $education = Education::findOrFail($id); 
        $education->update($validatedData); 

        return redirect()->route('education.index')->with('message', 'Successfully updated education record'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
    
        return response()->json(['message' => 'Education record deleted successfully.']);
    }
}
