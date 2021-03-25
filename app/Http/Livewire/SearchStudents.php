<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class SearchStudents extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-students', [
            'students' => Student::where('name', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
