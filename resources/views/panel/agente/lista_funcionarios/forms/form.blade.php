<div class="card mb-5">
    <form action="{{ $funcionario->id ? route('funcionario.update', $funcionario) : route('funcionario.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($funcionario->id)
            @method('PUT')
        @endif

        <div class="card-body">
            
            
            <div class="mb-3 row">
                <label for="id" class="col-sm-4 col-form-label" > Id Funcionario: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="id" name="id" value="{{ old('id', optional($funcionario)->id) }}" readonly>
                </div>
            </div>
           
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', optional($funcionario)->nombre) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="apellido" class="col-sm-4 col-form-label"> * Apellido: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', optional($funcionario)->apellido) }}" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="genero" class="col-sm-4 col-form-label"> * Género: </label>
                <div class="col-sm-8">
                    <input type="radio"  id="genero" name="genero" value="Femenino{{-- {{ old('genero', optional($funcionario)->genero) }} --}}" checked>
                        Masculino<br>
                    <input type="radio" name="genero" id="genero" value="Masculino{{-- {{ old('genero', optional($funcionario)->genero) }} --}}">
                        Femenino
                </div>
            </div>

            
          {{-- <div class="mb-3 row"> --}}


            <div class="mb-3 row">
                <label for="tipoDoc" class="col-sm-4 col-form-label"> * Tipo de Documento: </label>
                <div class="col-sm-8">
                    <select id="idTipoDoc" name="idTipoDoc" class="form-control" required>
                        @foreach ($dtipos as $dtipo)
                            <option {{ $funcionario->idTipoDoc && $funcionario->idTipoDoc == $dtipo->id ? 'selected': ''}} value="{{ $dtipo->id }}"> 
                                {{ $dtipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

         
            <div class="mb-3 row">
                <label for="numDoc" class="col-sm-4 col-form-label"> * Número de Documento: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="numDoc" name="numDoc" value="{{ old('numDoc', optional($funcionario)->numDoc) }}" required>
                </div>
            </div>

            {{-- 

            <div class="mb-3 row">
                <label for="estCivil" class="col-sm-4 col-form-label"> * Estado Civil: </label>
                <div class="col-sm-8">
                    <select id="idEstCivil" name="idEstCivil" class="form-control" required>  
                        @foreach ($cestados as $cestado)
                            <option {{ $funcionario->idEstCivil && $funcionario->idEstCivil == $cestado->id ? 'selected': ''}} value="{{ $cestado->id }}"> 
                                {{ $cestado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="mb-3 row">
                <label for="numDoc" class="col-sm-4 col-form-label"> Conyúge: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="conyuge" name="conyuge" value="{{ old('conyúge', optional($funcionario)->conyuge) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tel" class="col-sm-4 col-form-label"> Tel: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel', optional($funcionario)->tel) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cel" class="col-sm-4 col-form-label"> Cel: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cel" name="cel" value="{{ old('cel', optional($funcionario)->cel) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="barrio" class="col-sm-4 col-form-label"> Barrio: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="barrio" name="barrio" value="{{ old('barrio', optional($funcionario)->domicilio->barrio)}}" readonly>
                </div>
            </div>
              
            <div class="mb-3 row">
                <label for="calle" class="col-sm-4 col-form-label"> Calle: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="calle" name="calle" value="{{ old('calle', optional($funcionario)->domicilio->calle) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="idDom" class="col-sm-4 col-form-label"> Num: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="num" name="num" value="{{ old('num', optional($funcionario)->domicilio->num) }}" readonly>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="piso" class="col-sm-4 col-form-label"> Piso: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="piso" name="piso" value="{{ old('piso', optional($funcionario)->domicilio->piso) }}" readonly>
                </div>
            </div> --}}

            

            <div class="mb-3 row">
                <label for="observacionesF" class="col-sm-4 col-form-label"> Observaciones: </label>
                <div class="col-sm-8">                   
                    <textarea class="form-control" id="observacionesF" name="observacionesF" rows="10" cols="50" >{{ old('observacionesF', optional($funcionario)->observacionesF) }}
                    </textarea>
                </div>
                

            </div>
                   
{{-- 
            <div class="mb-3 row">
                <label for="fchReg" class="col-sm-4 col-form-label" hidden> IdDom: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="idDom" name="idDom" value="{{ old('idDom', optional($funcionario)->idDom) }}" hidden>
                </div>
            </div> --}}

            <div class="mb-3 row">
                <label for="fchReg" class="col-sm-4 col-form-label" style="font-size: small"> * Datos Obligatorios </label>                
            </div>
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $funcionario->id ? 'Actualizar' : 'Crear' }}
            </button>
        </div>
    </form>

</div>

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const image = document.getElementById('imagen');
        
            image.addEventListener('change', (e) => {

                const input = e.target;
                const imagePreview = document.querySelector('#image_preview');
                
                if(!input.files.length) return

                file = input.files[0];
                objectURL = URL.createObjectURL(file);
                imagePreview.src = objectURL;
            });
        });
    </script>
@endpush

