<?php

namespace App\Jobs;

use App\Gateway\Devtest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchStatistic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout  = 300;
    public $tries    = 4;
    public $attempts = 4;
    /**
     * Create a new job instance.
     *
     * @return void
     */



    protected $url;
    protected $uri;
    protected $method;
    protected $code;
    protected $country_id;

    public function __construct($url, $uri, $method, $code, $country_id)
    {
        $this->url        = $url;
        $this->uri        = $uri;
        $this->method     = $method;
        $this->code       = $code;
        $this->country_id = $country_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $statisticsApi =  new Devtest($this->url, $this->uri, $this->method);
        $statService   =  new \App\Services\Statistic\StatisticService();
        $result        =  $statisticsApi->getStatistics($this->code);

        $statService->justDoIt($result, $this->country_id);

    }
}
