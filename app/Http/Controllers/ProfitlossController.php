<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Expense;
use App\Employee;
use App\Assets;
use App\Product;
use App\Investment;
use App\Fund;
use DB;


class ProfitlossController extends Controller
{

  

    public function index()
    {
       

    
    }



    public function revenue()  
    {   

     
        
        $products = Product::latest()->paginate(10)->where('status', '=', 2);
        //dd($products);
        $revenue = 0;
      
        foreach($products as $product){

          $revenue += $product->real_selling_price - $product->buying_price;
            
        }
          
        return view('profitandloss.revenue', compact('revenue', 'products'));

    }

    public function expenses(){


      $expenses = Expense::all();
        
        //Expenses calculation

         $total = 0;
         $monthly = 0;
         $yearly = 0;
         $sum = 0;

      
        foreach($expenses as $expense){

        
        if($expense->monthly == 1){

        $monthly +=  $expense->price;
        $yearly = $monthly * 12 ;
        $sum = $yearly;
        }

        else
         $sum += $expense->price;
      }

      //Salaries calculation

       $employee = Employee::latest()->paginate(20);

       $t = 0;
       $y = 0;

      

       foreach ($employee as $emp) {
           $t += $emp->salary;
           $y += $emp->salary * 12;
       }

       $assets = Assets::latest()->paginate(20);


       $q = 0;
       $summary = 0;

       foreach($assets as $asset)

        if($asset->quantity == true){

        $q += $asset->price * $asset->quantity;

        }
        else
            
        $summary += $asset->price;

        $total_summary = $q + $summary;

        $total_expenses = $sum + $y + $total_summary;


    
      return view('profitandloss.expenses', compact('expenses', 'total_expenses'));
    }

     public function profit(){


      $expenses = Expense::all();

       $products = Product::latest()->paginate(10)->where('status', '=', 2);
        //dd($products);
        $revenue = 0;
      
        foreach($products as $product){

          $revenue += $product->real_selling_price - $product->buying_price;
            
        }
        
        //Expenses calculation

         $total = 0;
         $monthly = 0;
         $yearly = 0;
         $sum = 0;

      
        foreach($expenses as $expense){

        
        if($expense->monthly == 1){

        $monthly +=  $expense->price;
        $yearly = $monthly * 12 ;
        $sum = $yearly;
        }

        else
         $sum += $expense->price;
      }

      //Salaries calculation

       $employee = Employee::latest()->paginate(20);

       $t = 0;
       $y = 0;

      

       foreach ($employee as $emp) {
           $t += $emp->salary;
           $y += $emp->salary * 12;
       }

       $assets = Assets::latest()->paginate(20);


       $q = 0;
       $summary = 0;

       foreach($assets as $asset)

        if($asset->quantity == true){

        $q += $asset->price * $asset->quantity;

        }
        else
            
        $summary += $asset->price;

        $total_summary = $q + $summary;

        $profit = $revenue - ($sum + $y + $total_summary);

    
      return view('profitandloss.profit', compact('expenses', 'profit'));
    }



      public function balancesheet(){

        //Products availabe and pending

         $available_products = Product::all()->where('status', '=', 1);

        $profit_product = 0;
        $profit_available = 0;
      
        foreach($available_products as $available_product)

        $profit_available += $available_product->real_selling_price;
  
      

        $pending_products = Product::all()->where('status', '=', 3);

        
        $profit_pending = 0;
      
        foreach($pending_products as $pending_product){

           $profit_pending += $pending_product->real_selling_price - $pending_product->buying_price;
            
        }

         $profit_product =  $profit_available + $profit_pending;


         //Assets 

          $assets = Assets::all();


       $q = 0;
       $sum = 0;

       foreach($assets as $asset)

        if($asset->quantity == true){

        $q += $asset->price * $asset->quantity;

        }
        else
            
        $sum += $asset->price;

        $total = $q + $sum;

        //Funds available 

         $funds = Fund::all();

         $funds_total = 0;

         foreach($funds as $fund)

          $funds_total += $fund->amount;


        //Investment total 

       $investment = Investment::all();

       $investments_total = 0;

       foreach($investment as $invest)

        $investments_total += $invest->amount;

      //Profit


      $expenses = Expense::all();

       $products = Product::latest()->paginate(10)->where('status', '=', 2);
        //dd($products);
        $revenue = 0;
      
        foreach($products as $product){

          $revenue += $product->real_selling_price - $product->buying_price;
            
        }
        
        //Expenses calculation

         $total = 0;
         $monthly = 0;
         $yearly = 0;
         $sum = 0;

      
        foreach($expenses as $expense){

        
        if($expense->monthly == 1){

        $monthly +=  $expense->price;
        $yearly = $monthly * 12 ;
        $sum = $yearly;
        }

        else
         $sum += $expense->price;
      }

      //Salaries calculation

       $employee = Employee::latest()->paginate(20);

       $t = 0;
       $y = 0;

      

       foreach ($employee as $emp) {
           $t += $emp->salary;
           $y += $emp->salary * 12;
       }

       $assets = Assets::latest()->paginate(20);


       $q = 0;
       $summary = 0;

       foreach($assets as $asset)

        if($asset->quantity == true){

        $q += $asset->price * $asset->quantity;

        }
        else
            
        $summary += $asset->price;

        $total_summary = $q + $summary;

        $profit = $revenue - ($sum + $y + $total_summary);

        $a = $profit_product + $total + $funds_total;
        $p = $investments_total + $profit;



        return view('profitandloss.balancesheet', compact('products','profit_product', 'total', 'funds_total', 'investments_total', 'profit', 'a', 'p'));

        
     }





 
  }
