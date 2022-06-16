<?php

namespace App\Console\Commands;

use App\Models\LiveRate;
use Illuminate\Console\Command;
use CoinpaymentsAPI;
use Exception;

class GetRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Live Rates form the Server CoinPayments';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // getting the live coin rates
        $private_key = env('PRIKEY');
        $public_key = env('PUBKEY');
        try {
            $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
            $ipn_url = env('IPN_URL');
            $coins = $cps_api->GetRates();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            exit();
        }

        // convert into collection
        $coins = collect($coins);
        $acceptedCoins = ["BTC","LTC","BNB","USDT.TRC20","ETH"];
        // getting only coins that are accepted
        foreach ($coins['result'] as $coinData) {
            // get rate in USD
            // return $coins['result'][$coin]['rate_btc'] / $coins['result']['USD']['rate_btc'];
            $liveRate = new LiveRate();
            $liveRate->symbol = $coinData['name'];
            $liveRate->name = $coinData['name'];
            $liveRate->price = $coinData['rate_btc'] / $coins['result']['USD']['rate_btc'];
            $liveRate->save();
        }
    }
}
