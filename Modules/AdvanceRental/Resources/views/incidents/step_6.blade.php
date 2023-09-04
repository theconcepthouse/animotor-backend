
<div class="col-12 d-flex justify-content-center">
    <h3>Weather & Diagram</h3>
</div>

<div class="col-12 d-flex justify-content-between weather">
    <p>Weather conditions </p>
    <div>
        <input type="radio" name="weather.condition" value="sun"> <label>Sun</label>
        <input type="radio" name="weather.condition" value="rain"> <label>Rain</label>
        <input type="radio" name="weather.condition" value="snow"> <label>Snow</label>
        <input type="radio" name="weather.condition" value="ice"> <label>Ice</label>
        <input type="radio" name="weather.condition" value="fog"> <label>Fog</label>
    </div>

</div>
<div class="col-12 d-flex justify-content-between weather">
    <p>Road conditions </p>
    <div>
        <input type="radio" name="weather.road_condition" value="Dry"> <label>Dry</label>
        <input type="radio" name="weather.road_condition" value="Wet"> <label>Wet</label>
        <input type="radio" name="weather.road_condition" value="snow"> <label>Snow</label>
        <input type="radio" name="weather.road_condition" value="ice"> <label>Ice</label>
        <input type="radio" name="weather.road_condition" value="mud"> <label>Fog</label>
    </div>

</div>
@include('admin.partials.image-m-upload',['field' => 'weather.diagram','id' => 'diagram', 'colSize' => 'col-md-12', 'title' => 'Diagram'])
<div class="col-12">
    <p><input class="me-4" type="checkbox" required name="consent" value="yes" />I confirm the contents of this statementt are true to the best of my knowledge and belief</p>
</div>

@include('admin.partials.image-upload',['field' => 'weather.signature','id' => 'signature', 'colSize' => 'col-md-6', 'title' => 'Signature'])
