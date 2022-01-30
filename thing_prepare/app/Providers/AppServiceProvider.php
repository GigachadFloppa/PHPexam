<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('linkactive', function($route){
            return "<?php echo request()->is($route) ? 'px-2 text-white' : 'px-2 text-secondary'; ?>";
        });


        Blade::directive('ownthing', function($thing){

                return "<?php echo $thing == auth()->user()->id ? 'green':'red' ?>";

        });

//        Blade::directive('notownthing', function(){
//
//            return "<td><font color='green'>{{ \$thing->name }}</font></td> <td>{{ \$thing->description }} </td>";
//
//        });


    }
}
