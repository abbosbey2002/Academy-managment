<!-- Modal -->
<div class="modal fade" id="createCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label" for="name">Наименование <span class="text-danger">*</span></label>
                <input type="text" class="form-control" maxlength="75" placeholder="Category Name" name="name" id="name">
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Группа</label>
                <select class="form-select" data-select2-selector="icon" name="folder_id" id="folder_id">
                  <option value="">Select Folder</option>
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
                <textarea rows="10" class="form-control" maxlength="160" placeholder="Meta Description (max 160 chars)"></textarea>
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="row justify-content-center">
              <button type="button" class="col-5 mx-1 btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="col-5 mx-1 btn btn-primary">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>