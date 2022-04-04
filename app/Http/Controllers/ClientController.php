<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $citys = City::all();
        $clients = DB::table('clients')->select('id', 'name', 'city')
            ->where('city', 'LIKE', '%' . $texto . '%')
            ->orWhere('city', 'LIKE', '%' . $texto . '%')
            ->orderBy('city', 'asc')
            ->paginate(2);
        return view('client', compact('clients', 'texto','citys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
        ]);

        $client = new Client([
            'name' => $request->get('name'),
            'city' => $request->get('city'),


        ]);

        $client->save();
        return redirect('/client')->with('success', 'Se inserto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',

        ]);

        $client->update($request->all());
        return redirect('/client')->with('success', 'Se Actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/client')->with('success', 'Se elimino correctamente');
    }
}
