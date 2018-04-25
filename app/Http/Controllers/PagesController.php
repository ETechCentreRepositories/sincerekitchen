<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        $title = 'Dashboard';
        return view('dashboard')->with('title', $title);
    }

    public function inventory(){
        $title = 'Inventory';
        return view('inventory.index')->with('title', $title);
    }

    public function product(){
        $title = 'Product';
        return view('inventory.product')->with('title', $title);
    }

    public function customer(){
        $title = 'Customer';
        return view('customer.index')->with('title', $title);
    }

    public function employee(){
        $title = 'Employee';
        return view('employee.index')->with('title', $title);
    }

    public function salesorder(){
        $title = 'Sales Order';
        return view('salesorder.index')->with('title', $title);
    }

    public function addproduct(){
        $title = 'Add Product';
        return view('inventory.create')->with('title', $title);
    }

    public function addemployee(){
        $title = 'Add Employee';
        return view('employee.create')->with('title', $title);
    }

    public function editproduct(){
        $title = 'Add Product';
        return view('inventory.edit')->with('title', $title);
    }

    public function editemployee(){
        $title = 'Add Employee';
        return view('employee.edit')->with('title', $title);
    }
}
