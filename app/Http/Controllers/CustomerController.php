<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //function for get customer table view
    public function index()
    {
        $customers = Customer::with(['lastInvoices', 'getDueDate'])->get();
        return view('customer.list_customer', compact('customers'));
    }

    //function for get form add cutomer
    public function addCustomerview()
    {
        $packages = Package::all();
        return view('customer.add_customer', compact('packages'));
    }

    //function for add customer adn send to database
    public function store(Request $request)
    {
        // validation in form

        $validated = $request->validate([
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

        try {
            Customer::create($validated);
            return redirect()->back()->with('success', 'data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'gagal menyimpan data' . $e->getMessage())->withInput();
        }
        //while success, redirect to form and throwing success message
    }

    //function for get all customer
    public function get()
    {
        $customers = Customer::all();
        //retun back to table customer view and show all customer data
        return view('customer.list_customer', compact('customers'));
    }

    //function for delete customer by id
    //this function is aplied in delete button
    public function destroy($id)
    {
        $customer_id = Customer::findOrFail($id);
        //check if customer id is empty or cant found
        //redirect back to table and show error message
        if (!$customer_id) {
            return redirect()->back()->with('error', 'data tidak bisa dihapus');
        }

        //if the customer id found in database
        //redirec with success message
        $customer_id->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
