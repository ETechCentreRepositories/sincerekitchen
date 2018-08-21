<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        $title = 'Dashboard';
        return view('home')->with('title', $title);
    }

    public function inventory(){
        $title = 'Inventory';
        return view('inventory.index')->with('title', $title);
    }

    public function product(){
        $title = 'Product';
        return view('product.product')->with('title', $title);
    }

    public function customer(){
        $title = 'Customer';
        return view('customer.customer')->with('title', $title);
    }
    public function supplier(){
        $title = 'Supplier';
        return view('supplier.index')->with('title',$title);
    }

    public function employee(){
        $title = 'Employee';
        return view('employee.index')->with('title', $title);
    }

    public function salesorder(){
        $title = 'Sales Order';
        return view('salesorder.index')->with('title', $title);
    }
    
    
    public function purchaseorder(){
        $title = 'Purchase Order';
        return view('purchaseorder.index')->with('title',$title);
    }

    public function addproduct(){
        $title = 'Add Product';
        return view('product.addproduct')->with('title', $title);
    }

    public function addemployee(){
        $title = 'Add Employee';
        return view('employee.addemployee')->with('title', $title);
    }

    public function editproduct(){
        $title = 'Edit Product';
        return view('product.edit')->with('title', $title);
    }

    public function addcustomer(){
        $title = 'Add Customer';
        return view('customer.addcustomer')->with('title', $title);
    }


    public function addinventory(){
        $title = 'Add Inventory';
        return view('inventory.addinventory')->with('title',$title);

    }
    public function editinventory(){
        $title = 'Edit Inventory';
        return view('inventory.edit')->with('title',$title);

    }
    public function addsalesorder(){
        $title = 'Add Sales Order';
        return view('salesorder.addsalesorder')->with('title',$title);

    }
  
    public function editemployee(){
        $title = 'Edit Employee';
        return view('employee.edit')->with('title',$title);

    }
    
    public function editsalesorder(){
        $title = 'Edit Sales Order';
        return view('salesorder.edit')->with('title',$title);

    }
       
     public function viewsalesorder(){
        $title = 'View Sales Order';
     return view('salesorder.quotation')->with('title',$title);

     }

     public function addsupplier(){
         $title = 'Add Supplier';
         return view('supplier.addsupplier')->with('title',$title);
     }

     public function addpurchaseorder(){
        $title = 'Add Purchase Order';
        return view('purchaseorder.addpurchaseorder')->with('title',$title);
     }

     public function viewpurchaseorder(){
         $title = 'View Purchase Order';
         return view('purchaseorder.viewpurchaseorder')->with('title',$title);
     }
    
}
