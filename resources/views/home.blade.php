@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マイページ') }}</div>

                <div class="card-body">
                   <!--<div class="alert alert-primary">-->
     
     
        <!--<div>ログインユーザーの情報のみ表示</div>-->
    　　　　<div class="card-body">
    　　　　            <th style='font-weight: bold;'>見積もり登録管理</th>
                    <table class="table table-striped task-table">
                        <!-- テーブルヘッダ -->
                        <thead>
                            <th>施主名</th>
                            <th>初回依頼</th>
                            <th>最終更新</th>
                        </thead>
                        <!--    <th>&nbsp;</th>-->
                        <!--</thead>-->
                        <!-- テーブル本体 -->
                        <tbody>
                            @if(isset($books))
                                @foreach ($books as $book)
                                    <tr>
                                        <!-- 本タイトル -->
                                        <td class="table-text">
                                            <div>{{ $book->item_name }}</div>
                                        </td>
                                        <!--初回依頼日-->
                                        <td class="table-text">
                                            <div>{{ $book->created_at }}</div>
                                        </td>
                                        <!--最終更新-->
                                        <td class="table-text">
                                            <div>{{ $book->updated_at }}</div>
                                        </td>
                                        <td>
                                            <!--<form action="{{ url('booksedit/'.$book->id.'/like') }}" method="POST">-->
                                            <!--    <a href="{{ url('booksedit/'.$book->id) }}">-->
                                            <!--        @csrf-->
                                            <!--        @method('delete')-->
                                            <!--        <button type="submit" class="btn btn-danger">-->
                                            <!--            削除-->
                                            <!--        </button>-->
                                            <!--        </a>-->
                                            <!--</form>-->
                                        </td>
                                        <!-- 本: 更新ボタン -->
                                        <td>
                                            <a href="{{ url('booksedit/'.$book->id) }}">
                                                <button type="submit" class="btn btn-primary">更新</button>
                                            </a>
                                        </td>
                                        <td>
                                            @if($book->user_id === Auth::id())
                                                <form action="{{ url('book/'.$book->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">
                                                        削除
                                                    </button>
                                                </form>
                                            @endif
                                            <!--<img src="{{'/storage/' . $book['image']}}" class='w-100 mb-3'/>-->
                                        <!--<img src="{{'/storage' . $book['image']}}" class='w-100 mb-3'/>-->
                                        <!--<img src="{{'public/storage' . $book->image2}}" class='w-100 mb-3'/>-->
                                        <!--<img src="{{'public/storage' . $book->image3}}" class='w-100 mb-3'/>-->
                                        <img src="{{ asset('storage' . $book->image) }}" class='w-100 mb-3'/>
                                        <img src="{{ asset('storage' . $book->image2) }}" class='w-100 mb-3'/>
                                        <img src="{{ asset('storage' . $book->image3) }}" class='w-100 mb-3'/>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
