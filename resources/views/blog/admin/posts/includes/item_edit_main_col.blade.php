<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($post->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle md-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#maindata" role="tab">Доп. Данные</a>
                    </li>
                </ul>
                <br />
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $post->title }}" id="title" type="text" class="form-control" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw" id="content_raw" class="form-control" rows="20">{{ old('content_raw', $post->content_raw) }}</textarea>
                        </div>
                   {{-- </div>--}}
                    {{--<div class="tab-pane" id="adddata" role="tabpanel">--}}
                        <div class="form-group">
                           {{-- <label for="category_id">Категория</label>--}}
                            <select name="category_id" id="category_id" class="form-control" placeholder="Выберите категорию"  required>
                                @foreach($categories as $categoryItem)
                                    <option value="{{ $categoryItem->id }}"
                                        @if($categoryItem->id == $post->category_id && $post->category_id !== 0) selected @endif>
                                         {{ $categoryItem->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Индефикатор</label>
                            <input name="slug" value="{{ $post->slug }}" id="slug" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="except">Выдержка</label>
                            <textarea name="except" id="except" class="form-control" row="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                        </div>
                        <div class="form-check">
                            <input name="is_published" type="hidden" value="0">
                            <input name="is_published" type="checkbox" class="form-check-input" value="1" @if($post->is_published) checked="checked" @endif>
                            <label class="form-check-label" for="is_published">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
