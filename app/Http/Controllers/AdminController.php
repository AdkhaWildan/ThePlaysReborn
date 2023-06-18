<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Games;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;

            if($usertype=='admin')
            {
                    $data = Games::all();
                    return view('admin.admindashboard', compact('data'));
            }

            elseif ($usertype=='user')
            {
                    
                    return view('dashboard');
            } 

        }
    }

    public function create()
    {
        return view('admin.adminpost');
    }

    
    public function store(Request $request)
    {

        // return $request->file('image')->store('images');
        
        $request->validate([
            // 'image' => ['required', 'image', 'mimes:jpeg,jpg,png' ,'max:2048'],
            'gamename' => ['required', 'string', 'max:255'],
            // 'developer' => ['required', 'string', 'max:255'],
            // 'publisher' => ['required', 'string', 'max:255'],
            // 'description' => ['required', 'string', 'max:255'],
            // 'releasedate' => ['required', 'date', 'max:255'],
            // 'price' => ['required', 'integer', 'max:255'],
            
        ]);
        
        $game = new Games;
        $game->gamename = $request->input('gamename');
        $game->developer = $request->input('developer');
        $game->publisher = $request->input('publisher');
        $game->description = $request->input('description');
        $game->releasedate = $request->input('releasedate');
        $game->price = $request->input('price');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $file->move('images/game/', $filename);
            $game->image = $filename;
            
        }
        $game->save();


        
        return redirect()->back()->with('status', 'Game Image Added Successfully');
        // return view('admin.adminpost');
    }

    // function show(){
    //     $data = Games::all();
    //     return view('admin.admindashboard',compact('data'));
    // }
}