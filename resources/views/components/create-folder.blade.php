<!-- Create Folder Modal -->
<div class="modal fade" id="createFolder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createFolderLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createFolderLabel">Create New Folder</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('category-folders.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label" for="folder_name">Folder Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" maxlength="75" placeholder="Folder Name" name="folder_name" id="folder_name" required>
                @error('folder_name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="folder_description">Description <span class="text-danger">*</span></label>
                <textarea rows="5" class="form-control" maxlength="160" name="folder_description" id="folder_description" placeholder="Folder Description" required></textarea>
                @error('folder_description')
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