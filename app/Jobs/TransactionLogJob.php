<?php

namespace App\Jobs;

use App\Models\TransactionLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TransactionLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $eventName;
    public $data;
    public $exceptions;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $evenName, array $data, $exceptions = null)
    {
        $this->eventName = $evenName;
        $this->data = $data;
        $this->exceptions = $exceptions;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        TransactionLog::create([
            'id'=> (string) \Illuminate\Support\Str::orderedUuid(),
            'event_name'=> $this->eventName,
            'data'=> json_encode($this->data),
            'exceptions'=> $this->exceptions ?? null
        ]);
    }
}
