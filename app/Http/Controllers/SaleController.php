<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Sale, Travel, User};
use App\Http\Requests\Sale as SaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        $travels = Travel::all();
        $users = User::all();

        return view('user/commands' ,compact('sales', 'travels', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $saleRequest)
    {
        Sale::create($saleRequest->all());
        $travel = Travel::find($saleRequest->travel_id);
        $newStock = $saleRequest->stock - $saleRequest->numberPlaces;
        $travel->update(['stock' => $newStock]);
        return view('user/comands')->with('info', 'la commande a bien été enregistrée. Notre équipe va vous contacter dans les plus brefs délais afin de convenir du moyen et de la date de paiement ainsi que d\'obtenir des informations nécessaires pour l\'organisation du voyage.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
