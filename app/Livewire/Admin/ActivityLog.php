<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class ActivityLog extends Component
{
    use WithPagination;

    public ?string $search;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $query = \App\Models\ActivityLog::latest();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('info', 'LIKE', '%' . $this->search . '%');
            });
        }

        $data = $query->paginate(10);

        return view('livewire.admin.activity-log', ['data' => $data]);

    }

}
