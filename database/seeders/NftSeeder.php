<?php

namespace Database\Seeders;

use App\Models\admin\Nft;
use App\Models\admin\Option;
use App\Models\NftCategory;
use App\Models\User;
use App\Models\user\Referral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // adding a parrent category
        $nftCategory = new NftCategory();
        $nftCategory->name = 'Browns';

        $nftCategory->price = 250;
        $nftCategory->duration = 365;
        $nftCategory->profit = 7.5;
        $nftCategory->stock = 100;
        $nftCategory->picture = '1.jpg';
        $nftCategory->save();

        $a = 1;
        while ($a <= 100) {
            $nft = new Nft();
            $nft->title = 'NFT Browns # ' . $a;
            $nft->nft_category_id = 1;
            $nft->nft = "nft_browns" . $a . ".jpg";
            $nft->save();
            $a++;
        }

        // adding a parrent category
        $nftCategory = new NftCategory();
        $nftCategory->name = 'Silver';
        $nftCategory->price = 500;
        $nftCategory->duration = 365;
        $nftCategory->profit = 10;
        $nftCategory->stock = 75;
        $nftCategory->picture = '2.jpg';
        $nftCategory->save();

        $a = 1;
        while ($a <= 75) {
            $nft = new Nft();
            $nft->title = 'NFT Silver # ' . $a;
            $nft->nft_category_id = 2;
            $nft->nft = "nft_silver" . $a . ".jpg";
            $nft->save();
            $a++;
        }

        // adding a parrent category
        $nftCategory = new NftCategory();
        $nftCategory->name = 'Gold';
        $nftCategory->price = 1000;
        $nftCategory->duration = 365;
        $nftCategory->profit = 12.5;
        $nftCategory->stock = 50;
        $nftCategory->picture = '3.jpg';
        $nftCategory->save();

        $a = 1;
        while ($a <= 50) {
            $nft = new Nft();
            $nft->title = 'NFT Gold # ' . $a;
            $nft->nft_category_id = 3;
            $nft->nft = "nft_gold" . $a . ".jpg";
            $nft->save();
            $a++;
        }

        // adding a parrent category
        $nftCategory = new NftCategory();
        $nftCategory->name = 'Platinum';
        $nftCategory->price = 2500;
        $nftCategory->duration = 365;
        $nftCategory->profit = 15;
        $nftCategory->stock = 30;
        $nftCategory->picture = '4.jpg';
        $nftCategory->save();

        $a = 1;
        while ($a <= 30) {
            $nft = new Nft();
            $nft->title = 'NFT Platinum # ' . $a;
            $nft->nft_category_id = 4;
            $nft->nft = "nft_platinum" . $a . ".jpg";
            $nft->save();
            $a++;
        }

        // adding a parrent category
        $nftCategory = new NftCategory();
        $nftCategory->name = 'Diamond';
        $nftCategory->price = 5000;
        $nftCategory->duration = 365;
        $nftCategory->profit = 20;
        $nftCategory->stock = 20;
        $nftCategory->picture = '5.jpg';
        $nftCategory->save();

        $a = 1;
        while ($a <= 20) {
            $nft = new Nft();
            $nft->title = 'NFT Diamond # ' . $a;
            $nft->nft_category_id = 5;
            $nft->nft = "nft_diamond" . $a . ".jpg";
            $nft->save();
            $a++;
        }


        // adding options
        $option = new Option();
        $option->name = "nft_direct_refer_commission";
        $option->value = "7";
        $option->save();

        $option = new Option();
        $option->name = "nft_in_direct_1_refer_commission";
        $option->value = "2";
        $option->save();

        $option = new Option();
        $option->name = "nft_in_direct_2_refer_commission";
        $option->value = "3";
        $option->save();

        $option = new Option();
        $option->name = "nft_in_direct_3_refer_commission";
        $option->value = "4";
        $option->save();



        $user = new User();
        $user->name = 'Shakeel Ahmad';
        $user->username = 'shakeel2717';
        $user->email = 'shakeel2717@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'default';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);


        $user = new User();
        $user->name = 'Test1';
        $user->username = 'test1';
        $user->email = 'test1@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'shakeel2717';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);

        $user = new User();
        $user->name = 'Test2';
        $user->username = 'test2';
        $user->email = 'test2@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'test1';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);


        $user = new User();
        $user->name = 'Test3';
        $user->username = 'test3';
        $user->email = 'test3@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'test2';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);


        $user = new User();
        $user->name = 'Test4';
        $user->username = 'test4';
        $user->email = 'test4@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'test3';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);


        $user = new User();
        $user->name = 'Test5';
        $user->username = 'test5';
        $user->email = 'test5@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'test4';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);


        $user = new User();
        $user->name = 'Test6';
        $user->username = 'test6';
        $user->email = 'test6@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'test5';
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);

        $user = new User();
        $user->name = 'Test7';
        $user->username = 'test7';
        $user->email = 'test7@gmail.com';
        $user->password = bcrypt('asdfasdf');
        $user->refer = 'test6';
        $user->kyc_status = true;
        $user->save();

        $referral = Referral::create([
            'user_id' => $user->id,
            'referral_code' => random(10),
        ]);


    }
}
