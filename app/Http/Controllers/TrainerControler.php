<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Trainer;
use Illuminate\Http\Request;
use LaraDex\Http\Requests\StoreTrainerRequest;

class TrainerControler extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    $request->user()->authorizeRoles(['user','admin']);
    $trainers = Trainer::all();

    return view('trainers.index', compact('trainers'));
    //  return 'Hola desde controlador resource';
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('trainers.create');
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(StoreTrainerRequest $request)
  {


    if ($request->hasFile('avatar')) {
      // code...
      $file=$request->file('avatar');
      $name= time().$file->getClientOriginalName();
      $file->move(public_path().'/images/',$name);
    }
    $trainer = new Trainer();
    $trainer->name = $request->input('name');
    $trainer->description = $request->input('description');
    $trainer->slug = $request->input('name');
    $trainer->avatar = $name;
    $trainer->save();
    return redirect()->route('trainers.index');
    //return'Saved';
    //  return $request->input('name');//imprime un dato especifico
    //  return $request->all(); imprime todo
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Trainer $trainer)
  {
    // $trainer = Trainer::where('slug','=',$slug)->firstOrFail();
    // return $slug;
    //$trainer = Trainer::find($id);
    return view('trainers.show',compact('trainer'));
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Trainer $trainer)
  {
    //
    return view('trainers.edit',compact('trainer'));

  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $slug)
  {
    $trainer = Trainer::where('slug','=',$slug)->firstOrFail();

    if ($request->hasFile('avatar') ){
      $file_path = public_path().'/images/'.$trainer->avatar;
      \File::delete($file_path);
      $file=$request->file('avatar');
      $name= time().$file->getClientOriginalName();
      $file->move(public_path().'/images/',$name);
      $trainer->avatar = $name;

    }

    $trainer->name = $request->input('name');
    $trainer->description = $request->input('description');
    $trainer->slug = $request->input('name');
    $trainer->save();
    //return 'Registro modificado con éxito...';
    return redirect()->route('trainers.show',[$trainer])->with('status','Entrenador actualizado  correctamente');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Trainer $trainer)
  {

    $file_path = public_path().'/images/'.$trainer->avatar;
    \File::delete($file_path);
    $trainer->delete();
    //  return 'deleted';
    return redirect()->route('trainers.index');

    //
  }
}
