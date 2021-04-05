<?php

namespace App\Http\Controllers;
use App\Models\Envio;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class EnvioController extends Controller
{
    function createDelivery (Request $request){
        if($request->isJson()){
            $data = $request->json()->all();
            $data = json_encode($data);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://stage.api.enviame.io/api/s2/v2/companies/401/deliveries',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'api-key: ea670047974b650bbcba5dd759baf1ed',
                'Content-Type: application/json'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $objectResponse = json_decode($response);
            $envio = Envio::create([
                'identifier' => $objectResponse->data->identifier,
                'imported_id' => $objectResponse->data->imported_id,
                'tracking_number' => $objectResponse->data->tracking_number,
                'id_status' => $objectResponse->data->status->id,
                'code_status' => $objectResponse->data->status->code,
                'customer_name' => $objectResponse->data->customer->full_name,
                'customer_phone' => $objectResponse->data->customer->phone,
                'costomer_email' => $objectResponse->data->customer->email,
                'shipping_address' => $objectResponse->data->shipping_address->full_address,
                'shipping_address_place' => $objectResponse->data->shipping_address->place,
                'shipping_address_type' => $objectResponse->data->shipping_address->type,
                'country' => $objectResponse->data->country,
                'carrier' => $objectResponse->data->carrier,
                'service' => $objectResponse->data->service,
                'lavel_pdf' => $objectResponse->data->label->PDF,
                'barcodes' => $objectResponse->data->barcodes,
                'deadline' => $objectResponse->data->deadline_at
            ]);
            return response()->json($envio, status:201) ;
        }else{
            return response()->json(['error' => 'Unauthorized'], status:401) ;
        }
    }
}
