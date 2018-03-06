<?php
namespace BroQiang\LaravelMarkdown;

use Illuminate\Support\ServiceProvider;

class LaravelMarkdownProvider extends ServiceProvider
{
    public function boot()
    {
        $rootPath = dirname(__DIR__);

        // 发布配置文件
        if (!file_exists(config_path('bro_markdown.php'))) {
            $this->publishes([
                $rootPath . '/config/bro_markdown.php' => config_path('bro_markdown.php'),
            ], 'config');
        }

        // 发布公共资源,editor.md 、css 、js 等
        $this->publishes([
            $rootPath . '/public/' => public_path() 
        ], 'public');

        // 配置路由
        $this->loadRoutesFrom(__DIR__.'/routes.php');

    }

    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/bro_markdown.php', 'bro_markdown'
        );
    }
}
