@props(['category', 'folders'])
<!-- Create Category Modal -->
<div class="modal fade" id="editCategory{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCategoryLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editCategoryLabel{{ $category->id }}">Edit category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label" for="name">Наименование <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" maxlength="75" placeholder="Наименование" name="name" id="name" value="{{ $category->name }}" required>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Группа</label>
                        <select class="form-select" data-select2-selector="icon" name="folder_id" id="folder_id" value="{{ $category->folder_id }}" required>
                        @foreach($folders as $folder)
                            <option value="{{ $folder->id }}">{{ $folder->folder_name }}</option>
                        @endforeach
                        </select>
                        @error('folder_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Описание <span class="text-danger">*</span></label>
                        <textarea rows="10" class="form-control" maxlength="160" placeholder="Описание" name="description" id="description" value="{{ $category->description }}"></textarea>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row justify-content-center mt-3 gap-2">
                        <div class="col-sm-12 col-lg-5 d-flex align-items-center">
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                        <div class="col-sm-12 col-lg-5">
                            <button type="submit" class="btn btn-primary w-100">Update Category</button>
                        </div>
                        
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>
