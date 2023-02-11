<?php
namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AlegraService {
    public function shopIngredient($name) {
        $quantity = 0;
        try {
            $url = env('FARMERS_MARKET_API');
            $client = new Client();
            $response = $client->get($url, ['query' => ["ingredient" => $name]]);
            $status = $response->getStatusCode();
            if ($status == 200) {
                $json = json_decode($response->getBody()->getContents());
                $quantity = $json->quantitySold;
            }
        } catch (\Exception $e) {
           Log::error($e->getMessage());
        }
        return $quantity;
    }
}
