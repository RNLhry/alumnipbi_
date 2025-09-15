<?php

namespace App\Livewire;
use Illuminate\Support\Facades\App;
use App\Models\Alumni;
use Livewire\Component;


class AlumniSelect extends Component
{
    public $search = '';
    public $alumnis;
    protected $app;

    public function __construct(App $app)  // Inject App instance
    {
        $this->app = $app;
    }

    public function mount()
    {
        $this->app = app();  // Access App instance directly
        $this->alumnis = $this->app->make(Alumni::class)->all();
    }



    public function render()
    {
        return view('livewire.mahasiswa-select');
    }
}