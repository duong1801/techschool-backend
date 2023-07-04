<div class="modal modal-module">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tạo nhóm bài học</h2>
                <button type="button" btn_close class="btn btn-lg btn_close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal_form modal_form_module">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Tên nhóm bài học</label>
                        <input type="text" placeholder="Nhập tên" name="name" class="modal_input form-control"
                            id="name" >
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" placeholder="Nhập slug" name="slug" id="input_modal_slug"
                            class="modal_input form-control" >
                    </div>
                    <div class="form-group">
                        <label>Khóa học</label>
                        <select class="form-select form-control form-select-course" name="course_id">
                            <option value="">Chọn khóa học</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                </div>
                    <div class="form-group">
                        <label for="my-editor" class="col-form-label">Mô tả</label>
                        <textarea id="modal-md-module" name="description" class="modal_input form-control ckeditor"></textarea>
                    </div>
                </form>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn_close">Đóng</button>
                <button type="button" id="" data-action="{{ route('ajaxModule') }}"
                    class="btn btn-primary btn_submit_module">Tạo mới</button>
            </div>
        </div>
    </div>
</div>
