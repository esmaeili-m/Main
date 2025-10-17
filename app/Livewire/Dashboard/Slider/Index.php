<?php

namespace App\Livewire\Dashboard\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public string $title_page;
    public Slider $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public int $paginate= 15;
    public $description;
    public $title;
    public $image;
    public $id;

    public function mount(Slider $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='اسلایدر';
    }



    public function remove_item_post($id)
    {
        $data=$this->dataModel->find($id);
        if ($data){
            $data->delete();
        }
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:10|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    protected $messages = [
        'title.required' => 'وارد کردن عنوان الزامی است.',
        'title.string' => 'عنوان باید متن باشد.',
        'title.min' => 'عنوان نباید کمتر از ۳ کاراکتر باشد.',
        'title.max' => 'عنوان نباید بیشتر از ۲۵۵ کاراکتر باشد.',

        'description.required' => 'وارد کردن توضیحات الزامی است.',
        'description.string' => 'توضیحات باید متن باشد.',
        'description.min' => 'توضیحات نباید کمتر از ۱۰ کاراکتر باشد.',
        'description.max' => 'توضیحات نباید بیشتر از ۵۰۰ کاراکتر باشد.',

        'image.required' => 'آپلود تصویر شاخص الزامی است.',
        'image.image' => 'فایل انتخابی باید تصویر باشد.',
        'image.mimes' => 'تصویر باید یکی از فرمت‌های jpeg، png، jpg یا gif باشد.',
        'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',
    ];
    public function change_status($id)
    {
        $data=$this->dataModel->find($id);
        if ($data->status=='published'){
            $data->update(['status'=>'draft']);
        }else{
            $data->update(['status'=>'published']);
        }
    }

    public function resetModal()
    {
        $this->reset(['title','description','image','id']);
        $this->dispatch('close_modal');
    }

    public function create()
    {
        if ($this->id){
            return $this->updateItem();
        }else{
            return $this->createItem();

        }
    }
    public function set_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->title=$data->title;
        $this->id=$data->id;
        $this->image=$data->image;
        $this->description=$data->description;
        $this->dispatch('update_item');

    }

    public function resetData()
    {
        $this->reset(['title','description','image','id']);
        $this->dispatch('reset_modal_data');
    }
    public function createItem()
    {
        $validated = $this->validate();
        $validated['image'] = $this->image->store('uploads/slider', 'public');

        $post= Slider::create($validated);
        $this->resetModal();
    }
    public function updateItem()
    {
        $validated = $this->validate([
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:10|max:500',
            'image' => 'required',
        ]);

        if (isset($validated['image']) && !is_string($validated['image'])) {
            $validated['image'] = $this->image->store('uploads/slider', 'public');
        }
        Slider::find($this->id)->update($validated);
        $this->resetModal();

    }

    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.slider.index',compact('data'));
    }
}
