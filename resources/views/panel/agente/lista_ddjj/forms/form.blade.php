<div class="card mb-5">
    <form action="{{ $ddjj->id ? route('ddjj.update', $ddjj) : route('ddjj.store') }}" method="POST" enctype="multipart/form-data">
{{--  <form action="{{ $funcionario->id ? route('funcionario.update', $funcionario) : route('funcionario.store') }}" method="POST" enctype="multipart/form-data"> --}}   
        @csrf
        
        @if ($ddjj->id)
            @method('PUT')
        @endif

        <div class="card-body">
            
            
            <div class="mb-3 row">
                <label for="id" class="col-sm-4 col-form-label" > Id: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="id" name="id" value="{{ old('id', optional($ddjj)->id) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="idFunc" class="col-sm-4 col-form-label"hidden> Id Func: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="idFunc" name="idFunc" value="{{ old('id', optional($ddjj->funcionario)->id) }}" hidden>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> Nombre: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', optional($ddjj->funcionario)->nombre) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="apellido" class="col-sm-4 col-form-label"> Apellido: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', optional($ddjj->funcionario)->apellido) }}" readonly>
                </div>
            </div>
            
                               
            <div class="mb-3 row">
                <label for="cargo" class="col-sm-4 col-form-label"> * Cargo: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cargo" name="cargo" value="{{ old('cargo', optional($ddjj)->cargo) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tel" class="col-sm-4 col-form-label"> * Organismo: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="organismo" name="organismo" value="{{ old('organismo', optional($ddjj)->organismo) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tipoDoc" class="col-sm-4 col-form-label"> * Tipo de DDJJ: </label>
                <div class="col-sm-8">
                    <select id="tipoDDJJ" name="tipoDDJJ" class="form-control" required>
                        @foreach ($djtipos as $djtipo)
                            <option {{ $ddjj->idTipoDDJJ && $ddjj->idTipoDDJJ == $djtipo->id ? 'selected': ''}} value="{{ $djtipo->id }}"> 
                                {{ $djtipo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cel" class="col-sm-4 col-form-label">*  N° Instrumento: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="numInstr" name="numInstr" value="{{ old('numInstr', optional($ddjj)->numInstr) }}" required> {{-- name es para php, id para JS --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cel" class="col-sm-4 col-form-label"> * Fecha Instrumento: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="fchInstr" name="fchInstr" value="{{ old('fchInstr', optional($ddjj)->fchInstr) }}" required> {{-- name es para php, id para JS --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cel" class="col-sm-4 col-form-label" hidden> Conyuge: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="conyuge" name="conyuge" value="{{ old('conyuge', optional($ddjj)->conyuge) }}" hidden>{{-- name es para php, id para JS --}}
                </div>
            </div>

           
            <div class="mb-3 row">
                <label for="estadoCiv" class="col-sm-4 col-form-label" hidden> estadoCiv: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="estadoCiv" name="estadoCiv" value="{{ old('estadoCiv', optional($ddjj->cestados)->nombre)}}" hidden>
                </div>
            </div>
              
            <div class="mb-3 row">
                <label for="calle" class="col-sm-4 col-form-label">* Domicilio Laboral: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="domLab" name="domLab" value="{{ old('domLab', optional($ddjj)->domLab) }}" required>
                </div>
            </div>
  
            <div class="mb-3 row">
                <label for="idDom" class="col-sm-4 col-form-label"> Domicilio Particular: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="domPart" name="domPart" value="{{ old('domPart', optional($ddjj)->domPart) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telLab" class="col-sm-4 col-form-label"> TelLab: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="telLab" name="telLab" value="{{ old('telLab', optional($ddjj)->telLab) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telLab" class="col-sm-4 col-form-label"> Cel: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cel" name="cel" value="{{ old('cel', optional($ddjj)->cel) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="estadoCarga" class="col-sm-4 col-form-label"> Estado: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="estadoCarga" name="estadoCarga" value="{{ old('estadoCarga', optional($ddjj)->estadoCarga) }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="obligado" class="col-sm-4 col-form-label"> Obligado: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="obligado" name="obligado" value="{{ old('obligado', optional($ddjj)->obligado) }}" readonly>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="vencida" class="col-sm-4 col-form-label"> Vencida: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="vencida" name="vencida" value="{{ old('vencida', optional($ddjj)->vencida) }}" readonly>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="observacionesDJ" class="col-sm-4 col-form-label"> Observaciones: </label>
                <div class="col-sm-8">                   
                    <textarea class="form-control" id="observacionesDJ" name="observacionesDJ" rows="10" cols="50" required>{{ old('observacionesDJ', optional($ddjj)->observacionesDJ) }}
                    </textarea>
                </div>             

            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $ddjj->id ? 'Actualizar' : 'Crear' }}
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

