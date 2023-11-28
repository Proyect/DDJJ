<div class="card mb-5">
    <form action="{{ $djtipo->id ? route('djtipo.update', $djtipo) : route('djtipo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($djtipo->id)
            @method('PUT')
        @endif

        <div class="card-body">

                        
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', optional($djtipo)->nombre) }}" required>
                </div>
            </div>

            
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $djtipo->id ? 'Actualizar' : 'Crear' }}
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