<?php

namespace App\Http\Controllers;

use App\Http\Requests\Salary\StoreRequest;
use App\Http\Requests\Salary\UpdateRequest;
use App\Http\Resources\SalaryResource;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::all();
        return SalaryResource::collection($salaries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $salary = Salary::create($data);

        return SalaryResource::make($salary);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salary = Salary::find($id);

        if (!$salary) {
            return response()->json(['message' => $id], 404);
        } else {
            return SalaryResource::make($salary);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Salary $salary)
    {
        $data = $request->validated();
        $salary->update($data);

        return SalaryResource::make($salary);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
