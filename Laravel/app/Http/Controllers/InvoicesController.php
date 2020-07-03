<?php

namespace App\Api\V1\Controllers;
use App\Api\V1\Transformers\PaymentInvoicesTransformer;
use App\Http\Controllers\Controller;
use App\Api\V1\Serializers\NoDataArraySerializer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try{
            $user = Auth::user();

            $manager = new Manager();
            $manager->setSerializer(new NoDataArraySerializer());

            $payments = $user->payments()->orderBy('created_at','DESC')->get();
            $payments = new Collection($payments, new PaymentInvoicesTransformer());

            $manager = $manager->createData($payments);

            return response()->json([
                'status' => true,
                'data' => $manager->toArray(),
                'message' => 'Invoices successfully retrieved!'
            ]);


        }catch (\ErrorException $exception){
            return response()->json([
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'
            ]);
        }
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
    public function store(Request $request)
    {
        //
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
