<?php

namespace App\Http\Livewire\Trailers;

use App\Models\Trailers;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;

    public $trailerId;
    public $showModal = false;
    public $trailer;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'status' => 'required',
        'trailer_id' => 'required|unique:trailers,trailer_id,',
        'year' => 'required|size:4',
        'make' => 'required|max:30',
        'model' => 'required|max:30',
        'equip_type_id' => 'required|max:30|min:1|exists:equipment_type,equip_type_id',
        'vin' => 'required|vin_code|unique:trailers,vin,',
        'comments' => 'max:500|nullable|string|min:1',
        'tag_expiration' => 'required|date',
        'last_inspection' => 'required|date',
    ];

    public function render()
    {
        return view('livewire.trailers.index', [
            'trailers' => Trailers::paginate(10),
        ]);
    }

    public function edit($trailerId)
    {
        $this->showModal = true;
        $this->trailerId = $trailerId;
        $this->trailer = Trailers::find($trailerId);
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($trailerId)
    {
        $trailer = Trailers::find($trailerId);
        if ($trailer ) {
            $trailer->delete();
        }
    }
}
