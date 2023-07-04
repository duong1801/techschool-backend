<div class="modal" id="modal_course">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tạo chuyên mục khóa học</h2>
                <button type="button"btn_close class="btn btn-lg btn_close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal_form">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Tên chuyên mục</label>
                        <input type="text" name="name" placeholder="Nhập tiêu đề..." class="modal_input form-control"
                            id="input_modal_name" required>
                    </div>

                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" name="slug" placeholder="Nhập link..." id="input_modal_slug"
                            class="modal_input form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="my-editor" class="col-form-label">Mô tả</label>
                        <textarea id="modal-md" name="description" class="modal_input markdown form-control ckeditor"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn_close">Đóng</button>
                <button type="button" id="" data-action="{{ route('ajaxCategory') }}"
                    class="btn btn-primary btn_submit">Tạo mới</button>
            </div>
        </div>
    </div>
</div>