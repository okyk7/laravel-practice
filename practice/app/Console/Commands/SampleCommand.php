<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:aiueo {name} {age : 年齢を入れてね} {hoge?} {fuga=aiueo} {--d|dry-run} {--target=default}';

    // artisan command:aiueo で実行できるようになる -h でヘルプ表示も可能
    // 実行引数2つ ?があるのは任意で=はデフォルト値
    // --でオプション作れる

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '練習用';

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
     * @return mixed
     */
    public function handle()
    {
        // 引数処理
        $name = $this->argument('name');
        $this->info($name);
        $this->info(var_export($this->arguments(), true));

        $this->info($this->option('dry-run'));
        $this->info($this->option('target'));

        // インタラクションする場合
        $this->ask('name?');

        $this->info('name: ' . $name);
        if ($this->confirm('ok?')) {
            $this->info('done');
        } else {
            $this->info('cancel');
        }

        // 色分け表示
        $this->info('info');
        $this->line('line');
        $this->comment('comment');
        $this->question('question');
        $this->error('error');

        // テーブル表示
        $this->table(
            ['名前', '年齢'],
            [
                ['Taro', 10],
                ['Laravel', 5],
            ]
            );

        // 戻り値をそれっぽくする
//         return 1;
        return config('command.exit_code.FAILED');
    }
}
