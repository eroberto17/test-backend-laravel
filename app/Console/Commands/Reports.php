<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Collection;

class Reports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:sales {date} {service?}';

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

        
        if($this->argument('service')==null){
            //Suscrpciones
            $user = User::where('subscribed', '=', '1')
            ->where('date', '=', $this->argument('date'))
            ->get();
            $user_sus = $user->count();

            $user = User::where('subscribed', '=', '0')
            ->where('date', '=', $this->argument('date'))
            ->get();
            $user_unsus = $user->count();

            //Cobros
            $collection = Collection::where('date', '=', $this->argument('date'))
            ->get();
            $collection_qty = $collection->count();

            $collection_tot = Collection::where('date', '=', $this->argument('date'))
            ->sum('price');

            $collection_delta = Collection::leftJoin('users', function($join) {
                $join->on('users.client_number', '=', 'collections.client_number');
              })
            ->where('users.subscribed', '=', '1') 
            ->where('collections.date', '=', $this->argument('date'))
            ->groupBy('collections.id')           
            ->sum('collections.price');
        }
        else{
            //Suscrpciones
            $user = User::where('subscribed', '=', '1')
            ->where('date', '=', $this->argument('date'))
            ->where('service', '=', $this->argument('service'))
            ->get();
            $user_sus = $user->count();

            $user = User::where('subscribed', '=', '0')
            ->where('date', '=', $this->argument('date'))
            ->where('service', '=', $this->argument('service'))
            ->get();
            $user_unsus = $user->count();

            //cobros
            $collection = Collection::where('date', '=', $this->argument('date'))
            ->where('service', '=', $this->argument('service'))
            ->get();
            $collection_qty = $collection->count();

            $collection_tot = Collection::where('date', '=', $this->argument('date'))
            ->where('service', '=', $this->argument('service'))
            ->sum('price');

            $collection_delta = Collection::leftJoin('users', function($join) {
                $join->on('users.client_number', '=', 'collections.client_number');
              })
            ->where('users.subscribed', '=', '1') 
            ->where('collections.date', '=', $this->argument('date'))
            ->where('users.service', '=', $this->argument('service'))
            ->groupBy('collections.id')        
            ->sum('collections.price');
        }

        $a=1;
        echo "Total suscrpciones: ".$user_sus."\n";
        echo "Total desuscrpciones: ".$user_unsus."\n";
        echo "Cantidad de cobros: ".$collection_qty."\n";
        echo "Importe total: $".$collection_tot."\n";
        echo "Delta de suscrpciones: $".$collection_delta."\n";
    }
}
