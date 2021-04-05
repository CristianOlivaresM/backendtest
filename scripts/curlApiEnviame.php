<?php 
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
    CURLOPT_POSTFIELDS =>'{
        "shipping_order": {
            "n_packages": "1",
            "content_description": "ORDEN 255826267",
            "imported_id": "255826267",
            "order_price": "24509.0",
            "weight": "0.98",
            "volume": "1.0",
            "type": "delivery"
        },
        "shipping_origin": {
            "warehouse_code": "401"
        },
        "shipping_destination": {
            "customer": {
                "name": "Bernardita Tapia Riquelme",
                "email": "b.tapia@outlook.com",
                "phone": "977623070"
            },
            "delivery_address": {
                "home_address": {
                    "place": "Puente Alto",
                    "full_address": "SAN HUGO 01324, Puente Alto, Puente Alto"
                }
            }
        },
        "carrier": {
            "carrier_code": "BLX",
            "tracking_number": ""
        }
    }',
    CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'api-key: ea670047974b650bbcba5dd759baf1ed',
    'Content-Type: application/json'
    ),
));
$response = curl_exec($curl);
echo($response);
curl_close($curl);
$objectResponse = json_decode($response);
$newDelivery = array(
    'identifier' => $objectResponse->data->identifier,
    'imported_id' => $objectResponse->data->imported_id,
    'tracking_number' => $objectResponse->data->tracking_number,
    'id_status' => $objectResponse->data->status->id,
    'code_status' => $objectResponse->data->status->code,
    'created' => $objectResponse->data->status->created_at,
    'updated' => $objectResponse->data->updated_at,
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
);
print_r($newDelivery);
//aca va el save de el envio
die;
?>
