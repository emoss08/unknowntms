<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Customers extends Component
{
    use LivewireAlert;
    use WithPagination;

        public $showModal = false;
        public $CustomerId;
        public $Customer;

        protected $paginationTheme = 'bootstrap';

        protected $rules = [
            'status' => 'required',
            'code' => 'string|required|min:3|max:15',
            'name' => 'required',
            'Address_line_1' => 'numeric',
            'Address_line_2' => 'numeric',
            'zip' => 'numeric',
            'country' => 'min:3|max:30',
            'phone' => 'numeric',
            'email' => 'email',
            'fax' => 'numeric',
        ];

    public function updated($key, $value)
    {
        $this->validateOnly($key);
    }


    public function render()
        {
            return view('livewire.customers', [
                'customers' => Customer::latest()->paginate(5),
            ]);
        }

        public function edit($CustomerId)
        {
            $this->showModal = true;
            $this->CustomerId = $CustomerId;
            $this->Customer = Customer::find($CustomerId);
        }

        public function create()
        {
            $this->showModal = true;
            $this->customer = null;
            $this->CustomerId = null;
        }

        public function save()
        {
            $this->validate();
            if(!is_null($this->CustomerId)) {
                $this->customer->save();
            } else {
                Customer::create($this->customer);
                $this->alert('success', 'New Record added successfully!', [
                    'showConfirmButton' => true,
                    'position' => 'center',
                    'toast' => false
                ]);
            }
            $this->showModal = false;
        }

        public function close()
        {
            $this->showModal = false;
        }

        public function delete($CustomerId)
        {
            $Customer = Customer::find($CustomerId);
            if($Customer) {
                $Customer->delete();
                $this->alert('success', 'Recorded Deleted Successfully!', [
                    'showConfirmButton' => true,
                    'position' => 'center',
                    'toast' => false
                ]);
            }
        }
    }

