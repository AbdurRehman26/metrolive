<?php

namespace App\Console\Commands;

use App\Data\JsonReader;
use App\Data\Logging\LogToFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CountByPriceRangeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offers:count-by-price-range {min} {max}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var JsonReader
     */
    private $jsonReader;

    private $filePath = 'public/data.json';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(JsonReader $jsonReader)
    {
        $this->jsonReader = $jsonReader;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $min = $this->argument('min');
        $max = $this->argument('max');

        $offerCollection = $this->jsonReader->read(Storage::get($this->filePath));

        $log = new LogToFile();

        $log->log("1");

        $log->save();

        dd($offerCollection->getOfferByRange($min, $max));
        return 0;
    }
}
