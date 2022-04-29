@extends('layouts.app')
@section('content')
    <div class="row container">
        <div class="col-md-12">
            <!-- ↓バリデーションエラーの表示に使用-->
						@include('common.errors')
            <!-- ↑バリデーションエラーの表示に使用-->
            <!--<form action="{{ url('books/update') }}" method="POST">-->
                <!-- item_name -->
            <!--    <div class="form-group p-2">-->
            <!--        <label for="item_name">タイトル</label>-->
            <!--        <input type="text" name="item_name" class="form-control" id="item_name" value="{{$book->item_name}}">-->
            <!--    </div>-->
                <!--/ item_name -->
                
                <!-- item_number -->
            <!--    <div class="form-group p-2">-->
            <!--        <label for="item_number">冊数</label>-->
            <!--        <input type="text" name="item_number" class="form-control" id="item_number" value="{{$book->item_number}}">-->
            <!--    </div>-->
                <!--/ item_number -->
                
                <!-- item_amount -->
            <!--    <div class="form-group p-2">-->
            <!--        <label for="item_amount">金額</label>-->
            <!--        <input type="text" name="item_amount" class="form-control" id="item_amount" value="{{$book->item_amount}}">-->
            <!--    </div>-->
                <!--/ item_amount -->
                
                <!-- published -->
            <!--    <div class="form-group p-2">-->
            <!--        <label for="published">公開日</label>-->
            <!--        <input type="date" name="published" class="form-control" id="published" value="{{$book->published}}">-->
            <!--    </div>-->
                <!--/ published -->
                <form action="{{ url('books/update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <!--<form action="{{ url('books') }}"  method="POST" class="form-horizontal">-->
                <!--<form action="/store" enctype="multipart/form-data" method="POST" class="form-horizontal">-->
                @csrf
                <!-- 施主名 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_name" class="col-sm-3 control-label">施主名（現場）</label>
                    <input type="text" name="item_name" class="form-control" id="item_name" value="{{ $book->item_name }}">
                </div>
                <!-- 使用メーカー -->
                <div class="form-group col-md-6 p-2">
                    <label for="maker" class="col-sm-3 control-label">メーカー</label>
                    <input type="text" name="maker" class="form-control" id="maker" value="{{ $book->maker }}">
                </div>
                <!-- 冊数 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_number" class="col-sm-3 control-label">商品の種類</label>
                    <input type="text" name="item_number" class="form-control" id="item_number" value="{{ $book->item_number }}">
                </div>
                <!-- 金額 -->
                <div class="form-group col-md-6 p-2">
                    <label for="item_amount" class="col-sm-3 control-label">カラー</label>
                    <input type="text" name="item_amount" class="form-control" id="item_amount" value="{{ $book->item_amount }}">
                </div>
                <!-- 公開日 -->
                <div class="form-group col-md-6 p-2">
                    <label for="published" class="col-sm-3 control-label">受取り希望日</label>
                    <input type="date" name="published" class="form-control" id="published" value="{{ $book->published }}">
                </div>
                <!-- 画像 1F-->
                <div class="form-group col-md-6 p-2">
                    <label for="image" class="col-sm-3 control-label">1F 図面アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ $book->image }}">-->
                    <input type="file" class="form-control-file" name="image" id=image value="{{ $book->image }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                <!-- 画像 2F-->
                <div class="form-group col-md-6 p-2">
                    <label for="image" class="col-sm-3 control-label">2F 図面アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ old('image') }}">-->
                    <input type="file" class="form-control-file" name="image2" id=image2 value="{{ $book->image }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                <!-- 画像 その他-->
                <div class="form-group col-md-6 p-2">
                    <label for="image" class="col-sm-3 control-label">その他図面アップロード</label>
                    <!--<input type="submit" name="published" class="form-control" id="image" value="{{ old('image') }}">-->
                    <input type="file" class="form-control-file" name="image3" id=image3 value="{{ $book->image }}">
                    <!--<input type="submit" value="アップロードする">-->
                </div>
                <p>※変更がなくても1Fの図面画像は再アップロードが必要です</p>
                
                <!-- Save ボタン/Back ボタン -->
                <div class="form-group p-2">
	                <div class="well well-sm">
	                    <button type="submit" class="btn btn-primary">変更を保存する</button>
	                    <a class="btn btn-link pull-right" href="{{ url('/') }}"> 戻る</a>
	                </div>
                </div>
                <!--/ Save ボタン/Back ボタン -->
                
                <!-- id 値を送信 -->
                <input type="hidden" name="id" value="{{$book->id}}" />
                <!--/ id 値を送信 -->
                
                <!-- CSRF -->
                @csrf
                <!--/ CSRF -->
            </form>
        </div>
    </div>
@endsection