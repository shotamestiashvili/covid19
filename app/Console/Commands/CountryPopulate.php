<?php

namespace App\Console\Commands;

use App\Gateway\Devtest;
use App\Services\Country\CountryService;
use Illuminate\Console\Command;

class CountryPopulate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'country:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $countries = ( new Devtest('https://devtest.ge/api', 'countries', 'get'));

        $result  =  $countries->getCountries();
        $createCountry = new CountryService();

         collect($result)->map(function ($countries) use ($createCountry){
             $createCountry->create($countries->code,json_encode($countries->name, true),);
        });
    }
}
