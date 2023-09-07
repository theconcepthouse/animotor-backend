
<div class="col-12 d-flex justify-content-center">
    <h3>Weather & Diagram</h3>
</div>

<div class="col-12 d-flex justify-content-between weather">
    <p>Weather conditions </p>
    <div>
        <input type="radio" {{ isset($incident?->weather['condition']) ? ($incident?->weather['condition'] ==  'sun' ? 'checked' : '' ) : '' }}  name="weather[condition]" value="sun"> <label>Sun</label>
        <input type="radio" {{ isset($incident?->weather['condition']) ? ($incident?->weather['condition'] ==  'rain' ? 'checked' : '' ) : '' }} name="weather[condition]" value="rain"> <label>Rain</label>
        <input type="radio" {{ isset($incident?->weather['condition']) ? ($incident?->weather['condition'] ==  'snow' ? 'checked' : '' ) : '' }} name="weather[condition]" value="snow"> <label>Snow</label>
        <input type="radio" {{ isset($incident?->weather['condition']) ? ($incident?->weather['condition'] ==  'ice' ? 'checked' : '' ) : '' }} name="weather[condition]" value="ice"> <label>Ice</label>
        <input type="radio" {{ isset($incident?->weather['condition']) ? ($incident?->weather['condition'] ==  'fog' ? 'checked' : '' ) : '' }} name="weather[condition]" value="fog"> <label>Fog</label>
    </div>

</div>
<div class="col-12 d-flex justify-content-between weather">
    <p>Road conditions </p>
    <div>
        <input type="radio" {{ isset($incident?->weather['road_condition']) ? ($incident?->weather['road_condition'] ==  'Dry' ? 'checked' : '' ) : '' }} name="weather[road_condition]" value="Dry"> <label>Dry</label>
        <input type="radio" {{ isset($incident?->weather['road_condition']) ? ($incident?->weather['road_condition'] ==  'Wet' ? 'checked' : '' ) : '' }} name="weather[road_condition]" value="Wet"> <label>Wet</label>
        <input type="radio" {{ isset($incident?->weather['road_condition']) ? ($incident?->weather['road_condition'] ==  'Snow' ? 'checked' : '' ) : '' }} name="weather[road_condition]" value="Snow"> <label>Snow</label>
        <input type="radio" {{ isset($incident?->weather['road_condition']) ? ($incident?->weather['road_condition'] ==  'Ice' ? 'checked' : '' ) : '' }} name="weather[road_condition]" value="Ice"> <label>Ice</label>
        <input type="radio" {{ isset($incident?->weather['road_condition']) ? ($incident?->weather['road_condition'] ==  'Mud' ? 'checked' : '' ) : '' }} name="weather[road_condition]" value="Mud"> <label>Fog</label>
    </div>

</div>
@include('admin.partials.image-upload',['field' => 'diagrams','id' => 'diagram', 'image' => $incident?->diagrams, 'colSize' => 'col-md-12', 'title' => 'Diagram'])
<div class="col-12">
    <p><input class="me-4" type="checkbox" required name="consent" value="yes" />I confirm the contents of this statement are true to the best of my knowledge and belief</p>
</div>

@include('admin.partials.image-upload',['field' => 'signature','id' => 'signature', 'image' => $incident?->signature, 'colSize' => 'col-md-6', 'title' => 'Signature'])
