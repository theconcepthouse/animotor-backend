@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="container mb-3 mt-4">
                        <h4>Driver Name: {{ $driver->name }}</h4>
                    </div>
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block">

                            <div class="card card-bordered card-preview">

                                <div class="card-inner">
                                    <ul class="nav nav-tabs mt-n3">
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('admin.driverForm', $driver->id) }}"
                                               wire:navigate>Forms</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active btn btn-primary"
                                               href="{{ route('admin.driverDocuments', $driver->id) }}" wire:navigate>Documents</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.paymentHistory', $driver->id) }}"
                                               wire:navigate>Payment History</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="{{ route('admin.driverPcn', $driver->id) }}"
                                               wire:navigate>PCNs</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="{{ route('admin.notes', $driver->id) }}"
                                               wire:navigate>Notes</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" href="#">History</a>
                                        </li>
                                    </ul>

                                </div>
                            </div>


                            <div class="card card-bordered">
                                <div class="card-inner-group">
                                    <div class="card-inner p-0">


                                        <div class="container col-lg-10 ">
                                            @if(session()->has('error'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('error') }}
                                                </div>
                                            @endif
                                            <div class="row mt-4">
                                                @if(is_array($documents->documents))
                                                    @foreach($documents->documents as $documentType => $documentPath)
                                                        <div class="col-md-4">
                                                            <div class="card card-bordered mb-2">
                                                                <div class="card-inner">
                                                                    <h5 class="card-title">{{ ucwords(str_replace('_', ' ', $documentType)) ?? ''}}</h5>
                                                                    <a data-bs-toggle="modal"
                                                                       href="#update{{ $loop->index }}"
                                                                       style="margin-left: 80%; font-size: 20px">
                                                                        <i class="ni ni-upload-cloud ml-5"></i>
                                                                    </a>
                                                                    <div>
                                                                        <img height="80" width="100"
                                                                             src="{{ asset($documentPath ?? 'img/placeholder.jpg') }}"
                                                                             class="img-fluid"
                                                                             alt="{{ ucwords(str_replace('_', ' ', $documentType)) }}">
                                                                    </div>

                                                                    <div style="margin-left: 80%" class="pull-right">
                                                                        <a data-bs-toggle="modal"
                                                                           href="#viewImage{{ $loop->index }}"
                                                                           style="margin-right: 20px; font-size: 20px">
                                                                            <i class="ni ni-eye"></i>
                                                                        </a>
                                                                        {{--                                                                        <a href="{{ asset($documentPath) }}" download--}}
                                                                        {{--                                                                           style="font-size: 20px">--}}
                                                                        {{--                                                                            <i class="ni ni-download"></i>--}}
                                                                        {{--                                                                        </a>--}}
                                                                        @php
                                                                            $publicUrl = $documentPath && Storage::exists($documentPath)
                                                                                ? Storage::url($documentPath)          // works for local “public” + S3
                                                                                : asset('img/placeholder.jpg');        // fallback
                                                                        @endphp

                                                                        <a href="javascript:void(0)"
                                                                           class="download-doc"
                                                                           data-url="{{ $publicUrl }}"
                                                                           data-name="{{ basename($documentPath) }}">
                                                                           <span style="font-size: 17px"> <i class="ni ni-download"></i></span>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal for Viewing Image -->
                                                        <div class="modal fade" id="viewImage{{ $loop->index }}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="viewImageLabel{{ $loop->index }}"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="viewImageLabel{{ $loop->index }}">{{ ucwords(str_replace('_', ' ', $documentType)) }}</h5>
                                                                        <button type="button" class="close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{ asset($documentPath) }}"
                                                                             class="img-fluid"
                                                                             alt="{{ ucwords(str_replace('_', ' ', $documentType)) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal for Updating Image -->
                                                        <div class="modal fade" id="update{{ $loop->index }}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="updateLabel{{ $loop->index }}"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="updateLabel{{ $loop->index }}">
                                                                            Update {{ ucwords(str_replace('_', ' ', $documentType)) }}</h5>
                                                                        <button type="button" class="close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('admin.updateDocument', ['driverId' => $driver->id]) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="driver_id"
                                                                               value="{{ $driver->id }}">
                                                                        <input type="hidden" name="form_id"
                                                                               value="{{ $documents->id }}">
                                                                        <input type="hidden" name="document_type"
                                                                               value="{{ $documentType }}">

                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="document">Choose
                                                                                    New {{ ucwords(str_replace('_', ' ', $documentType)) }}</label>

                                                                                {{-- Using the image upload partial --}}
                                                                                @include('admin.partials.image-upload', [
                                                                                    'field' => "documents[$documentType]",
                                                                                    'image' => $driverForm->documents[$documentType] ?? '',
                                                                                    'id' => 'file' . Str::uuid(),
                                                                                    'title' => ucwords(str_replace('_', ' ', $documentType)),
                                                                                    'colSize' => 'col-md-12 col-sm-6',
                                                                                ])
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Update
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div>
                                                        <h4 class="m-4">No Document</h4>
                                                    </div>

                                                @endif


                                            </div>


                                        </div>

                                        <!-- .nk-tb-list -->
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('click', async e => {
            const btn = e.target.closest('.download-doc');
            if (!btn) return;                     // not a download click

            e.preventDefault();

            const url = btn.dataset.url;
            const name = btn.dataset.name || 'download';

            try {
                const blob = await fetch(url).then(r => r.blob());
                const tmp = URL.createObjectURL(blob);

                const a = Object.assign(document.createElement('a'), {
                    href: tmp,
                    download: name
                });
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(tmp);
            } catch (err) {
                alert('Could not download file');
                console.error(err);
            }
        });
    </script>

@endsection

@section('js')


@endsection
