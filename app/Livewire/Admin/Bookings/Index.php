<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public string $car_id;

    public string $status = 'all';

    public ?string $search;

    protected string $paginationTheme = 'bootstrap';

    public function render()
    {
        $query = Booking::query();

        if (!isAdmin()) {
            $query->where('company_id', companyId());
        }

        $status = $this->status;

        if ($status === 'pending') {
            $query->where('completed', false)->where('cancelled', false);
        } elseif ($status === 'completed') {
            $query->where('completed', true);
        } elseif ($status === 'cancelled') {
            $query->where('cancelled', true);
        } elseif ($status === 'confirmed') {
            $query->where('is_confirmed', true);
        } elseif ($status === 'unconfirmed') {
            $query->where('is_confirmed', false);
        } elseif ($status === 'paid') {
            $query->where('payment_status', 'paid');
        }elseif ($status === 'unpaid') {
            $query->where('payment_status',  '!=','paid');
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('booking_number', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('reference', 'LIKE', '%' . $this->search . '%');
            });
        }

        $data = $query->latest()->paginate(10);

        return view('livewire.admin.bookings.index', ['bookings' => $data]);
    }

    public function setStatus($status){
        $this->status = $status;
    }

}
