@php
    /** @var \App\Models\BlogCategory $category */
    /** @var \App\Models\BlogCategory $categoryItem */
    /** @var \Illuminate\Support\Collection $categories */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
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
                            <label for="slug">Индификатор</label>
                            <input name="slug" value="{{ $post->slug }}" id="slug" type="text" class="form-control" minlength="3" required>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select name="parent_id" id="parent_id" class="form-control" placeholder="Выберите категорию"  required>
                                <option value="0"
                                        @if($post->parent_id == 0) selected @endif>
                                    Выберите категорию
                                </option>
                                @foreach($posts as $postItem)
                                    <option value="{{ $postItem->id }}"
                                        @if($postItem->id == $post->parent_id && $post->parent_id !== 0) selected @endif>
                                        {{ $postItem->id }} . {{ $postItem->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" id="description" class="form-control" row="3">{{ old('description', $category->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
