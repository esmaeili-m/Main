<div>
    @section('breadcrumb')
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Tags</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Tags</li>
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
                        Tags Item
                    </div>
                    <div class="prism-toggle">
                        <button wire:click="resetData()" data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8" class="btn btn-sm btn-success-light">Create New Tag<i class="ri-plus ms-2 d-inline-block align-middle"></i></button>
{{--                        <button class="btn btn-sm btn-warning-light">Trash<i class="ri-delete ms-2 d-inline-block align-middle"></i></button>--}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data ?? [] as  $item)
                                <tr>
                                    <th scope="row">{{$counter}}</th>
                                    <td>{{$item->name}}</td>
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
                    <h6 class="modal-title">{{$this->editMode ? 'Update Tag' : 'Create Tag'}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <form>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <p class="mb-2 text-muted">Tag Title</p>
                                <input id="title" wire:model.lazy="name" type="text" class="form-control" placeholder="Enter Title">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <p class="mb-2 text-muted">Tag Slug</p>
                                <input id="slug" wire:model.lazy="slug" type="text" class="form-control" placeholder="Enter slug">
                                @error('slug')
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
    @section('scripts')
        <script>
            document.addEventListener("livewire:initialized", () => {
                Livewire.on("close_modal", () => {
                    const myModal = bootstrap.Modal.getInstance(document.getElementById('modaldemo8'));
                    if (myModal) {
                        myModal.hide();
                    }
                });
                Livewire.on("reset_modal_data", () => {

                });

            });

        </script>

    @endsection
</div>
