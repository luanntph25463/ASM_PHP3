@extends('include.layouts')
@section('content')

<div class="container pb-5 mt-n2 mt-md-n3 pt-4">
    <div class="row">
        <div class="col-xl-9 col-md-8">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                <span>Courses</span><a class="font-size-sm" href="{{ route('trangchu') }}"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>Continue shopping</a></h2>
                    @if (!empty($cart))
                @php $total = 0 @endphp
                @foreach ($cart as  $item)
                @php $total += $item['price'] @endphp
                <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                    <div class="media d-block d-sm-flex text-center text-sm-left">
                        <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img
                                src="{{$item['image']}}" height="230" alt="Product"></a>
                        <div class="media-body pt-3">
                            <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">{{$item['name']}}</a></h3>
                            <div class="font-size-sm"><span class="text-muted mr-2">Giáo Viên:</span>{{$item['tenGiaoVien']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Lớp:</span>{{$item['tenLop']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Thời Gian Bắt Đầu:</span>{{$item['start_date']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Thời Gian Kết Thúc:</span>{{$item['end_date']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Sĩ Số:</span>{{$item['SiSo']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Ca học:</span>{{$item['ca_hoc']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Danh Mục:</span>{{$item['tenDM']}}</div>
                            <div class="font-size-sm"><span class="text-muted mr-2">Danh Mục:</span>
                            </div>
                            <div class="font-size-lg text-primary pt-2">$ {{$item['price']}}</div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left"
                        style="max-width: 10rem;">
                        {{-- <div class="form-group mb-2">
                            <label for="quantity1">Quantity</label>
                            <input class="form-control form-control-sm" type="number" id="quantity1" value="1">
                        </div> --}}
                        <button class="btn btn-outline-secondary btn-sm btn-block mb-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <polyline points="1 20 1 14 7 14"></polyline>
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>Update cart</button>
                        <a href="/removecart/{{$item['id']}}" class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>Remove</a>
                    </div>
                </div>
                @endforeach

                @else
                @php
                    $total = 0
                @endphp
    <p>Your cart is empty.</p>
@endif

        </div>

        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
            <h2 class="h6 px-4 py-3 bg-secondary text-center">Subtotal</h2>
            <div class="h3 font-weight-semibold text-center py-3">$ @php
                echo $total
            @endphp</div>
            <hr>
            <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Note</span>Additional
                comments</h3>
                <form action="{{ route('orderadd') }}" method="post">
                    @csrf
                    <input type="hidden" name="total_amount" value="@php echo $total @endphp">
                    @if(session()->has('user'))
                    <input type="hidden" name="id_user" value="@php echo session('user')->id @endphp">
                    @endif

                    <input type="hidden" name="status" value="3">
            <textarea class="form-control mb-3" id="order-comments" name="comment" rows="5"></textarea>
            <button type="submit" class="btn btn-primary btn-block" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-credit-card mr-2">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>Proceed to Checkout</button>
                </form>
            <div class="pt-4">
                <div class="accordion" id="cart-accordion">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="accordion-heading font-weight-semibold"><a href="#promocode" role="button"
                                    data-toggle="collapse" aria-expanded="true" aria-controls="promocode">Apply
                                    promo code<span class="accordion-indicator"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-up">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg></span></a></h3>
                        </div>
                        <div class="collapse show" id="promocode" data-parent="#cart-accordion">
                            <div class="card-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="cart-promocode"
                                            placeholder="Promo code" required>
                                        <div class="invalid-feedback">Please provide a valid promo code!</div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-block" type="submit">Apply promo
                                        code</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="accordion-heading font-weight-semibold"><a class="collapsed" href="#shipping"
                                    role="button" data-toggle="collapse" aria-expanded="true"
                                    aria-controls="shipping">Shipping estimates<span
                                        class="accordion-indicator"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-chevron-up">
                                            <polyline points="18 15 12 9 6 15"></polyline>
                                        </svg></span></a></h3>
                        </div>

                        <div class="collapse" id="shipping" data-parent="#cart-accordion">
                            <div class="card-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <select class="form-control custom-select" required>
                                            <option value>Choose your country</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Finland">Finland</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="United States">United States</option>
                                        </select>
                                        <div class="invalid-feedback">Please choose your country!</div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control custom-select" required>
                                            <option value>Choose your city</option>
                                            <option value="Bern">Bern</option>
                                            <option value="Brussels">Brussels</option>
                                            <option value="Canberra">Canberra</option>
                                            <option value="Helsinki">Helsinki</option>
                                            <option value="Mexico City">Mexico City</option>
                                            <option value="Ottawa">Ottawa</option>
                                            <option value="Washington D.C.">Washington D.C.</option>
                                            <option value="Wellington">Wellington</option>
                                        </select>
                                        <div class="invalid-feedback">Please choose your city!</div>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="ZIP / Postal code"
                                            required>
                                        <div class="invalid-feedback">Please provide a valid zip!</div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-block" type="submit">Calculate
                                        shipping</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
<!-- Style -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('js')
@endsection
