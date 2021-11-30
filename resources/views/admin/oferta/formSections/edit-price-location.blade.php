<div class="form-group row">
    <div class="col-12 col-lg-6">
        <select name="line" class="form-control" id="line">
            @if ($offer->lines)
                @foreach ($offer->lines as $line)
                    <option value="{{$line->id}}">{{$line->line}}</option>
                @endforeach
            @endif
            @if ($lines)
                @foreach ($lines as $line)
                    <option value="{{$line->id}}">{{$line->line}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
<div class="form-group">
    <label>Precio de oferta</label>
    <input type="number" name="price" class="form-control" id="price" value="{{$offer->price}}">
</div>
<div class="form-group row">
    @if ($offer->locations)
        @foreach ($offer->locations as $location)
            <div class="col-12 col-lg-4">
                <label>Departamento</label>
                <input type="hidden" name="location_id" value="{{$location->id}}">
                <input type="text" name="department" value="{{$location->department}}" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <label>Ciudad, vereda o municipio</label>
                <input type="text" name="city" value="{{$location->city}}" class="form-control">
            </div>
            <div class="col-12 col-lg-4">
                <label>Dirección</label>
                <input type="text" name="location" value="{{$location->location}}" class="form-control">
            </div>
        @endforeach
    @endif
</div>