<?php

namespace App\Http\Controllers\API\Koha;

use App\Models\Koha\Patron;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\Koha\PatronResource;
use App\Http\Resources\API\Koha\PatronCollection;

class PatronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrons = Patron::all()->take(50);

        return (new PatronCollection($patrons))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cardnumber)
    {
        $patron = Patron::where('cardnumber', $cardnumber)->first();

        if (!$patron) {
            return response()->json(['error' => 'Patron not found'], Response::HTTP_NOT_FOUND);
        }

        return (new PatronResource($patron))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}