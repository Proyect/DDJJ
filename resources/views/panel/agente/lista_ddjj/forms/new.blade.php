<div class="card mb-5">
    <form action="{{ $ddjj->id ? route('ddjj.update', $funcionario) : route('ddjj.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($ddjj->id)
            @method('PUT')
        @endif

        <div class="card-body">            
                                
            <div class="mb-3 row">
                <label for="funcionario" class="col-sm-4 col-form-label"> * Funcionario: </label>
                <div class="col-sm-8">
                    <select id="funcionario" name="funcionario" class="form-control" required>
                        @foreach ($funcionarios as $funcionario)
                            <option {{ $ddjj->idFuncionario && $ddjj->idFuncionario == $funcionario->id ? 'selected': ''}} value="{{ $funcionario->id }}"> 
                                {{ $funcionario->nombre }}
                                {{ $funcionario->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            
            <div class="mb-3 row">
                <label for="cargo" class="col-sm-4 col-form-label"> Cargo: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cargo" name="cargo" value="{{ old('cargo', optional($ddjj)->cargo) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tel" class="col-sm-4 col-form-label"> Organismo: </label>
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
                <label for="cel" class="col-sm-4 col-form-label"> N° Instrumento: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="numInstr" name="numInstr" value="{{ old('numInstr', optional($ddjj)->numInstr) }}" required> {{-- name es para php, id para JS --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cel" class="col-sm-4 col-form-label"> Fecha Instrumento: </label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="fchInstr" name="fchInstr" {{-- value="{{ old('fchInstr', optional($ddjj)->fchInstr) }}" --}} required> {{-- name es para php, id para JS --}}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="calle" class="col-sm-4 col-form-label"> Domicilio Laboral: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="domLab" name="domLab" value="{{ old('domLab', optional($ddjj)->domLab) }}" required>
                </div>
            </div>
  
           

            <div class="mb-3 row">
                <label for="obligado" class="col-sm-4 col-form-label"> * Obligado: </label>
                <div class="col-sm-8">
                    <input type="radio"  id="obligado" name="obligado" value="Si{{-- {{ old('genero', optional($funcionario)->genero) }} --}}" checked>
                        Si<br>
                    <input type="radio" name="obligado" id="obligado" value="No{{-- {{ old('genero', optional($funcionario)->genero) }} --}}">
                        No
                </div>
            </div>
                        

            <div class="mb-3 row">
                <label for="observacionesDJ" class="col-sm-4 col-form-label"> Observaciones: </label>
                <div class="col-sm-8">                   
                    <textarea class="form-control" id="observacionesDJ" name="observacionesDJ" rows="10" cols="50" >{{ old('observacionesDJ', optional($ddjj)->observacionesDJ) }}
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

