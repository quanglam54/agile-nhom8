<div class="mb-3">
     <label>Tiêu đề</label>
     <input type="text" name="title" class="form-control" value="{{ old('title', $post->title ?? '') }}">
     @error('title') <div class="text-danger">{{ $message }}</div> @enderror
 </div>
 
 <div class="mb-3">
     <label>Ảnh đại diện</label>
     <input type="file" name="thumbnail" class="form-control">
     @if(isset($post) && $post->thumbnail)
         <img src="{{ asset('storage/' . $post->thumbnail) }}" width="100" class="mt-2">
     @endif
 </div>
 
 <div class="mb-3">
     <label>Nội dung</label>
     <textarea name="content" class="form-control" rows="6">{{ old('content', $post->content ?? '') }}</textarea>
     @error('content') <div class="text-danger">{{ $message }}</div> @enderror
 </div>
 
 <div class="mb-3">
     <label>Trạng thái</label>
     <select name="status" class="form-control">
         <option value="draft" {{ old('status', $post->status ?? '') == 'draft' ? 'selected' : '' }}>Nháp</option>
         <option value="published" {{ old('status', $post->status ?? '') == 'published' ? 'selected' : '' }}>Công khai</option>
     </select>
 </div>
 