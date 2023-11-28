<div class="card mb-5">
    <form action="{{ $user->id ? route('usuario.update', $user) : route('usuario.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @if ($user->id)
            @method('PUT')
        @endif

        <div class="card-body">

                       
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Nombre: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('name', optional($user)->name) }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-4 col-form-label"> * Email: </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', optional($user)->email) }}" required>
                </div>
            </div>

            
        
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success text-uppercase">
                {{ $user->id ? 'Actualizar' : 'Crear' }}
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