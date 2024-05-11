<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oreouser;

class OreouserController extends Controller
{
    public function index(Request $request)
    {
        $query = Oreouser::query();

        // Filtering based on specified fields
        if ($request->filled('age')) {
            $query->where('age', $request->age);
        }

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('firstname', 'like', "%$searchTerm%")
                      ->orWhere('lastname', 'like', "%$searchTerm%")
                      ->orWhere('nickname', 'like', "%$searchTerm%");
            });
        }

        // Sorting
        if ($request->filled('sort') && $request->filled('order')) {
            $sortField = $request->sort;
            $sortOrder = $request->order;
            $query->orderBy($sortField, $sortOrder);
        }

        // Limiting results
        if ($request->filled('limit')) {
            $limit = $request->limit;
            $query->limit($limit);
        }

        // Execute the query and return the results
        $oreousers = $query->get();

        return response()->json($oreousers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'nickname' => 'nullable|string',
        ]);
    
        // Create a new Oreouser instance with the validated data
        $oreouser = Oreouser::create($request->all());
    
        // Return the newly created Oreouser as the response
        return response()->json($oreouser, 201);
    }
    
    
    public function show($id)
    {
        $oreouser = Oreouser::findOrFail($id);
        return response()->json($oreouser);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'nickname' => 'nullable|string',
        ]);
    
        // Find the Oreouser by ID
        $oreouser = Oreouser::findOrFail($id);
    
        // Update the Oreouser with the validated data
        $oreouser->update($request->all());
    
        // Return the updated Oreouser as the response
        return response()->json($oreouser);
    }
    
    
    public function destroy($id)
    {
        $oreouser = Oreouser::findOrFail($id);
        $oreouser->delete();
        return response()->json(['message' => 'Oreouser deleted successfully']);
    }
}
