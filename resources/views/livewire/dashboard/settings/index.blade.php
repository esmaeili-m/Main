<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center p-4">
                    <h5>{{$title_page ?? 'UNKNOW'}}</h5>

                    <div class="btns-table d-flex gap-2">
                        <button wire:click="resetData()" data-toggle="modal" data-target="#create" type="button" class="btn-hover btn-sm btn-border-radius color-5">ایجاد ایتم </button>
                        <button class="btn-hover btn-sm btn-border-radius color-4">سطل آشغال</button>
                    </div>
                </div>
                <hr>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام ایتم</th>
                            <th>مقدار ایتم</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$item->key}}</td>
                                <td>{{$item->value}}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#create" wire:click="set_item({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">mode_edit</i>
                                    </button>
                                    <button wire:click="remove_item({{$item->id}})" class="btn tblActnBtn">
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
                    <h5 class="modal-title" id="formModal">{{$this->editMode ? 'ویرایش ایتم ' : 'ساخت ایتم '}}</h5>
                    <button id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div wire:ignore class="form-group">
                            <label>ایتم والد</label>
                            <div wire:ignore class="input-field ">
                                <select id="select" onchange="@this.set('key',this.value)">
                                    <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                        <option value="instagram">اینستاگرام</option>
                                        <option value="logo">لوگو</option>
                                        <option value="facebook">فیسبوک</option>
                                        <option value="aparat">آپارات</option>
                                        <option value="telegram">تلگرام</option>
                                        <option value="whatsapp">واتساپ</option>
                                        <option value="address">آدرس</option>
                                        <option value="email">ایمیل</option>
                                        <option value="phone">شماره تلقن</option>
                                        <option value="twitter">توییتر</option>
                                        <option value="linkedin">لینکدین</option>
                                        <option value="instagram">ایسنتاگرام</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="value">مقدار ایتم </label>
                            <input type="text" id="value" wire:model.lazy="value"
                                   class="form-control "
                                   placeholder="مقدار ایتم  را وارد کنید">
                            @error('value')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
        <script src="{{asset('dashboard/js/pages/forms/basic-form-elements.js')}}"></script>
        <script>
            let quill; // 🔑 اینجا global تعریف کن
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

                quill = new Quill('#description', {
                    modules: {
                        toolbar: toolbarOptions,
                    },
                    placeholder: 'توضیحات خود راوارد کنید...',
                    theme: 'snow'
                });

                quill.on('text-change', function() {
                    let html = quill.root.innerHTML;
                @this.set('description', html);
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
            });

            // ✅ اینجا میتونی راحت به quill دسترسی داشته باشی
            document.addEventListener("livewire:initialized", () => {
                Livewire.on("close_modal", () => {
                    if (quill) {
                        quill.setText('');
                    }
                    document.getElementById('close_modal').click()
                });
                Livewire.on("update_item", () => {
                    if (quill) {
                        quill.clipboard.dangerouslyPasteHTML(@this.get('description'));

                    }
                    let $select = $('#select');
                    $select.val(@this.get('key'));
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
