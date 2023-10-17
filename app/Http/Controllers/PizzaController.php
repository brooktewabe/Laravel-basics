<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
 {
//   //Protect routes-but this requires login for every page including order,so a workaround would be the routes
//   public function __construct(){
//     $this->middleware('auth');
//   }

  public function index() {

    //get all
    $pizzas=Pizza::all();
    //ordered but need to have a get
    //$pizzas=Pizza::orderBy('name','desc')->get();
    //get specific
    //$pizzas=Pizza::where('type','Hawaiian')->get();

    return view('pizzas.index', ['pizzas' => $pizzas,]);
  }

  public function show($id) {
    // use the $id variable as query param and $name as route param
   // return view('pizzas.show', ['name' => request('name'),'id' => $id]);
   $pizza=Pizza::findOrFail($id);

   return view('pizzas.show',['pizza'=>$pizza]);
  }
  public function create(){
    return view('pizzas.create');
  }
  public function store() {

    $pizza = new Pizza();

    $pizza->name = request('name');
    $pizza->type = request('type');
    $pizza->base = request('base');
    $pizza->toppings = request('toppings');

    $pizza->save();

    return redirect('/')->with('mssg', 'Thanks for your order!');

  }
  public function destroy($id) {

    $pizza = Pizza::findOrFail($id);
    $pizza->delete();

    return redirect('/pizzas');

  }

}