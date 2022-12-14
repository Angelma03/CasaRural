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
            <div class="border border-danger rounded-b bg-danger mt-1 px-4 py-3 text-white">
                {{ $message }}
            </div>
            @enderror


                <label for="fechaEntrada" class="mt-2 col-form-label">Fecha de entrada:</label>
                <div class="input-group date" id="datepicker">
                    <span class="input-group-append">
                            <span class="input-group-text bg-white">
                            <i class='fa fa-calendar' style='font-size:24px'></i>
                            </span>
                        </span>
                     <input type="text" class="form-control" name="fechaEntrada" id="fechaEntrada" value="{{ old('fechaEntrada') ?? $reserva->fechaEntrada }}">
                </div>
            @error("fechaEntrada")
            <div class="border border-danger rounded-b bg-danger mt-1 px-4 py-3 text-white">
                {{ $message }}
            </div>
            @enderror


            <label for="fechaSalida" class="mt-2 col-form-label">Fecha de Salida:</label>
                <div class="input-group date" id="datepicker1">
                    <span class="input-group-append">
                            <span class="input-group-text bg-white">
                            <i class='fa fa-calendar' style='font-size:24px'></i>
                            </span>
                        </span>
                     <input type="text" class="form-control" name="fechaSalida" id="fechaSalida" value="{{ old('fechaSalida') ?? $reserva->fechaSalida }}">
                </div>
            @error("fechaSalida")
            <div class="border border-danger rounded-b bg-danger mt-1 px-4 py-3 text-white">
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
</script>
<script type="text/javascript">
  var diasEntreFechas = function(fechasEntrada, fechasSalida) {
  	var dia_actual = fechasEntrada;
    var fechasmedio = [];
  	while (dia_actual.isSameOrBefore(fechasSalida)) {
    	fechasmedio.push(dia_actual.format('YYYY-MM-DD'));
   		dia_actual.add(1, 'days');
  	}
  	return fechasmedio;
};


        $(function() {
       
            var fechas_entrada = <?php echo json_encode($fechasEntrada) ?>;
            var fechas_salida = <?php echo json_encode($fechasSalida) ?>;  
            var resultado = [];
            for(var i=0; i < fechas_entrada.length; i++){
            var fechasEntrada= moment(fechas_entrada[i]); 
            var fechasSalida = moment(fechas_salida[i]);
            resultado.push(diasEntreFechas(fechasEntrada, fechasSalida));
            }
            console.log(resultado.toString());
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '+1d',
                datesDisabled:resultado.toString(),
                clearBtn:true
            });
            
        });
</script>




<script type="text/javascript">
  var diasEntreFechas = function(fechasEntrada, fechasSalida) {
  	var dia_actual = fechasEntrada;
    var fechasmedio = [];
  	while (dia_actual.isSameOrBefore(fechasSalida)) {
    	fechasmedio.push(dia_actual.format('YYYY-MM-DD'));
   		dia_actual.add(1, 'days');
  	}
  	return fechasmedio;
};


        $(function() {
            var fechas_entrada = <?php echo json_encode($fechasEntrada) ?>;
            var fechas_salida = <?php echo json_encode($fechasSalida) ?>;  
            var resultado = [];
            for(var i=0; i < fechas_entrada.length; i++){
            var fechasEntrada= moment(fechas_entrada[i]); 
            var fechasSalida = moment(fechas_salida[i]);
            resultado.push(diasEntreFechas(fechasEntrada, fechasSalida));
            }
            console.log(resultado.toString());
            $('#datepicker1').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '+1d',
                datesDisabled:resultado.toString(),
                clearBtn:true
            });
            
        });
</script>
</div>

