<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>{{ env('APP_NAME') }}</title>
  </head>
  <body>

  <div class="container mt-3 ">
        <div class="row ">
            <div class="col-md-6">
                <img src="path/to/logo.png" alt="Company Logo" class="img-fluid">
            </div>
            <div class="col-md-6 text-right">
                <p>Phone: 01753424350</p>
                <p>Email: info@animotor.co.uk</p>
                <p>Web: www.animotor.co.uk</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>ANI Motors Ltd, Office 7 Albion House, 6 Albion Close, Slough SL2 5DT</p>
            </div>
        </div>
        <div class="important-notice">
            <p><strong>Important Notice: </strong>Lorem ipsum dolor sit amet consectetur. Et ipsum enim semper faucibus enim neque volutpat. At consectetur id potenti libero. Ipsum felis maecenas nulla nunc condimentum mauris. Dolor vel justo porta in elit eget. At diam ultricies posuere dignissim ultrices tristique quam. Elit metus proin viverra nec penatibus. Vitae nec nunc phasellus turpis.</p>
        </div>
        <div>
            <div class="row mb-3 mt-3">
            <div class="col-12 section-title">
               <h4> Hirer Details:</h4>
            </div>
            </div>
            <div class="row">
                @foreach ($formFieldsJson['Hirer'] as $field)
                    @php
                        $shouldHide = in_array($field['fieldName'], ['work_phone', 'hire_type']);
                    @endphp
                     <div class="col-md-4 mb-5" id="pdf-{{ $field['fieldName'] }}" style="{{ $shouldHide ? 'display:none;' : '' }}">
                        <strong style="margin-bottom: 10px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</strong>
                         <br><br>
                         <span class="lead mt-2">{{ $submittedData[$field['fieldName']] ?? '___________' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            <div class="row mb-3 mt-3">
            <div class="col-12 section-title">
               <h4> Address Details:</h4>
            </div>
            </div>
            <div class="row">
                @foreach ($formFieldsJson['Address'] as $field)
                     <div class="col-md-4 mb-5">
                        <strong style="margin-bottom: 10px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</strong>
                         <br><br>
                         <span class="lead mt-2">{{ $submittedData[$field['fieldName']] ?? '___________' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="row mb-3 mt-3">
                <div class="col-12 section-title">
                   <h4> Vehicle Details:</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($formFieldsJson['Vehicle'] as $field)
                     <div class="col-md-4 mb-5 mt-2">
                        <strong style="margin-bottom: 10px">{{ ucfirst(str_replace('_', ' ', $field['fieldName'])) }}</strong>
                         <br><br>
                         <span class="lead mt-2">{{ $submittedData[$field['fieldName']] ?? '___________' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
{{--      @pageBreak--}}
       <div class="section">
            <h2>Statement of Liability</h2>
            <p>{{ $submittedData['statement_of_liability'] ?? '' }}</p>
        </div>
      <div class="mt-4">
            <div class="row mb-3">
            <div class="col-12 section-title">
               <h4> Signature:</h4>
            </div>
            </div>
            <div class="row">
                @if(isset($submittedData['signature']))
                <img src="{{ public_path('uploads/' . $submittedData['signature']) }}" alt="Signature">
               @endif
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
