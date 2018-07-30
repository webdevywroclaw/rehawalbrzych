<?php
/**
 * Created by PhpStorm.
 * User: Piotr_Wanio
 * Date: 27.07.2018
 * Time: 01:03
 */

namespace App\Providers;

abstract class ServiceProvider
{
    protected $config;
    public function __construct(array $config)
    {
        $this->config = $config;
    }
    abstract public function provide(array $options = []);
}