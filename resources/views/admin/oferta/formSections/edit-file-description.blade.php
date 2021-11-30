<div class="form-group">
    <label for="name">Nombre de la campaña</label>
    <input type="text" name="name" onchange="valida()" class="form-control" id="name-offer" value="{{$offer->name}}">
</div>
<div class="form-group">
    <label for="description">Descripción de la campaña</label>
    <textarea name="description" onchange="valida()" class="form-control" cols="20" rows="5" id="description"> {{$offer->description}}</textarea>
</div>
<div class="form-group row">
    <div class="col-12 col-lg-6">
        <label for="file">Cambiar imagen</label>
        <br>
        <input type="file" name="file" onchange="valida()" id="file-offer">
    </div>
    <div class="col-12 col-lg-6">
        @if ($offer->files)
            @foreach ($offer->files as $file)
                <input type="hidden" name="file_id" value="{{$file->id}}">
                <img src="/storage/{{$file->file}}" class="image-form-edit-offer">
            @endforeach
        @endif
    </div>
</div>