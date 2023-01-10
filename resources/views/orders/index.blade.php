@extends('layout.master')
@section('content')
<div class="page-layout">
    <div class="page-container">
        <div class="fancy-container">
            <form action="/orders" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="search" id="search" class="search-input" required placeholder="Search by order number">
                <button type="submit" class="search-button">Go</button>
            </form>
        </div>
        <div class="flex-orders">
            @foreach ($orders as $order)
            <div class="order-case">
                <div class="number-block"><span class="order-number">{{$order->id}}</span></div>
                <div style="flex-grow:0.5;">{{$order->total}} $</div>
                @if(Auth::user()->email=="admin@admin")
                <i class="fas fa-edit" onClick="toggleEditForm({{$order}})"></i>
                <i class="fa fa-trash trash-icon-space" onClick="togglePopup({{$order->id}})"></i>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @if($orders->count()>0 && Auth::user()->email=="admin@admin")
    <div class="warning-container">
        <div class="warning-box">
            <div class="warning-message">
                Are you sure you want to delete this entry?
            </div>
            <div class="button-box">
                <button class="button-cancel" onClick="togglePopup()">Cancel</button>
                <button class="button-confirm" onClick="deleteOrder()">Confirm</button>
            </div>
        </div>
    </div>
    <div class="edit-form">
        <div class="edit-box">
            <img class="x-close" src="/images/other/x.webp" onClick="toggleEditForm()">
            <div class="box-title">Box-title</div>
            <div class="second-box-title">Products:</div>
            <div class="edit-product-list"></div>
            <div class="second-box-title">Total: <input id="total" onChange="updateTotal()" onKeydown="updateTotal()" onPaste="updateTotal()" onInput="updateTotal()" id="total" class="edit-total" type="number"></div>
            <div class="confirm-box">
                <form method="POST" action="/update_order">
                @csrf
                <input type="hidden" name="order" id="order" value="{{$order}}">
                <button class="button-confirm" type="submit">Confirm</button>
                </form>
            </div> 
        </div>
    </div>
    @endif
</div>

@endsection