<?php

namespace App\Livewire\Dashboard\Settings;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public string $title_page;
    public Setting $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public int $paginate= 15;
    public $key;
    public $value;
    public $id;

    public function mount(Setting $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='تنظیمات';
    }

    public function search()
    {
        $this->IsFillter=true;
    }
    protected function rules()
    {
        return [
            'key' => 'required',
            'value' => 'required',
        ];
    }

    protected $messages = [
        'key.required' => 'وارد کردن عنوان الزامی است.',
        'value.required' => 'وارد کردن عنوان الزامی است.',
    ];

    public function resetModal()
    {
        $this->reset(['key','value','id']);
        $this->dispatch('close_modal');
    }

    public function resetData()
    {
        $this->reset(['key','value','id']);
        $this->dispatch('reset_modal_data');

    }


    public function set_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->value=$data->value;
        $this->key=$data->key;
        $this->id=$data->id;
        $this->dispatch('update_item');

    }


    public function remove_item($id)
    {
        $data=$this->dataModel->find($id);
        if ($data){
            $data->delete();
        }
    }

    public function create()
    {
        $validated = $this->validate();
        if (is_file($this->value)){
            $validated['value'] = $this->image->store('uploads/settings', 'public');
        }
        Setting::updateOrCreate(['key' => $validated['key']], $validated);
        $this->resetModal();
    }
    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->whereNull('parent_id')->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.settings.index',compact('data'));
    }
}
