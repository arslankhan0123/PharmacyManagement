<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\User;
use App\Jobs\ExpiringMedicineJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpiringMedicine;

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
            'expiry_date' => 'required',
        ];
        $messages = [
            'medicine_name.required' => 'Medicine Name is required.',
            'quantity.required' => 'Quantity is required.',
            'selling_price.required' => 'Selling Price is required.',
            'expiry_date.required' => 'Expiry Date is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $medicine = new Medicine();
        $medicine->medicine_name = $request->medicine_name;
        $medicine->quantity = $request->quantity;
        $medicine->expiry_date = $request->expiry_date;
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
            'expiry_date' => 'required',
        ];
        $messages = [
            'medicine_name.required' => 'Medicine Name is required.',
            'quantity.required' => 'Quantity is required.',
            'selling_price.required' => 'Selling Price is required.',
            'expiry_date.required' => 'Expiry Date is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $medicine = Medicine::find($id);
        $medicine->medicine_name = $request->medicine_name;
        $medicine->quantity = $request->quantity;
        $medicine->expiry_date = $request->expiry_date;
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

    public function ExpiringMedicine($id)
    {
        $medicine = Medicine::find($id);
        // $email = 'arslan@gmail.com';
        $emails = ['arslan@gmail.com', 'another@example.com', 'more@example.com'];
        $input = [
            'Employee'=>$medicine->name,
            'Title' => $medicine->name,
            'LeaveType'=>$medicine->name,
            'message'=>'Employee Leave Created Successfully'];
        // Mail::to($email)->send(new ExpiringMedicine($input));
        // dispatch(new ExpiringMedicineJob($email));
        dispatch(new ExpiringMedicineJob($emails, $medicine));
        return redirect('/dashboard')->with('success', 'Email sent successfully!');
    }
}
