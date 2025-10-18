<div>
    @section('breadcrumb')
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Categories</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
    @endsection
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Categories Item
                    </div>
                    <div class="prism-toggle">
                        <button wire:click="resetData()" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8" class="btn btn-sm btn-success-light">Create New Category<i class="ri-plus ms-2 d-inline-block align-middle"></i></button>
                        <button class="btn btn-sm btn-warning-light">Trash<i class="ri-delete ms-2 d-inline-block align-middle"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data ?? [] as  $item)
                                <tr>
                                    <th scope="row">{{$counter}}</th>
                                    <td>{{$item->title}}</td>
                                    <td>
                                        @if($item->status)
                                            <span wire:click="change_status({{$item->id}})" style="cursor: pointer" class=" badge bg-outline-success">ACTIVE</span>
                                        @else
                                            <span wire:click="change_status({{$item->id}})" style="cursor: pointer" class=" badge bg-outline-danger">INACTIVE</span>

                                        @endif
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            <a data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8" wire:click="set_item({{$item->id}})"  class="text-info fs-14 lh-1"><i
                                                    class="ri-edit-line"></i></a>
                                            <a  wire:click="remove_item({{$item->id}})"  href="javascript:void(0);" class="text-danger fs-14 lh-1"><i
                                                    class="ri-delete-bin-5-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @php($counter++)
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div wire:ignore.self class="modal fade"  id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered text-center  modal-xl" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{$this->editMode ? 'Update Category' : 'Create Category'}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <p class="mb-2 text-muted">Category Title</p>
                                    <input id="title" wire:model.lazy="title" type="text" class="form-control" placeholder="Enter Title">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <p class="mb-2 text-muted">Category Slug</p>
                                    <input id="slug" wire:model.lazy="slug" type="text" class="form-control" placeholder="Enter slug">
                                    @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="input-file" class="form-label">Image</label>
                                    <input wire:model.lazy="image" class="form-control" type="file" id="input-file">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <div wire:ignore>
                                        <label for="input-file" class="form-label">Parent Category</label>
                                        <select  class="form-control"  name="choices-single-default" id="select">
                                            <option  value="">Select Category</option>
                                            @foreach(\App\Models\Category::whereNull('parent_id')->pluck('title','id') ?? [] as $key => $item)
                                                <option  value="{{$key}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <div wire:ignore>
                                        <label for="input-file" class="form-label">Description Category</label>
                                        <div id="editor">{!! $description ?? '' !!}</div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="create()" class="btn btn-primary" >Save changes</button>
                        <button wire:click="resetModal()" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                    </div>
                </div>
            </div>
        </div>
        @section('styles')
                    <link rel="stylesheet" href="{{asset('dashboard')}}/libs/quill/quill.snow.css">
                    <link rel="stylesheet" href="{{asset('dashboard')}}/libs/quill/quill.bubble.css">
         @endsection
        @section('scripts')
                    <script src="{{asset('dashboard')}}/libs/quill/quill.min.js"></script>
                     <script>
                    document.addEventListener("livewire:initialized", () => {
                        const selectEl = document.getElementById('select');
                        const choices = new Choices(selectEl, { searchEnabled: false, itemSelectText: '' });

                        function setSelectValue() {
                            const value = String(@this.get('parent_id') || '').trim();
                            choices.removeActiveItems();
                            if (value) choices.setChoiceByValue(value);
                        }

                        // مقدار اولیه
                        setSelectValue();

                        // هر بار Livewire render شد
                        Livewire.hook('message.processed', () => {
                            setSelectValue();
                        });
                        selectEl.addEventListener('change', () => {
                        @this.set('parent_id', selectEl.value);
                        });

                        var toolbarOptions = [
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [{ 'font': [] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],

                            [{ 'header': 1 }, { 'header': 2 }],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            [{ 'script': 'sub' }, { 'script': 'super' }],
                            [{ 'indent': '-1' }, { 'indent': '+1' }],
                            [{ 'direction': 'rtl' }],

                            [{ 'size': ['small', false, 'large', 'huge'] }],

                            [{ 'color': [] }, { 'background': [] }],
                            [{ 'align': [] }],

                            ['image', 'video'],
                            ['clean']
                        ];
                        const quill = new Quill('#editor', {
                            theme: 'snow',
                            modules: {
                                toolbar: {
                                    container:toolbarOptions,
                                    handlers: {
                                        image: imageHandler
                                    }
                                }
                            }
                        });

                        quill.root.innerHTML = @this.get('description') || '';
                        quill.on('text-change', function () {
                            const html = quill.root.innerHTML;
                            @this.set('description', html);
                        });
                        function imageHandler() {
                            const input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');
                            input.click();

                            input.onchange = async () => {
                                const file = input.files[0];
                                if (!file) return;
                                savedRange = quill.getSelection(true);

                            @this.upload('tempImage', file, () => {}, () => {
                                alert('Image upload failed.');
                            });
                            };
                        }
                        Livewire.on('imageUploaded', (urlArray) => {
                            const url = Array.isArray(urlArray) ? urlArray[0] : urlArray;
                            console.log('✅ Image URL:', url);

                            if (savedRange) {
                                quill.insertEmbed(savedRange.index, 'image', url);
                            } else {
                                quill.insertEmbed(quill.getLength(), 'image', url);
                            }

                            quill.setSelection(quill.getLength());
                        @this.set('description', quill.root.innerHTML);
                        });

                        Livewire.on("close_modal", () => {
                            if (quill) quill.setText('');
                                 const myModal = bootstrap.Modal.getInstance(document.getElementById('modaldemo8'));
                            if (myModal) {
                                myModal.hide();
                            }
                        });

                        Livewire.on("update_item", () => {
                            if (quill) {
                                quill.clipboard.dangerouslyPasteHTML(@this.get('description'));

                            }
                            setSelectValue()

                        });
                        Livewire.on("reset_modal_data", () => {
                            if (quill) {
                                quill.setText('');
                            }

                        });

                    });

                </script>

        @endsection
</div>
