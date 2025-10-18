<?php

namespace App\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
        public string $title_page;
    public Category $dataModel;
    public bool $editMode= false;
    public bool $IsFillter= false;
    public array $fillter= [];
    public array $categoriesId;
    public int $paginate= 15;
    public $description;
    public $title;
    public $slug;
    public $id;
    public $image;
    public $parent_id;

    public function mount(Category $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='دسته بندی ها';
    }

    public function search()
    {
        $this->IsFillter=true;
    }
    protected function rules()
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:categories,slug',
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function change_status($id)
    {
        $data=$this->dataModel->find($id);
        if ($data->status){
            $data->update(['status'=>0]);
        }else{
            $data->update(['status'=>1]);
        }
        $this->dispatch('alert',message:'آیتم با موفقیت آپدیت شد');

    }

    public function resetModal()
    {
        $this->reset(['title','slug','image','parent_id','description','id']);
        $this->dispatch('close_modal');
    }

    public function resetData()
    {
        $this->reset(['title','slug','image','parent_id','description','id']);
        $this->dispatch('reset_modal_data');

    }


    public function set_item($id)
    {
        $data=$this->dataModel->find($id);
        $this->title=$data->title;
        $this->id=$data->id;
        $this->image=$data->image;
        $this->slug=$data->slug;
        $this->parent_id=$data->parent_id;
        $this->description=$data->description;
        $this->dispatch('update_item');

    }

    public function UpdatedTitle()
    {
        if (!$this->id){
            $this->slug=str_replace(' ','-',$this->title);
        }
    }
    public function remove_item($id)
    {
        $data=$this->dataModel->find($id);
        if ($data){
            $data->delete();
            $this->dispatch('alert',message:'آیتم با موفقیت حذف شد');

        }
    }

    public function create()
    {
        if ($this->id){
            return $this->updateItem();
        }else{
            return $this->createItem();

        }
    }
    public function createItem()
    {
        $validated = $this->validate();
        $validated['image'] = $this->image->store('uploads/categories', 'public');
        $validated['order'] = Category::max('order')+1;
        Category::create($validated);
        $this->resetModal();
        $this->dispatch('alert',message:'آیتم با موفقیت ایجاد شد');
    }
    public $tempImage;
    public function updatedTempImage()
    {
        $path = $this->tempImage->store('uploads/categories', 'public');
        $url = asset('storage/' . $path);
        $this->dispatch('imageUploaded', $url);
    }
    public function updateItem()
    {
        $validated = $this->validate([
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:categories,slug,'.$this->id,
            'description' => 'required|string|min:10',
            'image' => 'required',
            'parent_id' => 'nullable',
        ]);

        if (isset($validated['image']) && !is_string($validated['image'])) {
            $validated['image'] = $this->image->store('uploads/categories', 'public');
        }
        Category::find($this->id)->update($validated);
        $this->resetModal();
//        $this->dispatch('alert',message:'آیتم با موفقیت آپدیت شد');


    }
    public function render()
    {
        $data=[];
        if ($this->IsFillter){
            $data=$this->dataModel->whereNull('parent_id')->where('id',$this->categoriesId)->paginate($this->paginate);
        }else{
            $data= $this->dataModel->paginate($this->paginate);
        }
        return view('livewire.dashboard.categories.index',compact('data'));
    }
}
