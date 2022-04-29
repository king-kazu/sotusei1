
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            見積もり希望図面登録
        </div>
        
        <!-- ↓バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- ↑バリデーションエラーの表示に使用-->

        <!-- 登録フォーム -->
        @if(Auth::check())
            <form action="{{ url('books') }}" enctype="multipart/form-data" method="POST" class="form-horizontal">
                <!--<form action="/store" enctype="multipart/form-data" method="POST" class="form-horizontal">-->
                @csrf
                <!-- 施主名 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_name" class="col-sm-3 control-label">施主名（現場）</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" value="{{ old('item_name') }}">
                </div>
                <!-- 使用メーカー -->
                <div class="form-group col-md-6 p-2">
                    <label for="maker" class="col-sm-3 control-label">メーカー</label>
                    <input type="text" name="maker" class="form-control" id="maker" value="{{ old('maker') }}">
                </div>
                <!-- 冊数 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_number" class="col-sm-3 control-label">商品の種類</label>
                    <input type="text" name="item_number" class="form-control" id="item_number" value="{{ old('item_number') }}">
                </div>
                <!-- 金額 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_amount" class="col-sm-3 control-label">カラー</label>
                    <input type="text" name="item_amount" class="form-control" id="item_amount" value="{{ old('item_amount') }}">
                </div>
                <!-- 公開日 -->
                <div class="form-group col-md-6 p-2">
                    <label for="published" class="col-sm-3 control-label">受取り希望日</label>
                    <input type="date" name="published" class="form-control" id="published" value="{{ old('published') }}">
                </div>
                <!-- 画像 1F-->
                <div class="form-group col-md-6 p-2">
                    <label for="image" class="col-sm-3 control-label">1F　図面アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ old('image') }}">-->
                    <input type="file" class="form-control-file" name="image" id=image value="{{ old('image') }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                <!-- 画像 2F-->
                <div class="form-group col-md-6 p-2">
                    <label for="image" class="col-sm-3 control-label">2F　図面アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ old('image') }}">-->
                    <input type="file" class="form-control-file" name="image2" id=image2 value="{{ old('image2') }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                <!-- 画像 その他-->
                <div class="form-group col-md-6 p-2">
                    <label for="image" class="col-sm-3 control-label">その他図面アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ old('image') }}">-->
                    <input type="file" class="form-control-file" name="image3" id=image3 value="{{ old('image3') }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                
                <!--<form action="/upload" enctype="multipart/form-data" method="post">-->
                <!--    @csrf-->
                <!--    <input type="file" name="imgpath">-->
                <!--    <input type="submit" value="アップロードする">-->
                <!--</form>-->
                    
                <!-- 登録ボタン -->
                <div class="form-group p-2">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            見積もりを申込む
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
	<!-- Book: 既に登録されてる本のリスト -->
    @if (count($books) > 0)
        <div class="card-body">
             <th style='font-weight: bold;'>見積もり状況　　※右上マイページメニューで変更等が可能です。</th>
            <table class="table table-striped task-table">
                <!-- テーブルヘッダ -->
                <thead>
                    <!--<th>&nbsp;</th>-->
                    <th>サッシ店名</th>
                    <th>施主名</th>
                    <th>窓メーカー</th>
                    <th>商品名</th>
                    <th>カラー</th>
                    <th>見積もり期限</th>
                </thead>
                <!-- テーブル本体 -->
                <tbody>
                 
                    @foreach ($books as $book)
                    @if($book->user_id === Auth::id())
                        <tr>
                            <!-- サッシ店名 ↓ここを追加-->
                            <td class="table-text">
                                <div>{{ $book->user->name }}</div>
                            </td>
                            <!-- 施主名 -->
                            <td class="table-text">
                                <div>{{ $book->item_name }}</div>
                            </td>
                            <!--メーカー-->
                            <td class="table-text">
                                <div>{{ $book->maker }}</div>
                            </td>
                            <!--商品名-->
                            <td class="table-text">
                                <div>{{ $book->item_number }}</div>
                            </td>
                            <!--カラー-->
                            <td class="table-text">
                                <div>{{ $book->item_amount }}</div>
                            </td>
                            <!--見積もり期限-->
                            <td class="table-text">
                                <div>{{ $book->published }}</div>
                            </td>
                            <!--<td>-->
                            <!--    @if($book->user_id === Auth::id())-->
                            <!--        <form action="{{ url('book/'.$book->id) }}" method="POST">-->
                            <!--            @csrf-->
                            <!--            @method('delete')-->
                            <!--            <button type="submit" class="btn btn-danger">-->
                            <!--                削除-->
                            <!--            </button>-->
                            <!--        </form>-->
                            <!--    @endif-->
                            <!--</td>-->
                            <!-- 本: 更新ボタン -->
                            <!--<td>-->
                            <!--    @if($book->user_id === Auth::id())-->
                            <!--        <a href="{{ url('booksedit/'.$book->id) }}">-->
                            <!--            <button type="submit" class="btn btn-primary">更新</button>-->
                            <!--        </a>-->
                            <!--    @endif-->
                            <!--</td>-->
                            <!-- 完了ボタン -->
                            <td>
                            	@if($book->favoriteBook()->where('user_id',Auth::id())->exists() === false)
                                	<form action="{{ url('book/'.$book->id.'/like') }}" method="POST">
                                		{{ csrf_field() }}
                                		<button type="submit" class="btn btn-outline-warning">
                                		    見積作成中
                                		</button>
                                	</form>
                            	@endif
                            	@if($book->favoriteBook()->where('user_id',Auth::id())->exists() === true)
                                	<form action="{{ url('book/'.$book->id.'/unlike') }}" method="POST">
                                		{{ csrf_field() }}
                                		<button type="submit" class="btn btn-warning">
                                		    見積送信済み
                                		</button>
                                	</form>
                            	@endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection