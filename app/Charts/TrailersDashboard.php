<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class TrailersDashboard
{
    protected $chart;

    public function __construct(TrailersDashboard $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        return $this->chart->pieChart()
            ->setTitle('Monthly Users')
            ->addData([
                \App\Models\User::where('id', '<=', 60)->count(),
                \App\Models\User::where('id', '>', 60)->count()
            ])
            ->setColors(['#ffc63b', '#ff6384'])
            ->setLabels(['Active users', 'Inactive users']);
    }
}
