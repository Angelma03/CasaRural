<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->


<div class="row justify-content-center mt-4">
<div class="col-lg-4  border border-dark">
<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
@csrf
    @isset($update)
        @method("PUT")
    @endisset
        
            
            <input type="text" name="id_casa" value="{{$casa->id}}" class="form-control" id="id_casa" hidden>

            <div class="row bg-form mb-1">
                <h3 class="text-center h3 ">Formulario para {{$title}}</h3>
            </div>
            <label for="ocupantes" class="form-label">Escribe el numero de ocupantes: </label>
            <input type="number" name="ocupantes" max="{{$casa->capacidad}}" min="1" value="{{ old('ocupantes') ?? $reserva->ocupantes }}" class="form-control" id="capacidad" aria-describedby="capacidad">
            @error("ocupantes")
            <div class="border border-danger rounded-b bg-danger mt-1 px-4 py-3 text-success">
                {{ $message }}
            </div>
            @enderror


            <label for="fechaEntrada" class="form-label">Fecha de entrada: </label>
            <input  type="date" onchange="precioTotal()" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> name="fechaEntrada" class="form-control" id="fechaEntrada" value="{{ old('fechaEntrada') ?? $reserva->fechaEntrada }}" aria-describedby="fechaEntrada">
            @error("fechaEntrada")
            <div class="border border-danger rounded-b bg-danger mt-1 px-4 py-3 text-success">
                {{ $message }}
            </div>
            @enderror


            <label for="fechaSalida"  class="form-label">Fecha de Salida: </label>
            <input  type="date" name="fechaSalida" onchange="precioTotal()" class="form-control" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> id="fechaSalida" value="{{ old('fechaSalida') ?? $reserva->fechaSalida }}" aria-describedby="fechaSalida">
            @error("fechaSalida")
            <div class="border border-danger rounded-b bg-danger mt-1 px-4 py-3 text-success">
                {{ $message }}
            </div>
            @enderror

            <div class="mt-2 text-dark text-bold bg-total">
                <strong><p id="precio"></p></strong>
            </div>

            <button class="justify-content-center m-3 p-2 bg-success" type="submit">
                <strong>{{ $textButton }}</strong>
            </button>
</form>
</div>
</div>
<div>
<script>
function precioTotal() {
    let fecha1, fecha2, dias, precio;
    // Comparar si algún valor está vacío
    if(fechaEntrada.value == '' || fechaSalida.value == '') {
        dias = " ";
    } else {
        fecha1 = new Date(fechaEntrada.value);
        fecha2 = new Date(fechaSalida.value);
        precio={{$casa->precio}};
        let difference = fecha2 - fecha1;
        dias = difference / (1000 * 3600 * 24);

    console.log(dias);
    document.getElementById("precio").innerHTML = "El precio total por "+dias+" dias es de "+precio*dias+" €";
}
}
$(function () {
    $("#fechaSalida").datepicker({
        changeMonth : true,
        changeYear : true,
        autoclose: true,
        firstDay : 1,
        format: "dd/mm/yyyy",
        language: "es",
        datesDisabled: "11/12/2022",
    });
});
</script>
</div>

