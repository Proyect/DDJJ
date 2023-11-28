<div class="card mb-5">
    <form action="{{ $dtipo->id ? route('dtipo.update', $dtipo) : route('dtipo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($dtipo->id)
            @method('PUT')
        @endif

        <div class="card-body">

                        
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', optional($dtipo)->nombre) }}" required>
                </div>
            </div>

            
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $dtipo->id ? 'Actualizar' : 'Crear' }}
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