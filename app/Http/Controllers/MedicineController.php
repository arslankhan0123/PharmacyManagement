<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\User;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('created_at', 'DESC')->get();
        return view('admin.medicine.index', compact('medicines'));
    }

    public function create()
    {
        return view('admin.medicine.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'medicine_name' => 'required',
            'quantity' => 'required',
            'purchasing_price' => 'required',
            'selling_price' => 'required',
        ];
        $messages = [
            'medicine_name.required' => 'Medicine Name is required.',
            'quantity.required' => 'Quantity is required.',
            'selling_price.required' => 'Selling Price is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $medicine = new Medicine();
        $medicine->medicine_name = $request->medicine_name;
        $medicine->quantity = $request->quantity;
        $medicine->purchasing_price = $request->purchasing_price;
        $medicine->selling_price = $request->selling_price;
        $medicine->save();
        return redirect('/Medicine')->with('success', 'Medicine created successfully!');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('admin.medicine.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'medicine_name' => 'required',
            'quantity' => 'required',
            'purchasing_price' => 'required',
            'selling_price' => 'required',
        ];
        $messages = [
            'medicine_name.required' => 'Medicine Name is required.',
            'quantity.required' => 'Quantity is required.',
            'selling_price.required' => 'Selling Price is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $medicine = Medicine::find($id);
        $medicine->medicine_name = $request->medicine_name;
        $medicine->quantity = $request->quantity;
        $medicine->purchasing_price = $request->purchasing_price;
        $medicine->selling_price = $request->selling_price;
        $medicine->save();
        return redirect('/Medicine')->with('success', 'Medicine updated successfully!');
    }

    public function delete($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect('/Medicine')->with('error', 'Medicine deleted successfully!');
    }
}
