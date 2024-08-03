<?php

namespace App\Livewire\Admin\ReportIncident;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $reports;

     protected string $paginationTheme = 'bootstrap';

    public function render()
    {
         $data = $this->getPaginate();
        return view('livewire.admin.report-incident.index', ['reports' => $data]);
    }
}
