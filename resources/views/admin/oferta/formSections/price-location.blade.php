<div class="form-group row">
    <div class="col-12 col-lg-6">
        <select name="line_id" class="form-control" id="line">
            <option value="">Selecciona línea</option>
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
    <input type="number" name="price" class="form-control" onchange="enableSubmit()" id="price" placeholder="Por favor colocar precio sin puntos">
</div>
<div class="form-group row">
    <div class="col-12 col-lg-4">
        <label>Departamento</label>
        <input type="text" name="department" onchange="enableSubmit()" id="departament" class="form-control">
    </div>
    <div class="col-12 col-lg-4">
        <label>Ciudad, vereda o municipio</label>
        <input type="text" name="city" id="city" onchange="enableSubmit()" class="form-control">
    </div>
    <div class="col-12 col-lg-4">
        <label>Dirección</label>
        <input type="text" name="location" class="form-control" id="submit-offer">
    </div>
</div>