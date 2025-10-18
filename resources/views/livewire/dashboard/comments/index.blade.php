<div>
    @section('breadcrumb')
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Comments</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item active" aria-current="page">Comments</li>
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
                        Comments Item
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($counter=1)
                            @foreach($data ?? [] as  $item)
                                <tr>
                                    <th scope="row">{{$counter}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if($item->status == 'pending')
                                            <span wire:click="change_status({{$item->id}},'approved')" style="cursor: pointer" class=" badge bg-outline-warning">PENDING</span>
                                        @elseif($item->status == 'approved')
                                            <span wire:click="change_status({{$item->id}},'rejected')" style="cursor: pointer" class=" badge bg-outline-success">APPROVED</span>
                                        @else
                                            <span wire:click="change_status({{$item->id}},'pending')" style="cursor: pointer" class=" badge bg-outline-danger">REJECTED</span>

                                        @endif
                                    </td>
                                    <td>{{$item->content}}</td>

                                    <td>
                                        <div class="hstack gap-2 flex-wrap">
                                            @if(!$item->parent_id)
                                                <a data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8" wire:click="replay_item({{$item->id}})"  class="text-success fs-14 lh-1"><i
                                                        class="ri-reply-line"></i></a>
                                            @endif
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
                    <h6 class="modal-title">{{$this->editMode ? 'Update Comment' : 'Create Comment'}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-start">
                    <form>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <p class="mb-2 text-muted">Name</p>
                                <input id="name" wire:model.lazy="name" type="text" class="form-control" placeholder="Enter Title">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <p class="mb-2 text-muted">Email</p>
                                <input id="email" wire:model.lazy="email" type="text" class="form-control" placeholder="Enter email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <label for="description" class="form-label">Content Comment</label>
                                <textarea class="form-control" wire:model.defer="content"></textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 mb-3">
                                <div wire:ignore>
                                    <label for="input-file" class="form-label">Description Comment</label>
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
                Livewire.on("close_modal", () => {
                    const myModal = bootstrap.Modal.getInstance(document.getElementById('modaldemo8'));
                    if (myModal) {
                        myModal.hide();
                    }
                });

                Livewire.on("update_item", () => {
                });
                Livewire.on("reset_modal_data", () => {


                });

            });

        </script>

    @endsection
</div>

