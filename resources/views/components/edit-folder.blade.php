@props(['folder'])

<!-- Modalni $folder ob'ekti bilan to'g'ri ishlatish -->
<div class="modal fade" id="editFolder{{ $folder->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editFolderLabel{{ $folder->id }}" aria-hidden="true">
   <!-- Modal ichidagi kodlar -->
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="editFolderLabel{{ $folder->id }}">Kategoriya Papkasini Tahrirlash</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <!-- $folder ob'ektidan foydalangan holda form -->
            <form action="{{ route('category-folders.update', $folder->id) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="mb-4">
                  <label class="form-label" for="folder_name{{ $folder->id }}">Nomi <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" maxlength="75" placeholder="Kategoriya Nomi" name="folder_name" id="folder_name{{ $folder->id }}" value="{{ $folder->folder_name }}">
                  @error('folder_name')
                     <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
               </div>
               <div class="mb-4">
                  <label class="form-label" for="description{{ $folder->id }}">Tavsif <span class="text-danger">*</span></label>
                  <textarea rows="10" class="form-control" maxlength="160" name="description" id="description{{ $folder->id }}">{{ $folder->description }}</textarea>
                  @error('description')
                     <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
               </div>
               <div class="row justify-content-center">
                  <button type="button" class="col-5 mx-1 btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                  <button type="submit" class="col-5 mx-1 btn btn-primary">Yangilash</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
