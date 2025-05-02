<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-start">
                <h4 class="page-title mb-0 font-size-18">Edit data {{ $product->name }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-bt-input label="Nama Produk" name="name" value="{{ $product->name }}" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="desc" id="" cols="5" rows="5" class="form-control">
                                {{ $product->desc }}
                            </textarea>
                            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                        </div>
                        <x-bt-input label="harga" name="price" type="number" value="{{ $product->price }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Upload</label>
                                    <input type="file" name="photo" class="form-control">
                                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('storage/' . $product->photo) }}" style="max-width: 150px">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-4">
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
