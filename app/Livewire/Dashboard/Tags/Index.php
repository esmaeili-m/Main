<?php

namespace App\Livewire\Dashboard\Tags;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    public string $title_page;
    public Tag $dataModel;
    public bool $editMode= false;
    public int $paginate= 15;
    public $name;
    public $slug;

    public function mount(Tag $dataModel)
    {
        $this->dataModel=$dataModel;
        $this->title_page='تگ ها';
    }
    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|alpha_dash|unique:tags,slug',
        ];
    }

    protected $messages = [
        'name.required' => 'وارد کردن عنوان الزامی است.',
        'name.string' => 'عنوان باید متن باشد.',

        'slug.required' => 'وارد کردن اسلاگ الزامی است.',
        'slug.string' => 'اسلاگ باید متن باشد.',
    ];

    public function create()
    {
        $validated = $this->validate();
        Tag::create($validated);
        $this->name=null;
        $this->slug=null;

    }
    public function render()
    {
        $data= $this->dataModel->paginate($this->paginate);
        return view('livewire.dashboard.tags.index',compact('data'));
    }
}
