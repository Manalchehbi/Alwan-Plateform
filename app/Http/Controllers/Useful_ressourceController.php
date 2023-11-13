<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Useful_resources;
use App\Models\Student;
use DB;
class Useful_ressourceController extends Controller
{
    public function formAdd()
    {
        return view('usefuls.useful_ressources');
    }

    //affichage
    public function formall()
    {
        $useful = Useful_resources::all();
        return view('usefuls.all_usefuls',compact('useful'));
    }

    //get all useful resources
    public function allUsefuls()
    {

        $useful = Useful_resources::paginate(2000);

        return view('usefuls.useful_page',compact('useful'));
    }
    public function insert(Request $request)
{
    $request->validate([
        'name'         =>   'required|string',
        'link'         =>   'required|string',
    ]);
    $usefuls =  new Useful_resources();
    $usefuls->name=$request->input('name');
    $usefuls->link=$request->input('link');
    $usefuls->save();


    return redirect('usefuls/add_useful_ressources')->with('success', 'useful_resourcescréer avec succèss');
}

//--------------------------edit 
public function edit($id)
{
    $usefuls = Useful_resources::find($id);
    return view('usefuls.edit', compact('usefuls'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name'         =>   'required|string',
        'link'         =>   'required|string',
    ]);
    $usefuls = Useful_resources::find($id);
    $usefuls->name = $request->input('name');
    $usefuls->link = $request->input('link');
   
    $usefuls->update();
    return redirect()->back()->with('status','useful resource Updated Successfully');
}

public function delete($id)
{
    $useful = Useful_resources::find($id);
    $useful->delete();
    return redirect()->back()->with('success','useful deleted Successfully');
}
}
