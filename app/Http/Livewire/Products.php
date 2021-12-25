<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $showModal = false;
    public $productId;
    public $product;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'product.name' => 'required',
        'product.price' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.products', [
            'products' => Product::latest()->paginate(5)
        ]);
    }

    public function edit($productId)
    {
        $this->showModal = true;
        $this->productId = $productId;
        $this->product = Product::find($productId);
    }

    public function create()
    {
        $this->showModal = true;
        $this->product = null;
        $this->productId = null;
    }

    public function save()
    {
        $this->validate();

        if (!is_null($this->productId)) {
            $this->product->save();
        } else {
            Product::create($this->product);
        }
        $this->showModal = false;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function delete($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
        }
    }
}
