<?php

namespace App\Http\Controllers;

use App\Models\Discover;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\DiscoverDataTable;
use Illuminate\Support\Facades\Storage;

class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discovers = Discover::all();
        return view("admin.discover.index", compact("discovers"));
        // return $dataTable->render('admin.discover.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.discover.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'discover_title'=>'required',
            'discover_location'=>'required',
            'image'=>'required|image|file|max:3072',
        ]);
        try {
            DB::table('discovers')->insert([
                'discover_id'=>Str::uuid(),
                'discover_title'=>$validated['discover_title'],
                'discover_location'=>$validated['discover_location'],
                'discover_image'=>$request->file('image')->store('discover'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect()->route('discover.index')->with("success","Discover berhasil ditambahkan.");
        } catch (\Throwable $th) {
            return redirect()->route('discover.index')->with("error","Discover berhasil ditambahkan.");

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discover $discover)
    {
        // dd($discover);
        return view("admin.discover.edit",compact("discover"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discover $discover)
    {
        $validated = $request->validate([
            'discover_title'=>'required',
            'discover_location'=>'required',
            'image'=>'required|image|file|max:3072',
        ]);
        try {
            $discover->discover_title = $validated['discover_title'];
            $discover->discover_location = $validated['discover_location'];

            if ($request->hasFile('image')) {
                Storage::delete($discover->discover_image);
                $path = $request->file('image')->store('discover');
                $discover->discover_image = $path;
            }
            $discover->save();
            return redirect()->route('discover.index')->with("success","Discover berhasil diUpdate.");

        } catch (\Throwable $th) {
            return redirect()->route('discover.index')->with("error","Discover berhasil diUpdate.");

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discover $discover)
    {

        try {
            Storage::delete($discover->discover_image);
            Discover::destroy($discover->discover_id);
            return redirect()->route('discover.index')->with("success","Discover berhasil diHapus.");
        } catch (\Throwable $th) {
            return redirect()->route('discover.index')->with("error","Discover berhasil diHapus.");

        }



    }
}
