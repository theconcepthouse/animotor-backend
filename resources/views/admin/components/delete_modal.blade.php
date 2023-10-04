<!-- resources/views/components/delete-modal.blade.php -->
<div class="modal fade" id="{{ $modalId }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
            <div class="modal-body modal-body-sm text-center">
                <div class="nk-modal py-4">
                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                    <h4 class="nk-modal-title">{{ isset($title) ? $title : "Are You Sure ?" }}</h4>
                    <div class="nk-modal-text mt-n2">
                        <p class="text-soft">{{ $message }}</p>
                    </div>
                    <ul class="d-flex justify-content-center gx-4 mt-4">
                        <li>
                            <form action="{{ $action }}" method="POST" style="display: inline">
                                @method(isset($method) ? $method : "DELETE")
                                @csrf
                                <button type="submit" class="btn btn-success">{{ isset($button) ? $button : "Yes, Delete it" }}</button>
                            </form>
                        </li>
                        <li>
                            <button data-bs-dismiss="modal" class="btn btn-danger btn-dim">Cancel</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
