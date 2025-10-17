<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center p-4">
                    <h5>{{$title_page ?? 'UNKNOW'}}</h5>

                    <div class="btns-table d-flex gap-2">
                        <button wire:click="resetData()" data-toggle="modal" data-target="#create" type="button" class="btn-hover btn-sm btn-border-radius color-5">ایجاد رویداد</button>
                        <button class="btn-hover btn-sm btn-border-radius color-4">سطل آشغال</button>
                    </div>
                </div>
                <hr>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان رویداد</th>
                            <th>تاریخ رویداد</th>
                            <th>وضعیت رویداد</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$item->title}}</td>
                                <td>{{$item->event_time}} {{$item->event_date}} </td>
                                <td>
                                    @if($item->status == 'published')
                                        <span wire:click="change_status({{$item->id}})" class="cursor-pointer label l-bg-green shadow-style">فعال</span>
                                    @else
                                        <span wire:click="change_status({{$item->id}})" class="cursor-pointer label l-bg-red shadow-style">غیرفعال</span>

                                    @endif
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#create" wire:click="set_item({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button wire:click="remove_item_post({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" role="dialog"
         aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-create">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">{{$this->editMode ? 'ویرایش  رویداد' : 'ساخت  رویداد'}}</h5>
                    <button id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="title">عنوان  رویداد</label>
                            <input type="text" id="title" wire:model.lazy="title"
                                   class="form-control "
                                   placeholder="عنوان  رویداد را وارد کنید">
                            @error('title')
                            <div class="invalid-feedback  d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">آدرس  رویداد</label>
                            <input type="text" id="slug" wire:model.lazy="slug"
                                   class="form-control "
                                   placeholder="آدرس  رویداد را وارد کنید">
                            @error('slug')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="event_date">تاریخ رویداد</label>
                            <input type="text" id="event_date" wire:model.lazy="event_date"
                                   class="form-control "
                                   placeholder="تاریخ رویداد را وارد کنید">
                            @error('event_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="event_time">ساعت رویداد</label>
                            <input type="text" id="event_time" wire:model.lazy="event_time"
                                   class="form-control "
                                   placeholder="ساعت رویداد را وارد کنید">
                            @error('event_time')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="location">مکان رویداد</label>
                            <input type="text" id="location" wire:model.lazy="location"
                                   class="form-control "
                                   placeholder="مکان رویداد را وارد کنید">
                            @error('location')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">خلاصه رویداد</label>
                            <textarea id="description" wire:model.lazy="description" rows="3"  placeholder="خلاصه  رویداد را وارد کنید"></textarea>
                            @error('description')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="content">توضیحات  رویداد</label>
                            <div wire:ignore>
                                <div id="content"></div>
                            </div>
                            @error('content')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>تصویر  رویداد</label>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>فایل</span>
                                    <input wire:model.lazy="image" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div wire:ignore class="form-group">
                            <label>دسته والد</label>
                            <div wire:ignore class="input-field ">
                                <select id="categorySelect" onchange="@this.set('category_id',this.value)">
                                    <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                    @foreach(\App\Models\Category::pluck('title','id') ?? [] as $key => $item)
                                        <option value="{{$key}}" {{$key == $category_id ? 'selected' : ''}}>{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button wire:click="create()" type="button" class="btn-hover btn-sm btn-border-radius color-5">ذخیره</button>
                    <button wire:click="resetModal()" type="button" class="btn-hover btn-sm btn-border-radius color-2">بستن</button>

                </div>
            </div>
        </div>
    </div>
    @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <link {{asset('dashboard/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css')}} rel="stylesheet" />

    @endsection
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <script src="{{asset('dashboard/js/app.min.js')}}"></script>
        <script src="{{asset('dashboard/js/admin.js')}}"></script>
        <script src="{{asset('dashboard/js/pages/forms/basic-form-elements.js')}}"></script>
        <script>
            $('select').formSelect();

            document.addEventListener('livewire:initialized', function () {
                const toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    ['link', 'image'],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'align': [] }],
                    ['clean']
                ];
                const quill = new Quill('#content', {
                    modules: {
                        toolbar: toolbarOptions,
                    },
                    placeholder: 'توضیحات خود راوارد کنید...',
                    theme: 'snow'
                });
                quill.on('text-change', function() {
                    let html = quill.root.innerHTML;
                @this.set('content', html);
                });
                function imageHandler() {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.click();
                    input.onchange = () => {
                        var file = input.files[0];
                        if (/^image\//.test(file.type)) {
                            // آپلود به سرور
                            var formData = new FormData();
                            formData.append('image', file);

                            fetch('/upload-image', {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            })
                                .then(response => response.json())
                                .then(data => {
                                    const range = quill.getSelection();
                                    quill.insertEmbed(range.index, 'image', data.url);
                                })
                                .catch(err => console.error('Upload failed', err));
                        } else {
                            alert('لطفاً فقط فایل تصویر انتخاب کنید.');
                        }
                    };
                }
                quill.getModule('toolbar').addHandler('image', imageHandler);
                Livewire.on("close_modal", () => {
                    if (quill) {
                        quill.setText('');
                    }
                    document.getElementById('close_modal').click()
                });
                Livewire.on("update_item", () => {
                    if (quill) {
                        quill.clipboard.dangerouslyPasteHTML(@this.get('content'));
                    }
                    let $select = $('#categorySelect');

                    $select.val(@this.get('category_id'));
                    $select.trigger('change');
                    $select.formSelect();
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
