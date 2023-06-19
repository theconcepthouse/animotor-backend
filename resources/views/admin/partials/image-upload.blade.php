<div class="{{ isset($colSize) ? $colSize : 'col-md-12 col-sm-12' }}">
    <div class="form-group">
        <label class="form-label" for="">{{ ucfirst($title) }}</label>

        @if(isset($image))
            <br/>
            <img src="{{ $image }}" width="auto" height="50" />
            <br/>
            <br/>
        @endif
        <div class="form-control-wrap">
            <div class="input-group">
   <span class="input-group-btn">
     <a  data-input="{{ $id }}" data-preview="{{ $id }}_holder" class="btn btn-primary lfm">
       <i class="fas fa-picture"></i> Choose Image
     </a>
   </span>
                @if (isset($image))
                    <input id="{{ $id }}" class="form-control" type="hidden" value="{{ $image }}" name="{{ $field }}">
                    <input disabled  class="form-control" value="{{ $image }}" type="text">

                @else
                    <input id="{{ $id }}" class="form-control" type="hidden" name="{{ $field }}">
                    <input disabled class="form-control" value="" type="text">
                @endif
            </div>
            <div id="{{ $id }}_holder" style="margin-top:15px; margin-bottom:20px;max-height:200px;"></div>
        </div>

    </div>

</div>
