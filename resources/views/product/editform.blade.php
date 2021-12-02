
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label><br>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="product's name" value = "{{ $product->nama }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="description" value = "{{ $product->deskripsi }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="releaseyear" class="col-sm-3 col-form-label">Release Year</label><br>
                        <div class="col-sm-10">
                            <input type="text" name="releaseyear" class="form-control" id="releaseyear" placeholder="release year" value = "{{ $product->tahun_rilis }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Price</label><br>
                        <div class="col-sm-10">
                            <input type="text" name="harga" class="form-control" id="harga"
                                placeholder="Price" value = "{{ $product->harga }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-sm-3 col-form-label">Stock</label><br>
                        <div class="col-sm-10">
                            <input type="text" name="stock" class="form-control" id="stock" placeholder="stock" value = "{{ $product->stok }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 col-form-label">Image</label><br>
                        <div class="col-sm-10">
                            <input type="text" name="image" class="form-control" id="image" placeholder="11" disabled value = "{{ $product->foto }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option disabled>select category</option>
                                @foreach ($categories as $item)
                                    @if($item->id == $product->category->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <select name="brand_id" id="brand_id" class="form-control" required>
                                <option disabled selected>select brand</option>
                                @foreach ($brands as $item)
                                @if($item->id == $product->category->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama_brand }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nama_brand }}</option>
                                @endif  
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-right modal-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a href="" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>