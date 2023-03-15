<?php

namespace App\Console\Commands;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HideExpiredPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:hide-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiredPosts = Job::where('deadline', '<', Carbon::now())->get();
    
        foreach ($expiredPosts as $post) {
            // Ẩn bài đăng nếu chưa ẩn
            if ($post->status=='hiển thị') {
                $post->status = 'hết hạn';
                $post->save();
            }
        };
        $this->info('Expired posts have been hidden.');
    }
}
