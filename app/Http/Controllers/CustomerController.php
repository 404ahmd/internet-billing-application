<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();
        return view('customer.list_customer', compact('customers'));
    }

    public function addCustomerview(){
        return view('customer.add_customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:customers,username',
            'phone' => 'required|digits_between:10,15',
            'address' => 'required',
            'package' => 'required',
            'group' => 'required',
            'join_date' => 'required',
            'status' => 'required',
            'notes' => 'required'
        ]);

        $existing = Customer::where('name', $request->name)->orWhere('username', $request->username)->first();
        if ($existing) {
            return back()->with('error', 'name atau username sudah digunakan');
        }

        Customer::create([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'package' => $request->package,
            'group' => $request->group,
            'join_date' => $request->join_date,
            'status' => $request->status,
            'last_payment_date' => Carbon::now()->toDateString(),
            'due_date' => Carbon::now()->addDays(30)->toDateString(),

            'notes' => $request->notes
        ]);

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function get(){
        $customers = Customer::all();
        return view('customer.list_customer', compact('customers'));
    }

    public function destroy($id){
        $customer_id = Customer::findOrFail($id);
        if (!$customer_id) {
            return redirect()->back()->with('error', 'data tidak bisa dihapus');
        }

        $customer_id->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
