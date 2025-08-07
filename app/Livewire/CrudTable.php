<?php 
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class CrudTable extends Component
{
    public $model;
    public $fields = [];
    public $rules = [];

    public $records;
    public $form = [];
    public $editingId = null;

    public function mount($model, $fields, $rules)
    {
        $this->model = $model;
        $this->fields = $fields;
        $this->rules = $rules;
        $this->loadRecords();
    }

    public function loadRecords()
    {
        $modelClass = "App\\Models\\" . $this->model;
        $this->records = $modelClass::all();
    }

    public function save()
    {
        $validated = Validator::make($this->form, $this->rules)->validate();
        $modelClass = "App\\Models\\" . $this->model;

        if ($this->editingId) {
            $modelClass::find($this->editingId)->update($validated);
        } else {
            $modelClass::create($validated);
        }

        $this->reset(['form', 'editingId']);
        $this->loadRecords();
    }

    public function edit($id)
    {
        $modelClass = "App\\Models\\" . $this->model;
        $record = $modelClass::find($id);
        $this->form = $record->only(array_keys($this->fields));
        $this->editingId = $id;
    }

    public function delete($id)
    {
        $modelClass = "App\\Models\\" . $this->model;
        $modelClass::destroy($id);
        $this->loadRecords();
    }

    public function render()
    {
        return view('components.crud-table');
    }
}