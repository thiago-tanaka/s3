<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateProductsFromCsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:create-from-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $filePath = 'products.csv';
        $csvContents = Storage::disk('s3')->get($filePath);
        $stream = fopen('php://temp', 'r+');

        fwrite($stream, $csvContents);
        rewind($stream);

        while (($row = fgetcsv($stream, 1000, ",")) !== FALSE) {
            Product::createOrFirst([
                'name' => $row[0],
            ]);
        }

        fclose($stream);
    }
}
