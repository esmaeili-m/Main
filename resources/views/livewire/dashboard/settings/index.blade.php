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
                                <th>Item</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data ?? [] as  $item)
                                <tr>
                                    <th scope="row">{{$counter}}</th>
                                    <td>{{$item->key}}</td>
                                    <td>{{$item->value}}</td>
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
                                <div wire:ignore>
                                    <label for="input-file" class="form-label">Item</label>
                                    <select   id="select">
                                        <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                        <option value="instagram">instagram</option>
                                        <option value="logo">logo</option>
                                        <option value="facebook">facebook</option>
                                        <option value="aparat">aparat</option>
                                        <option value="telegram">telegram</option>
                                        <option value="whatsapp">whatsapp</option>
                                        <option value="address">address</option>
                                        <option value="email">email</option>
                                        <option value="phone"> phone</option>
                                        <option value="twitter">twitter</option>
                                        <option value="linkedin">linkedin</option>
                                        <option value="instagram">instagram</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <p class="mb-2 text-muted">Item Value</p>
                                <input id="title" wire:model.lazy="value" type="text" class="form-control" placeholder="Enter value">
                                @error('value')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
        <script>
            document.addEventListener("livewire:initialized", () => {
                const selectEl = document.getElementById('select');
                const choices = new Choices(selectEl, { searchEnabled: false, itemSelectText: '' });

                function setSelectValue() {
                    const value = String(@this.get('key') || '').trim();
                    choices.removeActiveItems();
                    if (value) choices.setChoiceByValue(value);
                }
                setSelectValue();
                Livewire.hook('message.processed', () => {
                    setSelectValue();
                });
                selectEl.addEventListener('change', () => {
                @this.set('key', selectEl.value);
                });
                Livewire.on("close_modal", () => {
                    const myModal = bootstrap.Modal.getInstance(document.getElementById('modaldemo8'));
                    if (myModal) {
                        myModal.hide();
                    }
                });
                Livewire.on("update_item", () => {
                    setSelectValue()

                });
                Livewire.on("reset_modal_data", () => {


                });

            });

        </script>

    @endsection
</div>
