<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\NewPostEmail;
use App\Models\Website;
use Illuminate\Support\Facades\Mail;
class EmailAlerts extends Command
{
   
    protected $signature = 'send_alerts';

    
    protected $description = 'description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $websites=Website::all();
        foreach($websites as $website){
            $newpost=$website->posts()->where('sent',false)->get();
            if(count($newpost)>0){
                $subscribers=$website->users()->get();

                foreach($newpost as $post){
                    foreach($subscribers as $subscriber){
                        Mail::to($subscriber->email)->queue(new NewPostEmail($post));

                    }
                    $post->sent=true;
                    $post->save();
                }
            }
        }
        return Command::SUCCESS;
    }
}
