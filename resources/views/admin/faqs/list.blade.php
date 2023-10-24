@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">{{ $title }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em><span>Add New</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary"  data-bs-toggle="modal" href="#addNew"><em class="icon ni ni-plus"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card- card-bordered- card-preview-">
                                @if(count($data) > 0)
                                <div class="card-inner-">
                                    <div id="accordion" class="accordion">
                                        @foreach($data as $item)
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head collapsed" data-bs-toggle="collapse" data-bs-target="#item_{{ $loop->index }}" aria-expanded="false">
{{--                                               <div class="d-flex justify-content-between-">--}}
                                                   <h6 class="title">{{ $item->title }}</h6>
                                                   <span class="accordion-icon"></span>



{{--                                               </div>--}}

                                            </a>
                                            <div class="accordion-body collapse" id="item_{{ $loop->index }}" data-bs-parent="#accordion" style="">
                                                <div class="accordion-inner">
                                                    {{ $item->description }}

                                                    <div>
                                                        <a class="btn btn-warning btn-sm" data-bs-toggle="modal" href="#edit{{ $item->id }}">
                                                            <em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        <a class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#delete{{ $item->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                    <h4 class="text-center mt-5">No FAQs</h4>
                                @endif
                            </div>
                            <!-- .card-preview -->
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" role="dialog" id="addNew">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Add New FAQ</h5>

                    <form action="{{ route('admin.faqs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="row gy-4 pt-4">

                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'fieldName' => 'title','title' => 'Title'])

                            @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12', 'attributes' => 'required', 'fieldName' => 'description', 'title' => 'Description'])


                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>


                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

    @foreach($data as $item)

        <div class="modal fade" role="dialog" id="edit{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="title">Edit FAQ</h5>

                        <form action="{{ route('admin.faqs.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <div class="row gy-4 pt-4">

                                @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-12', 'value' => $item->title, 'fieldName' => 'title','title' => 'Title'])

                                @include('admin.partials.form.textarea', [ 'colSize' => 'col-md-12', 'attributes' => 'required',  'value' => $item->description, 'fieldName' => 'description', 'title' => 'Description'])


                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-lg btn-primary">Update </button>
                            </div>
                        </form>


                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->



        @component('admin.components.delete_modal', [
'modalId' => "delete$item->id",// Unique ID for the modal
'button' => 'Yes delete',
'method' => 'DELETE',
'title' => 'Are you sure you want to delete this FAQ?',
'action' => route('admin.faqs.destroy', $item->id), // Form action URL for the delete action
'message' => 'This action cannot be reversed', // Message to display in the modal
])
        @endcomponent
    @endforeach

@endsection
