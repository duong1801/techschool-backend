<div class="modal modal-course" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tạo khóa học</h2>
                <button type="button" btn_close class="btn btn-lg btn_close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="modal_form modal_form_course">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Tên khóa học</label>
                        <input type="text" placeholder="Nhập tên" name="name" class="modal_input form-control"
                            id="name" >
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input type="text" placeholder="Nhập slug" name="slug" id="input_modal_slug"
                            class="modal_input form-control" >
                    </div>
                    <div class="form-group">
                        <label for="thumnail">Hình ảnh</label>
                        <div class="input-group row m-0">
                            <div class="pl-0 pr-4">
                                <input id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                                    type="hidden" name="thumbnail" >
                            </div>
                            <div class="col-3 p-0">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-block">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>
                                <div id="holder" class="mx-auto" style="margin-top:15px;max-height:100%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label for="author">Giảng viên</label>
                        <select class="form-select form-control" name="teacher_id" >
                            <option value=""> Chọn giảng viên </option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá gốc</label>
                        <input type="text" value="{{ old('price') }}"
                            class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                            placeholder="Nhập giá...">

                    </div>
                    <div class="form-group ">
                        <label for="discount">Giá khuyến mại</label>
                        <input type="text" value="{{ old('discount') }}"
                            class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount"
                            placeholder="Nhập giá...">
                    </div>
                    <div class="form-group">
                        <label for="my-editor" class="col-form-label">Mô tả</label>
                        <textarea id="modal-md-course" name="description" class="modal_input form-control ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                            <label>Chuyên mục khóa học</label>
                            <select class="form-select form-control" name="category_id">
                                <option value="">Chọn chuyên mục</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group mb-4">
                        <label>Trạng thái</label>
                        <select class="form-select form-control" name="status">
                            <option value="comming_soon">Sắp ra mắt</option>
                            <option value="debuted">Đã ra mắt</option>
                        </select>
                    </div>

                    <div class="form-group pt-4 icheck-primary">
                        <input type="checkbox" value="1" id="checkboxPrimary3" name="featured">
                        <label for="checkboxPrimary3">
                            Khóa học nổi bật
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn_close">Đóng</button>
                <button type="button" id="" data-action="{{ route('ajaxCourse') }}"
                    class="btn btn-primary btn_submit_course">Tạo mới</button>
            </div>
        </div>
    </div>
</div>
